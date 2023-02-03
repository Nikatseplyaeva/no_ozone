<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "bank_card".
 *
 * @property int $id
 * @property string $number
 * @property string $validati_thru
 * @property int $CVV
 *
 * @property User[] $users
 * @property ZakazInfo[] $zakazInfos
 */
class BankCard extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'bank_card';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'validati_thru', 'CVV'], 'required'],
            [['CVV'], 'integer'],
            [['number', 'validati_thru'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'number' => 'Номер',
            'validati_thru' => 'Срок действия',
            'CVV' => 'Код безопасности',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['id_bank_card' => 'id']);
    }

    /**
     * Gets query for [[ZakazInfos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getZakazInfos()
    {
        return $this->hasMany(ZakazInfo::class, ['id_bank_card' => 'id']);
    }
}
