<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Laporan Pembayaran
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="#">Laporan Pembayaran</a></li>
        </ol>
    </section>

    <br>

    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-inline">
                            <div class="form-group">
                                <select name="bulan" id="bulan" class="form-control">
                                    <option value="Januari">Januari</option>
                                    <option value="Februari">Februari</option>
                                    <option value="Maret">Maret</option>
                                    <option value="April">April</option>
                                    <option value="Mei">Mei</option>
                                    <option value="Juni">Juni</option>
                                    <option value="Juli">Juli</option>
                                    <option value="Agustus">Agustus</option>
                                    <option value="September">September</option>
                                    <option value="Oktober">Oktober</option>
                                    <option value="November">November</option>
                                    <option value="Desember">Desember</option>
                                </select>
                                <span>
                                    <button class="btn btn-primary pull-right btn_cari">
                                        <i class="fa fa-search"></i> Cari
                                    </button>
                                </span>
                            </div>
                            <a href="<?= base_url(); ?>laporan/laporan_bayar/print_invoice/<?= $this->uri->segment(4) ?>" class="btn btn-danger btn_export"><i class="fa fa-file-pdf-o"></i> Export</a>
                        </div>
                    </div>
                </div>
                <table id="table_laporan" class="table table-responsive table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Bayar</th>
                            <th>No Pembayaran</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        $total_penerimaan = 0;
                        foreach ($laporan->result_array() as $l) {
                            $total_penerimaan += $l['jumlah']; ?>
                            <tr>
                                <td><?= $i++ ?></td>
                                <td><?= $l['tgl_bayar'] ?></td>
                                <td><?= $l['no_pembayaran'] ?></td>
                                <td><?= $l['nis'] ?></td>
                                <td><?= $l['nama_siswa'] ?></td>
                                <td><?= curformat($l['jumlah']) ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5">Total</td>
                            <td><?= curformat($total_penerimaan) ?></td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {

        $('.input-daterange input').datepicker({
            format: 'yyyy-mm-dd'
        });

        $('#table_laporan').DataTable({
            "bLengthChange": false,
        });

        $('.btn_export').click(function() {
            var bulan = $('#bulan').val();
            window.location.href = "<?= base_url(); ?>laporan/laporan_bayar/print_invoice/" + bulan;
        });

        $('.btn_cari').click(function() {
            var bulan = $('#bulan').val();
            window.location.href = "<?= base_url() ?>laporan/laporan_bayar/index/" + bulan;
        });

    });
</script>