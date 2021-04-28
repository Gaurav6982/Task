<?php
class LoginController
{
    private $db=null;
    public function __construct($db){
        $this->db=$db;
    }
    public function login(){
        if(isset($_POST['login_submit'])){
            if(!isset($_POST['email']) || !isset($_POST['password'])){
                session_unset($_SESSION["error"]);
                $_SESSION["error"]="Please fill all Fields";
                header('Location: login.php');
                exit;
            }
            $user=mysqli_real_escape_string($this->db->conn,$_POST['email']);
            $pass=md5(mysqli_real_escape_string($this->db->conn,$_POST['password']));
            $result=$this->db->conn->query("select * from user where email='$user' and password='$pass';");
            session_start();
            if(mysqli_num_rows($result)>0){
                $resultArray=array();
                while($item=mysqli_fetch_array($result,MYSQLI_ASSOC))
                {
                    $resultArray[]=$item;
                }
                $this->setSession($resultArray);

                header('Location: home.php');

            }
            else
            {
                $_SESSION["error"]="Invalid Credentials";
                header('Location: login.php');

            }
            exit;
//            echo "Here";

        }
    }
    public function setSession($resultArray){
                $_SESSION['id']=$resultArray[0]["id"];
                $_SESSION['name']=$resultArray[0]["name"];
                $_SESSION['dob']=$resultArray[0]["dob"];
                $_SESSION['course']=$resultArray[0]["course"];
                $_SESSION['email']=$resultArray[0]["email"];
    }
    public function register(){
        if(isset($_POST['register_submit'])){
            $name=mysqli_real_escape_string($this->db->conn,$_POST['name']);
            $dob=mysqli_real_escape_string($this->db->conn,$_POST['dob']);
            $course=mysqli_real_escape_string($this->db->conn,$_POST['course']);
            $email=mysqli_real_escape_string($this->db->conn,$_POST['email']);
            $pass=md5(mysqli_real_escape_string($this->db->conn,$_POST['password']));
            $result=$this->db->conn->query("Select * from user where email='$email';");
            $resultArray=array();
            while($item=mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
                $resultArray[]=$item;
            }
            session_start();
            if(count($resultArray)>0){

                $_SESSION["error"]="User Already Exist";
                header('Location: home.php');
                exit;
            }
//            echo $name." ".$dob." ".$course." ".$email." ".$pass;
            $result=$this->db->conn->query("Insert into user(name,dob,course,email,password) values('$name','$dob','$course','$email','$pass');");
            $resultArray=array();
            while($item=mysqli_fetch_array($result,MYSQLI_ASSOC))
            {
                $resultArray[]=$item;
            }
            if($result){
                $this->setSession($resultArray);
                header('Location: home.php');
                exit;
            }


        }
    }
    public function logout(){
        session_start();
        session_unset($_SESSION["name"]);
        session_unset($_SESSION["id"]);
        session_destroy();
        header('Location: index.php');
    }
}