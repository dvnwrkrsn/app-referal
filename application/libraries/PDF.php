<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require_once APPPATH . "third_party/TCPDF/tcpdf.php";

class Pdf extends TCPDF
{

    private $footer_title = '';

    function __construct($orientation = 'P', $unit = 'mm', $format = 'A4', $unicode = true, $encoding = 'UTF-8', $diskcache = false, $pdfa = false)
    {
        parent::__construct($orientation, $unit, $format, $unicode, $encoding, $diskcache, $pdfa);
    }

    // Kop Surat RSUD Kota Bogor
    public function Header()
    {
        // Logo
        $this->Image(K_PATH_IMAGES . PDF_HEADER_LOGO, 25, 10, 25, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Set font
        $this->SetFont('times', 'B', 16);
        // Title
        $this->MultiCell(0, 0, "-", 0, 'C', 0, 1, '', '', true);
        $this->SetFont('times', '', 12);
        $this->SetX(50);
        $this->MultiCell(0, 0, "-", 0, 'C', 0, 1, '', '', true);
        $style  = array('width' => 1, 'cap' => 'butt', 'join' => 'bevel', 'dash' => 0, 'color' => array(0, 0, 0));
        $style2 = array('width' => 0.2, 'cap' => 'butt', 'join' => 'bevel', 'dash' => 0, 'color' => array(0, 0, 0));
        $y = $this->y + 3;
        $this->Line(15, $y, 195, $y, $style);
        $this->Line(15, $y + 1, 195, $y + 1, $style2);
    }

    public function set_footer_title($footer_title)
    {
        $this->footer_title = $footer_title;
    }

    public function Footer()
    {
        // Position at 10 mm from bottom
        $this->SetY(-10);

        $style2 = array('width' => 0.3, 'cap' => 'butt', 'join' => 'bevel', 'dash' => 0, 'color' => array(0, 0, 0));
        $this->Line(15, $this->GetY(), 195, $this->GetY(), $style2);

        // Set font
        $this->SetFont('times', 'I', 9);

        $this->Cell(90, 0, $this->footer_title, 0, false, 'L', 0, '', 0, false, 'T', 'T');
        $this->Cell(90, 0, $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, 1, 'R', 0, '', 0, false, 'T', 'T');
    }
}
