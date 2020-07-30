<?php
require_once('../fpdf.php');
require_once('qrcode.class.php');

define('PAGE_WIDTH',210);
define('PAGE_HEIGHT',297);
define('LEFT_MARGIN',9);
define('RIGHT_MARGIN',LEFT_MARGIN);
define('TOP_MARGIN',5);

define('REF_WIDTH',25);
define('UNITE_WIDTH',9);
define('PU_WIDTH',15);
define('PT_WIDTH',15);
define('QTE_WIDTH',12);
define('QTE_RECU_WIDTH',22);
define('LOCAL_WIDTH', 20);

define('DESIGNATION_DEVIS_WIDTH',PAGE_WIDTH - LEFT_MARGIN - RIGHT_MARGIN - (REF_WIDTH + UNITE_WIDTH + PU_WIDTH + PT_WIDTH + QTE_WIDTH + QTE_RECU_WIDTH + LOCAL_WIDTH) ); // s'appadate à la largeur de la page

//echo DESIGNATION_DEVIS_WIDTH.' '.DESIGNATION_DEVIS_NET_WIDTH;

class PDF extends FPDF
{
	//EN-TÊTE
	function Header()
	{	global $row_entete,$vendeurs,$SOCIETE ;
		
		// le dépot a livré et les coordonnées du fournisseur
		$this->SetXY(63,2);
		$this->SetFont('helvetica','',10);
		$this->SetTextColor(0,0,0);
					
			
		// rectangle en top de page
		$this->SetDrawColor(0,0,0);
		$this->Rect(LEFT_MARGIN,TOP_MARGIN - 2,PAGE_WIDTH - LEFT_MARGIN - RIGHT_MARGIN, 15);

		// Le cartouche d'entete
		$this->SetXY(LEFT_MARGIN,TOP_MARGIN - 2);

		// Fournisseur
		$this->SetFont('helvetica','BU',11);
		$this->Cell(26, 5 ,"Fournisseur :");
		$this->SetFont('helvetica','B',11);
		$this->Cell(100, 5 ,$row_entete['FNOMF']);
		
		// code barre du code fournisseur
		$this->Code39($this->GetX() - 50, $this->GetY() ,$row_entete['NOFOU'],0.8,5);

		// date cde
		$this->SetFont('helvetica','',11);
		$this->Cell(15, 5 ,"Cde du $row_entete[CFEDJ]/$row_entete[CFEDM]/$row_entete[CFEDS]$row_entete[CFEDA]");
		$this->Ln();

		// N° de bon
		$this->SetFont('helvetica','B',11);
		$this->Cell(16, 5 ,"N° Cde : ");
		$this->Cell(20, 5 ,$row_entete['CFBON']);


		// Ref de livraison
		$this->SetFont('helvetica','B',11);
		$this->Cell(90, 5 ,"Ref de livraison : ");

		// date liv
		$this->SetFont('helvetica','',11);
		$this->Cell(30, 5 ,"Date de livraison");
		$this->SetFont('helvetica','',11);
		$this->Cell(50, 5 , "$row_entete[CFELJ]/$row_entete[CFELM]/$row_entete[CFELS]$row_entete[CFELA]");
		$this->Ln();


		// suivi par
		$this->SetFont('helvetica','BI',11);
		$this->Cell(20, 5 ,"Suivi par : ");
		if (trim($row_entete['CFSER']))
			$this->Cell(95, 5 , isset($vendeurs[trim($row_entete['CFSER'])]) ? $vendeurs[trim($row_entete['CFSER'])] : trim($row_entete['CFSER']));
		else
			$this->Cell(95, 5 , '');


		// mis en stock par
		$this->Cell(11,5,'');
		$this->SetFont('helvetica','B',11);
		$this->Cell(70, 5 ,"Mis en stock par :");

		$this->Ln();
		$this->Ln(2);

		// code barre du n° de bon fournisseur
		$this->Code39(LEFT_MARGIN, $this->GetY()-1 ,$row_entete['CFBON'],1,5);

		// titre du document
		$this->SetFont('helvetica','B',12);
		$this->SetTextColor(255,0,0);
		$this->Cell(0,5,"BON DE MISE EN STOCK",0,1,'C');
		$this->Ln(0.2);

		
		$this->SetFont('helvetica','B',14);
		//$this->MultiCell(0,4,"MCS sera fermé pour inventaire les 30 et 31 mars 2009",0,'C');
		//$this->Ln(1);

		//Entete des articles
		$this->SetFont('helvetica','B',10);
		$this->SetTextColor(0,0,0);
		$this->SetDrawColor(0,0,0);
		$this->SetFillColor(220,220,220); // gris clair
		$this->Cell(REF_WIDTH,8,"Référence",1,0,'C',1);
		$this->Cell(DESIGNATION_DEVIS_WIDTH,8,"Désignation",1,0,'C',1);
		$this->Cell(UNITE_WIDTH,8,"Unit.",1,0,'C',1);
		$this->Cell(PU_WIDTH,8,"P.U.",1,0,'C',1);
		$this->Cell(PT_WIDTH,8,"P.T.",1,0,'C',1);
		$this->Cell(QTE_WIDTH,8,"Qté",1,0,'C',1);
		$this->Cell(QTE_RECU_WIDTH,8,"EAN13",1,0,'C',1);
		$this->Cell(LOCAL_WIDTH,8,"Localisation",1,0,'C',1);
		
		$this->Ln();

		
	}



