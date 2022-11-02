<?php
class RekomendasiMakanan extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('MMakanan');
	}
	// Next cek proses algoritmanya menawa ada yg gak bener sama perulangan yang makek if 
	// diushakan kayak pembangkitan awal

	// untuk mengecek data berupa arayy
	// echo '<pre>';
	// print_r();
	// exit();
	public function index()
	{

		// Ini kalok mau ke view input parameter
		// if ($this->input->post('process')) {
		// 	$input = $this->input->post(NULL, TRUE);
		// 	$keb_gizi = $this->hitung_keb_gizi($input);

		// 	$data['title'] = 'Input Data Parameter';
		// 	$data['content'] = 'vinput_parameter.php';
		// 	$data['keb_gizi'] = $keb_gizi;
		// 	$this->load->view('vtemplate', $data);
		if ($this->input->post('process')) {
			$input = $this->input->post(NULL, TRUE);

			$keb_gizi = $this->hitung_keb_gizi($input);

			// Mengambil total indeks pada setiap kategori makanan
			$tmakananpokok =	$this->MMakanan->get_total_makanan_pokok();
			$tsumberhewani =	$this->MMakanan->get_total_sumber_hewani();
			$tsumbernabati =	$this->MMakanan->get_total_sumber_nabati();
			$tsayuran =	$this->MMakanan->get_total_sayuran();
			$tbuah =	$this->MMakanan->get_total_buah();

			// Mengambil data pada setiap kategori makanan
			$makananpokok = $this->MMakanan->get_makanan_pokok();
			$sumberhewani = $this->MMakanan->get_sumber_hewani();
			$sumbernabati = $this->MMakanan->get_sumber_nabati();
			$sayuran = $this->MMakanan->get_sayuran();
			$buah = $this->MMakanan->get_buah();

			// Memasukkan data makanan ke variabel makanan
			$makanan = array(
				'makananpokok' => $makananpokok,
				'sumberhewani' => $sumberhewani,
				'sumbernabati' => $sumbernabati,
				'sayuran' => $sayuran,
				'buah' => $buah
			);

			// Menyimpan total pada setiap kategori makanan
			$tmakanan = array(
				'tmakananpokok' => $tmakananpokok,
				'tsumberhewani' => $tsumberhewani,
				'tsumbernabati' => $tsumbernabati,
				'tsayuran' => $tsayuran,
				'tbuah' => $tbuah
			);

			$batas = array(
				'1' => $tmakananpokok,
				'2' => $tsumberhewani,
				'3' => $tsumbernabati,
				'4' => $tsayuran,
				'5' => $tbuah,
				'6' => $tmakananpokok,
				'7' => $tsumberhewani,
				'8' => $tsumbernabati,
				'9' => $tsayuran,
				'10' => $tbuah,
				'11' => $tmakananpokok,
				'12' => $tsumberhewani,
				'13' => $tsumbernabati,
				'14' => $tsayuran,
				'15' => $tbuah,
			);

			$rekom1 = $this->rekom_makanan($keb_gizi, $makanan, $tmakanan, $batas);

			$solusi = $rekom1;

			$simpan[1][1]['id_makanan'] = 0;
			$simpan[2][1]['id_makanan'] = 0;
			$simpan[3][1]['id_makanan'] = 0;
			$simpan[4][1]['id_makanan'] = 0;
			$simpan[5][1]['id_makanan'] = 0;

			// Penghapusan data yang sudah menjadi alternatif pertama rekomendasi makanan 
			for ($i = 1; $i <= 15; $i += 5) {
				// Makanan Pokok
				for ($mp = 1; $mp <= count($simpan[1]); $mp++) {
					if ($solusi[$i]->id_makanan != $simpan[1][$mp]['id_makanan']) {
						// Menyimpan kode makanan untuk mengganti kode makanan pada makanan pokok setelah diganti nantinya
						$simpan[1][$mp + 1]['kode_makanan'] = $solusi[$i]->kode_makanan;
						// Menggantikan data makanan yang sudah terpilih di alternatif 1 dengan data terakhir pada makanan pokok
						$makananpokok[$solusi[$i]->kode_makanan - 1] = $makananpokok[$tmakananpokok - 1];
						// Menggantikan kode makanan yang sebelumnya digantikan menjadi kode makanan yang tersimpan / terpilih di alternatif 1
						$makananpokok[$solusi[$i]->kode_makanan - 1]->kode_makanan = $simpan[1][$mp + 1]['kode_makanan'];
						// Menyimpan id makanan yang nanti digunakan untuk pengecekan
						$simpan[1][$mp + 1]['id_makanan'] = $solusi[$i]->id_makanan;
						// Menghapus data terakhir makanan pokok
						unset($makananpokok[$tmakananpokok - 1]);
						// Mengurangi total makanan pokok
						$tmakananpokok--;
					}
				}

				// Sumber Hewani
				for ($sh = 1; $sh <= count($simpan[2]); $sh++) {
					if ($solusi[$i + 1]->id_makanan != $simpan[2][$sh]['id_makanan']) {
						$simpan[2][$sh + 1]['kode_makanan'] = $solusi[$i + 1]->kode_makanan;
						$sumberhewani[$solusi[$i + 1]->kode_makanan - 1] = $sumberhewani[$tsumberhewani - 1];
						$sumberhewani[$solusi[$i + 1]->kode_makanan - 1]->kode_makanan = $simpan[2][$sh + 1]['kode_makanan'];
						$simpan[2][$sh + 1]['id_makanan'] = $solusi[$i + 1]->id_makanan;
						unset($sumberhewani[$tsumberhewani - 1]);
						$tsumberhewani--;
					}
				}

				// Sumber Nabati
				for ($nb = 1; $nb <= count($simpan[3]); $nb++) {
					if ($solusi[$i + 2]->id_makanan != $simpan[3][$nb]['id_makanan']) {
						$simpan[3][$nb + 1]['kode_makanan'] = $solusi[$i + 2]->kode_makanan;
						$sumbernabati[$solusi[$i + 2]->kode_makanan - 1] = $sumbernabati[$tsumbernabati - 1];
						$sumbernabati[$solusi[$i + 2]->kode_makanan - 1]->kode_makanan = $simpan[3][$nb + 1]['kode_makanan'];
						$simpan[3][$nb + 1]['id_makanan'] = $solusi[$i + 2]->id_makanan;
						unset($sumbernabati[$tsumbernabati - 1]);
						$tsumbernabati--;
					}
				}

				// Sayuran
				for ($s = 1; $s <= count($simpan[4]); $s++) {
					if ($solusi[$i + 3]->id_makanan != $simpan[4][$s]['id_makanan']) {
						$simpan[4][$s + 1]['kode_makanan'] = $solusi[$i + 3]->kode_makanan;
						$sayuran[$solusi[$i + 3]->kode_makanan - 1] = $sayuran[$tsayuran - 1];
						$sayuran[$solusi[$i + 3]->kode_makanan - 1]->kode_makanan = $simpan[4][$s + 1]['kode_makanan'];
						$simpan[4][$s + 1]['id_makanan'] = $solusi[$i + 3]->id_makanan;
						unset($sayuran[$tsayuran - 1]);
						$tsayuran--;
					}
				}

				// Buah
				for ($b = 1; $b <= count($simpan[5]); $b++) {
					if ($solusi[$i + 4]->id_makanan != $simpan[5][$b]['id_makanan']) {
						$simpan[5][$b + 1]['kode_makanan'] = $solusi[$i + 4]->kode_makanan;
						$buah[$solusi[$i + 4]->kode_makanan - 1] = $buah[$tbuah - 1];
						$buah[$solusi[$i + 4]->kode_makanan - 1]->kode_makanan = $simpan[5][$b + 1]['kode_makanan'];
						$simpan[5][$b + 1]['id_makanan'] = $solusi[$i + 4]->id_makanan;
						unset($buah[$tbuah - 1]);
						$tbuah--;
					}
				}
			}

			// Memperbaharui variable makanan setelah proses penghapusan diatas
			$makanan = array(
				'makananpokok' => $makananpokok,
				'sumberhewani' => $sumberhewani,
				'sumbernabati' => $sumbernabati,
				'sayuran' => $sayuran,
				'buah' => $buah
			);

			// Memperbaharui total pada setiap kategori makanan
			$tmakanan = array(
				'tmakananpokok' => $tmakananpokok,
				'tsumberhewani' => $tsumberhewani,
				'tsumbernabati' => $tsumbernabati,
				'tsayuran' => $tsayuran,
				'tbuah' => $tbuah
			);

			// Memperbaharui variable batas setelah proses pengurangan total data makanan pada setiap kategori makanan diatas
			$batas = array(
				'1' => $tmakananpokok,
				'2' => $tsumberhewani,
				'3' => $tsumbernabati,
				'4' => $tsayuran,
				'5' => $tbuah,
				'6' => $tmakananpokok,
				'7' => $tsumberhewani,
				'8' => $tsumbernabati,
				'9' => $tsayuran,
				'10' => $tbuah,
				'11' => $tmakananpokok,
				'12' => $tsumberhewani,
				'13' => $tsumbernabati,
				'14' => $tsayuran,
				'15' => $tbuah,
			);

			$rekom2 = $this->rekom_makanan($keb_gizi, $makanan, $tmakanan, $batas);

			$data[1] = $keb_gizi;
			$data[3] = $rekom1['hasil'];
			// $data[3] = $rekom[1]['hasil'];
			unset($rekom1['hasil']);
			// $data[2][1] = $rekom[1];
			// $data[2][2] = $rekom[2];
			$data[2][1] = $rekom1;
			$data[2][2] = $rekom2;

			$data['title'] = 'Hasil Rekomendasi Makanan';
			$data['content'] = 'vhasil_rekomendasi.php';
			$data['data'] = $data;
			$this->load->view('vtemplate', $data);
		} else {
			$data['title'] = 'Input Data Pasien Hipertensi';
			$data['content'] = 'vinput_pasien.php';
			$this->load->view('vtemplate', $data);
		}
	}

	public function hasil_rekomendasi($cek)
	{
		$input = $this->input->post(NULL, TRUE);
		extract($input);
		// $this->$tes->angka = 100;
		// echo $tes->angka;
		// exit();
		$data[1] = array(
			'nama' => $keb_gizi[0],
			'tbadan' => $keb_gizi[1],
			'bbadan' => $keb_gizi[2],
			'jkelamin' => $keb_gizi[3],
			'umur' => $keb_gizi[4],
			'IMT' => $keb_gizi[5],
			'BBI' => $keb_gizi[6],
			'BMR' => $keb_gizi[7],
			'taktifitas' => $keb_gizi[8],
			'tstres' => $keb_gizi[9],
			'Kkarbohidrat' => $keb_gizi[10],
			'Kprotein' => $keb_gizi[11],
			'Klemak' => $keb_gizi[12],
			'Knatrium1' => $keb_gizi[13],
			'Knatrium2' => $keb_gizi[14],
			'Kkalori' => $keb_gizi[15],
			// 'Kkalium' => 4.7,
			'Kkalium' => 4700,
			'Tekanan Darah' => $keb_gizi[16],
		);

		$this->load->model('MMakanan');
		// Mengambil data pada setiap kategori makanan
		$makananpokok = $this->MMakanan->get_makanan_pokok();
		$sumberhewani = $this->MMakanan->get_sumber_hewani();
		$sumbernabati = $this->MMakanan->get_sumber_nabati();
		$sayuran = $this->MMakanan->get_sayuran();
		$buah = $this->MMakanan->get_buah();

		// Mengganti gen yang berupa integer menjadi data makanan pada setiap kategori
		for ($in = 1; $in <= 15; $in = $in + 5) {
			// Altenatif 1
			$rekom[1][$in] = $makananpokok[$hasil[$in] - 1];
			$rekom[1][$in + 1] = $sumberhewani[$hasil[$in + 1] - 1];
			$rekom[1][$in + 2] = $sumbernabati[$hasil[$in + 2] - 1];
			$rekom[1][$in + 3] = $sayuran[$hasil[$in + 3] - 1];
			$rekom[1][$in + 4] = $buah[$hasil[$in + 4] - 1];
		}

		// Alternatif 1
		$rekom[1]['fitness'] = $hasil[16];
		$rekom[1]['totalKarbo'] = $hasil[17];
		$rekom[1]['totalProtein'] = $hasil[18];
		$rekom[1]['totalLemak'] = $hasil[19];
		$rekom[1]['totalNatrium'] = $hasil[20];
		$rekom[1]['totalKalori'] = $hasil[21];
		$rekom[1]['pinaltiKarbo'] = $hasil[22];
		$rekom[1]['pinaltiProtein'] = $hasil[23];
		$rekom[1]['pinaltiLemak'] = $hasil[24];
		$rekom[1]['pinaltiNatrium'] = $hasil[25];
		$rekom[1]['pinaltiKalori'] = $hasil[26];
		$rekom[1]['totalPinalti'] = $hasil[27];
		$rekom[1]['selisihKarbo'] = $hasil[28];
		$rekom[1]['selisihProtein'] = $hasil[29];
		$rekom[1]['selisihLemak'] = $hasil[30];
		$rekom[1]['selisihNatrium'] = $hasil[31];
		$rekom[1]['selisihKalori'] = $hasil[32];
		$rekom[1]['totalKalium'] = $totalK;
		$rekom[1]['pinaltiKalium'] = $pinaltiK;
		$rekom[1]['selisihKalium'] = $selisihK;
		$rekom[1]['waktu'] = $hasil[0];

		// Alternatif 2
		for ($in = 1; $in <= 15; $in += 5) {
			$rekom[2][$in] = (object)array();
			$rekom[2][$in + 1] = (object)array();
			$rekom[2][$in + 2] = (object)array();
			$rekom[2][$in + 3] = (object)array();
			$rekom[2][$in + 4] = (object)array();
			$rekom[2][$in]->nama = $nama[$in - 1];
			$rekom[2][$in + 1]->nama = $nama[$in];
			$rekom[2][$in + 2]->nama = $nama[$in + 1];
			$rekom[2][$in + 3]->nama = $nama[$in + 2];
			$rekom[2][$in + 4]->nama = $nama[$in + 3];
		}

		$rekom[2]['totalKarbo'] = $totalKarbo;
		$rekom[2]['totalProtein'] = $totalProtein;
		$rekom[2]['totalLemak'] = $totalLemak;
		$rekom[2]['totalNatrium'] = $totalNatrium;
		$rekom[2]['totalKalori'] = $totalKalori;
		$rekom[2]['selisihKarbo'] = $selisihKarbo;
		$rekom[2]['selisihProtein'] = $selisihProtein;
		$rekom[2]['selisihLemak'] = $selisihLemak;
		$rekom[2]['selisihNatrium'] = $selisihNatrium;
		$rekom[2]['selisihKalori'] = $selisihKalori;
		$rekom[2]['totalKalium'] = $totalKalium;
		$rekom[2]['selisihKalium'] = $selisihKalium;

		$data[2] = $rekom;

		for ($i = 1; $i <= 12; $i++) {
			$data[3][$i] = 	$fitness[$i - 1];
		}

		$data['data'] = $data;
		if ($cek == 1) {
			$data['title'] = 'Hasil Rekomendasi Makanan';
			$data['content'] = 'vhasil_rekomendasi.php';
		} else {
			$data['title'] = 'Perhitungan Manual Kebutuhan Gizi Pasien dan Hasil Rekomendasi Sistem';
			$data['js'] = 'chart_js';
			$data['content'] = 'vperhitungan_gizi.php';
		}
		$this->load->view('vtemplate', $data);
	}

	private function hitung_keb_gizi($data)
	{

		extract($data);

		// Menklasifikasi Kebutuhan Natrium
		if (($sistolik >= 120 && $sistolik <= 139) || ($diastolik >= 80 && $diastolik <= 89)) {
			$Natrium2 = 1200;
			$Natrium1 = 1000;
		} else if (($sistolik >= 140 && $sistolik <= 159) || ($diastolik >= 90 && $diastolik <= 99)) {
			$Natrium2 = 800;
			$Natrium1 = 600;
		} else if ($sistolik >= 160 || $diastolik >= 100) {
			$Natrium2 = 400;
			$Natrium1 = 200;
		}

		// Rumus IMT (Indeks Massa Tubuh) untuk tinggi badan dalam satuan meter
		$tbmeter = $tbadan / 100;
		$IMT = $bbadan / ($tbmeter * $tbmeter);

		// Jenis Kelamin
		// 1 = Pria
		// 2 = Wanita
		if ($jkelamin == 1) {
			$jkelamin = 'Pria';
			// Klasifikasi hasil IMT selain normal maka menggunakan rumus BBI (Berat Badan Ideal)
			if ($IMT <= 25 && $IMT >= 18.5) {
				$BBI = $bbadan;
			} else {
				$BBI = ($tbadan - 100) - 0.1 * ($tbadan - 100);
			}

			// Menghitung BMR (Basal Metabolic Rate)
			$BMR = 66 + (13.7 * $BBI) + (5 * $tbadan) - (6.8 * $umur);

			// Memberikan nilai tingkat aktifitas
			if ($taktifitas == 1) {
				$taktifitas = 1.65;
			} else if ($taktifitas == 2) {
				$taktifitas = 1.76;
			} else {
				$taktifitas = 2.1;
			}
			// Jika perempuan
		} else {
			$jkelamin = 'Wanita';
			// Klasifikasi hasil IMT selain normal maka menggunakan rumus BBI (Berat Badan Ideal)
			if ($IMT <= 25 && $IMT >= 18.5) {
				$BBI = $bbadan;
			} else {
				$BBI = ($tbadan - 100) - 0.15 * ($tbadan - 100);
			}

			// Menghitung BMR (Basal Metabolic Rate)
			$BMR = 65.5 + (9.6 * $BBI) + (1.7 * $tbadan) - (4.7 * $umur);

			// Memberikan nilai tingkat aktifitas
			if ($taktifitas == 1) {
				$taktifitas = 1.55;
			} else if ($taktifitas == 2) {
				$taktifitas = 1.7;
			} else {
				$taktifitas = 2;
			}
		}

		// Menghitung Kebutuhan Energi (KE)
		$KE = $BMR * $taktifitas * $tstres;
		// Menghitung Kebutuhan Karbohidrat
		$Karbo = 0.65 * $KE / 4;
		// $Karbo = 0.65 * $KE * 1000 / 4;
		// Menghitung Kebutuhan Protein
		$Protein = 0.15 * $KE / 4;
		// $Protein = 0.15 * $KE * 1000 / 4;
		// Menghitung Kebutuhan Lemak
		$Lemak = 0.2 * $KE / 9;
		// $Lemak = 0.2 * $KE * 1000 / 9;
		// Kebutuhan Kalori = Kebutuhan Energi
		$Kalori = $KE;

		$tekananDarah = '';
		$tekananDarah .= $tekananDarah . $sistolik . ' / ' . $diastolik;

		$hasil = array(
			'nama' => $nama,
			'tbadan' => $tbadan,
			'bbadan' => $bbadan,
			'jkelamin' => $jkelamin,
			'umur' => $umur,
			'IMT' => $IMT,
			'BBI' => $BBI,
			'BMR' => $BMR,
			'taktifitas' => $taktifitas,
			'tstres' => $tstres,
			'Kkarbohidrat' => round($Karbo, 2),
			'Kprotein' => round($Protein, 2),
			'Klemak' => round($Lemak, 2),
			'Knatrium1' => $Natrium1,
			'Knatrium2' => $Natrium2,
			// 'Knatrium1' => $Natrium1 / 1000,
			// 'Knatrium2' => $Natrium2 / 1000,
			'Kkalori' => round($Kalori, 2),
			// 'Kkalium' => 4.7,
			'Kkalium' => 4700,
			'Tekanan Darah' => $tekananDarah
		);
		return $hasil;
	}

	private function rekom_makanan($keb_gizi, $makanan, $tmakanan, $batas)
	{
		set_time_limit(0);

		extract($keb_gizi);
		extract($makanan);
		extract($tmakanan);
		extract($batas);

		$jpopulasi = 100;
		$jgenerasi = 120;
		$cr = 0.6;
		$mr = 0.4;
		$kmax = 12;
		$iterasils = 2000;

		$KebutuhanPasien = array(
			'karbohidrat' => $Kkarbohidrat,
			'protein' => $Kprotein,
			'lemak' => $Klemak,
			'natrium1' => $Knatrium1,
			'natrium2' => $Knatrium2,
			'kalori' => $Kkalori,
			'kalium' => $Kkalium,
		);

		$parametervns = array(
			'kmax' => $kmax,
			'iterasils' => $iterasils
		);

		$tawal = microtime(TRUE);

		// Pembangkitan Populasi Awal
		for ($i = 1; $i <= $jpopulasi; $i++) {
			for ($j = 1; $j <= 15; $j = $j + 5) {
				$populasi[$i][$j] = rand(1, $tmakananpokok);
				$populasi[$i][$j + 1] = rand(1, $tsumberhewani);
				$populasi[$i][$j + 2] = rand(1, $tsumbernabati);
				$populasi[$i][$j + 3] = rand(1, $tsayuran);
				$populasi[$i][$j + 4] = rand(1, $tbuah);

				// if ($j == 1 || $j == 6 || $j == 11) {
				// 	$populasi[$i][$j] = rand(1, $tmakananpokok);
				// } else if ($j == 2 || $j == 7 || $j == 12) {
				// 	$populasi[$i][$j] = rand(1, $tsumberhewani);
				// } else if ($j == 3 || $j == 8 || $j == 13) {
				// 	$populasi[$i][$j] = rand(1, $tsumbernabati);
				// } else if ($j == 4 || $j == 9 || $j == 14) {
				// 	$populasi[$i][$j] = rand(1, $tsayuran);
				// } else if ($j == 5 || $j == 10 || $j == 15) {
				// 	$populasi[$i][$j] = rand(1, $tbuah);
				// }
			}
		}

		$generasi = 1;
		// Mulainya proses ALgoritma Genetika
		for ($g = 1; $g <= $jgenerasi; $g++) {
			// Proses two-cut point Crossover
			// Perhitungan jumlah individu baru
			$csize = round($cr * $jpopulasi);
			$n_Cr = 0;
			do {
				// Memilih 2 populasi sebagai induk secara acak

				do {
					$P1 = rand(1, $jpopulasi);
					$P2 = rand(1, $jpopulasi);
				} while ($P1 == $P2);

				// Memilih batas 1 dan 2 pada gen
				do {
					$batas1 = rand(1, 15);
					$batas2 = rand(1, 15);
				} while ($batas1 == $batas2);

				if ($batas1 > $batas2) {
					$awal = $batas2;
					$akhir = $batas1;
				} else {
					$awal = $batas1;
					$akhir = $batas2;
				}

				// Memasukkan 2 populasi yang terpilih ke variabel baru
				$solusic[$n_Cr + 1] = $populasi[$P1];
				$solusic[$n_Cr + 2] = $populasi[$P2];

				// Pertukaran gen pada solusi
				for ($i = $awal; $i <= $akhir; $i++) {
					$solusic[$n_Cr + 1][$i] = $populasi[$P2][$i];
					$solusic[$n_Cr + 2][$i] = $populasi[$P1][$i];
				}

				$n_Cr = $n_Cr + 2;
			} while ($n_Cr != $csize);

			// Melakukan proses vns pada setiap generasi ke-50
			if ($g % 50 == 0) {
				$this->vns($solusic, $parametervns, $batas, $KebutuhanPasien, $makanan);
			}

			// Mamasukkan populasi baru dari proses crossover kedalam variabel populasi
			$indeks = 1;
			for ($i = $jpopulasi + 1; $i <= $jpopulasi + $csize; $i++) {
				$populasi[$i] = $solusic[$indeks];
				$indeks++;
			}

			// Proses reciprocal exchange mutation
			// Perhitungan jumlah individu baru
			$msize = round($mr * $jpopulasi);
			$n_Mr = 0;

			do {
				// Memilih 1 populasi sebagai induk secara acak
				$P1 = rand(1, $jpopulasi);
				do {
					$cek = false;
					// Memilih posisi 1 dan 2 pada gen
					do {
						$posisi1 = rand(1, 15);
						$posisi2 = rand(1, 15);
					} while ($posisi1 == $posisi2);

					// Memasukkan 1 populasi yang terpilih ke variabel baru
					$solusim[$n_Mr + 1] = $populasi[$P1];

					// Pertukaran gen pada solusi
					$solusim[$n_Mr + 1][$posisi1] = $populasi[$P1][$posisi2];
					$solusim[$n_Mr + 1][$posisi2] = $populasi[$P1][$posisi1];

					// Pengecekkan jika nilai pada gen lebih dari batas didatabase
					if ($solusim[$n_Mr + 1][$posisi1] > $batas[$posisi1]) {
						$cek = true;
					} else if ($solusim[$n_Mr + 1][$posisi2] > $batas[$posisi2]) {
						$cek = true;
					}
				} while ($cek == true);

				$n_Mr = $n_Mr + 1;
			} while ($n_Mr != $msize);

			// Melakukan proses vns pada setiap generasi ke-50
			if ($g % 50 == 0) {
				$this->vns($solusim, $parametervns, $batas, $KebutuhanPasien, $makanan);
			}

			// Mamasukkan populasi baru dari proses mutasi kedalam variabel populasi
			$indeks = 1;
			for ($i = $jpopulasi + $csize + 1; $i <= $jpopulasi + $csize + $msize; $i++) {
				$populasi[$i] = $solusim[$indeks];
				$indeks++;
			}

			// fungsi menghitung nilai fitness
			$this->menghitung_fitness($populasi, $KebutuhanPasien, $makanan);

			// Proses elitism selection
			// Mengurutkan variabel populasi secara descending
			usort($populasi, function ($colom1, $colom2) {
				return $colom1['fitness'] < $colom2['fitness'];
			});

			// Memasukkan hasil sorting variabel populasi ke variabel baru bpopulasi sebanyak jumlah populasi
			for ($i = 1; $i <= $jpopulasi; $i++) {
				$bpopulasi[$i] = $populasi[$i - 1];
			}

			// Memasukkan variabel bpopulasi ke variabel populasi sehingga dapat digunakan lagi di perulangan selanjutnya
			$populasi = $bpopulasi;

			if ($g % 10 == 0) {
				$fitness[$generasi] = $populasi[1]['fitness'];
				$generasi++;
			}
		}

		$takhir = microtime(TRUE);
		$lama = $takhir - $tawal;

		// Memasukkan hasil populasi terbaik yang berada pada indeks 1 ke dalam variabel data
		$data = $populasi[1];

		// Mengganti gen yang berupa integer menjadi data makanan pada setiap kategori
		for ($in = 1; $in <= 15; $in = $in + 5) {
			//Individu terbaik 1
			$data[$in] = $makananpokok[$data[$in] - 1];
			$data[$in + 1] = $sumberhewani[$data[$in + 1] - 1];
			$data[$in + 2] = $sumbernabati[$data[$in + 2] - 1];
			$data[$in + 3] = $sayuran[$data[$in + 3] - 1];
			$data[$in + 4] = $buah[$data[$in + 4] - 1];
		}

		// Perhitungan selisih dalam persen (%) kecuali natrium Individu terbaik 1
		$selisihKarbo = round(($data['pinaltiKarbo'] / $KebutuhanPasien['karbohidrat']) * 100, 2);
		$selisihProtein = round(($data['pinaltiProtein'] / $KebutuhanPasien['protein']) * 100, 2);
		$selisihLemak = round(($data['pinaltiLemak'] / $KebutuhanPasien['lemak']) * 100, 2);
		$selisihNatrium = abs($data['totalNatrium'] - $KebutuhanPasien['natrium2']);
		$selisihKalori = round(($data['pinaltiKalori'] / $KebutuhanPasien['kalori']) * 100, 2);
		$selisihKalium = round(($data['pinaltiKalium'] / ($KebutuhanPasien['kalium'])) * 100, 2);

		$data['selisihKarbo'] = $selisihKarbo;
		$data['selisihProtein'] = $selisihProtein;
		$data['selisihLemak'] = $selisihLemak;
		$data['selisihNatrium'] = $selisihNatrium;
		$data['selisihKalori'] = $selisihKalori;
		$data['selisihKalium'] = $selisihKalium;
		$data['waktu'] = $lama;
		$data['hasil'] = $fitness;

		return $data;
	}

	private function vns(&$data, $parameter, $batas, $KPasien, $makanan)
	{
		foreach ($data as $x => $sawal) {
			$k = 1;
			do {
				// Proses Shaking 2-opt
				do {
					$status = false;
					// Memilih dua posisi secara acak
					do {
						$opt[0] = rand(1, 15);
						$random[0] = rand(1, 2);
						$opt[1] = rand(1, 15);
						$random[1] = rand(1, 2);
					} while (($opt[0] == $opt[1]) || ($opt[0] == $opt[1] + 1) || ($opt[0] == $opt[1] - 1));

					// Memilih indeks kedua pada kedua posisi 
					for ($i = 0; $i < 2; $i++) {
						if ($random[$i] == 1) {
							$tunjukindeks[$i] = $opt[$i] - 1;
							if ($tunjukindeks[$i] < 1) {
								$tunjukindeks[$i] = $opt[$i] + 1;
							}
						} else {
							$tunjukindeks[$i] = $opt[$i] + 1;
							if ($tunjukindeks[$i] > 15) {
								$tunjukindeks[$i] = $opt[$i] - 1;
							}
						}
					}

					$sshaking[0] = $sawal;
					// Pertukaran Posisi
					$sshaking[0][$opt[0]] = $sawal[$tunjukindeks[1]];
					$sshaking[0][$tunjukindeks[0]] = $sawal[$opt[1]];
					$sshaking[0][$opt[1]] = $sawal[$tunjukindeks[0]];
					$sshaking[0][$tunjukindeks[1]] = $sawal[$opt[0]];

					// Pengecekkan id makanan jika masih ada yg overload dari database
					if ($sshaking[0][$opt[0]] > $batas[$opt[0]]) {
						$status = true;
					} else if ($sshaking[0][$tunjukindeks[0]] > $batas[$tunjukindeks[0]]) {
						$status = true;
					} else if ($sshaking[0][$opt[1]] > $batas[$opt[1]]) {
						$status = true;
					} else if ($sshaking[0][$tunjukindeks[1]] > $batas[$tunjukindeks[1]]) {
						$status = true;
					}
				} while ($status == true);

				// Menghitung nilai fitness dari proses Shaking
				$this->menghitung_fitness($sshaking, $KPasien, $makanan);

				// Proses local search
				$sawalLS[0] = $sshaking[0];

				for ($i = 1; $i <= $parameter['iterasils']; $i++) {
					$sLocalSeach[0] = $sawalLS[0];

					do {
						// Memilih posisi gen pada solusi
						$pilih = rand(1, 15);
						$randomLs = rand(1, 2);
						// Memilih value gen akan di +1 atau di -1
						if ($randomLs == 1) {
							$temp = $sawalLS[0][$pilih] - 1;
						} else {
							$temp = $sawalLS[0][$pilih] + 1;
						}
					} while ($temp < 1 || $temp > $batas[$pilih]);

					// $sLocalSeach[0]['temp'] = $sLocalSeach[0][$pilih]; //Menyimpan Gen sebelum diproses
					// $sLocalSeach[0]['pilih'] = $pilih; //Meyimpan posisi yang terpilih
					// $sLocalSeach[0]['baru'] = $temp; //setelah diproses
					$sLocalSeach[0][$pilih] = $temp; //Memperbaharui solusi setelah diproses
					// $sLocalSeach[0]['cek'] = 1;

					// Menghitung nilai fitness pada solusi local search
					$this->menghitung_fitness($sLocalSeach, $KPasien, $makanan);

					// Pengecekkan kedua solusi berdasarkan nilai fitness
					if ($sLocalSeach[0]['fitness'] > $sawalLS[0]['fitness']) {
						$sawalLS[0] = $sLocalSeach[0];
					} else {
						$sawalLS[0] = $sawalLS[0];
					}
				}

				// Proses Move or Not
				if ($sawalLS[0]['fitness'] > $sawal['fitness']) {
					$sawal = $sawalLS[0];
					$k = 1;
				} else {
					$sawal = $sawal;
					$k = $k + 1;
				}
			} while ($k < $parameter['kmax'] + 1);

			// Memasukkan hasil proses vns ke data solusi 
			$data[$x] = $sawal;
		}
	}

	private function menghitung_fitness(&$data, $KPasien, $makanan)
	{

		extract($makanan);
		foreach ($data as $i => $baris) {

			// jika cek = 1 maka proses ini dilakukan pada saat local search
			// if ($baris['cek'] == 1) {
			// 	if ($baris['pilih'] == 1 || $baris['pilih'] == 6 || $baris['pilih'] == 11) {
			// 		$data[$i]['totalKarbo'] = $data[$i]['totalKarbo'] + $makananpokok[$baris['baru'] - 1]->karbohidrat - $makananpokok[$baris['temp'] - 1]->karbohidrat;
			// 		$data[$i]['totalProtein'] = $data[$i]['totalProtein'] + $makananpokok[$baris['baru'] - 1]->protein - $makananpokok[$baris['temp'] - 1]->protein;
			// 		$data[$i]['totalLemak'] = $data[$i]['totalLemak'] + $makananpokok[$baris['baru'] - 1]->lemak - $makananpokok[$baris['temp'] - 1]->lemak;
			// 		$data[$i]['totalNatrium'] = $data[$i]['totalNatrium'] + $makananpokok[$baris['baru'] - 1]->natrium - $makananpokok[$baris['temp'] - 1]->natrium;
			// 		$data[$i]['totalKalori'] = $data[$i]['totalKalori'] + $makananpokok[$baris['baru'] - 1]->kalori - $makananpokok[$baris['temp'] - 1]->kalori;
			// 		$data[$i]['totalKalium'] = $data[$i]['totalKalium'] + $makananpokok[$baris['baru'] - 1]->kalium - $makananpokok[$baris['temp'] - 1]->kalium;
			// 	} else if ($baris['pilih'] == 2 || $baris['pilih'] == 7 || $baris['pilih'] == 12) {
			// 		$data[$i]['totalKarbo'] = $data[$i]['totalKarbo'] + $sumberhewani[$baris['baru'] - 1]->karbohidrat - $sumberhewani[$baris['temp'] - 1]->karbohidrat;
			// 		$data[$i]['totalProtein'] = $data[$i]['totalProtein'] + $sumberhewani[$baris['baru'] - 1]->protein - $sumberhewani[$baris['temp'] - 1]->protein;
			// 		$data[$i]['totalLemak'] = $data[$i]['totalLemak'] + $sumberhewani[$baris['baru'] - 1]->lemak - $sumberhewani[$baris['temp'] - 1]->lemak;
			// 		$data[$i]['totalNatrium'] = $data[$i]['totalNatrium'] + $sumberhewani[$baris['baru'] - 1]->natrium - $sumberhewani[$baris['temp'] - 1]->natrium;
			// 		$data[$i]['totalKalori'] = $data[$i]['totalKalori'] + $sumberhewani[$baris['baru'] - 1]->kalori - $sumberhewani[$baris['temp'] - 1]->kalori;
			// 		$data[$i]['totalKalium'] = $data[$i]['totalKalium'] + $sumberhewani[$baris['baru'] - 1]->kalium - $sumberhewani[$baris['temp'] - 1]->kalium;
			// 	} else if ($baris['pilih'] == 3 || $baris['pilih'] == 8 || $baris['pilih'] == 13) {
			// 		$data[$i]['totalKarbo'] = $data[$i]['totalKarbo'] + $sumbernabati[$baris['baru'] - 1]->karbohidrat - $sumbernabati[$baris['temp'] - 1]->karbohidrat;
			// 		$data[$i]['totalProtein'] = $data[$i]['totalProtein'] + $sumbernabati[$baris['baru'] - 1]->protein - $sumbernabati[$baris['temp'] - 1]->protein;
			// 		$data[$i]['totalLemak'] = $data[$i]['totalLemak'] + $sumbernabati[$baris['baru'] - 1]->lemak - $sumbernabati[$baris['temp'] - 1]->lemak;
			// 		$data[$i]['totalNatrium'] = $data[$i]['totalNatrium'] + $sumbernabati[$baris['baru'] - 1]->natrium - $sumbernabati[$baris['temp'] - 1]->natrium;
			// 		$data[$i]['totalKalori'] = $data[$i]['totalKalori'] + $sumbernabati[$baris['baru'] - 1]->kalori - $sumbernabati[$baris['temp'] - 1]->kalori;
			// 		$data[$i]['totalKalium'] = $data[$i]['totalKalium'] + $sumbernabati[$baris['baru'] - 1]->kalium - $sumbernabati[$baris['temp'] - 1]->kalium;
			// 	} else if ($baris['pilih'] == 4 || $baris['pilih'] == 9 || $baris['pilih'] == 14) {
			// 		$data[$i]['totalKarbo'] = $data[$i]['totalKarbo'] + $sayuran[$baris['baru'] - 1]->karbohidrat - $sayuran[$baris['temp'] - 1]->karbohidrat;
			// 		$data[$i]['totalProtein'] = $data[$i]['totalProtein'] + $sayuran[$baris['baru'] - 1]->protein - $sayuran[$baris['temp'] - 1]->protein;
			// 		$data[$i]['totalLemak'] = $data[$i]['totalLemak'] + $sayuran[$baris['baru'] - 1]->lemak - $sayuran[$baris['temp'] - 1]->lemak;
			// 		$data[$i]['totalNatrium'] = $data[$i]['totalNatrium'] + $sayuran[$baris['baru'] - 1]->natrium - $sayuran[$baris['temp'] - 1]->natrium;
			// 		$data[$i]['totalKalori'] = $data[$i]['totalKalori'] + $sayuran[$baris['baru'] - 1]->kalori - $sayuran[$baris['temp'] - 1]->kalori;
			// 		$data[$i]['totalKalium'] = $data[$i]['totalKalium'] + $sayuran[$baris['baru'] - 1]->kalium - $sayuran[$baris['temp'] - 1]->kalium;
			// 	} else if ($baris['pilih'] == 5 || $baris['pilih'] == 10 || $baris['pilih'] == 15) {
			// 		$data[$i]['totalKarbo'] = $data[$i]['totalKarbo'] + $buah[$baris['baru'] - 1]->karbohidrat - $buah[$baris['temp'] - 1]->karbohidrat;
			// 		$data[$i]['totalProtein'] = $data[$i]['totalProtein'] + $buah[$baris['baru'] - 1]->protein - $buah[$baris['temp'] - 1]->protein;
			// 		$data[$i]['totalLemak'] = $data[$i]['totalLemak'] + $buah[$baris['baru'] - 1]->lemak - $buah[$baris['temp'] - 1]->lemak;
			// 		$data[$i]['totalNatrium'] = $data[$i]['totalNatrium'] + $buah[$baris['baru'] - 1]->natrium - $buah[$baris['temp'] - 1]->natrium;
			// 		$data[$i]['totalKalori'] = $data[$i]['totalKalori'] + $buah[$baris['baru'] - 1]->kalori - $buah[$baris['temp'] - 1]->kalori;
			// 		$data[$i]['totalKalium'] = $data[$i]['totalKalium'] + $buah[$baris['baru'] - 1]->kalium - $buah[$baris['temp'] - 1]->kalium;
			// 	}

			// 	// mengembalikan cek menjadi 0
			// 	$data[$i]['cek'] = 0;

			// 	// Menghapus variabel yang tidak digunakan lagi
			// 	unset($data[$i]['baru']);
			// 	unset($data[$i]['temp']);
			// 	unset($data[$i]['pilih']);
			// } else {

			$data[$i]['totalKarbo'] = 0;
			$data[$i]['totalProtein'] = 0;
			$data[$i]['totalLemak'] = 0;
			$data[$i]['totalNatrium'] = 0;
			$data[$i]['totalKalori'] = 0;
			$data[$i]['totalKalium'] = 0;
			// Menghitung total zat gizi pada setiap kategori
			for ($j = 1; $j <= 15; $j = $j + 5) {
				// penjumalhan total zat gizi pada kategori makanan pokok
				$data[$i]['totalKarbo'] = $data[$i]['totalKarbo'] + $makananpokok[$baris[$j] - 1]->karbohidrat;
				$data[$i]['totalProtein'] = $data[$i]['totalProtein'] + $makananpokok[$baris[$j] - 1]->protein;
				$data[$i]['totalLemak'] = $data[$i]['totalLemak'] + $makananpokok[$baris[$j] - 1]->lemak;
				$data[$i]['totalNatrium'] = $data[$i]['totalNatrium'] + $makananpokok[$baris[$j] - 1]->natrium;
				$data[$i]['totalKalori'] = $data[$i]['totalKalori'] + $makananpokok[$baris[$j] - 1]->kalori;
				$data[$i]['totalKalium'] = $data[$i]['totalKalium'] + $makananpokok[$baris[$j] - 1]->kalium;
				// penjumalhan total zat gizi pada kategori sumberhewani
				$data[$i]['totalKarbo'] = $data[$i]['totalKarbo'] + $sumberhewani[$baris[$j + 1] - 1]->karbohidrat;
				$data[$i]['totalProtein'] = $data[$i]['totalProtein'] + $sumberhewani[$baris[$j + 1] - 1]->protein;
				$data[$i]['totalLemak'] = $data[$i]['totalLemak'] + $sumberhewani[$baris[$j + 1] - 1]->lemak;
				$data[$i]['totalNatrium'] = $data[$i]['totalNatrium'] + $sumberhewani[$baris[$j + 1] - 1]->natrium;
				$data[$i]['totalKalori'] = $data[$i]['totalKalori'] + $sumberhewani[$baris[$j + 1] - 1]->kalori;
				$data[$i]['totalKalium'] = $data[$i]['totalKalium'] + $sumberhewani[$baris[$j + 1] - 1]->kalium;
				// penjumalhan total zat gizi pada kategori sumber nabati
				$data[$i]['totalKarbo'] = $data[$i]['totalKarbo'] + $sumbernabati[$baris[$j + 2] - 1]->karbohidrat;
				$data[$i]['totalProtein'] = $data[$i]['totalProtein'] + $sumbernabati[$baris[$j + 2] - 1]->protein;
				$data[$i]['totalLemak'] = $data[$i]['totalLemak'] + $sumbernabati[$baris[$j + 2] - 1]->lemak;
				$data[$i]['totalNatrium'] = $data[$i]['totalNatrium'] + $sumbernabati[$baris[$j + 2] - 1]->natrium;
				$data[$i]['totalKalori'] = $data[$i]['totalKalori'] + $sumbernabati[$baris[$j + 2] - 1]->kalori;
				$data[$i]['totalKalium'] = $data[$i]['totalKalium'] + $sumbernabati[$baris[$j + 2] - 1]->kalium;
				// penjumalhan total zat gizi pada kategori sayuran
				$data[$i]['totalKarbo'] = $data[$i]['totalKarbo'] + $sayuran[$baris[$j + 3] - 1]->karbohidrat;
				$data[$i]['totalProtein'] = $data[$i]['totalProtein'] + $sayuran[$baris[$j + 3] - 1]->protein;
				$data[$i]['totalLemak'] = $data[$i]['totalLemak'] + $sayuran[$baris[$j + 3] - 1]->lemak;
				$data[$i]['totalNatrium'] = $data[$i]['totalNatrium'] + $sayuran[$baris[$j + 3] - 1]->natrium;
				$data[$i]['totalKalori'] = $data[$i]['totalKalori'] + $sayuran[$baris[$j + 3] - 1]->kalori;
				$data[$i]['totalKalium'] = $data[$i]['totalKalium'] + $sayuran[$baris[$j + 3] - 1]->kalium;
				// penjumlhan total zat gizi pada kategori buah
				$data[$i]['totalKarbo'] = $data[$i]['totalKarbo'] + $buah[$baris[$j + 4] - 1]->karbohidrat;
				$data[$i]['totalProtein'] = $data[$i]['totalProtein'] + $buah[$baris[$j + 4] - 1]->protein;
				$data[$i]['totalLemak'] = $data[$i]['totalLemak'] + $buah[$baris[$j + 4] - 1]->lemak;
				$data[$i]['totalNatrium'] = $data[$i]['totalNatrium'] + $buah[$baris[$j + 4] - 1]->natrium;
				$data[$i]['totalKalori'] = $data[$i]['totalKalori'] + $buah[$baris[$j + 4] - 1]->kalori;
				$data[$i]['totalKalium'] = $data[$i]['totalKalium'] + $buah[$baris[$j + 4] - 1]->kalium;
			}
			// }

			// Menghitung pinalti pada setiap kategori
			$data[$i]['pinaltiKarbo'] = abs($data[$i]['totalKarbo'] - $KPasien['karbohidrat']);
			$data[$i]['pinaltiProtein'] = abs($data[$i]['totalProtein'] - $KPasien['protein']);
			$data[$i]['pinaltiLemak'] = abs($data[$i]['totalLemak'] - $KPasien['lemak']);
			if ($data[$i]['totalNatrium'] > $KPasien['natrium1'] && $data[$i]['totalNatrium'] < $KPasien['natrium2']) {
				$data[$i]['pinaltiNatrium'] = 0;
			} else {
				$data[$i]['pinaltiNatrium'] = abs($data[$i]['totalNatrium'] - $KPasien['natrium2']);
			}
			$data[$i]['pinaltiKalori'] = abs($data[$i]['totalKalori'] - $KPasien['kalori']);
			$data[$i]['pinaltiKalium'] = abs($data[$i]['totalKalium'] - $KPasien['kalium']);

			// Menghitung Total pinalti
			$data[$i]['totalPinalti'] = $data[$i]['pinaltiKarbo'] + $data[$i]['pinaltiProtein'] + $data[$i]['pinaltiLemak'] + $data[$i]['pinaltiNatrium'] + $data[$i]['pinaltiKalori'] + $data[$i]['pinaltiKalium'];
			// Rumus nilai fitness
			$data[$i]['fitness'] = 1 / $data[$i]['totalPinalti'];
		}
	}
}
