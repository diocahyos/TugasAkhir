<div class="card">
	<div class="card-body">
		<form class="form-horizontal mt-4" action="<?= base_url('rekomendasimakanan') ?>" method="POST">
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="name">Nama Pasien</label>
						<input type="text" id="name" name="nama" class="form-control" placeholder="Nama Pasien" required>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="tbadan">Tinggi Badan</label>
						<input type="number" id="tbadan" name="tbadan" min="0" class="form-control" placeholder="Tinggi Badan" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label>Jenis Kelamin</label>
						<select class="custom-select col-12" name="jkelamin" required>
							<option value="1">Pria</option>
							<option value="2">Wanita</option>
						</select>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="tdarah">Tekanan Darah</label>
						<div class="row">
							<div class="col-sm-2">
								<input type="number" id="tdarah" name="sistolik" min="120" class="form-control" placeholder="120" required>
							</div>
							<div class="col-sm-1 text-center">
								<h2>/</h3>
							</div>
							<div class="col-sm-2">
								<input type="number" name="diastolik" min="80" class="form-control" placeholder="80" required>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="umur">Umur</label>
						<input type="number" id="umur" name="umur" min="0" class="form-control" placeholder="Umur" required>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>Tingkat Aktifitas</label>
						<select class="custom-select col-12" name="taktifitas" required>
							<option value="1">Ringan</option>
							<option value="2">Sedang</option>
							<option value="3">Berat</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="bbadan">Berat Badan</label>
						<input type="number" id="bbadan" name="bbadan" min="0" class="form-control" placeholder="Berat Badan" required>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>Tingkat Stres</label>
						<select class="custom-select col-12" name="tstres" required>
							<option value="1.4">Ringan</option>
							<option value="1.5">Sedang</option>
							<option value="2">Berat</option>
						</select>
					</div>
				</div>
			</div>
			<div class="text-center">
				<button type="submit" name="process" value="process" class="btn btn-success waves-effect m-4">Submit</i>
			</div>
		</form>
	</div>
</div>