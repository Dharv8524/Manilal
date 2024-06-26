<?php 
$ser = $_REQUEST["ser"];
include "connection.php";
$obj = new conn;
$res = $obj->Produvt_display_like($ser);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
</body>
</html>