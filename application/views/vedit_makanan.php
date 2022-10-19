<div class="card">
	<div class="card-body">
		<b><span>Masukkan Nilai gizi per 100g BDD (Berat Dapat Dimakan</span></b>
		<form class="form-horizontal mt-4" action="<?php echo base_url('makanan/edit_makanan/' . $kategori . '/' . $list->id_makanan)  ?>" method="POST">
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="name">Nama</label>
						<input type="text" id="name" name="nama" class="form-control" value="<?= $list->nama ?>" placeholder="Nama">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>Kategori Makanan</label>
						<select class="custom-select col-12" disabled>
							<option <?= $kategori == 1 ? 'selected' : NULL ?> value="1">Makanan Pokok</option>
							<option <?= $kategori == 2 ? 'selected' : NULL ?> value="2">Sumber Hewani</option>
							<option <?= $kategori == 3 ? 'selected' : NULL ?> value="3">Sumber Nabati</option>
							<option <?= $kategori == 4 ? 'selected' : NULL ?> value="4">Sayuran</option>
							<option <?= $kategori == 5 ? 'selected' : NULL ?> value="5">Buah</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="karbohidrat">Karbohidrat</label>
						<input type="number" id="karbohidrat" name="karbohidrat" step="0.01" min="0" value="<?= $list->karbohidrat ?>" class="form-control" placeholder="Karbohidrat">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="protein">Protein</label>
						<input type="number" id="protein" name="protein" step="0.01" min="0" value="<?= $list->protein ?>" class="form-control" placeholder="Protein">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="lemak">Lemak</label>
						<input type="number" id="lemak" name="lemak" step="0.01" min="0" value="<?= $list->lemak ?>" class="form-control" placeholder="Lemak">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="natrium">Natrium</label>
						<input type="number" id="natrium" name="natrium" step="0.01" min="0" value="<?= $list->natrium ?>" class="form-control" placeholder="Natrium">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="kalori">Kalori</label>
						<input type="number" id="kalori" name="kalori" step="0.01" min="0" value="<?= $list->kalori ?>" class="form-control" placeholder="Kalori">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="kalium">kalium</label>
						<input type="number" id="kalium" name="kalium" step="0.01" min="0" value="<?= $list->kalium ?>" class="form-control" placeholder="Kalori">
					</div>
				</div>
			</div>
			<div class="text-center">
				<button type="submit" name="process" value="process" class="btn btn-success waves-effect m-4">Ubah</i>
			</div>
		</form>
	</div>
</div>