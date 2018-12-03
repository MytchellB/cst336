<?php
session_start();



include '../inc/dbConnection.php';
$dbConn = startConnection("ottermart");

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
                    Enter name of product to search: <input type="text" id="productNameSearch"></input>
                </form>
                <div id='searchResults'>
                    
                </div>
                
                <br><br><hr>
                <footer>
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
    $("#productNameSearch").change(function() {
        var productName = $("#productNameSearch").val();
                    $.ajax({
                        type: "GET",
                        url: "searchProduct.php",
                        datatype: "json",
                        data: { "productName": productName },
                        success: function(data, status) {
                         
                            alert(data);
                            var obj = JSON.parse(data); // parse our json data into javascript values
                            // alert(obj.length);
                            // alert(obj);
                            
                            for(var i =0; i < obj.length; i++){
                                $("#searchResults").append(obj[i].productName + "<br>");
                            }
                            
                            // alert(obj[0].productName);
                            // $("#searchResults").html(obj[0].productName);
                            
                            
                            // for (var i =0; i < data.length; i++){
                            //     var obj = JSON.parse(data); // parse our json data into javascript values
                            //     $("#searchResults").html(obj);
                            // }
                        
                        },
                        complete: function(data, status) { //optional, used for debugging purposes
                            // alert(status);
                        }
                    }); //ajax
    }); // product name search
}); // doc ready
</script>
