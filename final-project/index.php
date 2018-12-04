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
                <div id="adminLogIn">
                    <a href="adminLogIn.php" class="btn btn-success">Admin Log In</a>
                </div>
                
                <form>
                    Enter name of product to search: <input type="text" id="productNameSearch"></input><br>
                    Price From:<input type="number" id="priceFrom" Min="0" Max="999" value="0"></input>
                    Price To: <input type="number" id="priceTo" Min="0" Max="999" value="999"></input><br>
                    Display All of Category: <select id="category"></select><br>
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
                    Use Instructions: To search, click on the search text field!<br>
                    Must select Order By, display price, and select category before searching!<br>
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
    var priceFrom = 0;
    var priceTo = 999.99;
    var displayPrice = true;
    var displayImg = true;
    var sortBy = 'ASC';
    var category = 0;
    
    $.ajax({ // This AJAX call displays our entire table once the page loads.
        type: "GET",
        url: "searchProduct.php",
        datatype: "json",
        data: { "productName": productName, "priceFrom": priceFrom, "priceTo": priceTo, "category": category },
        success: function(data, status) {
            $("#searchResults").html(""); // Clear out our search results before displaying new ones
            var obj = JSON.parse(data); // parse our json data into javascript values
            
            if (sortBy == 'ASC'){ // iterate over array like normal if we're sorting by ASC.
                for(var i =0; i < obj.length; i++){
                    $("#searchResults").append(obj[i].productName + " $" + obj[i].price + "<img src='" + obj[i].productImage + "' width='100px'><br>");
                }
            }
        }
    }); //ajax
    
    $.ajax({ // This AJAX call displays all of our categories once the page loads.
        type: "GET",
        url: "getCategories.php",
        datatype: "json",
        success: function(data, status) {
            var obj = JSON.parse(data); // parse our json data into javascript values
            $("#category").append("<option>Display Everything</option>");
            for(var i =0; i < obj.length; i++){
                $("#category").append("<option value='" + (i+1) + "'>" + obj[i].catName + "</option>");
            }
        },
        complete: function(data, status) { //optional, used for debugging purposes
            
        }
    }); //ajax
    
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
    
    $("#category").change(function() { // Change value of category, when changed.
        category = $("#category").val();
    }); // Display Price toggle
    
    $("#productNameSearch").click(function() {
        productName = $("#productNameSearch").val(); // Grab the values we need for our SQL statement.
        priceFrom = $("#priceFrom").val();
        priceTo = $("#priceTo").val();
                    $.ajax({
                        type: "GET",
                        url: "searchProduct.php",
                        datatype: "json",
                        data: { "productName": productName, "priceFrom": priceFrom, "priceTo": priceTo, "category": category },
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
