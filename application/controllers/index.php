<?php 

class index extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('pelamar/m_akun');
	}

	public function index()
	{
		$user = $this->session->userdata('ses_pelamar');
		if ($user == "") {
			$this->load->view('pelamar/v_tanyaakun');
		}else{
			redirect('pelamar');
		}		
	}

	public function tampil_login()
	{
		$this->load->view('login/temp_login');
		$this->load->view('login/v_login_pelamar');
	}

	public function tampil_signup()
	{
		$this->load->view('login/temp_login');
		$this->load->view('pelamar/v_signup');
	}

	public function aksi_login()
	{
		$user = $this->input->post('user');
		$pass = base64_encode($this->input->post('pass'));

		$this->db->where('user', $user);
		$this->db->where('pass', $pass);
		$query = $this->db->get('m_pelamar');

		if ($query->num_rows() > 0) {
			$row = $query->row();
			$data = array(
				'ses_pelamar' 	=> $row->ID_Pelamar,
				'ses_nik'		=> $row->nik_ktp,
				'ses_nama'		=> $row->nama_ktp,
				);
			$this->session->set_userdata($data);			

			redirect('pelamar');
		}else{
			
			$this->session->set_flashdata('msg','Ada kesalahan dalam Login, Periksa Username atau Password');
			redirect('pelamar');
		}
	}

	public function daftar()
	{
		$nik = $this->input->post('nik');
		$user = $this->input->post('user');

		$this->db->where('user', $user);
		$this->db->or_where('nik_ktp', $nik);
		$query = $this->db->get('m_pelamar');

		if ($query->num_rows() > 0) {
			$this->session->set_flashdata('msg','Gagal Dalam Mendaftar Karena NIk atau Username ini sudah ada');
			
			redirect('index/tampil_login');
		}else{
			if (isset($_POST)) {
			$this->m_akun->tambah_akun();

			$this->session->set_flashdata('msg','Berhasil Mendaftar');
			
			redirect('index/tampil_login');
		}
		else{
			$this->session->set_flashdata('msg','Gagal Dalam Mendaftar');
			
			redirect('index/tampil_login');
		}
			
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('ses_pelamar');
		$this->session->unset_userdata('ses_nik');
		$this->session->unset_userdata('ses_identitas');
		$this->session->unset_userdata('ses_alamat');
		$this->session->unset_userdata('ses_pendidikan');
		$this->session->unset_userdata('ses_pengalamankerja');
		$this->session->unset_userdata('ses_ukuran');
		$this->session->unset_userdata('ses_pertanyaan');
		session_destroy();

		redirect('index');
	}	
}

 ?>