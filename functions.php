<?php 

    define('DB_SERVER', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASS', '');
    define('DB_NAME', 'register_oop');

    class DB_con {
        private $dbcon;
        function __construct(){
            $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
            $this->dbcon = $conn;

            if (mysqli_connect_errno()) {
                echo "Failed to connect to MySQL:" . mysqli_connect_error();
            } 
        }
        
        public function usernameavailable($uname) {
            $checkuser = mysqli_query($this->dbcon, "SELECT username FROM tblusers WHERE username = '$uname'");
            return $checkuser;
        }

        public function registration($fname, $uname, $uemail, $password){
            $reg = mysqli_query($this->dbcon, "INSERT INTO tblusers(fullname, username, useremail, password) VALUES('$fname', '$uname', '$uemail', '$password')");
            return $reg;
        }

        public function signin($uname, $password) {
            $signinquery = mysqli_query($this->dbcon, "SELECT id, fullname FROM tblusers WHERE username = '$uname' AND password = '$password'");
            return $signinquery;

        }
    }
?>