<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section: DB Report Functions </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="styles/styles.css" type="text/css" />
        
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    </head>
    <body>
        
        <h1> Admin Report Functions </h1>
        
        Average Price:<div id="displayAvgPrice">
            
        </div>
        <input id="findAvgButton" type="button" name="find Average Price" value="Find Average Price"><br>
        
        <br>Highest Price:<div id="displayHighestPrice">
            
        </div>
        <input id="findHighestPrice" type="button" name="find Highest Price" value="Find Highest Price"><br>
        
        <br>Lowest Price:<div id="displayLowestPrice">
            
        </div>
        <input id="findLowestPrice" type="button" name="find Lowest Price" value="Find Lowest Price"><br>

        <a href='admin.php'>Admin Page</a>
    </body>
</html>

<script>
$("document").ready(function() {
    $("#findAvgButton").click(function() {
                    $.ajax({
                        url: "getAvgPrice.php",
                        datatype: "json",
                        success: function(data, status) {
                         
                            var obj = JSON.parse(data); // parse our json data into javascript values
                            $("#displayAvgPrice").html("$" + obj.price);
                        
                        }
                    }); //ajax
    }); // find avg click
    
    $("#findLowestPrice").click(function() {
                    $.ajax({
                        url: "getLowestPrice.php",
                        datatype: "json",
                        success: function(data, status) {
                         
                            var obj = JSON.parse(data); // parse our json data into javascript values
                            $("#displayLowestPrice").html(obj.productName + " is $" + obj.price);
                        
                        }
                    }); //ajax
    }); // find Highest Price click
    
    $("#findHighestPrice").click(function() {
                    $.ajax({
                        url: "getHighestPrice.php",
                        datatype: "json",
                        success: function(data, status) {
                         
                            var obj = JSON.parse(data); // parse our json data into javascript values
                            $("#displayHighestPrice").html(obj.productName + " is $" + obj.price);
                        
                        }
                    }); //ajax
    }); // find Highest Price click
}); // doc ready
</script>
