<?php
    session_start();

    if ( isset($_GET["data"])){
        if (!isset($_SESSION["rand"])){
            $_SESSION["rand"] = rand( 1, 10000);
            $_SESSION["tries"] = 0;
        }
        if ($_GET["data"] < 1 ){
            header("Location:reset.php");
            exit();
        }else if ($_GET["data"] > 10000){
            echo "Please guess numbers between 1 - 10,000";
        }else if ($_GET["data"] > $_SESSION["rand"]){
            echo "Lower";
        }else if ($_GET["data"] < $_SESSION["rand"]){
            $_SESSION["tries"]++;
            echo "Bigger";
        }else if ($_GET["data"] == $_SESSION["rand"]){
            echo "Well done! | ". $_SESSION["tries"]. " tries";
        }

        die();
    }   
?>

<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <meta charset="UTF-8">
        <title>Guess the number</title>
    </head>
    <body>
        <center>
            <!-- Debug -->
            <h1 id="here" >*DEBUG*</h1><hr/><br/>

            <!-- Guess -->
            <div class="container">
                <div class="panel panel-primary">
                    <div class="panel-heading">Guess the generated number between 1 - 10,000</div>
                    <div class="panel-body">
                        <input type="text" id="inp1" placeholder="Insert you guess"><br/><br/>
                        <button type="button" id="btn1" class="btn btn-primary">Guess</button><br/><br/>
                        <input type="text" id="inp2" value="" disabled><br/>
                    </div>
                </div>
            </div>
        </center>
        <script>
            // onClick function to get the value of the line-20 input to the guess() function
            $("#btn1").click(function(){
                $.get("index.php", {"data": inp1.value}, function(data){
                    if (data == "Bigger" || data == "Lower" || data == "Please guess numbers between 1 - 10,000" ||  data.includes("Well done! | ") ){
                        if (data.includes("Well done! | ")){
                            $("#inp2").val(data);
                            console.log(data);
                            setTimeout(() => {
                                window.location.href = "reset.php";
                            }, 1000);
                        }else{
                            $("#inp2").val(data);
                            console.log(data);
                        }
                    }else{
                        window.location.href = "reset.php";
                    }
                });
            });

        </script>
        <style>
            /* line-20 input style */
            #inp1 {
                border-color: rgb(0, 119, 255);
                width: 250px;
                height: 35px;
            }
            #inp2 {
                border-color: rgb(0, 119, 255);
                width: 250px;
                height: 70px;
                }
        </style>
    </body>
</html>
