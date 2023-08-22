<php?
session_start();

//check if the login form is submitted
if(isset($_POST['username'])&& isset($_POST['password'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    if ($username=== 'admin' && $_password=== 'password' ){
        $_SESSION['admin'] = $username;
        header('Location:admin.php');
        exit();

    }else{
        $error="Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html>
   <head>
      <title>Blood Dopnation Management System- login.php</title>
       <link rel="stylesheet" href="style.css">
   </head>
   <body>
        <div class="login-form">
          <h2>Login</h2>
            <form method="POST">
                 <input type="text" name="username" placeholder="Enter your username" required><br>
                 <input type="text" name="password" placeholder="Enter your password" required><br>
                  <button type="submit">Login</button>
            </form>
        </div>
    </body>
</html>
