<?php

namespace app\modules\admin\models;

use Yii;
use app\models\User;

/**
 * This is the model class for table "review".
 *
 * @property int $id
 * @property string $advantage
 * @property string $disadvantage
 * @property string $description
 * @property float $rating
 * @property int $id_image
 * @property string $created_at
 * @property string $updated_at
 * @property string $created_by
 * @property int $id_user
 * @property int $id_product
 *
 * @property Image $image
 * @property Product $product
 * @property User $user
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['advantage', 'disadvantage', 'description', 'rating', 'created_at', 'updated_at', 'created_by', 'id_user', 'id_product'], 'required'],
            [['description'], 'string'],
            [['rating'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['advantage', 'disadvantage', 'created_by', 'imageFile'], 'string', 'max' => 250],
            [['id_product'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['id_product' => 'id']],
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
            'advantage' => 'Преимущества',
            'disadvantage' => 'Недостатки',
            'description' => 'Описание',
            'rating' => 'Рейтинг',
            'imageFile' => 'Изображение',
            'created_at' => 'Время создания',
            'updated_at' => 'Время изменения',
            'created_by' => 'Автор',
            'id_user' => 'Пользователь',
            'id_product' => 'Продукт',
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
}
