<!DOCTYPE html>
<html lang="en">
<?php
    // Include database connection access
    include("databaseConnection.php");
    include("functions.php");
    include("head.php");
?>
<body style="width:100%;background-color:transparent">
    <div class="home-button">
        <a href="http://www.fallout4search.bradenmckewen.com">
            <button type="button" class="check-uncheck-button btn btn-primary home-button-style">Home</button>
        </a>
    </div>
    <!-- Header text -->
    <script>
        if (window.top == window) { // Is the main window
            document.getElementsByTagName('BODY')[0].setAttribute('id', 'landing-page-body');
            document.getElementsByClassName('home-button')[0].style.display = 'block'
            document.getElementsByTagName('BODY')[0].style.removeProperty('background-color');
        }
    </script>
    <div id="results-page" class="container">
        <!-- Table -->
        <?php
            // Gets
            $getFrontPageSearch = trim(strip_tags($_POST["contains"]));
            $getSearchGET = strip_tags($_GET["search"]);
            $getContainsGET = strip_tags(urldecode($_GET['contains']));
            $getLimitGET = strip_tags($_GET["limit"]);
            $getLimitPOST = strip_tags($_POST["limit"]);
            // Default limit if non given
            if (empty($getLimitGET)) $getLimitGET = 20000;
            if ($getLimitPOST > 3000) $getLimitPOST = 3000;
            if (!empty($getFrontPageSearch) && (empty($getSearchGET))){ // Needs to use Iframe, return more then one table
                $checkBoxes = $_POST["checkboxes"];
                include_Table_Iframes($pdo, $getFrontPageSearch, $getLimitPOST, $checkBoxes);
            } else { // Only returns one table
                include_Table_Single($pdo, $getSearchGET, $getContainsGET, $getLimitGET);
            }
        ?>
        <!-- Scripts needed for table -->
    </div>
    <div class="footer" style="display:block">
        <p>Copyright &copy; 2018 bradenmckewen.com. All rights reserved.</p>
    </div>
    <!-- Allows iframes to size with content -->
    <script src="js/resultingPage.js"></script>
</body>
</html>