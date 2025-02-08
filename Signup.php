<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SignUp</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
  <?php include 'important/navbar.php';?>
  <?php include '_dbconnect.php'; ?>
  <?php 
     $empty=false;
     $error=false;
     $regissuccess=false;
     $dusername=false;
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $usname=$_POST["uname"];
      $password=$_POST["Password"];
      $cpassword=$_POST["CPassword"];
      $resempty=(empty($usname) || empty($password) || empty( $cpassword)); //empty result of checking (using or)
      if($resempty){
        $empty=true;
       
      }if($password==$cpassword){
        $ressql="SELECT * FROM `users` WHERE Username='$usname'"; //checking duplicate username
        $result = mysqli_query($conn, $ressql);
        if (mysqli_num_rows($result) > 0) {
        $dusername=true;
        }
      }
      if($password!=$cpassword){
        $error=true;
      }
      if(!$resempty && $password==$cpassword ){
        if(!$dusername){
          $sql = "INSERT INTO `users`( `Username`, `Password`) VALUES ('$usname','$password')";
        if (mysqli_query($conn, $sql)) {
          $regissuccess=true;
        } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        }
        
      }
      mysqli_close($conn);
    }
  ?>
  
  <?php // this is for message as success , empty and Password Error.
  if($empty){
    echo "<div class='alert alert-danger' role='alert'>
  OOPS! Some field is empty. 
    </div>";
  }
  if($error){
    echo "<div class='alert alert-danger' role='alert'>
  OOPS! Password Error.
    </div>";
  }
  if($regissuccess){
    echo "<div class='alert alert-success' role='alert'>
  User Registration Success !!
</div>";
  }
  if($dusername){
    echo "<div class='alert alert-danger' role='alert'>
  Duplicate Username !!
</div>";
  }
  ?>
  <div class="container">
  <h1 align="center"> Sign Up </h1>
  <form action="Signup.php" method="POST">
  <div class="mb-3">
    <label for="uname" class="form-label">UserName</label>
    <input type="text" class="form-control" id="uname" name="uname" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="Password" class="form-label">Password</label>
    <input type="password" class="form-control" id="Password" name="Password">
  </div>
  <div class="mb-3">
    <label for="Confirm Password" class="form-label"> Confirm Password</label>
    <input type="password" class="form-control" id="CPassword" name="CPassword">
    <div id="emailHelp" class="form-text">Make sure your password match.</div>
  </div>

  
  <button type="submit" class="btn btn-primary">SignUp</button>
</form>
  </div>
  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>