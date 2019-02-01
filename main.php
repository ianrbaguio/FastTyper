<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
session_start();

if (!isset($_SESSION["username"]))
{
    header("Location:index.php");
    die();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Fast Typer- Game</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="css/FastTyperCSS.css">
    </head>
    <body>
        <div id="HeaderContainer" style="color:red; height:150px; text-align:center; width:100%;"> 
            <div id="HeaderTitleDiv">
                <img src="images/fasttyper_logo.png" width="150" height="150" />
                <h3 style="display:inline-block;">WELCOME TO FAST TYPER</h3> 
            </div>
        </div>

        <nav style="width:100%; height:20px; background-color:red; text-align: center; color:white; font-weight:bold;">
            <span style="display:inline-block; width:10%;"><a style="color:white;" href="index.php">Home</a></span>
            <span style="display:inline-block; width:10%;"><a style="color:white;" href="aboutFastTyper.php">About FastTyper</a></span>
        </nav>

        <div style="width:50%; margin: auto; margin-top:10px;">
            <div style=" width: 100%; border: 2px solid black; text-align:center; margin: auto 0; overflow:hidden; font-weight:bold; font-size:30px">
                <div id="WordGeneratorDiv" style="padding:5px;">
                    
                </div>
            </div>

            <div id="ControlsContainerDiv" style="padding-top: 15px; margin:auto; padding-left:30px; width:40%;">
                <input type="text" id="WordTextInput" /> <input type="button" value="Reset" id="ResetButton" style="background-color:red; color:white;" />
            </div>

            <div id="TimerDiv" style="padding-top:15px;margin:auto; width:50%; text-align: center;">
                01:00
            </div>

            <div id="ScoreDiv" style="padding-top:15px;margin:auto; width:50%; text-align: center;">
                Score:
                <div id="PlayerScoreDiv" style="font-weight:bold;">
                    0
                </div>
            </div>

            <div id="CheckLeaderBoardContainer" style="padding-top:15px;margin:auto; width:50%; text-align: center;">
                <button id="CheckLeaderBoardButton" style="background-color:red; color:white;">Leaderboards</button>
            </div>

            <!-- The Modal -->
            <div id="myModal" class="modal">

                <!-- Modal content -->
                <div class="modal-content">
                    <div class="modal-header">
                        <span class="close">&times;</span>
                        <h2>Leaderboards</h2>
                    </div>
                    <div id="ModalDialogContainer" class="modal-body">
                        <div id="PlayerScoreDisplayDiv" class="score">
                            <div>
                                SCORE:
                                <span id="ActualScore" class="score">
                                    00
                                </span>
                            </div>
<!--                            <div>
                                WPM:
                                <span id="WPMScore" class="score">
                                    00
                                </span>
                            </div>-->
                        </div>
                        <div id="LeaderBoardContainer">

                        </div>

                        <div id="SaveScoreContainer" style="margin:10px; text-align: center;">
                            <button id="SaveScoreButton" style="background-color:red; color:white;">Save Score</button>
                        </div>
                    </div>

                </div>
            </div>
            
            <?php include_once 'footer.php' ?>
            <script type="text/javascript">
                var player = "<?php echo strip_tags($_SESSION["username"]); ?>";
                
                $(document).ready(function(){
                
                    $("#SaveScoreButton").click(function(){
                        NewScore(player);
                    });
                });
                
                
                
            </script>
            <script src="javascript/FastTyperMainJS.js" type="text/javascript"></script>
            
    </body>
</html>
