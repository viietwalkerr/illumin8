<?php

session_start();

  include 'INCLUDES/base.php';

  $query ="SELECT * FROM quotes ORDER BY id";
  $results = mysqli_query($db, $query);
?>

  <!-- Banner -->
  
<main>
    <div class="page-content quotesPage">
          <h1>Quotes</h1>
      <!-- block content -->
          <table id=quotes>
          <thead>
          <tr>
            <th colspan="5" style=" text-align: center">Quote</th>
          </tr>
          </thead>
          <?php
          $rowLine = 0;

          echo "<tr>";
          foreach ($results as $row)
          {

            echo '<td><span></span><div class="quoteContent">';
            echo "{$row['quote']}</div></td>";

            $rowLine++;
            
            if ($rowLine % 5 == 0)
            {
              echo "</tr>";
              echo "<tr>";
            }
          }
          echo "</tr>";
          ?>
          </table>
          <!-- end block content -->
    </div>
</main>

<?php include 'INCLUDES/footer.php'; ?>

</body>


