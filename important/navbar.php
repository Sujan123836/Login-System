<?php
if (!isset($_SESSION)) {
  // no session has been started yet
  session_start();
}
$loggedn=false;
if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"]==true){
 $loggedn=true;
}
?>
<?php
 echo' <nav class="navbar navbar-expand-lg bg-dark-tertiary navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/LOGIN SYSTEM">Secure System</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      
          <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/LOGIN SYSTEM/Welcome.php">Home</a>
        </li>';
       
       if(!$loggedn){
        echo '<li class="nav-item">
          <a class="nav-link" href="/LOGIN SYSTEM/login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/LOGIN SYSTEM/Signup.php">SignUp</a>
        </li>';
       }
       if($loggedn){
        echo '<li class="nav-item">
          <a class="nav-link" href="/LOGIN SYSTEM/logout.php">LogOut</a>
        </li>';
       }
        
       
        
        

        
        
      echo '</ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>';
?>