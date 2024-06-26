<?php 
include "connection.php";
$massage = " ";
if(isset($_POST["add_product"])){
    $hsn = $_POST["hsn"];
    $name = $_POST["prod_name"];
    $price = $_POST["prod_price"];
    $gst = $_POST["gst"];
    $short_name = $_POST["short_name"];
    
    if($_FILES["image"]["name"]!=null){
        $photo = $_FILES["image"]["name"];
        $tempphoto = $_FILES["image"]["tmp_name"];
        $filetype = pathinfo($photo, PATHINFO_EXTENSION);
        // echo $filetype;
        $folder = "image/". $photo;
        $alloudtype = array('jpg','JPG','JPEG', 'jpeg','PNG', 'png');
        if (in_array($filetype, $alloudtype)) {
            if (move_uploaded_file($tempphoto, $folder)) {
                $data = array($hsn,$name,$price,$gst,$short_name,$photo);            
                $obj = new conn;
                $res = $obj->add_product($data);
                if($res){
                    $massage = "Product Add Sucessfull";
                }else{
                    $massage = "Product Not Added. Check Your Data. Short Name is Already exist";
                }

            }else {
                $massage = "Failed to upload image";
            }
        } else {
            $massage = "photo is not valid only jpg , png and jpeg allowed";
        }
    }else{
        $data = array($hsn,$name,$price,$gst,$short_name,null);            
                $obj = new conn;
                $res = $obj->add_product($data);
                if($res){
                    $massage = "Product Add Sucessfull";
                }else{
                    $massage = "Product Not Added Check Your Data";
                }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function onpress(){
            document.getElementById("massage").innerHTML = " ";
        }
    </script>
    <style>
        #container{
            background-image: url("image/pexels-andreea-ch-1166644.jpg"); 
            background-color: #cccccc;
            height: 725px; 
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            margin: auto;
            padding-top: 100px;
        }
        #main-container{
            font-size: 20px;
            border: 10px solid #806161;
            box-shadow: 5px 10px #bab6b6f7;
            text-align: center;
            width: max-content;
            margin: auto;
            padding-right: 30px;
            padding-left: 30px;
        }
        #heading{
            font-family: 'Arvo', serif;
            font-size: 45px;
            color: brown;
            padding-top: 10px;
            padding-bottom: 10px;
            border-bottom: 5px solid #806161;
        }
        #addbutton{
            padding: 7px;
            Background-color: #00a800;
            border-radius: 10px;
        }
        #home{
            font-size: 20px;
            width: 100px;
            height: 40px;
            margin-top: 30px;
            margin-left: 46.5%;
            border-radius: 10px;
            border: 2px solid black;
            box-shadow: 4px 7px 6px 0px #bab6b6f7;
            background-color: #87a2ff;
        }
    </style>
</head>
<body>
    <div id="container">
        <div id="main-container">
            <h2 id="heading">Item Master</h2>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="hsn">HSN :</label>
                <input type="text" name="hsn" required onkeypress="onpress()"><br><br>

                <label for="prod_name">Name :</label>
                <input type="text" name="prod_name" required><br><br>

                <label for="prod_price">Price :</label>
                <input type="text" name="prod_price" required><br><br>

                <label for="gst">GST :</label>
                <input type="text" name="gst" require><br><br>

                <label for="short_name">Short Name :</label>
                <input type="text" name="short_name" required><br><br>

                <label for="image">Image :</label>
                <input type="file" name="image"><br><br>

                <input type="submit" name="add_product" value="Add Product" id="addbutton"><br><br>
            </form>
            <div id="massage"><?php echo $massage;?></div>
        </div>
        <a href="home.php"><button id="home">Home</button></a>
    </div>
</body>
</html>