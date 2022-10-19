<div class="card">
	<div class="card-body">
		<b><span>Masukkan Nilai gizi per 100g BDD (Berat Dapat Dimakan</span></b>
		<form class="form-horizontal mt-4" action="<?php echo base_url('makanan/input_makanan/1') ?>" method="POST">

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="name">Nama</label>
						<input type="text" id="name" name="nama" class="form-control" placeholder="Nama">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>Kategori Makanan</label>
						<select class="custom-select col-12" name="kategori">
							<option value="1">Makanan Pokok</option>
							<option value="2">Sumber Hewani</option>
							<option value="3">Sumber Nabati</option>
							<option value="4">Sayuran</option>
							<option value="5">Buah</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="karbohidrat">Karbohidrat</label>
						<input type="number" id="karbohidrat" name="karbohidrat" step="0.01" min="0" class="form-control" placeholder="Karbohidrat">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="protein">Protein</label>
						<input type="number" id="protein" name="protein" min="0" step="0.01" class="form-control" placeholder="Protein">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="lemak">Lemak</label>
						<input type="number" id="lemak" name="lemak" min="0" step="0.01" class="form-control" placeholder="Lemak">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="natrium">Natrium</label>
						<input type="number" id="natrium" name="natrium" min="0" step="0.01" class="form-control" placeholder="Natrium">
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="kalori">Kalori</label>
						<input type="number" id="kalori" name="kalori" min="0" step="0.01" class="form-control" placeholder="Kalori">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="kalium">Kalium</label>
						<input type="number" id="kalium" name="kalium" min="0" step="0.01" class="form-control" placeholder="Kalium">
					</div>
				</div>
			</div>
			<div class="text-center">
				<button type="submit" name="process" value="process" class="btn btn-success waves-effect m-4">Submit</i>
			</div>
		</form>
	</div>
</div>