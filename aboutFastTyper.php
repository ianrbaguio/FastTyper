<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Fast Typer - About</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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

        <div style="text-align:center;">
            <h4>REFERENCES</h4>
            Logo created on: <a href="https://www.freelogodesign.org/"> Free Logo Design</a> <br/>
            Words generated on : <a href="https://www.randomwordgenerator.com/"> Random Word Generator</a> <br/>
        </div>
        
        <hr/>
        
        <div style="text-align:center;">
            <h4>MODIFICATIONS</h4>
            <div>
                July 10,2018:
                <ul>
                    <li>Created Fast Typer</li>
                    <li>Created SinglePlayerLeaderBoard table</li>
                    <li>Main page for type gameplay</li>
                </ul>
            </div>
            <div>
                December 18,2018:
                <ul>
                    <li>Created WordsGenerator table</li>
                    <li>Created FastTyper logo</li>
                    <li>Generates word on main page load.</li>
                </ul>
            </div>
            <div>
                December 20,2018:
                <ul>
                    <li>Added footer.</li>
                </ul>
            </div>
            <div>
                January 9, 2019:
                <ul>
                    <li>Players can now enter their input words either by space or enter keys as some player's feedback prefer one or the other key.</li>
                </ul>
            </div>
            Words generated on : <a href="https://www.randomwordgenerator.com/"> Random Word Generator</a> <br/>
        </div>
        
        <?php include_once 'footer.php' ?>

    </body>
</html>
