/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var wordIndex = 0;
var wordCount = 0;
var timerStart = false;
var countdown;
var gameDuration = 60; //1 minute duration;
var userPlaying = true;
var playerScore = 0;
//var player = getUrlVars()['user'];

$(document).ready(function () {

    Leaderboards();
    GenerateWords();

    if (timerStart) {
        startTimer();
    }

    $("#ResetButton").click(function () {
        ResetButton();
    });
    // When the user clicks anywhere outside of the modal, close it
    $("#CheckLeaderBoardButton").click(ShowLeaderBoard);

    
});

// When the user clicks anywhere outside of the modal, close it
window.onclick = function (event) {
    if (event.target === document.getElementById("myModal")) {
        document.getElementById("myModal").style.display = "none";
    }
};
function GenerateWords() {
    
    

    $.ajax({
        url: "webService.php",
        type: "POST",
        dataType: "HTML",
        data: {action: "onload"},
        success: function (data) {
            //var Words = "This is a test paragraph This is a test paragraph This is a test paragraph This is a test paragraph This is a test paragraph This is a test paragraph This is a test paragraph This is a test paragraph This is a test paragraph This is a test paragraph";
            var Words = data;
            var WordArray = Words.split(" ");
            var WordHTML = "";
            for (var i = 0; i < WordArray.length; i++) {

                if (i === 0)
                {
                    WordHTML += "<span id='word" + i + "' class='current_word' style='padding:2px;'>" + WordArray[i] + "</span>";
                } else {
                    WordHTML += "<span id='word" + i + "' class='not_current_word' style='padding:2px;'>" + WordArray[i] + "</span>";
                }


            }

            $("#WordGeneratorDiv").html(WordHTML);

            WordType();
        }
    });


}

function WordType() {

    $("#WordTextInput").keydown(function (event) {

        if (event.keyCode === 13 || event.keyCode === 32) {

//            console.log("Spacebar");

            //Word matched
            if ($.trim($("#word" + wordIndex).html()) === $.trim($("#WordTextInput").val())) {

                $("#word" + wordIndex).removeClass("current_word");
                $("#word" + wordIndex).addClass("not_current_word");

                $("#word" + (wordIndex + 1)).addClass("current_word");
                $("#word" + (wordIndex + 1)).removeClass("not_current_word");

                wordCount += $("#word" + wordIndex).html().length;
                UpdateScore(wordCount);
                if (wordIndex === 0) {
                    startTimer();
                }

                wordIndex++;

            }
//            
//            /************* OLD FAST TYPER FUNCTION ************************/
//            if ($.trim($("#word" + wordIndex).html()) === $.trim($("#WordTextInput").val())) {
//                $("#word" + wordIndex).removeClass("current_word");
//                $("#word" + wordIndex).css("color", "green");
//                if ($("#word" + (wordIndex + 1)).length > 0) {
//                    //var elmnt = document.getElementById("word" + (wordIndex + 1));
//                    //elmnt.scrollIntoView(false);
//                    console.log("Current top offset: " + $("#word" + (wordIndex)).offset().top);
//                    console.log("Next top offset: " + $("#word" + (wordIndex + 1)).offset().top);
//                    if ($("#word" + (wordIndex)).offset().top !== $("#word" + (wordIndex + 1)).offset().top)
//                    {
//                        //console.log(($("#word" + (wordIndex + 1)).offset().top + 75) * -1);
//                        //$("#WordGeneratorDiv").offset({top: ($("#word" + (wordIndex + 1)).offset().top - 28) * -1});
////                        var TopOffsetDifference = ($("#word" + (wordIndex + 1)).offset().top - $("#word" + (wordIndex)).offset().top) + 10;
//                        $("#WordGeneratorDiv").offset({top: ($("#word" + (wordIndex + 1)).offset().top - 28)});
//                    }
//                    else{
//                        $("#WordGeneratorDiv").offset({top: ($("#word" + (wordIndex)).offset().top)});
//                    }
////                    if ($("#word" + (wordIndex + 1)).offset().top > 75)
////                    {
////                        //console.log(($("#word" + (wordIndex + 1)).offset().top + 75) * -1);
////                        //$("#WordGeneratorDiv").offset({top: ($("#word" + (wordIndex + 1)).offset().top - 28) * -1});
////                        $("#WordGeneratorDiv").offset({top: ($("#word" + (wordIndex + 1)).offset().top - 28)});
////                    }
//                    $("#word" + (wordIndex + 1)).addClass("current_word");
//                }
            $("#WordTextInput").val("");
        }
        
    });

}


function UpdateScore(score) {

    //playerScore = Math.ceil(score / 5);
    playerScore = Math.floor(score/5);
    $("#PlayerScoreDiv, #ActualScore").html(playerScore);
}


function timerCount(duration, display) {

    var timer = duration, minutes, seconds;
    minutes = parseInt(timer / 60, 10);
    seconds = parseInt(timer % 60, 10);
    minutes = minutes < 10 ? "0" + minutes : minutes;
    seconds = seconds < 10 ? "0" + seconds : seconds;
    //console.log(minutes + ":" + seconds);

    display.html(minutes + ":" + seconds);
    duration--;
    if (duration < 0) {


        ShowLeaderBoard();
        clearTimeout(countdown);
        timerStart = false;
        userPlaying = false;
        $("#WordTextInput").attr("disabled", "disabled"); //disables textbox after countdown to 0
    } else {
        countdown = setTimeout(function () {
            timerCount(duration, display);
        }, 1000);
    }


}

function startTimer() {

    if (!timerStart)
    {
        timerStart = true;
        timerCount(gameDuration, $("#TimerDiv"));
    }
}

function ResetButton() {
    clearTimeout(countdown);
    timerStart = false;
    $("#TimerDiv").html("01:00");
    $("#PlayerScoreDiv").html("0");
    //$("#WordGeneratorDiv").offset({top: 15});
    $("#WordTextInput").removeAttr("disabled"); //disables textbox after countdown to 0
    wordIndex = 0;
    wordCount = 0;
    GenerateWords();
}

function ShowLeaderBoard() {
// Get the modal
    var modal = document.getElementById('myModal');
// Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];
// When the user clicks the button, open the modal 
    modal.style.display = "block";
// When the user clicks on <span> (x), close the modal
    span.onclick = function () {
        modal.style.display = "none";
    };
}

function Leaderboards() {
    $.ajax({
        url: "webService.php",
        data: {action: 'leaderboard'},
        method: "GET",
        dataType: "HTML",
        success: function (data) {
            $("#LeaderBoardContainer").html(data);
        }
    });
}

function NewScore(username) {

    if (playerScore > 0) {
        $.ajax({
            url: "webService.php",
            data: {action: 'newScore', score: playerScore, player: username},
            method: "POST",
            dataType: "HTML",
            success: function () {

                Leaderboards();
            }

        });
    }
}

// Read a page's GET URL variables and return them as an associative array.
function getUrlVars()
{
    var vars = [], hash;
    var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
    for (var i = 0; i < hashes.length; i++)
    {
        hash = hashes[i].split('=');
        vars.push(hash[0]);
        vars[hash[0]] = hash[1];
    }
    return vars;
}
