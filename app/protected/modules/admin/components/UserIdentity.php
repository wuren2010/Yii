<?php

class UserIdentity extends CUserIdentity {

    private $_id;

    public function authenticate() {
        $user = User::model()->find('LOWER(username) = ?', array(strtolower($this->username)));
        if ($user === null)
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        else if ($user->password !== md5($this->password))
            $this->errorCode = self::ERROR_PASSWORD_INVALID;
        else {
            $this->_id = $user->user_id;
            $user->last_login_time = date('Y-m-d H:i:s', time());
            $this->setState('nickname', $user->nickname);
            $this->setState('last_login_time', $user->last_login_time);
            $user->save(true,array('last_login_time'));
            $this->errorCode = self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

    public function getId() {
        return $this->_id;
    }

}

?>
