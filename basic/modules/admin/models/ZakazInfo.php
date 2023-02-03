<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "zakaz_info".
 *
 * @property int $id
 * @property int $id_address
 * @property int $id_bank_card
 * @property string $type_delivery
 * @property string $created_at
 *
 * @property Address $address
 * @property BankCard $bankCard
 * @property Zakaz[] $zakazs
 */
class ZakazInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zakaz_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_address', 'id_bank_card', 'type_delivery', 'created_at'], 'required'],
            [['id_address', 'id_bank_card'], 'integer'],
            [['created_at'], 'safe'],
            [['type_delivery'], 'string', 'max' => 255],
            [['id_address'], 'exist', 'skipOnError' => true, 'targetClass' => Address::class, 'targetAttribute' => ['id_address' => 'id']],
            [['id_bank_card'], 'exist', 'skipOnError' => true, 'targetClass' => BankCard::class, 'targetAttribute' => ['id_bank_card' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_address' => 'Адрес',
            'id_bank_card' => 'Банковская карта',
            'type_delivery' => 'Тип доставки',
            'created_at' => 'Время создания',
        ];
    }

    /**
     * Gets query for [[Address]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(Address::class, ['id' => 'id_address']);
    }

    /**
     * Gets query for [[BankCard]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBankCard()
    {
        return $this->hasOne(BankCard::class, ['id' => 'id_bank_card']);
    }

    /**
     * Gets query for [[Zakazs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getZakazs()
    {
        return $this->hasMany(Zakaz::class, ['id_zakaz_info' => 'id']);
    }
}
