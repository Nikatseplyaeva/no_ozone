<?php

namespace app\models;

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
class RegForm extends User
{
    public $passwordConfirm;
    public $agree;
    

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'login', 'password', 'email', 'phone', 'id_city', 'valuta', 'date_of_birth', 'sex', 'role', 'id_bank_card', 'passwordConfirm'], 'required', 'message' => 'Поле обязательно для заполнения!'],
            [['id_city', 'id_image', 'id_bank_card'], 'integer'],
            [['date_of_birth'], 'safe'],
            [['email'], 'email', 'message' => 'Не корректный email!'],
            //['passwordConfirm', 'compare', 'compareAttribute' => 'password', 'message' => 'Пароли должны совпадать!'],
            ['name', 'match', 'pattern' => '/^[А-Яа-я\s\-]{3,30}$/u', 'message' => 'Только кириллица, пробелы и дефисы!'],
            ['login', 'match', 'pattern' => '/^[A-za-z0-9\s\-]{3,30}$/u', 'message' => 'Только латинские буквы и цифры!'],
            ['login', 'unique', 'message' => 'Такой логин уже есть'],
            [['name', 'login', 'password', 'phone', 'valuta', 'sex', 'role'], 'string', 'max' => 250],
            [['id_bank_card'], 'exist', 'skipOnError' => true, 'targetClass' => BankCard::class, 'targetAttribute' => ['id_bank_card' => 'id']],
            [['id_city'], 'exist', 'skipOnError' => true, 'targetClass' => City::class, 'targetAttribute' => ['id_city' => 'id']],
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
            'id_image' => 'Изображение',
            'id_bank_card' => 'Банковская карта',
            //'passwordConfirm' => 'Подтверждение пароля',
        ];
    }

   
}
