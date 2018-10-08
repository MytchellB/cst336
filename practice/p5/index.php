
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <style>
        	main, #output {
        		text-align:center;
        		width:800px;
        		border-radius:20px;
        		margin: 0 auto;
        	}
        	main {
        		 background-color: lightpink;
        	}
        </style>
        
    </head>
    <body>
      <main>
      	<h1> Custom Password Generator </h1>
        <form action="index.php" method="GET">
            How many passwords? <input type="number" name="numPasswords" size="2" min="0" max="8"> (No more than 8)
            <br/>  <br/>
            <strong>Password Length</strong>
            <br />
            <input type = "radio" name="length" value="6" id="six"><label for ="six"> 6 characters</label>
            <input type = "radio" name="length" value="8" id="eight"><label for ="eight"> 8 characters</label>
            <input type = "radio" name="length" value="10" id="ten"><label for ="ten"> 10 characters</label>
            <br /> <br />
            <input type="checkbox" name="includeDigits"/> Include digits (up to 3 digits will be part of the password)
               <br /> <br />      
            <input type="submit" value ="Create Passwords!" name="submitForm" ><br><br>
            <br />       
        </form>
        
        <form action="displayPasswordHistory.php">
        	   <input type="submit" value ="Display Password History" name="passwordHistory" > 
        </form>
        <br />
        </main>
         <br /><br />
        <div id="output" name="output">
            
        </div>
        
    </body>
    <?php
        $myBigArray = array();
        generatePassword();
        
        function generatePassword() {
            $numOfPasswords = $_GET['numPasswords'];
            $length = $_GET['length'];
            $digits = false;
            global $myBigArray;
            
           
            if (isset($_GET['includeDigits'])) {
                $digits = true;
            }
            $characters = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
            for($i=0; $i < $numOfPasswords; $i++){
                $u=0;
                $myPass = "";
                while($u < $length){
                    if($u == 1 && $digits == true){
                    $myPass = $myPass.'123';
                    $u += 3;
                }
                    $myPass = $myPass.$characters[rand(0,25)];
                    $u++;
                }
                echo "<div style='text-align:center'>", $myPass, "</div><br>";
                
                array_push($myBigArray, $myPass);
                $_GET['output'] = $_GET['output'].$myPass;
            }
            sort($myBigArray);
            print_r($myBigArray);
        }
    ?>
</html>