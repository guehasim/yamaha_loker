<?php 

class loker extends CI_Controller
{
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('hrd/m_loker');
		$this->load->library('session');
	}

	//khusus admin
	public function index(){

		$user = $this->session->userdata('ses_hrd');
		if ($user == "") {
			$this->load->view('login/temp_login');
			$this->load->view('login/v_login_hrd');
		}else{		
			$data['loker'] = $this->m_loker->lihat_loker();
			$this->load->view('hrd/temp1');
			$this->load->view('hrd/loker/v_loker', $data);
			$this->load->view('hrd/temp2');
		}
	}

	public function newloker()
	{
		$this->load->view('hrd/temp1');
		$this->load->view('hrd/loker/v_newloker');		
		$this->load->view('hrd/temp2');
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
			
			redirect('loker');
		}
		else{
			$this->session->set_flashdata('msg',
				'<div class="alert alert-danger alert-dismissable">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                Gagal Dalam Penyimpanan
				</div>');
			
			redirect('loker');
		}
	}

	public function getloker()
	{

		if (isset($_GET['us']) ) {
            $id = $_GET['us'];
            $data['loker'] = $this->m_loker->getloker($id);         
            $this->load->view('admin/temp');
            $this->load->view('admin/loker/v_updateloker',$data);
            $this->load->view('admin/temp2');
        }else{
        	echo "no";
        }
	}

	public function update_loker()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$status = $this->input->post('status');

		$data = array(
			'lok_nama'		=> $nama,
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
		redirect('loker');
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
        redirect('loker');

    }
	//Khusus Admin
}
 ?>