<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<style type="text/css">
  table{
    font-family: 'arial';
    font-size: 11px;
  }
  h3{
    font-family: 'arial';
    font-size: 16px;
  }
</style>
<head>
  <meta charset="utf-8">
  <title>Yamaha Manufacture</title>
</head>
<body>
  <h3><center>DAFTAR NAMA PELAMAR</center></h3>
  <table border="1" cellspacing="0" cellpadding="5" width="100%">
    <thead>
      <tr>
        <th>No.</th>
        <th>Bidang</th>
        <th>NIK</th>
        <th>Nama</th>
        <th>Email</th>
        <th>No Telp/HP</th>
        <th>Tanggal Melamar</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no=0;
      foreach ($pelamar->result() as $data) {
        $no++;
        echo "<tr>";
          echo "<td><center>".$no."</center></td>";
          echo "<td>".$data->lok_nama."</td>";
          echo "<td>".$data->nik_ktp."</td>";
          echo "<td>".$data->nama_ktp."</td>";
          echo "<td>".$data->email."</td>";
          echo "<td>".$data->nohp."</td>";
          echo "<td>".date('d F Y', strtotime($data->TGL_Lamar))."</td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
</body>
</html>