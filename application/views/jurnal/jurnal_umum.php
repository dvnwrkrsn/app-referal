<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Jurnal Umum
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="#">Data Jurnal Umum</a></li>
        </ol>
    </section>

    <br>

    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header">
                <button class="btn btn-sm btn-primary fa fa-plus" data-toggle="modal" data-target="#tambahjurnal"> Tambah Jurnal</button>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover table-bordered" id="tbl_data_jurnal">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No Jurnal</th>
                                    <th style="text-align: center;">Bulan</th>
                                    <th style="text-align: center;">Akun</th>
                                    <th style="text-align: center;">Debit</th>
                                    <th style="text-align: center;">Kredit</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($jurnal->result_array() as $j) { ?>
                                    <tr>
                                        <td style="text-align: center;"><?= $j['no_referensi'] ?></td>
                                        <td style="text-align: center;"><?= $j['bulan'] ?></td>
                                        <td style="text-align: center;"><?= $j['nama_akun'] ?></td>
                                        <td style="text-align: center;"><?= curformat($j['debet']) ?></td>
                                        <td style="text-align: center;"><?= curformat($j['kredit']) ?></td>
                                        <td style="text-align: center;">
                                            <a class="btn btn-md btn-danger fa fa-close btn-hapus" data-id="<?= $j['no_referensi'] ?>"> Hapus</a>
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

<!-- Modal Tambah Data Jurnal -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambahjurnal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Tambah Data Jurnal</h4>
            </div>
            <form class="form-horizontal" action="<?= base_url() ?>jurnal/jurnal_umum/save_jurnal" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Bulan</label>
                        <div class="col-lg-10">
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
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Akun Debit</label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" value="<?= $kas['nama_akun'] ?>" disabled>
                            <input type="hidden" id="akun" name="akun" value="<?= $kas['kode_akun'] ?>">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control currency" id="debit" name="debit">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Akun Kredit</label>
                        <div class="col-lg-4">
                            <input type="text" class="form-control" value="<?= $pendapatan['nama_akun'] ?>" disabled>
                            <input type="hidden" id="akun" name="akun" value="<?= $pendapatan['kode_akun'] ?>">
                        </div>
                        <div class="col-lg-6">
                            <input type="text" class="form-control currency" id="kredit" name="kredit">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-info" type="submit"> Simpan&nbsp;</button>
                    <button type="button" class="btn btn-warning" data-dismiss="modal"> Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {

        $('#tbl_data_jurnal').DataTable();

        $('.currency').maskMoney();

        <?php if ($this->session->flashdata('update')) { ?>
            swal({
                title: "Berhasil",
                text: "Data telah berhasil diubah!",
                type: "success",
                button: false,
                timer: 5000,
            });
        <?php } ?>

        <?php if ($this->session->flashdata('add')) { ?>
            swal({
                title: "Berhasil",
                text: "Data telah berhasil ditambah!",
                type: "success",
                button: false,
                timer: 5000,
            });
        <?php } ?>

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
                        url: '<?= base_url() ?>jurnal/jurnal_umum/delete_data_jurnal',
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

<!-- 
<div class="form-group">
    <label class="col-lg-2 col-sm-2 control-label">Akun Kredit</label>
    <div class="col-lg-10">
        <input type="text" class="form-control currency" id="kredit" name="kredit">
    </div>
</div> -->

<!-- <div class="form-group">
    <label class="col-lg-2 col-sm-2 control-label">Akun</label>
    <div class="col-lg-10">
        <select class="form-control" name="akun" id="akun">
            <option>-- Pilih Akun --</option>
            <?php foreach ($akun->result_array() as $a) { ?>
                <option value="<?= $a['kode_akun'] ?>"><?= $a['nama_akun'] ?></option>
            <?php } ?>
        </select>
    </div>
</div> -->