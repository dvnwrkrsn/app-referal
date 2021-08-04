<!DOCTYPE html>
<html>
<head>
    <title>cetak-laporan</title>
</head>
<body>
    <h3>SURAT PENGADUAN KERUSAKAN</h3>
    
    Berdasarkan pada Surat Permohonan Perbaikan barang :

    <br/><br/>

    <table>
        <tbody>
            <tr>
                <th>No</th>
                <th>:</th>
                <th>
                    <?php echo $pengaduan['id_pengaduan'] ?>
                </th>
            </tr>
            <tr>
                <th>Tanggal/Jam</th>
                <th>:</th>
                <th>
                <?php echo $pengaduan['tgl_pengaduan'] ?>
                </th>
            </tr>
            <tr>
                <th>Instansi/Bagian</th>
                <th>:</th>
                <th>
                <?php echo $pengaduan['nama_bagian'] ?>
                </th>
            </tr>
            <tr>
                <th>Jenis Pengaduan</th>
                <th>:</th>
                <th>
                <?php echo $pengaduan['jenis_pengaduan'] ?>
                </th>
            </tr>
            <tr>
                <th>Keterangan</th>
                <th>:</th>
                <th>
                <?php echo $pengaduan['keterangan'] ?>
                </th>
            </tr>
            <tr>
                <th>Hasil Pemeriksaan</th>
                <th>:</th>
                <th>
                <?php echo $pengaduan['hasil_pemeriksaan'] ?>
                </th>
            </tr>


            
        </tbody>
    </table>


</body>
</html>