<?php

require 'functions.inc.php';

// session_start();

//initialize variables
$username = "";
$email = "";
$errors = array();
$success = array();

//connect to the database
// try
// {
//     if ($db = mysqli_connect('sql313.epizy.com', 'epiz_26461012', 'n8sabyssadmin', 'epiz_26461012_n8sabyssphp'))
//     {
//         $db = mysqli_connect('sql313.epizy.com', 'epiz_26461012', 'n8sabyssadmin', 'epiz_26461012_n8sabyssphp');
//     }
//     else
//     {
//         $db = mysqli_connect('localhost', 'n8sabyssphp', 'n8sabyssphpadmin', 'n8sabyssphp');
//     }
// }
// catch(Exception $e)
// {
//     echo $e->getMessage();
// }
// $db = mysqli_connect('localhost', 'n8sabyssphp', 'n8sabyssphpadmin', 'n8sabyssphp');
// $db = mysqli_connect('sql313.epizy.com', 'epiz_26461012', 'illumin8admin', 'epiz_26461012_n8sabyssphp');
$db = mysqli_connect('sql102.epizy.com', 'epiz_27194277', 'illumin8admin', 'epiz_27194277_illumin8database');

if (!$db) {
  die("Connection failed: " . mysqli_connect_error());
}

//register user
if (isset($_POST['register'])) {
  //receive all input values from form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $firstname = mysqli_real_escape_string($db, $_POST['firstname']);
  $lastname = mysqli_real_escape_string($db, $_POST['lastname']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure the form is filled correctly
  // by adding (array_push()) corresponding error into $errors array
  if (empty($username))
  {
    array_push($errors, "Username is required");
  }
  if (empty($firstname))
  {
    array_push($errors, "Firstname is required");
  }
  if (empty($lastname))
  {
    array_push($errors, "Lastname is required");
  }
  if (empty($email))
  {
    array_push($errors, "Email is required");
  }
  if (empty($password_1))
  {
    array_push($errors, "Password is required");
  }
  if ($password_1 != $password_2)
  {
    array_push($errors, "The two passwords do no match");
  }


  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);

  if ($user)
  {
    if ($user['username'] === $username)
    {
      array_push($errors, "Username already exists");
    }
    if ($user['email'] === $email)
    {
      array_push($errors, "Email already in use");
    }
  }

  // Register a user if there are no errors in form
  if (count($errors) == 0)
  {
    //$password = md5($password_1); //encrypt the password before saving in the database

    // $query = "INSERT INTO users (username, firstname, lastname, email, password)
    //           VALUES('$username', '$firstname', '$lastname', '$email', '$password')";
    // mysqli_query($db, $query);

    $query = "INSERT INTO users (username, firstname, lastname, email, password)
               VALUES(?,?,?,?,?);";

    $stmt = mysqli_stmt_init($db);
    if (!mysqli_stmt_prepare($stmt, $query))
    {
      echo "There was an error creating your account!";
      exit();
    }
    else 
    {
      $hashedPassword = password_hash($password_1, PASSWORD_DEFAULT);
      mysqli_stmt_bind_param($stmt, "sssss", $username, $firstname, $lastname, $email, $hashedPassword);
      mysqli_stmt_execute($stmt);
    }
    


    //create profileimg row for user
    $query2 = "INSERT INTO profileimg (username, status)
              VALUES('$username', '0')";
    mysqli_query($db, $query2);

    //create folder for profile images
    mkdir('./UPLOADS'.'/'.$username);

    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: Home');
  }
}

// login users
if (isset($_POST['login']))
{
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username))
  {
    array_push($errors, "Username is required");
  }
  if (empty($password))
  {
    array_push($errors, "Password is required");
  }

  if (count($errors) == 0)
  {
    //$passwordDecrypt = md5($password);
    // $passwordDecrypt = password_hash($password, PASSWORD_DEFAULT);

    $uidExists = uidExists($db, $username, $username);


    //$findUser = "SELECT password FROM users WHERE username='$username'";
    //$userResults = mysqli_query($db, $findUser);

    $hashedPassword = $uidExists["password"];

    $passwordDecrypt = password_verify($password, $hashedPassword);

    if ($passwordDecrypt == false)
    {
      array_push($errors, "Incorrect password! Please try again WEW");

    }
    else 
    {
      $query = "SELECT * FROM users WHERE username='$username' AND password='$hashedPassword';";
      $results = mysqli_query($db, $query);
      //$results = mysqli_stmt_get_result($query);

      if (mysqli_num_rows($results) < 1)
      {
        array_push($errors, "Incorrect password! Please try again a du");
      }
      if (mysqli_num_rows($results) > 1)
      {
        array_push($errors, "Incorrect password! Please try again a joi");
      }
      if (mysqli_num_rows($results) == 1)
      {
        $_SESSION['username'] = $username;
        $_SESSION['success'] = "You are now logged in!";

        
        mkdir('./UPLOADS'.'/'.$username);

        header('location: Home');
      }
      else
      {
        array_push($errors, "Incorrect password! Please try again HAHA");
      }
    }
  }
}

if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: Login-Page");
  }


if (isset($_POST['profile'])) 
{
  $file = $_FILES['file'];

  $fileName = $_FILES['file']['name'];
  $fileTmpName = $_FILES['file']['tmp_name'];
  $fileSize = $_FILES['file']['size'];
  $fileError = $_FILES['file']['error'];
  $fileType = $_FILES['file']['type'];

  $fileExt = explode('.', $fileName);
  $fileActualExt = strtolower(end($fileExt));

  $allowed = array('jpg', 'jpeg', 'png');

  $username = $_SESSION['username'];

  if (in_array($fileActualExt, $allowed))
  {
    if ($fileError === 0)
    {
      if ($fileSize < 1000000) 
      {
        $fileNameNew = $username.'.'.$fileActualExt;
        $fileDesination = 'UPLOADS/'.$username.'/'.$fileNameNew;
        //$fileDesination = 'UPLOADS/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDesination);
        $sql = "UPDATE profileimg SET status=1 WHERE username='$username';";
        $resultUpload = mysqli_query($db, $sql);
        header("Location: Profile?uploadsuccess");
      }
      else
      {
        echo "Your file is too big!";
      }
    }
    else 
    {
      echo "There was an error uploading your file!";
    }
  }
  else 
  {
    echo "You cannot upload files of this type!";
  }
}

if (isset($_POST['remove'])) 
{
  $username = $_SESSION['username'];

  $sql = "UPDATE profileimg SET status=0 WHERE username='$username';";
  $resultUpload = mysqli_query($db, $sql);
  header("Location: Profile?removalsuccess");
}


?>
