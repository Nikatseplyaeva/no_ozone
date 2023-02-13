<?php

namespace app\models;
use app\modules\admin\models\BankCard;
use app\modules\admin\models\City;
use app\modules\admin\models\Image;
use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $name
 * @property string $login
 * @property string $password
 * @property string $email
 * @property string $phone
 * @property int $id_city
 * @property string $valuta
 * @property string $date_of_birth
 * @property string $sex
 * @property string $role
 * @property int $id_image
 * @property int $id_bank_card
 *
 * @property Address[] $addresses
 * @property BankCard $bankCard
 * @property Busket[] $buskets
 * @property City $city
 * @property Favourite[] $favourites
 * @property Image $image
 * @property Image[] $images
 * @property Review[] $reviews
 * @property Zakaz[] $zakazs
 */
class User extends \yii\db\ActiveRecord  implements \yii\web\IdentityInterface
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'login', 'password', 'email', 'phone', 'id_city', 'valuta', 'date_of_birth', 'sex', 'id_bank_card'], 'required'],
            [['id_city', 'id_bank_card'], 'integer'],
            [['email'], 'email'],
            [['phone'], 'integer'],
            ['login', 'unique', 'message' => 'Такой логин уже есть'], //проверка есть ли такой логин
            [['name', 'login', 'password', 'email', 'valuta', 'sex', 'role', 'date_of_birth', 'imageFile'], 'string', 'max' => 250],
            [['id_bank_card'], 'exist', 'skipOnError' => true, 'targetClass' => BankCard::class, 'targetAttribute' => ['id_bank_card' => 'id']],
            [['id_city'], 'exist', 'skipOnError' => true, 'targetClass' => City::class, 'targetAttribute' => ['id_city' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Имя',
            'login' => 'Login',
            'password' => 'Пароль',
            'email' => 'Email',
            'phone' => 'Телефон',
            'id_city' => 'Город',
            'valuta' => 'Валюта',
            'date_of_birth' => 'Дата рождения',
            'sex' => 'Пол',
            'role' => 'Роль',
            'imageFile' => 'Изображение',
            'id_bank_card' => 'Банковская карта',
        ];
    }

    /**
     * Gets query for [[Addresses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAddresses()
    {
        return $this->hasMany(Address::class, ['id_user' => 'id']);
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
     * Gets query for [[Buskets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBuskets()
    {
        return $this->hasMany(Busket::class, ['id_user' => 'id']);
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
     * Gets query for [[Favourites]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFavourites()
    {
        return $this->hasMany(Favourite::class, ['id_user' => 'id']);
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
        return $this->hasMany(Image::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Reviews]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getReviews()
    {
        return $this->hasMany(Review::class, ['id_user' => 'id']);
    }

    /**
     * Gets query for [[Zakazs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getZakazs()
    {
        return $this->hasMany(Zakaz::class, ['id_user' => 'id']);
    }

   public static function findIdentity($id)
   {
       return self::findOne($id);
   }

   /**
    * {@inheritdoc}
    */
   public static function findIdentityByAccessToken($token, $type = null)
   {

   }

   /* авторизация */

   /**
    * Finds user by username
    *
    * @param string $username
    * @return static|null
    */
   public static function findByUsername($username)
   {
       return self::find()->where(['login' => $username])->one(); //заменяем все username на login
   }

   /**
    * {@inheritdoc}
    */
   public function getId()
   {
       return $this->id;
   }

   /**
    * {@inheritdoc}
    */
   public function getAuthKey()
   {
       
   }

   /**
    * {@inheritdoc}
    */
   public function validateAuthKey($authKey)
   {
       
   }

   /**
    * Validates password
    *
    * @param string $password password to validate
    * @return bool if password provided is valid for current user
    */
   public function validatePassword($password)
   {
       return $this->password === $password;
   }

   
   /**
    * Название роли
    * @param int $id
    * @return mixed|null
    */
   public function getRoleName(int $id)
   {
       $list = self::roles();
       return $list[$id] ?? null;
   }
   

}
