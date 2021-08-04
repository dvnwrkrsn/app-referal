<style>
    .table-borderless>tbody>tr>td,
    .table-borderless>tbody>tr>th,
    .table-borderless>tfoot>tr>td,
    .table-borderless>tfoot>tr>th,
    .table-borderless>thead>tr>td,
    .table-borderless>thead>tr>th {
        border: none;
    }
</style>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Pembayaran SPP
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="#">Data Pembayaran SPP</a></li>
        </ol>
    </section>

    <br>

    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header">

            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <form action="<?= base_url() ?>pembayaran/pembayaran/save_pembayaran" method="post">
                            <table class="table table-borderless" id="tbl_pembayaran">
                                <thead>
                                    <tr>
                                        <th scope="col">NIS</th>
                                        <th scope="col">
                                            <input type="hidden" id="id_siswa" name="id_siswa" value="<?= $pembayaran['id'] ?>">
                                            <input type="hidden" id="nis" name="nis" value="<?= $pembayaran['nis'] ?>"><?= $pembayaran['nis'] ?>
                                        </th>
                                        <th scope="col">
                                            <a href="<?= base_url() ?>pembayaran/pembayaran/print_all_payment/<?= $pembayaran['nis'] ?>" class="btn btn-md btn-success fa fa-print"> Cetak semua data pembayaran</a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Nama Siswa</th>
                                        <th scope="col"><?= $pembayaran['siswa'] ?></th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Kelas</th>
                                        <th scope="col"><?= $pembayaran['kelas'] ?></th>
                                        <th scope="col"><?= $pembayaran['tahun'] ?></th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Jumlah Pembayaran</th>
                                        <th scope="col">
                                            <input type="hidden" id="jumlah" name="jumlah" value="<?= curformat($pembayaran['jumlah']) ?>"><?= curformat($pembayaran['jumlah']) ?>/Bulan
                                        </th>
                                    </tr>
                                    <tr>
                                        <th scope="col">Pembayaran</th>
                                        <th scope="col">
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
                                        </th>
                                        <th scope="col">
                                            <button class="btn btn-md btn-primary"> Bayar</button>
                                        </th>
                                    </tr>
                                </thead>
                            </table>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered" id="table_pembayaran">
                            <thead>
                                <tr>
                                    <th scope="col">No.</th>
                                    <th scope="col">No Pembayaran</th>
                                    <th scope="col">Bulan</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($detail->result_array() as $d) { ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><?= $d['no_pembayaran'] ?></td>
                                        <td><?= $d['bulan'] ?></td>
                                        <td><?= $d['tgl_bayar'] ?></td>
                                        <td><?= curformat($d['jumlah']) ?></td>
                                        <td>
                                            <a class="btn btn-md btn-danger fa fa-close btn-hapus" data-id="<?= $d['id_pembayaran'] ?>"> Hapus</a>
                                            <a href="<?= base_url() ?>pembayaran/pembayaran/print_invoice/<?= $d['id_pembayaran'] ?>" class="btn btn-md btn-success fa fa-print"> Cetak</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        <?php if ($this->session->flashdata('add')) { ?>
            swal({
                title: "Berhasil",
                text: "Pembayaran berhasil ditambahkan!",
                type: "success",
                button: false,
                timer: 5000,
            });
        <?php } ?>

        $('#table_pembayaran').DataTable();

        $('.btn-hapus').click(function(e) {
            var id = $(this).data('id');
            swal({
                title: "Konfirmasi",
                text: "Anda yakin akan menghapus data ini?",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Ya",
                cancelButtonText: "Tidak",
                closeOnConfirm: false,
                closeOnCancel: true
            }, function(isConfirm) {
                if (isConfirm) {
                    $.ajax({
                        method: 'POST',
                        dataType: 'json',
                        url: '<?= base_url(); ?>pembayaran/pembayaran/delete_data_pembayaran',
                        data: {
                            id: id
                        },
                        success: function(data) {
                            if (data.metaData.code == 200) {
                                swal("Berhasil dihapus", data.metaData.message, "success");
                                swal({
                                    title: data.metaData.message,
                                    type: "info",
                                    closeOnConfirm: false,
                                    showLoaderOnConfirm: true
                                }, function() {
                                    location.reload();
                                });
                            } else {
                                swal("Berhasil dihapus", data.metaData.message, "error");
                            }
                        }
                    });

                }
            });
        });

    });
</script>