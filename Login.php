<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <?php include 'important/navbar.php';?>
  <?php include '_dbconnect.php'; ?>
  <?php 
     $empty=false;
     $error=false;
     $login=false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $usname=$_POST["uname"];
      $password=$_POST["Password"];
      $sql="SELECT * FROM users WHERE Username = '{$usname}' AND Password = '{$password}'";
      $result = mysqli_query($conn, $sql);
      if (mysqli_num_rows($result) == 1) {
        $login=true;
        session_start(); //starting the session
        $_SESSION["loggedIn"]=true; 
        $_SESSION["username"]=$usname;
        header("Location: Welcome.php");
        exit;
      }else{
        $error=true;
      }

       mysqli_close($conn);
      }
      
      
      
    
  ?>
  
  <?php 
//   if($empty){
//     echo "<div class='alert alert-danger' role='alert'>
//   OOPS! Some field is empty. 
//     </div>";
//   }
  if($error){
    echo "<div class='alert alert-danger' role='alert'>
  OOPS! Password Error.
    </div>";
  }
  if($login){
    echo "<div class='alert alert-success' role='alert'>
  You are logged in  !!
</div>";
  }
  
  ?>
  <div class="container">
  <h1 align="center"> Login </h1>
  <form action="login.php" method="POST">
  <div class="mb-3">
    <label for="uname" class="form-label">UserName</label>
    <input type="text" class="form-control" id="uname" name="uname" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="Password" class="form-label">Password</label>
    <input type="password" class="form-control" id="Password" name="Password">
  </div>
  

  
  <button type="submit" class="btn btn-primary">LOGIN</button>
</form>
  </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>