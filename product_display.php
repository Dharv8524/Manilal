<?php 
include "connection.php";
$obj = new conn;
$res = $obj->Produvt_display();
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        #container{
            background-image: url("image/pexels-lukas-628241.jpg"); 
            /* height: 725px; */
            background-position: center;
            background-repeat: repeat;
            background-size: 100%;
            margin: auto;
            /* padding-top: 100px; */
            text-align: center;
            /* filter: blur(8px); */
            /* -webkit-filter: blur(8px); */
        }
        .styled-table {
            border-collapse: collapse;
            margin: auto;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
        .styled-table thead tr {
            background-color: #814646;
            color: #ffffff;
            text-align: center;
        }
        .styled-table th,
        .styled-table td {
            padding: 15px 20px;
        }
        .styled-table tbody tr {
            border-bottom: 1px solid #dddddd;
        }

        .styled-table tbody tr:nth-of-type(odd) {
            background-color: #ffffff;
        }
        .styled-table tbody tr:nth-of-type(even) {
            background-color: #e9e9e9;
        }

        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
        .styled-table tbody tr.active-row {
            font-weight: bold;
            color: #009879;
        }
        .price{
            text-align: right;
        }
        .form1 input[type=text] {
            padding: 6px;
            border: none;
            margin-top: 8px;
            /* margin-right: 16px; */
            font-size: 17px;
            border: 4px solid #b17979;
            border-radius: 25px;
        }
        .update{
            background-color: #f8ce35;
            padding: 7px;
            border-radius: 15px;
        }
        #sear{
            padding: 4px;
            border-radius: 35px;
            border: 4px solid #b17979;
        }
        #home{
            font-size: 20px;
            width: 100px;
            height: 40px;
            margin-top: 30px;
            margin-bottom: 30px;
            border-radius: 10px;
            border: 2px solid black;
            box-shadow: 4px 7px 6px 0px #bab6b6f7;
            background-color: #87a2ff;
        }
    </style>
    <script>
        function update(){
            var ser = document.form1.search.value;
            var obj = new XMLHttpRequest();
            obj.open("GET","product_display_back.php?ser="+ser,true);
            obj.send();
            obj.onload =function(){
                if(this.status == 200){
                    document.getElementById("disp").innerHTML = this.response;
                }
            }
        }
    </script>
</head>
<body>
    <div id="container">
        <form action="" method="post" class="form1" name="form1">
            <input type="text" name="search" placeholder="Search.." >
            <input type="button" id="sear" name="submit" value="Search" onclick="update()"><br><br>
        </form>
        <div id="disp">
        <table class="styled-table">
            <thead>
                <tr>
                    <th>HSN</th>
                    <th>Photo</th>
                    <th>Product Name</th>
                    <th>Short Name</th>
                    <th>Price</th>
                    <th>GST</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php while($a = mysqli_fetch_array($res)){?>
                    <tr>
                        <td><?php echo $a[0];?></td>
                        <td>
                            <?php if($a[6]!=null){?>
                                <img src="image/<?php echo $a[6];?>" alt="Empty" height="100px" width="100px">
                            <?php }else{?>
                                <img src="image/empty.jpg" alt="Empty" height="100px" width="100px">
                            <?php }?>
                        </td>
                        <td><?php echo $a[2];?></td>
                        <td><?php echo $a[5];?></td>
                        <td class="price"><?php echo sprintf("%.2f",$a[3]);?></td>
                        <td class="price"><?php echo sprintf("%.2f",$a[4]);?>%</td>
                        <td><a href="update_product.php?id=<?php echo $a[1];?>"><button class="update">Update</button></a></td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
        <a href="home.php"><button id="home">Home</button></a>
    </div>
</body>
</html>