<?php
class CurrentUser {
    
    public static function get() {
        $auth = Zend_Auth::getInstance();
        $auth_user = $auth->getIdentity();
        if( $auth_user == Null) {
            return Null;
        }
        $MUM = new Application_Model_MainUserMapper();
        $user = $MUM->findByEmail($auth_user);
        return $user;
    }
    
    public static function say() {
        echo "hi";
    }
}