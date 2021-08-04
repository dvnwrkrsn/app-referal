<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Akun
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="#">Data Akun</a></li>
        </ol>
    </section>

    <br>

    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header">
                <button class="btn btn-md btn-primary fa fa-plus" data-toggle="modal" data-target="#tambahakun"> Tambah Akun</button>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover table-bordered" id="tbl_kelas">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No.</th>
                                    <th style="text-align: center;">Kode Akun</th>
                                    <th style="text-align: center;">Nama Akun</th>
                                    <th style="text-align: center;">Jenis Akun</th>
                                    <th style="text-align: center;">Saldo Normal</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($data_akun->result_array() as $a) { ?>
                                    <tr>
                                        <td style="text-align: center;"><?= $i++ ?></td>
                                        <td style="text-align: center;"><?= $a['kode_akun'] ?></td>
                                        <td style="text-align: center;"><?= $a['nama_akun'] ?></td>
                                        <td style="text-align: center;"><?= $a['jenis_akun'] ?></td>
                                        <td style="text-align: center;"><?= $a['saldo_normal'] ?></td>
                                        <td style="text-align: center;">
                                            <a class="btn btn-md btn-primary fa fa-edit" data-toggle="modal" data-target="#editakun<?= $a['id_akun'] ?>"> Edit</a>
                                            <a class="btn btn-md btn-danger fa fa-close btn-hapus" data-id="<?= $a['id_akun'] ?>"> Hapus</a>
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

<!-- Modal Tambah Data Akun -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambahakun" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Tambah Data Akun</h4>
            </div>
            <form class="form-horizontal" action="<?= base_url() ?>akun/akun/save_data_akun" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body" id="edit-tanggal">
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Kode Akun</label>
                        <div class="col-lg-10">
                            <input class="form-control" id="kode_akun" name="kode_akun">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Nama Akun</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="nama_akun" name="nama_akun">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Jenis Akun</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="jenis_akun" name="jenis_akun">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Saldo Normal</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="saldo_normal" name="saldo_normal">
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

<!-- Modal Edit Data Akun -->
<?php foreach ($data_akun->result_array() as $a) :
    $id         = $a['id_akun'];
    $kode       = $a['kode_akun'];
    $nama       = $a['nama_akun'];
    $jenis      = $a['jenis_akun'];
    $saldo      = $a['saldo_normal'];
?>
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editakun<?= $id ?>" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Edit Data Akun</h4>
                </div>
                <form class="form-horizontal" action="<?= base_url() ?>akun/akun/save_edit_akun" method="post" enctype="multipart/form-data" role="form">
                    <div class="modal-body" id="edit-tanggal">
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Kode Akun</label>
                            <div class="col-lg-10">
                                <input type="hidden" id="id_akun" name="id_akun" value="<?= $id ?>">
                                <input class="form-control" id="kode_akun" name="kode_akun" value="<?= $kode ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Nama Akun</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="nama_akun" name="nama_akun" value="<?= $nama ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Jenis Akun</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="jenis_akun" name="jenis_akun" value="<?= $jenis ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Saldo Normal</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="saldo_normal" name="saldo_normal" value="<?= $saldo ?>">
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
<?php endforeach; ?>

<script>
    $(document).ready(function() {

        $('#tbl_kelas').DataTable();

        <?php if ($this->session->flashdata('add')) { ?>
            swal({
                title: "Berhasil",
                text: "Data telah berhasil ditambah!",
                type: "success",
                button: false,
                timer: 5000,
            });
        <?php } ?>

        <?php if ($this->session->flashdata('update')) { ?>
            swal({
                title: "Berhasil",
                text: "Data telah berhasil diubah!",
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
                        url: '<?= base_url(); ?>akun/akun/delete_data_akun',
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