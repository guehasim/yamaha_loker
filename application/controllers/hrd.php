<?php 

class hrd extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->model('admin/m_admin');
		$this->load->model('admin/m_loker');
		$this->load->model('admin/m_pelamar');
	}

	//start Menu admin
	
	public function index()
	{
		$user = $this->session->userdata('ses_admin');
		if ($user == "") {
			$this->load->view('login/v_loginadmin');
		}else{
			$this->load->view('admin/temp1_admin');
			$this->load->view('admin/v_dasboard');
			$this->load->view('admin/temp2_admin');
		}
	}

	public function data_admin()
	{
		$data['admin'] = $this->m_admin->lihat_admin();
		$this->load->view('admin/temp1_admin');
		$this->load->view('admin/admin/v_admin', $data);
		$this->load->view('admin/temp2_admin');
	}

	public function new_admin()
	{
		$this->load->view('admin/temp1_admin');
		$this->load->view('admin/admin/v_newadmin');
		$this->load->view('admin/temp2_admin');
	}

	public function tambah_admin()
	{
		if (isset($_POST)) {
			$this->m_admin->tambah_data();

			$this->session->set_flashdata('msg',
				'<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menyimpan
				</div>');
			
			redirect('admin/data_admin');
		}
		else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Gagal Dalam Penyimpanan
				</div>');
			
			redirect('admin/data_admin');
		}
	}

	public function get_admin()
	{
		if (isset($_GET['us']) ) {
            $id = $_GET['us'];
            $data['admin'] = $this->m_admin->getdata($id);         
            $this->load->view('admin/temp1_admin');
            $this->load->view('admin/admin/v_updateadmin',$data);
            $this->load->view('admin/temp2_admin');
        }else{
        	echo "no";
        }
	}

	public function update_admin()
	{
		$id 	= $this->input->post('id');
		$user 	= $this->input->post('user');
		$pass 	= $this->input->post('pass');
		$status = $this->input->post('status');

		$data = array(
			'User'			=> $user,
			'Pass'			=> base64_encode($pass),
			'Status_User'	=> $status
			);

		$where = array(
			'ID_User' 		=> $id
			);

		$this->m_admin->update($where,$data,'m_user');

		$this->session->set_flashdata('msg',
				'<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Mengubah
				</div>');
		redirect('admin/data_admin');
	}

	public function hapus_admin()
    {
    	$id = $this->input->post('id');
        $this->m_admin->hapus_data($id);

        $this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menghapus
				</div>');
        redirect('admin/data_admin');
    }

    //End Menu Admin

    //start Menu HRD

    public function data_hrd()
	{
		$data['hrd'] = $this->m_admin->lihat_hrd();
		$this->load->view('admin/temp1_admin');
		$this->load->view('admin/hrd/v_hrd', $data);
		$this->load->view('admin/temp2_admin');
	}

	public function new_hrd()
	{
		$this->load->view('admin/temp1_admin');
		$this->load->view('admin/hrd/v_newhrd');
		$this->load->view('admin/temp2_admin');
	}

	public function tambah_hrd()
	{
		if (isset($_POST)) {
			$this->m_admin->tambah_data();

			$this->session->set_flashdata('msg',
				'<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menyimpan
				</div>');
			
			redirect('admin/data_hrd');
		}
		else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Gagal Dalam Penyimpanan
				</div>');
			
			redirect('admin/data_hrd');
		}
	}

	public function get_hrd()
	{
		if (isset($_GET['us']) ) {
            $id = $_GET['us'];
            $data['hrd'] = $this->m_admin->getdata($id);         
            $this->load->view('admin/temp1_admin');
            $this->load->view('admin/hrd/v_updatehrd',$data);
            $this->load->view('admin/temp2_admin');
        }else{
        	echo "no";
        }
	}

	public function update_hrd()
	{
		$id 	= $this->input->post('id');
		$user 	= $this->input->post('user');
		$pass 	= $this->input->post('pass');
		$status = $this->input->post('status');

		$data = array(
			'User'			=> $user,
			'Pass'			=> base64_encode($pass),
			'Status_User'	=> $status
			);

		$where = array(
			'ID_User' 		=> $id
			);

		$this->m_admin->update($where,$data,'m_user');

		$this->session->set_flashdata('msg',
				'<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Mengubah
				</div>');
		redirect('admin/data_hrd');
	}

	public function hapus_hrd()
    {
    	$id = $this->input->post('id');
        $this->m_admin->hapus_data($id);

        $this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menghapus
				</div>');
        redirect('admin/data_hrd');
    }

    //end Menu HRD

	//start Menu Loker

	public function data_loker()
	{
		$data['loker'] = $this->m_loker->lihat_loker();
		$this->load->view('admin/temp1_admin');
		$this->load->view('admin/loker/v_loker', $data);
		$this->load->view('admin/temp2_admin');
	}

	public function new_loker()
	{
		$this->load->view('admin/temp1_admin');
		$this->load->view('admin/loker/v_newloker');
		$this->load->view('admin/temp2_admin');
	}

	public function tambah_loker()
	{
		if (isset($_POST)) {
			$this->m_loker->tambah_loker();

			$this->session->set_flashdata('msg',
				'<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menyimpan
				</div>');
			
			redirect('admin/data_loker');
		}
		else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Gagal Dalam Penyimpanan
				</div>');
			
			redirect('admin/data_loker');
		}
	}

	public function get_loker()
	{
		if (isset($_GET['us']) ) {
            $id = $_GET['us'];
            $data['loker'] = $this->m_loker->getloker($id);         
            $this->load->view('admin/temp1_admin');
            $this->load->view('admin/loker/v_updateloker',$data);
            $this->load->view('admin/temp2_admin');
        }else{
        	echo "no";
        }
	}

	public function update_loker()
	{
		$id 		= $this->input->post('id');
		$nama 		= $this->input->post('nama');
		$tgl_start	= $this->input->post('tgl_start');
		$tgl_end 	= $this->input->post('tgl_end');
		$status 	= $this->input->post('status');

		$data = array(
			'lok_nama'		=> $nama,
			'lok_tgl_awal'	=> $tgl_start,
			'lok_tgl_akhir'	=> $tgl_end,
			'lok_status'	=> $status
			);

		$where = array(
			'ID_Loker' 		=> $id
			);

		$this->m_loker->update($where,$data,'m_loker');

		$this->session->set_flashdata('msg',
				'<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Mengubah
				</div>');
		redirect('admin/data_loker');
	}

	public function hapus_loker()
    {
    	$id = $this->input->post('id');
        $this->m_loker->hapus_loker($id);

        $this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menghapus
				</div>');
        redirect('admin/data_loker');
    }

	//End Menu Loker

	//Start List Pelamar
	public function data_pelamar()
	{
		$data['pelamar'] = $this->m_pelamar->tampil_data();
		$this->load->view('admin/temp1_admin');
		$this->load->view('admin/pelamar/v_pelamar', $data);
		$this->load->view('admin/temp2_admin');
	}

	public function get_pelamar()
	{
		if (isset($_GET['us']) ) {
            $id = $_GET['us'];
            $data['pelamar'] = $this->m_pelamar->getdata($id);         
            $this->load->view('admin/temp1_admin');
            $this->load->view('admin/pelamar/v_updatepelamar',$data);
            $this->load->view('admin/temp2_admin');
        }else{
        	echo "no";
        }
	}

	public function update_pelamar()
	{
		$data1 = array(
			'nik_ktp'		=> $this->input->post('nik'),
			'user'			=> $this->input->post('user'),
			'email'			=> $this->input->post('email'),
			'pass'			=> base64_encode($this->input->post('pass'))
			);

		$where1 = array(
			'ID_Pelamar'	=> $this->input->post('id')
			);

		$data2 = array(
			'nama_ktp'		=> $this->input->post('nama'),
			'jenkel'		=> $this->input->post('jenkel'),
			'tgl_lahir_ktp'	=> $this->input->post('tgllahir'),
			'usia'			=> $this->input->post('usia'),
			'nohp'			=> $this->input->post('hp'),
			'status_kawin'	=> $this->input->post('kawin'),
			'kerja_ayah'	=> $this->input->post('ayah'),
			'kerja_ibu'		=> $this->input->post('ibu')
			);

		$where2 = array(
			'ID_Pelamar'	=> $this->input->post('id')
			);

		$this->m_pelamar->update($where1,$data1,'m_pelamar');
		$this->m_pelamar->update($where2,$data2,'lam_identitas');

		$this->session->set_flashdata('msg',
				'<div class="alert alert-info alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Mengubah
				</div>');
		redirect('admin/data_pelamar');
	}

	public function hapus_pelamar()
    {
    	$id = $this->input->post('id');
        $this->m_loker->hapus_loker($id);

        $this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menghapus
				</div>');
        redirect('admin/data_loker');
    }
	//End List Pelamar

	public function log_admin()
	{

		$user = $this->input->post('user');
		$pass = base64_encode($this->input->post('pass'));

		$this->db->where('User', $user);
		$this->db->where('Pass', $pass);
		$query = $this->db->get('m_user');

		if ($query->num_rows() > 0) {
			$row = $query->row();
			$data = array(
				'ses_admin' 	=> $row->ID_User,
				'ses_user'		=> $user,
				'ses_status'	=> $row->Status_User,
				);
			$this->session->set_userdata($data);

			if ($this->session->userdata('ses_status') == 1) {
				redirect('admin');
			}elseif($this->session->userdata('ses_status') == 2){
				redirect('hrd');
			}
		}else{
			echo "tidak bisa login";
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('ses_admin');
		session_destroy();

		redirect('admin');
	}		
}
 ?>