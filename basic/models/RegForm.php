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
class RegForm extends User
{
    public $passwordConfirm;
    

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'login', 'password', 'email', 'phone', 'id_city', 'valuta', 'date_of_birth', 'sex', 'id_bank_card'], 'required', 'message' => 'Поле обязательно для заполнения!'], //обязательные поля
            [['id_city', 'id_bank_card'], 'integer'],
            ['login', 'unique', 'message' => 'Такой логин уже есть'], //проверка есть ли такой логин
            [['email'], 'email', 'message' => 'Не корректный email!'], //валидация почты
            ['name', 'match', 'pattern' => '/^[А-Яа-я\s\-]{3,30}$/u', 'message' => 'Только кириллица, пробелы и дефисы!'], //валидация имени
            ['login', 'match', 'pattern' => '/^[A-za-z0-9\s\-]{3,30}$/u', 'message' => 'Только латинские буквы и цифры!'], //валидация логина
            [['name', 'login', 'password', 'phone', 'valuta', 'sex', 'role'], 'string', 'max' => 250],
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

   
}
