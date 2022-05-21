<?php
require_once (__DIR__ .'/Db.php');
class loginModel extends Db{
    public function fetchAllEmail(string $email){
        $this->query("SELECT * FROM 'phpReccomendation' WHERE 'email' = :email ");
        $this->bind('email', $email);
        $this->execute();

        $Email = $this->fatch();
        if (empty($Email)) {
            $Response = array(
                'status' => true,
                'data' => $Email
            );
            return $Response;
        }elseif (!empty($Email)) {
            $Response = array(
                'status' => true,
                'data' => $Email
            );
            return $Response;
        }

        

    }

}

?>