	//PIED DE PAGE
	function Footer()
	{	global $row_entete,$SOCIETE ;
		
		$this->SetFont('helvetica','',9);
		$this->Rect(LEFT_MARGIN, PAGE_HEIGHT - 60, PAGE_WIDTH - LEFT_MARGIN - RIGHT_MARGIN, 40);
		$this->SetXY(LEFT_MARGIN,-60);
		$this->Cell(0,5,"Commentaire :",0,1,'L');

		// qrcode du fichier
		$json = array('t'=>'bon_mise_stock','b'=>$row_entete['CFBON'],'c'=>$row_entete['NOFOU'],'d'=>time(),'p'=>$this->PageNo());
		$qrcode = new QRcode(json_encode($json), 'H'); // error level : L, M, Q, H
		//$qrcode = new QRcode("t=cdecli,c=$row_entete[NOBON]/$row_entete[NOCLI],d=".time(), 'H'); // error level : L, M, Q, H
		$qrcode->displayFPDF($this, LEFT_MARGIN, PAGE_HEIGHT-53, 20);

		// texte avev la date
		$this->SetXY(LEFT_MARGIN,-20);
		
		$this->Cell(0,5,'Edition du '.date('d/m/Y H:i'),0,1,'C');

		// rectangle arrondi en page a gauche avec n° de page
		$this->SetFont('helvetica','',9);
		$this->SetFillColor(192,192,192);
		$this->RoundedRect(PAGE_WIDTH - RIGHT_MARGIN - 3, PAGE_HEIGHT - 16, 12, 6, 2, 'F');
		//Positionnement à 1,7 cm du bas
		$this->SetXY(PAGE_WIDTH - RIGHT_MARGIN,-17);
		$this->SetTextColor(255,255,255);
		$this->Cell(0,8,$this->PageNo().'/{nb}',0,1,'');
		$this->SetTextColor(0,0,0);
		$this->SetFont('helvetica','',8);
		$this->Cell(0,4,PDF_CDE_FOURNISSEUR_PIED1,0,1,'C');
		$this->SetFont('helvetica','',7);
		$this->Cell(0,4,PDF_CDE_FOURNISSEUR_PIED2,0,1,'C');
	}



// pour faire des pointillés
	function SetDash($black=false,$white=false)
    {
        if($black and $white)
            $s=sprintf('[%.3f %.3f] 0 d',$black*$this->k,$white*$this->k);
        else
            $s='[] 0 d';
        $this->_out($s);
    }



// GESTION DES RECTANGLE ARRONDI
	function RoundedRect($x, $y, $w, $h,$r, $style = '')
    {
        $k = $this->k;
        $hp = $this->h;
        if($style=='F')
            $op='f';
        elseif($style=='FD' or $style=='DF')
            $op='B';
        else
            $op='S';
        $MyArc = 4/3 * (sqrt(2) - 1);
        $this->_out(sprintf('%.2f %.2f m',($x+$r)*$k,($hp-$y)*$k ));
        $xc = $x+$w-$r ;
        $yc = $y+$r;
        $this->_out(sprintf('%.2f %.2f l', $xc*$k,($hp-$y)*$k ));

        $this->_Arc($xc + $r*$MyArc, $yc - $r, $xc + $r, $yc - $r*$MyArc, $xc + $r, $yc);
        $xc = $x+$w-$r ;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2f %.2f l',($x+$w)*$k,($hp-$yc)*$k));
        $this->_Arc($xc + $r, $yc + $r*$MyArc, $xc + $r*$MyArc, $yc + $r, $xc, $yc + $r);
        $xc = $x+$r ;
        $yc = $y+$h-$r;
        $this->_out(sprintf('%.2f %.2f l',$xc*$k,($hp-($y+$h))*$k));
        $this->_Arc($xc - $r*$MyArc, $yc + $r, $xc - $r, $yc + $r*$MyArc, $xc - $r, $yc);
        $xc = $x+$r ;
        $yc = $y+$r;
        $this->_out(sprintf('%.2f %.2f l',($x)*$k,($hp-$yc)*$k ));
        $this->_Arc($xc - $r, $yc - $r*$MyArc, $xc - $r*$MyArc, $yc - $r, $xc, $yc - $r);
        $this->_out($op);
    }

