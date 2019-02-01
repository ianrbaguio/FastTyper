<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.

/***************************************************************************
Name: Ian Rey Baguio
Date Created: July 10,2018
Description: Fast Typer, is a typing game that allows for a 1v1 with another
player. Whoever has the most typed word wins!
***************************************************************************/
-->
<?php
$error = "";

if (isset($_POST['Username']) && isset($_POST['Username']) != "")
{

    $username = strip_tags($_POST["Username"]);

    if (strlen($username) > 3)
    {
        session_start();

        $_SESSION["username"] = $username;

        header('Location: main.php');
    } else
    {
        $error = "<span style='color:red;'>Invalid username. Username must be 3 or more character long.</span>";
    }

    die();
} else
{

    session_abort();
}
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Fast Typer</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
    <body>

        <div id="HeaderContainer" style="color:red; height:150px; text-align:center; width:100%;"> 
            <div id="HeaderTitleDiv" style="display:none;">
                <img src="images/fasttyper_logo.png" width="150" height="150" />
                <h3 style="display:inline-block;">WELCOME TO FAST TYPER</h3> 
            </div>
        </div>

        <nav style="width:100%; height:20px; background-color:red; text-align: center; color:white; font-weight:bold;">
            <span style="display:inline-block; width:10%;"><a style="color:white;" href="index.php">Home</a></span>
            <span style="display:inline-block; width:10%;"><a style="color:white;" href="aboutFastTyper.php">About FastTyper</a></span>
        </nav>

        <div id="ContainerDiv" style="text-align: center; font-weight:bold; margin:15px;">

            <form method="post">
                <label name="username">Username:</label>
                <input type="text" name="Username" id="UsernameTextBox" /> <br/>
                <div id="ErrorDiv"><?php echo $error; ?></div>
                <!-- <input type="submit" id="UsernameSubmit" value="Enter" style="color:white; background-color:red;"/> -->
                <div id="GameModeContainer" style="margin-top:15px;">
                    <!--<button id="SingplePlayerButton" style="color:white; background-color:red; margin:0 10px;">Single Player</button>-->
                    <input type="submit" name="SinglePlayerButtoin" id="SinglePlayerButton" value="Play" style="color:white; background-color:red; margin:0 10px;"/>
                    <!--<button id="MultiplayerButton" style="color:white; background-color:red; margin:0 10px;">Multiplayer</button>-->
                </div>
            </form>

        </div>

            <?php include_once 'footer.php' ?>

        <script>

            $(document).ready(function () {

                //Play();
                
                $("#HeaderTitleDiv").fadeIn(2500);

            });

            function Play() {


                $("#SingplePlayerButton").click(function () {
                    if (CheckUsername($("#UsernameTextBox").val()) === 1) {

                        window.location.href = "main.php?user=" + $("#UsernameTextBox").val();

                    } else
                    {
                        $("#ErrorDiv").html("<span style='color:red;'>Invalid username.</span>");

                    }
                });
            }

            function CheckUsername(username) {

                if (username !== "" && username.length > 3) {
                    return 1;
                } else {
                    return 0;
                }

            }

        </script>

    </body>
</html>
