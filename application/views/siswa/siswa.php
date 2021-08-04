<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Data Siswa
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
            <li class="active"><a href="#">Data Siswa</a></li>
        </ol>
    </section>

    <br>

    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header">
                <button class="btn btn-sm btn-primary fa fa-plus" data-toggle="modal" data-target="#tambahsiswa"> Tambah Siswa</button>
            </div>
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-hover table-bordered" id="tbl_data_siswa">
                            <thead>
                                <tr>
                                    <th style="text-align: center;">No.</th>
                                    <th style="text-align: center;">NIS</th>
                                    <th style="text-align: center;">Nama Siswa</th>
                                    <th style="text-align: center;">Kelas</th>
                                    <th style="text-align: center;">Jenis Kelamin</th>
                                    <th style="text-align: center;">Alamat</th>
                                    <th style="text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($data_siswa->result_array() as $ds) { ?>
                                    <tr>
                                        <td style="text-align: center;"><?= $i++ ?></td>
                                        <td style="text-align: center;"><?= $ds['nis'] ?></td>
                                        <td style="text-align: center;"><?= $ds['siswa'] ?></td>
                                        <td style="text-align: center;"><?= $ds['kelas'] ?></td>
                                        <td style="text-align: center;"><?= $ds['jenis_kelamin'] ?></td>
                                        <td style="text-align: center;"><?= $ds['alamat'] ?></td>
                                        <td style="text-align: center;">
                                            <a href="<?= base_url() ?>pembayaran/pembayaran/index/<?= $ds['id'] ?>" class="btn btn-md btn-success fa fa-usd"> Bayar</a>
                                            <a class="btn btn-md btn-primary fa fa-edit" data-toggle="modal" data-target="#editsiswa<?= $ds['id'] ?>"> Edit</a>
                                            <a class="btn btn-md btn-danger fa fa-close btn-hapus" data-id="<?= $ds['id'] ?>"> Hapus</a>
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

<!-- Modal Tambah Data Siswa -->
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="tambahsiswa" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">Tambah Data Siswa</h4>
            </div>
            <form class="form-horizontal" action="<?= base_url() ?>siswa/siswa/save_data_siswa" method="post" enctype="multipart/form-data" role="form">
                <div class="modal-body" id="edit-tanggal">
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">NIS</label>
                        <div class="col-lg-10">
                            <input class="form-control" id="nis" name="nis">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Nama Siswa</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Kelas</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="kelas" id="kelas">
                                <option>-- Pilih Kelas / Tahun Ajaran --</option>
                                <?php foreach ($kelas->result_array() as $k) { ?>
                                    <option value="<?= $k['id_kelas'] ?>"><?= $k['nama_kelas'] . " - " . $k['tahun_ajaran'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Jenis Kelamin</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="jk" id="jk">
                                <option>-- Pilih Jenis Kelamin --</option>
                                <option value="Laki - Laki">Laki - Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-2 col-sm-2 control-label">Alamat</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="alamat" name="alamat">
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

<!-- Modal Edit Data Siswa -->
<?php foreach ($data_siswa->result_array() as $ds) :
    $id     = $ds['id'];
    $nis    = $ds['nis'];
    $nama   = $ds['siswa'];
    $kl     = $ds['id_kelas'];
    $jk     = $ds['jenis_kelamin'];
    $alamat = $ds['alamat'];
?>
    <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="editsiswa<?= $id ?>" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                    <h4 class="modal-title">Edit Data Siswa</h4>
                </div>
                <form class="form-horizontal" action="<?= base_url() ?>siswa/siswa/save_edit_siswa" method="post" enctype="multipart/form-data" role="form">
                    <div class="modal-body" id="edit-tanggal">
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">NIS</label>
                            <div class="col-lg-10">
                                <input type="hidden" id="id" name="id" value="<?= $id ?>">
                                <input class="form-control" id="nis" name="nis" value=<?= $nis ?>>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Nama Siswa</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="<?= $nama ?>">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Kelas</label>
                            <div class="col-lg-10">
                                <select class="form-control" name="kelas" id="kelas">
                                    <option>-- Pilih Kelas / Tahun Ajaran --</option>
                                    <?php foreach ($kelas->result_array() as $k) { ?>
                                        <option value="<?= $k['id_kelas'] ?>" <? if ($k['id_kelas'] == $kl) echo "selected" ?>><?= $k['nama_kelas'] . " - " . $k['tahun_ajaran'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Jenis Kelamin</label>
                            <div class="col-lg-10">
                                <select class="form-control" name="jk" id="jk">
                                    <option>-- Pilih Jenis Kelamin --</option>
                                    <?php if ($jk == 'Laki - Laki') : ?>
                                        <option value="Laki - Laki" selected>Laki - Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    <?php else : ?>
                                        <option value="Laki - Laki">Laki - Laki</option>
                                        <option value="Perempuan" selected>Perempuan</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-2 control-label">Alamat</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $alamat ?>">
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

        $('#tbl_data_siswa').DataTable();

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
                        url: '<?= base_url(); ?>siswa/siswa/delete_data_siswa',
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