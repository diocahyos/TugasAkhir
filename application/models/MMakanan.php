<?php
class MMakanan extends CI_Model
{
	function get_last_id()
	{
		$query = $this->db->query("SELECT id_makanan FROM `makanan` ORDER BY id_makanan DESC LIMIT 1");
		return $query->row();
	}

	function get_makanan_by_id($id_makanan)
	{
		$query = $this->db->query("SELECT * FROM makanan ma
						JOIN kandungan ka ON ma.id_makanan=ka.id_makanan
						JOIN zatgizi zg ON ka.id_zatgizi=zg.id_zatgizi
						WHERE ma.id_makanan=$id_makanan");
		return $query->row();
	}

	function get_makanan_with_limit($kategori, $total)
	{
		$query = $this->db->query("SELECT id_makanan FROM `makanan` 
						WHERE kategori_makanan = $kategori 
						ORDER BY kode_makanan DESC 
						LIMIT $total");
		return $query->result();
	}

	function get_makanan_pokok()
	{
		$query = $this->db->query("SELECT * FROM makanan ma
						JOIN kandungan ka ON ma.id_makanan=ka.id_makanan
						JOIN zatgizi zg ON ka.id_zatgizi=zg.id_zatgizi
						WHERE ma.kategori_makanan=1");
		return $query->result();
	}

	function get_total_makanan_pokok()
	{
		$query = $this->db->query("SELECT * FROM makanan WHERE kategori_makanan=1");
		return $query->num_rows();
	}

	function get_sumber_hewani()
	{
		$query = $this->db->query("SELECT * FROM makanan ma
						JOIN kandungan ka ON ma.id_makanan=ka.id_makanan
						JOIN zatgizi zg ON ka.id_zatgizi=zg.id_zatgizi
						WHERE ma.kategori_makanan=2");
		return $query->result();
	}

	function get_total_sumber_hewani()
	{
		$query = $this->db->query("SELECT * FROM makanan WHERE kategori_makanan=2");
		return $query->num_rows();
	}

	function get_sumber_nabati()
	{
		$query = $this->db->query("SELECT * FROM makanan ma
						JOIN kandungan ka ON ma.id_makanan=ka.id_makanan
						JOIN zatgizi zg ON ka.id_zatgizi=zg.id_zatgizi
						WHERE ma.kategori_makanan=3");
		return $query->result();
	}

	function get_total_sumber_nabati()
	{
		$query = $this->db->query("SELECT * FROM makanan WHERE kategori_makanan=3");
		return $query->num_rows();
	}

	function get_sayuran()
	{
		$query = $this->db->query("SELECT * FROM makanan ma
						JOIN kandungan ka ON ma.id_makanan=ka.id_makanan
						JOIN zatgizi zg ON ka.id_zatgizi=zg.id_zatgizi
						WHERE ma.kategori_makanan=4");
		return $query->result();
	}

	function get_total_sayuran()
	{
		$query = $this->db->query("SELECT * FROM makanan WHERE kategori_makanan=4");
		return $query->num_rows();
	}

	function get_buah()
	{
		$query = $this->db->query("SELECT * FROM makanan ma
						JOIN kandungan ka ON ma.id_makanan=ka.id_makanan
						JOIN zatgizi zg ON ka.id_zatgizi=zg.id_zatgizi
						WHERE ma.kategori_makanan=5");
		return $query->result();
	}

	function get_total_buah()
	{
		$query = $this->db->query("SELECT * FROM makanan WHERE kategori_makanan=5");
		return $query->num_rows();
	}

	// function get_buah_by_id($id_makanan)
	// {
	// 	$this->db->where('id_makanan', $id_makanan);
	// 	$query = $this->db->get('buah');
	// 	return $query->row();
	// }

	// function edit_buah($id_makanan, $data)
	// {
	// 	$this->db->where('id_makanan', $id_makanan);
	// 	if ($this->db->update('buah', $data)) {
	// 		$this->session->set_userdata('typeNotif', 'successEdited');
	// 		return TRUE;
	// 	} else {
	// 		$this->session->set_userdata('typeNotif', 'errorEdited');
	// 		return FALSE;
	// 	}
	// }

	function input_makanan($data)
	{
		if ($this->db->insert('makanan', $data)) {
			$this->session->set_userdata('typeNotif', 'successAddData');
		} else
			$this->session->set_userdata('typeNotif', 'errorAddData');
	}

	function input_zatgizi($data)
	{
		if ($this->db->insert('zatgizi', $data)) {
			$this->session->set_userdata('typeNotif', 'successAddData');
		} else
			$this->session->set_userdata('typeNotif', 'errorAddData');
	}

	function input_kandungan($data)
	{
		if ($this->db->insert('kandungan', $data)) {
			$this->session->set_userdata('typeNotif', 'successAddData');
		} else
			$this->session->set_userdata('typeNotif', 'errorAddData');
	}

	function edit_makanan($id_makanan, $data)
	{
		$this->db->where('id_makanan', $id_makanan);
		if ($this->db->update('makanan', $data)) {
			$this->session->set_userdata('typeNotif', 'successEdited');
			return TRUE;
		} else {
			$this->session->set_userdata('typeNotif', 'errorEdited');
			return FALSE;
		}
	}

	function edit_zatgizi($id_zatgizi, $data)
	{
		$this->db->where('id_zatgizi', $id_zatgizi);
		if ($this->db->update('zatgizi', $data)) {
			$this->session->set_userdata('typeNotif', 'successEdited');
			return TRUE;
		} else {
			$this->session->set_userdata('typeNotif', 'errorEdited');
			return FALSE;
		}
	}

	function edit_kode_makanan($data, $id_makanan)
	{
		$this->db->where('id_makanan', $id_makanan);
		$this->db->update('makanan', $data);
	}

	function delete_makanan_by_id($id)
	{
		if ($this->db->delete('kandungan', array('id' => $id))) {
			if ($this->db->delete('zatgizi', array('id_zatgizi' => $id))) {
				if ($this->db->delete('makanan', array('id_makanan' => $id))) {
					$this->session->set_userdata('typeNotif', 'successDelete');
					return TRUE;
				} else {
					$this->session->set_userdata('typeNotif', 'errorDelete');
					return FALSE;
				}
			} else {
				$this->session->set_userdata('typeNotif', 'errorDelete');
				return FALSE;
			}
		} else {
			$this->session->set_userdata('typeNotif', 'errorDelete');
			return FALSE;
		}
	}
}
