<!DOCTYPE html>
<html>
    <head>
        <title> Admin Section: Find Average Price of All Items </title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" type="text/css" />
        <link rel="stylesheet" href="styles/styles.css" type="text/css" />
        
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
    </head>
    <body>
        
        <h1> Finding Average Price of All Items </h1>
        
        <div id="displayAvgPrice">
            

        </div>
        <input id="findAvgButton" type="button" name="find Average Price" value="Find Average Price"><br>

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
                            $("#displayAvgPrice").html(obj.price);
                        
                        },
                        complete: function(data, status) { //optional, used for debugging purposes
                            // alert(status);
                        }
                    }); //ajax
    }); // find avg click
}); // doc ready
</script>
