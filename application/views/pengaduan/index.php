

<?php $this->load->view('pengaduan/head') ?>
<?php $this->load->view('pengaduan/header') ?>
<?php $this->load->view('pengaduan/leftbar') ?>
<?php $this->load->view('pengaduan/footer') ?>

<style>
    .col-md-12{
        margin-top: 10px;
    }
</style>
<body class="hold-transition skin-blue sidebar-mini">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" style="min-height: 960px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Log Pengaduan
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Beranda</a></li>
        <li><a href="#">Pengaduan</a></li>
        <li class="active">Log Pengaduan</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        <div class="box">
            <div class="box-header">                              
              <div class="box-tools">
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class = "row">
                <div class = "col-md-12">
                <table class="table table-hover" id = "tabelnya">
                <thead><tr>
                  <th>PPSP NO</th>
                  <th>Nama Bagian</th>
                  <th>Tanggal</th>
                  <th>Jenis Pengaduan</th>
                  <th>Keterangan</th>
                  <th>Hasil Pemeriksaan</th>
                  <?php if ($this->session->userdata('role') == 1){ ?>
                      <th>Aksi</th> 
                  <?php } ?>  
              </thead>
              <tbody>
              <?php foreach($rs_pengaduan->result_array() as $row ){?>
              <tr>
                <td><?php echo $row['id_pengaduan'] ?>
                </td>
                <td><?php echo $row['nama_bagian'] ?>
                </td>                
                <td><?php echo $row['tgl_pengaduan'] ?>
                </td>
                <td><?php echo $row['jenis_pengaduan'] ?>
                </td>                
                <td>
                  <?php echo $row['keterangan'] ?>
                </td>
                <td>
                  <?php echo $row['hasil_pemeriksaan'] ?>
                </td>
                <?php if ($this->session->userdata('role') == 1){ ?>
                <td>
                  <a class="btn btn-sm btn-primary" href="<?php echo base_url()?>form/form/edit/<?php echo $row['id_pengaduan'] ?>">Hasil Analisa</a>
                  <a class="btn btn-sm btn-danger" href="<?php echo base_url()?>form/form/delete/<?php echo $row['id_pengaduan'] ?>">Hapus</a>
                  <a class="btn btn-sm btn-success" target="blank" href="<?php echo base_url()?>form/form/cetak/<?php echo $row['id_pengaduan'] ?>">Cetak</a>
                </td>
                <?php } ?>
              </tr>             
              <?php }?>
              </tbody>
              </table>
                </div>
              </div>
            </div>
            <!-- /.box-body -->
              <div class = "box-footer">
                  <div calss = "row">
                    <div class = "col-md-12">
                    <?php if ($this->session->userdata('role') == 1){ ?>
                      <a href="<?php echo base_url()?>pengaduan/pengaduan/exportpdf" class = "btn btn-success btn-md pull-right">
                        Export Excel
                      </a>
                      <?php } ?>
                    </div>
                  </div>
              </div>
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
</div>
</section>
    <!-- /.content -->
  </div>
  


<!-- page script -->
<script>
  $(function () {
   $('#tabelnya').DataTable({
     "ordering": false
   });
    
  })
</script>


</body></html>