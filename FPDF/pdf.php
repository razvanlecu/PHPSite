<?php 
require ('fpdf.php');
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'magazindb');
class myPDF extends FPDF{

    function header(){
        $this->image('food.jpg',10,6);
        $this->SetFont('Arial','B',14);
        $this->Cell(276,5,'Food Details',0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(276,10,'List',0,0,'C');
        $this->Ln(20);
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    function headerTable(){
        $this->SetFont('Times','B',12);
        $this->Cell(10,10,'ID',1,0,'C');
        $this->Cell(40,10,'Name',1,0,'C');
        $this->Cell(40,10,'Type',1,0,'C');
        $this->Cell(20,10,'Price',1,0,'C');
        $this->Cell(38,10,'Fab Date',1,0,'C');
        $this->Cell(130,10,'Review',1,0,'C');
        $this->Ln();
    }
    function viewTable($con){
        $this->SetFont('Times','',12);
        $query=mysqli_query($con, 'SELECT * FROM food');
        while($data = mysqli_fetch_array($query)){
            $this->Cell(10,10,$data['id'],1,0,'C');
            $this->Cell(40,10,$data['name'],1,0,'L');
            $this->Cell(40,10,$data['type'],1,0,'L');
            $this->Cell(20,10,$data['price'],1,0,'L');
            $this->Cell(38,10,$data['fabdate'],1,0,'L');
            $this->Cell(130,10,$data['review'],1,0,'L');
            $this->Ln();
        }
    }
}

$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable($con);
$pdf->Output();