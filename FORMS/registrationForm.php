<?php

session_start();

include 'INCLUDES/base.php';

?>

<main>
    <div class="page-content">
    <div class="login-box registerPage">
        <h3>Register</h3>
        <form id="registrationForm" name="RegistrationForm" method="post" action="Registration-Page" onsubmit="return validate()">
          <?php
          include ('INCLUDES/errors.php');
          ?>
                
                <div class="textbox" id="usernameInput">
                  <i class="fas fa-user-tag"></i>
                  <input type="text" name="username" id="username" placeholder="Username" onkeyup="validateInput('registration')" />
                  <span class="indicator"></span>
                </div>
        

                <div class="textbox" id="firstnameInput">
                  <i class="fas fa-user"></i>
                  <input type="text" name="firstname" id="firstname" placeholder="First Name" onblur="validate_firstname()" onchange="validate_firstname()" onkeyup="validateInput('registration')"/>
                  <span class="indicator"></span>
                </div>
                

                <div class="textbox" id="lastnameInput">
                  <i class="fas fa-user-check"></i>
                  <input type="text" name="lastname" id="lastname" placeholder="Last Name" onblur="validate_lastname()" onchange="validate_lastname()" onkeyup="validateInput('registration')"/>
                  <span class="indicator"></span>
                </div>
                

                <div class="textbox" id="emailInput">
                  <i class="fas fa-envelope-square"></i>
                  <input name="email" id="email" type="email" placeholder="Email@address.com" onblur="validate_email()" onchange="validate_email()" onkeyup="validateEmail()" />
                  <span class="indicator"></span>
                </div>
                

                <div class="textbox" id="passwordInput">
                  <i class="fa fa-lock" aria-hidden="true"></i>
                  <input type="password" name="password_1" id="password_1" placeholder="Password" onchange="validate_password()" onkeyup="validateInput('registration')"/>
                  <span class="indicator"></span>
                </div>
                

                <div class="textbox" id="password2Input">
                  <i class="fa fa-lock" aria-hidden="true"></i>
                  <input type="password" name="password_2" id="password_2" placeholder="Confirm Password" onchange="confirm_password()" onkeyup="validateInput('registration')"/>
                  <span class="indicator"></span>
                </div>
              

                <!--<br/><br/><input type="submit" name="register" id="register" value="register" />-->

                <button type="submit" class="neonButton" name="register" id="register" value="register">
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>Register</button>

                <p>
                  Already a member? <a href="Login-Page">Sign In</a>
        </form>
      </div>
    </div>
</main>

<?php include 'INCLUDES/footer.php'; ?>

</body>
