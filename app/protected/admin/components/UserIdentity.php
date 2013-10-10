<?php

class UserIdentity extends CUserIdentity {

    private $_id;

    public function authenticate() {
        $record = User::model()->findByAttributes(array('username' => $this->username));
        if ($record === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        } else if ($record->password !== md5($this->password)) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        } else {
            $this->_id = $record->user_id;
            $this->setState('last_login_time', $record->last_login_time);
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

    public function getId() {
        return $this->_id;
    }

}

?>
