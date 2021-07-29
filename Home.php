<?php

session_start();
include 'INCLUDES/base.php';


?>

<main>
    <div class="page-content centeredPage">
        <h1>Welcome to Illumin8!</h1>
        <p>
            This is the second iteration of my website, adding a lot of different touches
        </p>

        <?php if (isset($_SESSION['success'])) : ?>
        <div class="error success" >
      	<h3>
          <?php
          	echo $_SESSION['success'];
          	unset($_SESSION['success']);
          ?>
      	</h3>
  	    <?php endif ?>
    </div>
    <div class="clock">
        <div class="hour">
            <div class="hr" id="hr"></div>
        </div>
        <div class="min">
            <div class="mn" id="mn"></div>
        </div>
        <div class="sec">
            <div class="sc" id="sc"></div>
        </div>
    </div>
    <div id="digitalClock">
        <div id="hour"></div>
        <div id="minutes"></div>
        <div id="seconds"></div>
        <div id="ampm"></div>
    </div>
    <script>
        const hr = document.querySelector("#hr");
        const mn = document.querySelector("#mn");
        const sc = document.querySelector("#sc");

        setInterval(() => {
            var day = new Date();
            var hh = day.getHours() * 30;
            var mm = day.getMinutes() * 6;
            var ss = day.getSeconds() * 6;

            hr.style.transform = `rotateZ(${hh+(mm/12)}deg)`;
            mn.style.transform = `rotateZ(${mm}deg)`;
            sc.style.transform = `rotateZ(${ss}deg)`;

            var hour = document.querySelector("#hour");
            var minutes = document.querySelector("#minutes");
            var seconds = document.querySelector("#seconds");
            var ampm = document.querySelector("#ampm");

            var h = new Date().getHours();
            var m = new Date().getMinutes();
            var s = new Date().getSeconds();
            var am = "AM";

            if (h > 12){
                h = h - 12;
                am = "PM";
            }
            
            //add zero before single digits
            h = (h < 10) ? "0" + h : h
            m = (m < 10) ? "0" + m : m
            s = (s < 10) ? "0" + s : s

            hour.innerHTML = h + ":";
            minutes.innerHTML = m + ":";
            seconds.innerHTML = s;
            ampm.innerHTML = am;

            
        })
        </script>
</main>


<?php include 'INCLUDES/footer.php'; ?>

</body>
