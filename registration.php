<?php
require 'config.php';
if(!empty($_SESSION["id"])){
    header("Location: index.php");
}
if(isset($_POST["submit"])) {
    $name=$_POST["name"];
    $username=$_POST["username"];
    $email=$_POST["email"];
    $phone=$_POST["phone number"];
    $password=$_POST["password"];
    $confirmpassword=$_POST["confirmpassword"];
    $duplicate=mysqli_query($conn,"SELECT * FROM final WHERE username='$username' OR email='$email'");
    if(mysqli_num_rows($duplicate)>0){
        echo
        "<script> alert('username or Email Has Already Taken'); </script>";
    }
    else{
        if($password == $confirmpassword){
            $query = "INSERT INTO `final`(`name`, `username`, `email`, `phone`, `password`) VALUES ('$name','$username','$email','$phone','$password')";
            mysqli_query($conn,$query);
            echo
            "<script> alert('Registration Successful'); </script>";
        }
        else{
            echo
            "<script> alert('Password Does Not Match'); </script>";
        }
    }

}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Registration</title>
        <link rel="stylesheet" href="regis.css"/>
        
</head>
<body>
    <h2>Registration</h2>
    <form class="" action="" method="post" autocomplete="off">
        <label for="name">Name : </label>
        <input type="text" name="name" id= "name" required value=""><br>
        <label for="username">Username : </label>
        <input type="text" name="username" id= "username" required value=""><br>
        <label for="email">Email : </label>
        <input type="text" name="email" id= "email" required value=""><br>
        <label for="phone">Phone number : </label>
        <input type="text" name="phone" id= "phone" required value=""><br>
        <label for="password">Password : </label>
        <input type="text" name="password" id= "password" required value=""><br>
        <label for="confirmpassword">Confirm Password : </label>
        <input type="text" name="confirmpassword" id= "confirmpassword" required value=""><br>
        <button type="submit" name="submit">Register</button>

</form>
<br>
<button><a href="login.php">Login</a></button>
</body>
</html>
