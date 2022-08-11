<?php 

class m_pelamar extends CI_Model
{
	
	public function tampil_data_m_pelamar()
	{
		$query = $this->db->query("SELECT ii.ID_Pelamar, iii.ID_Pelamar, iv.Id_Pelamar, v.ID_Pelamar, vi.ID_Pelamar, vii.ID_Pelamar, viii.ID_Pelamar, i.ID_Pelamar, i.nik_ktp, i.nama_ktp, i.user, i.email
									FROM m_pelamar i
									LEFT JOIN lam_identitas ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_alamat iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN lam_pendidikan iv ON i.ID_Pelamar = iv.ID_Pelamar
									LEFT JOIN lam_ukuran v ON i.ID_Pelamar = v.ID_Pelamar
									LEFT JOIN lam_pengalamankerja vi ON i.ID_Pelamar = vi.ID_Pelamar
									LEFT JOIN lam_pertanyaan vii ON i.ID_Pelamar = vii.ID_Pelamar
									LEFT JOIN lam_kacamata viii ON i.ID_Pelamar = viii.ID_Pelamar
                                    WHERE ii.ID_Pelamar IS NULL OR iii.ID_Pelamar IS NULL OR iv.Id_Pelamar IS NULL OR v.ID_Pelamar IS NULL OR vi.ID_Pelamar IS NULL OR vii.ID_Pelamar IS NULL OR viii.ID_Pelamar IS NULL
									ORDER BY i.nik_ktp ASC"); 
  		return $query; 
	}

	public function tampil_data()
	{
		$query = $this->db->query("SELECT ii.ID_Pelamar, iii.ID_Pelamar, iv.Id_Pelamar, v.ID_Pelamar, vi.ID_Pelamar, vii.ID_Pelamar, viii.ID_Pelamar, i.ID_Pelamar, i.nik_ktp, i.nama_ktp, i.user, i.email
									FROM m_pelamar i
									LEFT JOIN lam_identitas ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_alamat iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN lam_pendidikan iv ON i.ID_Pelamar = iv.ID_Pelamar
									LEFT JOIN lam_ukuran v ON i.ID_Pelamar = v.ID_Pelamar
									LEFT JOIN lam_pengalamankerja vi ON i.ID_Pelamar = vi.ID_Pelamar
									LEFT JOIN lam_pertanyaan vii ON i.ID_Pelamar = vii.ID_Pelamar
									LEFT JOIN lam_kacamata viii ON i.ID_Pelamar = viii.ID_Pelamar
                                    WHERE ii.ID_Pelamar IS NOT NULL AND iii.ID_Pelamar IS NOT NULL AND iv.Id_Pelamar IS NOT NULL AND v.ID_Pelamar IS NOT NULL AND vi.ID_Pelamar IS NOT NULL AND vii.ID_Pelamar IS NOT NULL AND viii.ID_Pelamar IS NOT NULL
                                    GROUP BY vi.ID_Pelamar, iv.ID_Pelamar
									ORDER BY i.nik_ktp ASC");
		return $query;
	}

	public function tampil_cetak_list_pelamar($id)
	{
		$query = $this->db->query("SELECT i.ID_Pelamar, i.nik_ktp, i.nama_ktp, i.user, i.email, i.pass,
											ii.ID_PelamarIdentitas, ii.jenkel, ii.tgl_lahir_ktp, ii.nohp, ii.status_kawin, ii.kerja_ayah, ii.kerja_ibu, ii.image,
											iii.ID_PelamarAlamat, iii.alamat_ktp, iii.kel_kec_ktp, iii.kota_ktp, iii.kodepos_ktp, iii.alamat_domisili, iii.kel_kec_domisili, iii.kota_domisili, iii.kodepos_domisili, 
											iv.ID_PelamarPendidikan, iv.pendidikan, iv.jurusan, iv.thn_lulus, iv.thn_masuk, iv.thn_lulus, iv.asal_pendidikan, iv.tempat_pendidikan,											
											v.ID_PelamarUkuran, v.tinggi_badan_cm, v.berat_badan_kg, v.ukuran_baju, v.ukuran_sepatu_cm,
											vi.ID_PelamarPengalaman, vi.peng_perusahaan, vi.peng_bidang, vi.peng_tahun,
											vii.ID_PelamarPertanyaan, vii.jwb_kacamata, vii.jwb_rokok, vii.jwb_sim, vii.jwb_celaka_kerja, vii.jwb_celaka_lalin, vii.jwb_patah_tulang, vii.jwb_pernah_kerja, vii.jwb_nikah_tahun, vii.jwb_shift, vii.jwb_kerja, vii.jwb_nikah_kontrak, vii.jwb_kuliah, vii.jwb_area, vii.jwb_no_rokok,
											viii.kaca_kanan, viii.kaca_kiri
									FROM m_pelamar i
									LEFT JOIN lam_identitas ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_alamat iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN lam_pendidikan iv ON i.ID_Pelamar = iv.ID_Pelamar
									LEFT JOIN lam_ukuran v ON i.ID_Pelamar = v.ID_Pelamar
									LEFT JOIN lam_pengalamankerja vi ON i.ID_Pelamar = vi.ID_Pelamar
									LEFT JOIN lam_pertanyaan vii ON i.ID_Pelamar = vii.ID_Pelamar
									LEFT JOIN lam_kacamata viii ON i.ID_Pelamar = viii.ID_Pelamar
									WHERE i.ID_Pelamar=$id ");
		return $query->result();
	}

	public function getdata($id)
	{
		$query = $this->db->query("SELECT * FROM m_pelamar WHERE ID_Pelamar=$id");
		return $query;
	}

	public function update($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_pelamar($id)
    {
        $this->db->where('ID_Pelamar',$id);
        $this->db->delete('m_pelamar');
        $this->db->delete('lam_identitas');
        $this->db->delete('lam_alamat');
        $this->db->delete('lam_kacamata');
        $this->db->delete('lam_pendidikan');
        $this->db->delete('lam_pengalamankerja');
        $this->db->delete('lam_pertanyaan');
        $this->db->delete('lam_ukuran');
    }

    public function tampil_pelamar()
    {
    	$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, iv.nama_ktp, ii.nohp iii.lok_nama
									FROM join_lamar i
									INNER JOIN lam_identitas ii ON i.ID_Pelamar = ii.ID_Pelamar
									INNER JOIN m_loker iii ON i.ID_Loker = iii.ID_Loker
									INNER JOIN m_pelamar iv ON i.ID_Pelamar = iv.ID_Pelamar ");
		return $query;
    }

    public function tampil_cetak_pelamar($tgl_awal,$tgl_akhir,$bidang)
    {
    	if ($tgl_awal <> null && $tgl_akhir <> null && $bidang <> null) {
			
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "AND i.ID_Loker = '$bidang' ";	

		}elseif ($tgl_awal <> null && $tgl_akhir <> null && $bidang == null){
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "";
		}
		else{			
			$data1 = "";
			$data2 = "AND i.ID_Loker = '$bidang' ";
		}

		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									WHERE i.status_Join = 1
									AND i.status_aktif = 1
									$data1
									$data2
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
    }

    public function tampil_cetak_administrasi($tgl_awal,$tgl_akhir,$bidang)
    {
    	if ($tgl_awal == null & $tgl_akhir == null) {
			$data1 = "";
			$data2 = "AND i.ID_Loker = '$bidang' ";
		}elseif($tgl_awal != null & $tgl_akhir != null){
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "";
		}
		else{
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "AND i.ID_Loker = '$bidang' ";
		}

		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									WHERE i.status_Join = 2 
									AND i.status_aktif = 1 
									$data1
									$data2
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
    }

    public function tampil_cetak_interview($tgl_awal,$tgl_akhir,$bidang)
    {
    	if ($tgl_awal <> null && $tgl_akhir <> null && $bidang <> null) {
			
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "AND i.ID_Loker = '$bidang' ";	

		}elseif ($tgl_awal <> null && $tgl_akhir <> null && $bidang == null){
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "";
		}
		else{			
			$data1 = "";
			$data2 = "AND i.ID_Loker = '$bidang' ";
		}

		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									WHERE i.status_Join = 3 
									AND i.status_aktif = 1 
									$data1
									$data2
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
    }

    public function tampil_cetak_psikotes($tgl_awal,$tgl_akhir,$bidang)
    {
    	if ($tgl_awal <> null && $tgl_akhir <> null && $bidang <> null) {
			
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "AND i.ID_Loker = '$bidang' ";	

		}elseif ($tgl_awal <> null && $tgl_akhir <> null && $bidang == null){
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "";
		}
		else{			
			$data1 = "";
			$data2 = "AND i.ID_Loker = '$bidang' ";
		}

		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									WHERE i.status_Join = 4
									AND i.status_aktif = 1
									$data1
									$data2
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
    }

    public function tampil_cetak_mcu($tgl_awal,$tgl_akhir,$bidang)
    {
    	if ($tgl_awal <> null && $tgl_akhir <> null && $bidang <> null) {
			
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "AND i.ID_Loker = '$bidang' ";	

		}elseif ($tgl_awal <> null && $tgl_akhir <> null && $bidang == null){
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "";
		}
		else{			
			$data1 = "";
			$data2 = "AND i.ID_Loker = '$bidang' ";
		}

		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									WHERE i.status_Join = 5
									AND i.status_aktif = 1
									$data1
									$data2
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
    }

    public function tampil_cetak_interview_lanjutan($tgl_awal,$tgl_akhir,$bidang)
    {
    	if ($tgl_awal <> null && $tgl_akhir <> null && $bidang <> null) {
			
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "AND i.ID_Loker = '$bidang' ";	

		}elseif ($tgl_awal <> null && $tgl_akhir <> null && $bidang == null){
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "";
		}
		else{			
			$data1 = "";
			$data2 = "AND i.ID_Loker = '$bidang' ";
		}

		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									WHERE i.status_Join = 6
									AND i.status_aktif = 1
									$data1
									$data2
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
    }

    public function tampil_cetak_hire($tgl_awal,$tgl_akhir,$bidang)
    {
    	if ($tgl_awal <> null && $tgl_akhir <> null && $bidang <> null) {
			
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "AND i.ID_Loker = '$bidang' ";	

		}elseif ($tgl_awal <> null && $tgl_akhir <> null && $bidang == null){
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "";
		}
		else{			
			$data1 = "";
			$data2 = "AND i.ID_Loker = '$bidang' ";
		}

		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									WHERE i.status_Join = 7
									AND i.status_aktif = 1
									$data1
									$data2
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
    }

    public function tampil_cetak_karyawan($tgl_awal,$tgl_akhir,$bidang)
    {
    	if ($tgl_awal <> null && $tgl_akhir <> null && $bidang <> null) {
			
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "AND i.ID_Loker = '$bidang' ";	

		}elseif ($tgl_awal <> null && $tgl_akhir <> null && $bidang == null){
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "";
		}
		else{			
			$data1 = "";
			$data2 = "AND i.ID_Loker = '$bidang' ";
		}

		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									WHERE i.status_Join = 8
									AND i.status_aktif = 1
									$data1
									$data2
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
    }

    public function tampil_excel_pelamar($tgl_awal,$tgl_akhir,$bidang)
    {
    	if ($tgl_awal <> null && $tgl_akhir <> null && $bidang <> null) {
			
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "AND i.ID_Loker = '$bidang' ";	

		}elseif ($tgl_awal <> null && $tgl_akhir <> null && $bidang == null){
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "";
		}
		else{			
			$data1 = "";
			$data2 = "AND i.ID_Loker = '$bidang' ";
		}

		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									WHERE i.status_Join = 1
									AND i.status_aktif = 1
									$data1
									$data2
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
    }

    public function tampil_excel_administrasi($tgl_awal,$tgl_akhir,$bidang)
    {
    	if ($tgl_awal == null & $tgl_akhir == null) {
			$data1 = "";
			$data2 = "AND i.ID_Loker = '$bidang' ";
		}elseif($tgl_awal != null & $tgl_akhir != null){
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "";
		}
		else{
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "AND i.ID_Loker = '$bidang' ";
		}

		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									WHERE i.status_Join = 2 
									AND i.status_aktif = 1 
									$data1
									$data2
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
    }

    public function tampil_excel_interview($tgl_awal,$tgl_akhir,$bidang)
    {
    	if ($tgl_awal <> null && $tgl_akhir <> null && $bidang <> null) {
			
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "AND i.ID_Loker = '$bidang' ";	

		}elseif ($tgl_awal <> null && $tgl_akhir <> null && $bidang == null){
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "";
		}
		else{			
			$data1 = "";
			$data2 = "AND i.ID_Loker = '$bidang' ";
		}

		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									WHERE i.status_Join = 3
									AND i.status_aktif = 1
									$data1
									$data2
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
    }

    public function tampil_excel_psikotes($tgl_awal,$tgl_akhir,$bidang)
    {
    	if ($tgl_awal <> null && $tgl_akhir <> null && $bidang <> null) {
			
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "AND i.ID_Loker = '$bidang' ";	

		}elseif ($tgl_awal <> null && $tgl_akhir <> null && $bidang == null){
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "";
		}
		else{			
			$data1 = "";
			$data2 = "AND i.ID_Loker = '$bidang' ";
		}

		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									WHERE i.status_Join = 4
									AND i.status_aktif = 1
									$data1
									$data2
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
    }

    public function tampil_excel_mcu($tgl_awal,$tgl_akhir,$bidang)
    {
    	if ($tgl_awal <> null && $tgl_akhir <> null && $bidang <> null) {
			
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "AND i.ID_Loker = '$bidang' ";	

		}elseif ($tgl_awal <> null && $tgl_akhir <> null && $bidang == null){
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "";
		}
		else{			
			$data1 = "";
			$data2 = "AND i.ID_Loker = '$bidang' ";
		}

		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									WHERE i.status_Join = 5
									AND i.status_aktif = 1
									$data1
									$data2
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
    }

    public function tampil_excel_interview_lanjutan($tgl_awal,$tgl_akhir,$bidang)
    {
    	if ($tgl_awal <> null && $tgl_akhir <> null && $bidang <> null) {
			
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "AND i.ID_Loker = '$bidang' ";	

		}elseif ($tgl_awal <> null && $tgl_akhir <> null && $bidang == null){
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "";
		}
		else{			
			$data1 = "";
			$data2 = "AND i.ID_Loker = '$bidang' ";
		}

		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									WHERE i.status_Join = 6
									AND i.status_aktif = 1
									$data1
									$data2
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
    }

    public function tampil_excel_hire($tgl_awal,$tgl_akhir,$bidang)
    {
    	if ($tgl_awal <> null && $tgl_akhir <> null && $bidang <> null) {
			
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "AND i.ID_Loker = '$bidang' ";	

		}elseif ($tgl_awal <> null && $tgl_akhir <> null && $bidang == null){
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "";
		}
		else{			
			$data1 = "";
			$data2 = "AND i.ID_Loker = '$bidang' ";
		}

		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									WHERE i.status_Join = 7
									AND i.status_aktif = 1
									$data1
									$data2
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
    }

    public function tampil_excel_karyawan($tgl_awal,$tgl_akhir,$bidang)
    {
    	if ($tgl_awal <> null && $tgl_akhir <> null && $bidang <> null) {
			
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "AND i.ID_Loker = '$bidang' ";	

		}elseif ($tgl_awal <> null && $tgl_akhir <> null && $bidang == null){
			$data1 = "AND i.TGL_Lamar BETWEEN '$tgl_awal' AND '$tgl_akhir' ";
			$data2 = "";
		}
		else{			
			$data1 = "";
			$data2 = "AND i.ID_Loker = '$bidang' ";
		}

		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									WHERE i.status_Join = 8
									AND i.status_aktif = 1
									$data1
									$data2
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
    }

    public function get_karyawan($id)
    {
    	$query = $this->db->query("SELECT * 
    								FROM m_pelamar i
    								LEFT JOIN lam_identitas ii ON i.ID_Pelamar = ii.ID_Pelamar
    								LEFT JOIN karyawan_kepesertaan iii ON i.ID_Pelamar = iii.ID_Pelamar    								
    								LEFT JOIN lam_alamat iv ON i.ID_Pelamar = iv.ID_Pelamar
    								LEFT JOIN karyawan_area v ON i.ID_Pelamar = v.ID_Pelamar
    								LEFT JOIN karyawan_keluarga vii ON i.ID_Pelamar = vii.ID_Pelamar
    								LEFT JOIN karyawan_kawin viii ON i.ID_Pelamar = viii.ID_Pelamar
    								LEFT JOIN lam_pertanyaan ix ON i.ID_Pelamar = ix.ID_Pelamar
    								LEFT JOIN karyawan_sim x ON i.ID_Pelamar = x.ID_Pelamar
    								WHERE i.ID_Pelamar = $id ");
		return $query;
    }

    public function tampil_darurat($id)
    {
    	$query = $this->db->query("SELECT * FROM karyawan_darurat WHERE ID_Pelamar = $id ");
		return $query;
    }

    public function cetak_karyawan($id)
    {
    	$query = $this->db->query("SELECT * 
    								FROM m_pelamar i
    								LEFT JOIN lam_identitas ii ON i.ID_Pelamar = ii.ID_Pelamar
    								LEFT JOIN karyawan_kepesertaan iii ON i.ID_Pelamar = iii.ID_Pelamar    								
    								LEFT JOIN lam_alamat iv ON i.ID_Pelamar = iv.ID_Pelamar
    								LEFT JOIN karyawan_area v ON i.ID_Pelamar = v.ID_Pelamar
    								LEFT JOIN lam_pendidikan vi ON i.ID_Pelamar = vi.ID_Pelamar
    								LEFT JOIN karyawan_keluarga vii ON i.ID_Pelamar = vii.ID_Pelamar
    								LEFT JOIN karyawan_kawin viii ON i.ID_Pelamar = viii.ID_Pelamar
    								LEFT JOIN lam_pertanyaan ix ON i.ID_Pelamar = ix.ID_Pelamar
    								LEFT JOIN karyawan_sim x ON i.ID_Pelamar = x.ID_Pelamar
    								LEFT JOIN karyawan_area xi ON i.ID_Pelamar = xi.ID_Pelamar
    								LEFT JOIN karyawan_kawin xii ON i.ID_Pelamar = xii.ID_Pelamar
    								WHERE i.ID_Pelamar = $id ");
		return $query->result();
    }

    public function cetak_darurat($id)
    {
    	$query = $this->db->query("SELECT * FROM karyawan_darurat WHERE ID_Pelamar = $id ");
		return $query->result();
    }

	public function lihat_pertanyaan()
	{
		$query = $this->db->query("SELECT * FROM lam_pertanyaan");
		return $query;
	}

	public function tambah_area()
	{
		$data = array(
			'ID_Area'		=> null,
			'ID_Pelamar'	=> $this->input->post('id'),
			'area'			=> $this->input->post('area')
			);

		$this->db->insert('karyawan_area',$data);
	}

	public function tambah_kawin()
	{
		$data = array(
			'ID_Kawin'		=> null,
			'ID_Pelamar'	=> $this->input->post('id'),
			'status_kawin'	=> $this->input->post('kawin')
			);

		$this->db->insert('karyawan_kawin',$data);
	}

	// lihat data pelamar

	public function lihat_akun($id)
	{
		$query = $this->db->query("SELECT * FROM m_pelamar WHERE ID_pelamar = $id LIMIT 1");
		return $query->result();
	}

	public function lihat_identitas($id)
	{
		$query = $this->db->query("SELECT * FROM lam_identitas WHERE ID_Pelamar = $id LIMIT 1");
		return $query->result();
	}

	public function lihat_alamat($id)
	{
		$query = $this->db->query("SELECT * FROM lam_alamat WHERE ID_Pelamar = $id LIMIT 1");
		return $query->result();
	}

	public function lihat_ukuran($id)
	{
		$query = $this->db->query("SELECT * FROM lam_ukuran WHERE ID_Pelamar = $id LIMIT 1");
		return $query->result();
	}

	public function lihat_pendidikan($id)
	{
		$query = $this->db->query("SELECT * FROM lam_pendidikan WHERE ID_Pelamar = $id ORDER BY pendidikan DESC");
		return $query->result();
	}

	public function lihat_pengalamankerja($id)
	{
		$query = $this->db->query("SELECT * FROM lam_pengalamankerja WHERE ID_Pelamar = $id ORDER BY ID_PelamarPengalaman DESC");
		return $query->result();
	}

	public function lihat_pertanyaan2($id)
	{
		$query = $this->db->query("SELECT i.ID_PelamarPertanyaan, i.ID_Pelamar, i.jwb_kacamata, i.jwb_rokok, i.jwb_sim, i.jwb_celaka_kerja, i.jwb_celaka_lalin, i.jwb_patah_tulang, i.jwb_pernah_kerja, i.jwb_nikah_tahun, i.jwb_shift, i.jwb_kerja, i.jwb_nikah_kontrak, i.jwb_kuliah, i.jwb_area, i.jwb_no_rokok,
										ii.kaca_kiri, ii.kaca_kanan
										FROM lam_pertanyaan i
										LEFT JOIN lam_kacamata ii ON i.ID_Pelamar = ii.ID_Pelamar
										WHERE i.ID_Pelamar=$id");
		return $query->result();
	}

	public function lihat_kepesertaan($id)
	{
		$query = $this->db->query("SELECT * FROM karyawan_kepesertaan WHERE ID_pelamar = $id LIMIT 1");
		return $query->result();
	}

	public function lihat_sim($id)
	{
		$query = $this->db->query("SELECT * FROM karyawan_sim WHERE ID_pelamar = $id LIMIT 1");
		return $query->result();
	}

	public function lihat_keluarga($id)
	{
		$query = $this->db->query("SELECT * FROM karyawan_keluarga WHERE ID_Pelamar=$id LIMIT 1");
		return $query->result();
	}

	public function lihat_status_kawin($id)
	{
		$query = $this->db->query("SELECT * FROM karyawan_kawin WHERE ID_Pelamar=$id LIMIT 1");
		return $query->result();
	}

	public function lihat_area($id)
	{
		$query = $this->db->query("SELECT * FROM karyawan_area WHERE ID_Pelamar=$id LIMIT 1");
		return $query->result();

	}
}
 ?>