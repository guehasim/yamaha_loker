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
  .jarak{
    margin-bottom: 7px;
  }
</style>
<head>
  <meta charset="utf-8">
  <title>Yamaha Manufacture</title>
</head>
<body>
  <h3><center>Identitas Pelamar</center></h3>
  <h4 class="jarak">Identitas</h4>
  <table border="1" cellspacing="0" cellpadding="5" width="100%">
    
    <tbody>
      <tr>
        <?php foreach ($akun as $data): ?>
        
        <th scope="row" style="background-color: #ededeb;">NIK</th>
        <td><?php echo $data->nik_ktp;?></td>

        <?php endforeach ?>
        <?php foreach ($identitas as $data): ?>
        <th scope="row" style="background-color: #ededeb;">Status Kawin</th>
        <td>
          <?php if ($data->status_kawin == 1): ?>
          <?php echo "Sudah Kawin"; ?>
        <?php else: ?>
          <?php echo "Belum Kawin"; ?>
        <?php endif ?>
        </td>
        <?php endforeach ?>
      </tr>

      <tr>
        <?php foreach ($akun as $data): ?>
        <th scope="row" style="background-color: #ededeb;">Nama</th>
        <td><?php echo $data->nama_ktp;?></td>
        <?php endforeach ?>
        <?php foreach ($identitas as $data): ?>
        <th scope="row" style="background-color: #ededeb;">No.HP</th>
        <td><?php echo $data->nohp;?></td>
        <?php endforeach ?>
      </tr>

      <?php foreach ($identitas as $data): ?>
      <tr>
        <th scope="row" style="background-color: #ededeb;">Jenis Kelamin</th>
        <td><?php if ($data->jenkel == 1): ?>
          <?php echo "Laki-Laki"; ?>
        <?php else: ?>
          <?php echo "Wanita"; ?>
        <?php endif ?>
        </td>
        <th scope="row" style="background-color: #ededeb;">Pekerjaan Ayah</th>
        <td><?php echo $data->kerja_ayah;?></td>
      </tr>

      <tr>
        <th scope="row" style="background-color: #ededeb;">Tanggal Lahir</th>
        <td><?php echo date('d F Y', strtotime($data->tgl_lahir_ktp));?></td>
        <th scope="row" style="background-color: #ededeb;">Pekerjaan Ibu</th>
        <td><?php echo $data->kerja_ibu;?>
      </tr>
      <tr>
        <th scope="row" style="background-color: #ededeb;">Usia</th>
        <td><?php echo $data->usia;?> tahun</td>
        <th colspan="2"></th>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>

  <h4 class="jarak">Alamat</h4>
  <table border="1" cellspacing="0" cellpadding="5" width="100%">
    <thead>
      <tr style="background-color: #ededeb;">
        <th>Berdasarkan</th>
        <th>Alamat</th>
        <th>RT/RW</th>
        <th>Kelurahan</th>
        <th>Kecamatan</th>
        <th>Kota</th>
        <th>Kode Pos</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($alamat as $data): ?>
        <tr>
          <th scope="row">KTP</th>
          <td><?php echo $data->alamat_ktp;?></td>
          <td><?php echo $data->rw_ktp;?>/<?php echo $data->rw_ktp;?></td>
          <td><?php echo $data->kelurahan_ktp;?></td>
          <td><?php echo $data->kecamatan_ktp;?></td>
          <td><?php echo $data->kota_ktp;?></td>
          <td><?php echo $data->kodepos_ktp;?></td>
        </tr>
        <tr>
          <th scope="row">Domisili</th>
          <td><?php echo $data->alamat_domisili;?></td>
          <td><?php echo $data->rw_domisili;?>/<?php echo $data->rw_domisili;?></td>
          <td><?php echo $data->kelurahan_domisili;?></td>
          <td><?php echo $data->kecamatan_domisili;?></td>
          <td><?php echo $data->kota_domisili;?></td>
          <td><?php echo $data->kodepos_domisili;?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>

  <h4 class="jarak">Ukuran</h4>
  <table border="1" cellspacing="0" cellpadding="5" width="100%">
    <thead>
      <tr style="background-color: #ededeb;">
        <th>Tinggi Badan</th>
        <th>Berat Badan</th>
        <th>Ukuran Baju</th>
        <th>Ukuran Sepatu</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($ukuran as $data): ?>
        <tr>
          <td><?php echo $data->tinggi_badan_cm;?> CM</td>
          <td><?php echo $data->berat_badan_kg;?> KG</td>
          <td><?php echo $data->ukuran_baju;?></td>
          <td><?php echo $data->ukuran_sepatu_cm;?> CM</td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>

  <h4 class="jarak">Pendidikan</h4>
  <table border="1" cellspacing="0" cellpadding="5" width="100%">
    <thead>
      <tr style="background-color: #ededeb;">
        <th>Pendidikan</th>
        <th>Asal Sekolah/Universitas</th>
        <th>Jurusan</th>
        <th>Kota Asal</th>
        <th>Tahun Masuk</th>
        <th>Tahun Lulus</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($pendidikan as $data): ?>
        
      
      <tr>
        <td>
          <?php if ($data->pendidikan == '1'): ?>
            <?php echo "SD/MI";?>
          <?php elseif ($data->pendidikan == '2'): ?>
            <?php echo "SMP/MTs";?>
          <?php elseif ($data->pendidikan == '3'): ?>
            <?php echo "SMA/SMK";?>
          <?php elseif ($data->pendidikan == '4'): ?>
            <?php echo "D3";?>
          <?php elseif ($data->pendidikan == '5'): ?>
            <?php echo "S1";?>
          <?php elseif ($data->pendidikan == '6'): ?>
            <?php echo "S2";?>
          <?php elseif ($data->pendidikan == '7'): ?>
            <?php echo "S3";?>
          <?php else: ?>
            <?php echo "Tidak Sekolah";?>
          <?php endif ?>
        </td>
        <td><?php echo $data->asal_pendidikan;?></td>
        <td><?php echo $data->jurusan;?></td>
        <td><?php echo $data->tempat_pendidikan;?></td>
        <td><?php echo $data->thn_masuk;?></td>
        <td><?php echo $data->thn_lulus;?></td>
      </tr>
      <?php endforeach ?>
    </tbody>
  </table>

  <h4 class="jarak">Pengalaman Kerja</h4>
  <table border="1" cellspacing="0" cellpadding="5" width="100%">
    <thead>
      <tr style="background-color: #ededeb;">
        <th>Nama Perusahaan</th>
        <th>Bagian</th>
        <th>Tahun</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($pengalaman as $data): ?>
        <tr>
          <td><?php echo $data->peng_perusahaan;?></td>
          <td><?php echo $data->peng_bidang;?></td>
          <td><?php echo $data->peng_tahun;?></td>
        </tr>
      <?php endforeach ?>
    </tbody>
  </table>

  <h4 class="jarak">Jawaban Dari Pelamar</h4>
  <table border="1" cellspacing="0" cellpadding="5" width="100%">
    <thead>
      <tr style="background-color: #ededeb;">
        <th>No.</th>
        <th>Pertanyaan</th>
        <th>Jawaban</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($pertanyaan as $data): ?>
        <tr>
          <td>1</td>
          <td>APAKAH ANDA BERKACAMATA?</td>
          <td>
            <?php if ($data->jwb_kacamata == null): ?>       
              Belum Terisi
            <?php elseif ($data->jwb_kacamata == 0): ?>                                
              TIDAK
            <?php elseif ($data->jwb_kacamata == 1): ?>
              YA
              Kanan : <?php echo $data->kaca_kanan;?>
              Kiri : <?php echo $data->kaca_kiri;?>  
            <?php else: ?>                                          
              Belum Terisi                                  
            <?php endif ?>
          </td>

        </tr>

        <tr>
          <td>2</td>
          <td>APAKAH ANDA MEROKOK?</td>
          <td>
            <?php if ($data->jwb_rokok == null): ?>
              Belum Terisi
            <?php elseif ($data->jwb_rokok == 0): ?>
              TIDAK
            <?php elseif($data->jwb_rokok == 1): ?>
              YA
            <?php else: ?>
              Belum Terisi  
            <?php endif ?> 
          </td>
        </tr>
        
        <tr>
          <td>3</td>
          <td>APAKAH ANDA MEMILIKI SIM?</td>
          <td>
            <?php if ($data->jwb_sim == null): ?>
            Belum Terisi
            <?php elseif ($data->jwb_sim == 1): ?>
            <?php echo "SIM A"; ?>                                       
            <?php elseif ($data->jwb_sim == 2): ?>
            <?php echo "SIM B"; ?>                                       
            <?php elseif ($data->jwb_sim == 3): ?>
            <?php echo "SIM C"; ?>
            <?php else: ?>
            <?php echo "Tidak Memiliki SIM"; ?> 
            <?php endif ?>                                       
          </td>
        </tr>
        
        <tr>
          <td>4</td>
          <td>APAKAH ANDA PERNAH MENGALAMI KECELAKAAN KERJA?</td>
          <td>
            <?php if ($data->jwb_celaka_kerja == null): ?>
              Belum Terisi
            <?php elseif ($data->jwb_celaka_kerja == 0): ?>
              TIDAK
            <?php elseif($data->jwb_celaka_kerja == 1): ?>
              YA
            <?php else: ?>
              Belum Terisi  
            <?php endif ?> 
          </td>
        </tr>
        
        <tr>
          <td>5</td>
          <td>APAKAH ANDA PERNAH MENGALAMI KECELAKAAN LALU LINTAS?</td>
          <td>
            <?php if ($data->jwb_celaka_lalin == null): ?>
              Belum Terisi
            <?php elseif ($data->jwb_celaka_lalin == 0): ?>
              TIDAK
            <?php elseif($data->jwb_celaka_lalin == 1): ?>
              YA
            <?php else: ?>
              Belum Terisi  
            <?php endif ?> 
          </td>
        </tr>
        
        <tr>
          <td>6</td>
          <td>APAKAH ANDA PERNAH MENGALAMI PATAH TULANG?</td>
          <td>
            <?php if ($data->jwb_patah_tulang == null): ?>
              Belum Terisi
            <?php elseif ($data->jwb_patah_tulang == 0): ?>
              TIDAK
            <?php elseif($data->jwb_patah_tulang == 1): ?>
              YA
            <?php else: ?>
              Belum Terisi  
            <?php endif ?>  
          </td>
        </tr>
        
        <tr>
          <td>7</td>
          <td>APAKAH ANDA PERNAH BEKERJA DI PT. YEMI SEBELUMNYA?</td>
          <td>
            <?php if ($data->jwb_pernah_kerja == null): ?>
              Belum Terisi
            <?php elseif ($data->jwb_pernah_kerja == 0): ?>
              TIDAK
            <?php elseif($data->jwb_pernah_kerja == 1): ?>
              YA
            <?php else: ?>
              Belum Terisi  
            <?php endif ?>  
          </td>
        </tr>
        
        <tr>
          <td>8</td>
          <td>APAKAH ANDA BERENCANA MENIKAH DALAM 2 TAHUN INI?</td>
          <td>
            <?php if ($data->jwb_nikah_tahun == null): ?>
              Belum Terisi
            <?php elseif ($data->jwb_nikah_tahun == 0): ?>
              TIDAK
            <?php elseif($data->jwb_nikah_tahun == 1): ?>
              YA
            <?php else: ?>
              Belum Terisi  
            <?php endif ?>  
          </td>
        </tr>
        
        <tr>
          <td>9</td>
          <td>APAKAH ANDA BERSEDIA BEKERJA SHIFT?</td>
          <td>
            <?php if ($data->jwb_shift== null): ?>
              Belum Terisi
            <?php elseif ($data->jwb_shift == 0): ?>
              TIDAK
            <?php elseif($data->jwb_shift == 1): ?>
              YA
            <?php else: ?>
              Belum Terisi  
            <?php endif ?>  
          </td>
        </tr>
        
        <tr>
          <td>10</td>
          <td>APAKAH ANDA BERSEDIA BEKERJA BERDIRI SELAMA 8 JAM?</td>
          <td>
            <?php if ($data->jwb_kerja == null): ?>
              Belum Terisi
            <?php elseif ($data->jwb_kerja == 0): ?>
              TIDAK
            <?php elseif($data->jwb_kerja == 1): ?>
              YA
            <?php else: ?>
              Belum Terisi  
            <?php endif ?>  
          </td>
        </tr>
        
        <tr>
          <td>11</td>
          <td>APAKAH ANDA BERSEDIA TIDAK MENIKAH SELAMA MASA KONTRAK?</td>
          <td>
            <?php if ($data->jwb_nikah_kontrak == null): ?>
              Belum Terisi
            <?php elseif ($data->jwb_nikah_kontrak == 0): ?>
              TIDAK
            <?php elseif($data->jwb_nikah_kontrak == 1): ?>
              YA
            <?php else: ?>
              Belum Terisi  
            <?php endif ?>  
          </td>
        </tr>
        
        <tr>
          <td>12</td>
          <td>APAKAH ANDA BERSEDIA TIDAK KULIAH SELAMA BEKERJA DI PT. YEMI?</td>
          <td>
            <?php if ($data->jwb_kuliah == null): ?>
              Belum Terisi
            <?php elseif ($data->jwb_kuliah == 0): ?>
              TIDAK
            <?php elseif($data->jwb_kuliah == 1): ?>
              YA
            <?php else: ?>
              Belum Terisi  
            <?php endif ?>  
          </td>
        </tr>
        
        <tr>
          <td>13</td>
          <td>APAKAH ANDA BERSEDIA DITEMPATKAN DI AREA MANA SAJA DI PT. YEMI?</td>
          <td>
            <?php if ($data->jwb_area == null): ?>
              Belum Terisi
            <?php elseif ($data->jwb_area == 0): ?>
              TIDAK
            <?php elseif($data->jwb_area == 1): ?>
              YA
            <?php else: ?>
              Belum Terisi  
            <?php endif ?>  
          </td>
        </tr>
        
        <tr>
          <td>14</td>
          <td>APAKAH ANDA BERSEDIA TIDAK MEROKOK SELAMA BEKERJA DI PT. YEMI?</td>
          <td>
            <?php if ($data->jwb_no_rokok == null): ?>
              Belum Terisi
            <?php elseif ($data->jwb_no_rokok == 0): ?>
              TIDAK
            <?php elseif($data->jwb_no_rokok == 1): ?>
              YA
            <?php else: ?>
              Belum Terisi  
            <?php endif ?>  
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table>

  </body>
</html>