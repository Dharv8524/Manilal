<?php 
include "connection.php";
$obj = new conn;
$res = $obj->Produvt_display();
$maxno = $obj->max_est_no();
$no = mysqli_fetch_array($maxno); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            border-collapse: collapse;
            width: 70%;
            text-align: center;
            margin: auto;
        }
        td, th{
            border: 2px solid black;
        }
        #name{
            padding-right: 65px;
            padding-left: 65px;
        }
        .basic-heading{
            padding-right: 10px;
            padding-left: 10px;
        }
        .small-heading{
            padding-right: 6px;
            padding-left: 6px;
        }
        .table-third-heading{
            padding: 10px;
            font-size: 18px;
            font-family: "Arvo", serif;
            font-family: "Heebo", sans-serif;
            font-family: "Montserrat", sans-serif;
            font-weight: normal;
            text-align: left;
        }
        #ms{
            width: 70%;
            height: 25px;
        }
        #add{
            width: 70%;
            height: 25px;
        }
        #no{
            width: 70%;
            height: 25px;
            margin-left: 15px;
        }
        #date{
            width: 70%;
            height: 25px;
        }
        
        .lastbody{
            font-weight: bold;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .terms-condition{
            border: 2px solid black;
            text-align: left;
            padding: 20px;
            padding-top: 5px;
            padding-bottom: 0px;
            font-size: 18px;
        }
        li{
            text-align: left;
            padding: 10px;
            padding-bottom: 2px;
        }
        #freight{
            text-align: left;
            width: 50%;
            height: 25px;
        }
        #container{
            /* background-image: url("image/pexels-lukas-628241.jpg"); 
            height: 725px;
            background-position: center;
            background-repeat: repeat;
            background-size: contain; */
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

        /* .styled-table tbody tr:nth-of-type(odd) {
            background-color: #ffffff;
        }
        .styled-table tbody tr:nth-of-type(even) {
            background-color: #e9e9e9;
        } */

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
            border: 2px solid black;
            border-radius: 10px;
        }
        .ADD{
            background-color: #26d02c;
            padding: 7px;
            border-radius: 15px;
        }
        #sear{
            padding: 4px;
            border-radius: 10px;
            border: 2px solid black;
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
        .le{
            text-align: right;
        }
        .partion{
            text-align: left;
            padding-left: 8px;
        }
        .remove{
            background-color: #ff7c7c;
            border-radius: 15px;
            height: 30px;
        }
        .estcre{
            margin: auto;
            text-align: center;
            background-color: #ff7c7c;
            border-radius: 15px;
            height: 30px;
        }
        .est{
            margin: auto;
            text-align: center;
        }
    </style>
</head>
<body>
    <table>
        <thead>
                <tr>
                    <th rowspan="2" colspan="6" id="ht1" class="table-third-heading">M/S :- <input type="text" name="ms" id="ms" placeholder="Enter Name"> 
                    <br><br>
                    Add :- <input type="text" name="add" id="add"  placeholder="Enter Address"></th>
                    <th colspan="4" class="table-third-heading">No :- <input type="text" name="no" id="no" value="<?php echo $no[0]+1; ?>" placeholder="Enter Estimate No"></th>
                </tr>
                <tr>
                    <th colspan="4" class="table-third-heading">Date :- <input type="date" name="date" id="date"></th>
                </tr>
        </thead>
    </table>
