<?php
  // Get given url information
  $getSearch = strip_tags($_GET['search']);

  // Query the table
  if (!empty($getSearch)){
    include("result.php");
    exit();
  }
  // Include database connection access
  include("databaseConnection.php");
?>

<!DOCTYPE html>
<html lang="en">
  <?php
    include("head.php");
  ?>
  <body id="landing-page-body" style="height=100%;background-color:black;">
  <div class="home-button" style="display:block;">
    <a href="http://www.fallout4search.bradenmckewen.com">
      <button type="button" class="check-uncheck-button btn btn-primary home-button-style">Home</button>
    </a>
  </div>
    <!-- Page container -->
    <div class="container">
        <!-- Header text -->
        <div class="col-lg-12 text-center">
          <h1 class="mt-5">Categories:</h1>
        </div>
        <!-- Grid of cards -->
        <?php
          $query = $pdo->prepare("SELECT * FROM Categories");
          if ($query->execute()){
            // Check if query returned any rows
            if ($query->rowCount() > 0){
              foreach ($query as $row){
                // Create an onclick on the div, allow it to be clicked and load the information
                echo('<a href="javascript:void(0)"><div class="column" onClick="setTable('."'".$row['TYPE']."'".');">');
                echo("<h3>".$row['name']."</h3>");
                echo("<p>".$row['TYPE']." - ".$row['description']."</p>");
                echo("</div></a>");
              }
            }
          }
        ?>
      <br><br>
      <!-- Iframe container for table -->
      <div id="iframe-container">
      </div>
    <script src="js\categories.js"></script>
    </div>
    <br>
    <div class="col-lg-12 text-center">
      <p style="color:white;">Copyright &copy; 2018 bradenmckewen.com. All rights reserved.</p>
    </div>
    <br>
  </body> 
</html>