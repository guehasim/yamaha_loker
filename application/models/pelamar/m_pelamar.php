<?php 

class m_pelamar extends CI_Model
{
	private $table = 'lam_identitas';
	private $id = 'lam_identitas.ID_PelamarIdentitas';
	
	public function lihat_akun($id)
	{
		$query = $this->db->query("SELECT * FROM m_pelamar WHERE ID_pelamar = $id LIMIT 1");
		return $query;
	}

	public function lihat_identitas($id)
	{
		$query = $this->db->query("SELECT * FROM lam_identitas WHERE ID_Pelamar = $id LIMIT 1");
		return $query;
	}

	public function lihat_alamat($id)
	{
		$query = $this->db->query("SELECT * FROM lam_alamat WHERE ID_Pelamar = $id LIMIT 1");
		return $query;
	}

	public function lihat_ukuran($id)
	{
		$query = $this->db->query("SELECT * FROM lam_ukuran WHERE ID_Pelamar = $id LIMIT 1");
		return $query;
	}

	public function lihat_pendidikan($id)
	{
		$query = $this->db->query("SELECT * FROM lam_pendidikan WHERE ID_Pelamar = $id ORDER BY pendidikan DESC");
		return $query;
	}

	public function lihat_pengalamankerja($id)
	{
		$query = $this->db->query("SELECT * FROM lam_pengalamankerja WHERE ID_Pelamar = $id ORDER BY ID_PelamarPengalaman DESC");
		return $query;
	}

