<?php 

class pelamar extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('pelamar/m_pelamar');
		$this->load->model('admin/m_admin');
	}

	public function index()
	{
		$user = $this->session->userdata('ses_pelamar');
		if ($user == "") {
			$this->load->view('login/temp_login');
			$this->load->view('login/v_login_pelamar');
		}else{			
			redirect('pelamar/dashboard');
		}
	}

	public function dashboard()
	{
		$id = $this->session->userdata('ses_pelamar');
		if ($id == NULL) {
			redirect('index');
		}else{
			$data['identitas']		= $this->m_pelamar->lihat_identitas($id);
			$data['cek_data']		= $this->m_pelamar->cek_kelengkapan_karyawan($id);
			$data['status'] 		= $this->m_admin->model_status();
			$data['tracking'] 		= $this->m_pelamar->lihat_status_lamaran($id);
			$this->load->view('pelamar/temp1',$data);
			$this->load->view('pelamar/dashboard',$data);
			$this->load->view('pelamar/temp2');
		}
		
	}

	public function profil()
	{
		$id = $this->session->userdata('ses_pelamar');
		$nik = $this->session->userdata('ses_nik');
		if ($id == "") {
			$this->load->view('login/temp_login');
			$this->load->view('login/v_login_pelamar');
		}else{
			$this->db->where('ID_Pelamar', $id);
			$query1 = $this->db->get('lam_identitas');

			if ($query1->num_rows() > 0) {
				$row = $query1->row();
				$data = array(
					'ses_identitas'	=> '1',
					);
				$this->session->set_userdata($data);			
			}else{
				$data = array(
					'ses_identitas'	=> '0',
					);
				$this->session->set_userdata($data);
			}

			$this->db->where('ID_Pelamar', $id);
			$query2 = $this->db->get('lam_alamat');

			if ($query2->num_rows() > 0) {
				$row = $query2->row();
				$data = array(
					'ses_alamat'	=> '1',
					);
				$this->session->set_userdata($data);			
			}else{
				$data = array(
					'ses_alamat'	=> '0',
					);
				$this->session->set_userdata($data);
			}

			$this->db->where('ID_Pelamar', $id);
			$query3 = $this->db->get('lam_pendidikan');

			if ($query3->num_rows() > 0) {
				$row = $query3->row();
				$data = array(
					'ses_pendidikan'	=> '1',
					);
				$this->session->set_userdata($data);			
			}else{
				$data = array(
					'ses_pendidikan'	=> '0',
					);
				$this->session->set_userdata($data);
			}

			$this->db->where('ID_Pelamar', $id);
			$query4 = $this->db->get('lam_pengalamankerja');

			if ($query4->num_rows() > 0) {
				$row = $query4->row();
				$data = array(
					'ses_pengalamankerja'	=> '1',
					);
				$this->session->set_userdata($data);			
			}else{
				$data = array(
					'ses_pengalamankerja'	=> '0',
					);
				$this->session->set_userdata($data);
			}

			$this->db->where('ID_Pelamar', $id);
			$query5 = $this->db->get('lam_ukuran');

			if ($query5->num_rows() > 0) {
				$row = $query5->row();
				$data = array(
					'ses_ukuran'	=> '1',
					);
				$this->session->set_userdata($data);			
			}else{
				$data = array(
					'ses_ukuran'	=> '0',
					);
				$this->session->set_userdata($data);
			}

			$this->db->where('ID_Pelamar', $id);
			$query6 = $this->db->get('lam_pertanyaan');

			if ($query6->num_rows() > 0) {
				$row = $query6->row();
				$data = array(
					'ses_pertanyaan'	=> '1',
					);
				$this->session->set_userdata($data);			
			}else{
				$data = array(
					'ses_pertanyaan'	=> '0',
					);
				$this->session->set_userdata($data);
			}
			$data['status'] 		= $this->m_admin->model_status();
			$data['akun'] 			= $this->m_pelamar->lihat_akun($id);
			$data['identitas']		= $this->m_pelamar->lihat_identitas($id);
			$data['alamat']			= $this->m_pelamar->lihat_alamat($id);
			$data['ukuran']			= $this->m_pelamar->lihat_ukuran($id);
			$data['pendidikan']		= $this->m_pelamar->lihat_pendidikan($id);
			$data['pengalamankerja']= $this->m_pelamar->lihat_pengalamankerja($id);
			$data['pertanyaan']		= $this->m_pelamar->lihat_pertanyaan($id);

			$this->load->view('pelamar/temp1',$data);
			$this->load->view('pelamar/profil',$data);
			$this->load->view('pelamar/temp2');
		}		
	}

	public function profil_detail()
	{
		$id = $this->session->userdata('ses_pelamar');
		$data['identitas']		= $this->m_pelamar->lihat_identitas($id);
		$this->load->view('pelamar/temp1',$data);
		$this->load->view('pelamar/profil');
		$this->load->view('pelamar/temp2');
	}

	public function gonewidentitas()
	{
		$id = $this->session->userdata('ses_pelamar');
		$data['identitas']		= $this->m_pelamar->lihat_identitas($id);
		$this->load->view('pelamar/temp1',$data);
		$this->load->view('pelamar/v_newidentitas');
		$this->load->view('pelamar/temp2');
	}

	public function gonewalamat()
	{
		$id = $this->session->userdata('ses_pelamar');
		$data['identitas']		= $this->m_pelamar->lihat_identitas($id);
		$this->load->view('pelamar/temp1',$data);
		$this->load->view('pelamar/v_newalamat');
		$this->load->view('pelamar/temp2');
	}

	public function gonewukuran()
	{
		$id = $this->session->userdata('ses_pelamar');
		$data['identitas']		= $this->m_pelamar->lihat_identitas($id);
		$this->load->view('pelamar/temp1',$data);
		$this->load->view('pelamar/v_newukuran');
		$this->load->view('pelamar/temp2');
	}

	public function gonewpendidikan()
	{
		$id = $this->session->userdata('ses_pelamar');
		$data['identitas']		= $this->m_pelamar->lihat_identitas($id);
		$this->load->view('pelamar/temp1',$data);
		$this->load->view('pelamar/v_newpendidikan');
		$this->load->view('pelamar/temp2');
	}

	public function gonewpengalamankerja()
	{
		$id = $this->session->userdata('ses_pelamar');
		$data['identitas']		= $this->m_pelamar->lihat_identitas($id);
		$this->load->view('pelamar/temp1',$data);
		$this->load->view('pelamar/v_newpengalamankerja');
		$this->load->view('pelamar/temp2');
	}

	public function gonewpertanyaan()
	{
		$id = $this->session->userdata('ses_pelamar');
		$data['identitas']		= $this->m_pelamar->lihat_identitas($id);
		$this->load->view('pelamar/temp1',$data);
		$this->load->view('pelamar/v_newpertanyaan');
		$this->load->view('pelamar/temp2');
	}

	public function simpan_identitas()
	{
		$data = array(
            'ID_PelamarIdentitas'	=> null,
			'ID_Pelamar'			=> $this->input->post('id'),
			'jenkel'				=> $this->input->post('jenkel'),
			'tempat_lahir'			=> $this->input->post('tempat_lahir'),
			'usia'					=> $this->input->post('usia'),
			'tgl_lahir_ktp'			=> $this->input->post('tgllahir'),
			'agama'					=> $this->input->post('agama'),
			'nohp'					=> $this->input->post('hp'),
			'status_kawin'			=> $this->input->post('kawin'),
			'kerja_ayah'			=> $this->input->post('ayah'),
			'kerja_ibu'				=> $this->input->post('ibu'),
        );
        
        if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload();
            $data['image'] = $image;
        }
        
        $this->m_pelamar->tambah_identitas($data);
        $this->session->set_flashdata('msg',
				'<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menyimpan Identitas
				</div>');
        redirect('pelamar/profil');
	}

	public function update_identitas()
	{
		$id = $this->input->post('id');

        $data = array(
			'jenkel'		=> $this->input->post('jenkel'),
			'tempat_lahir'	=> $this->input->post('tempat_lahir'),
			'tgl_lahir_ktp'	=> $this->input->post('tgllahir'),
			'usia'			=> $this->input->post('usia'),
			'agama'			=> $this->input->post('agama'),
			'nohp'			=> $this->input->post('hp'),
			'status_kawin'	=> $this->input->post('kawin'),
			'kerja_ayah'	=> $this->input->post('ayah'),
			'kerja_ibu'		=> $this->input->post('ibu')
			);

		$where = array(
			'ID_PelamarIdentitas' 		=> $id
			);

        $this->m_pelamar->update($where,$data,'lam_identitas');

		$this->session->set_flashdata('msg',
				'<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Mengubah
				</div>');
		redirect('pelamar/profil');
	}

	private function _do_upload()
    {
        $image_name = time().'-'.$_FILES["image"]['name'];

        $config['upload_path'] 		= 'assets/upload/images/';
        $config['allowed_types'] 	= 'gif|jpg|png|jpeg';
        $config['max_size'] 		= 2000;
        $config['max_widht'] 		= 800;
        $config['max_height']  		= 800;
        $config['file_name'] 		= $image_name;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('image')) {
            $this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Gagal Dalam Menyimpan, Karena Ukuran atau Kapasitas melebihi dari ketentutan
				</div>');
			
			redirect('pelamar/profil');
        }
        return $this->upload->data('file_name');
    }

	public function simpan_alamat()
	{
		if (isset($_POST)) {
			$this->m_pelamar->tambah_alamat();

			$this->session->set_flashdata('msg',
				'<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menyimpan
				</div>');
			
			redirect('pelamar/profil');
		}
		else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Gagal Dalam Penyimpanan
				</div>');
			
			redirect('pelamar/profil');
		}
	}

	public function simpan_pendidikan()
	{
		if (isset($_POST)) {
			$this->m_pelamar->tambah_pendidikan();

			$this->session->set_flashdata('msg',
				'<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menyimpan
				</div>');
			
			redirect('pelamar/profil');
		}
		else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Gagal Dalam Penyimpanan
				</div>');
			
			redirect('pelamar/profil');
		}
	}

	public function simpan_pengalaman_kerja()
	{
		if (isset($_POST)) {
			$this->m_pelamar->tambah_pengalaman_kerja();

			$this->session->set_flashdata('msg',
				'<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menyimpan
				</div>');
			
			redirect('pelamar/profil');
		}
		else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Gagal Dalam Penyimpanan
				</div>');
			
			redirect('pelamar/profil');
		}
	}

	public function simpan_ukuran()
	{
		if (isset($_POST)) {
			$this->m_pelamar->tambah_ukuran();

			$this->session->set_flashdata('msg',
				'<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menyimpan
				</div>');
			
			redirect('pelamar/profil');
		}
		else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Gagal Dalam Penyimpanan
				</div>');
			
			redirect('pelamar/profil');
		}
	}

	public function simpan_pertanyaan()
	{
		if (isset($_POST)) {
			$this->m_pelamar->tambah_pertanyaan();

			$this->session->set_flashdata('msg',
				'<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menyimpan
				</div>');
			
			redirect('pelamar/profil');
		}
		else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Gagal Dalam Penyimpanan
				</div>');
			
			redirect('pelamar/profil');
		}
	}

	public function getidentitas()
	{

		if (isset($_GET['us']) ) {
            $id = $_GET['us'];            
            $data['identitas'] = $this->m_pelamar->getidentitas($id);         
            $this->load->view('pelamar/temp1',$data);
            $this->load->view('pelamar/v_updateidentitas',$data);
            $this->load->view('pelamar/temp2');
        }else{
        	echo "no";
        }
	}

	public function getfotoprofile()
	{
		if (isset($_GET['us']) ) {
            $id = $_GET['us'];
            $data['identitas'] = $this->m_pelamar->getidentitas($id);         
            $this->load->view('pelamar/temp1',$data);
            $this->load->view('pelamar/v_updatefotoprofil',$data);
            $this->load->view('pelamar/temp2');
        }else{
        	echo "no";
        }
	}

	public function updatefoto()
	{

		if (!empty($_FILES['image']['name'])) {
            $image = $this->_do_upload();
            $data['image'] = $image;
        }
        $where = array(
			'ID_Pelamar'	=> $this->input->post('id')
			);

		$this->m_pelamar->update($where,$data,'lam_identitas');
		$this->session->set_flashdata('msg',
				'<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Mengubah Foto Profil
				</div>');
		redirect('pelamar/profil');
	}

	public function getalamat()
	{

		if (isset($_GET['us']) ) {
            $id = $_GET['us'];
            $ids = $this->session->userdata('ses_pelamar');
            $data['identitas'] = $this->m_pelamar->gettemp_pelamar($ids); 
            $data['alamat'] = $this->m_pelamar->getalamat($id);         
            $this->load->view('pelamar/temp1',$data);
            $this->load->view('pelamar/v_updatealamat',$data);
            $this->load->view('pelamar/temp2');
        }else{
        	echo "no";
        }
	}

	public function update_alamat()
	{
		$data = array(
			'alamat_ktp'		=> $this->input->post('alamat_ktp'),
			'rw_ktp'			=> $this->input->post('rw_ktp'),
			'rw_ktp'			=> $this->input->post('rw_ktp'),
			'kelurahan_ktp'		=> $this->input->post('kelurahan_ktp'),
			'kecamatan_ktp'		=> $this->input->post('kecamatan_ktp'),
			'kota_ktp'			=> $this->input->post('kota_ktp'),
			'kodepos_ktp'		=> $this->input->post('kodepos_ktp'),
			'alamat_domisili'	=> $this->input->post('alamat_domisili'),
			'rw_domisili'		=> $this->input->post('rw_domisili'),
			'rw_domisili'		=> $this->input->post('rw_domisili'),
			'kelurahan_domisili'=> $this->input->post('kelurahan_domisili'),
			'kecamatan_domisili'=> $this->input->post('kecamatan_domisili'),
			'kota_domisili'		=> $this->input->post('kota_domisili'),
			'kodepos_domisili'	=> $this->input->post('kodepos_domisili')
			);

		$where = array(
			'ID_PelamarAlamat'	=> $this->input->post('id')
			);

		$this->m_pelamar->update($where,$data,'lam_alamat');

		$this->session->set_flashdata('msg',
				'<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Mengubah
				</div>');
		redirect('pelamar/profil');
	}

	public function getukuran()
	{
		if (isset($_GET['us']) ) {
            $id = $_GET['us'];
            $ids = $this->session->userdata('ses_pelamar');
            $data['identitas'] = $this->m_pelamar->gettemp_pelamar($ids); 
            $data['ukuran'] = $this->m_pelamar->getukuran($id);         
            $this->load->view('pelamar/temp1',$data);
            $this->load->view('pelamar/v_updateukuran',$data);
            $this->load->view('pelamar/temp2');
        }else{
        	echo "no";
        }
	}

	public function update_ukuran()
	{
		$data = array(
			'tinggi_badan_cm'	=> $this->input->post('tinggi_cm'),
			'berat_badan_kg'	=> $this->input->post('berat_kg'),
			'ukuran_baju'		=> $this->input->post('baju'),
			'ukuran_sepatu_cm'	=> $this->input->post('sepatu')
			);

		$where = array(
			'ID_PelamarUkuran'	=> $this->input->post('id')
			);

		$this->m_pelamar->update($where,$data,'lam_ukuran');

		$this->session->set_flashdata('msg',
				'<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Mengubah
				</div>');
		redirect('pelamar/profil');
	}

	public function getpendidikan()
	{

		if (isset($_GET['us']) ) {
            $id = $_GET['us'];
            $ids = $this->session->userdata('ses_pelamar');
            $data['identitas'] = $this->m_pelamar->gettemp_pelamar($ids); 
            $data['pendidikan'] = $this->m_pelamar->getpendidikan($id);         
            $this->load->view('pelamar/temp1',$data);
            $this->load->view('pelamar/v_updatependidikan',$data);
            $this->load->view('pelamar/temp2');
        }else{
        	echo "no";
        }
	}

	public function update_pendidikan()
	{
		$data = array(
			'pendidikan'		=> $this->input->post('pendidikan'),
			'jurusan'			=> $this->input->post('jurusan'),
			'thn_masuk'			=> $this->input->post('masuk'),
			'thn_lulus'			=> $this->input->post('tahun'),
			'asal_pendidikan'	=> $this->input->post('asal_pendidikan'),
			'tempat_pendidikan'	=> $this->input->post('tempat_pendidikan')
			);

		$where = array(
			'ID_PelamarPendidikan'	=> $this->input->post('id')
			);

		$this->m_pelamar->update($where,$data,'lam_pendidikan');

		$this->session->set_flashdata('msg',
				'<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Mengubah
				</div>');
		redirect('pelamar/profil');
	}

	public function hapus_pendidikan()
    {
    	$id = $this->input->post('id');
        $this->m_pelamar->hapus_pendidikan($id);

        $this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menghapus
				</div>');
        redirect('pelamar/profil');

    }

	public function getpengalaman()
	{

		if (isset($_GET['us']) ) {
            $id = $_GET['us'];
            $ids = $this->session->userdata('ses_pelamar');
            $data['identitas'] = $this->m_pelamar->gettemp_pelamar($ids); 
            $data['pengalaman'] = $this->m_pelamar->getpengalaman($id);         
            $this->load->view('pelamar/temp1',$data);
            $this->load->view('pelamar/v_updatepengalamankerja',$data);
            $this->load->view('pelamar/temp2');
        }else{
        	echo "no";
        }
	}

	public function update_pengalaman()
	{
		$data = array(
			'peng_perusahaan'	=> $this->input->post('perusahaan'),
			'peng_bidang'		=> $this->input->post('bidang'),
			'peng_tahun'		=> $this->input->post('tahun')
			);

		$where = array(
			'ID_PelamarPengalaman'	=> $this->input->post('id')
			);

		$this->m_pelamar->update($where,$data,'lam_pengalamankerja');

		$this->session->set_flashdata('msg',
				'<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Mengubah
				</div>');
		redirect('pelamar/profil');
	}

	public function hapus_pengalaman()
    {
    	$id = $this->input->post('id');
        $this->m_pelamar->hapus_pengalaman($id);

        $this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menghapus
				</div>');
        redirect('pelamar/profil');

    }

    public function getpertanyaan()
    {
    	if (isset($_GET['us']) ) {
            $id = $_GET['us'];
            $ids = $this->session->userdata('ses_pelamar');
            $data['identitas'] = $this->m_pelamar->gettemp_pelamar($ids); 
            $data['pertanyaan'] = $this->m_pelamar->getpertanyaan($id);         
            $this->load->view('pelamar/temp1',$data);
            $this->load->view('pelamar/v_updatepertanyaan',$data);
            $this->load->view('pelamar/temp2');
        }else{
        	echo "no";
        }
    }

    public function update_pertanyaan()
    {   
    	$id_tanya 	= $this->input->post("idtanya");
    	$id 		= $this->input->post("id");
    	$kaca_mata 	= $this->input->post("kacamata");

		$data = array(
			'ID_PelamarPertanyaan'	=> $id_tanya,
			'jwb_kacamata'			=> $kaca_mata,
			'jwb_rokok'				=> $this->input->post("rokok"),
			'jwb_sim'				=> $this->input->post("sim"),
			'jwb_celaka_kerja'		=> $this->input->post("celaka_kerja"),
			'jwb_celaka_lalin'		=> $this->input->post("celaka_lalin"),
			'jwb_patah_tulang'		=> $this->input->post("patah_tulang"),
			'jwb_pernah_kerja'		=> $this->input->post("pernah_kerja"),
			'jwb_nikah_tahun'		=> $this->input->post("nikah"),
			'jwb_shift'				=> $this->input->post("shift"),
			'jwb_kerja'				=> $this->input->post("kerja"),
			'jwb_nikah_kontrak'		=> $this->input->post("nikah_kontrak"),
			'jwb_kuliah'			=> $this->input->post("kuliah"),
			'jwb_area'				=> $this->input->post("area"),
			'jwb_no_rokok'			=> $this->input->post("no_rokok")
			);

		$where = array(
			'ID_Pelamar' 			=> $id
			);

		$this->m_pelamar->update($where,$data,'lam_pertanyaan');

		if ($kaca_mata == 1) {
			
			$datas = array(
				'ID_PelamarKacamata'=> $id_tanya,
				'kaca_kiri'			=> $this->input->post("kiri"),
				'kaca_kanan'		=> $this->input->post("kanan")
				);

			$wheres = array(
			'ID_Pelamar' 			=> $id
			);

			$this->m_pelamar->update($wheres,$datas,'lam_kacamata');
		}else{
			$datas = array(
				'ID_PelamarKacamata'=> $id_tanya,
				'kaca_kiri'			=> null,
				'kaca_kanan'		=> null
				);

			$wheres = array(
			'ID_Pelamar' 			=> $id
			);

			$this->m_pelamar->update($wheres,$datas,'lam_kacamata');
		}

		$this->session->set_flashdata('msg',
				'<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Mengubah
				</div>');
		redirect('pelamar/profil');
    }

    public function loker()
    {
    		$id = $this->session->userdata('ses_pelamar');
    		$this->db->where('ID_Pelamar', $id);
			$query1 = $this->db->get('lam_identitas');

			if ($query1->num_rows() > 0) {
				//sudah isi
				
				$this->db->where('ID_Pelamar', $id);
				$query2 = $this->db->get('lam_alamat');

				if ($query2->num_rows() > 0) {
					//sudah isi	
					
					$this->db->where('ID_Pelamar', $id);
					$query3 = $this->db->get('lam_pendidikan');

					if ($query3->num_rows() > 0) {
						//sudah isi

						$this->db->where('ID_Pelamar', $id);
						$query4 = $this->db->get('lam_pengalamankerja');

						if ($query4->num_rows() > 0) {
							//sudah isi

							$this->db->where('ID_Pelamar', $id);
							$query5 = $this->db->get('lam_ukuran');

							if ($query5->num_rows() > 0) {
								//sudah isi	

								$this->db->where('ID_Pelamar', $id);
								$query6 = $this->db->get('lam_pertanyaan');

								if ($query6->num_rows() > 0) {
									//sudah isi
									$id = $this->session->userdata('ses_pelamar');
									$data['identitas']		= $this->m_pelamar->lihat_identitas($id);
							    	$data['status']			= $this->m_admin->model_status();
							    	$data['loker']			= $this->m_pelamar->tampil_loker();
							    	$this->load->view('pelamar/temp1',$data);
									$this->load->view('pelamar/loker',$data);
									$this->load->view('pelamar/temp2');			
								}else{
									//belum isi
									$id = $this->session->userdata('ses_pelamar');
									$data['identitas']		= $this->m_pelamar->lihat_identitas($id);
							    	$data['status']			= $this->m_admin->model_status();
							    	$data['loker']			= $this->m_pelamar->tampil_loker();
							    	$this->load->view('pelamar/temp1',$data);
									$this->load->view('pelamar/no_loker',$data);
									$this->load->view('pelamar/temp2');	
								}		
							}else{
								//belum isi
								$id = $this->session->userdata('ses_pelamar');
								$data['identitas']		= $this->m_pelamar->lihat_identitas($id);
							    $data['status']			= $this->m_admin->model_status();
							    $data['loker']			= $this->m_pelamar->tampil_loker();
							    $this->load->view('pelamar/temp1',$data);
								$this->load->view('pelamar/no_loker',$data);
								$this->load->view('pelamar/temp2');
							}

									
						}else{
							//belum isi
							$id = $this->session->userdata('ses_pelamar');
							$data['identitas']		= $this->m_pelamar->lihat_identitas($id);
							$data['status']			= $this->m_admin->model_status();
							$data['loker']			= $this->m_pelamar->tampil_loker();
							$this->load->view('pelamar/temp1',$data);
							$this->load->view('pelamar/no_loker',$data);
							$this->load->view('pelamar/temp2');
						}

						
									
					}else{
						//tidak isi
							$id = $this->session->userdata('ses_pelamar');
							$data['identitas']		= $this->m_pelamar->lihat_identitas($id);
							$data['status']			= $this->m_admin->model_status();
							$data['loker']			= $this->m_pelamar->tampil_loker();
							$this->load->view('pelamar/temp1',$data);
							$this->load->view('pelamar/no_loker',$data);
							$this->load->view('pelamar/temp2');
					}

					
				}else{
					//tidak isi
					$id = $this->session->userdata('ses_pelamar');
					$data['identitas']		= $this->m_pelamar->lihat_identitas($id);
					$data['status']			= $this->m_admin->model_status();
					$data['loker']			= $this->m_pelamar->tampil_loker();
					$this->load->view('pelamar/temp1',$data);
					$this->load->view('pelamar/no_loker',$data);
					$this->load->view('pelamar/temp2');
				}
				
			}else{
				//tidak isi
				$id = $this->session->userdata('ses_pelamar');
				$data['identitas']		= $this->m_pelamar->lihat_identitas($id);
				$data['status']			= $this->m_admin->model_status();
				$data['loker']			= $this->m_pelamar->tampil_loker();
				$this->load->view('pelamar/temp1',$data);
				$this->load->view('pelamar/no_loker',$data);
				$this->load->view('pelamar/temp2');
			}

			

    	
    }

    public function simpan_lamaran()
    {
    	$pelamar 	= $this->input->post('id_pelamar');
		$loker 		= $this->input->post('id_loker');

		$this->db->where('ID_Pelamar', $pelamar);
		$this->db->where('ID_Loker', $loker);
		$query = $this->db->get('join_lamar');

		$query1 = $this->db->get('lam_identitas');
		$query2 = $this->db->get('lam_alamat');
		$query3 = $this->db->get('lam_ukuran');
		$query4 = $this->db->get('lam_pengalamankerja');
		$query5 = $this->db->get('lam_pertanyaan');


		if ($query1->num_rows() > 0) {
			if ($query->num_rows() > 0) {

			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Sudah Melamar di Loker ini
				</div>');
			
			redirect('pelamar/loker');

		}else{

			if (isset($_POST)) {
			$this->m_pelamar->tambah_lamaran();

			$this->session->set_flashdata('msg',
				'<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Melamar
				</div>');
			
			redirect('pelamar');
			}
			else{
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Gagal Dalam Melamar
					</div>');
				
				redirect('pelamar/loker');
		}			
		}
		}elseif ($query2->num_rows() > 0) {
			if ($query->num_rows() > 0) {

			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Sudah Melamar di Loker ini
				</div>');
			
			redirect('pelamar/loker');

		}else{

			if (isset($_POST)) {
			$this->m_pelamar->tambah_lamaran();

			$this->session->set_flashdata('msg',
				'<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Melamar
				</div>');
			
			redirect('pelamar');
			}
			else{
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Gagal Dalam Melamar
					</div>');
				
				redirect('pelamar/loker');
		}			
		}
		}elseif ($query3->num_rows() > 0) {
			if ($query->num_rows() > 0) {

			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Sudah Melamar di Loker ini
				</div>');
			
			redirect('pelamar/loker');

		}else{

			if (isset($_POST)) {
			$this->m_pelamar->tambah_lamaran();

			$this->session->set_flashdata('msg',
				'<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Melamar
				</div>');
			
			redirect('pelamar');
			}
			else{
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Gagal Dalam Melamar
					</div>');
				
				redirect('pelamar/loker');
		}			
		}		
		}elseif ($query4->num_rows() > 0) {
			if ($query->num_rows() > 0) {

			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Sudah Melamar di Loker ini
				</div>');
			
			redirect('pelamar/loker');

		}else{

			if (isset($_POST)) {
			$this->m_pelamar->tambah_lamaran();

			$this->session->set_flashdata('msg',
				'<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Melamar
				</div>');
			
			redirect('pelamar');
			}
			else{
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Gagal Dalam Melamar
					</div>');
				
				redirect('pelamar/loker');
		}			
		}
		}elseif ($query5->num_rows() > 0) {
			if ($query->num_rows() > 0) {

			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Sudah Melamar di Loker ini
				</div>');
			
			redirect('pelamar/loker');

		}else{

			if (isset($_POST)) {
			$this->m_pelamar->tambah_lamaran();

			$this->session->set_flashdata('msg',
				'<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Melamar
				</div>');
			
			redirect('pelamar');
			}
			else{
				$this->session->set_flashdata('msg',
					'<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Gagal Dalam Melamar
					</div>');
				
				redirect('pelamar/loker');
		}			
		}
		}
		else{
			$this->session->set_flashdata('msg',
					'<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Gagal Dalam Melamar,Karena belum melengkapi identitas
					</div>');
				
				redirect('pelamar/loker');
		}		    	
    }

    //status karyawan

    public function gonewkepesertaan()
    {
    	$id = $this->session->userdata('ses_pelamar');
		$data['identitas']		= $this->m_pelamar->lihat_identitas($id);
		$data['status'] 		= $this->m_admin->model_status();
		$data['tracking'] 		= $this->m_pelamar->lihat_status_lamaran($id);
		$this->load->view('pelamar/temp1',$data);
		$this->load->view('pelamar/v_newkepesertaan',$data);
		$this->load->view('pelamar/temp2');
    }

    public function simpan_kepesertaan()
    {
    	if (isset($_POST)) {
			$this->m_pelamar->tambah_kepesertaan();

			$this->session->set_flashdata('msg',
				'<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menyimpan
				</div>');
			
			redirect('pelamar/tampil_kelengkapan');
		}
		else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Gagal Dalam Penyimpanan
				</div>');
			
			redirect('pelamar/tampil_kelengkapan');
		}
    }

    public function getkepesertaan()
    {
    	if (isset($_GET['us']) ) {
            $ids = $_GET['us'];
            
            $id = $this->session->userdata('ses_pelamar');

			$data['identitas']		= $this->m_pelamar->lihat_identitas($id);
			$data['status'] 		= $this->m_admin->model_status();
            $data['peserta'] 		= $this->m_pelamar->getkepesertaan($ids); 

            $this->load->view('pelamar/temp1',$data);
            $this->load->view('pelamar/v_updatekepesertaan',$data);
            $this->load->view('pelamar/temp2');
        }else{
        	echo "no";
        }
    }

    public function update_kepesertaan()
    {
    	$data = array(
			'ID_Pelamar'		=> $this->input->post('id_pelamar'),
			'NO_BPJS_Kes'		=> $this->input->post('bpjs_kesehatan'),
			'NO_BPJS_Kerja'		=> $this->input->post('bpjs_kerja'),
			'NO_NPWP'			=> $this->input->post('npwp')
			);

		$where = array(
			'ID_Kepesertaan'	=> $this->input->post('id')
			);

		$this->m_pelamar->update($where,$data,'karyawan_kepesertaan');

		$this->session->set_flashdata('msg',
				'<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Mengubah
				</div>');
		redirect('pelamar/tampil_kelengkapan');
    }

    public function gonewsim()
    {
    	$id = $this->session->userdata('ses_pelamar');
    	$data['pertanyaan']		= $this->m_pelamar->lihat_pertanyaan($id);
		$data['identitas']		= $this->m_pelamar->lihat_identitas($id);
		$data['status'] 		= $this->m_admin->model_status();
		$data['tracking'] 		= $this->m_pelamar->lihat_status_lamaran($id);
		$this->load->view('pelamar/temp1',$data);
		$this->load->view('pelamar/v_newsim',$data);
		$this->load->view('pelamar/temp2');
    }

    public function simpan_sim()
    {
    	if (isset($_POST)) {
			$this->m_pelamar->tambah_sim();

			$this->session->set_flashdata('msg',
				'<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menyimpan
				</div>');
			
			redirect('pelamar/tampil_kelengkapan');
		}
		else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Gagal Dalam Penyimpanan
				</div>');
			
			redirect('pelamar/tampil_kelengkapan');
		}
    }

    public function getsim()
    {
    	if (isset($_GET['us']) ) {
            $ids = $_GET['us'];

            $id = $this->session->userdata('ses_pelamar');

            $data['pertanyaan']		= $this->m_pelamar->lihat_pertanyaan($id);
			$data['identitas']		= $this->m_pelamar->lihat_identitas($id);
			$data['status'] 		= $this->m_admin->model_status();
            $data['sim'] 			= $this->m_pelamar->getsim($ids);   

            $this->load->view('pelamar/temp1',$data);
            $this->load->view('pelamar/v_updatesim',$data);
            $this->load->view('pelamar/temp2');
        }else{
        	echo "no";
        }
    }

    public function update_sim()
    {
    	$data = array(
			'ID_Pelamar'	=> $this->input->post('id_pelamar'),
			'NO_SIM'		=> $this->input->post('no_sim')
			);

		$where = array(
			'ID_SIM'	=> $this->input->post('id')
			);

		$this->m_pelamar->update($where,$data,'karyawan_sim');

		$this->session->set_flashdata('msg',
				'<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Mengubah
				</div>');
		redirect('pelamar/tampil_kelengkapan');
    }

    public function getarea()
    {
    	if (isset($_GET['us']) ) {
            $id = $_GET['us'];
            $data['area'] = $this->m_pelamar->getarea($id);         
            $this->load->view('pelamar/temp1');
            $this->load->view('pelamar/v_updatearea',$data);
            $this->load->view('pelamar/temp2');
        }else{
        	echo "no";
        }
    }

    public function simpan_area()
    {
    	if (isset($_POST)) {
			$this->m_pelamar->tambah_agama();

			$this->session->set_flashdata('msg',
				'<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menyimpan
				</div>');
			
			redirect('pelamar');
		}
		else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Gagal Dalam Penyimpanan
				</div>');
			
			redirect('pelamar');
		}
    }

    public function gonewkeluarga()
    {
    	$id = $this->session->userdata('ses_pelamar');
		$data['identitas']		= $this->m_pelamar->lihat_identitas($id);
		$data['status'] 		= $this->m_admin->model_status();
		$data['tracking'] 		= $this->m_pelamar->lihat_status_lamaran($id);
		$this->load->view('pelamar/temp1',$data);
		$this->load->view('pelamar/v_newkeluarga',$data);
		$this->load->view('pelamar/temp2');
    }

    public function simpan_keluarga()
    {
    	if (isset($_POST)) {
			$this->m_pelamar->tambah_keluarga();

			$this->session->set_flashdata('msg',
				'<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menyimpan
				</div>');
			
			redirect('pelamar/tampil_kelengkapan');
		}
		else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Gagal Dalam Penyimpanan
				</div>');
			
			redirect('pelamar/tampil_kelengkapan');
		}
    }

    public function getkeluarga()
    {
    	if (isset($_GET['us']) ) {
            $ids = $_GET['us'];
            $id = $this->session->userdata('ses_pelamar');

            $data['pertanyaan']		= $this->m_pelamar->lihat_pertanyaan($id);
			$data['identitas']		= $this->m_pelamar->lihat_identitas($id);
			$data['status'] 		= $this->m_admin->model_status();
            $data['sim'] 			= $this->m_pelamar->getsim($ids); 
            $data['keluarga'] 		= $this->m_pelamar->getkeluarga($ids);         
            $this->load->view('pelamar/temp1',$data);
            $this->load->view('pelamar/v_updatekeluarga',$data);
            $this->load->view('pelamar/temp2');
        }else{
        	echo "no";
        }
    }

    public function update_keluarga()
    {
    	$data = array(
			'ID_Pelamar'			=> $this->input->post('id_pelamar'),
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

		$where = array(
			'ID_Keluarga'		=> $this->input->post('id')
			);

		$this->m_pelamar->update($where,$data,'karyawan_keluarga');

		$this->session->set_flashdata('msg',
				'<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Mengubah
				</div>');
		redirect('pelamar/tampil_kelengkapan');
    }

    public function gonewdarurat()
    {
    	$id = $this->session->userdata('ses_pelamar');
		$data['identitas']	= $this->m_pelamar->lihat_identitas($id);
		$this->load->view('pelamar/temp1',$data);
		$this->load->view('pelamar/v_newdarurat');
		$this->load->view('pelamar/temp2');
    }

    public function simpan_darurat()
    {
    	if (isset($_POST)) {
			$this->m_pelamar->tambah_darurat();

			$this->session->set_flashdata('msg',
				'<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menyimpan
				</div>');
			
			redirect('pelamar/tampil_kelengkapan');
		}
		else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Gagal Dalam Penyimpanan
				</div>');
			
			redirect('pelamar/tampil_kelengkapan');
		}
    }

    public function getdarurat()
    {
    	if (isset($_GET['us']) ) {
            $ids = $_GET['us'];
            $id = $this->session->userdata('ses_pelamar');
			$data['identitas']	= $this->m_pelamar->lihat_identitas($id);
            $data['darurat'] = $this->m_pelamar->getdarurat($ids);         
            $this->load->view('pelamar/temp1',$data);
            $this->load->view('pelamar/v_updatedarurat',$data);
            $this->load->view('pelamar/temp2');
        }else{
        	echo "no";
        }
    }

    public function update_darurat()
    {
    	$data = array(
			'ID_Pelamar'		=> $this->input->post('id_pelamar'),
			'nama_Darurat'		=> $this->input->post('nama'),
			'telp_Darurat'		=> $this->input->post('telp'),
			'hubungan_Darurat'	=> $this->input->post('hubungan')
			);

		$where = array(
			'ID_Darurat'		=> $this->input->post('id')
			);

		$this->m_pelamar->update($where,$data,'karyawan_darurat');

		$this->session->set_flashdata('msg',
				'<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Mengubah
				</div>');
		redirect('pelamar/tampil_kelengkapan');
    }

    public function hapus_darurat()
    {
    	$id = $this->input->post('id');
        $this->m_pelamar->hapus_darurat($id);

        $this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menghapus
				</div>');
        redirect('pelamar/tampil_kelengkapan');
    }

    public function simpan_status_pindah()
    {
    	if (isset($_POST)) {
			$this->m_pelamar->tambah_status_pindah();

			$this->session->set_flashdata('msg',
				'<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menyimpan
				</div>');
			
			redirect('pelamar');
		}
		else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Gagal Dalam Penyimpanan
				</div>');
			
			redirect('pelamar');
		}
    }

    public function tampil_kelengkapan()
    {
    	$user = $this->session->userdata('ses_pelamar');
		if ($user == "") {
			$this->load->view('login/temp_login');
			$this->load->view('login/v_login_pelamar');
		}else{

			$id = $this->session->userdata('ses_pelamar');

			$this->db->where('ID_Pelamar', $id);
			$query1 = $this->db->get('karyawan_kepesertaan');

			if ($query1->num_rows() > 0) {
				$row = $query1->row();
				$data = array(
					'ses_kepesertaan'	=> '1',
					);
				$this->session->set_userdata($data);			
			}else{
				$data = array(
					'ses_kepesertaan'	=> '0',
					);
				$this->session->set_userdata($data);
			}


			$this->db->where('ID_Pelamar', $id);
			$query2 = $this->db->get('karyawan_sim');

			if ($query2->num_rows() > 0) {
				$row = $query2->row();
				$data = array(
					'ses_sim'	=> '1',
					);
				$this->session->set_userdata($data);			
			}else{
				$data = array(
					'ses_sim'	=> '0',
					);
				$this->session->set_userdata($data);
			}


			$this->db->where('ID_Pelamar', $id);
			$query3 = $this->db->get('karyawan_keluarga');

			if ($query3->num_rows() > 0) {
				$row = $query3->row();
				$data = array(
					'ses_keluarga'	=> '1',
					);
				$this->session->set_userdata($data);			
			}else{
				$data = array(
					'ses_keluarga'	=> '0',
					);
				$this->session->set_userdata($data);
			}


			$this->db->where('ID_Pelamar', $id);
			$query4 = $this->db->get('karyawan_darurat');

			if ($query4->num_rows() > 0) {
				$row = $query4->row();
				$data = array(
					'ses_darurat'	=> '1',
					);
				$this->session->set_userdata($data);			
			}else{
				$data = array(
					'ses_darurat'	=> '0',
					);
				$this->session->set_userdata($data);
			}			

			$data['pertanyaan']		= $this->m_pelamar->lihat_pertanyaan($id);
			$data['identitas']		= $this->m_pelamar->lihat_identitas($id);
			$data['kepesertaan']	= $this->m_pelamar->lihat_kepesertaan($id);
			$data['keluarga']		= $this->m_pelamar->lihat_keluarga($id);
			$data['sim']			= $this->m_pelamar->lihat_sim($id);
			$data['darurat']		= $this->m_pelamar->lihat_darurat($id);
			$data['status'] 		= $this->m_admin->model_status();
			$data['tracking'] 		= $this->m_pelamar->lihat_status_lamaran($id);			
			$this->load->view('pelamar/temp1',$data);
			$this->load->view('pelamar/v_kelengkapan_data',$data);
			$this->load->view('pelamar/temp2');
		}
    }
}

 ?>