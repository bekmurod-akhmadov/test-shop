<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property int|null $product_id
 * @property int|null $client_id
 * @property string $comment
 * @property string|null $created_at
 * @property int $status
 *
 * @property Client $client
 * @property Product $product
 */
class Comment extends \yii\db\ActiveRecord
{
    const STATUS_MODERATION = 1;
    const STATUS_ACCEPT = 2;
    const STATUS_CANCELLED = 3;

    public $email;
    public $fullName;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'client_id','email'], 'default', 'value' => null],
            [['product_id', 'client_id','status'], 'integer'],
            [['comment'], 'required'],
            [['comment','email'], 'string'],
            [['created_at'], 'safe'],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Client::class, 'targetAttribute' => ['client_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'client_id' => 'Client ID',
            'comment' => 'Comment',
            'created_at' => 'Created At',
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
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

    public function getStatusName()
    {
        if($this->status == self::STATUS_MODERATION){
            return '<span class="badge badge-warning bg-warning text-light">'. Yii::t('app', 'Moderatsiyada') .'</span>';
        }elseif($this->status == self::STATUS_ACCEPT){
            return '<span class="badge badge-success bg-success text-light">'. Yii::t('app', 'Qabul qilindi') .'</span>';
        }elseif($this->status == self::STATUS_CANCELLED){
            return '<span class="badge badge-danger bg-danger text-light">'. Yii::t('app', 'Bekor qilindi') .'</span>';
        }

    }

}
