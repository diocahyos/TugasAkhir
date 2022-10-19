<div class="card">
	<div class="card-body">
		<h3><b><?= $data[1]['nama']; ?></b></h3>
		<h3><b>Alternatif 1</b></h3>
		<div class="table-responsive">
			<table class="table table-bordered table-responsive-lg">
				<thead class="thead-light">
					<tr class="text-center">
						<th><b>Makan Pagi</b></th>
						<th><b>Berat (g)</b></th>
						<th><b>Makan Siang</b></th>
						<th><b>Berat (g)</b></th>
						<th><b>Makan Malam</b></th>
						<th><b>Berat (g)</b></th>
					</tr>
				</thead>
				<tbody class="text-center">
					<tr>
						<td><?= $data[2][1][1]->nama; ?></td>
						<td>150</td>
						<td><?= $data[2][1][6]->nama; ?></td>
						<td>150</td>
						<td><?= $data[2][1][11]->nama; ?></td>
						<td>150</td>
					</tr>
					<tr>
						<td><?= $data[2][1][2]->nama; ?></td>
						<td>80</td>
						<td><?= $data[2][1][7]->nama; ?></td>
						<td>80</td>
						<td><?= $data[2][1][12]->nama; ?></td>
						<td>80</td>
					</tr>
					<tr>
						<td><?= $data[2][1][3]->nama; ?></td>
						<td>50</td>
						<td><?= $data[2][1][8]->nama; ?></td>
						<td>50</td>
						<td><?= $data[2][1][13]->nama; ?></td>
						<td>50</td>
					</tr>
					<tr>
						<td><?= $data[2][1][4]->nama; ?></td>
						<td>250</td>
						<td><?= $data[2][1][9]->nama; ?></td>
						<td>250</td>
						<td><?= $data[2][1][14]->nama; ?></td>
						<td>250</td>
					</tr>
					<tr>
						<td><?= $data[2][1][5]->nama; ?></td>
						<td>150</td>
						<td><?= $data[2][1][10]->nama; ?></td>
						<td>150</td>
						<td><?= $data[2][1][15]->nama; ?></td>
						<td>150</td>
					</tr>
				</tbody>
			</table>
		</div>
		<h3><b>Alternatif 2</b></h3>
		<div class="table-responsive">
			<table class="table table-bordered table-responsive-lg">
				<thead class="thead-light">
					<tr class="text-center">
						<th><b>Makan Pagi</b></th>
						<th><b>Berat (g)</b></th>
						<th><b>Makan Siang</b></th>
						<th><b>Berat (g)</b></th>
						<th><b>Makan Malam</b></th>
						<th><b>Berat (g)</b></th>
					</tr>
				</thead>
				<tbody class="text-center">
					<tr>
						<td><?= $data[2][2][1]->nama; ?></td>
						<td>150</td>
						<td><?= $data[2][2][6]->nama; ?></td>
						<td>150</td>
						<td><?= $data[2][2][11]->nama; ?></td>
						<td>150</td>
					</tr>
					<tr>
						<td><?= $data[2][2][2]->nama; ?></td>
						<td>80</td>
						<td><?= $data[2][2][7]->nama; ?></td>
						<td>80</td>
						<td><?= $data[2][2][12]->nama; ?></td>
						<td>80</td>
					</tr>
					<tr>
						<td><?= $data[2][2][3]->nama; ?></td>
						<td>50</td>
						<td><?= $data[2][2][8]->nama; ?></td>
						<td>50</td>
						<td><?= $data[2][2][13]->nama; ?></td>
						<td>50</td>
					</tr>
					<tr>
						<td><?= $data[2][2][4]->nama; ?></td>
						<td>250</td>
						<td><?= $data[2][2][9]->nama; ?></td>
						<td>250</td>
						<td><?= $data[2][2][14]->nama; ?></td>
						<td>250</td>
					</tr>
					<tr>
						<td><?= $data[2][2][5]->nama; ?></td>
						<td>150</td>
						<td><?= $data[2][2][10]->nama; ?></td>
						<td>150</td>
						<td><?= $data[2][2][15]->nama; ?></td>
						<td>150</td>
					</tr>
				</tbody>
			</table>
		</div>
		<!-- =================================================== -->
		<!-- Untuk perpindahan Data -->
		<!-- =================================================== -->
		<form action="<?= base_url('rekomendasimakanan/hasil_rekomendasi/0') ?>" method="POST">
			<div class="form-group text-right">
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
				for ($i = 1; $i <= 12; $i++) { ?>
					<input type="hidden" name="fitness[]" class="form-control" value="<?= $data[3][$i] ?>">
				<?php
				}
				?>
				<button type="submit" name="process" value="process" class="btn btn-success waves-effect">Perhitungan</i>
			</div>
		</form>
		<!-- =================================================== -->
		<!-- Batas Akhir Perpindahan Data -->
		<!-- =================================================== -->
	</div>
