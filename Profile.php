<?php
  session_start();

  if (!isset($_SESSION['username']))
  {
    $_SESSION['msg'] = "You must log in first";
    header('location: loginPage.php');
  }

  include 'INCLUDES/base.php';

  $username = $_SESSION['username'];
  $query = "SELECT firstname, lastname, email FROM users WHERE username='$username'";
  $query2 = "SELECT * FROM profileimg WHERE username='$username'";
  $results = mysqli_query($db, $query);
  $results2 = mysqli_query($db, $query2);
  $row = mysqli_fetch_assoc($results);
  $row2 = mysqli_fetch_assoc($results2);
  $firstname = $row['firstname'];
  $lastname = $row['lastname'];
  $email = $row['email'];

?>

<main>
    <div class="page-content">
        <div class="profile-card">
            <div class="card-header">
                <div class="pic">
                <?php  

                  if ($row2['status'] == 1)
                  {
                    echo "<img src='UPLOADS/".$username."/".$username.".jpg'>";
                  }
                  else 
                  {
                    echo "<img src='UPLOADS/profile default.jpg'>";
                  }
                  ?>
                   <!--<img src="ASSETS/images/smoking panda.jpg" alt="John">-->
                </div>
                <div class="name">
                <?php
                    echo $row['firstname'] . " " . $row['lastname'];
                ?>
                </div>
                <div class="desc">Developer & Desiger</div>
                <div class="sm">
                    <a href="#" class=" fab fa-facebook-f"></a>
                    <a href="#" class=" fab fa-twitter"></a>
                    <a href="#" class=" fab fa-github"></a>
                    <a href="#" class=" fab fa-youtube"></a>
                </div>
                </div>
                <div class="card-footer">
                <div class="numbers">
                    <div class="item">
                    <span>120</span>
                    Posts
                    </div>
                    <div class="item">
                    <span>584</span>
                    Followers
                    </div>
                    <div class="item">
                    <span>423</span>
                    Following
                    </div>
                </div>
            </div>
        </div>
        <div class="tab">
        <button class="tablinks" onclick="openCity(event, 'About')">About</button>
        <button class="tablinks" onclick="openCity(event, 'Skills')">Skills</button>
        <button class="tablinks" onclick="openCity(event, 'Contact')">Contact</button>
      </div>

      <!-- Tab content -->
      <div id="About" class="tabcontent">
        <h3>User:</h3>
        <?php
          echo "<p>Username: ". $username;
          echo "<p>Firstname: ".$firstname;
          echo "<p>Lastname: ".$lastname;
          echo "<p>Email: ".$email;
        ?>
      </div>
      <div id="Skills" class="tabcontent">
        <h3>Skills</h3>
        <ul id="skillsList">
            <li>HTML</li>
            <li>CSS</li>
            <li>JavaScript</li>
            <li>PHP</li>
        </ul>
      </div>
      <div id="Contact" class="tabcontent">
        <h3>Contact</h3>
        <p>Phone: N/A</p>
        <p>Email: N/A</p>
      </div>
    </div>
</main>

<?php include 'INCLUDES/footer.php'; ?>

</body>
