<?php
    include '../../inc/dbConnection.php';
    $dbConn = startConnection("ottermart");
    
    function displayCategories() {
        global $dbConn;
        $sql = "SELECT * FROM om_category ORDER BY catName";
        $stmt = $dbConn -> prepare($sql);
        $stmt -> execute();
        $records = $stmt -> fetchAll(PDO::FETCH_ASSOC); // Creates array of values.
        // print_r($records);
        
        FOREACH ($records as $record) {
            echo "<option>" . $record['catName'] . "</option><br>";
        }
    }
    
    function filterProducts(){
        $product = $_GET['productName'];
        global $dbConn;
        $sql = "SELECT productName FROM om_product
        WHERE productDescription LIKE :product ORDER BY productName";
        
        $namedParameters = array();
        $namedParameters[':product'] = "%$product%";
        
        $stmt = $dbConn -> prepare($sql);
        $stmt -> execute($namedParameters);
        $records = $stmt -> fetchAll(PDO::FETCH_ASSOC);
        
        FOREACH ($records as $record) {
            echo $record['productName'] . "<br>";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        
    </head>
    <body>
        <main>
            <h1> Ottermart </h1>
            <h2> Product Search </h2>
            
            <form>
                Product: <input type="text" name="productName" placeholder="Product Keyword" /><br>
                Category: 
                <select name="category">
                    <option value="" > Select One </option>
                    <?= displayCategories(); ?>
                </select>
                <input type="submit" name="submit" value="Search!" />                
            </form>
            <?= filterProducts(); ?>
      	    
      	    
        </main>
         <br/><br/>
    </body>
    
</html>