<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #container{
            background-image: url("image/pexels-pixabay-434337.jpg"); 
            background-color: #cccccc;
            height: 720px; 
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            margin: auto;
            /* padding-top: 200px; */
            text-align: left;
        }
        .option{
            padding-left: 600px;
        }
        .button{
            font-size: large;
            padding: 5px;
        }
        .name{
            width: 300px;
            height: 50px;
            margin-left: 10px;
            border-radius: 25px;
            border: 2px solid black;
            box-shadow: 4px 7px 6px 0px #bab6b6f7;
        }
        .no{
            width: 50px;
            height: 50px;
            border-radius: 25px;
            border: 2px solid black;
            box-shadow: 4px 7px 6px 0px #bab6b6f7;
        }
        #no1{
            padding-top: 250px;
        }
        .option1{
            background-color: #ffa0a0ba;
        }
        .option2{
            background-color: #63bb45c2;
        }
        .option3{
            background-color: #c88ec8cf;
        }
        .option4{
            background-color: #85aaf6c2;
        }
    </style>
</head>
<body>
    <div id="container">
        <div id="no1" class="option">
            <a href="Add_Product.php"><button class="button no option1">1</button></a>
            <a href="Add_Product.php"><button class="button name option1">Items Master</button></a>
        </div><br><br>
        <div id="no2" class="option">
            <a href="product_display.php"><button class="button no option2">2</button></a>
            <a href="product_display.php"><button class="button name option2">All Items</button></a>
        </div><br><br>
        <div id="no3" class="option">
            <a href="main_estimate.php"><button class="button no option3">3</button></a>
            <a href="main_estimate.php"><button class="button name option3">New Estimate</button></a>
        </div><br><br>
        <div id="no4" class="option">
            <a href="all_estimate.php"><button class="button no option4">4</button></a>
            <a href="all_estimate.php"><button class="button name option4">All Estimates</button></a>
        </div><br><br>
    </div>
</body>
</html>