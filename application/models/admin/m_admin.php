<?php 

class m_admin extends CI_Model
{
	
	public function lihat_admin(){
		$query = $this->db->query("SELECT * FROM m_user WHERE Status_User = 1 ORDER BY ID_User DESC");
		return $query;
	}

	public function lihat_hrd()
	{
		$query = $this->db->query("SELECT * FROM m_user WHERE Status_User = 2 ORDER BY ID_User DESC");
		return $query;
	}

	public function tambah_data(){
		
		$data = array(
			'ID_User'		=> null,
			'User'			=> $this->input->post('user'),
			'Pass'			=> base64_encode($this->input->post('pass')),
			'Status_User'	=> $this->input->post('status')
			);

		$this->db->insert('m_user',$data);
	}

	public function getdata($id)
	{
		$query = $this->db->query("SELECT * FROM m_user WHERE ID_User = $id ");
		return $query;
	}

	public function update($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_data($id)
    {
        $this->db->where('ID_User',$id);
        $this->db->delete('m_user');
    }

    public function model_status()
	{
		$query = $this->db->query("SELECT * FROM status_recruitment WHERE ID_recruitment = 1 LIMIT 1");
		return $query;
	}

	public function m_status_pelamar()
	{
		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									WHERE i.status_Join = 1 AND i.status_aktif = 1
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
	}

	public function m_status_pelamar_cari($tgl_awal,$tgl_akhir,$bidang)
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

	public function r_status_pelamar()
	{
		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									WHERE i.status_Join = 1 AND i.status_aktif = 0
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
	}

	public function r_status_pelamar_cari($tgl_awal,$tgl_akhir,$bidang)
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
									AND i.status_aktif = 0
									$data1
									$data2
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
	}

	public function m_status_administrasi()
	{
		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									WHERE i.status_Join = 2 AND i.status_aktif = 1
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
	}

