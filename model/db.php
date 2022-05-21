<?php
Class Db {
    protected $dbName = "phpReccomendation";
    protected $server = "localhost";
    protected $password = "";
    protected $username = "root";
    protected $stmt, $dbHandler;

    public function __construct(){
        $Dsn = "mysql:host = " .$this->server .';dbname=' .$this->dbName; 

        $Options = array(
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

        );

        try {

            $this->dbHanler = new PDO($this->Dsn, $this->username, $this->password, $Options);
        } catch (Exception $e) {
            var_dump("Couldn\'t establish connection due to " .$e->getMessage());
        }
    }


    public function query($query){
        $this->stmt = $this->dbHanler->prepare($query);
    }

    public function bind($param, $value, $type = null){
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }

        $this->stmt->bindValue($param,$value,$type);

    }

    public function execute(){
        $this->stmt->execute();
        return true;
    }

    public function fetch(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function fatchAll(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>