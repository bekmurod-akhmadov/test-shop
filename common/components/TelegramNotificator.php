<?php

namespace common\components;

use yii\httpclient\Client;
use Yii;
use yii\base\Component;
use common\models\Product;
use common\models\OrderItem;

class TelegramNotificator extends Component
{
    private string $botToken;
    private string $chatId;

    public function __construct($config = [])
    {
        $this->botToken = Yii::$app->params['telegram']['botToken'];
        $this->chatId = Yii::$app->params['telegram']['chatId'];
        parent::__construct($config);
    }
    /**
     * Umumiy xabar yuborish funksiyasi
     */
    private function sendMessage(string $message, string $parseMode = 'HTML'): bool
    {
        $client = new Client([
            'baseUrl' => "https://api.telegram.org/bot{$this->botToken}"
        ]);

        $response = $client->createRequest()
            ->setMethod('POST')
            ->setUrl('sendMessage')
            ->setData([
                'chat_id' => $this->chatId,
                'text' => $message,
                'parse_mode' => $parseMode
            ])
            ->send();

        if (!$response->isOk) {
            Yii::error("Telegram xabar yuborilmadi: " . $response->content, __METHOD__);
            return false;
        }

        return true;
    }

    /**
     * Saytga kirgan mehmon haqida bildirish
     */
    public function sendGuestNotification(): void
    {
        $message = "👀 <b>Saytga kimdir tashrif buyurdi!</b>";
        $this->sendMessage($message);
    }

    /**
     * Buyurtma haqida bildirish
     */
    public function sendOrderNotification($orderModel): void
    {
        $totalPrice = number_format($orderModel->total_price, 0, ' ', ' ');
        $message = "<b>🛒 Yangi buyurtma!</b>\n\n"
            . "<b>Buyurtma raqami:</b> {$orderModel->id}\n"
            . "<b>Ism:</b> {$orderModel->client->first_name} {$orderModel->client->last_name}\n"
            . "<b>Telefon:</b> {$orderModel->client->phone}\n"
            . "<b>Manzil:</b> {$orderModel->address}\n"
            . "<b>Jami mahsulotlar:</b> {$orderModel->total_count}\n"
            . "<b>Umumiy summa:</b> {$totalPrice} so‘m\n"
            . "<b>Buyurtma sanasi:</b> {$orderModel->created_at}\n"
            . "-----------------------------------------\n"
            . "<b><i>🧾 Tovarlar:</i></b>\n";

        $orderProducts = OrderItem::find()->where(['order_id' => $orderModel->id])->all();
        foreach ($orderProducts as $item) {
            $product = Product::findOne($item->product_id);
            $price = number_format($product->actualPrice(), 0, ' ', ' ');
            if (!$product) continue;
            $message .= "\n<b>Nom:</b> {$product->name}\n"
                . "<b>Narx:</b> {$price} so‘m\n"
                . "<b>Soni:</b> {$item->qty} kg\n"
                . "-----------------------------------------";
        }
        $this->sendMessage($message);
    }
}
