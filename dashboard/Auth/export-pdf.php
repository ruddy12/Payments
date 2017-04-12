<?php
require('fpdf17/fpdf.php');
$pdf=new FPDF('L','mm',array(800,750));
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont('times','B',20);
$pdf->Cell(25,7,"Id");
$pdf->Cell(40,7,"transactionId");
$pdf->Cell(30,7,"provider");
$pdf->Cell(40,7,"providerRefId");
$pdf->Cell(40,7,"providerChannelCode");
$pdf->Cell(40,7,"productName");
$pdf->Cell(40,7,"source");
$pdf->Cell(40,7,"value");
$pdf->Cell(40,7,"transactionFee");
$pdf->Cell(40,7,"providerFee");
$pdf->Cell(40,7,"status");
$pdf->Cell(40,7,"description");
$pdf->Cell(40,7," transactionDate");
$pdf->Ln();
$pdf->Cell(40,10,"--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------");
$pdf->Ln();

        include ('db/db_connection.php');
        $sql = "SELECT id, transactionId,provider,providerRefId,providerChannelCode,productName,source,value,transactionFee,providerFee,status,description,transactionDate FROM sauti_pay";
        $result = mysqli_query($con,$sql);

        while($rows=mysqli_fetch_array($result))
        {
            $id = $rows[0];
            $transactionid = $rows['transactionId'];
            $provider = $rows['provider'];
            $providerRefId = $rows['providerRefId'];
            $provider_channel = $rows['providerChannelCode'];
            $productName = $rows['productName'];
            $source = $rows['source'];
            $value = $rows['value'];
            $transactionFee = $rows['transactionFee'];
            $proider_fee = $rows['providerFee'];
            $status = $rows['status'];
            $desc = $rows['description'];
            $trans_date = $rows['transactionDate'];
            $pdf->Cell(25,7,$id);
            $pdf->Cell(50,7,$transactionid);
            //$pdf->Cell(70,7,$provider);
            $pdf->Cell(40,7,$providerRefId);
            $pdf->Cell(40,7,$provider_channel);
            $pdf->Cell(40,7,$productName); 
            $pdf->Cell(40,7,$source); 
            $pdf->Cell(40,7,$value); 
            $pdf->Cell(40,7,$transactionFee); 
           // $pdf->Cell(40,7,$proider_fee); 
            $pdf->Cell(40,7,$status); 
            //$pdf->Cell(40,7,$desc); 
            $pdf->Cell(40,7,$trans_date); 
            $pdf->Ln(); 
        }
$pdf->Output();
?>