    function _Arc($x1, $y1, $x2, $y2, $x3, $y3)
    {
        $h = $this->h;
        $this->_out(sprintf('%.2f %.2f %.2f %.2f %.2f %.2f c ', $x1*$this->k, ($h-$y1)*$this->k,
            $x2*$this->k, ($h-$y2)*$this->k, $x3*$this->k, ($h-$y3)*$this->k));
    }



	var $widths;
	var $aligns;

	function SetWidths($w)
	{
		//Tableau des largeurs de colonnes
		$this->widths=$w;
	}

	function SetAligns($a)
	{
		//Tableau des alignements de colonnes
		$this->aligns=$a;
	}

	function Row($param)
	{
		
		$data = array();
		for($i=0 ; $i<sizeof($param) ; $i++)
			$data[] = isset($param[$i]['text']) ? $param[$i]['text'] : '';

		//Calcule la hauteur de la ligne
		$nb=0;
		for($i=0;$i<count($data);$i++)
			$nb=max($nb,$this->NbLines($this->widths[$i],$data[$i]));
		$h=5*$nb;

		//Effectue un saut de page si nécessaire
		$this->CheckPageBreak($h);
		//Dessine les cellules
		for($i=0;$i<count($data);$i++) {
			$a=isset($this->aligns[$i]) ? $this->aligns[$i] : 'L'; // gere l'align
			$fill = 0 ;

			$this->SetFont( isset($param[$i]['font-family'])?$param[$i]['font-family']:'',
							isset($param[$i]['font-style'])?$param[$i]['font-style']:'',
							isset($param[$i]['font-size'])?$param[$i]['font-size']:'');
			if (isset($param[$i]['font-color']))		$this->SetTextColor($param[$i]['font-color'][0],$param[$i]['font-color'][1],$param[$i]['font-color'][2]);
			if (isset($param[$i]['text-align']))		$a = $param[$i]['text-align'];
			if (isset($param[$i]['background-color']))
				$this->SetFillColor($param[$i]['background-color'][0],$param[$i]['background-color'][1],$param[$i]['background-color'][2]);
			if (isset($param[$i]['background-fill']) && $param[$i]['background-fill'])	
				$fill = 1 ;
			
			$w=$this->widths[$i];
			
			//Sauve la position courante
			$x=$this->GetX();
			$y=$this->GetY();
			//Dessine le cadre
			$this->Rect($x,$y,$w,$h);
			//Imprime le texte
			$this->MultiCell($w,5,$data[$i],0,$a,$fill);
			//Repositionne à droite
			$this->SetXY($x+$w,$y);
		}
		//Va à la ligne
		$this->Ln($h);
	}

	function CheckPageBreak($h)
	{
		//Si la hauteur h provoque un débordement, saut de page manuel
		if($this->GetY() + $h + 8 > $this->PageBreakTrigger)
			$this->AddPage($this->CurOrientation);
	}

