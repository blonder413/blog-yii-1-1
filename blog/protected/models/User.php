<?php

/**
 * This is the model class for table "User".
 *
 * The followings are the available columns in table 'User':
 * @property integer $id
 * @property string $name
 * @property string $username
 * @property string $auth_key
 * @property string $email
 * @property string $photo
 * @property integer $status
 * @property string $verification_token
 * @property string $password_hash
 * @property string $password_reset_token
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends CActiveRecord
{
	public $repeat_password;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, username, email, photo, password_hash, repeat_password', 'required'),
			array('status, created_at, updated_at', 'numerical', 'integerOnly'=>true),
			array('name, username, email, photo, verification_token, password_hash, password_reset_token', 'length', 'max'=>255),
			array('auth_key', 'length', 'max'=>32),
			
//			array('password_hash', 'compare', 'compareAttribute'=>'repeat_password', 'on'=>'signup'),
			array('repeat_password', 'compare', 'compareAttribute'=>'password_hash'),

			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, username, auth_key, email, photo, status, verification_token, password_hash, password_reset_token, created_at, updated_at', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'name' => 'Name',
			'username' => 'Username',
			'auth_key' => 'Auth Key',
			'email' => 'Email',
			'photo' => 'Photo',
			'status' => 'Status',
			'verification_token' => 'Verification Token',
			'password_hash' => 'Password Hash',
			'password_reset_token' => 'Password Reset Token',
			'created_at' => 'Created At',
			'updated_at' => 'Updated At',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('name',$this->name,true);

		$criteria->compare('username',$this->username,true);

		$criteria->compare('auth_key',$this->auth_key,true);

		$criteria->compare('email',$this->email,true);

		$criteria->compare('photo',$this->photo,true);

		$criteria->compare('status',$this->status);

		$criteria->compare('verification_token',$this->verification_token,true);

		$criteria->compare('password_hash',$this->password_hash,true);

		$criteria->compare('password_reset_token',$this->password_reset_token,true);

		$criteria->compare('created_at',$this->created_at);

		$criteria->compare('updated_at',$this->updated_at);

		return new CActiveDataProvider('User', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * Encripta un password
	 * @param $password String password a encriptar
	 * @return String texto encriptado
	 */
	public function generatePassword($password)
	{
		/**
		 * CPasswordHelper usa crypt con blowfish con $2y y fix
		 */
//		return CPasswordHelper::hashPassword($password);
		return password_hash($password, PASSWORD_DEFAULT);
	}

	/**
	 * Valida si un password pasado coincide con el almacenado
	 * @param $hash String texto encriptado
	 * @return boolean true si el password coincide
	 */
	public function validatePassword($hash)
	{
		return (password_verify($hash, $this->password_hash));
	}
}