	public function m_status_administrasi_cari($tgl_awal,$tgl_akhir,$bidang)
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
									WHERE i.status_Join = 2 
									AND i.status_aktif = 1 
									$data1
									$data2
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
	}

	public function r_status_administrasi()
	{
		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									WHERE i.status_Join = 2 AND i.status_aktif = 0
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
	}

	public function r_status_administrasi_cari($tgl_awal,$tgl_akhir,$bidang)
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
									WHERE i.status_Join = 2 
									AND i.status_aktif = 0 
									$data1
									$data2
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
	}

	public function m_status_interview()
	{
		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									WHERE i.status_Join = 3 AND i.status_aktif = 1
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
	}

	public function m_status_interview_cari($tgl_awal,$tgl_akhir,$bidang)
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

	public function r_status_interview()
	{
		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									WHERE i.status_Join = 3 AND i.status_aktif = 0
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
	}

	public function r_status_interview_cari($tgl_awal,$tgl_akhir,$bidang)
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
									AND i.status_aktif = 0 
									$data1
									$data2
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
	}

	public function m_status_psikotes()
	{
		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama, v.area, vi.status_kawin
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									LEFT JOIN karyawan_area v ON i.ID_Pelamar = v.ID_Pelamar
									LEFT JOIN karyawan_kawin vi ON i.ID_Pelamar = vi.ID_Pelamar
									WHERE i.status_Join = 4 AND i.status_aktif = 1
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
	}

	public function m_status_psikotes_cari($tgl_awal,$tgl_akhir,$bidang)
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

	public function r_status_psikotes()
	{
		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama, v.area, vi.status_kawin
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									LEFT JOIN karyawan_area v ON i.ID_Pelamar = v.ID_Pelamar
									LEFT JOIN karyawan_kawin vi ON i.ID_Pelamar = vi.ID_Pelamar
									WHERE i.status_Join = 4 AND i.status_aktif = 0
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
	}

	public function r_status_psikotes_cari($tgl_awal,$tgl_akhir,$bidang)
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
									AND i.status_aktif = 0
									$data1
									$data2
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
	}

	public function m_status_mcu()
	{
		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama, v.area, vi.status_kawin
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									LEFT JOIN karyawan_area v ON i.ID_Pelamar = v.ID_Pelamar
									LEFT JOIN karyawan_kawin vi ON i.ID_Pelamar = vi.ID_Pelamar
									WHERE i.status_Join = 5 AND i.status_aktif = 1
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
	}

	public function m_status_mcu_cari($tgl_awal,$tgl_akhir,$bidang)
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

	public function r_status_mcu()
	{
		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama, v.area, vi.status_kawin
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									LEFT JOIN karyawan_area v ON i.ID_Pelamar = v.ID_Pelamar
									LEFT JOIN karyawan_kawin vi ON i.ID_Pelamar = vi.ID_Pelamar
									WHERE i.status_Join = 5 AND i.status_aktif = 0
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
	}

	public function r_status_mcu_cari($tgl_awal,$tgl_akhir,$bidang)
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
									AND i.status_aktif = 0
									$data1
									$data2
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
	}

	public function m_status_interview_lanjut()
	{
		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama, v.area, vi.status_kawin
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									LEFT JOIN karyawan_area v ON i.ID_Pelamar = v.ID_Pelamar
									LEFT JOIN karyawan_kawin vi ON i.ID_Pelamar = vi.ID_Pelamar
									WHERE i.status_Join = 6 AND i.status_aktif = 1
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
	}

	public function m_status_intervew_lanjut_cari($tgl_awal,$tgl_akhir,$bidang)
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

	public function r_status_interview_lanjut()
	{
		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama, v.area, vi.status_kawin
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									LEFT JOIN karyawan_area v ON i.ID_Pelamar = v.ID_Pelamar
									LEFT JOIN karyawan_kawin vi ON i.ID_Pelamar = vi.ID_Pelamar
									WHERE i.status_Join = 6 AND i.status_aktif = 0
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
	}

	public function r_status_intervew_lanjut_cari($tgl_awal,$tgl_akhir,$bidang)
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

	public function m_status_hire()
	{
		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama, v.area, vi.status_kawin
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									LEFT JOIN karyawan_area v ON i.ID_Pelamar = v.ID_Pelamar
									LEFT JOIN karyawan_kawin vi ON i.ID_Pelamar = vi.ID_Pelamar
									WHERE i.status_Join = 7 AND i.status_aktif = 1
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
	}

	public function m_status_hire_cari($tgl_awal,$tgl_akhir,$bidang)
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

	public function r_status_hire()
	{
		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama, v.area, vi.status_kawin
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									LEFT JOIN karyawan_area v ON i.ID_Pelamar = v.ID_Pelamar
									LEFT JOIN karyawan_kawin vi ON i.ID_Pelamar = vi.ID_Pelamar
									WHERE i.status_Join = 7 AND i.status_aktif = 0
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
	}

	public function r_status_hire_cari($tgl_awal,$tgl_akhir,$bidang)
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

	public function m_status_karyawan()
	{
		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, i.status_aktif, ii.nik_ktp, ii.nama_ktp, ii.email, iii.nohp, iv.lok_nama, v.area, vi.status_kawin
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									LEFT JOIN karyawan_area v ON i.ID_Pelamar = v.ID_Pelamar
									LEFT JOIN karyawan_kawin vi ON i.ID_Pelamar = vi.ID_Pelamar									
									WHERE i.status_Join = 8 AND i.status_aktif = 1
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
	}

	public function m_status_karyawan_cari($tgl_awal,$tgl_akhir,$bidang)
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

		$query = $this->db->query("SELECT i.ID_PelamarJoin, i.ID_Pelamar, i.ID_Loker, i.TGL_Lamar, i.status_Join, ii.email, iii.nohp, ii.nik_ktp, ii.nama_ktp, iv.lok_nama, v.area, vi.status_kawin
									FROM join_lamar i
									LEFT JOIN m_pelamar ii ON i.ID_Pelamar = ii.ID_Pelamar
									LEFT JOIN lam_identitas iii ON i.ID_Pelamar = iii.ID_Pelamar
									LEFT JOIN m_loker iv ON i.ID_Loker = iv.ID_Loker
									LEFT JOIN karyawan_area v ON i.ID_Pelamar = v.ID_Pelamar
									LEFT JOIN karyawan_kawin vi ON i.ID_Pelamar = vi.ID_Pelamar
									WHERE i.status_Join = 8
									AND i.status_aktif = 1
									$data1
									$data2
									ORDER BY iv.lok_nama DESC, ii.nama_ktp ASC ");
		return $query;
	}

	public function total_admin()
	{
		$query = $this->db->query("SELECT *,count(ID_User) AS total FROM m_user WHERE Status_User=1");
		return $query->result();
	}

	public function total_hrd()
	{
		$query = $this->db->query("SELECT *,count(ID_User) AS total FROM m_user WHERE Status_User=2");
		return $query->result();
	}

	public function total_pelamar()
	{
		$query = $this->db->query("SELECT *,count(ID_PelamarIdentitas) AS total FROM lam_identitas");
		return $query->result();
	}

	public function total_loker()
	{
		$query = $this->db->query("SELECT *,count(ID_Loker) AS total FROM m_loker WHERE lok_status=0");
		return $query->result();
	}

	public function total_pelamar_join()
	{
		$query = $this->db->query("SELECT *,count(ID_PelamarJoin) AS total FROM join_lamar WHERE status_join=1 AND status_aktif=1");
		return $query->result();
	}

	public function total_pelamar_administrasi()
	{
		$query = $this->db->query("SELECT *,count(ID_PelamarJoin) AS total FROM join_lamar WHERE status_join=2 AND status_aktif=1");
		return $query->result();
	}

	public function total_pelamar_interview()
	{
		$query = $this->db->query("SELECT *,count(ID_PelamarJoin) AS total FROM join_lamar WHERE status_join=3 AND status_aktif=1");
		return $query->result();
	}

	public function total_pelamar_psikotes()
	{
		$query = $this->db->query("SELECT *,count(ID_PelamarJoin) AS total FROM join_lamar WHERE status_join=4 AND status_aktif=1");
		return $query->result();
	}

	public function total_pelamar_mcu()
	{
		$query = $this->db->query("SELECT *,count(ID_PelamarJoin) AS total FROM join_lamar WHERE status_join=5 AND status_aktif=1");
		return $query->result();
	}

	public function total_pelamar_interview_lanjut()
	{
		$query = $this->db->query("SELECT *,count(ID_PelamarJoin) AS total FROM join_lamar WHERE status_join=6 AND status_aktif=1");
		return $query->result();
	}	

	public function total_pelamar_hire()
	{
		$query = $this->db->query("SELECT *,count(ID_PelamarJoin) AS total FROM join_lamar WHERE status_join=7 AND status_aktif=1");
		return $query->result();
	}

	public function total_pelamar_karyawan()
	{
		$query = $this->db->query("SELECT *,count(ID_PelamarJoin) AS total FROM join_lamar WHERE status_join=8 AND status_aktif=1");
		return $query->result();
	}

}
 ?>