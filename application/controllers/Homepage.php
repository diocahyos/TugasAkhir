<?php
class Homepage extends CI_Controller
{
	public function index()
	{
		$data['title'] = "Homepage";
		$data['content'] = "vhomepage.php";
		$this->load->view('vtemplate', $data);
	}
}
