<?php
class Makanan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('MMakanan');
	}

	public function tes()
	{
		$this->load->view('tes');
	}

	public function data_makanan($kategori)
	{
		if ($kategori == 1) {
			$data['title'] = 'Data Makanan Pokok';
			$data['kategori'] = $kategori;
			$data['lists'] = $this->MMakanan->get_makanan_pokok();
		} else if ($kategori == 2) {
			$data['title'] = 'Data Sumber Hewani';
			$data['kategori'] = $kategori;
			$data['lists'] = $this->MMakanan->get_sumber_hewani();
		} else if ($kategori == 3) {
			$data['title'] = 'Data Sumber Nabati';
			$data['kategori'] = $kategori;
			$data['lists'] = $this->MMakanan->get_sumber_nabati();
		} else if ($kategori == 4) {
			$data['title'] = 'Data Sayuran';
			$data['kategori'] = $kategori;
			$data['lists'] = $this->MMakanan->get_sayuran();
		} else {
			$data['title'] = 'Data Buah - Buahan';
			$data['kategori'] = $kategori;
			$data['lists'] = $this->MMakanan->get_buah();
		}

		$data['js'] = 'datatable_js';
		$data['content'] = 'vmakanan.php';
		$this->load->view('vtemplate', $data);
	}

	public function input_makanan()
	{
		if ($this->input->post('process')) {
			$input = $this->input->post(NULL, TRUE);
			extract($input);

			$id = $this->MMakanan->get_last_id();

			$id = $id->id_makanan + 1;
			$total = 0;

			$nkarbohidrat = 0;
			$nprotein = 0;
			$nlemak = 0;
			$nnatrium = 0;
			$nkalori = 0;
			$nkalium = 0;

			if ($kategori == 1) {
				$total = $this->MMakanan->get_total_makanan_pokok();

				$nkarbohidrat = round($karbohidrat * 1.5, 2);
				$nprotein = round($protein * 1.5, 2);
				$nlemak = round($lemak * 1.5, 2);
				$nnatrium = round($natrium * 1.5, 2);
				$nkalori = round($kalori * 1.5, 2);
				$nkalium = round($kalium * 1.5, 2);
			} else if ($kategori == 2) {
				$total = $this->MMakanan->get_total_sumber_hewani();

				$nkarbohidrat = round($karbohidrat * 0.8, 2);
				$nprotein = round($protein * 0.8, 2);
				$nlemak = round($lemak * 0.8, 2);
				$nnatrium = round($natrium * 0.8, 2);
				$nkalori = round($kalori * 0.8, 2);
				$nkalium = round($kalium * 0.8, 2);
			} else if ($kategori == 3) {
				$total = $this->MMakanan->get_total_sumber_nabati();

				$nkarbohidrat = round($karbohidrat * 0.5, 2);
				$nprotein = round($protein * 0.5, 2);
				$nlemak = round($lemak * 0.5, 2);
				$nnatrium = round($natrium * 0.5, 2);
				$nkalori = round($kalori * 0.5, 2);
				$nkalium = round($kalium * 0.5, 2);
			} else if ($kategori == 4) {
				$total = $this->MMakanan->get_total_sayuran();

				$nkarbohidrat = round($karbohidrat * 2.5, 2);
				$nprotein = round($protein * 2.5, 2);
				$nlemak = round($lemak * 2.5, 2);
				$nnatrium = round($natrium * 2.5, 2);
				$nkalori = round($kalori * 2.5, 2);
				$nkalium = round($kalium * 2.5, 2);
			} else {
				$total = $this->MMakanan->get_total_buah();

				$nkarbohidrat = round($karbohidrat * 1.5, 2);
				$nprotein = round($protein * 1.5, 2);
				$nlemak = round($lemak * 1.5, 2);
				$nnatrium = round($natrium * 1.5, 2);
				$nkalori = round($kalori * 1.5, 2);
				$nkalium = round($kalium * 1.5, 2);
			}

			$data_makanan = array(
				'id_makanan' => $id,
				'kode_makanan' => $total + 1,
				'kategori_makanan' => $kategori,
				'nama' => $nama,
			);
			$this->MMakanan->input_makanan($data_makanan);

			$data_zatgizi = array(
				'id_zatgizi' => $id,
				'karbohidrat' => $nkarbohidrat,
				'protein' => $nprotein,
				'lemak' => $nlemak,
				'natrium' => $nnatrium,
				'kalori' => $nkalori,
				'kalium' => $nkalium
			);
			$this->MMakanan->input_zatgizi($data_zatgizi);

			$data_kandungan = array(
				'id' => $id,
				'id_makanan' => $id,
				'id_zatgizi' => $id,
			);
			$this->MMakanan->input_kandungan($data_kandungan);

			redirect('makanan/data_makanan/' . $kategori);

			// Jika bukan proses penginputan data
		} else {
			$data['title'] = 'Input Data Makanan';
			$data['content'] = 'vinput_makanan.php';
			$this->load->view('vtemplate', $data);
		}
	}

	public function edit_makanan($kategori, $id)
	{
		if ($this->input->post('process')) {

			$input = $this->input->post(NULL, TRUE);
			extract($input);

			$nkarbohidrat = 0;
			$nprotein = 0;
			$nlemak = 0;
			$nnatrium = 0;
			$nkalori = 0;
			$nkalium = 0;

			if ($kategori == 1) {

				$nkarbohidrat = round($karbohidrat * 1.5, 2);
				$nprotein = round($protein * 1.5, 2);
				$nlemak = round($lemak * 1.5, 2);
				$nnatrium = round($natrium * 1.5, 2);
				$nkalori = round($kalori * 1.5, 2);
				$nkalium = round($kalium * 1.5, 2);
			} else if ($kategori == 2) {

				$nkarbohidrat = round($karbohidrat * 0.8, 2);
				$nprotein = round($protein * 0.8, 2);
				$nlemak = round($lemak * 0.8, 2);
				$nnatrium = round($natrium * 0.8, 2);
				$nkalori = round($kalori * 0.8, 2);
				$nkalium = round($kalium * 0.8, 2);
			} else if ($kategori == 3) {

				$nkarbohidrat = round($karbohidrat * 0.5, 2);
				$nprotein = round($protein * 0.5, 2);
				$nlemak = round($lemak * 0.5, 2);
				$nnatrium = round($natrium * 0.5, 2);
				$nkalori = round($kalori * 0.5, 2);
				$nkalium = round($kalium * 0.5, 2);
			} else if ($kategori == 4) {

				$nkarbohidrat = round($karbohidrat * 2.5, 2);
				$nprotein = round($protein * 2.5, 2);
				$nlemak = round($lemak * 2.5, 2);
				$nnatrium = round($natrium * 2.5, 2);
				$nkalori = round($kalori * 2.5, 2);
				$nkalium = round($kalium * 2.5, 2);
			} else {

				$nkarbohidrat = round($karbohidrat * 1.5, 2);
				$nprotein = round($protein * 1.5, 2);
				$nlemak = round($lemak * 1.5, 2);
				$nnatrium = round($natrium * 1.5, 2);
				$nkalori = round($kalori * 1.5, 2);
				$nkalium = round($kalium * 1.5, 2);
			}

			$data_makanan = array(
				'nama' => $nama,
			);
			$this->MMakanan->edit_makanan($id, $data_makanan);

			$data_zatgizi = array(
				'karbohidrat' => $nkarbohidrat,
				'protein' => $nprotein,
				'lemak' => $nlemak,
				'natrium' => $nnatrium,
				'kalori' => $nkalori,
				'kalium' => $nkalium
			);
			$this->MMakanan->edit_zatgizi($id, $data_zatgizi);
			redirect('makanan/data_makanan/' . $kategori);

			// Jika bukan proses pengeditan data
		} else {

			$karbohidrat = 0;
			$protein = 0;
			$lemak = 0;
			$natrium = 0;
			$kalori = 0;
			$kalium = 0;

			$makanan = $this->MMakanan->get_makanan_by_id($id);

			if ($kategori == 1) {
				$data['title'] = 'Ubah Data Makanan Pokok';
				$data['kategori'] = $kategori;

				$karbohidrat = round($makanan->karbohidrat / 1.5, 2);
				$protein = round($makanan->protein / 1.5, 2);
				$lemak = round($makanan->lemak / 1.5, 2);
				$natrium = round($makanan->natrium / 1.5, 2);
				$kalori = round($makanan->kalori / 1.5, 2);
				$kalium = round($makanan->kalium / 1.5, 2);
			} else if ($kategori == 2) {
				$data['title'] = 'Ubah Data Sumber Hewani';
				$data['kategori'] = $kategori;

				$karbohidrat = round($makanan->karbohidrat / 0.8, 2);
				$protein = round($makanan->protein / 0.8, 2);
				$lemak = round($makanan->lemak / 0.8, 2);
				$natrium = round($makanan->natrium / 0.8, 2);
				$kalori = round($makanan->kalori / 0.8, 2);
				$kalium = round($makanan->kalium / 0.8, 2);
			} else if ($kategori == 3) {
				$data['title'] = 'Ubah Data Sumber Nabati';
				$data['kategori'] = $kategori;

				$karbohidrat = round($makanan->karbohidrat / 0.5, 2);
				$protein = round($makanan->protein / 0.5, 2);
				$lemak = round($makanan->lemak / 0.5, 2);
				$natrium = round($makanan->natrium / 0.5, 2);
				$kalori = round($makanan->kalori / 0.5, 2);
				$kalium = round($makanan->kalium / 0.5, 2);
			} else if ($kategori == 4) {
				$data['title'] = 'Ubah Data Sayuran';
				$data['kategori'] = $kategori;

				$karbohidrat = round($makanan->karbohidrat / 2.5, 2);
				$protein = round($makanan->protein / 2.5, 2);
				$lemak = round($makanan->lemak / 2.5, 2);
				$natrium = round($makanan->natrium / 2.5, 2);
				$kalori = round($makanan->kalori / 2.5, 2);
				$kalium = round($makanan->kalium / 2.5, 2);
			} else {
				$data['title'] = 'Ubah Data Buah - Buahan';
				$data['kategori'] = $kategori;

				$karbohidrat = round($makanan->karbohidrat / 1.5, 2);
				$protein = round($makanan->protein / 1.5, 2);
				$lemak = round($makanan->lemak / 1.5, 2);
				$natrium = round($makanan->natrium / 1.5, 2);
				$kalori = round($makanan->kalori / 1.5, 2);
				$kalium = round($makanan->kalium / 1.5, 2);
			}

			$array = new stdClass();
			$array->id_makanan = $id;
			$array->kode_makanan = $makanan->kode_makanan;
			$array->nama = $makanan->nama;
			$array->id_zatgizi = $makanan->id_zatgizi;
			$array->karbohidrat = $karbohidrat;
			$array->protein = $protein;
			$array->lemak = $lemak;
			$array->natrium = $natrium;
			$array->kalori = $kalori;
			$array->kalium = $kalium;

			$data['list'] = $array;
			$data['content'] = 'vedit_makanan.php';
			$this->load->view('vtemplate', $data);
		}
	}

	public function hapus_makanan($kategori, $id, $kode_makanan)
	{
		$total_kode = 0;

		if ($kategori == 1) {
			$total_kode = $this->MMakanan->get_total_makanan_pokok();
		} else if ($kategori == 2) {
			$total_kode = $this->MMakanan->get_total_sumber_hewani();
		} else if ($kategori == 3) {
			$total_kode = $this->MMakanan->get_total_sumber_nabati();
		} elseif ($kategori == 4) {
			$total_kode = $this->MMakanan->get_total_sayuran();
		} else {
			$total_kode = $this->MMakanan->get_total_buah();
		}

		$this->MMakanan->delete_makanan_by_id($id);

		$total = $total_kode - $kode_makanan;

		if ($total > 0) {
			$id_makanan = $this->MMakanan->get_makanan_with_limit($kategori, $total);

			usort($id_makanan, function ($colom1, $colom2) {
				return $colom1->id_makanan > $colom2->id_makanan;
			});

			$indeks = 0;
			for ($i = $kode_makanan; $i < $total_kode; $i++) {
				$data = array('kode_makanan' => $i);
				$this->MMakanan->edit_kode_makanan($data, $id_makanan[$indeks]->id_makanan);
				$indeks++;
			}
		}

		redirect('makanan/data_makanan/' . $kategori);
	}
}