</div>
<div class="card">
	<div class="card-body">
		<h3><b>Alternatif 1</b></h3>
		<div class="table-responsive">
			<table class="table table-bordered table-responsive-lg">
				<thead class=" thead-light">
					<tr class="text-center">
						<th></th>
						<th>Karbohidrat (g)</th>
						<th>Protein (g)</th>
						<th>Lemak (g)</th>
						<th>Natrium (mg)</th>
						<th>Kalori (kal)</th>
						<th>Kalium (mg)</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Kebutuhan Pasien</td>
						<td class="text-center"><?= $data[1]['Kkarbohidrat'] ?></td>
						<td class="text-center"><?= $data[1]['Kprotein'] ?></td>
						<td class="text-center"><?= $data[1]['Klemak'] ?></td>
						<td class="text-center"><?= $data[1]['Knatrium1'] . ' - ' . $data[1]['Knatrium2'] ?></td>
						<td class="text-center"><?= $data[1]['Kkalori'] ?></td>
						<td class="text-center"><?= $data[1]['Kkalium'] ?></td>
					</tr>
					<tr>
						<td>Hasil Rekomendasi Sistem</td>
						<td class="text-center"><?= $data[2][1]['totalKarbo'] ?></td>
						<td class="text-center"><?= $data[2][1]['totalProtein'] ?></td>
						<td class="text-center"><?= $data[2][1]['totalLemak'] ?></td>
						<td class="text-center"><?= $data[2][1]['totalNatrium'] ?></td>
						<td class="text-center"><?= $data[2][1]['totalKalori'] ?></td>
						<td class="text-center"><?= $data[2][1]['totalKalium'] ?></td>
					</tr>
					<tr>
						<td>Selisih</td>
						<td class="text-center"><?= $data[2][1]['selisihKarbo'] ?>%</td>
						<td class="text-center"><?= $data[2][1]['selisihProtein'] ?>%</td>
						<td class="text-center"><?= $data[2][1]['selisihLemak'] ?>%</td>
						<td class="text-center"><?= $data[2][1]['selisihNatrium'] ?> mg</td>
						<td class="text-center"><?= $data[2][1]['selisihKalori'] ?>%</td>
						<td class="text-center"><?= $data[2][1]['selisihKalium'] ?>%</td>
					</tr>
				</tbody>
			</table>
		</div>
		<h3><b>Alternatif 2</b></h3>
		<div class="table-responsive">
			<table class="table table-bordered table-responsive-lg">
				<thead class=" thead-light">
					<tr class="text-center">
						<th></th>
						<th>Karbohidrat (g)</th>
						<th>Protein (g)</th>
						<th>Lemak (g)</th>
						<th>Natrium (mg)</th>
						<th>Kalori (kal)</th>
						<th>Kalium (mg)</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Kebutuhan Pasien</td>
						<td class="text-center"><?= $data[1]['Kkarbohidrat'] ?></td>
						<td class="text-center"><?= $data[1]['Kprotein'] ?></td>
						<td class="text-center"><?= $data[1]['Klemak'] ?></td>
						<td class="text-center"><?= $data[1]['Knatrium1'] . ' - ' . $data[1]['Knatrium2'] ?></td>
						<td class="text-center"><?= $data[1]['Kkalori'] ?></td>
						<td class="text-center"><?= $data[1]['Kkalium'] ?></td>
					</tr>
					<tr>
						<td>Hasil Rekomendasi Sistem</td>
						<td class="text-center"><?= $data[2][2]['totalKarbo'] ?></td>
						<td class="text-center"><?= $data[2][2]['totalProtein'] ?></td>
						<td class="text-center"><?= $data[2][2]['totalLemak'] ?></td>
						<td class="text-center"><?= $data[2][2]['totalNatrium'] ?></td>
						<td class="text-center"><?= $data[2][2]['totalKalori'] ?></td>
						<td class="text-center"><?= $data[2][2]['totalKalium'] ?></td>
					</tr>
					<tr>
						<td>Selisih</td>
						<td class="text-center"><?= $data[2][2]['selisihKarbo'] ?>%</td>
						<td class="text-center"><?= $data[2][2]['selisihProtein'] ?>%</td>
						<td class="text-center"><?= $data[2][2]['selisihLemak'] ?>%</td>
						<td class="text-center"><?= $data[2][2]['selisihNatrium'] ?> mg</td>
						<td class="text-center"><?= $data[2][2]['selisihKalori'] ?>%</td>
						<td class="text-center"><?= $data[2][2]['selisihKalium'] ?>%</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>