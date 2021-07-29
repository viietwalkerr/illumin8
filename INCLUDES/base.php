<?php

include 'SERVER/server.php';

  
    if (!empty($_SESSION['username']))
    {
        $username = $_SESSION['username'];
    }
 
    $query = "SELECT firstname, lastname, email FROM users WHERE username='$username'";
    $results = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($results);
    $firstname = $row['firstname'];
    $lastname = $row['lastname'];

?>
    <head>
        <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"/>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awrsome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6Tah5PvlGOfQNHSoD2xbE+QkPxCAFlNevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="CSS/style.css">
        <script type="text/javascript" src="JAVASCRIPT/myscripts.js"></script>

        
    </head>
    <body>
        <header>
        <button onclick="topFunction()" id="backToTopBtn" title="Go to top">
            <span></span>
            <span></span>
            <span></span>
            <span></span>Back to Top</button>
            
            <div class="sidenav">
                <ul>
                    <li>
                        <a href="Home">
                            <span class="icon"><i class="fas fa-home"></i></span>
                            <span class="title">Home</span>
                        </a>
                    </li>
                    <li>
                        <a href="About">
                            <span class="icon"><i class="fas fa-info"></i></span>
                            <span class="title">About</span>
                        </a>
                    </li>
                    <li>
                        <a href="Settings">
                            <span class="icon"><i class="fas fa-cog"></i></span>
                            <span class="title">Settings</span>
                        </a>
                    </li>
                    <li>
                        <a href="Contact">
                            <span class="icon"><i class="fas fa-question-circle"></i></span>
                            <span class="title">Contact</span>
                        </a>
                    </li>
                    <li>
                        <a href="Carousel">
                            <span class="icon"><i class="fas fa-spinner"></i></i></span>
                            <span class="title">Carousel</span>
                        </a>
                    </li>
                    <?php 
                    if (isset($_SESSION['username'])) : ?>
                    <li>
                        <a href="Home?logout='1'">
                            <span class="icon"><i class="fas fa-question-circle"></i></span>
                            <span class="title">Logout</span>
                        </a>
                    </li>
                    <?php endif ?>
                </ul>
            </div>

            <nav>
            
            <div class="logo">Illumin8</div>
                <ul>
                    <li><a href="Home">Home</a></li>
                    <li><a href="About">About</a></li>
                    <!--<li><a href="quotes.php">Quotes</a></li>-->
                </ul>
                <div class="nav-profile">
                    <ul>
                        
                        <!-- if not authenticated -->
                        <?php
                        if(!isset($_SESSION['username'])) : ?>
                        <li><a href="Login-Page">Login</a></li>
                        <li><a href="Registration-Page">Register</a></li>
                        <?php endif ?>

                        <!-- if authenticated -->
                        <?php
                        if (isset($_SESSION['username'])) : ?>
                        <li><a href="#">Profile<i class="fas fa-caret-down"></i></a>
                            <ul>
                                <li><a href="Profile">Profile</a></li>
                                <li><a href="Settings">Settings</a></li>
                                <li><a href="Index?logout='1'">Logout</a></li>
                            </ul>
                        </li>
                        <li><a href="Home?logout='1'">Logout</a></li>
                        <?php endif ?>
                        <li><a href="Contact">Contact</a></li>
                        <!--<li><div class="actionProfile">
                                <div class="profile" onclick="menuToggle();">
                                    <img src="ASSETS/images/smoking panda.jpg">
                                </div>
                                <div class="menuProfile">
                                    <h3>Someone Famous</h3>
                                    <ul>
                                        <li><a href="profile.php">Profile</a></li>
                                        <li><a href="index.php?logout='1'">Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>-->
                    </ul>
                </div>
            </nav>
            <div class="menu-toggle"><i class="fas fa-bars" aria-hidden="true"></i>
            </div>
        </header>

<script>
  //makes topnav links active
  for (var i = 0; i < document.links.length; i++)
  {
      if (document.links[i].href == document.URL)
      {
          document.links[i].className = 'active';
      }
  }

</script>
<script>

    function menuToggle(){
        const toggleMenu = document.querySelector('.menuProfile');
        toggleMenu.classList.toggle('active')
    }
</script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.menu-toggle').click(function(){
            $('nav').toggleClass('active')
        })
    })
    </script>
