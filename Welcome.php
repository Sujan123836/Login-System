<?php

session_start();
if(!isset($_SESSION["loggedIn"]) || $_SESSION["loggedIn"]!=true){
  header("Location: Login.php");
  exit; 
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <?php include 'important/navbar.php';?>
    <div class="container my-3">
      <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p>
          Welcome
          <?php echo $_SESSION["username"];?>
          you have successfully logged in. You are welcomed at the most secure
          system (Isecure.) We hope we meet your expectations.
        </p>
        <hr />
        <p class="mb-0">
          Make sure you log out from here.To logout
          <a href="logout.php">Please Click the link</a>
        </p>
      </div>
    </div>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
