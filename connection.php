<?php
    class conn{
        public $server1 = "localhost";
        public $user = "root";
        public $pass = "";
        public $db = "Manilal_sons";
        public $c = null;

        function __construct()
        {
            $this->c = new mysqli($this->server1,$this->user,$this->pass,$this->db);
            if(!$this->c->connect_error)
            {
                // echo "Connection Sucessfull!";
            }
        }
        function add_product($data){
            $sql = "insert into product_details values('$data[0]',null,'$data[1]','$data[2]','$data[3]','$data[4]','$data[5]')";
            $result = mysqli_query($this->c,$sql);
            return $result;
        }
        function Produvt_display(){
            $sql = "select * from product_details";
            $result = mysqli_query($this->c,$sql);
            return $result;
        }
        function Produvt_display_like($ser){
            $sql = "select * from product_details where Prod_Short_Name like('$ser%') or Prod_Name like('%$ser%')";
            $result = mysqli_query($this->c,$sql);
            return $result;
        }
        function sel_product_idvice($id){
            $sql = "select * from product_details where Prod_ID = '$id'";
            $result = mysqli_query($this->c,$sql);
            return $result;
        }
        function update_product($data){
            $sql = "UPDATE product_details SET HSN = '$data[0]', Prod_Name = '$data[1]', Prod_Price = '$data[2]', Prod_GST = '$data[3]', Prod_Short_Name = '$data[4]', Image_Name = '$data[5]' WHERE product_details.Prod_ID = '$data[6]';";
            $result = mysqli_query($this->c,$sql);
            return $result;
        }
        function update_product_without_img($data){
            $sql = "UPDATE product_details SET HSN = '$data[0]', Prod_Name = '$data[1]', Prod_Price = '$data[2]', Prod_GST = '$data[3]', Prod_Short_Name = '$data[4]' WHERE Prod_ID = $data[5];";
            $result = mysqli_query($this->c,$sql);
            return $result;
        }
        function temp_estimate_display(){
            $sql = "select * from temp_estimate";
            $result = mysqli_query($this->c,$sql);
            return $result;
        }
        function add_temp_estimate($data){
            $sql = "insert into temp_estimate values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]')";
            $result = mysqli_query($this->c,$sql);
            return $result;
        }
        function add_temp_estimate_product($eno,$pid,$pcs,$disc,$price){
            $sql = "select * from product_details where Prod_ID = '$pid'";
            $p_result = mysqli_query($this->c,$sql);
            $p_final = mysqli_fetch_array($p_result);
            $amt = $pcs*$price-(($disc*$pcs*$price)/100);
            $amtfinal = $amt+(($amt*$p_final[4])/100);

            $sql = "insert into temp_est_product values('$eno','$p_final[0]','$p_final[6]','$p_final[2]','$pcs','$price','$disc','$p_final[4]','$amtfinal')";
            $result = mysqli_query($this->c,$sql);
            return $result;
        }
        function temp_estimate_product_display(){
            $sql = "select * from temp_est_product";
            $result = mysqli_query($this->c,$sql);
            return $result;
        }
        function delete_temp_estimate_product($pname){
            $sql = "delete from temp_est_product where partion='$pname'";
            $result = mysqli_query($this->c,$sql);
            return $result;
        }
        function transferdata(){
            $sql1 = "select * from temp_estimate";
            $result1 = mysqli_query($this->c,$sql1);
            if($result1->num_rows>0){
                $data = mysqli_fetch_array($result1);
                $sql2 = "insert into main_estimate values('$data[0]','$data[1]','$data[2]','$data[3]','$data[4]')";
                mysqli_query($this->c,$sql2);


                $s = "select * from estimate_product where est_no = '$data[0]'";
                $r = mysqli_query($this->c,$s);
                    if($r->num_rows==0){
                    $sql3 = "select * from temp_est_product";
                    $result3 = mysqli_query($this->c,$sql3);
                    while($a = mysqli_fetch_array($result3)){
                        $sql = "insert into estimate_product values('$a[0]','$a[1]','$a[2]','$a[3]','$a[4]','$a[5]','$a[6]','$a[7]','$a[8]')";
                        mysqli_query($this->c,$sql);
                    }
                }
            }
        }
        function update_temp_estimate($freight){
            $sql = "update temp_estimate set freight = '$freight'";
            $result = mysqli_query($this->c,$sql);
            return $result;
        }
        function cleardata(){
            $sql1 = "delete from temp_est_product";
            mysqli_query($this->c,$sql1);
            $sql2 = "delete from temp_estimate";
            mysqli_query($this->c,$sql2);
        }
        function max_est_no(){
            $sql = "select max(est_no) from main_estimate";
            $result = mysqli_query($this->c,$sql);
            return $result;
        }
        function all_estimate_display(){
            $sql = "select * from main_estimate";
            $result = mysqli_query($this->c,$sql);
            return $result;
        }
        function one_estimate_display($eno){
            $sql = "select * from main_estimate where est_no = '$eno'";
            $result = mysqli_query($this->c,$sql);
            return $result;
        }
        function one_estimate_product_display($eno){
            $sql = "select * from estimate_product where est_no = '$eno'";
            $result = mysqli_query($this->c,$sql);
            return $result;
        }
        function add_estimate_product($eno,$pid,$pcs,$disc,$price){
            $sql = "select * from product_details where Prod_ID = '$pid'";
            $p_result = mysqli_query($this->c,$sql);
            $p_final = mysqli_fetch_array($p_result);
            $amt = $pcs*$price-(($disc*$pcs*$price)/100);
            $amtfinal = $amt+(($amt*$p_final[4])/100);

            $sql = "insert into estimate_product values('$eno','$p_final[0]','$p_final[6]','$p_final[2]','$pcs','$price','$disc','$p_final[4]','$amtfinal')";
            $result = mysqli_query($this->c,$sql);
            return $result;
        }
        function delete_estimate_product($name,$eno){
            $sql = "delete from estimate_product where partion='$name' and est_no='$eno'";
            $result = mysqli_query($this->c,$sql);
            return $result;
        }
        function update_estimate_product($name,$eno,$pcs,$price,$disc,$gst){
            $amt = $pcs*$price-(($disc*$pcs*$price)/100);
            $amtfinal = $amt+(($amt*$gst)/100);
            $sql = "update estimate_product set pcs = '$pcs',rate = '$price',disc = '$disc',amount = '$amtfinal' where partion='$name' and est_no='$eno'";
            $result = mysqli_query($this->c,$sql);
            return $result;
        }
        function estimate_details_update($no,$ms,$add,$date,$fre){
            $sql = "Update main_estimate set per_name='$ms',est_date='$date',per_address='$add',freight='$fre' where est_no = '$no'";
            $result = mysqli_query($this->c,$sql);
            return $result;
        }
        function estimate_delete($no){
            $sql1 = "delete from estimate_product where est_no='$no'";
            $result1 = mysqli_query($this->c,$sql1);
            $sql = "delete from main_estimate where est_no = '$no'";
            $result = mysqli_query($this->c,$sql);
            return $result;
        }
    }
?>