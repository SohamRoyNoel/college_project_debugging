<?php
function escape($string){
    global $connection;
    return mysqli_real_escape_string($connection, trim($string));
}

function Confirm(){
    header("Location: userlogin.php");
    echo "<script>alert(\"You've been registered; LOGIN to continue\")</script>";
}
function Confirm1(){
    header("Location: companylogin.php");
    echo "<script>alert(\"You've been registered; LOGIN to continue\")</script>";
}
function Hold(){
    echo "<script>alert(\"There is another account with this email.\")</script>";
//    header("Location: userlogin.php");
}
function Confirm3(){
    echo "<script>alert(\"Wrong password entered.\")</script>";
}
function redirect($location){
    header("Location:" . $location);
    exit;

}

function isLoggedIn(){
 if(isset($_SESSION['email'])){
    return true;
  }
return false;
}

function checkIfUserIsLoggedInAndRedirect($redirectLocation=null){
 if(isLoggedIn()){
  redirect($redirectLocation);
  }
}
function ifItIsMethod($method=null){

    if($_SERVER['REQUEST_METHOD'] == strtoupper($method)){

        return true;

    }

    return false;

}
function login_user($email,$password)
 {

     global $connection;

      $query = "SELECT * FROM creators WHERE email = '{$email}' ";
     $select_user_query = mysqli_query($connection, $query);
     if (!$select_user_query) {

         die("QUERY FAILED" . mysqli_error($connection));
      }
     while ($row = mysqli_fetch_array($select_user_query)) {

         $db_user_id = $row['id'];
         $db_username = $row['name'];
         $db_user_password = $row['password'];
         $db_user_email = $row['email'];
         $db_user_no = $row['no'];
         $db_user_extra = $row['extra'];
         $db_user_img = $row['img'];
          $db_user_address = $row['address'];
         $db_user_sex = $row['sex'];


         if ($password == $row['password']) {

             $_SESSION['name'] = $db_username;
             $_SESSION['email'] = $db_user_email;
             $_SESSION['em'] = $db_user_email;
             $_SESSION['no'] = $db_user_no;
             $_SESSION['extra'] = $db_user_extra;
             $_SESSION['img'] = $db_user_img;
             $_SESSION['address'] = $db_user_address;
             $_SESSION['sex'] = $db_user_sex;
             $_SESSION['secret'] = "XXX107";



             redirect("/JOBS/admin");


         } else {


            echo "<script>alert(\"Opppps! Wrong Email or Password.\")</script>";


         }



     }

     return true;

 }
