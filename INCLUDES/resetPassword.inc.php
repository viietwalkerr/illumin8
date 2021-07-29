<?php 

include '../SERVER/server.php';

if (isset($_POST["resetPasswordButton"]))
{
    $selector = $_POST["selector"];
    $validator = $_POST["validator"];
    $password = $_POST["password_1"];
    $password2 = $_POST["password_2"];

    if (empty($password) || empty($password2))
    {
        header("Location: ../Create-New-Password?newpassword=empty");
        exit();
    }
    else if ($password != $password2)
    {
        header("Location: ../Create-New-Password?newpassword=passwordnotmatch");
        exit();
    }

    $currentDate = date("U");


    $sql = "SELECT * FROM pwdReset WHERE pwdResetSelector=? AND pwdResetExpires>=?";
    $stmt = mysqli_stmt_init($db);
    if (!mysqli_stmt_prepare($stmt, $sql)) 
    {
        echo "There was an error1!";
        exit();
    }
    else
    {
        $currentDate = date("U");

        mysqli_stmt_bind_param($stmt, "ss", $selector, $currentDate);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if (!$row = mysqli_fetch_assoc($result))
        {
            echo "You need to re-submit your reset request!";
            exit();
        }
        else
        {
            $tokenBin = hex2bin($validator);
            $tokenCheck = password_verify($tokenBin, $row["pwdResetToken"]);

            if ($tokenCheck === false)
            {
                echo "You need to re-submit your reset request PLS!";
                exit();
            }
            else if ($tokenCheck === true)
            {
                $tokenEmail = $row['pwdResetEmail'];

                $sql = "SELECT * FROM users WHERE email=?;";
                $stmt = mysqli_stmt_init($db);
                if (!mysqli_stmt_prepare($stmt, $sql))
                {
                    echo "There was an error2!";
                    exit();
                }
                else
                {
                    mysqli_stmt_bind_param($stmt, "s", $tokenEmail);
                    mysqli_stmt_execute($stmt);
                    $result = mysqli_stmt_get_result($stmt);
                    if (!$row =  mysqli_fetch_assoc($result))
                    {
                        echo "There was an error3!";
                        exit();
                    }
                    else 
                    {
                        $sql = "UPDATE users SET password=? WHERE email=?;";
                        $stmt = mysqli_stmt_init($db);
                        if (!mysqli_stmt_prepare($stmt, $sql))
                        {
                            echo "There was an error4!";
                            exit();
                        }
                        else
                        {
                            $newpwdHash = password_hash($password, PASSWORD_DEFAULT);
                            mysqli_stmt_bind_param($stmt, "ss", $newpwdHash, $tokenEmail);
                            mysqli_stmt_execute($stmt);
                            header("Location: ../Login-Page?newpassword=passwordupdated");
                            array_push($success, "Password Changed Successfully!");


                        }
                    }
                }
            }
        }
    }
}
else
{
    header("Location: ../Index");
}

?>