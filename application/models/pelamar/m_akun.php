<?php 

class m_akun extends CI_Model
{
	public function tambah_akun(){
		
		$data = array(
			'ID_Pelamar'=> null,
			'nik_ktp'	=> $this->input->post('nik'),
			'nama_ktp'	=> $this->input->post('nama'),
			'user'		=> $this->input->post('user'),
			'email'		=> $this->input->post('email'),
			'pass'		=> base64_encode($this->input->post('pass'))
			);

		$this->db->insert('m_pelamar',$data);
	}

	public function getloker($id)
	{
		$query = $this->db->query("SELECT * FROM m_hrd WHERE hrd_id = $id ");
		return $query;
	}

	public function update($where,$data,$table)
	{
		$this->db->where($where);
		$this->db->update($table,$data);
	}

	public function hapus_hrd($id)
    {
        $this->db->where('hrd_id',$id);
        $this->db->delete('m_hrd');
    }
}
 ?>