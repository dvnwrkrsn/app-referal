<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Kelas
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="#">Data Kelas</a></li>
        </ol>
    </section>

    <br>

    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header">
                <button class="btn btn-md btn-primary fa fa-plus" data-toggle="modal" data-target="#tambahkelas"> Tambah Kelas</button>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover table-bordered" id="tbl_kelas">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No.</th>
                                    <th style="text-align: center;">Kelas</th>
                                    <th style="text-align: center;">Tahun Ajar</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($data_kelas->result_array() as $dk) { ?>
                                    <tr>
                                        <td style="text-align: center;"><?= $i++ ?></td>
                                        <td style="text-align: center;"><?= $dk['nama_kelas'] ?></td>
                                        <td style="text-align: center;"><?= $dk['tahun_ajaran'] ?></td>
                                        <td style="text-align: center;">
                                            <a href="" class="btn btn-md btn-primary fa fa-edit" data-toggle="modal" data-target="#editkelas<?= $dk['id_kelas'] ?>"> Edit</a>
                                            <a class="btn btn-md btn-danger fa fa-close btn-hapus" data-id="<?= $dk['id_kelas'] ?>"> Hapus</a>
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

<!-- Modal Tambah Data Kelas -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambahkelas" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Tambah Data Kelas</h4>
            </div>
            <form class="form-horizontal" action="<?= base_url() ?>kelas/kelas/save_data_kelas" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body" id="edit-tanggal">
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Kelas</label>
                        <div class="col-lg-10">
                            <input class="form-control" id="kelas" name="kelas">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Tahun Ajaran</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="tahun_ajar" name="tahun_ajar">
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

<!-- Modal Edit Data Kelas -->
<?php foreach ($data_kelas->result_array() as $dk) :
    $id      = $dk['id_kelas'];
    $nama    = $dk['nama_kelas'];
    $tahun   = $dk['tahun_ajaran'];
?>
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editkelas<?= $id ?>" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Edit Data Kelas</h4>
                </div>
                <form class="form-horizontal" action="<?= base_url() ?>kelas/kelas/save_edit_kelas" method="post" enctype="multipart/form-data" role="form">
                    <div class="modal-body" id="edit-tanggal">
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Kelas</label>
                            <div class="col-lg-10">
                                <input type="hidden" id="id_kelas" name="id_kelas" value="<?= $id ?>">
                                <input class="form-control" id="kelas" name="kelas" value="<?= $nama ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Tahun Ajaran</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="tahun_ajar" name="tahun_ajar" value="<?= $tahun ?>">
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
                        url: '<?= base_url(); ?>kelas/kelas/delete_data_kelas',
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