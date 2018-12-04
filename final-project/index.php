<?php
session_start();



include '../inc/dbConnection.php';
$dbConn = startConnection("books");

include 'inc/functions.php';

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" /> 
        <title>Final Project - CST 336</title>
        
        
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        
        <script src="jsFunctions.js"></script>
    </head>
    
    <body>
        <main>
            <div>
                <header>User Search!</header>
                <a href="adminLogIn.php">Admin Log In</a>
                
                <form>
                    Enter name of product to search: <input type="text" id="productNameSearch"></input><br>
                    Sort Results By:
                    <input type="radio" id="sortBy" name="sortBy" value="ASC" checked <?=checkSortRadio("ASC")?>>
                    <label for="asc">ASC</label>
                    <input type="radio" id="sortBy2" name="sortBy" value="DESC" <?=checkSortRadio("DESC")?>>
                    <label for="desc">DESC</label><br>
                    <span id="displayPriceInput">Display Price? </span><input type="checkbox" id="displayPrice" name="displayPrice" checked><br>
                    <span id="displayImgInput">Display Product Image? </span><input type="checkbox" id="displayImg" name="displayImg" checked><br>
                </form>
                
                <hr>
                <div id='searchResults'>
                    
                </div>
                
                <br><br><hr>
                <footer>
                    Use Instructions: To search, click on the search text field!
                    Must select Order By, and display price before typing in search value!
                    For educational purposes only - Mytchell Beaton
                </footer>
            </div>
        </main>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <link href="styles/styles.css" rel="stylesheet" />

    </body>

</html>

<script>
$("document").ready(function() {
    var productName = ""; // Sets product name to blank to select all elements from DB
    
    $.ajax({ // This AJAX call displays our entire table once the page loads.
        type: "GET",
        url: "searchProduct.php",
        datatype: "json",
        data: { "productName": productName },
        success: function(data, status) {
         
            $("#searchResults").html(""); // Clear out our search results before displaying new ones
            var obj = JSON.parse(data); // parse our json data into javascript values
            
            if (sortBy == 'ASC'){ // iterate over array like normal if we're sorting by ASC.
                for(var i =0; i < obj.length; i++){
                    $("#searchResults").append(obj[i].productName + " $" + obj[i].price + "<img src='" + obj[i].productImage + "' width='100px'><br>");
                }
            }
        
        },
        complete: function(data, status) { //optional, used for debugging purposes
        
        }
    }); //ajax
    
    // Rest of our variables are here
    var displayPrice = true;
    var displayImg = true;
    var option3 = false;
    var sortBy = 'ASC';
    
    $("#sortBy").click(function() { // Change our sort By value to ASC
        sortBy = $("#sortBy").val();
    }); // ASC search Button
    
    $("#sortBy2").click(function() { // Change our sort By value to DESC
        sortBy = $("#sortBy2").val();
    }); // DESC search Button
    
    $("#displayPrice").change(function() { // Change value of display price from true to false and vice versa, when clicked.
        if (displayPrice == false){
            displayPrice = true;
        }
        else{
            displayPrice = false;
        }
    }); // Display Price toggle
    
    $("#displayImg").change(function() { // Change value of display price from true to false and vice versa, when clicked.
        if (displayImg == false){
            displayImg = true;
        }
        else{
            displayImg = false;
        }
    }); // Display Price toggle
    
    $("#productNameSearch").click(function() {
        productName = $("#productNameSearch").val();
                    $.ajax({
                        type: "GET",
                        url: "searchProduct.php",
                        datatype: "json",
                        data: { "productName": productName },
                        success: function(data, status) {
                         
                            $("#searchResults").html(""); // Clear out our search results before displaying new ones
                            // alert(data);
                            var obj = JSON.parse(data); // parse our json data into javascript values
                            
                            if (sortBy == 'ASC'){ // iterate over array like normal if we're sorting by ASC.
                                for(var i =0; i < obj.length; i++){
                                    $("#searchResults").append(obj[i].productName);
                                    if(displayPrice){ // WILL display price
                                        $("#searchResults").append(" $" + obj[i].price);
                                    }
                                    if(displayImg) { // Will display Image
                                        $("#searchResults").append("<img src='" + obj[i].productImage + "' width='100px'>");
                                    }
                                    $("#searchResults").append("<br>");
                                }
                            }
                            else{ // Instead of using SQL to search DESC, we're just going to iterate over our array backwards.
                                for(var i =obj.length - 1; i >= 0; i--){
                                    $("#searchResults").append(obj[i].productName);
                                    if(displayPrice){ // WILL display price
                                        $("#searchResults").append(" $" + obj[i].price);
                                    }
                                    if(displayImg) { // Will display Image
                                        $("#searchResults").append("<img src='" + obj[i].productImage + "' width='100px'>");
                                    }
                                    $("#searchResults").append("<br>");
                                }
                            }
                        },
                        complete: function(data, status) { //optional, used for debugging purposes
                            // alert(status);
                        }
                    }); //ajax
    }); // product name search
}); // doc ready
</script>
