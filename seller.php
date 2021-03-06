<?php 
    class Seller {
        public $id;
        public $username;
        public $bank_number;
        public $bank_account;
        public $bank_name;
        public $status;

        public static function check_is_seller($username) {
            global $database;

            $sql = "SELECT * FROM sellers WHERE username = '{$username}' AND status = 'approved'";
            $result = $database->query($sql);

            return mysqli_num_rows($result);
        }

        public static function check_duplicate_seller($username) {
            global $database;

            $sql = "SELECT * FROM sellers WHERE username = '{$username}'";
            
            $result = $database->query($sql);

            return mysqli_num_rows($result);
        }

        public function create_seller() {
            global $database;

            $sql  = "INSERT INTO sellers (username, bank_number, bank_account, bank_name, status) ";
            $sql .= "VALUES ('{$this->username}', '{$this->bank_number}', '{$this->bank_account}', '{$this->bank_name}', 'pending')";
            return $database->query($sql);
        }


        public function get_seller_id() {
            global $database;

            $sql = "SELECT id FROM sellers WHERE username = '{$this->username}'";

            return $database->query($sql);
        }
    }

    $seller = new Seller();
?>