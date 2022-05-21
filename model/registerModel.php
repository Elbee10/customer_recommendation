<?php
require_once (__DIR__ .'/db.php' );
class registerModel extends Db{
    public function createUser(array $user){
        $this->query("INSERT INTO 'customers' ('first_name', 'last_name', 'email','username','password','repeat_password',
                    'address' ,'dob') VALUES (:first_name, :last_name, :email,:username,:password,:repeat_password,
                    :address,:dob)");
    }
}

?>