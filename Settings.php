<?php

session_start();

if (!isset($_SESSION['username']))
{
  $_SESSION['msg'] = "You must log in first";
  header('location: Login-Page');
}


include 'INCLUDES/base.php';



?>

<main>
    <div class="page-content centeredPage">
        <h2>Upload a profile picture</h3>
            <form action="Settings" method="POST" enctype="multipart/form-data">
                <input type="file" name="file">
                <button type="submit" class="neonButton" name="profile" id="profile" value="profile">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>Upload</button>
            </form>

        <h2>Remove current profile picture</h2>
        <form action="Settings" method="POST" enctype="multipart/form-data">
            <button type="submit" class="neonButton" name="remove" id="remove" value="remove">
                <span></span>
                <span></span>
                <span></span>
                <span></span>Remove</button>
        </form>

    </div>
</main>

<?php include 'INCLUDES/footer.php'; ?>

</body>
