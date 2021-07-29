<?php

session_start();
include 'INCLUDES/base.php';

?>

<main>
    <div class="page-content centeredPage">
        <div class="login-box">
            <h3>Reset Password</h3>
            <p>An e-mail will be sent to you with instructions on how to reset your password. </p>
            
            <form action="INCLUDES/resetRequest.inc.php" method="post">
                <div class="textbox">
                <i class="fas fa-envelope-square"></i>
                    <input type="text" name="email" placeholder="Enter your e-mail address...">
                </div>
                <button type="submit" class="neonButton" name="reset-request-submit">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>Send Request</button>

            </form>

            <?php 
                if (isset($_GET["reset"])) {
                    if ($_GET["reset"] == "success") {
                        echo '<p class="signupsuccess">Check your e-mail!</p>';
                        
                    }
                }

                ?>
        </div>
    </div>

</main>