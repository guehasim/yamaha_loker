<?php 

class m_loker extends CI_Model
{
	
	public function lihat_loker(){
		$query = $this->db->query("SELECT * FROM m_loker ORDER BY ID_Loker DESC");
		return $query;
	}

	public function lihat_loker_aktif()
	{
		$query = $this->db->query("SELECT * FROM m_loker WHERE lok_status=0 ORDER BY ID_Loker DESC");
		return $query;
	}

	public function tambah_loker(){
		
		$data = array(
			'ID_Loker'			=> null,
			'lok_nama'			=> $this->input->post('nama'),
			'lok_tgl_awal'	=> $this->input->post('tgl_start'),
			'lok_tgl_akhir'		=> $this->input->post('tgl_end'),
			'lok_status'		=> 1
			);

		$this->db->insert('m_loker',$data);
	}

	public function getloker($id)
	{
		$query = $this->db->query("SELECT * FROM m_loker WHERE ID_Loker=$id");
		return $query;
	}

	public function update($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_loker($id)
    {
        $this->db->where('ID_Loker',$id);
        $this->db->delete('m_loker');
    }
}
 ?>