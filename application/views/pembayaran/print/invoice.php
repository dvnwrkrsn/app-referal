<!doctype html>
<html>

<head>
    <title>Kwitansi Deposit</title>
    <style>
        body {
            background: #cccccc;
            font-size: 12pt;
            font-family: "helvetica", Courier, monospace;
        }

        page[size="kwitansi"] {
            background: white;
            width: 21.3cm;
            height: 10.3cm;
            display: block;
            margin: 0 auto;
            padding-left: 4cm;
            padding-right: 1cm;
            padding-top: 1.0cm;
            margin-bottom: 0.5cm;
            box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
        }
    </style>
</head>

<body>
    <div>
        <page size="kwitansi">
            <table>
                <tbody>
                    <tr>
                        <td width="10%"><img src="" alt="Logo" height="70" width="70"></td>
                        <td width="90%" style="font-size:13px"><b>SMA</b><br><b>Plus Yaspida</b><br>Jl. Parungseah No.43, Cipetir, Kadudampit, Kota Sukabumi, Jawa Barat 43153</td>
                    </tr>

                    <tr>
                        <td width="100%">_______________________________________________________________________________</td>
                    </tr>

                    <tr>
                        <td width="100%" style="text-align: center;"> </td>
                    </tr>

                    <tr>
                        <td width="40%" style="text-align: left;"></td>
                        <td width="35%" style="text-align: left;"></td>
                        <td width="25%" style="text-align: left; font-size:9px; font-weight: bold"></td>
                    </tr>

                    <tr>
                        <td></td>
                    </tr>

                    <tr>
                        <td width="40%" style="text-align: left;"></td>
                        <td width="35%" style="text-align: left;"></td>
                        <td width="25%" style="text-align: left; font-size:9px;"></td>
                    </tr>

                    <tr>
                        <td width="39%" style="text-align: left;"></td>
                        <td width="70%" style="text-align: left;">Kwitansi Pembayaran</td>
                    </tr>

                    <tr>
                        <td width="100%">_______________________________________________________________________________</td>
                    </tr>

                    <!-- <tr>
                <td width="100%" style="text-align: center;">  </td>
            </tr> -->

                    <tr>
                        <td width="5%" style="text-align: left; font-size:12px;">No</td>
                        <td width="60%" style="text-align: center; font-size:12px;">No Pembayaran </td>
                        <td width="20%" style="text-align: center; font-size:12px;">Jumlah</td>
                    </tr>

                    <tr>
                        <td width="100%">_______________________________________________________________________________</td>
                    </tr>

                    <?php $i = 1; ?>
                    <tr>
                        <td width="5%" style="text-align: left; font-size:12px;"><?= $i++ ?></td>
                        <td width="60%" style="text-align: center; font-size:12px;"><?= $kwitansi['no_pembayaran'] ?></td>
                        <td width="20%" style="text-align: center; font-size:12px;"><?= curformat($kwitansi['jumlah']) ?></td>
                    </tr>

                    <tr>
                        <td width="100%">_______________________________________________________________________________</td>
                    </tr>

                    <tr>
                        <td width="40%" style="text-align: left; font-size:12px;"> Jumlah Tagihan</td>
                        <td width="20%" style="text-align: left; font-size:12px;">: </td>
                        <td width="30%" style="text-align: center; font-size:12px;"><?= curformat($kwitansi['jumlah']) ?></td>
                    </tr>

                    <tr>
                        <td width="100%">_______________________________________________________________________________</td>
                    </tr>

                    <br>

                    <tr>
                        <td width="76.8%" style="text-align: left; font-size:11.5px;">Diterima tanggal : ..............................................</td>
                        <td width="30%" style="text-align: left;  font-size:11.5px;">Bogor, <?= get_detail_tgl(date('Y-m-d')) ?> </td>
                    </tr>

                    <br>

                    <tr>
                        <td width="77%" style="text-align: left;  font-size:11.5px;">Yang Menerima :</td>
                        <td width="18%" style="text-align: center;  font-size:11.5px;">Ponpes Al Istiqomah :</td>
                    </tr>

                    <tr>
                        <td colspan="4" width="81%"></td>
                        <td style="text-align: left;  font-size:11.5px;" colspan="2" width="40%">A.N.Kepsek </td>
                    </tr>

                    <tr>
                        <td colspan="2" width="65%"> </td>
                        <td style="text-align: center;  font-size:11.5px;" colspan="2" width="40%"></td>
                    </tr>


                    <tr>
                        <td width="100%" colspan="5"></td>
                    </tr>

                    <tr>
                        <td width="100%" colspan="5"></td>
                    </tr>
                    <tr>
                        <td width="100%" colspan="5"></td>
                    </tr>

                    <br>

                    <tr>
                        <td colspan="4" width="65%" style="text-align: left;  font-size:11.5px;">(.................................................)</td>
                        <td colspan="2" width="40%" style="text-align: center;  font-size:11.5px;">Petugas Pembayaran</td>
                    </tr>

                </tbody>
            </table>
        </page>
    </div>
</body>

</html>