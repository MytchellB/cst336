<?php
    $zodiac = array("rat","ox","tiger","rabbit","dragon","snake","horse","goat","monkey","rooster","dog","pig");
    
    function listYears($startYear = 1500, $endYear = 2000){
        global $zodiac;
        $zodiacCounter = 0;
        $sumYears = 0;
        $i = $startYear - 1;
        while($i < $endYear){
            echo "<li> Year ".(++$i);
            if( $i == 1776 ){
                echo "<strong> USA INDEPENDENCE!</strong>";
            }
            if ( $i % 100 == 0){
                echo " HAPPY NEW CENTURY!";
            }
            echo "</li>";
            echo "<img src='img/$zodiac[$zodiacCounter].png'>";
            if($zodiacCounter == 11){
                $zodiacCounter = 0;
            }
            else{
                $zodiacCounter = $zodiacCounter + 1;
            }
            
            $sumYears = $sumYears + $i;
            echo "<hr>";
        }
        return "<br><strong> Year Sum: ".$sumYears."</strong>";
    }
    
    function listYearsTable($numRows, $numColumns){
        global $zodiac;
        $zodiacCounter = 0;
        $sumYears = 0;
        $yearCounter = 2020;
        echo "<table>";
        for ( $i = 0; $i < $numColumns; ++$i){
            echo "<tr>";
            for ($u = 0; $i < $numRows; ++$u){
                echo "<th>";
                echo "<img src='img/$zodiac[$zodiacCounter].png'>";
                if($zodiacCounter == 11){
                    $zodiacCounter = 0;
                }
                else{
                    $zodiacCounter = $zodiacCounter + 1;
                }
                echo " Year: $yearCounter ";
                $yearCounter = $yearCounter + 1;
                echo "</th>";
            }
            echo "</tr>";
        }
        // while($i < $endYear){
        //     echo "<li> Year ".(++$i);
        //     if( $i == 1776 ){
        //         echo "<strong> USA INDEPENDENCE!</strong>";
        //     }
        //     if ( $i % 100 == 0){
        //         echo " HAPPY NEW CENTURY!";
        //     }
        //     echo "</li>";
        //     echo "<img src='img/$zodiac[$zodiacCounter].png'>";
        //     if($zodiacCounter == 11){
        //         $zodiacCounter = 0;
        //     }
        //     else{
        //         $zodiacCounter = $zodiacCounter + 1;
        //     }
            
        //     $sumYears = $sumYears + $i;
        //     echo "<hr>";
        // }
        return "<br><strong> Year Sum: ".$sumYears."</strong>";
    }
    
    function list4Years($startYear = 1900, $endYear = 2000){
        global $zodiac;
        $zodiacCounter = 0;
        $sumYears = 0;
        $i = $startYear;
        while($i < $endYear){
            echo "<li> Year ".($i);
            $i = $i + 4;
            if( $i == 1776 ){
                echo "<strong> USA INDEPENDENCE!</strong>";
            }
            if ( $i % 100 == 0){
                echo " HAPPY NEW CENTURY!";
            }
            echo "</li>";
            if($zodiacCounter >= 11){
                $zodiacCounter = $zodiacCounter % 12;
            }
            echo "<img src='img/$zodiac[$zodiacCounter].png'>";
            if($zodiacCounter >= 11){
                $zodiacCounter = 0;
            }
            else{
                $zodiacCounter = $zodiacCounter + 4;
            }
            
            $sumYears = $sumYears + $i;
            echo "<hr>";
        }
        return "<br><strong> Year Sum: ".$sumYears."</strong>";
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Aces vs Kings </title>
        <style type="text/css">
            
        </style>
    </head>
    <body style="text-align:center">
        <h1> Chinese Zodiac Tasks</h1>
        <!--<form method="GET">-->
        <!--  Start Year:-->
        <!--  <input type="number" name="startYear" value="1500">-->
        <!--  <br>-->
        <!--  End Year:-->
        <!--  <input type="number" name="endYear" value="2000">-->
        <!--  <br><br>-->
        <!--  <input type="submit" value="Submit">-->
        <!--</form> -->
        <form method="GET">
          Start Year:
          <input type="number" name="numRows" >
          <br>
          End Year:
          <input type="number" name="numColumns">
          <br><br>
          <input type="submit" value="Submit">
        </form> 
        <ul>
            <?= listYearsTable($_GET['numRows'], $_GET['numColumns']); ?>
        </ul>
       
    </body>
</html>