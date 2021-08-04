<?php


if (!defined('BASEPATH')) exit('No direct script access allowed');

function curformat($value, $dec = 0)
{
    $res = number_format($value, $dec, ",", ".");
    return $res;
}

function terbilang($x)
{
    $abil = array("", "SATU", "DUA", "TIGA", "EMPAT", "LIMA", "ENAM", "TUJUH", "DELAPAN", "SEMBILAN", "SEPULUH", "SEBELAS");
    $dibilang = "";
    if ($x < 0) {
        $x *= -1;
        $dibilang = "Minus ";
    }

    if ($x < 12)
        $dibilang = " " . $abil[$x];
    elseif ($x < 20)
        $dibilang = terbilang($x - 10) . " BELAS";
    elseif ($x < 100)
        $dibilang = terbilang($x / 10) . " PULUH" . terbilang($x % 10);
    elseif ($x < 200)
        $dibilang = " SERATUS" . terbilang($x - 100);
    elseif ($x < 1000)
        $dibilang = terbilang($x / 100) . " RATUS" . terbilang($x % 100);
    elseif ($x < 2000)
        $dibilang = " SERIBU" . terbilang($x - 1000);
    elseif ($x < 1000000)
        $dibilang = terbilang($x / 1000) . " RIBU" . terbilang($x % 1000);
    elseif ($x < 1000000000)
        $dibilang = terbilang($x / 1000000) . " JUTA" . terbilang($x % 1000000);
    return $dibilang;
}

function terbilang_rupiah($x)
{
    return $x . " RUPIAH";
}

function get_detail_tgl($tgl)
{
    $thn    = substr($tgl, 0, 4);
    $bln    = substr($tgl, 5, 2);
    $tgl     = substr($tgl, 8, 2);

    switch ($bln) {
        case '01':
            $bln = 'Januari';
            break;
        case '02':
            $bln = 'Februari';
            break;
        case '03':
            $bln = 'Maret';
            break;
        case '04':
            $bln = 'April';
            break;
        case '05':
            $bln = 'Mei';
            break;
        case '06':
            $bln = 'Juni';
            break;
        case '07':
            $bln = 'Juli';
            break;
        case '08':
            $bln = 'Agustus';
            break;
        case '09':
            $bln = 'September';
            break;
        case '10':
            $bln = 'Oktober';
            break;
        case '11':
            $bln = 'November';
            break;
        case '12':
            $bln = 'Desember';
            break;
    }

    $tgl = $tgl . " " . $bln . " " . $thn;

    return $tgl;
}

function get_date()
{
    return date('Y-m-d');
}
