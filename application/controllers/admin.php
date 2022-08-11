<?php

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx; 

class admin extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->library('session');
		$this->load->library('pdf');
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
			$data['admin']						= $this->m_admin->total_admin();
			$data['hrd']						= $this->m_admin->total_hrd();
			$data['pelamar']					= $this->m_admin->total_pelamar();
			$data['loker']						= $this->m_admin->total_loker();
			$data['hitung_pelamar']				= $this->m_admin->total_pelamar_join();
			$data['hitung_administrasi']		= $this->m_admin->total_pelamar_administrasi();
			$data['hitung_interview']			= $this->m_admin->total_pelamar_interview();
			$data['hitung_psikotes']			= $this->m_admin->total_pelamar_psikotes();
			$data['hitung_mcu']					= $this->m_admin->total_pelamar_mcu();
			$data['hitung_interview_lanjutan']	= $this->m_admin->total_pelamar_interview_lanjut();
			$data['hitung_hire']				= $this->m_admin->total_pelamar_hire();
			$data['status'] 					= $this->m_admin->model_status();
			if ($this->session->userdata('ses_status') == 1)
			{				
				$this->load->view('admin/temp1_admin',$data);
			}else{
				$this->load->view('admin/temp1_hrd',$data);
			}

			$this->load->view('admin/v_dasboard',$data);
			$this->load->view('admin/temp2_admin');
		}
	}

	public function data_admin()
	{
		$user = $this->session->userdata('ses_admin');
		if ($user == "") {
			$this->load->view('login/v_loginadmin');
		}else{
			$data['status'] = $this->m_admin->model_status();
			$data['admin'] = $this->m_admin->lihat_admin();
			$this->load->view('admin/temp1_admin',$data);
			$this->load->view('admin/admin/v_admin',$data);
			$this->load->view('admin/temp2_admin');	
		}
	}

	public function new_admin()
	{
		$user = $this->session->userdata('ses_admin');
		if ($user == "") {
			$this->load->view('login/v_loginadmin');
		}else{
			$data['status'] = $this->m_admin->model_status();
			$this->load->view('admin/temp1_admin',$data);
			$this->load->view('admin/admin/v_newadmin');
			$this->load->view('admin/temp2_admin');
		}		
	}

	public function tambah_admin()
	{
		$user = $this->session->userdata('ses_admin');
		if ($user == "") {
			$this->load->view('login/v_loginadmin');
		}else{

			$user = $this->input->post('user');

			$this->db->where('User', $user);
			$query = $this->db->get('m_user');

			if ($query->num_rows() > 0) {
				$this->session->set_flashdata('msg',
						'<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                                Gagal Dalam Mendaftar Username ini sudah ada jadi Admin / HRD
						</div>');
			
				redirect('admin/data_admin');
			}else{
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
		}		
	}

	public function get_admin()
	{
		$user = $this->session->userdata('ses_admin');
		if ($user == "") {
			$this->load->view('login/v_loginadmin');
		}else{
			if (isset($_GET['us']) ) {
	            $id = $_GET['us'];
	            $data['status'] = $this->m_admin->model_status();
	            $data['admin'] = $this->m_admin->getdata($id);         
	            $this->load->view('admin/temp1_admin',$data);
	            $this->load->view('admin/admin/v_updateadmin',$data);
	            $this->load->view('admin/temp2_admin');
	        }else{
	        	echo "no";
	        }
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
		$user = $this->session->userdata('ses_admin');
		if ($user == "") {
			$this->load->view('login/v_loginadmin');
		}else{
			if ($this->session->userdata('ses_status') == 1)
			{
				$data['status'] = $this->m_admin->model_status();
				$data['hrd'] = $this->m_admin->lihat_hrd();
				$this->load->view('admin/temp1_admin',$data);
				$this->load->view('admin/hrd/v_hrd', $data);
				$this->load->view('admin/temp2_admin');
			}else{
				$data['status'] = $this->m_admin->model_status();
				$data['hrd'] = $this->m_admin->lihat_hrd();
				$this->load->view('admin/temp1_hrd',$data);
				$this->load->view('admin/hrd/v_hrd', $data);
				$this->load->view('admin/temp2_hrd');
			}
			
		}		
	}

	public function new_hrd()
	{
		$user = $this->session->userdata('ses_admin');
		if ($user == "") {
			$this->load->view('login/v_loginadmin');
		}else{
			if ($this->session->userdata('ses_status') == 1)
			{
				$data['status'] = $this->m_admin->model_status();
				$this->load->view('admin/temp1_admin',$data);
				$this->load->view('admin/hrd/v_newhrd');
				$this->load->view('admin/temp2_admin');
			}else{
				$data['status'] = $this->m_admin->model_status();
				$this->load->view('admin/temp1_hrd',$data);
				$this->load->view('admin/hrd/v_newhrd');
				$this->load->view('admin/temp2_hrd');
			}			
		}
	}

	public function tambah_hrd()
	{
		$user = $this->session->userdata('ses_admin');
		if ($user == "") {
			$this->load->view('login/v_loginadmin');
		}else{

			$user = $this->input->post('user');

			$this->db->where('User', $user);
			$query = $this->db->get('m_user');

			if ($query->num_rows() > 0) {
				$this->session->set_flashdata('msg',
						'<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		                                Gagal Dalam Mendaftar Username ini sudah ada jadi Admin / HRD
						</div>');
			
				redirect('admin/data_hrd');
			}else{			

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
		}
	}

	public function get_hrd()
	{
		$user = $this->session->userdata('ses_admin');
		if ($user == "") {
			$this->load->view('login/v_loginadmin');
		}else{
			if ($this->session->userdata('ses_status') == 1)
			{
				if (isset($_GET['us']) ) {
		            $id = $_GET['us'];
		            $data['status'] = $this->m_admin->model_status();
		            $data['hrd'] = $this->m_admin->getdata($id);         
		            $this->load->view('admin/temp1_admin',$data);
		            $this->load->view('admin/hrd/v_updatehrd',$data);
		            $this->load->view('admin/temp2_admin');
		        }else{
		        	echo "no";
		        }
				
			}else{
				if (isset($_GET['us']) ) {
		            $id = $_GET['us'];
		            $data['status'] = $this->m_admin->model_status();
		            $data['hrd'] = $this->m_admin->getdata($id);         
		            $this->load->view('admin/temp1_hrd',$data);
		            $this->load->view('admin/hrd/v_updatehrd',$data);
		            $this->load->view('admin/temp2_hrd');
		        }else{
		        	echo "no";
		        }
			}			
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
		$user = $this->session->userdata('ses_admin');
		if ($user == "") {
			$this->load->view('login/v_loginadmin');
		}else{
			if ($this->session->userdata('ses_status') == 1)
			{
				$data['status'] = $this->m_admin->model_status();
				$data['loker'] = $this->m_loker->lihat_loker();
				$this->load->view('admin/temp1_admin',$data);
				$this->load->view('admin/loker/v_loker', $data);
				$this->load->view('admin/temp2_admin');
			}else{
				$data['status'] = $this->m_admin->model_status();
				$data['loker'] = $this->m_loker->lihat_loker();
				$this->load->view('admin/temp1_hrd',$data);
				$this->load->view('admin/loker/v_loker', $data);
				$this->load->view('admin/temp2_hrd');
			}			
		}		
	}

	public function new_loker()
	{
		$user = $this->session->userdata('ses_admin');
			if ($user == "") {
				$this->load->view('login/v_loginadmin');
			}else{
				if ($this->session->userdata('ses_status') == 1)
				{
					$data['status'] = $this->m_admin->model_status();
					$this->load->view('admin/temp1_admin',$data);
					$this->load->view('admin/loker/v_newloker');
					$this->load->view('admin/temp2_admin');
				}else{
					$data['status'] = $this->m_admin->model_status();
					$this->load->view('admin/temp1_hrd',$data);
					$this->load->view('admin/loker/v_newloker');
					$this->load->view('admin/temp2_hrd');
				}			
			}		
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
		$user = $this->session->userdata('ses_admin');
			if ($user == "") {
				$this->load->view('login/v_loginadmin');
			}else{
				if ($this->session->userdata('ses_status') == 1)
				{
					if (isset($_GET['us']) ) {
			            $id = $_GET['us'];
			            $data['status'] = $this->m_admin->model_status();
			            $data['loker'] = $this->m_loker->getloker($id);         
			            $this->load->view('admin/temp1_admin',$data);
			            $this->load->view('admin/loker/v_updateloker',$data);
			            $this->load->view('admin/temp2_admin');
			        }else{
			        	echo "no";
			        }
				}else{
					if (isset($_GET['us']) ) {
			            $id = $_GET['us'];
			            $data['status'] = $this->m_admin->model_status();
			            $data['loker'] = $this->m_loker->getloker($id);         
			            $this->load->view('admin/temp1_hrd',$data);
			            $this->load->view('admin/loker/v_updateloker',$data);
			            $this->load->view('admin/temp2_hrd');
			        }else{
			        	echo "no";
			        }
				}			
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
	public function data_pelamar_belum()
	{
		$user = $this->session->userdata('ses_admin');
			if ($user == "") {
				$this->load->view('login/v_loginadmin');
			}else{
				if ($this->session->userdata('ses_status') == 1)
				{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_pelamar->tampil_data_m_pelamar();
					$this->load->view('admin/temp1_admin',$data);
					$this->load->view('admin/pelamar/v_pelamartidak', $data);
					$this->load->view('admin/temp2_admin');
				}else{
					$data['pelamar'] = $this->m_pelamar->tampil_data();
					$data['status'] = $this->m_admin->model_status();
					$this->load->view('admin/temp1_hrd',$data);
					$this->load->view('admin/pelamar/v_pelamartidak', $data);
					$this->load->view('admin/temp2_hrd');
				}			
			}
	}

	public function data_pelamar_sudah()
	{
		$user = $this->session->userdata('ses_admin');
			if ($user == "") {
				$this->load->view('login/v_loginadmin');
			}else{
				if ($this->session->userdata('ses_status') == 1)
				{
					$data['status'] 	= $this->m_admin->model_status();
					$data['pelamar'] 	= $this->m_pelamar->tampil_data();
					$this->load->view('admin/temp1_admin',$data);
					$this->load->view('admin/pelamar/v_pelamarlengkap', $data);
					$this->load->view('admin/temp2_admin');
				}else{
					$data['pelamar'] = $this->m_pelamar->tampil_data();
					$data['status'] = $this->m_admin->model_status();
					$this->load->view('admin/temp1_hrd',$data);
					$this->load->view('admin/pelamar/v_pelamarlengkap', $data);
					$this->load->view('admin/temp2_hrd');
				}			
			}		
	}

	public function data_pelamar_detail()
	{
		$user = $this->session->userdata('ses_admin');
			if ($user == "") {
				$this->load->view('login/v_loginadmin');
			}else{
				if ($this->session->userdata('ses_status') == 1)
				{
					if (isset($_GET['us']) ) {
			            $id = $_GET['us'];
			            
			            $data['status'] 	= $this->m_admin->model_status();
						$data['pelamar']	= $this->m_pelamar->lihat_akun($id);
						$data['identitas']	= $this->m_pelamar->lihat_identitas($id);
						$data['alamat']		= $this->m_pelamar->lihat_alamat($id);
						$data['ukuran']		= $this->m_pelamar->lihat_ukuran($id);
						$data['pendidikan']	= $this->m_pelamar->lihat_pendidikan($id);
						$data['pengalaman']	= $this->m_pelamar->lihat_pengalamankerja($id);
						$data['pertanyaan']	= $this->m_pelamar->lihat_pertanyaan2($id);
						$this->load->view('admin/temp1_admin',$data);
						$this->load->view('admin/pelamar/v_detail_pelamar',$data);
						$this->load->view('admin/temp2_admin');
			        }else{
			        	echo "no";
			        }
					
				}else{
					if (isset($_GET['us']) ) {
			            $id = $_GET['us'];
			            
			            $data['status'] 	= $this->m_admin->model_status();
						$data['pelamar']	= $this->m_pelamar->lihat_akun($id);
						$data['identitas']	= $this->m_pelamar->lihat_identitas($id);
						$data['alamat']		= $this->m_pelamar->lihat_alamat($id);
						$data['ukuran']		= $this->m_pelamar->lihat_ukuran($id);
						$data['pendidikan']	= $this->m_pelamar->lihat_pendidikan($id);
						$data['pengalaman']	= $this->m_pelamar->lihat_pengalamankerja($id);
						$data['pertanyaan']	= $this->m_pelamar->lihat_pertanyaan2($id);
						$this->load->view('admin/temp1_hrd',$data);
						$this->load->view('admin/pelamar/v_detail_pelamar',$data);
						$this->load->view('admin/temp2_hrd');
			        }else{
			        	echo "no";
			        }
				}			
			}
	}

	public function get_pelamar()
	{
		$user = $this->session->userdata('ses_admin');
			if ($user == "") {
				$this->load->view('login/v_loginadmin');
			}else{
				if ($this->session->userdata('ses_status') == 1)
				{
					if (isset($_GET['us']) ) {
			            $id = $_GET['us'];
			            $data['status'] = $this->m_admin->model_status();
			            $data['pelamar'] = $this->m_pelamar->getdata($id);         
			            $this->load->view('admin/temp1_admin',$data);
			            $this->load->view('admin/pelamar/v_updatepelamar',$data);
			            $this->load->view('admin/temp2_admin');
			        }else{
			        	echo "no";
			        }
				}else{
					if (isset($_GET['us']) ) {
			            $id = $_GET['us'];
			            $data['status'] = $this->m_admin->model_status();
			            $data['pelamar'] = $this->m_pelamar->getdata($id);         
			            $this->load->view('admin/temp1_hrd',$data);
			            $this->load->view('admin/pelamar/v_updatepelamar',$data);
			            $this->load->view('admin/temp2_hrd');
			        }else{
			        	echo "no";
			        }
				}			
			}		
	}

	public function get_pelamarsudah()
	{
		$user = $this->session->userdata('ses_admin');
			if ($user == "") {
				$this->load->view('login/v_loginadmin');
			}else{
				if ($this->session->userdata('ses_status') == 1)
				{
					if (isset($_GET['us']) ) {
			            $id = $_GET['us'];
			            $data['status'] = $this->m_admin->model_status();
			            $data['pelamar'] = $this->m_pelamar->getdata($id);         
			            $this->load->view('admin/temp1_admin',$data);
			            $this->load->view('admin/pelamar/v_updatepelamarsudah',$data);
			            $this->load->view('admin/temp2_admin');
			        }else{
			        	echo "no";
			        }
				}else{
					if (isset($_GET['us']) ) {
			            $id = $_GET['us'];
			            $data['status'] = $this->m_admin->model_status();
			            $data['pelamar'] = $this->m_pelamar->getdata($id);         
			            $this->load->view('admin/temp1_hrd',$data);
			            $this->load->view('admin/pelamar/v_updatepelamarsudah',$data);
			            $this->load->view('admin/temp2_hrd');
			        }else{
			        	echo "no";
			        }
				}			
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

	//start action status
	public function status_tutup()
	{
		$data = array(
			'status_recruitment'	=> 0
			);

		$where = array(
			'ID_Recruitment'		=> 1
			);

		$this->m_pelamar->update($where,$data,'status_recruitment');

		$this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Rekruitment Berhasil Di Tutup
				</div>');
		redirect('admin');
	}

	public function status_buka()
	{
		$data = array(
			'status_recruitment'	=> 1
			);

		$where = array(
			'ID_Recruitment'		=> 1
			);

		$this->m_pelamar->update($where,$data,'status_recruitment');

		$this->session->set_flashdata('msg',
				'<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Rekruitment Berhasil Di Buka
				</div>');
		redirect('admin');
	}

	//end action status

	//start status pelamar

	public function status_pelamar()
	{
		$user = $this->session->userdata('ses_admin');
			if ($user == "") {
				$this->load->view('login/v_loginadmin');
			}else{
				if ($this->session->userdata('ses_status') == 1)
				{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_admin->m_status_pelamar();
					$data['loker'] = $this->m_loker->lihat_loker_aktif();
					$this->load->view('admin/temp1_admin',$data);
					$this->load->view('admin/reporting/v_reporting_pelamar', $data);
					$this->load->view('admin/temp2_admin');
				}else{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_admin->m_status_pelamar();					
					$data['loker'] = $this->m_loker->lihat_loker_aktif();
					$this->load->view('admin/temp1_hrd',$data);
					$this->load->view('admin/reporting/v_reporting_pelamar', $data);
					$this->load->view('admin/temp2_hrd');
				}			
			}
	}

	public function riwayat_status_pelamar()
	{
		$user = $this->session->userdata('ses_admin');
			if ($user == "") {
				$this->load->view('login/v_loginadmin');
			}else{
				if ($this->session->userdata('ses_status') == 1)
				{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_admin->r_status_pelamar();
					$data['loker'] = $this->m_loker->lihat_loker_aktif();
					$this->load->view('admin/temp1_admin',$data);
					$this->load->view('admin/reporting/v_riwayat_pelamar', $data);
					$this->load->view('admin/temp2_admin');
				}else{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_admin->r_status_pelamar();					
					$data['loker'] = $this->m_loker->lihat_loker_aktif();
					$this->load->view('admin/temp1_hrd',$data);
					$this->load->view('admin/reporting/v_riwayat_pelamar', $data);
					$this->load->view('admin/temp2_hrd');
				}			
			}
	}

	public function status_administrasi()
	{
		$user = $this->session->userdata('ses_admin');
			if ($user == "") {
				$this->load->view('login/v_loginadmin');
			}else{
				if ($this->session->userdata('ses_status') == 1)
				{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_admin->m_status_administrasi();
					$data['loker'] = $this->m_loker->lihat_loker_aktif();
					$this->load->view('admin/temp1_admin',$data);
					$this->load->view('admin/reporting/v_reporting_administrasi', $data);
					$this->load->view('admin/temp2_admin');
				}else{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_admin->m_status_administrasi();
					$data['loker'] = $this->m_loker->lihat_loker_aktif();
					$this->load->view('admin/temp1_hrd',$data);
					$this->load->view('admin/reporting/v_reporting_administrasi',$data);
					$this->load->view('admin/temp2_hrd');
				}			
			}
	}

	public function riwayat_status_administrasi()
	{
		$user = $this->session->userdata('ses_admin');
			if ($user == "") {
				$this->load->view('login/v_loginadmin');
			}else{
				if ($this->session->userdata('ses_status') == 1)
				{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_admin->r_status_administrasi();
					$data['loker'] = $this->m_loker->lihat_loker_aktif();
					$this->load->view('admin/temp1_admin',$data);
					$this->load->view('admin/reporting/v_riwayat_administrasi', $data);
					$this->load->view('admin/temp2_admin');
				}else{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_admin->r_status_administrasi();
					$data['loker'] = $this->m_loker->lihat_loker_aktif();
					$this->load->view('admin/temp1_hrd',$data);
					$this->load->view('admin/reporting/v_riwayat_administrasi',$data);
					$this->load->view('admin/temp2_hrd');
				}			
			}
	}

	public function status_interview()
	{
		$user = $this->session->userdata('ses_admin');
			if ($user == "") {
				$this->load->view('login/v_loginadmin');
			}else{
				if ($this->session->userdata('ses_status') == 1)
				{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_admin->m_status_interview();
					$data['loker'] = $this->m_loker->lihat_loker_aktif();
					$this->load->view('admin/temp1_admin',$data);
					$this->load->view('admin/reporting/v_reporting_interview',$data);
					$this->load->view('admin/temp2_admin');
				}else{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_admin->m_status_interview();
					$data['loker'] = $this->m_loker->lihat_loker_aktif();
					$this->load->view('admin/temp1_hrd',$data);
					$this->load->view('admin/reporting/v_reporting_interview',$data);
					$this->load->view('admin/temp2_hrd');
				}			
			}
	}

	public function riwayat_status_interview()
	{
		$user = $this->session->userdata('ses_admin');
			if ($user == "") {
				$this->load->view('login/v_loginadmin');
			}else{
				if ($this->session->userdata('ses_status') == 1)
				{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_admin->r_status_interview();
					$data['loker'] = $this->m_loker->lihat_loker_aktif();
					$this->load->view('admin/temp1_admin',$data);
					$this->load->view('admin/reporting/v_riwayat_interview',$data);
					$this->load->view('admin/temp2_admin');
				}else{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_admin->r_status_interview();
					$data['loker'] = $this->m_loker->lihat_loker_aktif();
					$this->load->view('admin/temp1_hrd',$data);
					$this->load->view('admin/reporting/v_riwayat_interview',$data);
					$this->load->view('admin/temp2_hrd');
				}			
			}
	}

	public function status_psikotes()
	{
		$user = $this->session->userdata('ses_admin');
			if ($user == "") {
				$this->load->view('login/v_loginadmin');
			}else{
				if ($this->session->userdata('ses_status') == 1)
				{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_admin->m_status_psikotes();
					$data['loker'] = $this->m_loker->lihat_loker_aktif();
					$this->load->view('admin/temp1_admin',$data);
					$this->load->view('admin/reporting/v_reporting_psikotes',$data);
					$this->load->view('admin/temp2_admin');
				}else{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_admin->m_status_psikotes();
					$data['loker'] = $this->m_loker->lihat_loker_aktif();
					$this->load->view('admin/temp1_hrd',$data);
					$this->load->view('admin/reporting/v_reporting_psikotes',$data);
					$this->load->view('admin/temp2_hrd');
				}			
			}
	}

	public function riwayat_status_psikotes()
	{
		$user = $this->session->userdata('ses_admin');
			if ($user == "") {
				$this->load->view('login/v_loginadmin');
			}else{
				if ($this->session->userdata('ses_status') == 1)
				{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_admin->r_status_psikotes();
					$data['loker'] = $this->m_loker->lihat_loker_aktif();
					$this->load->view('admin/temp1_admin',$data);
					$this->load->view('admin/reporting/v_riwayat_psikotes',$data);
					$this->load->view('admin/temp2_admin');
				}else{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_admin->r_status_psikotes();
					$data['loker'] = $this->m_loker->lihat_loker_aktif();
					$this->load->view('admin/temp1_hrd',$data);
					$this->load->view('admin/reporting/v_riwayat_psikotes',$data);
					$this->load->view('admin/temp2_hrd');
				}			
			}
	}

	public function status_mcu()
	{
		$user = $this->session->userdata('ses_admin');
			if ($user == "") {
				$this->load->view('login/v_loginadmin');
			}else{
				if ($this->session->userdata('ses_status') == 1)
				{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_admin->m_status_mcu();
					$data['loker'] = $this->m_loker->lihat_loker_aktif();
					$this->load->view('admin/temp1_admin',$data);
					$this->load->view('admin/reporting/v_reporting_mcu',$data);
					$this->load->view('admin/temp2_admin');
				}else{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_admin->m_status_mcu();
					$data['loker'] = $this->m_loker->lihat_loker_aktif();
					$this->load->view('admin/temp1_hrd',$data);
					$this->load->view('admin/reporting/v_reporting_mcu',$data);
					$this->load->view('admin/temp2_hrd');
				}			
			}
	}

	public function riwayat_status_mcu()
	{
		$user = $this->session->userdata('ses_admin');
			if ($user == "") {
				$this->load->view('login/v_loginadmin');
			}else{
				if ($this->session->userdata('ses_status') == 1)
				{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_admin->r_status_mcu();
					$data['loker'] = $this->m_loker->lihat_loker_aktif();
					$this->load->view('admin/temp1_admin',$data);
					$this->load->view('admin/reporting/v_riwayat_mcu',$data);
					$this->load->view('admin/temp2_admin');
				}else{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_admin->r_status_mcu();
					$data['loker'] = $this->m_loker->lihat_loker_aktif();
					$this->load->view('admin/temp1_hrd',$data);
					$this->load->view('admin/reporting/v_riwayat_mcu',$data);
					$this->load->view('admin/temp2_hrd');
				}			
			}
	}

	public function status_interview_lanjutan()
	{
		$user = $this->session->userdata('ses_admin');
			if ($user == "") {
				$this->load->view('login/v_loginadmin');
			}else{
				if ($this->session->userdata('ses_status') == 1)
				{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_admin->m_status_interview_lanjut();
					$data['loker'] = $this->m_loker->lihat_loker_aktif();
					$this->load->view('admin/temp1_admin',$data);
					$this->load->view('admin/reporting/v_reporting_interview_lanjutan',$data);
					$this->load->view('admin/temp2_admin');
				}else{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_admin->m_status_interview_lanjutan();
					$data['loker'] = $this->m_loker->lihat_loker_aktif();
					$this->load->view('admin/temp1_hrd',$data);
					$this->load->view('admin/reporting/v_reporting_interview_lanjutan',$data);
					$this->load->view('admin/temp2_hrd');
				}			
			}
	}

	public function riwayat_status_interview_lanjutan()
	{
		$user = $this->session->userdata('ses_admin');
			if ($user == "") {
				$this->load->view('login/v_loginadmin');
			}else{
				if ($this->session->userdata('ses_status') == 1)
				{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_admin->r_status_interview_lanjut();
					$data['loker'] = $this->m_loker->lihat_loker_aktif();
					$this->load->view('admin/temp1_admin',$data);
					$this->load->view('admin/reporting/v_riwayat_interview_lanjutan',$data);
					$this->load->view('admin/temp2_admin');
				}else{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_admin->r_status_interview_lanjutan();
					$data['loker'] = $this->m_loker->lihat_loker_aktif();
					$this->load->view('admin/temp1_hrd',$data);
					$this->load->view('admin/reporting/v_riwayat_interview_lanjutan',$data);
					$this->load->view('admin/temp2_hrd');
				}			
			}
	}

	public function status_hire()
	{
		$user = $this->session->userdata('ses_admin');
			if ($user == "") {
				$this->load->view('login/v_loginadmin');
			}else{
				if ($this->session->userdata('ses_status') == 1)
				{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_admin->m_status_hire();
					$data['loker'] = $this->m_loker->lihat_loker_aktif();
					$this->load->view('admin/temp1_admin',$data);
					$this->load->view('admin/reporting/v_reporting_hire',$data);
					$this->load->view('admin/temp2_admin');
				}else{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_admin->m_status_hire();
					$data['loker'] = $this->m_loker->lihat_loker_aktif();
					$this->load->view('admin/temp1_hrd',$data);
					$this->load->view('admin/reporting/v_reporting_hire',$data);
					$this->load->view('admin/temp2_hrd');
				}			
			}
	}

	public function riwayat_status_hire()
	{
		$user = $this->session->userdata('ses_admin');
			if ($user == "") {
				$this->load->view('login/v_loginadmin');
			}else{
				if ($this->session->userdata('ses_status') == 1)
				{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_admin->r_status_hire();
					$data['loker'] = $this->m_loker->lihat_loker_aktif();
					$this->load->view('admin/temp1_admin',$data);
					$this->load->view('admin/reporting/v_riwayat_hire',$data);
					$this->load->view('admin/temp2_admin');
				}else{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_admin->r_status_hire();
					$data['loker'] = $this->m_loker->lihat_loker_aktif();
					$this->load->view('admin/temp1_hrd',$data);
					$this->load->view('admin/reporting/v_riwayat_hire',$data);
					$this->load->view('admin/temp2_hrd');
				}			
			}
	}

	public function status_karyawan()
	{
		$user = $this->session->userdata('ses_admin');
			if ($user == "") {
				$this->load->view('login/v_loginadmin');
			}else{
				if ($this->session->userdata('ses_status') == 1)
				{
					$data['status'] 	= $this->m_admin->model_status();
					$data['pelamar'] 	= $this->m_admin->m_status_karyawan();
					$data['loker'] 		= $this->m_loker->lihat_loker_aktif();

					$this->load->view('admin/temp1_admin',$data);
					$this->load->view('admin/reporting/v_reporting_karyawan',$data);
					$this->load->view('admin/temp2_admin');
				}else{
					$data['status'] = $this->m_admin->model_status();
					$data['pelamar'] = $this->m_admin->m_status_karyawan();
					$data['loker'] = $this->m_loker->lihat_loker_aktif();

					$this->load->view('admin/temp1_hrd',$data);
					$this->load->view('admin/reporting/v_reporting_karyawan',$data);
					$this->load->view('admin/temp2_hrd');
				}			
			}
	}

	public function pelamar_gagal()
	{
		$status = $this->input->post('id_status');

		$data = array(
			'status_aktif'	=> 0
			);

		$where = array(
			'ID_PelamarJoin'		=> $this->input->post("id")
			);

		$this->m_pelamar->update($where,$data,'join_lamar');


			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Pelamar Gagal
				</div>');

		if ($status == 1) {
			redirect('admin/status_pelamar');
		}elseif ($status == 2){
			redirect('admin/status_administrasi');
		}elseif ($status == 3){
			redirect('admin/status_interview');
		}elseif ($status == 4){
			redirect('admin/status_psikotes');
		}elseif ($status == 5){
			redirect('admin/status_mcu');									
		}elseif ($status == 6){
			redirect('admin/status_interview_lanjutan');
		}elseif ($status == 7){
			redirect('admin/status_hire');
		}else{
			
		}		
	}

	public function pelamar_masuk()
	{
		$status = $this->input->post('id_status');

		$data = array(
			'status_aktif'	=> 1
			);

		$where = array(
			'ID_PelamarJoin'		=> $this->input->post("id")
			);

		$this->m_pelamar->update($where,$data,'join_lamar');


			$this->session->set_flashdata('msg',
				'<div class="alert alert-primary alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Pelamar Aktif Kembali
				</div>');

		if ($status == 1) {
			redirect('admin/riwayat_status_pelamar');
		}elseif ($status == 2){
			redirect('admin/riwayat_status_administrasi');
		}elseif ($status == 3){
			redirect('admin/riwayat_status_interview');
		}elseif ($status == 4){
			redirect('admin/riwayat_status_psikotes');
		}elseif ($status == 5){
			redirect('admin/riwayat_status_mcu');									
		}elseif ($status == 6){
			redirect('admin/riwayat_status_interview_lanjutan');
		}elseif ($status == 7){
			redirect('admin/riwayat_status_hire');
		}else{
			
		}		
	}

	public function pelamar_naik_ketahap()
	{
		$status = $this->input->post('status');

		if ($status == 1) {			
			
			$data = array(
			'status_Join'	=> 2
			);

			$where = array(
			'ID_PelamarJoin'		=> $this->input->post("id")
			);

			$this->m_pelamar->update($where,$data,'join_lamar');

			$this->session->set_flashdata('msg',
					'<div class="alert alert-primary alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Pelamar Lolos Tahap Administrasi
					</div>');
			redirect('admin/status_pelamar');

		}elseif ($status == 2){

			$data = array(
			'status_Join'	=> 3
			);

			$where = array(
			'ID_PelamarJoin'		=> $this->input->post("id")
			);

			$this->m_pelamar->update($where,$data,'join_lamar');

			$this->session->set_flashdata('msg',
					'<div class="alert alert-primary alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Pelamar Lolos Ke Tahap Interview
					</div>');
			redirect('admin/status_administrasi');

		}elseif ($status == 3){

			$data = array(
			'status_Join'	=> 4
			);

			$where = array(
			'ID_PelamarJoin'		=> $this->input->post("id")
			);

			$this->m_pelamar->update($where,$data,'join_lamar');

			$this->session->set_flashdata('msg',
					'<div class="alert alert-primary alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Pelamar Lolos Ke Tahap Psikotes
					</div>');
			redirect('admin/status_interview');

		}elseif ($status == 4){

			$data = array(
			'status_Join'	=> 5
			);

			$where = array(
			'ID_PelamarJoin'		=> $this->input->post("id")
			);

			$this->m_pelamar->update($where,$data,'join_lamar');

			$this->session->set_flashdata('msg',
					'<div class="alert alert-primary alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Pelamar Lolos Ke Tahap MCU
					</div>');
			redirect('admin/status_psikotes');

		}elseif ($status == 5){

			$data = array(
			'status_Join'	=> 6
			);

			$where = array(
			'ID_PelamarJoin'		=> $this->input->post("id")
			);

			$this->m_pelamar->update($where,$data,'join_lamar');

			$this->session->set_flashdata('msg',
					'<div class="alert alert-primary alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Pelamar Lolos Ke Tahap Interview Lanjutan
					</div>');
			redirect('admin/status_mcu');

		}elseif ($status == 6){

			$data = array(
			'status_Join'	=> 7
			);

			$where = array(
			'ID_PelamarJoin'		=> $this->input->post("id")
			);

			$this->m_pelamar->update($where,$data,'join_lamar');

			$this->session->set_flashdata('msg',
					'<div class="alert alert-primary alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Pelamar Lolos Ke Tahap Hire/Waiting Join
					</div>');
			redirect('admin/status_interview_lanjutan');

		}elseif ($status == 7){

			$data = array(
			'status_Join'	=> 8
			);

			$where = array(
			'ID_PelamarJoin'		=> $this->input->post("id")
			);

			$this->m_pelamar->update($where,$data,'join_lamar');

			$this->session->set_flashdata('msg',
					'<div class="alert alert-primary alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	                                Pelamar Lolos Jadi Karyawan
					</div>');
			redirect('admin/status_hire');

		}else{
			echo "no";
		}
	}

	//end status pelamar


	

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
				redirect('admin');
			}
		}else{
			$this->session->set_flashdata('msg','Ada kesalahan dalam Login, Periksa Username atau Password');
			redirect('admin');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('ses_admin');
		$this->session->unset_userdata('ses_status');
		session_destroy();

		redirect('admin');
	}

		//start cetak

	public function cetak_identitas_pelamar()
	{
		if (isset($_GET['us']) ) {
	            $id = $_GET['us'];
	            $data['akun'] 		= $this->m_pelamar->lihat_akun($id);
	            $data['identitas'] 	= $this->m_pelamar->lihat_identitas($id);
	            $data['alamat'] 	= $this->m_pelamar->lihat_alamat($id);
	            $data['ukuran'] 	= $this->m_pelamar->lihat_ukuran($id);
	            $data['pendidikan'] = $this->m_pelamar->lihat_pendidikan($id);
	            $data['pengalaman'] = $this->m_pelamar->lihat_pengalamankerja($id);
	            $data['pertanyaan'] = $this->m_pelamar->lihat_pertanyaan2($id);
				$this->load->library('pdf');
			    $this->pdf->setPaper('A4', 'potrait');
			    $this->pdf->filename = "Report-Identitas-Pelamar.pdf";
			    $this->pdf->load_view('admin/pelamar/cetak_data_pelamar',$data);
	        }else{
	        	echo "no";
	        }
		
	}

	public function getviewdata()
	{
		if (isset($_GET['us']) ) {
		    $id = $_GET['us'];
		            
		    $data['akun'] 		= $this->m_pelamar->lihat_akun($id);
			$data['pelamar'] 	= $this->m_pelamar->lihat_identitas($id);
			$data['alamat'] 	= $this->m_pelamar->lihat_alamat($id);
			$data['ukuran']		= $this->m_pelamar->lihat_ukuran($id);
			$data['pendidikan']	= $this->m_pelamar->lihat_pendidikan($id);
			$data['pengalaman']	= $this->m_pelamar->lihat_pengalamankerja($id);
			$data['pertanyaan']	= $this->m_pelamar->lihat_pertanyaan2($id);


		    }else{
		      	echo "no";
		    }
	}

	public function aksi_pelamar()
	{
		$id 		= $this->input->post('btn');
		$tgl_awal 	= $this->input->post('tgl_awal');
		$tgl_akhir 	= $this->input->post('tgl_akhir');
		$bidang		= $this->input->post('bidang');

		if ($id == 'Print') {

			if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
				$data['pelamar'] = $this->m_admin->m_status_pelamar();
			}else{
				$data['pelamar'] = $this->m_pelamar->tampil_cetak_pelamar($tgl_awal,$tgl_akhir,$bidang);
			}			
			$this->load->library('pdf');
		    $this->pdf->setPaper('A4', 'potrait');
		    $this->pdf->filename = "Laporan-Pelamar.pdf";
		    $this->pdf->load_view('admin/reporting/cetak_laporan_pelamar', $data);
		
		}elseif ($id == 'Cari') {
					$data['status'] 	= $this->m_admin->model_status();
					$data['pelamar'] 	= $this->m_admin->m_status_pelamar_cari($tgl_awal,$tgl_akhir,$bidang);
					$data['loker'] 		= $this->m_loker->lihat_loker_aktif();

					if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
						redirect('admin/status_pelamar');
					}else{
						if ($this->session->userdata('ses_status') == 1)
						{					
							$this->load->view('admin/temp1_admin',$data);
							$this->load->view('admin/reporting/v_reporting_pelamar',$data);
							$this->load->view('admin/temp2_admin');
						}
						else{
							$this->load->view('admin/temp1_hrd',$data);
							$this->load->view('admin/reporting/v_reporting_pelamar',$data);
							$this->load->view('admin/temp2_admin');
						}
					}					
		}

		else{

			if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
				$semua_pengguna = $this->m_admin->m_status_pelamar();
			}else{
				$semua_pengguna = $this->m_pelamar->tampil_excel_pelamar($tgl_awal,$tgl_akhir,$bidang);
			}
          $spreadsheet = new Spreadsheet;

          $spreadsheet->setActiveSheetIndex(0)
                      ->setCellValue('A1', 'No')
                      ->setCellValue('B1', 'Bidang')
                      ->setCellValue('C1', 'NIK')
                      ->setCellValue('D1', 'Nama')
                      ->setCellValue('E1', 'No.Telp/HP')
                      ->setCellValue('F1', 'TGL Daftar');

          $kolom = 2;
          $nomor = 1;
          foreach($semua_pengguna->result() as $pengguna) {

               $spreadsheet->setActiveSheetIndex(0)
                           ->setCellValue('A' . $kolom, $nomor)
                           ->setCellValue('B' . $kolom, $pengguna->lok_nama)
                           ->setCellValue('C' . $kolom, $pengguna->nik_ktp)
                           ->setCellValue('D' . $kolom, $pengguna->nama_ktp)
                           ->setCellValue('E' . $kolom, $pengguna->nohp)
                           ->setCellValue('F' . $kolom, date('j F Y', strtotime($pengguna->TGL_Lamar)));

               $kolom++;
               $nomor++;

          }

          $writer = new Xlsx($spreadsheet);

          header('Content-Type: application/vnd.ms-excel');
	  header('Content-Disposition: attachment;filename="Laporan Pelamar.xlsx"');
	  header('Cache-Control: max-age=0');

	  $writer->save('php://output');
		}	
		
	}

	public function riwayat_aksi_pelamar()
	{
		$tgl_awal 	= $this->input->post('tgl_awal');
		$tgl_akhir 	= $this->input->post('tgl_akhir');
		$bidang		= $this->input->post('bidang');

					$data['status'] 	= $this->m_admin->model_status();
					$data['pelamar'] 	= $this->m_admin->r_status_pelamar_cari($tgl_awal,$tgl_akhir,$bidang);
					$data['loker'] 		= $this->m_loker->lihat_loker_aktif();

					if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
						redirect('admin/riwayat_status_pelamar');
					}else{
						if ($this->session->userdata('ses_status') == 1)
						{					
							$this->load->view('admin/temp1_admin',$data);
							$this->load->view('admin/reporting/v_riwayat_pelamar',$data);
							$this->load->view('admin/temp2_admin');
						}
						else{
							$this->load->view('admin/temp1_hrd',$data);
							$this->load->view('admin/reporting/v_riwayat_pelamar',$data);
							$this->load->view('admin/temp2_admin');
						}
					}
	}

	public function aksi_administrasi()
	{
		$id 		= $this->input->post('btn');
		$tgl_awal 	= $this->input->post('tgl_awal');
		$tgl_akhir 	= $this->input->post('tgl_akhir');
		$bidang		= $this->input->post('bidang');


		if ($id == 'Print') {

			if($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL){
				$data['pelamar']	= $this->m_admin->m_status_administrasi();
			}else{
				$data['pelamar'] = $this->m_pelamar->tampil_cetak_administrasi($tgl_awal,$tgl_akhir,$bidang);
			}

			
			$this->load->library('pdf');
		    $this->pdf->setPaper('A4', 'potrait');
		    $this->pdf->filename = "Data Lolos Administrasi.pdf";
		    $this->pdf->load_view('admin/reporting/cetak_laporan_Administrasi', $data);

		}elseif ($id == 'Cari') {

			if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
				redirect('admin/status_administrasi');
			}else{
				$data['status'] = $this->m_admin->model_status();
				$data['pelamar'] = $this->m_admin->m_status_administrasi_cari($tgl_awal,$tgl_akhir,$bidang);
				$data['loker'] = $this->m_loker->lihat_loker_aktif();
			if ($this->session->userdata('ses_status') == 1)
				{					
					$this->load->view('admin/temp1_admin',$data);
					$this->load->view('admin/reporting/v_reporting_administrasi', $data);
					$this->load->view('admin/temp2_admin');
				}else{
					$this->load->view('admin/temp1_hrd',$data);
					$this->load->view('admin/reporting/v_reporting_administrasi', $data);
					$this->load->view('admin/temp2_admin');
				}	
			}
									
					
		}
		else{
			if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
				$semua_pengguna = $this->m_admin->m_status_administrasi();
			}else{
				$semua_pengguna = $this->m_pelamar->tampil_excel_administrasi($tgl_awal,$tgl_akhir,$bidang);
			}			

	        $spreadsheet = new Spreadsheet;

	        $spreadsheet->setActiveSheetIndex(0)
	                    ->setCellValue('A1', 'No')
	                    ->setCellValue('B1', 'Bidang')
	                    ->setCellValue('C1', 'NIK')
	                    ->setCellValue('D1', 'Nama')
	                    ->setCellValue('E1', 'No.Telp/HP')
	                    ->setCellValue('F1', 'TGL Daftar');

	        $kolom = 2;
	        $nomor = 1;
	        foreach($semua_pengguna->result() as $pengguna) {

	            $spreadsheet->setActiveSheetIndex(0)
	                        ->setCellValue('A' . $kolom, $nomor)
	                        ->setCellValue('B' . $kolom, $pengguna->lok_nama)
	                        ->setCellValue('C' . $kolom, $pengguna->nik_ktp)
	                        ->setCellValue('D' . $kolom, $pengguna->nama_ktp)
	                        ->setCellValue('E' . $kolom, $pengguna->nohp)
	                        ->setCellValue('F' . $kolom, date('j F Y', strtotime($pengguna->TGL_Lamar)));

	            $kolom++;
	            $nomor++;

	        }

	        $writer = new Xlsx($spreadsheet);

	        header('Content-Type: application/vnd.ms-excel');
		  	header('Content-Disposition: attachment;filename="Data Lolos Administrasi.xlsx"');
		  	header('Cache-Control: max-age=0');

		  	$writer->save('php://output');
		}	
		
	}

	public function riwayat_aksi_administrasi()
	{
		$tgl_awal 	= $this->input->post('tgl_awal');
		$tgl_akhir 	= $this->input->post('tgl_akhir');
		$bidang		= $this->input->post('bidang');

		if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
				redirect('admin/riwayat_status_administrasi');
			}else{
				$data['status'] = $this->m_admin->model_status();
				$data['pelamar'] = $this->m_admin->r_status_administrasi_cari($tgl_awal,$tgl_akhir,$bidang);
				$data['loker'] = $this->m_loker->lihat_loker_aktif();
			if ($this->session->userdata('ses_status') == 1)
				{					
					$this->load->view('admin/temp1_admin',$data);
					$this->load->view('admin/reporting/v_riwayat_administrasi', $data);
					$this->load->view('admin/temp2_admin');
				}else{
					$this->load->view('admin/temp1_hrd',$data);
					$this->load->view('admin/reporting/v_riwayat_administrasi', $data);
					$this->load->view('admin/temp2_admin');
				}	
			}
	}

	public function aksi_interview()
	{
		$id 		= $this->input->post('btn');
		$tgl_awal 	= $this->input->post('tgl_awal');
		$tgl_akhir 	= $this->input->post('tgl_akhir');
		$bidang		= $this->input->post('bidang');

		if ($id == 'Print') {

			if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
				$data['pelamar'] = $this->m_admin->m_status_interview();
			}else{
				$data['pelamar'] = $this->m_pelamar->tampil_cetak_interview($tgl_awal,$tgl_akhir,$bidang);
			}
			
			$this->load->library('pdf');
		    $this->pdf->setPaper('A4', 'potrait');
		    $this->pdf->filename = "Data Lolos Interview.pdf";
		    $this->pdf->load_view('admin/reporting/cetak_laporan_interview', $data);

		} elseif ($id == 'Cari') {
			if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
				redirect('admin/status_interview');
			}else{
				$data['status'] = $this->m_admin->model_status();
				$data['pelamar'] = $this->m_admin->m_status_interview_cari($tgl_awal,$tgl_akhir,$bidang);
				$data['loker'] = $this->m_loker->lihat_loker_aktif();
				
				if ($this->session->userdata('ses_status') == 1)
				{					
					$this->load->view('admin/temp1_admin',$data);
					$this->load->view('admin/reporting/v_reporting_interview', $data);
					$this->load->view('admin/temp2_admin');
				}else{
					$this->load->view('admin/temp1_hrd',$data);
					$this->load->view('admin/reporting/v_reporting_interview', $data);
					$this->load->view('admin/temp2_admin');
				}

			}					
					
		}
		else{
			if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
				$semua_pengguna = $this->m_admin->m_status_interview();
			}else{
				$semua_pengguna = $this->m_pelamar->tampil_excel_interview($tgl_awal,$tgl_akhir,$bidang);	
			}

	        $spreadsheet = new Spreadsheet;

	        $spreadsheet->setActiveSheetIndex(0)
	                    ->setCellValue('A1', 'No')
	                    ->setCellValue('B1', 'Bidang')
	                    ->setCellValue('C1', 'NIK')
	                    ->setCellValue('D1', 'Nama')
	                    ->setCellValue('E1', 'No.Telp/HP')
	                    ->setCellValue('F1', 'TGL Daftar');

	        $kolom = 2;
	        $nomor = 1;
	        foreach($semua_pengguna->result() as $pengguna) {

	            $spreadsheet->setActiveSheetIndex(0)
	                        ->setCellValue('A' . $kolom, $nomor)
	                        ->setCellValue('B' . $kolom, $pengguna->lok_nama)
	                        ->setCellValue('C' . $kolom, $pengguna->nik_ktp)
	                        ->setCellValue('D' . $kolom, $pengguna->nama_ktp)
	                        ->setCellValue('E' . $kolom, $pengguna->nohp)
	                        ->setCellValue('F' . $kolom, date('j F Y', strtotime($pengguna->TGL_Lamar)));

	            $kolom++;
	            $nomor++;

	        }

	        $writer = new Xlsx($spreadsheet);

	        header('Content-Type: application/vnd.ms-excel');
		  	header('Content-Disposition: attachment;filename="Data Lolos Interview.xlsx"');
		  	header('Cache-Control: max-age=0');

		  	$writer->save('php://output');
		}
	}

	public function riwayat_aksi_interview()
	{
		$tgl_awal 	= $this->input->post('tgl_awal');
		$tgl_akhir 	= $this->input->post('tgl_akhir');
		$bidang		= $this->input->post('bidang');

		if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
				redirect('admin/riwayat_status_interview');
			}else{
				$data['status'] = $this->m_admin->model_status();
				$data['pelamar'] = $this->m_admin->r_status_interview_cari($tgl_awal,$tgl_akhir,$bidang);
				$data['loker'] = $this->m_loker->lihat_loker_aktif();
				
				if ($this->session->userdata('ses_status') == 1)
				{					
					$this->load->view('admin/temp1_admin',$data);
					$this->load->view('admin/reporting/v_riwayat_interview', $data);
					$this->load->view('admin/temp2_admin');
				}else{
					$this->load->view('admin/temp1_hrd',$data);
					$this->load->view('admin/reporting/v_riwayat_interview', $data);
					$this->load->view('admin/temp2_admin');
				}

			}
	}

	public function aksi_psikotes()
	{
		$id 		= $this->input->post('btn');
		$tgl_awal 	= $this->input->post('tgl_awal');
		$tgl_akhir 	= $this->input->post('tgl_akhir');
		$bidang		= $this->input->post('bidang');

		if ($id == 'Print') {
			if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
				$data['pelamar'] = $this->m_admin->m_status_psikotes();
			}else{
				$data['pelamar'] = $this->m_pelamar->tampil_cetak_psikotes($tgl_awal,$tgl_akhir,$bidang);
			}
			$this->load->library('pdf');
		    $this->pdf->setPaper('A4', 'potrait');
		    $this->pdf->filename = "Data Lolos Psikotes.pdf";
		    $this->pdf->load_view('admin/reporting/cetak_laporan_psikotes', $data);

		}elseif ($id == 'Cari') {
			if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
				redirect('admin/status_psikotes');
			}
			else{
				$data['status'] = $this->m_admin->model_status();
				$data['pelamar'] = $this->m_admin->m_status_psikotes_cari($tgl_awal,$tgl_akhir,$bidang);
				$data['loker'] = $this->m_loker->lihat_loker_aktif();
				if ($this->session->userdata('ses_status') == 1)
					{					
						$this->load->view('admin/temp1_admin',$data);
						$this->load->view('admin/reporting/v_reporting_psikotes', $data);
						$this->load->view('admin/temp2_admin');
					}else{
						$this->load->view('admin/temp1_hrd',$data);
						$this->load->view('admin/reporting/v_reporting_psikotes', $data);
						$this->load->view('admin/temp2_admin');
					}					
			}	
		}
		else{
			if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
				$semua_pengguna = $this->m_admin->m_status_psikotes();
			}else{
				$semua_pengguna = $this->m_pelamar->tampil_excel_psikotes($tgl_awal,$tgl_akhir,$bidang);
			}

	        $spreadsheet = new Spreadsheet;

	        $spreadsheet->setActiveSheetIndex(0)
	                    ->setCellValue('A1', 'No')
	                    ->setCellValue('B1', 'Bidang')
	                    ->setCellValue('C1', 'NIK')
	                    ->setCellValue('D1', 'Nama')
	                    ->setCellValue('E1', 'No.Telp/HP')
	                    ->setCellValue('F1', 'TGL Daftar');

	        $kolom = 2;
	        $nomor = 1;
	        foreach($semua_pengguna->result() as $pengguna) {

	            $spreadsheet->setActiveSheetIndex(0)
	                        ->setCellValue('A' . $kolom, $nomor)
	                        ->setCellValue('B' . $kolom, $pengguna->lok_nama)
	                        ->setCellValue('C' . $kolom, $pengguna->nik_ktp)
	                        ->setCellValue('D' . $kolom, $pengguna->nama_ktp)
	                        ->setCellValue('E' . $kolom, $pengguna->nohp)
	                        ->setCellValue('F' . $kolom, date('j F Y', strtotime($pengguna->TGL_Lamar)));

	            $kolom++;
	            $nomor++;

	        }

	        $writer = new Xlsx($spreadsheet);

	        header('Content-Type: application/vnd.ms-excel');
		  	header('Content-Disposition: attachment;filename="Data Lolos Psikotes.xlsx"');
		  	header('Cache-Control: max-age=0');

		  	$writer->save('php://output');
		}
	}

	public function riwayat_aksi_psikotes()
	{
		$tgl_awal 	= $this->input->post('tgl_awal');
		$tgl_akhir 	= $this->input->post('tgl_akhir');
		$bidang		= $this->input->post('bidang');

		if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
				redirect('admin/riwayat_status_psikotes');
			}
			else{
				$data['status'] = $this->m_admin->model_status();
				$data['pelamar'] = $this->m_admin->r_status_psikotes_cari($tgl_awal,$tgl_akhir,$bidang);
				$data['loker'] = $this->m_loker->lihat_loker_aktif();
				if ($this->session->userdata('ses_status') == 1)
					{					
						$this->load->view('admin/temp1_admin',$data);
						$this->load->view('admin/reporting/v_riwayat_psikotes', $data);
						$this->load->view('admin/temp2_admin');
					}else{
						$this->load->view('admin/temp1_hrd',$data);
						$this->load->view('admin/reporting/v_riwayat_psikotes', $data);
						$this->load->view('admin/temp2_admin');
					}					
			}
	}

	public function aksi_mcu()
	{
		$id 		= $this->input->post('btn');
		$tgl_awal 	= $this->input->post('tgl_awal');
		$tgl_akhir 	= $this->input->post('tgl_akhir');
		$bidang		= $this->input->post('bidang');

		if ($id == 'Print') {
			if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
				$data['pelamar'] = $this->m_admin->m_status_mcu();
			}else{
				$data['pelamar'] = $this->m_pelamar->tampil_cetak_mcu($tgl_awal,$tgl_akhir,$bidang);	
			}
			$this->load->library('pdf');
		    $this->pdf->setPaper('A4', 'potrait');
		    $this->pdf->filename = "Data Lolos MCU.pdf";
		    $this->pdf->load_view('admin/reporting/cetak_laporan_mcu', $data);

		}elseif ($id == 'Cari') {
			if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
				redirect('admin/status_mcu');
			}else{
				$data['status'] = $this->m_admin->model_status();
				$data['pelamar'] = $this->m_admin->m_status_mcu_cari($tgl_awal,$tgl_akhir,$bidang);
				$data['loker'] = $this->m_loker->lihat_loker_aktif();
				if ($this->session->userdata('ses_status') == 1)
					{					
						$this->load->view('admin/temp1_admin',$data);
						$this->load->view('admin/reporting/v_reporting_mcu', $data);
						$this->load->view('admin/temp2_admin');
					}else{
						$this->load->view('admin/temp1_hrd',$data);
						$this->load->view('admin/reporting/v_reporting_mcu', $data);
						$this->load->view('admin/temp2_admin');
					}
			}	
		}
		else{
			if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
				$semua_pengguna = $this->m_admin->m_status_mcu();
			}else{
				$semua_pengguna = $this->m_pelamar->tampil_excel_mcu($tgl_awal,$tgl_akhir,$bidang);
			}

	        $spreadsheet = new Spreadsheet;

	        $spreadsheet->setActiveSheetIndex(0)
	                    ->setCellValue('A1', 'No')
	                    ->setCellValue('B1', 'Bidang')
	                    ->setCellValue('C1', 'NIK')
	                    ->setCellValue('D1', 'Nama')
	                    ->setCellValue('E1', 'No.Telp/HP')
	                    ->setCellValue('F1', 'TGL Daftar');

	        $kolom = 2;
	        $nomor = 1;
	        foreach($semua_pengguna->result() as $pengguna) {

	            $spreadsheet->setActiveSheetIndex(0)
	                        ->setCellValue('A' . $kolom, $nomor)
	                        ->setCellValue('B' . $kolom, $pengguna->lok_nama)
	                        ->setCellValue('C' . $kolom, $pengguna->nik_ktp)
	                        ->setCellValue('D' . $kolom, $pengguna->nama_ktp)
	                        ->setCellValue('E' . $kolom, $pengguna->nohp)
	                        ->setCellValue('F' . $kolom, date('j F Y', strtotime($pengguna->TGL_Lamar)));

	            $kolom++;
	            $nomor++;

	        }

	        $writer = new Xlsx($spreadsheet);

	        header('Content-Type: application/vnd.ms-excel');
		  	header('Content-Disposition: attachment;filename="Data Lolos MCU.xlsx"');
		  	header('Cache-Control: max-age=0');

		  	$writer->save('php://output');
		}
	}

	public function riwayat_aksi_mcu()
	{
		$tgl_awal 	= $this->input->post('tgl_awal');
		$tgl_akhir 	= $this->input->post('tgl_akhir');
		$bidang		= $this->input->post('bidang');

		if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
				redirect('admin/riwayat_status_mcu');
			}else{
				$data['status'] = $this->m_admin->model_status();
				$data['pelamar'] = $this->m_admin->r_status_mcu_cari($tgl_awal,$tgl_akhir,$bidang);
				$data['loker'] = $this->m_loker->lihat_loker_aktif();
				if ($this->session->userdata('ses_status') == 1)
					{					
						$this->load->view('admin/temp1_admin',$data);
						$this->load->view('admin/reporting/v_riwayat_mcu', $data);
						$this->load->view('admin/temp2_admin');
					}else{
						$this->load->view('admin/temp1_hrd',$data);
						$this->load->view('admin/reporting/v_riwayat_mcu', $data);
						$this->load->view('admin/temp2_admin');
					}
			}
	}

	public function aksi_interview_lanjutan()
	{
		$id 		= $this->input->post('btn');
		$tgl_awal 	= $this->input->post('tgl_awal');
		$tgl_akhir 	= $this->input->post('tgl_akhir');
		$bidang		= $this->input->post('bidang');

		if ($id == 'Print') {
			if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
				$data['pelamar'] = $this->m_admin->m_status_interview_lanjut();
			}else{
				$data['pelamar'] = $this->m_pelamar->tampil_cetak_interview_lanjutan($tgl_awal,$tgl_akhir,$bidang);	
			}			
			$this->load->library('pdf');
		    $this->pdf->setPaper('A4', 'potrait');
		    $this->pdf->filename = "Data Lolos Interview Lanjutan.pdf";
		    $this->pdf->load_view('admin/reporting/cetak_laporan_interview_lanjutan', $data);

		}elseif ($id == 'Cari') {
			if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
				redirect('admin/status_interview_lanjutan');
			}else{
				$data['status'] = $this->m_admin->model_status();
				$data['pelamar'] = $this->m_admin->m_status_intervew_lanjut_cari($tgl_awal,$tgl_akhir,$bidang);
				$data['loker'] = $this->m_loker->lihat_loker_aktif();
				if ($this->session->userdata('ses_status') == 1)
					{					
						$this->load->view('admin/temp1_admin',$data);
						$this->load->view('admin/reporting/v_reporting_interview_lanjutan', $data);
						$this->load->view('admin/temp2_admin');
					}else{
						$this->load->view('admin/temp1_hrd',$data);
						$this->load->view('admin/reporting/v_reporting_interview_lanjutan', $data);
						$this->load->view('admin/temp2_admin');
					}
			}					
		}
		else{
			if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
				$semua_pengguna = $this->m_admin->m_status_interview_lanjut();
			}else{
				$semua_pengguna = $this->m_pelamar->tampil_excel_interview_lanjutan($tgl_awal,$tgl_akhir,$bidang);
			}

	        $spreadsheet = new Spreadsheet;

	        $spreadsheet->setActiveSheetIndex(0)
	                    ->setCellValue('A1', 'No')
	                    ->setCellValue('B1', 'Bidang')
	                    ->setCellValue('C1', 'NIK')
	                    ->setCellValue('D1', 'Nama')
	                    ->setCellValue('E1', 'No.Telp/HP')
	                    ->setCellValue('F1', 'TGL Daftar');

	        $kolom = 2;
	        $nomor = 1;
	        foreach($semua_pengguna->result() as $pengguna) {

	            $spreadsheet->setActiveSheetIndex(0)
	                        ->setCellValue('A' . $kolom, $nomor)
	                        ->setCellValue('B' . $kolom, $pengguna->lok_nama)
	                        ->setCellValue('C' . $kolom, $pengguna->nik_ktp)
	                        ->setCellValue('D' . $kolom, $pengguna->nama_ktp)
	                        ->setCellValue('E' . $kolom, $pengguna->nohp)
	                        ->setCellValue('F' . $kolom, date('j F Y', strtotime($pengguna->TGL_Lamar)));

	            $kolom++;
	            $nomor++;

	        }

	        $writer = new Xlsx($spreadsheet);

	        header('Content-Type: application/vnd.ms-excel');
		  	header('Content-Disposition: attachment;filename="Data Lolos Interview Lanjutan.xlsx"');
		  	header('Cache-Control: max-age=0');

		  	$writer->save('php://output');
		}
	}

	public function riwayat_aksi_interview_lanjutan()
	{
		$tgl_awal 	= $this->input->post('tgl_awal');
		$tgl_akhir 	= $this->input->post('tgl_akhir');
		$bidang		= $this->input->post('bidang');

		if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
				redirect('admin/riwayat_status_interview_lanjutan');
			}else{
				$data['status'] = $this->m_admin->model_status();
				$data['pelamar'] = $this->m_admin->r_status_intervew_lanjut_cari($tgl_awal,$tgl_akhir,$bidang);
				$data['loker'] = $this->m_loker->lihat_loker_aktif();
				if ($this->session->userdata('ses_status') == 1)
					{					
						$this->load->view('admin/temp1_admin',$data);
						$this->load->view('admin/reporting/v_riwayat_interview_lanjutan', $data);
						$this->load->view('admin/temp2_admin');
					}else{
						$this->load->view('admin/temp1_hrd',$data);
						$this->load->view('admin/reporting/v_riwayat_interview_lanjutan', $data);
						$this->load->view('admin/temp2_admin');
					}
			}
	}

	public function aksi_hire()
	{
		$id 		= $this->input->post('btn');
		$tgl_awal 	= $this->input->post('tgl_awal');
		$tgl_akhir 	= $this->input->post('tgl_akhir');
		$bidang		= $this->input->post('bidang');

		if ($id == 'Print') {
			if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
				$data['pelamar'] = $this->m_admin->m_status_hire();
			}else{
				$data['pelamar'] = $this->m_pelamar->tampil_cetak_hire($tgl_awal,$tgl_akhir,$bidang);	
			}
			$this->load->library('pdf');
		    $this->pdf->setPaper('A4', 'potrait');
		    $this->pdf->filename = "Data Lolos Hire/Waiting Join.pdf";
		    $this->pdf->load_view('admin/reporting/cetak_laporan_hire', $data);

		}elseif ($id == 'Cari') {
			if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
				redirect('admin/status_hire');
			}else{
				$data['status'] = $this->m_admin->model_status();
				$data['pelamar'] = $this->m_admin->m_status_hire_cari($tgl_awal,$tgl_akhir,$bidang);
				$data['loker'] = $this->m_loker->lihat_loker_aktif();
				if ($this->session->userdata('ses_status') == 1)
					{					
						$this->load->view('admin/temp1_admin',$data);
						$this->load->view('admin/reporting/v_reporting_hire', $data);
						$this->load->view('admin/temp2_admin');
					}else{
						$this->load->view('admin/temp1_hrd',$data);
						$this->load->view('admin/reporting/v_reporting_hire', $data);
						$this->load->view('admin/temp2_admin');
					}
			}					
		}
		else{
			if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
				$semua_pengguna = $this->m_admin->m_status_hire();
			}else{
				$semua_pengguna = $this->m_pelamar->tampil_excel_hire($tgl_awal,$tgl_akhir,$bidang);
			}

	        $spreadsheet = new Spreadsheet;

	        $spreadsheet->setActiveSheetIndex(0)
	                    ->setCellValue('A1', 'No')
	                    ->setCellValue('B1', 'Bidang')
	                    ->setCellValue('C1', 'NIK')
	                    ->setCellValue('D1', 'Nama')
	                    ->setCellValue('E1', 'No.Telp/HP')
	                    ->setCellValue('F1', 'TGL Daftar');

	        $kolom = 2;
	        $nomor = 1;
	        foreach($semua_pengguna->result() as $pengguna) {

	            $spreadsheet->setActiveSheetIndex(0)
	                        ->setCellValue('A' . $kolom, $nomor)
	                        ->setCellValue('B' . $kolom, $pengguna->lok_nama)
	                        ->setCellValue('C' . $kolom, $pengguna->nik_ktp)
	                        ->setCellValue('D' . $kolom, $pengguna->nama_ktp)
	                        ->setCellValue('E' . $kolom, $pengguna->nohp)
	                        ->setCellValue('F' . $kolom, date('j F Y', strtotime($pengguna->TGL_Lamar)));

	            $kolom++;
	            $nomor++;

	        }

	        $writer = new Xlsx($spreadsheet);

	        header('Content-Type: application/vnd.ms-excel');
		  	header('Content-Disposition: attachment;filename="Data Lolos Hire/Waiting Join.xlsx"');
		  	header('Cache-Control: max-age=0');

		  	$writer->save('php://output');
		}
	}

	public function riwayat_aksi_hire()
	{
		$tgl_awal 	= $this->input->post('tgl_awal');
		$tgl_akhir 	= $this->input->post('tgl_akhir');
		$bidang		= $this->input->post('bidang');

		if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
				redirect('admin/riwayat_status_hire');
			}else{
				$data['status'] = $this->m_admin->model_status();
				$data['pelamar'] = $this->m_admin->r_status_hire_cari($tgl_awal,$tgl_akhir,$bidang);
				$data['loker'] = $this->m_loker->lihat_loker_aktif();
				if ($this->session->userdata('ses_status') == 1)
					{					
						$this->load->view('admin/temp1_admin',$data);
						$this->load->view('admin/reporting/v_riwayat_hire', $data);
						$this->load->view('admin/temp2_admin');
					}else{
						$this->load->view('admin/temp1_hrd',$data);
						$this->load->view('admin/reporting/v_riwayat_hire', $data);
						$this->load->view('admin/temp2_admin');
					}
			}
	}

	public function aksi_karyawan()
	{
		$id 		= $this->input->post('btn');
		$tgl_awal 	= $this->input->post('tgl_awal');
		$tgl_akhir 	= $this->input->post('tgl_akhir');
		$bidang		= $this->input->post('bidang');

		if ($id == 'Print') {
			if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
				$data['pelamar'] = $this->m_pelamar->m_status_karyawan();
			}else{
				$data['pelamar'] = $this->m_pelamar->tampil_cetak_karyawan($tgl_awal,$tgl_akhir,$bidang);	
			}
			
			$this->load->library('pdf');
		    $this->pdf->setPaper('A4', 'potrait');
		    $this->pdf->filename = "Laporan Data Karyawan.pdf";
		    $this->pdf->load_view('admin/reporting/cetak_laporan_karyawan', $data);

		}elseif ($id == 'Cari') {
			if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
				redirect('admin/status_karyawan');
			}else{
				$data['status'] = $this->m_admin->model_status();
				$data['pelamar'] = $this->m_admin->m_status_karyawan_cari($tgl_awal,$tgl_akhir,$bidang);
				$data['loker'] = $this->m_loker->lihat_loker_aktif();
				if ($this->session->userdata('ses_status') == 1)
					{					
						$this->load->view('admin/temp1_admin',$data);
						$this->load->view('admin/reporting/v_reporting_karyawan', $data);
						$this->load->view('admin/temp2_admin');
					}else{
						$this->load->view('admin/temp1_hrd',$data);
						$this->load->view('admin/reporting/v_reporting_karyawan', $data);
						$this->load->view('admin/temp2_admin');
					}
			}					
					
		}
		else{
			if ($tgl_awal == NULL && $tgl_akhir == NULL && $bidang == NULL) {
				$semua_pengguna = $this->m_admin->m_status_karyawan();
			}else{
				$semua_pengguna = $this->m_pelamar->tampil_excel_karyawan($tgl_awal,$tgl_akhir,$bidang);
			}

	        $spreadsheet = new Spreadsheet;

	        $spreadsheet->setActiveSheetIndex(0)
	                    ->setCellValue('A1', 'No')
	                    ->setCellValue('B1', 'Bidang')
	                    ->setCellValue('C1', 'NIK')
	                    ->setCellValue('D1', 'Nama')
	                    ->setCellValue('E1', 'No.Telp/HP')
	                    ->setCellValue('F1', 'TGL Daftar');

	        $kolom = 2;
	        $nomor = 1;
	        foreach($semua_pengguna->result() as $pengguna) {

	            $spreadsheet->setActiveSheetIndex(0)
	                        ->setCellValue('A' . $kolom, $nomor)
	                        ->setCellValue('B' . $kolom, $pengguna->lok_nama)
	                        ->setCellValue('C' . $kolom, $pengguna->nik_ktp)
	                        ->setCellValue('D' . $kolom, $pengguna->nama_ktp)
	                        ->setCellValue('E' . $kolom, $pengguna->nohp)
	                        ->setCellValue('F' . $kolom, date('j F Y', strtotime($pengguna->TGL_Lamar)));

	            $kolom++;
	            $nomor++;

	        }

	        $writer = new Xlsx($spreadsheet);

	        header('Content-Type: application/vnd.ms-excel');
		  	header('Content-Disposition: attachment;filename="Laporan Data Karyawan.xlsx"');
		  	header('Cache-Control: max-age=0');

		  	$writer->save('php://output');
		}
	}

	public function tambah_personalia()
	{
		if (isset($_POST)) {
			$this->m_pelamar->tambah_area();
			$this->m_pelamar->tambah_kawin();

			$this->session->set_flashdata('msg',
				'<div class="alert alert-success alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Berhasil Menyimpan
				</div>');
			
			redirect('admin/status_karyawan');
		}
		else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Gagal Dalam Penyimpanan
				</div>');
			
			redirect('admin/status_karyawan');
		}
	}

	public function gonewkelengkapan()
	{
		$user = $this->session->userdata('ses_admin');
		if ($user == "") {
			$this->load->view('login/v_loginadmin');
		}else{
			if ($this->session->userdata('ses_status') == 1)
			{
				if (isset($_GET['us']) ) {
		            $id = $_GET['us'];
		            
		            $data['status'] 	= $this->m_admin->model_status();
					$data['pelamar'] 	= $this->m_admin->m_status_karyawan();
					$data['darurat'] 	= $this->m_pelamar->tampil_darurat($id);
					$data['karyawan']	= $this->m_pelamar->get_karyawan($id);
					$data['pendidikan']	= $this->m_pelamar->lihat_pendidikan($id);

					$this->load->view('admin/temp1_admin',$data);
					$this->load->view('admin/reporting/v_newkaryawanlengkap',$data);
					$this->load->view('admin/temp2_admin');

		        }else{
		        	echo "no";
		        }

			}else{
				if (isset($_GET['us']) ) {
		            $id = $_GET['us'];
		            
		            $data['status'] 	= $this->m_admin->model_status();
					$data['pelamar'] 	= $this->m_admin->m_status_karyawan();
					$data['darurat'] 	= $this->m_pelamar->tampil_darurat($id);
					$data['karyawan']	= $this->m_pelamar->get_karyawan($id);

					$this->load->view('admin/temp1_admin',$data);
					$this->load->view('admin/reporting/v_newkaryawanlengkap',$data);
					$this->load->view('admin/temp2_admin');

		        }else{
		        	echo "no";
		        }
			}			
		}
	}

	public function view_data_lengkap()
	{
		$user = $this->session->userdata('ses_admin');
		if ($user == "") {
			$this->load->view('login/v_loginadmin');
		}else{
			if ($this->session->userdata('ses_status') == 1)
			{
				if (isset($_GET['us']) ) {
		            $id = $_GET['us'];
		            
		            $data['status'] 		= $this->m_admin->model_status();
					$data['akun'] 			= $this->m_pelamar->lihat_akun($id);
					$data['identitas']		= $this->m_pelamar->lihat_identitas($id);
					$data['alamat'] 		= $this->m_pelamar->lihat_alamat($id);
					$data['sim']			= $this->m_pelamar->lihat_sim($id);
					$data['keluarga']		= $this->m_pelamar->lihat_keluarga($id);
					$data['darurat'] 		= $this->m_pelamar->tampil_darurat($id);
					$data['karyawan']		= $this->m_pelamar->get_karyawan($id);
					$data['pendidikan']		= $this->m_pelamar->lihat_pendidikan($id);
					$data['pertanyaan']		= $this->m_pelamar->lihat_pertanyaan2($id);
					$data['status_kawin']	= $this->m_pelamar->lihat_status_kawin($id);

					$this->load->view('admin/temp1_admin',$data);
					$this->load->view('admin/reporting/v_detail_report_karyawan_lengkap',$data);
					$this->load->view('admin/temp2_admin');

		        }else{
		        	echo "no";
		        }

			}else{
				if (isset($_GET['us']) ) {
		            $id = $_GET['us'];
		            
		            $data['status'] 		= $this->m_admin->model_status();
					$data['akun'] 			= $this->m_pelamar->lihat_akun($id);
					$data['identitas']		= $this->m_pelamar->lihat_identitas($id);
					$data['alamat'] 		= $this->m_pelamar->lihat_alamat($id);
					$data['sim']			= $this->m_pelamar->lihat_sim($id);
					$data['keluarga']		= $this->m_pelamar->lihat_keluarga($id);
					$data['darurat'] 		= $this->m_pelamar->tampil_darurat($id);
					$data['karyawan']		= $this->m_pelamar->get_karyawan($id);
					$data['pendidikan']		= $this->m_pelamar->lihat_pendidikan($id);
					$data['pertanyaan']		= $this->m_pelamar->lihat_pertanyaan2($id);
					$data['status_kawin']	= $this->m_pelamar->lihat_status_kawin($id);

					$this->load->view('admin/temp1_admin',$data);
					$this->load->view('admin/reporting/v_detail_report_karyawan_lengkap',$data);
					$this->load->view('admin/temp2_admin');

		        }else{
		        	echo "no";
		        }
			}			
		}
	}

	public function cetak_identitas_karyawan()
	{
		if (isset($_GET['us']) ) {
	            $id = $_GET['us'];
	            $data['akun'] 			= $this->m_pelamar->lihat_akun($id);
	            $data['kepesertaan']	= $this->m_pelamar->lihat_kepesertaan($id);
	            $data['pertanyaan']		= $this->m_pelamar->lihat_pertanyaan2($id);
	            $data['sim'] 			= $this->m_pelamar->lihat_sim($id);
	            $data['identitas']		= $this->m_pelamar->lihat_identitas($id);
	            $data['alamat']			= $this->m_pelamar->lihat_alamat($id);
	            $data['area']			= $this->m_pelamar->lihat_area($id);
	            $data['pendidikan']		= $this->m_pelamar->lihat_pendidikan($id);
	            $data['keluarga']		= $this->m_pelamar->lihat_keluarga($id);
	            $data['kawin']			= $this->m_pelamar->lihat_status_kawin($id);
	            $data['darurat']		= $this->m_pelamar->cetak_darurat($id);
 				$this->load->library('pdf');
			    $this->pdf->setPaper('F4', 'potrait');
			    $this->pdf->filename = "Report-Identitas-Karyawan.pdf";
			    $this->pdf->load_view('admin/reporting/cetak_laporan_karyawan_lengkap',$data);
	        }else{
	        	echo "no";
	        }	
		
	}
	
}
 ?>