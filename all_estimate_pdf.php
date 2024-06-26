<?php 
$eno=$_GET["eno"];
$perphoto = $_GET["photo"];//collect a photo permition
include "connection.php";
$obj = new conn;
$est1 = $obj->one_estimate_display($eno);
$est = mysqli_fetch_array($est1);
$date = date_create($est[2]);
$p_result = $obj->one_estimate_product_display($eno);
$count = 1;
$pcs = 0;
$amt = 0;
?>
<?php
// require('tcpdf.php');

use FontLib\Autoloader;

require_once('tcpdf/tcpdf.php');

    // Handle file upload
    
    // $photo_path = "image/66SSJ.PNG";
        // Create PDF
    if($perphoto==1){
        $pdf = new TCPDF();
        $pdf->SetTopMargin(0);
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        $pdf->SetCreator('');
        $pdf->SetAuthor('MANILAL AND SON’S');
        $pdf->SetTitle('Estimate');

        // Add a page
        $pdf->AddPage('P','A4');

        // Set font
        $pdf->SetFont('times', 'B', 11);
        $pdf->SetTextColor(255,00,00);//colour
        
        // $pdf->Cell(63, 10, 'Jay Goga', 0, 0,'L');
        // $pdf->Cell(64, 10, 'Shree Ganeshay Nama', 0, 0,'C');
        // $pdf->Cell(63, 10, 'Jay Ambe', 0, 1,'R');

        $pdf->SetTextColor(0,0,0);//colour
        $pdf->setCellMargins('','6','','');
        $pdf->SetFont('times', 'B', 18);
        $pdf->Cell(0, 35, '', 0, 1, 'C');
        $pdf->Cell(0, 0, '', 0, 0, 'C').$pdf->Image("image/header.JPG", 10,5, 190, 40,'','','',false,300,'',false,false,0);     // for header update
        $pdf->MultiCell(0, 2, '', 0, 'L',false,1);
        $pdf->Line(10,45,200,45);



        $pdf->SetFont('times', '', 12);
        $pdf->setCellMargins('0','0','0','0');
        $pdf->setCellPaddings('15','0','15','8');
        // Add client information
        // $pdf->MultiCell(0,10,'360 , Gopal Nagar Society, Near- Gopal Nagar gat G.H.Board Road, Pandesara , SURAT Phone :- 942610 6544, 9228209900',1,'C');
        
        
        // Add estimate details
        $pdf->SetFont('times', 'B', 12);
        $pdf->setCellMargins('0','0','0','0');
        $pdf->setCellPaddings('2','1','0','0');
        $pdf->MultiCell(120,7,'Name : '.$est[1],1,'',false,0);
        $pdf->MultiCell(70,7,'No : '.$est[0],1,'',false,1);
        $pdf->SetFont('times', '', 10);
        $pdf->MultiCell(120,7,'Add : '.$est[3],1,'',false,0);
        $pdf->SetFont('times', '', 12);
        $pdf->MultiCell(70,7,'Date : '.date_format($date,"d/m/Y"),1,'',false,1);

        $pdf->SetFont('times', '', 1);
        $pdf->setCellMargins('0','0','0','0');
        $pdf->setCellPaddings('0','0','0','0');
        $pdf->Cell(0, 4, '', 1, 1, 'C');

        // Add itemized list
        $pdf->SetFont('times', 'B', 10);
        $pdf->setCellMargins('0','0','0','0');
        $pdf->setCellPaddings('2','0','0','0');

        $pdf->Cell(10, 6, 'NO', 1, 0, 'C');
        $pdf->Cell(20, 6, 'HSN', 1, 0, 'C');
        $pdf->Cell(20, 6, 'IMAGE', 1, 0, 'C');
        $pdf->Cell(58, 6, 'PARTION', 1, 0, 'L');
        $pdf->Cell(12, 6, 'PCS', 1, 0, 'C');
        $pdf->Cell(20, 6, 'RATE', 1, 0, 'C');
        $pdf->Cell(13, 6, 'DISC', 1, 0, 'C');
        $pdf->Cell(12, 6, 'GST', 1, 0, 'C');
        $pdf->Cell(25, 6, 'AMOUNT', 1, 0, 'C');
        $pdf->Ln(); // Move to the next line

        $pdf->SetFont('times', '', 11);
        $pdf->setCellMargins('0','0','0','0');
        $pdf->setCellPaddings('2','2','2','2');
        $pdf->SetTopMargin(10);
        // Example items (you can replace this with your actual item data)
        //estimate items
        while($item = mysqli_fetch_array($p_result)) {
            $pdf->Cell(10, 20, $count, 1, 0, 'C');
            $pdf->Cell(20   , 20, $item[1], 1, 0, 'C');
            $pdf->Cell(20, 20, '', 1, 0, 'C').$pdf->Image("image/".$item[2], 41, $pdf->GetY()+1, 18, 18);
            $pdf->MultiCell(58, 20, $item[3], 1, 'L',false,0);
            $pdf->Cell(12, 20, $item[4], 1, 0, 'C');
            $pdf->Cell(20, 20, sprintf("%.2f",$item[5]), 1, 0, 'R');
            $pdf->Cell(13, 20, sprintf("%.2f",$item[6]), 1, 0, 'C');
            $pdf->Cell(12, 20, sprintf("%.2f",$item[7]), 1, 0, 'C');
            $pdf->Cell(25, 20, sprintf("%.2f",$item[8]), 1, 0, 'R');
            $pdf->Ln(); // Move to the next line
            $count++;
            $pcs = $pcs + $item[4];
            $amt = $amt + $item[8];
        }
        $pdf->SetFont('times', 'B', 13);
        $pdf->setCellMargins('0','0','0','0');
        $pdf->setCellPaddings('2','0','8','0');

        $pdf->Cell(108, 10, 'TOTAL', 1, 0, 'R');
        $pdf->SetFont('times', '', 11);
	    $pdf->setCellPaddings('2','0','2','0');
        //$pdf->Cell(78, 10, '', 1, 0, 'C');
        $pdf->Cell(12, 10, $pcs, 1, 0, 'C');
        $pdf->Cell(45, 10, '', 1, 0, 'L');
        $pdf->Cell(25, 10, sprintf("%.2f",$amt), 1, 0, 'R');
        $pdf->Ln(); // Move to the next line

        $pdf->SetFont('times', 'B', 11);
        $pdf->setCellMargins('0','0','0','0');
        $pdf->setCellPaddings('2','0','2','0');

        $pdf->Cell(120, 10, '', 1, 0, 'C');
        $pdf->Cell(45, 10, 'FREIGHT', 1, 0, 'C');
        $pdf->SetFont('times', '', 11);
        $pdf->Cell(25, 10, sprintf("%.2f",$est[4]), 1, 0, 'R');
        $pdf->Ln();

        $pdf->SetFont('times', 'B', 11);
        $pdf->setCellMargins('0','0','0','0');
        $pdf->setCellPaddings('2','0','2','0');

        $pdf->Cell(120, 10, '', 1, 0, 'C');
        $pdf->Cell(45, 10, 'GRAND TOTAL', 1, 0, 'C');
        $pdf->SetFont('times', '', 11);
        $pdf->Cell(25, 10, sprintf("%.2f",$amt+$est[4]), 1, 0, 'R');
        $pdf->Ln();
        $pdf->SetFont('times', '', 1);
        $pdf->setCellMargins('0','5','0','5');
        $pdf->setCellPaddings('0','0','0','0');
        $pdf->Cell(0, 4, '', 0, 1, 'C');

        //terms & condition
        $terms = "  Trams And Condition  :-\n
        (1) Prices, Terms and Conditions are subject to alteration without any notice.
        (2) Freight : Freight will be extra at actual.
        (3) WARRANTY : Warranty is only applicable against the manufacturing default and if all the products
        Are installed as per our standard guideline and usage. Also the warranty is not applicable
        If any other brand’s products are used in combination with Brand.
        ";

        $pdf->SetFont('times', '', 11);
        $pdf->setCellMargins('0','0','0','0');
        $pdf->setCellPaddings('0','3','0','0');

        $pdf->MultiCell(0,10,$terms,1,'L');
        // Add total
        // $pdf->Cell(0, 10, 'Total: $' . array_sum(array_column($items, 3)), 0, 1);


        // Add image to PDF
        // $pdf->Image($photo_path, 10, $pdf->GetY(), 90, 90);

        // Output PDF to browser
        $pdf->Output($est[1].'.pdf', 'I');
    }else{
        $pdf = new TCPDF();
        $pdf->SetTopMargin(0);
        $pdf->SetPrintHeader(false);
        $pdf->SetPrintFooter(false);
        $pdf->SetCreator('');
        $pdf->SetAuthor('MANILAL AND SON’S');
        $pdf->SetTitle('Estimate');

        // Add a page
        $pdf->AddPage('P','A4');

        // Set font
        $pdf->SetFont('times', 'B', 11);
        $pdf->SetTextColor(255,00,00);//colour
        
        $pdf->Cell(63, 10, 'Jay Goga', 0, 0,'L');
        $pdf->Cell(64, 10, 'Shree Ganeshay Nama', 0, 0,'C');
        $pdf->Cell(63, 10, 'Jay Ambe', 0, 1,'R');

        $pdf->SetTextColor(0,0,0);//colour
        $pdf->setCellMargins('','6','','');
        $pdf->SetFont('times', 'B', 18);
        $pdf->Cell(0, 6, 'MANILAL  AND  SON’S', 1, 1, 'C');



        $pdf->SetFont('times', '', 12);
        $pdf->setCellMargins('0','0','0','0');
        $pdf->setCellPaddings('15','0','15','8');
        // Add client information
        $pdf->MultiCell(0,10,'360 , Gopal Nagar Society, Near- Gopal Nagar gat G.H.Board Road, Pandesara , SURAT Phone :- 942610 6544, 9228209900',1,'C');
        
        
        // Add estimate details
        $pdf->SetFont('times', 'B', 12);
        $pdf->setCellMargins('0','0','0','0');
        $pdf->setCellPaddings('2','1','0','0');
        $pdf->MultiCell(120,7,'Name : '.$est[1],1,'',false,0);
        $pdf->MultiCell(70,7,'No : '.$est[0],1,'',false,1);
        $pdf->SetFont('times', '', 10);
        $pdf->MultiCell(120,7,'Add : '.$est[3],1,'',false,0);
        $pdf->SetFont('times', '', 12);
        $pdf->MultiCell(70,7,'Date : '.date_format($date,"d/m/Y"),1,'',false,1);

        $pdf->SetFont('times', '', 1);
        $pdf->setCellMargins('0','0','0','0');
        $pdf->setCellPaddings('0','0','0','0');
        $pdf->Cell(0, 4, '', 1, 1, 'C');

        // Add itemized list
        $pdf->SetFont('times', 'B', 10);
        $pdf->setCellMargins('0','0','0','0');
        $pdf->setCellPaddings('2','0','0','0');

        $pdf->Cell(10, 6, 'NO', 1, 0, 'C');
        // $pdf->Cell(20, 6, 'HSN', 1, 0, 'C');
        // $pdf->Cell(20, 6, 'IMAGE', 1, 0, 'C');
        $pdf->Cell(98, 6, 'PARTION', 1, 0, 'L');
        $pdf->Cell(12, 6, 'PCS', 1, 0, 'C');
        $pdf->Cell(20, 6, 'RATE', 1, 0, 'C');
        $pdf->Cell(13, 6, 'DISC', 1, 0, 'C');
        $pdf->Cell(12, 6, 'GST', 1, 0, 'C');
        $pdf->Cell(25, 6, 'AMOUNT', 1, 0, 'C');
        $pdf->Ln(); // Move to the next line

        $pdf->SetFont('times', '', 10);
        $pdf->setCellMargins('0','0','0','0');
        $pdf->setCellPaddings('2','2','2','2');
        $pdf->SetTopMargin(10);//--------------------------------------------------------------------------------
        // Example items (you can replace this with your actual item data)
        //estimate items
        while($item = mysqli_fetch_array($p_result)) {
            $pdf->Cell(10, 7, $count, 1,0, 'C');
            // $pdf->Cell(20   , 20, $item[1], 1, 0, 'C');
            // $pdf->Cell(20, 20, '', 1, 0, 'C').$pdf->Image("image/".$item[2], 41, $pdf->GetY()+1, 18, 18);
            $pdf->MultiCell(98, 7, $item[3], 1, 'L',false,0);
            $pdf->Cell(12, 7, $item[4], 1, 0,'C');
            $pdf->Cell(20, 7, sprintf("%.2f",$item[5]), 1,0,'R');
            $pdf->Cell(13, 7, sprintf("%.2f",$item[6]), 1,0,'C');
            $pdf->Cell(12, 7, sprintf("%.2f",$item[7]), 1,0,'C');
            $pdf->Cell(25, 7, sprintf("%.2f",$item[8]), 1,0,'R');//-------------------------------------------------------------
            $pdf->Ln(); // Move to the next line
            $count++;
            $pcs = $pcs + $item[4];
            $amt = $amt + $item[8];
        }
        $pdf->SetFont('times', 'B', 13);
        $pdf->setCellMargins('0','0','0','0');
        $pdf->setCellPaddings('2','0','8','0');

        $pdf->Cell(108, 10, 'TOTAL', 1, 0, 'R');//---------------
        $pdf->SetFont('times', '', 11);
	    $pdf->setCellPaddings('2','0','2','0');
        //$pdf->Cell(78, 10, '', 1, 0, 'C');
        $pdf->Cell(12, 10, $pcs, 1, 0, 'C');
        $pdf->Cell(45, 10, '', 1, 0, 'L');//--------------------
        $pdf->Cell(25, 10, sprintf("%.2f",$amt), 1, 0, 'R');//--------------
        $pdf->Ln(); // Move to the next line

        $pdf->SetFont('times', 'B', 11);
        $pdf->setCellMargins('0','0','0','0');
        $pdf->setCellPaddings('2','0','2','0');

        $pdf->Cell(120, 10, '', 1, 0, 'C');//-----------------------
        $pdf->Cell(45, 10, 'FREIGHT', 1, 0, 'C');
        $pdf->SetFont('times', '', 11);
        $pdf->Cell(25, 10, sprintf("%.2f",$est[4]), 1, 0, 'R');
        $pdf->Ln();

        $pdf->SetFont('times', 'B', 11);
        $pdf->setCellMargins('0','0','0','0');
        $pdf->setCellPaddings('2','0','2','0');

        $pdf->Cell(120, 10, '', 1, 0, 'C');//------------------------
        $pdf->Cell(45, 10, 'GRAND TOTAL', 1, 0, 'C');
        $pdf->SetFont('times', '', 11);
        $pdf->Cell(25, 10, sprintf("%.2f",$amt+$est[4]), 1, 0, 'R');
        $pdf->Ln();
        $pdf->SetFont('times', '', 1);
        $pdf->setCellMargins('0','5','0','5');
        $pdf->setCellPaddings('0','0','0','0');
        $pdf->Cell(0, 4, '', 0, 1, 'C');

        //terms & condition
        $terms = "  Trams And Condition  :-\n
        (1) Prices, Terms and Conditions are subject to alteration without any notice.
        (2) Freight : Freight will be extra at actual.
        (3) WARRANTY : Warranty is only applicable against the manufacturing default and if all the products
        Are installed as per our standard guideline and usage. Also the warranty is not applicable
        If any other brand’s products are used in combination with Brand.
        ";

        $pdf->SetFont('times', '', 11);
        $pdf->setCellMargins('0','0','0','0');
        $pdf->setCellPaddings('0','3','0','0');

        $pdf->MultiCell(0,10,$terms,1,'L');
        // Add total
        // $pdf->Cell(0, 10, 'Total: $' . array_sum(array_column($items, 3)), 0, 1);


        // Add image to PDF
        // $pdf->Image($photo_path, 10, $pdf->GetY(), 90, 90);

        // Output PDF to browser
        $pdf->Output($est[1].'.pdf', 'I');
    }
?>