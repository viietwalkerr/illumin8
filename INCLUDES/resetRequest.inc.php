<?php 

if (isset($_POST["reset-request-submit"]))
{
    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    // $url = "127.0.0.1/n8sabyss3/Create-New-Password?selector=" . $selector . "&validator=" . bin2hex($token);
    $url = "http://illumin8.epizy.com/Create-New-Password?selector=" . $selector . "&validator=" . bin2hex($token);
    $url2 = str_replace(array('[',']'), '', $url);
    // echo $url;

    $expires = date("U") + 1800;

    require "../SERVER/server.php";

    $userEmail = $_POST["email"];

    $sql = "DELETE FROM pwdReset WHERE pwdResetEmail=?;";
    $stmt = mysqli_stmt_init($db);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error1!";
        exit();
    }
    else 
    {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdReset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($db);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error2!";
        exit();
    }
    else 
    {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($db);

    $to = $userEmail;

    $subject = 'Reset your password for illumin8';

    $message = '<p>There has been a request to reset your password. The link to reset your password can be found below.
    if you did not make this request, you can ignore this email</p>';

    // $message .= '<p>'. $url2 . '</p>';
    // $message .= '<p>'. $url . '</p>';

    $message .= '<p>Here is your your password reset link: <br>';
    $message .= "<a href='" . $url2 . "'>" .$url2 . '</a>';
    $message .= '</p>';
    // $message .=  $url2 . '</p>';

    $headers = "From: illumin8 <illumin8works@gmail.com>\r\n";
    $headers .= "Reply-To: <illumin8works@gmail.com>\r\n";
    $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

    $success = mail($to, $subject, $message, $headers);

    header("Location: ../Reset-Password?reset=success");
    echo $url;

    // if ($success)
    // {
    //     echo "EMAIL SENT SUCCESSFULLY!";

    // }
    // else
    // {
    //     echo "EMAIL FAILURE BRO!";
    // }
}
else 
{
    header("Location: ../Home");
}

?>