<?php

session_start();
include 'INCLUDES/base.php';

?>

<main>
    <div class="page-content centeredPage">
        <div class="login-box">
            <h3>Create New Password</h3>

            <?php
                $selector = $_GET["selector"];
                $validator = $_GET["validator"];
                
                if (empty($selector) || empty($validator)) 
                {
                    echo "Could not validate your request!";
                }
                else 
                {
                    if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false)
                    {
                        ?>

                        <form action="INCLUDES/resetPassword.inc.php" method="post">
                            <input type="hidden" name="selector" value="<?php echo $selector; ?>">
                            <input type="hidden" name="validator" value="<?php echo $validator; ?>">
                            <div class="textbox" id="passwordInput">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                <input type="password" name="password_1" id="password_1" placeholder="Enter a new password..."  onkeyup="validateInput('createNewPassword')"/>
                                <span class="indicator"></span>
                            </div>
                            <div class="textbox" id="password2Input">
                                <i class="fa fa-lock" aria-hidden="true"></i>
                                <input type="password" name="password_2" id="password_2" placeholder="Confirm new password..." onchange="validateInput('createNewPassword')" onkeyup="validateInput('createNewPassword')"/>
                                <span class="indicator"></span>
                            </div>
                            <button type="submit" class="neonButton" name="resetPasswordButton">
                                <span></span>
                                <span></span>
                                <span></span>
                                <span></span>Reset Password</button>
                        </form>

                        <?php 
                    }
                }
            ?>

            
        </div>
    </div>

</main>