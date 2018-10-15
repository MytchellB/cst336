<?php
    function formIsValid() {
        if (empty($_GET['month']) || empty($_GET['country'])) {
            echo "<h1> ERROR!!! You must select a month and country</h1>";
            return false;
        }
        return true;
    }
    
    function createTable() {
        $month = $_GET["month"];
        $country = $_GET["country"];
        $numLocations = $_GET["locationsNumber"];
        $order = $_GET["order"];
        
        $numDays = 0;
        if($month == "November"){
            $numDays = 30;
        }
        if($month == "December" || $month == "January"){
            $numDays = 31;
        }
        if($month == "February"){
            $numDays = 28;
        }
        
        // echo $month, $country, $numLocations, $order;
        echo "<h2> $month Itinerary <br></h2>";
        echo "Visiting $numLocations locations in $country";
        
        $visited = array();
        for($i=0; $i < $numLocations; $i = $i + 1){
            $rand = rand(0,27);
            while(in_array($rand, $visited)){
                $rand = rand(0,27);
            }
            $visited[$i] = $rand;
        }
        
        $weekCounter = 0;
        for($i=0; $i < $numDays; $i = $i + 1){
            if($weekCounter == 0){
                echo "<tr>";
                $weekCounter = $weekCounter + 1;
            }
            else if($weekCounter <= 6){
                $weekCounter = $weekCounter + 1;
            }
            
            echo "<td>", $i+1;
            if(in_array($i, $visited)){
                echo "<br>";
                if($country == "USA"){
                    printUSA();
                }
                if($country == "Mexico"){
                    printMexico();
                }
                if($country == "France"){
                    printFrance();
                }
            }
            
            echo "</td>";
            
            if ($weekCounter == 7){
                echo "</tr><br>";
                $weekCounter = 0;
            }
            
        }
        
    }
    
    $alreadyVisited = array();
    
    function printUSA(){
        global $alreadyVisited;
        $rand = rand(0,5);
            while(in_array($rand, $alreadyVisited)){
                $rand = rand(0,5);
            }
        array_push($alreadyVisited, $rand);
            
        $USA = array("chicago", "hollywood", "las_vegas", "ny", "washington_dc", "yosemite");
        echo "<img src='img/USA/$USA[$rand].png'>";
        echo ucwords($USA[$rand]);
    }
    
    function printMexico(){
        global $alreadyVisited;
        $rand = rand(0,5);
            while(in_array($rand, $alreadyVisited)){
                $rand = rand(0,5);
            }
        array_push($alreadyVisited, $rand);
        
        $mexico = array("acapulco", "cabos", "cancun", "chichenitza", "huatulco", "mexico_city");
        echo "<img src='img/Mexico/$mexico[$rand].png'>";
        echo ucwords($mexico[$rand]);
    }
    
    function printFrance(){
        global $alreadyVisited;
        $rand = rand(0,5);
            while(in_array($rand, $alreadyVisited)){
                $rand = rand(0,5);
            }
        array_push($alreadyVisited, $rand);
        
        $france = array("bordeaux", "le_havre", "lyon", "montpellier", "paris", "strasbourg");
        echo "<img src='img/France/$france[$rand].png'>";
        echo ucwords($france[$rand]);
    }
    
    formIsValid();
?>

<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <style>
        	main {
        		text-align:center;
        		margin: 0 auto;
        		font-size: 3em;
        	}
        	body {
        	    background-color: lightblue;
        	}
        	label {
        	    font-size: .75em;
        	}
        	form {
        	    margin-top: 20px;
        	}
        	input {
        	    font-size: 1em;
        	}
            td {
                width: 150px;
                height: 100px;
            }
            table {
                text-align: center;
                margin-left: 15%;
                background-color: white;
            }
            header {
                background-color: blue;
                color: white;
            }
            select {
                font-size: .75em;
            }
        </style>
        
    </head>
    <body>
        <main>
            <header> Winter Vacation Planner! </header>
            
            <form>
                Select Month:
                <select name="month"> 
                    <option value>Select</option>
                    <option>November</option>
                    <option>December</option>
                    <option>January</option>
                    <option>February</option>
                </select><br>
                
                Number of Locations:
                <input type="radio" name="locationsNumber" value="3" id"1" checked>
                <label for="1">Three</label>
                <input type="radio" name="locationsNumber" value="4" id"2">
                <label for="2">Four</label>
                <input type="radio" name="locationsNumber" value="5" id"3">
                <label for="3">Five</label><br>
                
                Select Country:
                <select name="country"> 
                    <option value>Select</option>
                    <option>USA</option>
                    <option>Mexico</option>
                    <option>France</option>
                </select><br>
                
                Visit Locations in alphabetical order:
                <input type="radio" name="order" value="A-Z" id"4" checked>
                <label for="4">A - Z</label>
                <input type="radio" name="order" value="Z-A" id"5">
                <label for="5">Z - A</label><br><br>
                
                <input type="submit" value="Create Itinerary">
                
            </form>
            
            <table frame="box" border="1">
                <?php
                    createTable();
                ?>
            </table>
            <?php
            echo "Monthly Itinerary: <br> Month: ", $_GET['month'], ", Visiting ", $_GET['locationsNumber'], " places in ", $_GET['country'];
            ?>
        </main>
        
    </body>
</html>