<?php


    class App{

        public $host = HOST;
        public $dbname = DBNAME;
        public $user = USER;
        public $pass = PASS;

        public $link;



        // create a construct 

        public function __construct() {

            $this->connect();
        }
        
            
        public function connect() {
            $this->link = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname."",$this->user, $this->pass);

            if($this->link) {
                // echo "Db connecton Working";
            }
        }


        // select All
        public function selectAll($query) {

           $rows = $this->link->query($query);
           $rows->execute();

           $allRows = $rows->fetchAll(PDO::FETCH_OBJ);

           if($allRows) {

            return $allRows;

           } else {

                return false;

           }
        }

         // select one row
         public function selectOne($query) {

            $row = $this->link->query($query);
            $row->execute();
 
            $singleRow = $row->fetch(PDO::FETCH_OBJ);
 
            if($singleRow) {
 
             return $singleRow;
 
            } else {
 
                 return false;
 
            }

         }


         // validate cart 

         public function validateCart($q){
            $row = $this->link->query($q);
            $row->execute();
            $count = $row->rowCount();
            return $count;
         }




        //Insert Query
         public function insert($query, $arr, $path) {

            if($this->validate($arr) == "empty") {
               echo "<script>alert('One or More inputs are empty')</script>";
            } else {

                $insert_record = $this->link->prepare($query);
                $insert_record->execute($arr);

                echo "<script>window.location.href='".$path."'</script>";
            }
         }

         //Update Query
         public function update($query, $arr, $path) {

            if($this->validate($arr) == "empty") {
              echo "<script>alert('One or More inputs are empty')</script>";
            } else {

                $update_record = $this->link->prepare($query);
                $update_record->execute($arr);

                header("location: ".$path."");
            }
         }
         
         //delete Query 
         public function delete($query, $path) {


            $delete_record = $this->link->query($query);
            $delete_record->execute();

            echo "<script>window.location.href='".$path."'</script>";

        }
         

         public function validate($arr) {
            if(in_array("", $arr)) {
                echo "empty";
            }
         }

        //Register Query
        public function register($query, $arr, $path) {

            if($this->validate($arr) == "empty") {
              echo "<script>alert('One or More inputs are empty')</script>";
            } else {

                $register_user = $this->link->prepare($query);
                $register_user->execute($arr);

                header("location: ".$path."");
            }
         }



        //Login Query
        public function login($query, $data, $path) {

            //email_validation

            $login_user = $this->link->query($query);
            $login_user->execute();

            $fetch = $login_user->fetch(PDO::FETCH_ASSOC);

            if($login_user->rowCount() > 0) {

                //password
                if(password_verify($data['password'], $fetch['password'])) {
                   
                    echo "<script>htmlspecialchars('Invalid Email Or Password')</script>";
                // 
             
                } else {
                    //session variables
                    $_SESSION['username'] = $fetch['username'];
                    $_SESSION['email'] = $fetch['email'];
                    $_SESSION['user_id'] = $fetch['id'];

                    header("location: ".$path."");
                }
            }

        }

        //starting session 

        public function startingSession() {
            session_start();
        }


        //validiting session 

        public function validateSession() {
            if(isset($_SESSION['user_id'])) {
               echo "<script>window.location.href='".APPURL."'</script>";
            }
        }

        public function validateSessionAdmin() {
            if(isset($_SESSION['email'])) {
               echo "<script>window.location.href='".ADMINURL."/index.php'</script>";
            }
        } 
        public function validateSessionAdminInside() {
            if(!isset($_SESSION['email'])) {
               echo "<script>window.location.href='".ADMINURL."/admins/login-admins.php'</script>";
            }
        }
    }
?>
