<?php

session_start();
include 'INCLUDES/base.php';

?>

<head>

    <title>illumin8 Contact Us</title>

</head>

<main>
    <div class="page-content contactPage">
        <div class="login-box">
            <h3>Contact Us</h3>
            <form action="action_page.php">

                <div class="textbox">
                    <i class="fas fa-user"></i>
                    <input type="text" id="fname" name="firstname" placeholder="Your first name..">
                </div>

                <div class="textbox">
                    <i class="fas fa-user-check"></i>
                    <input type="text" id="lname" name="lastname" placeholder="Your last name..">
                </div>

                <div class="textbox">
                    <i class="fas fa-globe"></i>
                    <label for="country">Country..</label>
                    <select id="country" name="country">
                        <option value="Select Country">Select</option>
                        <option value="australia">Australia</option>
                        <option value="canada">Canada</option>
                        <option value="usa">USA</option>
                    </select>
                </div>

                <div class="textbox">
                    <i class="fas fa-comment-alt"></i>
                    <textarea id="subject" name="subject" placeholder="Subject..." style="height:200px"></textarea>
                    <br><br>
                </div>
                    <button type="submit" class="neonButton" name="register" id="register" value="register">
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>Submit</button>

            </form>
        </div>
    </div>
</main>


<?php include 'INCLUDES/footer.php'; ?>

</body>


