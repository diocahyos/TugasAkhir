<div class="card">
	<div class="card-body">
		<form class="form-horizontal mt-4" action="<?= base_url('rekomendasimakanan/input_parameter') ?>" method="POST">
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="jpopulasi">Jumlah Populasi</label>
						<input type="number" id="jpopulasi" name="jpopulasi" min="0" class="form-control" placeholder="Jumlah Populasi" required>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label>Mutation Rate</label>
						<select class="custom-select col-12" name="mr" required>
							<option value="0.1">0.1</option>
							<option value="0.2">0.2</option>
							<option value="0.3">0.3</option>
							<option value="0.4">0.4</option>
							<option value="0.5">0.5</option>
							<option value="0.6">0.6</option>
							<option value="0.7">0.7</option>
							<option value="0.8">0.8</option>
							<option value="0.9">0.9</option>
						</select>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label for="jgenerasi">Jumlah Generasi</label>
						<input type="number" id="jgenerasi" name="jgenerasi" min="0" class="form-control" placeholder="Jumlah Generasi" required>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="kmax">Kmax</label>
						<input type="number" id="kmax" name="kmax" min="0" class="form-control" placeholder="Kmax" required>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						<label>Crossover Rate</label>
						<select class="custom-select col-12" name="cr" required>
							<option value="0.1">0.1</option>
							<option value="0.2">0.2</option>
							<option value="0.3">0.3</option>
							<option value="0.4">0.4</option>
							<option value="0.5">0.5</option>
							<option value="0.6">0.6</option>
							<option value="0.7">0.7</option>
							<option value="0.8">0.8</option>
							<option value="0.9">0.9</option>
						</select>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						<label for="iterasils">Iterasi Local Search</label>
						<input type="number" id="iterasils" name="iterasils" min="0" class="form-control" placeholder="Iterasi Local Search" required>
					</div>
				</div>
			</div>
			<!-- Perpindahan data kebutuhan gizi pasien -->
			<input type="hidden" name="nama" value="<?= $keb_gizi['nama'] ?>">
			<input type="hidden" name="Kkarbohidrat" value="<?= $keb_gizi['karbohidrat'] ?>">
			<input type="hidden" name="Kprotein" value="<?= $keb_gizi['protein'] ?>">
			<input type="hidden" name="Klemak" value="<?= $keb_gizi['lemak'] ?>">
			<input type="hidden" name="Knatrium" value="<?= $keb_gizi['natrium'] ?>">
			<input type="hidden" name="Kkalori" value="<?= $keb_gizi['kalori'] ?>">
			<div class="text-center">
				<button type="submit" name="process" value="process" class="btn btn-success waves-effect m-4">Submit</i>
			</div>
		</form>
	</div>
</div>