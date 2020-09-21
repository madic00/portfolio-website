<?php 

    class User extends DbObject {
        public $idUser;
        public $firstName;
        public $lastName;
        public $email;
        public $pass;
        public $birthdate;
        public $gender;
        public $idRole = 3;

        protected static $dbTable = "users";
        protected static $idColumnName = "idUser";
        protected static $tableFields = array("firstName", "lastName", "email", "pass", "birthdate", "gender", "idRole");

        public static function verifyUser($email, $pass) {
            global $db;

            $pass = md5($pass);
            $sql = "SELECT * FROM " . self::$dbTable . " WHERE email = '{$email}' AND pass = '{$pass}'";

            $user = self::getByQuery($sql);

            return !is_null($user) ? $user : false;
        }

    }

?>