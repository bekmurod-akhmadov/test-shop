<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int $client_id
 * @property string $address
 * @property string|null $created_at
 * @property int $total_count
 * @property float $total_price
 * @property int|null $status
 *
 * @property Client $client
 * @property OrderItem[] $orderItems
 */
class Order extends \yii\db\ActiveRecord
{

    const STATUS_NEW = 0;
    const STATUS_PAID = 1;
    const STATUS_SHIPPED = 2;
    const STATUS_DELIVERED = 3;
    const STATUS_CANCELLED = 4; 

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'default', 'value' => 0],
            [['client_id', 'address', 'total_count', 'total_price'], 'required'],
            [['client_id', 'total_count', 'status'], 'integer'],
            [['created_at'], 'safe'],
            [['total_price'], 'number'],
            [['address'], 'string', 'max' => 255],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::class, 'targetAttribute' => ['client_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_id' => 'Client ID',
            'address' => 'Address',
            'created_at' => 'Created At',
            'total_count' => 'Total Count',
            'total_price' => 'Total Price',
            'status' => 'Status',
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Client::class, ['id' => 'client_id']);
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::class, ['order_id' => 'id']);
    }

}
