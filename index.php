<?php
  // Get given url information
  $getSearch = strtoupper(strip_tags($_GET['search']));

  // Query the table
  if (!empty($getSearch)){
    include("result.php");
    exit();
  }
  include("databaseConnection.php");
  include("functions.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/stylesheet.css" rel="stylesheet">
    </head>
    <body id="landing-page-body">
        <div class="wrap">
        <h1 class="title">Fallout 4 Search</h1>
            <ul class="nav nav-pills">
                <li class="nav-item">
                  <a class="nav-item-overwrite" href="categories">Categories</a>
                </li>
                <li class="nav-item">
                  <a class="nav-item-overwrite" href="javascript:void(0)" onClick="onClickFilters();">Filters</a>
                </li>
                <li class="nav-item">
                  <a class="nav-item-overwrite" href="info">Site Information</a>
                </li>
                <li class="nav-item">
                  <a class="nav-item-overwrite" href="http://www.bradenmckewen.com?page=contact-me">Contact Me</a>
                </li>
            </ul>
            <form action="result" method="post">
                <div class="main-checkbox-holder" style="width:100%;display:none;background-color: rgba(0, 0, 0, 0.43);overflow: scroll;overflow-x: hidden;">
                    <button type="button" class="check-uncheck-button btn btn-primary" style="margin-top:10px;background-color:#337ab7;width:96%;" href="javascript:void(0)" onClick="CheckAndUnCheck();">Check/Uncheck All</button>
                    <label for="limit" style="color:white;/* text-align:center; *//* width: 100%; */padding-top: 5px;padding-left: 10px;" class="col-2 col-form-label">Tables Data Limit:</label>
                    <div style="padding-right: 78%;/* padding-left: 30%; */padding-left: 10px;" id="limit" class="col-10">
                        <input class="form-control" type="number" name="limit" value="100">
                    </div>
                    <?php
                        // Get all the categories
                        $query = $pdo->query("SELECT * FROM Categories");
                        // Create the checkboxes given the data
                        echo("<div class='check-button-groups' style='float:left;'>");
                        CreateCheckBoxes($query);
                        echo("</div>");
                    ?>
                </div>
                <div class="search">
                    <input type="text" class="searchTerm" name="contains" required>
                    <button type="submit" class="searchButton">
                        <i class="fa fa-search">Search</i>
                    </button>
                </div>
            </form>
        </div>
        <div class="footer">
            <p>Copyright &copy; 2018 bradenmckewen.com. All rights reserved.</p>
        </div>
        <script src="js/landingPage.js"></script>
    </body>
</html>