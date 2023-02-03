<?php

namespace app\modules\admin\models;

use Yii;


/**
 * This is the model class for table "company".
 *
 * @property int $id
 * @property string $name
 * @property string $inn
 * @property string $imageFile
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
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'inn', 'created_by', 'imageFile'], 'string', 'max' => 250],
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
            'imageFile' => 'imageFile',
            'created_at' => 'Время создания',
            'updated_at' => 'Время обновления',
            'created_by' => 'Автор',
        ];
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

        
    
        
    
