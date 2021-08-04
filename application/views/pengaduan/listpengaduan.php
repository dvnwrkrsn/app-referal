<!DOCTYPE html>
<html>
<head>
  <title>Report Table</title>
  <style type="text/css">
    #outtable{
      padding: 20px;
      border:1px solid #e3e3e3;
      width:600px;
      border-radius: 5px;
    }
 
    .short{
      width: 50px;
    }
 
    .normal{
      width: 150px;
    }
 
    table{
      border-collapse: collapse;
      font-family: arial;
      color:#5E5B5C;
    }
 
    thead th{
      text-align: left;
      padding: 10px;
    }
 
    tbody td{
      border-top: 1px solid #e3e3e3;
      padding: 10px;
    }
 
    tbody tr:nth-child(even){
      background: #F6F5FA;
    }
 
    tbody tr:hover{
      background: #EAE9F5
    }
  </style>
</head>
<body>
	<div id="outtable">
    <table class="table table-hover" id = "tabelnya">
                <thead><tr>
                  <th>ID</th>
                  <th>Nama Bagian</th>
                  <th>Tanggal</th>
                  <th>Jenis Pengaduan</th>
                  <th>Keterangan</th>
                  <th>Hasil Pemeriksaan</th>  
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
              </tr>             
              <?php }?>
              </tbody>
              </table>
	 </div>
</body>
</html>