	function NbLines($w,$txt)
	{
		//Calcule le nombre de lignes qu'occupe un MultiCell de largeur w
		$cw=&$this->CurrentFont['cw'];
		if($w==0) $w=$this->w-$this->rMargin-$this->x;
		$wmax=($w-2*$this->cMargin)*1000/$this->FontSize;
		$s=str_replace("\r",'',$txt);
		$nb=strlen($s);
		if($nb>0 and $s[$nb-1]=="\n") $nb--;
		$sep=-1; $i=0; $j=0; $l=0; $nl=1;
		while($i<$nb)
		{
			$c=$s[$i];
			if($c=="\n") {
				$i++; $sep=-1; $j=$i; $l=0; $nl++;
				continue;
			}
			if($c==' ') $sep=$i;
			$l+=$cw[$c];
			if($l>$wmax) {
				if($sep==-1) {
					if($i==$j) $i++;
				} else $i=$sep+1;
				$sep=-1; $j=$i; $l=0; $nl++;
			}
			else $i++;
		}
		return $nl;
	}




	// gestion des code barre
	function EAN13($x, $y, $barcode, $h=16, $w=.35)
	{
		$this->Barcode($x, $y, $barcode, $h, $w, 13);
	}

	function UPC_A($x, $y, $barcode, $h=16, $w=.35)
	{
		$this->Barcode($x, $y, $barcode, $h, $w, 12);
	}

	function GetCheckDigit($barcode)
	{
		//Compute the check digit
		$sum=0;
		for($i=1;$i<=11;$i+=2)
			$sum+=3*$barcode{$i};
		for($i=0;$i<=10;$i+=2)
			$sum+=$barcode{$i};
		$r=$sum%10;
		if($r>0)
			$r=10-$r;
		return $r;
	}

	function TestCheckDigit($barcode)
	{
		//Test validity of check digit
		$sum=0;
		for($i=1;$i<=11;$i+=2)
			$sum+=3*$barcode{$i};
		for($i=0;$i<=10;$i+=2)
			$sum+=$barcode{$i};
		return ($sum+$barcode{12})%10==0;
	}

	function Barcode($x, $y, $barcode, $h, $w, $len)
	{
		//Padding
		$barcode=str_pad($barcode, $len-1, '0', STR_PAD_LEFT);
		if($len==12)
			$barcode='0'.$barcode;
		//Add or control the check digit
		if(strlen($barcode)==12)
			$barcode.=$this->GetCheckDigit($barcode);
		elseif(!$this->TestCheckDigit($barcode)) {
			//$this->Error('Incorrect check digit');
			echo "Lib Code39: Incorrect check digit\n";
			return;
		}
		$codes=array(
			'A'=>array(
				'0'=>'0001101', '1'=>'0011001', '2'=>'0010011', '3'=>'0111101', '4'=>'0100011',
				'5'=>'0110001', '6'=>'0101111', '7'=>'0111011', '8'=>'0110111', '9'=>'0001011'),
			'B'=>array(
				'0'=>'0100111', '1'=>'0110011', '2'=>'0011011', '3'=>'0100001', '4'=>'0011101',
				'5'=>'0111001', '6'=>'0000101', '7'=>'0010001', '8'=>'0001001', '9'=>'0010111'),
			'C'=>array(
				'0'=>'1110010', '1'=>'1100110', '2'=>'1101100', '3'=>'1000010', '4'=>'1011100',
				'5'=>'1001110', '6'=>'1010000', '7'=>'1000100', '8'=>'1001000', '9'=>'1110100')
			);
		$parities=array(
			'0'=>array('A', 'A', 'A', 'A', 'A', 'A'),
			'1'=>array('A', 'A', 'B', 'A', 'B', 'B'),
			'2'=>array('A', 'A', 'B', 'B', 'A', 'B'),
			'3'=>array('A', 'A', 'B', 'B', 'B', 'A'),
			'4'=>array('A', 'B', 'A', 'A', 'B', 'B'),
			'5'=>array('A', 'B', 'B', 'A', 'A', 'B'),
			'6'=>array('A', 'B', 'B', 'B', 'A', 'A'),
			'7'=>array('A', 'B', 'A', 'B', 'A', 'B'),
			'8'=>array('A', 'B', 'A', 'B', 'B', 'A'),
			'9'=>array('A', 'B', 'B', 'A', 'B', 'A')
			);
		$code='101';
		$p=$parities[$barcode{0}];
		for($i=1;$i<=6;$i++)
			$code.=$codes[$p[$i-1]][$barcode{$i}];
		$code.='01010';
		for($i=7;$i<=12;$i++)
			$code.=$codes['C'][$barcode{$i}];
		$code.='101';
		//Draw bars
		for($i=0;$i<strlen($code);$i++)
		{
			if($code{$i}=='1')
				$this->Rect($x+$i*$w, $y, $w, $h, 'F');
		}
		//Print text uder barcode
		$this->SetFont('Arial', '', 7);
		$this->Text($x+1, $y+$h+7/$this->k, substr($barcode, -$len));
	}


