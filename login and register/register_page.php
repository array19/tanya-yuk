<?php 
 
include '../function/config.php';
 
error_reporting(0);
 
session_start();
 
if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
  
    $pemilik_insert_query = "INSERT INTO pengguna(username, password) VALUES('$username', '$password')";  
    
    $pemilik_result = pg_query($db, $pemilik_insert_query);  
  
    
    if($pemilik_result) {
      header("Location: ../page/homepage.php");
    } else {
      header('Location: ../page/homepage.php');  
    }
  }
 
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 
    <link rel="stylesheet" type="text/css" href="style.css">
 
    <title>Niagahoster Register</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Register</p>
            <div class="input-group">
                <input type="text" placeholder="Username" name="username" value="<?php echo $username; ?>" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" value="<?php echo $_POST['password']; ?>" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text">Anda sudah punya akun? <a href="../login and register/login_page.php">Login </a></p>
        </form>
    </div>
</body>
</html>