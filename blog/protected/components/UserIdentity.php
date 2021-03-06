<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	private $_id;
	private $_name;

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$user = new User;
		$user = $user->findByAttributes(
			array('username'=> $this->username),
    		'status=10'
		);

		if (!$user) {
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		} elseif($user->username !== $this->username) {
			$this->errorCode=self::ERROR_USERNAME_INVALID;
//		} else if(!CPasswordHelper::verifyPassword($this->password,$user->password)) {
//            $this->errorCode=self::ERROR_PASSWORD_INVALID;
		} elseif(!$user->validatePassword($this->password)) {
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		} else {
			$this->_id=$user->id;
			$this->_name = $user->name;
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}

	public function getId()
    {
        return $this->_id;
	}
	
	public function getName()
    {
        return $this->_name;
    }
}