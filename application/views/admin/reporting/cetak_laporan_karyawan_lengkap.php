<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<style type="text/css">
  table{
    font-family: 'arial';
    font-size: 12px;
  }
  h4{
    font-family: 'arial';
    font-size: 14px;
  }
  h3{
    font-family: 'arial';
    font-size: 16px;
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
  <h3><center>Identitas Karyawan</center></h3>
  <h4 class="jarak">Identitas</h4>
  <table border="1" cellspacing="0" cellpadding="5" width="100%">
    <?php foreach ($akun as $data): ?>
    <tbody>
      <tr>
        <th scope="row" style="background-color: #ededeb; font-family: arial;">NIK</th>
        <td><?php echo $data->nik_ktp;?></td>
        <th scope="row" style="background-color: #ededeb;">Nama</th>
        <td><?php echo $data->nama_ktp;?></td>
      </tr>
    </tbody>
    <?php endforeach ?>
  </table>

  <h4 class="jarak">Data Kepesertaan</h4>
  <table border="1" cellspacing="0" cellpadding="5" width="100%">
    <tbody>
      <tr>
        <?php foreach ($kepesertaan as $data): ?>

        <th scope="row" style="background-color: #ededeb;">No.BPJS Kesehatan</th>
        <td><?php echo $data->NO_BPJS_Kes;?></td>

        <?php endforeach ?>
        <?php foreach ($pertanyaan as $data): ?>

        <th scope="row" style="background-color: #ededeb;">Jenis SIM</th>
        <td>
          <?php if ($data->jwb_sim == 1): ?>
            <?php echo "SIM A";?>
          <?php elseif ($data->jwb_sim == 2): ?>
            <?php echo "SIM B";?>
          <?php elseif ($data->jwb_sim == 3): ?>
            <?php echo "SIM C";?>                                        
          <?php else: ?>
            <?php echo "Tidak Memiliki SIM"; ?>
          <?php endif ?>
        </td>
        <?php endforeach ?>
      </tr>
      <tr>
        <?php foreach ($kepesertaan as $data): ?>
        <th scope="row" style="background-color: #ededeb;">No.BPJS Ketenagakerjaan</th>
        <td><?php echo $data->NO_BPJS_Kerja;?></td>
        <?php endforeach ?>
        
        <th scope="row" style="background-color: #ededeb;">NO.SIM</th>
        <td>
          <?php foreach ($pertanyaan as $data): ?>
            <?php if ($data->jwb_sim == 0): ?>
              <?php echo "-" ?>
            <?php else: ?>
              <?php foreach ($sim as $data2): ?>
              <?php if ($data2->NO_SIM == NULL): ?>
                <?php echo "-"; ?>
              <?php else: ?>
                <?php echo $data2->NO_SIM;?>                                       
              <?php endif ?>
            <?php endforeach ?>
            <?php endif ?>
          <?php endforeach ?>
        </td>   
      </tr>
      <tr>
        <?php foreach ($kepesertaan as $data): ?>
        <th scope="row" style="background-color: #ededeb;">No.NPWN</th>
        <td><?php echo $data->NO_NPWP;?></td>
        <th colspan="2"></th>
        <?php endforeach ?>
      </tr>
    </tbody>
  </table>

  <h4 class="jarak">Data Lahir</h4>
  <table border="1" cellspacing="0" cellpadding="5" width="100%">
    <?php foreach ($identitas as $data): ?>
    <tbody>
      <tr>
        <th scope="row" style="background-color: #ededeb;">Tempat,Tanggal Lahir</th>
        <td><?php echo $data->tempat_lahir;?>, <?php echo date('d M y', strtotime($data->tgl_lahir_ktp));?></td>
        <th scope="row" style="background-color: #ededeb;">Agama</th>
        <td>
          <?php if ($data->agama == 1): ?>
            <?php echo "Islam";?>
          <?php elseif ($data->agama == 2): ?>
            <?php echo "Kristen";?>
          <?php elseif ($data->agama == 3): ?>
            <?php echo "Hindu";?> 
          <?php elseif ($data->agama == 4): ?>
            <?php echo "Budha";?>
          <?php elseif ($data->agama == 5): ?>
            <?php echo "Kong Hu Chu";?>                                           
          <?php else: ?>
            <?php echo "Tidak Memilih Agama"; ?>
          <?php endif ?>
        </td>
      </tr>
    </tbody>
    <?php endforeach ?>
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
        <th>Area</th>
      </tr>
    </thead>
    <tbody>      
      <tr>
        <?php foreach ($alamat as $data): ?>
        <th scope="row" style="background-color: #ededeb;">KTP</th>
        <td><?php echo $data->alamat_ktp;?></td>
        <td><?php echo $data->rw_ktp;?>/<?php echo $data->rw_ktp;?></td>
        <td><?php echo $data->kelurahan_ktp;?></td>
        <td><?php echo $data->kecamatan_ktp;?></td>
        <td><?php echo $data->kota_ktp;?></td>
        <td><?php echo $data->kodepos_ktp;?></td>
        <td></td>
         <?php endforeach ?>
      </tr>
      <tr>
        <?php foreach ($alamat as $data): ?>
        <th scope="row" style="background-color: #ededeb;">Domisili</th>
        <td><?php echo $data->alamat_domisili;?></td>
        <td><?php echo $data->rw_domisili;?>/<?php echo $data->rw_domisili;?></td>
        <td><?php echo $data->kelurahan_domisili;?></td>
        <td><?php echo $data->kecamatan_domisili;?></td>
        <td><?php echo $data->kota_domisili;?></td>
        <td><?php echo $data->kodepos_domisili;?></td>
        <?php endforeach ?>
        <?php foreach ($area as $data): ?>
        <td>
          <?php if ($data->area == 1): ?>
              <?php echo "Area 1";?>
            <?php elseif ($data->area == 2): ?>
              <?php echo "Area 2";?>
            <?php elseif ($data->area == 3): ?>
              <?php echo "Area 3";?>
            <?php else: ?>
              <?php echo "Tidak Memilih Area";?>
            <?php endif ?>
        </td>
        <?php endforeach ?>
      </tr>     
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

  <h4 class="jarak">Data Keluarga</h4>
  <table border="1" cellspacing="0" cellpadding="5" width="100%">
    <?php foreach ($keluarga as $data): ?>
    <thead>
        <tr style="background-color: #ededeb;">
          <th colspan="2"></th>
          <th>Nama</th>
          <th>Alamat</th>
          <th>Telp/HP</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th rowspan="2" scope="row" style="background-color: #ededeb;">Orang Tua</th>
          <td>Ayah</td>
          <td><?php echo $data->nama_ortu_ayah;?></td>
          <td><?php echo $data->alamat_ortu_ayah;?></td>
          <td><?php echo $data->telp_ortu_ayah;?></td>
        </tr>
        <tr>
          <td>Ibu</td>
          <td><?php echo $data->nama_ortu_ibu;?></td>
          <td><?php echo $data->alamat_ortu_ibu;?></td>
          <td><?php echo $data->telp_ortu_ibu;?></td>
        </tr>
        <tr>
          <th rowspan="2" scope="row" style="background-color: #ededeb;">Mertua</th>
          <td>Ayah</td>
          <td><?php echo $data->nama_mertua_ayah;?></td>
          <td><?php echo $data->alamat_mertua_ayah;?></td>
          <td><?php echo $data->telp_mertua_ayah;?></td>
        </tr>
        <tr>
          <td>Ibu</td>
          <td><?php echo $data->nama_mertua_ibu;?></td>
          <td><?php echo $data->alamat_mertua_ibu;?></td>
          <td><?php echo $data->telp_mertua_ibu;?></td>
        </tr>


        <tr>
          <th rowspan="5" scope="row" style="background-color: #ededeb;">Saudara</th>
          <td>1</td>
          <td><?php echo $data->nama_saudara_1;?></td>
          <td><?php echo $data->alamat_saudara_1;?></td>
          <td><?php echo $data->telp_saudara_1;?></td>
        </tr>
        <tr>
          <td>2</td>
          <td><?php echo $data->nama_saudara_2;?></td>
          <td><?php echo $data->alamat_saudara_2;?></td>
          <td><?php echo $data->telp_saudara_2;?></td>
        </tr>
        <tr>
          <td>3</td>
          <td><?php echo $data->nama_saudara_3;?></td>
          <td><?php echo $data->alamat_saudara_3;?></td>
          <td><?php echo $data->telp_saudara_2;?></td>
        </tr>
        <tr>
          <td>4</td>
          <td><?php echo $data->nama_saudara_4;?></td>
          <td><?php echo $data->alamat_saudara_4;?></td>
          <td><?php echo $data->telp_saudara_4;?></td>
        </tr>
        <tr>
          <td>5</td>
          <td><?php echo $data->nama_saudara_5;?></td>
          <td><?php echo $data->alamat_saudara_5;?></td>
          <td><?php echo $data->telp_saudara_5;?></td>
        </tr>

        <tr>
          <th colspan="2" scope="row" style="background-color: #ededeb;">Suami/Istri</th>
          <td><?php echo $data->nama_istri;?></td>
          <td><?php echo $data->alamat_istri;?></td>
          <td><?php echo $data->telp_istri;?></td>
        </tr>


        <tr>
          <th rowspan="4" scope="row" style="background-color: #ededeb;">Anak</th>
          <td>1</td>
          <td><?php echo $data->nama_anak_1;?></td>
          <td><?php echo $data->alamat_anak_1;?></td>
          <td><?php echo $data->telp_anak_1;?></td>
        </tr>
        <tr>
          <td>2</td>
          <td><?php echo $data->nama_anak_2;?></td>
          <td><?php echo $data->alamat_anak_2;?></td>
          <td><?php echo $data->telp_anak_2;?></td>
        </tr>
        <tr>
          <td>3</td>
          <td><?php echo $data->nama_anak_3;?></td>
          <td><?php echo $data->alamat_anak_3;?></td>
          <td><?php echo $data->telp_anak_3;?></td>
        </tr>
        <tr>
          <td>4</td>
          <td><?php echo $data->nama_anak_4;?></td>
          <td><?php echo $data->alamat_anak_4;?></td>
          <td><?php echo $data->telp_anak_4;?></td>
        </tr>

        <?php endforeach ?>
        <?php foreach ($kawin as $data): ?>
          
        
        <tr>
          <th colspan="2" style="background-color: #ededeb;">Status Perkawinan</th>
          <td colspan="3">
            <?php if ($data->status_kawin == 1): ?>
              <?php echo "TK";?>
            <?php elseif($data->status_kawin == 2): ?>
              <?php echo "K/1";?>
            <?php elseif($data->status_kawin == 3): ?>
              <?php echo "K/2";?>
            <?php elseif($data->status_kawin == 4): ?>
              <?php echo "K/3";?>
            <?php elseif($data->status_kawin == 5): ?>
              <?php echo "TK/1";?>
            <?php elseif($data->status_kawin == 6): ?>
              <?php echo "TK/2";?>
            <?php elseif($data->status_kawin == 7): ?>
              <?php echo "TK/3";?>
            <?php else: ?>
              <?php echo "Belum Pilih" ?>
            <?php endif ?>
          </td>
        </tr>
        <?php endforeach ?>
      </tbody>
    </table> 


  <h4 class="jarak">Data Kontak Darurat</h4>
  <table border="1" cellspacing="0" cellpadding="5" width="100%">
    <thead>
          <tr style="background-color: #ededeb;">
            <th>Nama</th>
            <th>No.Telp/HP</th>
            <th>Hubungan</th>
          </tr>
        </thead>
        <tbody>

          <?php foreach ($darurat as $data): ?>
          <tr>                                         
            <td><?php echo $data->nama_Darurat;?></td>
            <td><?php echo $data->telp_Darurat;?></td>
            <td><?php echo $data->hubungan_Darurat;?></td>
          </tr>
          <?php endforeach ?>
        </tbody>
  </table> 

  </body>
</html>