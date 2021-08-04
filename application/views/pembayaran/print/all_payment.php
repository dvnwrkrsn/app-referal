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
                        <td width="100%" style="font-size:13px"><b>SMA</b><br><b>Plus Yaspida</b><br>Jl. Parungseah No.43, Cipetir, Kadudampit, Kota Sukabumi, Jawa Barat 43153</td>
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

                    <tr>
                        <td width="5%" style="text-align: left; font-size:12px;">No</td>
                        <td width="40%" style="text-align: center; font-size:12px;">No Pembayaran </td>
                        <td width="20%" style="text-align: center; font-size:12px;">Tanggal Pembayaran</td>
                        <td width="40%" style="text-align: center; font-size:12px;">Jumlah</td>
                    </tr>

                    <tr>
                        <td width="100%">_______________________________________________________________________________</td>
                    </tr>

                    <?php $i = 1;
                    foreach ($kwitansi->result_array() as $k) { ?>
                        <tr>
                            <td width="5%" style="text-align: left; font-size:12px;"><?= $i++ ?></td>
                            <td width="40%" style="text-align: center; font-size:12px;"><?= $k['no_pembayaran'] ?></td>
                            <td width="20%" style="text-align: center; font-size:12px;"><?= $k['tgl_bayar'] ?></td>
                            <td width="40%" style="text-align: center; font-size:12px;"><?= curformat($k['jumlah']) ?></td>
                        </tr>
                    <?php } ?>

                    <tr>
                        <td width="100%">_______________________________________________________________________________</td>
                    </tr>
                </tbody>

            </table>
        </page>
    </div>
</body>

</html>