<!DOCTYPE html>
<html>

<head>
    <title> RPS </title>
    <style type="text/css">
        body {
            background-color: black;
            color: white;
            text-align: center;
        }

        .row {
            display: flex;
            justify-content: center;
        }

        .col {
            text-align: center;
            margin: 0 70px;
        }

        .matchWinner {
            background-color: yellow;
            margin: 0 70px;
        }

        #finalWinner {
            margin: 0 auto;
            width: 500px;
            text-align: center;
        }
        
        hr {
            width:33%;
        }        
    </style>
    
    <?php 
        function generateRPS(){
            $randVal = rand(0,2);
            switch ( $randVal ) {
                case 0: $randSelection = "paper";
                    break;
                case 1: $randSelection = "rock";
                    break;
                case 2: $randSelection = "scissors";
                    break;
            }
            
            $new = "<img src='img/rps/$randSelection.png' alt='$randSelection' title='".ucfirst($randSelection)."' />"; // Redundant variable $new
            
            echo $new;
        }
    ?>
</head>

<body>

    <h1> Rock, Paper, Scissors </h1>

    <div class="row">
        <div class="col">
            <h2>Player 1</h2>
        </div>
        <div class="col">
            <h2>Player 2</h2>
        </div>
    </div>
    
    <div class="row">
        <div class='col'><img src='img/rps/scissors.png' alt='scissors' width='150'></div>
        <div class='col, matchWinner'><img src='img/rps/rock.png' alt='rock' width='150'></div>
    </div>
    <hr>

    <div class="row">
        <div class='col'><img src='img/rps/rock.png' alt='rock' width='150'></div>
        <div class='col, matchWinner'><img src='img/rps/paper.png' alt='paper' width='150'></div>
    </div>
    <hr>
    
    <div class="row">
        <div class='col, matchWinner'><img src='img/rps/paper.png' alt='paper' width='150'></div>
        <div class='col'><img src='img/rps/rock.png' alt='rock' width='150'></div>
    </div>
    <hr>

    <div id="finalWinner">

        <h1>The winner is Player 2</h1>

    </div>
    Images source: https://www.kisspng.com/png-rockpaperscissors-game-money-4410819/
    <?php
        generateRPS();
    ?>
</body>

</html>
