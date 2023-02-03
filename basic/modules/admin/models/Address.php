<?php

namespace app\modules\admin\models;
use app\models\User;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property string $name
 * @property int $id_city
 * @property string $street
 * @property string $home
 * @property string $flat
 * @property string $delivery_comment
 * @property int $id_user
 *
 * @property City $city
 * @property User $user
 * @property ZakazInfo[] $zakazInfos
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
            [['name', 'id_city', 'street', 'home', 'flat', 'id_user'], 'required'],
            [['id_city', 'id_user'], 'integer'],
            [['delivery_comment'], 'string'],
            [['name', 'street', 'home', 'flat'], 'string', 'max' => 250],
            [['id_city'], 'exist', 'skipOnError' => true, 'targetClass' => City::class, 'targetAttribute' => ['id_city' => 'id']],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'id_city' => 'Город',
            'street' => 'Улица',
            'home' => 'Дом',
            'flat' => 'Квартира',
            'delivery_comment' => 'Комментарии для курьера',
            'id_user' => 'Пользователь',
        ];
    }

    /**
     * Gets query for [[City]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCity()
    {
        return $this->hasOne(City::class, ['id' => 'id_city']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'id_user']);
    }

    /**
     * Gets query for [[ZakazInfos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getZakazInfos()
    {
        return $this->hasMany(ZakazInfo::class, ['id_address' => 'id']);
    }

}