	function Code39($xpos, $ypos, $code, $baseline=0.5, $height=5){

    $wide = $baseline;
    $narrow = $baseline / 3 ; 
    $gap = $narrow;

    $barChar['0'] = 'nnnwwnwnn';
    $barChar['1'] = 'wnnwnnnnw';
    $barChar['2'] = 'nnwwnnnnw';
    $barChar['3'] = 'wnwwnnnnn';
    $barChar['4'] = 'nnnwwnnnw';
    $barChar['5'] = 'wnnwwnnnn';
    $barChar['6'] = 'nnwwwnnnn';
    $barChar['7'] = 'nnnwnnwnw';
    $barChar['8'] = 'wnnwnnwnn';
    $barChar['9'] = 'nnwwnnwnn';
    $barChar['A'] = 'wnnnnwnnw';
    $barChar['B'] = 'nnwnnwnnw';
    $barChar['C'] = 'wnwnnwnnn';
    $barChar['D'] = 'nnnnwwnnw';
    $barChar['E'] = 'wnnnwwnnn';
    $barChar['F'] = 'nnwnwwnnn';
    $barChar['G'] = 'nnnnnwwnw';
    $barChar['H'] = 'wnnnnwwnn';
    $barChar['I'] = 'nnwnnwwnn';
    $barChar['J'] = 'nnnnwwwnn';
    $barChar['K'] = 'wnnnnnnww';
    $barChar['L'] = 'nnwnnnnww';
    $barChar['M'] = 'wnwnnnnwn';
    $barChar['N'] = 'nnnnwnnww';
    $barChar['O'] = 'wnnnwnnwn'; 
    $barChar['P'] = 'nnwnwnnwn';
    $barChar['Q'] = 'nnnnnnwww';
    $barChar['R'] = 'wnnnnnwwn';
    $barChar['S'] = 'nnwnnnwwn';
    $barChar['T'] = 'nnnnwnwwn';
    $barChar['U'] = 'wwnnnnnnw';
    $barChar['V'] = 'nwwnnnnnw';
    $barChar['W'] = 'wwwnnnnnn';
    $barChar['X'] = 'nwnnwnnnw';
    $barChar['Y'] = 'wwnnwnnnn';
    $barChar['Z'] = 'nwwnwnnnn';
    $barChar['-'] = 'nwnnnnwnw';
    $barChar['.'] = 'wwnnnnwnn';
    $barChar[' '] = 'nwwnnnwnn';
    $barChar['*'] = 'nwnnwnwnn';
    $barChar['$'] = 'nwnwnwnnn';
    $barChar['/'] = 'nwnwnnnwn';
    $barChar['+'] = 'nwnnnwnwn';
    $barChar['%'] = 'nnnwnwnwn';

 /*   $this->SetFont('Arial','',10);
    $this->Text($xpos, $ypos + $height + 4, $code);*/
    $this->SetFillColor(0);

    $code = '*'.strtoupper($code).'*';
    for($i=0; $i<strlen($code); $i++){
        $char = $code[$i];
        if(!isset($barChar[$char])){
				//$this->Error('Invalid character in barcode: '.$char);
				echo 'Lib Code39: Invalid character in barcode: '.$char."\n";
				return;
			}
        $seq = $barChar[$char];
        for($bar=0; $bar<9; $bar++){
            if($seq[$bar] == 'n'){
                $lineWidth = $narrow;
            }else{
                $lineWidth = $wide;
            }
            if($bar % 2 == 0){
                $this->Rect($xpos, $ypos, $lineWidth, $height, 'F');
            }
            $xpos += $lineWidth;
        }
        $xpos += $gap;
    }
}

}
$pdf=new PDF();
$pdf->Open();
$pdf->AddPage();
?>