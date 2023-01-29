<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $name
 * @property string $inn
 * @property int $id_image
 * @property string $created_at
 * @property string $updated_at
 * @property string $created_by
 *
 * @property Image $image
 * @property Image[] $images
 * @property Product[] $products
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'inn', 'created_at'], 'required'],
            [['id_image'], 'file'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'inn', 'created_by'], 'string', 'max' => 250],
            [['id_image'], 'exist', 'skipOnError' => true, 'targetClass' => Image::class, 'targetAttribute' => ['id_image' => 'id']],
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
            'inn' => 'ИНН',
            'id_image' => 'Id Изображения',
            'created_at' => 'Время создания',
            'updated_at' => 'Время обновления',
            'created_by' => 'Автор',
        ];
    }

    /**
     * Gets query for [[Image]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(Image::class, ['id' => 'id_image']);
    }

    /**
     * Gets query for [[Images]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::class, ['id_company' => 'id']);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['id_company' => 'id']);
    }
}
