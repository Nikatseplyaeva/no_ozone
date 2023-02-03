<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property float $price
 * @property float $price_sale
 * @property int $flag
 * @property string $description
 * @property string $characrteristic
 * @property string $mode_of_application
 * @property int $id_company
 * @property float $rating
 * @property string $created_at
 * @property string $updated_at
 * @property string $created_by
 * @property int $id_category
 *
 * @property Busket[] $buskets
 * @property Category $category
 * @property Company $company
 * @property Favourite[] $favourites
 * @property Image[] $images
 * @property Review[] $reviews
 * @property Zakaz[] $zakazs
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'price', 'price_sale', 'flag', 'description', 'characrteristic', 'mode_of_application', 'id_company', 'rating', 'created_by', 'id_category'], 'required'],
            [['price', 'price_sale', 'rating'], 'number'],
            [['flag', 'id_company', 'id_category'], 'integer'],
            [['description'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'characrteristic', 'mode_of_application', 'created_by', 'imageFile'], 'string', 'max' => 250],
            [['id_company'], 'exist', 'skipOnError' => true, 'targetClass' => Company::class, 'targetAttribute' => ['id_company' => 'id']],
            [['id_category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['id_category' => 'id']],
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
            'price' => 'Цена',
            'price_sale' => 'Цена со скидкой',
            'flag' => 'Флаг',
            'description' => 'Описание',
            'characrteristic' => 'Характеристика',
            'mode_of_application' => 'Способ применения',
            'id_company' => 'Компания',
            'rating' => 'Рейтинг',
            'created_at' => 'Время создания',
            'updated_at' => 'Время изменения',
            'created_by' => 'Автор',
            'id_category' => 'Категория',
            'imageFile' => 'Изображение',
        ];
    }

    /**
     * Gets query for [[Buskets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBuskets()
    {
        return $this->hasMany(Busket::class, ['id_product' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'id_category']);
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Company::class, ['id' => 'id_company']);
    }

    /**
     * Gets query for [[Favourites]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavourites()
    {
        return $this->hasMany(Favourite::class, ['id_product' => 'id']);
    }

    /**
     * Gets query for [[Images]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::class, ['id_product' => 'id']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::class, ['id_product' => 'id']);
    }

    /**
     * Gets query for [[Zakazs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getZakazs()
    {
        return $this->hasMany(Zakaz::class, ['id_product' => 'id']);
    }
}
