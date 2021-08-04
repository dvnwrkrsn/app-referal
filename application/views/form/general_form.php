<!DOCTYPE html>
<html>
<?php $this->load->view('form/head') ?>
<?php $this->load->view('form/header') ?>
<?php $this->load->view('form/leftbar') ?>
<?php $this->load->view('form/footer') ?>
<style>
  .col-md-12 {
    margin-top: 10px;
  }
</style>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">


    <!-- Left side column. contains the logo and sidebar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Form Pengaduan
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Forms</a></li>
          <li class="active">Pengaduan</li>
        </ol>
      </section>

      <!-- Main content -->
      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <form class="form-horizontal" method="post" action="<?php echo base_url(); ?>form/form/save_pengaduan">
            <div class="box-body">
              <div class="form-group">
                <div class="row">
                  <div class="col-md-12">
                    <div class="col-md-2">
                      <label for="bagian">Bagian</label>
                    </div>
                    <div class="col-md-10">
                      <select class="form-control" name="bagian" required>
                        <?php foreach ($nmbagian->result_array() as $nmbagianrow) { ?>
                          <option value="<?php echo $nmbagianrow['id_bagian'] ?> "><?php echo $nmbagianrow['nama_bagian'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="col-md-2">
                      <label for="masalah">Jenis Pengaduan</label>
                    </div>
                    <div class="col-md-10">
                      <select class="form-control" name="jnspengaduan" required>
                        <?php foreach ($jnspengaduan->result_array() as $jnspengaduanrow) { ?>
                          <option value="<?php echo $jnspengaduanrow['id_jns_pengaduan'] ?> "><?php echo $jnspengaduanrow['jenis_pengaduan'] ?></option>
                        <?php } ?>
                      </select>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="col-md-2">
                      <label for="ket" required>Keterangan</label>
                    </div>
                    <div class="col-md-10">
                      <textarea class="form-control" rows="3" name="keterangan" placeholder="-- Keterangan --"></textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-info pull-right">Submit</button>
            </div>
</body>

</html>


<!-- <div class="content-wrapper">
    <section class="content-header">
        <h1>
            Form Pengaduan
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Pengaduan</li>
        </ol>
    </section>

    <div class="col-md-12">
        <div class="box box-info">
            <div class="box-header with-border">
            </div>
            <form class="form-horizontal" method="post" action="">
                <div class="box-body">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-2">
                                    <label for="bagian">Bagian</label>
                                </div>
                                <div class="col-md-10">
                                    <select class="form-control" name="bagian" required>
                                        <option value=" "></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-2">
                                    <label for="masalah">Jenis Pengaduan</label>
                                </div>
                                <div class="col-md-10">
                                    <select class="form-control" name="jnspengaduan" required>
                                        <option value=" "></option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="col-md-2">
                                    <label for="ket" required>Keterangan</label>
                                </div>
                                <div class="col-md-10">
                                    <textarea class="form-control" rows="3" name="keterangan" placeholder="-- Keterangan --"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Submit</button>
                </div> -->