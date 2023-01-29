<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "zakaz".
 *
 * @property int $id
 * @property int $id_user
 * @property int $id_product
 * @property float $sum_zakaz
 * @property float $sum_sale
 * @property int $id_zakaz_info
 *
 * @property Product $product
 * @property User $user
 * @property ZakazInfo $zakazInfo
 */
class Zakaz extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'zakaz';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_user', 'id_product', 'sum_zakaz', 'sum_sale', 'id_zakaz_info'], 'required'],
            [['id_user', 'id_product', 'id_zakaz_info'], 'integer'],
            [['sum_zakaz', 'sum_sale'], 'number'],
            [['id_user'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['id_user' => 'id']],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['id_product' => 'id']],
            [['id_zakaz_info'], 'exist', 'skipOnError' => true, 'targetClass' => ZakazInfo::class, 'targetAttribute' => ['id_zakaz_info' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_user' => 'Пользователь',
            'id_product' => 'Продукт',
            'sum_zakaz' => 'Сумма заказа',
            'sum_sale' => 'Сумма заказа со скидкой',
            'id_zakaz_info' => 'Информация о заказе',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'id_product']);
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
     * Gets query for [[ZakazInfo]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getZakazInfo()
    {
        return $this->hasOne(ZakazInfo::class, ['id' => 'id_zakaz_info']);
    }
}
