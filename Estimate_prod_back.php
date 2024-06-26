<?php 
$ms = $_REQUEST["ms"];
$add = $_REQUEST["add"];
$no = $_REQUEST["no"];
$date = $_REQUEST["date"];
$pcs = $_REQUEST["pcs"];
$disc = $_REQUEST["disc"];
$pid = $_REQUEST["pid"];
$price = $_REQUEST["price"];

$count = 1;

include "connection.php";
$obj = new conn;

$tempest_res = $obj->temp_estimate_display();
if($tempest_res->num_rows == 0){
    $data = array($no, $ms, $date, $add, 0);
    $ins_massage = $obj->add_temp_estimate($data);
}
$obj->add_temp_estimate_product($no,$pid,$pcs,$disc,$price);

$result = $obj->temp_estimate_product_display();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table>
    <form action="" method="post" name="est_form">
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
        <tbody>
            <?php while($a = mysqli_fetch_array($result)){?>
                <tr>
                    <td class="small-heading"><?php echo $count; ?></td>
                    <td class="basic-heading"><?php echo $a[1]; ?></td>
                    <td class="basic-heading">
                        <?php if($a[2]!=null){?>
                                <img src="image/<?php echo $a[2];?>" alt="Empty" height="50px" width="50px">
                            <?php }else{?>
                                <img src="image/empty.jpg" alt="Empty" height="50px" width="50px">
                            <?php }?></td>
                    <td id="name " class="partion"><?php echo $a[3]; ?></td>
                    <td class="small-heading"><?php echo $a[4]; ?></td>
                    <td class="basic-heading le"><?php echo sprintf("%.2f",$a[5]); ?></td>
                    <td class="small-heading le"><?php echo sprintf("%.2f",$a[6]); ?>%</td>
                    <td class="basic-heading le"><?php echo sprintf("%.2f",$a[7]); ?>%</td>
                    <td class="basic-heading le"><?php echo sprintf("%.2f",$a[8]); ?></td>
                    <td class="basic-heading"><button class="remove" onclick="removeprod('<?php echo $a[3]; ?>')">REMOVE</button></td>
                </tr>
            <?php $count++; } ?>
            <!-- <tr>
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
            </tr> -->
        </tbody>
        </form>
    </table>
</body>
</html>