<div id="items_div">
    <table>
        <thead>
            <tr>
                <th class="small-heading">NO</th>
                <th class="basic-heading">HSN</th>
                <th class="basic-heading">IMAGE</th>
                <th id="name">PARTION</th>
                <th class="small-heading">PCS</th>
                <th class="basic-heading">RATE</th>
                <th class="small-heading">DISC%</th>
                <th class="basic-heading">GST%</th>
                <th class="basic-heading">AMOUNT</th>
                <th class="basic-heading">REMOVE</th>
            </tr>
        </thead>
        <!-- <tbody>
            
            <tr>
                <td colspan="2" class="lastbody">TOTAL</td>
                <td colspan="2"></td>
                <td colspan="1"></td>
                <td colspan="3"></td>
                <td colspan="1"></td>
                <td colspan="1"></td>
            </tr>
            <tr>
                <td colspan="6"></td>
                <td colspan="2" class="lastbody">FREIGHT</td>
                <td colspan="1"><input type="number" name="freight" id="freight" value="0"></td>
                <td colspan="1"></td>
            </tr>
            <tr>
                <td colspan="6"></td>
                <td colspan="2" class="lastbody">GRAND TOTAL</td>
                <td colspan="1"></td>
                <td colspan="1"></td>
            </tr>
        </tbody> -->
    </table>
</div>
    <br>
    <div class="est">
        <button class="estcre" onclick="myFunction(1)">CREATE ESTIMATE</button><br>
        <button class="estcre" onclick="myFunction(0)">WITHOUT PHOTO</button> <!--pass in function photo is not allowed with 0 value-->
    </div>

<!-- search -->


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
                    <tr id="<?php echo $a[1];?>">
                        <td><?php echo $a[0];?></td>
                        <td>
                            <?php if($a[6]!=null){?>
                                <img src="image/<?php echo $a[6];?>" alt="Empty" height="50px" width="50px">
                            <?php }else{?>
                                <img src="image/empty.jpg" alt="Empty" height="50px" width="50px">
                            <?php }?>
                        </td>
                        <td><?php echo $a[2];?></td>
                        <td><?php echo $a[5];?></td>
                        <td class="price"><?php echo sprintf("%.2f",$a[3]);?></td>
                        <td class="price"><?php echo sprintf("%.2f",$a[4]);?>%</td>
                        <td><button class="ADD" onclick="additem(<?php echo $a[1];?>,<?php echo $a[3];?>)">ADD</button></td>
                    </tr>
                <?php }?>
            </tbody>
        </table>
        </div>
        <a href="home.php"><button id="home">Home</button></a>
    </div>
    <script>
        function update(){
            var ser = document.form1.search.value;
            var obj = new XMLHttpRequest();
            obj.open("GET","Estimate_back.php?ser="+ser,true);
            obj.send();
            obj.onload =function(){
                if(this.status == 200){
                    document.getElementById("disp").innerHTML = this.response;
                }
            }
        }
        function additem(pid,pri){
            let ms1 = document.getElementById("ms").value;
            let add1 = document.getElementById("add").value;
            let no1 = document.getElementById("no").value;
            let date1 = document.getElementById("date").value;
            if(ms1=="" || add1=="" || no1=="" || date1==""){
                alert("Enter All Estimate Details");
            }else{
                var pcs1 = prompt("Enter PCS",1);
                var disc1 = prompt("Enter Discount");
                var price = prompt("Check Price",pri);
                if(pcs1 == "" || disc1 == "" || price == ""){
                    alert("Product Not Added ! resion : PCS and Discount is Empty")
                }else{
                    var obj = new XMLHttpRequest();
                    obj.open("GET","Estimate_prod_back.php?ms="+ms1+"&add="+add1+"&no="+no1+"&date="+date1+"&pcs="+pcs1+"&disc="+disc1+"&pid="+pid+"&price="+price,true);
                    obj.send();
                    obj.onload =function(){
                        if(this.status == 200){
                            document.getElementById("items_div").innerHTML = this.response;
                        }
                    }
                }
            }
        }
        function removeprod(pname){
            var obj = new XMLHttpRequest();
            obj.open("GET","Estimate_remove_back.php?pname="+pname,true);
            obj.send();
            obj.onload =function(){
                if(this.status == 200){
                    document.getElementById("items_div").innerHTML = this.response;
                }
            }
        }
        function myFunction(photoper) {//collect a permision for photo in pdf
            var freight = prompt("Enter FREIGHT");
            location.replace("Estimate_final_pdf.php?freight="+freight+"&photo="+photoper);//photoper is for pdf contain photo(1) or not(0)
        }
    </script>
</body>
</html>
