<div class="card">
	<div class="card-body">
		<h3><b>Perhitungan Kebutuhan Gizi Pasien</b></h3>
		<div class="row ">
			<div class="col-sm-12">
				<div class="form-group">
					<h3>Mengklasifikasi Kebutuhan Natrium Pasien</h3>
					<h3><small>Dengan tekanan darah <?= $data[1]['Tekanan Darah'] ?> maka kebutuhan natrium pasien sebesar <?= $data[1]['Knatrium1'] . ' - ' . $data[1]['Knatrium2'] ?></small></h3>
				</div>
			</div>
		</div>
		<div class="row ">
			<div class="col-sm-6">
				<div class="form-group">
					<h3>Jenis kelamin pasien adalah <?= $data[1]['jkelamin'] ?></h3>
				</div>
			</div>
		</div>
		<?php
		$tmeter = $data[1]['tbadan'] / 100;
		if ($data[1]['jkelamin'] == 'Pria') {
		?>
			<div class="row ">
				<div class="col-sm-12">
					<div class="form-group">
						<h3>Menghitung Indeks Massa Tubuh (IMT)</h3>
						<h3><small>IMT = BeratBadan(kg) / (TinggiBadan(m) * TinggiBadan(m)</small></h3>
						<h3><small>IMT = <?= $data[1]['bbadan'] . ' / (' . $tmeter . ' x ' . $tmeter . ') = ' . $data[1]['IMT'] ?></small></h3>
						<h3><small>Lalu mengklasifikasi IMT, jika IMT diantara 18.5 - 25 maka Berat Badan Ideal (BBI) = Berat Badan Pasien</small></h3>
						<h3><small>Selain itu BBI akan menggunakan rumus</small></h3>
						<?php
						if ($data[1]['IMT'] <= 25 && $data[1]['IMT'] >= 18.5) {
						?>
							<h3><small>BBI = <?= $data[1]['bbadan'] ?></small></h3>
						<?php
						} else {
						?>
							<h3><small>BBI = (TinggiBadan(cm) - 100) - 0.1(TinggiBadan(cm) - 100)</small></h3>
							<h3><small>BBI = <?= '(' . $data[1]['tbadan'] . ' - 100) - 0.1 x (' . $data[1]['tbadan'] . ' - 100 = ' . $data[1]['BBI'] ?></small></h3>
						<?php
						}
						?>
					</div>
				</div>
			</div>
			<div class="row ">
				<div class="col-sm-12">
					<div class="form-group">
						<h3>Menghitung Basal Metabolic Rate (BMR)</h3>
						<h3><small>BMR = 66 + (13.7 x BeratBadanIdeal) + 5 x TinggiBadan(cm) - (6.8 x Umur)</small></h3>
						<h3><small>BMR = 66 + (13.7 x <?= $data[1]['BBI'] . ') + (5 x ' . $data[1]['tbadan'] . ') - (6.8 x ' . $data[1]['umur'] . ') = ' . $data[1]['BMR'] ?></small></h3>
					</div>
				</div>
			</div>
		<?php
		} else {
		?>
			<div class="row ">
				<div class="col-sm-12">
					<div class="form-group">
						<h3>Menghitung Indeks Massa Tubuh (IMT)</h3>
						<h3><small>IMT = BeratBadan(kg) / (TinggiBadan(m) * TinggiBadan(m)</small></h3>
						<h3><small>IMT = <?= $data[1]['bbadan'] . ' / (' . $tmeter . ' x ' . $tmeter . ') = ' . $data[1]['IMT'] ?></small></h3>
						<h3><small>Lalu mengklasifikasi IMT, jika IMT diantara 18.5 - 25 maka Berat Badan Ideal (BBI) = Berat Badan Awal</small></h3>
						<h3><small>Selain itu BBI akan menggunakan rumus</small></h3>
						<?php
						if ($data[1]['IMT'] <= 25 && $data[1]['IMT'] >= 18.5) {
						?>
							<h3><small>BBI = <?= $data[1]['bbadan'] ?></small></h3>
						<?php
						} else {
						?>
							<h3><small>BBI = (TinggiBadan(cm) - 100) - 0.15(TinggiBadan(cm) - 100)</small></h3>
							<h3><small>BBI = <?= '(' . $data[1]['tbadan'] . ' - 100) - 0.15 x (' . $data[1]['tbadan'] . ' - 100) = ' . $data[1]['BBI'] ?></small></h3>
						<?php
						}
						?>
					</div>
				</div>
			</div>
			<div class="row ">
				<div class="col-sm-12">
					<div class="form-group">
						<h3>Menghitung Basal Metabolic Rate (BMR)</h3>
						<h3><small>BMR = 65.5 + (9.6 x BeratBadanIdeal) + 1.7 x TinggiBadan(cm) - (4.7 x Umur)</small></h3>
						<h3><small>BMR = 65.5 + (9.6 x <?= $data[1]['BBI'] . ') + (1.7 x ' . $data[1]['tbadan'] . ') - (4.7 x ' . $data[1]['umur'] . ') = ' . $data[1]['BMR'] ?></small></h3>
					</div>
				</div>
			</div>
		<?php
		}
		?>
		<div class="row ">
			<div class="col-sm-12">
				<div class="form-group">
					<h3>Menghitung Kebutuhan Energi (KE)</h3>
					<h3><small>KE = BasalMetabolicRate x TingkatAktifitas x TingkatStres</small></h3>
					<h3><small>KE = <?= $data[1]['BMR'] . ' x ' . $data[1]['taktifitas'] . ' x ' . $data[1]['tstres'] . ' = ' . $data[1]['Kkalori'] ?></small></h3>
				</div>
			</div>
		</div>
		<div class="row ">
			<div class="col-sm-12">
				<div class="form-group">
					<h3>Menghitung Kebutuhan Karbohidrat</h3>
					<h3><small>Karbohidrat = 0.65 x KE / 4</small></h3>
					<h3><small>Karbohidrat = 0.65 x <?= $data[1]['Kkalori'] ?> / 4 = <?= $data[1]['Kkarbohidrat'] ?></small></h3>
					<h3>Menghitung Kebutuhan Protein</h3>
					<h3><small>Protein = 0.15 x KE / 4</small></h3>
					<h3><small>Protein = 0.15 x <?= $data[1]['Kkalori'] ?> / 4 = <?= $data[1]['Kprotein'] ?></small></h3>
					<h3>Menghitung Kebutuhan Lemak</h3>
					<h3><small>Lemak = 0.2 x KE / 9</small></h3>
					<h3><small>Lemak = 0.2 x <?= $data[1]['Kkalori'] ?> / 9 = <?= $data[1]['Klemak'] ?></small></h3>
					<h3>Menghitung Kebutuhan Kalori</h3>
					<h3><small>Kalori = Kebutuhan Energi</small></h3>
					<h3><small>Kalori = <?= $data[1]['Kkalori'] ?> = <?= $data[1]['Kkalori'] ?></small></h3>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="card">
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered table-responsive-lg text-center">
				<thead class=" thead-light">
					<tr>
						<th>Kode Makanan</th>
						<th>Nama</th>
						<th>Karbohidrat</th>
						<th>Protein</th>
						<th>Lemak</th>
						<th>Natrium</th>
						<th>Kalori</th>
						<th>Kalium</th>
					</tr>
				</thead>
				<tbody>
					<!-- ini nanti pakek perulangan saja -->
					<?php
					for ($i = 1; $i <= 15; $i++) { ?>
						<tr>
							<td><?= $data[2][1][$i]->kode_makanan ?></td>
							<td><?= $data[2][1][$i]->nama ?></td>
							<td><?= $data[2][1][$i]->karbohidrat ?></td>
							<td><?= $data[2][1][$i]->protein ?></td>
							<td><?= $data[2][1][$i]->lemak ?></td>
							<td><?= $data[2][1][$i]->natrium ?></td>
							<td><?= $data[2][1][$i]->kalori ?></td>
							<td><?= $data[2][1][$i]->kalium ?></td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>
		<h3><b>Perhitungan Kebutuhan Gizi Rekomendasi Sistem</b></h3>
		<div class="row ">
			<div class="col-sm-12">
				<div class="form-group">
					<h3>Menghitung Total Karbohidrat</h3>
					<h3><small>TotalKarbohidrat = <?= $data[2][1][1]->karbohidrat . ' + ' . $data[2][1][2]->karbohidrat . ' + ' . $data[2][1][3]->karbohidrat . ' + ' . $data[2][1][4]->karbohidrat . ' + ' . $data[2][1][5]->karbohidrat . ' + ' .
																					$data[2][1][6]->karbohidrat . ' + ' . $data[2][1][7]->karbohidrat . ' + ' . $data[2][1][8]->karbohidrat . ' + ' . $data[2][1][9]->karbohidrat . ' + ' . $data[2][1][10]->karbohidrat . ' + ' .
																					$data[2][1][11]->karbohidrat . ' + ' . $data[2][1][12]->karbohidrat . ' + ' . $data[2][1][13]->karbohidrat . ' + ' . $data[2][1][14]->karbohidrat . ' + ' . $data[2][1][15]->karbohidrat . ' = ' . $data[2][1]['totalKarbo'] ?></small></h3>
					<h3>Menghitung Total Protein</h3>
					<h3><small>TotalProtein = <?= $data[2][1][1]->protein . ' + ' . $data[2][1][2]->protein . ' + ' . $data[2][1][3]->protein . ' + ' . $data[2][1][4]->protein . ' + ' . $data[2][1][5]->protein . ' + ' .
																			$data[2][1][6]->protein . ' + ' . $data[2][1][7]->protein . ' + ' . $data[2][1][8]->protein . ' + ' . $data[2][1][9]->protein . ' + ' . $data[2][1][10]->protein . ' + ' .
																			$data[2][1][11]->protein . ' + ' . $data[2][1][12]->protein . ' + ' . $data[2][1][13]->protein . ' + ' . $data[2][1][14]->protein . ' + ' . $data[2][1][15]->protein . ' = ' . $data[2][1]['totalProtein'] ?></small></h3>
					<h3>Menghitung Total Lemak</h3>
					<h3><small>TotalLemak = <?= $data[2][1][1]->lemak . ' + ' . $data[2][1][2]->lemak . ' + ' . $data[2][1][3]->lemak . ' + ' . $data[2][1][4]->lemak . ' + ' . $data[2][1][5]->lemak . ' + ' .
																		$data[2][1][6]->lemak . ' + ' . $data[2][1][7]->lemak . ' + ' . $data[2][1][8]->lemak . ' + ' . $data[2][1][9]->lemak . ' + ' . $data[2][1][10]->lemak . ' + ' .
																		$data[2][1][11]->lemak . ' + ' . $data[2][1][12]->lemak . ' + ' . $data[2][1][13]->lemak . ' + ' . $data[2][1][14]->lemak . ' + ' . $data[2][1][15]->lemak .  ' = ' . $data[2][1]['totalLemak'] ?></small></h3>
					<h3>Menghitung Total Natrium</h3>
					<h3><small>TotalNatrium = <?= $data[2][1][1]->natrium . ' + ' . $data[2][1][2]->natrium . ' + ' . $data[2][1][3]->natrium . ' + ' . $data[2][1][4]->natrium . ' + ' . $data[2][1][5]->natrium . ' + ' .
																			$data[2][1][6]->natrium . ' + ' . $data[2][1][7]->natrium . ' + ' . $data[2][1][8]->natrium . ' + ' . $data[2][1][9]->natrium . ' + ' . $data[2][1][10]->natrium . ' + ' .
																			$data[2][1][11]->natrium . ' + ' . $data[2][1][12]->natrium . ' + ' . $data[2][1][13]->natrium . ' + ' . $data[2][1][14]->natrium . ' + ' . $data[2][1][15]->natrium .  ' = ' . $data[2][1]['totalNatrium'] ?></small></h3>
					<h3>Menghitung Total Kalori</h3>
					<h3><small>TotalKalori = <?= $data[2][1][1]->kalori . ' + ' . $data[2][1][2]->kalori . ' + ' . $data[2][1][3]->kalori . ' + ' . $data[2][1][4]->kalori . ' + ' . $data[2][1][5]->kalori . ' + ' .
																			$data[2][1][6]->kalori . ' + ' . $data[2][1][7]->kalori . ' + ' . $data[2][1][8]->kalori . ' + ' . $data[2][1][9]->kalori . ' + ' . $data[2][1][10]->kalori . ' + ' .
																			$data[2][1][11]->kalori . ' + ' . $data[2][1][12]->kalori . ' + ' . $data[2][1][13]->kalori . ' + ' . $data[2][1][14]->kalori . ' + ' . $data[2][1][15]->kalori .  ' = ' . $data[2][1]['totalKalori'] ?></small></h3>
					<h3>Menghitung Total Kalium</h3>
					<h3><small>TotalKalium = <?= $data[2][1][1]->kalium . ' + ' . $data[2][1][2]->kalium . ' + ' . $data[2][1][3]->kalium . ' + ' . $data[2][1][4]->kalium . ' + ' . $data[2][1][5]->kalium . ' + ' .
																			$data[2][1][6]->kalium . ' + ' . $data[2][1][7]->kalium . ' + ' . $data[2][1][8]->kalium . ' + ' . $data[2][1][9]->kalium . ' + ' . $data[2][1][10]->kalium . ' + ' .
																			$data[2][1][11]->kalium . ' + ' . $data[2][1][12]->kalium . ' + ' . $data[2][1][13]->kalium . ' + ' . $data[2][1][14]->kalium . ' + ' . $data[2][1][15]->kalium .  ' = ' . $data[2][1]['totalKalium'] ?></small></h3>
				</div>
			</div>
		</div>
		<div class="row ">
			<div class="col-sm-12">
				<div class="form-group">
					<h3>Menghitung Pinalti Pada Setiap Kategori Makanan</h3>
					<h3><small>PinaltiKarbohidrat = | TotalKarbo - KebutuhanKarbohidrat |</small></h3>
					<h3><small>PinaltiKarbohidrat = | <?= $data[2][1]['totalKarbo'] . ' - ' . $data[1]['Kkarbohidrat'] . ' | = ' . $data[2][1]['pinaltiKarbo'] ?></small></h3>
					<h3><small>PinaltiProtein = | TotalProtein - KebutuhanProtein |</small></h3>
					<h3><small>PinaltiProtein = | <?= $data[2][1]['totalProtein'] . ' - ' . $data[1]['Kprotein']  . ' | = ' . $data[2][1]['pinaltiProtein'] ?></small></h3>
					<h3><small>PinaltiLemak = | TotalLemak - KebutuhanLemak |</small></h3>
					<h3><small>PinaltiLemak = | <?= $data[2][1]['totalLemak'] . ' - ' . $data[1]['Klemak'] . ' | = ' . $data[2][1]['pinaltiLemak'] ?></small></h3>
					<h3><small>Untuk natrium jika TotalNatrium berada diantara Kebutuhan Natrium Pasien, maka PinaltiNatrium = 0</small></h3>
					<h3><small>Jika diluar kebutuhan Natrium Pasien maka akan dikurangi</small></h3>
					<?php
					if ($data[2][1]['totalNatrium'] > $data[1]['Knatrium1'] && $data[2][1]['totalNatrium'] < $data[1]['Knatrium2']) {
					?>
						<h3><small>PinaltiNatrium = 0</small></h3>
					<?php } else {
					?>
						<h3><small>PinaltiNatrium = | TotalNatrium - KebutuhanNatrium |</small></h3>
						<h3><small>PinaltiNatrium = | <?= $data[2][1]['totalNatrium'] . ' - ' .  $data[1]['Knatrium2'] . ' | = ' . $data[2][1]['pinaltiNatrium'] ?></small></h3>
					<?php
					}
					?>
					<h3><small>PinaltiKalori = | TotalKalori - KebutuhanKalori |</small></h3>
					<h3><small>PinaltiKalori = | <?= $data[2][1]['totalKalori'] . ' - ' . $data[1]['Kkalori'] . ' | = ' . $data[2][1]['pinaltiKalori'] ?></small></h3>
					<h3><small>PinaltiKalium = | TotalKalium - KebutuhanKalium |</small></h3>
					<h3><small>PinaltiKalium = | <?= $data[2][1]['totalKalium'] . ' - ' . $data[1]['Kkalium'] . ' | = ' . $data[2][1]['pinaltiKalium'] ?></small></h3>
				</div>
			</div>
		</div>
		<div class="row ">
			<div class="col-sm-12">
				<div class="form-group">
					<h3>Menghitung Total Pinalti</h3>
					<h3><small>TotalPinalti = <?= $data[2][1]['pinaltiKarbo'] . ' + ' . $data[2][1]['pinaltiProtein'] . ' + ' . $data[2][1]['pinaltiLemak'] . ' + ' . $data[2][1]['pinaltiNatrium'] . ' + ' . $data[2][1]['pinaltiKalori'] . ' + ' . $data[2][1]['pinaltiKalium'] . ' = ' . $data[2][1]['totalPinalti'] ?></small></h3>
				</div>
			</div>
		</div>
		<div class="row ">
			<div class="col-sm-12">
				<div class="form-group">
					<h3>Menghitung Nilai Fitness</h3>
					<h3><small>Fitness = 1 / TotalPinalti</small></h3>
					<h3><small>Fitness = 1 / <?= $data[2][1]['totalPinalti'] . ' = ' . $data[2][1]['fitness'] ?></small></h3>
				</div>
			</div>
		</div>
		<div class="row ">
			<div class="col-sm-12">
				<div class="form-group">
					<h3><small>Waktu Proses <?= $data[2][1]['waktu'] ?> detik</small></h3>
				</div>
			</div>
		</div>

		<div class="table-responsive">
			<h3>Tabel Hasil Nilai Fitness Berdasarkan Generasi Algoritma Genetika </h3>
			<table id="zero_config" class="table table-striped table-bordered">
				<thead>
					<tr class="text-center">
						<th>Generasi</th>
						<th>Nilai Fitness</th>
					</tr>
				</thead>
				<tbody>
					<?php
					for ($i = 1; $i <= 12; $i++) { ?>
						<tr class="text-center">
							<td><?= $i * 10; ?></td>
							<td><?= $data[3][$i] ?></td>
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>

		<div class="row ">
			<!-- column -->
			<!-- column -->
			<div class="col-lg-12">
				<div class="card">
					<div class="card-body">
						<h3 class="card-title">Grafik Hasil Nilai Fitness Berdasarkan Generasi Algoritma Genetika</h3>
						<div class="ct-area-ln-chart" style="height: 400px; font: 900;"></div>
					</div>
				</div>
			</div>
			<!-- column -->
			<!-- column -->
		</div>

		<!-- =================================================== -->
		<!-- Untuk perpindahan Data -->
		<!-- =================================================== -->
		<form action="<?= base_url('rekomendasimakanan/hasil_rekomendasi/1') ?>" method="POST">
			<div class="form-group">
				<!-- Data Kebutuhan Pasien -->
				<input type="hidden" name="keb_gizi[]" class="form-control" value="<?= $data[1]['nama'] ?>">
				<input type="hidden" name="keb_gizi[]" class="form-control" value="<?= $data[1]['tbadan'] ?>">
				<input type="hidden" name="keb_gizi[]" class="form-control" value="<?= $data[1]['bbadan'] ?>">
				<input type="hidden" name="keb_gizi[]" class="form-control" value="<?= $data[1]['jkelamin'] ?>">
				<input type="hidden" name="keb_gizi[]" class="form-control" value="<?= $data[1]['umur'] ?>">
				<input type="hidden" name="keb_gizi[]" class="form-control" value="<?= $data[1]['IMT'] ?>">
				<input type="hidden" name="keb_gizi[]" class="form-control" value="<?= $data[1]['BBI'] ?>">
				<input type="hidden" name="keb_gizi[]" class="form-control" value="<?= $data[1]['BMR'] ?>">
				<input type="hidden" name="keb_gizi[]" class="form-control" value="<?= $data[1]['taktifitas'] ?>">
				<input type="hidden" name="keb_gizi[]" class="form-control" value="<?= $data[1]['tstres'] ?>">
				<input type="hidden" name="keb_gizi[]" class="form-control" value="<?= $data[1]['Kkarbohidrat'] ?>">
				<input type="hidden" name="keb_gizi[]" class="form-control" value="<?= $data[1]['Kprotein'] ?>">
				<input type="hidden" name="keb_gizi[]" class="form-control" value="<?= $data[1]['Klemak'] ?>">
				<input type="hidden" name="keb_gizi[]" class="form-control" value="<?= $data[1]['Knatrium1'] ?>">
				<input type="hidden" name="keb_gizi[]" class="form-control" value="<?= $data[1]['Knatrium2'] ?>">
				<input type="hidden" name="keb_gizi[]" class="form-control" value="<?= $data[1]['Kkalori'] ?>">
				<input type="hidden" name="keb_gizi[]" class="form-control" value="<?= $data[1]['Tekanan Darah'] ?>">

				<!-- Data Hasil Rekomendasi Sistem Alternatif 1-->
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1]['waktu'] ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1][1]->kode_makanan ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1][2]->kode_makanan ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1][3]->kode_makanan ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1][4]->kode_makanan ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1][5]->kode_makanan ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1][6]->kode_makanan ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1][7]->kode_makanan ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1][8]->kode_makanan ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1][9]->kode_makanan ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1][10]->kode_makanan ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1][11]->kode_makanan ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1][12]->kode_makanan ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1][13]->kode_makanan ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1][14]->kode_makanan ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1][15]->kode_makanan ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1]['fitness'] ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1]['totalKarbo'] ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1]['totalProtein'] ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1]['totalLemak'] ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1]['totalNatrium'] ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1]['totalKalori'] ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1]['pinaltiKarbo'] ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1]['pinaltiProtein'] ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1]['pinaltiLemak'] ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1]['pinaltiNatrium'] ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1]['pinaltiKalori'] ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1]['totalPinalti'] ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1]['selisihKarbo'] ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1]['selisihProtein'] ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1]['selisihLemak'] ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1]['selisihNatrium'] ?>">
				<input type="hidden" name="hasil[]" class="form-control" value="<?= $data[2][1]['selisihKalori'] ?>">
				<input type="hidden" name="totalK" class="form-control" value="<?= $data[2][1]['totalKalium'] ?>">
				<input type="hidden" name="pinaltiK" class="form-control" value="<?= $data[2][1]['pinaltiKalium'] ?>">
				<input type="hidden" name="selisihK" class="form-control" value="<?= $data[2][1]['selisihKalium'] ?>">

				<!-- Data Hasil Rekomendasi Sistem Alternatif 2-->
				<input type="hidden" name="nama[]" class="form-control" value="<?= $data[2][2][1]->nama ?>">
				<input type="hidden" name="nama[]" class="form-control" value="<?= $data[2][2][2]->nama ?>">
				<input type="hidden" name="nama[]" class="form-control" value="<?= $data[2][2][3]->nama ?>">
				<input type="hidden" name="nama[]" class="form-control" value="<?= $data[2][2][4]->nama ?>">
				<input type="hidden" name="nama[]" class="form-control" value="<?= $data[2][2][5]->nama ?>">
				<input type="hidden" name="nama[]" class="form-control" value="<?= $data[2][2][6]->nama ?>">
				<input type="hidden" name="nama[]" class="form-control" value="<?= $data[2][2][7]->nama ?>">
				<input type="hidden" name="nama[]" class="form-control" value="<?= $data[2][2][8]->nama ?>">
				<input type="hidden" name="nama[]" class="form-control" value="<?= $data[2][2][9]->nama ?>">
				<input type="hidden" name="nama[]" class="form-control" value="<?= $data[2][2][10]->nama ?>">
				<input type="hidden" name="nama[]" class="form-control" value="<?= $data[2][2][11]->nama ?>">
				<input type="hidden" name="nama[]" class="form-control" value="<?= $data[2][2][12]->nama ?>">
				<input type="hidden" name="nama[]" class="form-control" value="<?= $data[2][2][13]->nama ?>">
				<input type="hidden" name="nama[]" class="form-control" value="<?= $data[2][2][14]->nama ?>">
				<input type="hidden" name="nama[]" class="form-control" value="<?= $data[2][2][15]->nama ?>">
				<input type="hidden" name="totalKarbo" class="form-control" value="<?= $data[2][2]['totalKarbo'] ?>">
				<input type="hidden" name="totalProtein" class="form-control" value="<?= $data[2][2]['totalProtein'] ?>">
				<input type="hidden" name="totalLemak" class="form-control" value="<?= $data[2][2]['totalLemak'] ?>">
				<input type="hidden" name="totalNatrium" class="form-control" value="<?= $data[2][2]['totalNatrium'] ?>">
				<input type="hidden" name="totalKalori" class="form-control" value="<?= $data[2][2]['totalKalori'] ?>">
				<input type="hidden" name="selisihKarbo" class="form-control" value="<?= $data[2][2]['selisihKarbo'] ?>">
				<input type="hidden" name="selisihProtein" class="form-control" value="<?= $data[2][2]['selisihProtein'] ?>">
				<input type="hidden" name="selisihLemak" class="form-control" value="<?= $data[2][2]['selisihLemak'] ?>">
				<input type="hidden" name="selisihNatrium" class="form-control" value="<?= $data[2][2]['selisihNatrium'] ?>">
				<input type="hidden" name="selisihKalori" class="form-control" value="<?= $data[2][2]['selisihKalori'] ?>">
				<input type="hidden" name="totalKalium" class="form-control" value="<?= $data[2][2]['totalKalium'] ?>">
				<input type="hidden" name="selisihKalium" class="form-control" value="<?= $data[2][2]['selisihKalium'] ?>">

				<?php
				for ($i = 1; $i <= 12; $i++) {
				?>
					<input type="hidden" name="fitness[]" class="form-control" value="<?= $data[3][$i] ?>">
				<?php
				}
				?>

				<button type="submit" name="process" value="process" class="btn btn-success waves-effect">Kembali</i>
			</div>
		</form>
		<!-- =================================================== -->
		<!-- Batas Akhir Perpindahan Data -->
		<!-- =================================================== -->
	</div>
</div>