<?php

include '../../inc/dbConnection.php';
$dbConn = startConnection("c9");


function displayCategories() { 
    global $dbConn;
    
    $sql = "SELECT DISTINCT category FROM p1_quotes ORDER BY category";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //print_r($records);
    //echo "<hr>";
    //echo $records[2] . "<br>";
    //echo $records[1]['catDescription'] . "<br>";
    
    foreach ($records as $record) {
        echo "<option value='".$record['category']."'>" . $record['category']  . 
        
        
        
        
        "</option>";
    }
}

function filterProducts() {
    global $dbConn;
    
    $namedParameters = array();
    $keyword = $_GET['keyword'];
    
  
    $sql = "SELECT * FROM p1_quotes WHERE 1"; //Gettting all records from database
    
    if (!empty($keyword)){
        //This SQL prevents SQL INJECTION by using a named parameter
         $sql .=  " AND quote LIKE :keyword";
         $namedParameters[':keyword'] = "%$keyword%";
    }
    
    if (!empty($_GET['category'])){
        //This SQL prevents SQL INJECTION by using a named parameter
         $sql .=  " AND category = :category";
         $namedParameters[':category'] = $_GET['category'] ;
    }
    
    // if ( !empty($_GET['priceFrom']) ) {
    //      $sql .=  " AND price >= :priceFrom";
    //      $namedParameters[':priceFrom'] = $_GET['priceFrom'] ;
    // }
    
    // if ( !empty($_GET['priceTo']) ) {
    //      $sql .=  " AND price <= :priceTo";
    //      $namedParameters[':priceTo'] = $_GET['priceTo'] ;
    // }
    
    // //echo $sql;
    
    if (isset($_GET['orderBy'])) {
        
        if ($_GET['orderBy'] == "az") {
            
            $sql .= " ORDER BY quote ASC";
        } else {
            
              $sql .= " ORDER BY quote DESC";
        }
        
        
    }

    $stmt = $dbConn->prepare($sql);
    $stmt->execute($namedParameters);
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);  
    // print_r($records);
    
    
    
    if ( !empty($_GET['keyword']) || isset($_GET['category']) ) {
        foreach ($records as $record) {
            
            echo $record['quote'] . "<b><i>" . " (" . $record['author'] . ")" . "</i></b>" . "<br><br>";
            
        }
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Practice 7</title>
        
        <style>
            body {
                text-align: center;
                font-size: 2em;
            }
            #quotes{
                width:600px;
                margin:0 auto;
                text-align: left;
            }
            #title {
                background-color: silver;
                padding-top: 20px;
                padding-bottom: 20px;
            }
            form {
                padding-top: 25px;
            }
        </style>
    </head>
    <body>
        
        <div>
            <div id="title">
                <h1> Famous Quote Finder </h1>
            </div>
            
            <form>
            Enter Quote Keyword <input type="text" name="keyword" value="<?=$_GET['keyword']?>"  /><br><br>
            Category:
                     <select name="category">
                         <option value=""> Select One </option>
                         <?=displayCategories()?>
                                         </select><br><br>
              Order  <br>
                  <input type="radio" name="orderBy" value="az" <?= ($_GET['orderBy'] == 'az')?" checked ":""?>
                    /> A-Z <br>
                  <input type="radio" name="orderBy" value="za" <?= ($_GET['orderBy'] == 'za')?" checked ":""?>
                    /> Z-A <br>
              
            <br>
            
            <input type="submit" value="Display Quotes!"/>

      </form>
            <br>
            <hr>
        </div>    
        
        <div id="quotes">
        <?= filterProducts() ?>
        </div>
        
    


    </body>
</html>