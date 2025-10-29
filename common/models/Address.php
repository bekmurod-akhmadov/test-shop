<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property int $client_id
 * @property string $city
 * @property string $district
 * @property string $address
 * @property int|null $status
 *
 * @property Client $client
 */
class Address extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'default', 'value' => 1],
            [['client_id', 'city', 'district', 'address'], 'required'],
            [['client_id', 'status'], 'integer'],
            [['city', 'district', 'address'], 'string', 'max' => 255],
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
            'city' => 'City',
            'district' => 'District',
            'address' => 'Address',
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

}
