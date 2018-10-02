<?php
    $backgroundImage = "img/sea.jpg";
    
    function noData(){
        if(!isset($_GET["category"]) && $keyword == ""){
            echo "No keyword or category has been selected, TRY AGAIN!<br>";
        }
    }
    
    if (isset($_GET["keyword"])){ // checks if form has been submitted.
        include "api/pixabayAPI.php";
        // print_r($_GET); // Prints all values in GET.
        $keyword = $_GET["keyword"];
        
        if (!empty($_GET['category'])) { //user selected a category
            $keyword = $_GET['category'];
        }
        
        echo "Keyword: $keyword  ";
        
        
        
        echo "Layout: ", $_GET["layout"];
        
        $imageURLs = getImageURLs($keyword, $_GET["layout"]);
        $backgroundImage = $imageURLs[array_rand($imageURLs)];
    }
?>

<!DOCTYPE html>
<html>
    
    <head>
     <meta charset="utf-8">
     <title> Lab 4: Pixabay Slideshow </title>
     
     <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <link rel="stylesheet" href="css/styles.css" type="text/css" />
     
     <style>
         body {
             background-image: url(<?=$backgroundImage?>);
             background-size: cover;
         }
         #carouselExampleIndicators{
             width:700px;
             margin:0 auto;
         }
     </style>
    </head>

    <body>
        <form action="index.php" method="GET">
            <input type="text" name="keyword" size="15" placeholder="Keyword"/>
            <input type="radio" name="layout" value="horizontal"> Horizontal
            <input type="radio" name="layout" value="vertical"> Vertical
            
            <select name="category">
                <option value=""> Select One </option>
                <option value="ocean">Sea</option>
                <option>Mountains</option>
                <option>Forest</option>
                <option>Sky</option>
            </select>
            
            <input type="submit" value="Submit" name="submitButton"/>
        </form>
        
        <h1> Select a category or type a keyword </h1>
        <h1> <?=noData()?></h1>
    
        <?php
        if (isset($imageURLs)) { ?>
    
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
              <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <?php
                    for($i=1; $i < 7; $i++){
                        echo "<li data-target='#carouselExampleIndicators' data-slide-to='$i'></li>";
                    }
                ?>
              </ol>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="<?=$imageURLs[0]?>" alt="First slide">
                </div>
                <?php
                    for ($i = 1; $i < 7; $i++) {
                      echo "<div class=\"carousel-item\">";
                      echo "<img class=\"d-block w-100\" src=\"".$imageURLs[$i]."\" alt=\"Second slide\">";
                      echo "</div>";
                  }
                ?>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
        
        <?php }
        else{
            echo "No keyword or category has been selected, TRY AGAIN!<br>";
        }
        ?>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </body>
</html>