<?php

session_start();

include 'INCLUDES/base.php';

?>

<main>
    <div class="page-content loginPage">
    <div class="login-box">
      <h3>Login</h3>

      <?php 
      if (isset($_GET["newpassword"]))
      {
        if ($_GET["newpassword"] == "passwordupdated")
        {
          echo '<p class="signupsuccess">Your password has been reset!</p>';
        }
      }
      ?>

      <form class="form" name="LoginForm" method="post" action="Login-Page" onsubmit="return validate()">
      <?php
          include ('INCLUDES/errors.php');
          ?>
      <div class="textbox" id="usernameInput">
        <i class="fa fa-user" aria-hidden="true"></i>
        <input type="text" name="username" id="username" placeholder="Username" onkeyup="validateInput('login')" />
        <span class="indicator"></span>
      </div>
      <div class="textbox" id="passwordInput">
        <i class="fa fa-lock" aria-hidden="true"></i>
        <input type="password" id="password_1" placeholder="Password" name="password" onkeyup="validateInput('login')">
        <span class="indicator"></span>
      </div>
      <!--<input type="submit" class="neonButton" name="login" id="login" value="login">
        <span></span>
        <span></span>
        <span></span>
        <span></span></input>-->

      <button type="submit" class="neonButton" name="login" id="login" value="login">
        <span></span>
        <span></span>
        <span></span>
        <span></span>Login</button>

      

      <p>
        Forgot Password? <a href="Reset-Password">Reset Password</a>
      </p>
      <p>
        Don't have an account? <a href="Registration-Page">Register Here</a>
      </p>
    </div>
</form>
    </div>
</main>

<?php include 'INCLUDES/footer.php'; ?>

</body>
