<?php

function uidExists($db, $username, $email)
{
  $sql = "SELECT * FROM users WHERE username=? OR email=?;";
  $stmt = mysqli_stmt_init($db);

  if (!mysqli_stmt_prepare($stmt, $sql))
  {
    header("Location: ../Login-Page?error=stmtfailed");
    exit();
  }

  mysqli_stmt_bind_param($stmt, "ss", $username, $email);
  mysqli_stmt_execute($stmt);
  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData))
  {
    return $row;

  }
  else 
  {
    $result = false;
  }
  
}

?>