	public function lihat_pertanyaan($id)
	{
		$query = $this->db->query("SELECT i.ID_PelamarPertanyaan, i.ID_Pelamar, i.jwb_kacamata, i.jwb_rokok, i.jwb_sim, i.jwb_celaka_kerja, i.jwb_celaka_lalin, i.jwb_patah_tulang, i.jwb_pernah_kerja, i.jwb_nikah_tahun, i.jwb_shift, i.jwb_kerja, i.jwb_nikah_kontrak, i.jwb_kuliah, i.jwb_area, i.jwb_no_rokok,
										ii.kaca_kiri, ii.kaca_kanan
										FROM lam_pertanyaan i
										LEFT JOIN lam_kacamata ii ON i.ID_Pelamar = ii.ID_Pelamar
										WHERE i.ID_Pelamar=$id");
		return $query;
	}

	public function tambah_identitas($data){
		
		$this->db->insert($this->table, $data);
	}

	public function getpelamar($id)
	{
		$query = $this->db->query("SELECT * FROM lam_identitas WHERE ID_PelamarIdentitas = $id");
		return $query;
	}

	public function tambah_alamat()
	{
		$data = array(
			'ID_PelamarAlamat'	=> null,
			'ID_Pelamar'		=> $this->input->post('id'),
			'alamat_ktp'		=> $this->input->post('alamat_ktp'),
			'rt_ktp'			=> $this->input->post('rt_ktp'),
			'rw_ktp'			=> $this->input->post('rw_ktp'),
			'kelurahan_ktp'		=> $this->input->post('kelurahan_ktp'),
			'kecamatan_ktp'		=> $this->input->post('kecamatan_ktp'),
			'kota_ktp'			=> $this->input->post('kota_ktp'),
			'kodepos_ktp'		=> $this->input->post('kodepos_ktp'),
			'alamat_domisili'	=> $this->input->post('alamat_domisili'),
			'rt_domisili'		=> $this->input->post('rt_domisili'),
			'rw_domisili'		=> $this->input->post('rw_domisili'),
			'kelurahan_domisili'=> $this->input->post('kelurahan_domisili'),
			'kecamatan_domisili'=> $this->input->post('kecamatan_domisili'),
			'kota_domisili'		=> $this->input->post('kota_domisili'),
			'kodepos_domisili'	=> $this->input->post('kodepos_domisili')

			);
		$this->db->insert('lam_alamat',$data);
	}

	public function tambah_pendidikan()
	{
		$data = array(
			'ID_PelamarPendidikan'	=> null,
			'ID_Pelamar'			=> $this->input->post('id'),
			'pendidikan'			=> $this->input->post('pendidikan'),
			'jurusan'				=> $this->input->post('jurusan'),
			'thn_masuk'				=> $this->input->post('masuk'),
			'thn_lulus'				=> $this->input->post('tahun'),
			'asal_pendidikan'		=> $this->input->post('asal_pendidikan'),
			'tempat_pendidikan'		=> $this->input->post('tempat_pendidikan')

			);
		$this->db->insert('lam_pendidikan',$data);
	}

	public function tambah_pengalaman_kerja()
	{
		$data = array(
			'ID_PelamarPengalaman'	=> null,
			'ID_Pelamar'			=> $this->input->post('id'),
			'peng_perusahaan'		=> $this->input->post('perusahaan'),
			'peng_bidang'			=> $this->input->post('bidang'),
			'peng_tahun'			=> $this->input->post('tahun')

			);
		$this->db->insert('lam_pengalamankerja',$data);
	}

	public function tambah_ukuran()
	{
		$data = array(
			'ID_PelamarUkuran'	=> null,
			'ID_Pelamar'		=> $this->input->post('id'),
			'tinggi_badan_cm'	=> $this->input->post('tinggi_cm'),
			'berat_badan_kg'	=> $this->input->post('berat_kg'),
			'ukuran_baju'		=> $this->input->post('baju'),
			'ukuran_sepatu_cm'	=> $this->input->post('sepatu')

			);
		$this->db->insert('lam_ukuran',$data);
	}

	public function tambah_pertanyaan()
	{
		$kaca = $this->input->post('kacamata');
		if ($kaca == 1) {
			$data = array(
			'ID_PelamarPertanyaan'=> null,
			'ID_Pelamar' 		=> $this->input->post('id'),
			'jwb_kacamata'		=> $kaca,
			'jwb_rokok'			=> $this->input->post('rokok'),
			'jwb_sim'			=> $this->input->post('sim'),
			'jwb_celaka_kerja'	=> $this->input->post('celaka_kerja'),
			'jwb_celaka_lalin'	=> $this->input->post('celaka_lalin'),
			'jwb_patah_tulang'	=> $this->input->post('patah_tulang'),
			'jwb_pernah_kerja'	=> $this->input->post('pernah_kerja'),
			'jwb_nikah_tahun'	=> $this->input->post('nikah'),
			'jwb_shift'			=> $this->input->post('shift'),
			'jwb_kerja'			=> $this->input->post('kerja'),
			'jwb_nikah_kontrak'	=> $this->input->post('nikah_kontrak'),
			'jwb_kuliah'		=> $this->input->post('kuliah'),
			'jwb_area'			=> $this->input->post('area'),
			'jwb_no_rokok'		=> $this->input->post('no_rokok')

			);
			$this->db->insert('lam_pertanyaan',$data);

			$datas = array(
				'ID_PelamarKacamata'=> null,
				'ID_Pelamar'		=> $this->input->post('id'),
				'kaca_kiri'			=> $this->input->post('kiri'),
				'kaca_kanan'		=> $this->input->post('kanan')
				);
			$this->db->insert('lam_kacamata',$datas);
		}else{
			$data = array(
			'ID_PelamarPertanyaan'=> null,
			'ID_Pelamar' 		=> $this->input->post('id'),
			'jwb_kacamata'		=> $kaca,
			'jwb_rokok'			=> $this->input->post('rokok'),
			'jwb_sim'			=> $this->input->post('sim'),
			'jwb_celaka_kerja'	=> $this->input->post('celaka_kerja'),
			'jwb_celaka_lalin'	=> $this->input->post('celaka_lalin'),
			'jwb_patah_tulang'	=> $this->input->post('patah_tulang'),
			'jwb_pernah_kerja'	=> $this->input->post('pernah_kerja'),
			'jwb_nikah_tahun'	=> $this->input->post('nikah'),
			'jwb_shift'			=> $this->input->post('shift'),
			'jwb_kerja'			=> $this->input->post('kerja'),
			'jwb_nikah_kontrak'	=> $this->input->post('nikah_kontrak'),
			'jwb_kuliah'		=> $this->input->post('kuliah'),
			'jwb_area'			=> $this->input->post('area'),
			'jwb_no_rokok'		=> $this->input->post('no_rokok')

			);
			$this->db->insert('lam_pertanyaan',$data);

			$datas = array(
				'ID_PelamarKacamata'=> null,
				'ID_Pelamar'		=> $this->input->post('id'),
				'kaca_kiri'			=> null,
				'kaca_kanan'		=> null
				);
			$this->db->insert('lam_kacamata',$datas);
		}
		
	}

	public function gettemp_pelamar($ids)
	{
		$query = $this->db->query("SELECT * FROM lam_identitas WHERE ID_Pelamar = $ids ");
		return $query;	}

	public function getidentitas($id)
	{
		$query = $this->db->query("SELECT * FROM lam_identitas WHERE ID_PelamarIdentitas = $id ");
		return $query;
	}

	public function getalamat($id)
	{
		$query = $this->db->query("SELECT * FROM lam_alamat WHERE ID_PelamarAlamat = $id ");
		return $query;
	}

	public function getukuran($id)
	{
		$query = $this->db->query("SELECT * FROM lam_ukuran WHERE ID_PelamarUkuran = $id ");
		return $query;
	}

	public function getpendidikan($id)
	{
		$query = $this->db->query("SELECT * FROM lam_pendidikan WHERE ID_PelamarPendidikan = $id ");
		return $query;
	}

	public function hapus_pendidikan($id)
    {
        $this->db->where('ID_PelamarPendidikan',$id);
        $this->db->delete('lam_pendidikan');
    }

	public function getpengalaman($id)
	{
		$query = $this->db->query("SELECT * FROM lam_pengalamankerja WHERE ID_PelamarPengalaman = $id ");
		return $query;
	}

	public function getpertanyaan($id)
	{
		$query = $this->db->query("SELECT i.ID_PelamarPertanyaan, i.ID_Pelamar, i.jwb_kacamata, i.jwb_rokok, i.jwb_sim, i.jwb_celaka_kerja, i.jwb_celaka_lalin, i.jwb_patah_tulang, i.jwb_pernah_kerja, i.jwb_nikah_tahun, i.jwb_shift, i.jwb_kerja, i.jwb_nikah_kontrak, i.jwb_kuliah, i.jwb_area, i.jwb_no_rokok,
										ii.kaca_kiri, ii.kaca_kanan
										FROM lam_pertanyaan i
										INNER JOIN lam_kacamata ii ON i.ID_Pelamar = ii.ID_Pelamar
										WHERE i.ID_Pelamar=$id");
		return $query;
	}

	public function hapus_pengalaman($id)
    {
        $this->db->where('ID_PelamarPengalaman',$id);
        $this->db->delete('lam_pengalamankerja');
    }

    public function tambah_kacamata()
    {
    	$data = array(
			'ID_PelamarKacamata'=> null,
			'ID_Pelamar'		=> $this->input->post('id'),
			'kaca_kiri'			=> $this->input->post('kiri'),
			'kaca_kanan'		=> $this->input->post('kanan')

			);
		$this->db->insert('lam_kacamata',$data);
    }

    public function tampil_loker()
	{
		$query = $this->db->query("SELECT * FROM m_loker WHERE lok_status = 0");
		return $query;
	}

	public function tampil_loker_fix($id)
	{
		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, ii.ID_Loker
		 							FROM join_lamar i
		 							INNER JOIN m_loker ii ON i.ID_Loker = ii.ID_Loker
		 							WHERE ii.lok_status = 0 AND i.ID_Pelamar = $id");
		return $query;
	}

	public function update($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function tambah_lamaran()
	{
		$data = array(
			'ID_PelamarJoin'=> null,
			'ID_Pelamar'	=> $this->input->post('id_pelamar'),
			'ID_Loker'		=> $this->input->post('id_loker'),
			'TGL_Lamar'		=> date('Y-m-d'),
			'status_Join'	=> 1,
			'status_aktif'	=> 1

			);
		$this->db->insert('join_lamar',$data);
	}

	public function lihat_status_lamaran($id)
	{
		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, i.status_aktif, ii.lok_nama
									FROM join_lamar i
									INNER JOIN m_loker ii ON i.ID_Loker = ii.ID_Loker
									WHERE i.ID_Pelamar = $id");
		return $query;
	}

	//status karyawan

	public function cek_kelengkapan_karyawan($id)
	{
		$query = $this->db->query("SELECT i.ID_Pelamar, ii.ID_Kepesertaan, iii.ID_SIM, iv.ID_Keluarga, v.ID_Darurat
									FROM m_pelamar i
									LEFT JOIN karyawan_kepesertaan ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN karyawan_sim iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN karyawan_keluarga iv ON i.ID_Pelamar = iv.ID_Pelamar
									LEFT JOIN karyawan_darurat v ON i.ID_Pelamar = v.ID_Pelamar
									WHERE i.ID_Pelamar = $id 
									GROUP BY v.ID_Pelamar ");
		return $query;
	}

	public function lihat_kepesertaan($id)
	{
		$query = $this->db->query("SELECT * FROM karyawan_kepesertaan WHERE ID_Pelamar = $id ");
		return $query;
	}

	public function getkepesertaan($ids)
	{
		$query = $this->db->query("SELECT * FROM karyawan_kepesertaan WHERE ID_Kepesertaan = $ids ");
		return $query;
	}

	public function tambah_kepesertaan()
	{
		$data = array(
			'ID_Kepesertaan'=> null,
			'ID_Pelamar'	=> $this->input->post('id'),
			'NO_BPJS_Kes'	=> $this->input->post('bpjs_kesehatan'),
			'NO_BPJS_Kerja'	=> $this->input->post('bpjs_kerja'),
			'NO_NPWP'		=> $this->input->post('npwp')

			);
		$this->db->insert('karyawan_kepesertaan',$data);
	}

	public function lihat_sim($id)
	{
		$query = $this->db->query("SELECT * FROM karyawan_sim WHERE ID_Pelamar = $id ");
		return $query;
	}

	public function tambah_sim()
	{
		$data = array(
			'ID_SIM'		=> null,
			'ID_Pelamar'	=> $this->input->post('id'),
			'NO_SIM'		=> $this->input->post('no_sim')

			);
		$this->db->insert('karyawan_sim',$data);
	}

	public function getsim($ids)
	{
		$query = $this->db->query("SELECT * FROM karyawan_sim WHERE ID_SIM = $ids ");
		return $query;
	}

	public function lihat_area($id)
	{
		$query = $this->db->query("SELECT * FROM karyawan_area WHERE ID_Pelamar = $id ");
		return $query;
	}

	public function getarea($id)
	{
		$query = $this->db->query("SELECT * FROM karyawan_area WHERE ID_Area = $id ");
		return $query;
	}

	public function tambah_area()
	{
		$data = array(
			'ID_Area'		=> null,
			'ID_Pelamar'	=> $this->input->post('id_pelamar'),
			'area'			=> $this->input->post('area')

			);
		$this->db->insert('karyawan_area',$data);
	}

	public function lihat_keluarga($id)
	{
		$query = $this->db->query("SELECT * FROM karyawan_keluarga WHERE ID_Pelamar = $id ");
		return $query;
	}

	public function getkeluarga($ids)
	{
		$query = $this->db->query("SELECT * FROM karyawan_keluarga WHERE ID_Keluarga = $ids ");
		return $query;
	}

	public function tambah_keluarga()
	{
		$data = array(
			'ID_Keluarga'			=> null,
			'ID_Pelamar'			=> $this->input->post('id'),
			'nama_ortu_ayah'		=> $this->input->post('nama_ortu_ayah'),
			'alamat_ortu_ayah'		=> $this->input->post('alamat_ortu_ayah'),
			'telp_ortu_ayah'		=> $this->input->post('telp_ortu_ayah'),
			'nama_ortu_ibu'			=> $this->input->post('nama_ortu_ibu'),
			'alamat_ortu_ibu'		=> $this->input->post('alamat_ortu_ibu'),
			'telp_ortu_ibu'			=> $this->input->post('telp_ortu_ibu'),
			'nama_mertua_ayah'		=> $this->input->post('nama_mertua_ayah'),
			'alamat_mertua_ayah'	=> $this->input->post('alamat_mertua_ayah'),
			'telp_mertua_ayah'		=> $this->input->post('telp_mertua_ayah'),
			'nama_mertua_ibu'		=> $this->input->post('nama_mertua_ibu'),
			'alamat_mertua_ibu'		=> $this->input->post('alamat_mertua_ibu'),
			'telp_mertua_ibu'		=> $this->input->post('telp_mertua_ibu'),
			'nama_saudara_1'		=> $this->input->post('nama_saudara_1'),
			'alamat_saudara_1'		=> $this->input->post('alamat_saudara_1'),
			'telp_saudara_1'		=> $this->input->post('telp_saudara_1'),
			'nama_saudara_2'		=> $this->input->post('nama_saudara_2'),
			'alamat_saudara_2'		=> $this->input->post('alamat_saudara_2'),
			'telp_saudara_2'		=> $this->input->post('telp_saudara_2'),
			'nama_saudara_3'		=> $this->input->post('nama_saudara_3'),
			'alamat_saudara_3'		=> $this->input->post('alamat_saudara_3'),
			'telp_saudara_3'		=> $this->input->post('telp_saudara_3'),
			'nama_saudara_4'		=> $this->input->post('nama_saudara_4'),
			'alamat_saudara_4'		=> $this->input->post('alamat_saudara_4'),
			'telp_saudara_4'		=> $this->input->post('telp_saudara_4'),
			'nama_saudara_5'		=> $this->input->post('nama_saudara_5'),
			'alamat_saudara_5'		=> $this->input->post('alamat_saudara_5'),
			'telp_saudara_5'		=> $this->input->post('telp_saudara_5'),
			'nama_istri'			=> $this->input->post('nama_istri'),
			'alamat_istri'			=> $this->input->post('alamat_istri'),
			'telp_istri'			=> $this->input->post('telp_istri'),
			'nama_anak_1'			=> $this->input->post('nama_anak_1'),
			'alamat_anak_1'			=> $this->input->post('alamat_anak_1'),
			'telp_anak_1'			=> $this->input->post('telp_anak_1'),
			'nama_anak_2'			=> $this->input->post('nama_anak_2'),
			'alamat_anak_2'			=> $this->input->post('alamat_anak_2'),
			'telp_anak_2'			=> $this->input->post('telp_anak_2'),
			'nama_anak_3'			=> $this->input->post('nama_anak_3'),
			'alamat_anak_3'			=> $this->input->post('alamat_anak_3'),
			'telp_anak_3'			=> $this->input->post('telp_anak_3'),
			'nama_anak_4'			=> $this->input->post('nama_anak_4'),
			'alamat_anak_4'			=> $this->input->post('alamat_anak_4'),
			'telp_anak_4'			=> $this->input->post('telp_anak_4'),

			);
		$this->db->insert('karyawan_keluarga',$data);
	}

	public function lihat_darurat($id)
	{
		$query = $this->db->query("SELECT * FROM karyawan_darurat WHERE ID_Pelamar = $id ");
		return $query;
	}

	public function getdarurat($ids)
	{
		$query = $this->db->query("SELECT * FROM karyawan_darurat WHERE ID_Darurat = $ids ");
		return $query;
	}

	public function tambah_darurat()
	{
		$data = array(
			'ID_Darurat'		=> null,
			'ID_Pelamar'		=> $this->input->post('id'),
			'nama_Darurat'		=> $this->input->post('nama'),
			'telp_Darurat'		=> $this->input->post('telp'),
			'hubungan_Darurat'	=> $this->input->post('hubungan')

			);
		$this->db->insert('karyawan_darurat',$data);
	}

	public function hapus_darurat($id)
    {
        $this->db->where('ID_Darurat',$id);
        $this->db->delete('karyawan_darurat');
    }

	public function tambah_status_pindah()
	{
		$data = array(
			'ID_Pindah'			=> null,
			'ID_Pelamar'		=> $this->input->post('id_pelamar'),
			'status_Pindah'		=> $this->input->post('status')

			);
		$this->db->insert('status_pindah',$data);
	}

	public function tambah_lengkap_karyawan()
	{
		$id 			= $this->input->post('id');

		$tempat_lahir	= $this->input->post('tempat_lahir');
		$agama 			= $this->input->post('agama');


		$bpjs_kesehatan = $this->input->post('bpjs_kesehatan');
		$bpjs_kerja 	= $this->input->post('bpjs_kerja');
		$npwp 			= $this->input->post('npwp');
		$no_sim 		= $this->input->post('no_sim');

		$nama_ortu_ayah 	= $this->input->post('nama_ortu_ayah');
		$alamat_ortu_ayah 	= $this->input->post('alamat_ortu_ayah');
		$telp_ortu_ayah		= $this->input->post('telp_ortu_ayah');

		$nama_ortu_ibu 		= $this->input->post('nama_ortu_ibu');
		$alamat_ortu_ibu 	= $this->input->post('alamat_ortu_ibu');
		$telp_ortu_ibu		= $this->input->post('telp_ortu_ibu');

		$nama_mertua_ayah 		= $this->input->post('nama_mertua_ayah');
		$alamat_mertua_ayah 	= $this->input->post('alamat_mertua_ayah');
		$telp_mertua_ayah		= $this->input->post('telp_mertua_ayah');

		$nama_mertua_ibu 		= $this->input->post('nama_mertua_ibu');
		$alamat_mertua_ibu 		= $this->input->post('alamat_mertua_ibu');
		$telp_mertua_ibu		= $this->input->post('telp_mertua_ibu');

		$nama_saudara_1 		= $this->input->post('nama_saudara_1');
		$alamat_saudara_1 		= $this->input->post('alamat_saudara_1');
		$telp_saudara_1			= $this->input->post('telp_saudara_1');

		$nama_saudara_2 		= $this->input->post('nama_saudara_2');
		$alamat_saudara_2 		= $this->input->post('alamat_saudara_2');
		$telp_saudara_2			= $this->input->post('telp_saudara_2');

		$nama_saudara_3 		= $this->input->post('nama_saudara_3');
		$alamat_saudara_3 		= $this->input->post('alamat_saudara_3');
		$telp_saudara_3			= $this->input->post('telp_saudara_3');

		$nama_saudara_4 		= $this->input->post('nama_saudara_4');
		$alamat_saudara_4 		= $this->input->post('alamat_saudara_4');
		$telp_saudara_4			= $this->input->post('telp_saudara_4');

		$nama_saudara_5 		= $this->input->post('nama_saudara_5');
		$alamat_saudara_5 		= $this->input->post('alamat_saudara_5');
		$telp_saudara_5			= $this->input->post('telp_saudara_5');

		$nama_istri 		= $this->input->post('nama_istri');
		$alamat_istri		= $this->input->post('alamat_istri');
		$telp_istri			= $this->input->post('telp_istri');

		$nama_anak_1 		= $this->input->post('nama_anak_1');
		$alamat_anak_1 		= $this->input->post('alamat_anak_1');
		$telp_anak_1		= $this->input->post('telp_anak_1');

		$nama_anak_2 		= $this->input->post('nama_anak_2');
		$alamat_anak_2 		= $this->input->post('alamat_anak_2');
		$telp_anak_2		= $this->input->post('telp_anak_2');

		$nama_anak_3 		= $this->input->post('nama_anak_3');
		$alamat_anak_3 		= $this->input->post('alamat_anak_3');
		$telp_anak_3		= $this->input->post('telp_anak_3');

		$nama_anak_4 		= $this->input->post('nama_anak_4');
		$alamat_anak_4 		= $this->input->post('alamat_anak_4');
		$telp_anak_4		= $this->input->post('telp_anak_4');

		$data = array(
			'ID_Kepesertaan'	=> null,
			'ID_Pelamar'		=> $id,
			'NO_BPJS_Kes'		=> $bpjs_kesehatan,
			'NO_BPJS_Kerja'		=> $bpjs_kerja,
			'NO_NPWP'			=> $npwp
			);
		$this->db->insert('karyawan_kepesertaan',$data);

		$data2 = array(
			'ID_SIM'			=> null,
			'ID_Pelamar'		=> $id,
			'NO_SIM'			=> $no_sim
			);
		$this->db->insert('karyawan_sim',$data2);

		$data3 = array(
			'ID_Keluarga'			=> null,
			'ID_Pelamar'			=> $id,
			'nama_ortu_ayah'		=> $nama_ortu_ayah,
			'alamat_ortu_ayah'		=> $alamat_ortu_ayah,
			'telp_ortu_ayah'		=> $telp_ortu_ayah,			
			'nama_ortu_ibu'			=> $nama_ortu_ibu,
			'alamat_ortu_ibu'		=> $alamat_ortu_ibu,
			'telp_ortu_ibu'			=> $telp_ortu_ibu,
			'nama_mertua_ayah'		=> $nama_mertua_ayah,
			'alamat_mertua_ayah'	=> $alamat_mertua_ayah,
			'telp_mertua_ayah'		=> $telp_mertua_ayah,			
			'nama_mertua_ibu'		=> $nama_mertua_ibu,
			'alamat_mertua_ibu'		=> $alamat_mertua_ibu,
			'telp_mertua_ibu'		=> $telp_mertua_ibu,
			'nama_saudara_1'		=> $nama_saudara_1,
			'alamat_saudara_1'		=> $alamat_saudara_1,
			'telp_saudara_1'		=> $telp_saudara_1,
			'nama_saudara_2'		=> $nama_saudara_2,
			'alamat_saudara_2'		=> $alamat_saudara_2,
			'telp_saudara_2'		=> $telp_saudara_2,
			'nama_saudara_3'		=> $nama_saudara_3,
			'alamat_saudara_3'		=> $alamat_saudara_3,
			'telp_saudara_3'		=> $telp_saudara_3,
			'nama_saudara_4'		=> $nama_saudara_4,
			'alamat_saudara_4'		=> $alamat_saudara_4,
			'telp_saudara_4'		=> $telp_saudara_4,
			'nama_saudara_5'		=> $nama_saudara_5,
			'alamat_saudara_5'		=> $alamat_saudara_5,
			'telp_saudara_5'		=> $telp_saudara_5,			
			'nama_istri'			=> $nama_istri,
			'alamat_istri'			=> $alamat_istri,
			'telp_istri'			=> $telp_istri,
			'nama_anak_1'			=> $nama_anak_1,
			'alamat_anak_1'			=> $alamat_anak_1,
			'telp_anak_1'			=> $telp_anak_1,
			'nama_anak_2'			=> $nama_anak_2,
			'alamat_anak_2'			=> $alamat_anak_2,
			'telp_anak_2'			=> $telp_anak_2,
			'nama_anak_3'			=> $nama_anak_3,
			'alamat_anak_3'			=> $alamat_anak_3,
			'telp_anak_3'			=> $telp_anak_3,
			'nama_anak_4'			=> $nama_anak_4,
			'alamat_anak_4'			=> $alamat_anak_4,
			'telp_anak_4'			=> $telp_anak_4,
			);
		
		$this->db->insert('karyawan_keluarga',$data3);

		$data4 = array(
			'tempat_lahir'		=> $tempat_lahir,
			'agama'				=> $agama
			);
		$where4 = array(
			'ID_Pelamar'		=> $id
			);
		$this->db->where($where4);
		$this->db->update('lam_identitas',$data4);
	}
}
 ?>