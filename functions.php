<?php
    // Functions class, contains functions used by the website

    /*----------------------------------------------------
    -- include_Table_Iframes()
    -- Creates an Iframe of a given table, givne the condition
    -- @param $pdo: The current database connection
    -- @parma $getSearch: The table to check
    -- @param $getContains: The condition to check
    ----------------------------------------------------*/
    function include_Table_Single($pdo, $getSearch, $getContains, $getLimit) {
        // Query the table
        if (empty($getContains)){
            // Gets all from a table
            $query = get_All_From_Table($pdo, $getSearch, $getLimit);
        }else{
            // Gets all from a table given a condition (LIKE)
            $query = get_All_From_Table_Given_Condition($pdo, $getSearch, $getContains, $getLimit);                
        }
        $queryTableInfomration = get_Find_Category_Given_type($pdo, $getSearch);
        // Check if query has results
        if (($query) && ($queryTableInfomration)){
            // Get name for the given table
            $tbTitle = $queryTableInfomration->fetch()['name'];
            echo("<div class='table-top'>");
            echo("<h1 class='wait-text' style='display:block;text-align:center;'>Please Wait... Large collection of results...</h1>");
            echo("<div class='show-hide-table' style='display:none'>");
            echo("<h2 class='header-for-main' style='display:none;text-align:center;'>$tbTitle</h2>");
            include('table.php'); // Include the table
            echo("</div></div>");
        } else {
            die("<h1 style='text-align:center;'>No Results...</h1>");
        }
    }

    /*----------------------------------------------------
    -- include_Table_Iframes()
    -- Creates an Iframe of a given table, givne the condition
    -- @param $pdo: The current database connection
    -- @param $getSearch: The condition to check
    -- @parma $checkBoxes: The POST of checkboxes array
    ----------------------------------------------------*/
    function include_Table_Iframes($pdo, $getSearch, $getLimit, $checkBoxes) {
        $queryAll = $pdo->query("SELECT * FROM Categories");
        $hasResults = FALSE; // If the table has any results
        if (empty($checkBoxes)) {die("<h1 style='text-align:center;'>No Results...</h1>");}
        // Loop through every table
        foreach($queryAll as $row){
            $tableType = $row['TYPE']; // Get data type for the table
            $tableName = $row['name'];
            if (in_array($tableType, $checkBoxes))
            {
                // Get all from a table given a condition and check if it's empty
                if (get_All_From_Table_Given_Condition($pdo, $tableType, strtolower($getSearch), $getLimit)){
                    echo("<h2 style='text-align:center;'>$tableName</h2>");
                    echo("<iframe class='holds-the-iframe' src='result?search=$tableType&contains=$getSearch&limit=$getLimit' width='100%' frameborder='0' onload='resizeIframe(this)'></iframe>");
                    $hasResults = TRUE;
                }  
            }
        }
        // If no tables were created, no results were found
        if (!$hasResults) die("<h1 style='text-align:center;'>No Results...</h1>");
    }
    
    /*----------------------------------------------------
    -- CreateCheckBoxes()
    -- Creates checkboxes given the query
    -- @param $query: a given query
    ----------------------------------------------------*/
    function CreateCheckBoxes($query) {
        foreach($query as $row){
            $name = $row['name'];
            $type = $row['TYPE'];
            echo("<div class='check-button checkbox checkbox-primary' checked>");
            echo("<input type='checkbox' class='form-check-input' id='check-box-$name' name='checkboxes[]' value='$type' checked>");
            echo("<label class='form-check-label' for='check-box-$name'>$name</label>");
            echo("</div>");
        }
    }

    /*----------------------------------------------------
    -- get_Table_Given_Condition()
    -- Returns all results from a table contanting
    -- @param $pdo: The current database connection
    -- @param $table: The table to check on
    -- @param $condition: The condition to check
    -- @return The query or null if failed 
    ----------------------------------------------------*/
    function get_All_From_Table_Given_Condition($pdo, $table, $condition, $limit) {
        // Get column names from table
        $tbColumns = get_Table_Columns($pdo, $table);
        if ($tbColumns) {
            // Create the base query
            $stringQuery = "SELECT * FROM $table WHERE id LIKE '%$condition%'";
            // Loop through all columns and append it to the query as a like condition, so it checks all columns
            foreach($tbColumns->fetchAll() as $row){
                $colName = $row['Field'];
                $stringQuery = $stringQuery . "OR $colName LIKE '%$condition%'";
            }
            // Add limit to rows
            $stringQuery = $stringQuery . " LIMIT $limit";
            //$query = $pdo->prepare("SELECT * FROM $table WHERE id LIKE '%$condition%' OR LOWER(baseID) LIKE '%$condition%' OR LOWER(givenName) LIKE '%$condition%' OR LOWER(editorName) LIKE '%$condition%'");
            $query = $pdo->prepare($stringQuery);
            return Check_Query($query);
        }
        return NULL;
    }

    /*----------------------------------------------------
    -- get_Table_Given_Condition()
    -- Returns all results from a table contanting
    -- @param $pdo: The current database connection
    -- @param $table: The table to check on
    -- @return The query or null if failed
    ----------------------------------------------------*/
    function get_All_From_Table($pdo, $table, $limit) {
        $query = $pdo->prepare("SELECT * FROM $table LIMIT $limit");
        return Check_Query($query);
    }

    
    /*----------------------------------------------------
    -- get_Find_Category_Given_type()
    -- Returns all results from a table contanting
    -- @param $pdo: The current database connection
    -- @param $condition: The condition to check
    -- @return The query or null if failed
    ----------------------------------------------------*/
    function get_Find_Category_Given_type($pdo, $condition){
        $query = $pdo->prepare("SELECT * FROM Categories WHERE TYPE LIKE '%$condition%'");
        return Check_Query($query);
    }

    /*----------------------------------------------------
    -- get_Table_Given_Condition()
    -- Returns all results from a table contanting
    -- @param $pdo: The current database connection
    -- @param $table: The table to check on
    -- @return The query or null if failed
    ----------------------------------------------------*/
    function get_Table_Columns($pdo, $table) {
        $query = $pdo->prepare("SHOW COLUMNS FROM $table");
        return Check_Query($query);
    }

    /*----------------------------------------------------
    -- get_Table_Given_Condition()
    -- Returns all results from a table contanting
    -- @param $query: A query
    -- @return The query or null if failed
    ----------------------------------------------------*/
    function Check_Query($query){
        if ($query->execute()){
            // Check if query returned any rows
            if ($query->rowCount() > 0) return $query;
        }
        return NULL;
    }
?>