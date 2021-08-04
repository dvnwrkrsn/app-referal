<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Jenis Pembayaran
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="#">Data Jenis Pembayaran</a></li>
        </ol>
    </section>

    <br>

    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header">
                <button class="btn btn-md btn-primary fa fa-plus" data-toggle="modal" data-target="#tambahjenispembayaran"> Tambah Jenis Pembayaran</button>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover table-bordered" id="tbl_jenis_pembayaran">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No.</th>
                                    <th style="text-align: center;">Kelas</th>
                                    <th style="text-align: center;">Tahun Ajar</th>
                                    <th style="text-align: center;">Jumlah</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($jenis_bayar->result_array() as $jb) { ?>
                                    <tr>
                                        <td style="text-align: center;"><?= $i++ ?></td>
                                        <td style="text-align: center;"><?= $jb['kelas'] ?></td>
                                        <td style="text-align: center;"><?= $jb['tahun'] ?></td>
                                        <td style="text-align: center;"><?= curformat($jb['jumlah']) ?></td>
                                        <td style="text-align: center;">
                                            <a class="btn btn-md btn-primary fa fa-edit" data-toggle="modal" data-target="#editjenispembayaran<?= $jb['id'] ?>"> Edit</a>
                                            <a class="btn btn-md btn-danger fa fa-close btn-hapus" data-id="<?= $jb['id'] ?>"> Hapus</a>
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

<!-- Modal Tambah Data Jenis Pembayaran -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambahjenispembayaran" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Tambah Data Jenis Pembayaran</h4>
            </div>
            <form class="form-horizontal" action="<?= base_url() ?>jenis_pembayaran/jenis_pembayaran/save_jenis_pembayaran" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body" id="edit-tanggal">
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Kelas</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="kelas" id="kelas">
                                <option>-- Pilih Kelas / Tahun Ajar --</option>
                                <?php foreach ($kelas->result_array() as $k) { ?>
                                    <option value="<?= $k['id_kelas'] ?>"><?= $k['nama_kelas'] . " - " . $k['tahun_ajaran'] ?> </option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Jumlah</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control currency" id="jumlah" name="jumlah">
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

<!-- Modal Edit Data Jenis Pembayaran -->
<?php foreach ($jenis_bayar->result_array() as $jb) :
    $id      = $jb['id'];
    $nama    = $jb['kelas'];
    $tahun   = $jb['tahun'];
    $jumlah  = $jb['jumlah'];
    $kl      = $jb['id_kelas'];
?>
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editjenispembayaran<?= $id ?>" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Edit Jenis Pembayaran</h4>
                </div>
                <form class="form-horizontal" action="<?= base_url() ?>jenis_pembayaran/jenis_pembayaran/save_edit_bayar" method="post" enctype="multipart/form-data" role="form">
                    <div class="modal-body" id="edit-tanggal">
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Kelas</label>
                            <div class="col-lg-10">
                                <select class="form-control" name="kelas" id="kelas">
                                    <option>-- Pilih Kelas / Tahun Ajar --</option>
                                    <?php foreach ($kelas->result_array() as $k) { ?>
                                        <option value="<?= $k['id_kelas'] ?>" <? if ($k['id_kelas'] == $kl) echo "selected" ?>><?= $k['nama_kelas'] . " - " . $k['tahun_ajaran'] ?> </option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Jumlah</label>
                            <div class="col-lg-10">
                                <input type="hidden" id="id_jenis" name="id_jenis" value="<?= $id ?>">
                                <input type="text" class="form-control currency" id="jumlah" name="jumlah" value="<?= curformat($jumlah) ?>">
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

        $('#tbl_jenis_pembayaran').DataTable();

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
                        url: '<?= base_url(); ?>jenis_pembayaran/jenis_pembayaran/delete_data_kelas',
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