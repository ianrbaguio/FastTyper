<?php

require_once 'dbUtility.php';

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

if(isset($_GET['action']) && $_GET['action'] == 'leaderboard' ){
    
    $place = 1;
    $leaderboardSQL = "SELECT Username, Score, DateEntered FROM singleplayerleaderboard ORDER BY Score desc LIMIT 10 ";
    
    echo '<table>';
    echo '<tr>';
    echo '<th> Username </th>';
    echo '<th> Score </th>';
    echo '<th> Date </th>';
    echo '</tr>';
    
    if($result = mysqli_query($db,$leaderboardSQL)){
        while($row = mysqli_fetch_array($result)){
            
            echo '<tr>';
            echo '<td>'. $place . '.' . $row['Username'] . '</td>';
            echo '<td>'. $row['Score'] . '</td>';
            echo '<td>'. $row['DateEntered'] . '</td>';
            echo '</tr>';
            
            $place++;
        }
    }
    
    echo '</table>';
    
}

if(isset($_POST['action']) && $_POST['action'] == 'newScore' && isset($_POST['player']) && $_POST['player'] != ""){
    
    $score = strip_tags($_POST['score']);
    $player = strip_tags($_POST['player']);
    
    $newScoreSQL = "INSERT INTO SinglePlayerLeaderboard(Username, Score) VALUES('$player', '$score');";
    
    mysqli_query($db, $newScoreSQL);
}

if(isset($_POST['action']) && $_POST['action'] == "onload"){
    
    $WordsGenerateSQL = "CALL GenerateWords;";
    
    if($result = mysqli_query($db, $WordsGenerateSQL)){
        while($row = mysqli_fetch_array($result)){
            echo $row["Words"];
        }
    }
    
}
?>