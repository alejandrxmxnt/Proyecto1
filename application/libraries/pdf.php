<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require_once APPPATH."/third_party/fpdf/fpdf.php"; 
class Pdf extends FPDF {
    
    Public function Header(){
        //Si se requiere agregar una imagen
        //$this->Image('ruta de la imagen',x,y,ancho,alto);
        
        $marca=base_url()."img/marcaagua/marcadeagualogo.png"; //MARCA DE AGUA
        $this->Image($marca,15,57,180,180); //COORDENADAS X,Y, ANCHO Y LARGO
        
        $this->SetFont('Courier','B',20);
        $this->Cell(2);
        $this->Cell(180,15,'COMPROBANTE DE VENTA',0,0,'C');
        $this->Ln('5');
    }

    public function Footer(){
        $this->SetY(-15);
        $this->SetFont('Courier','I',7);
        $this->Cell(120,10,'Pag. '.$this->PageNo().'/{nb}',0,0,'R');
    }
}
?>