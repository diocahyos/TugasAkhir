<div class="card">
	<div class="card-body">
		<?php if (!empty($this->session->userdata('typeNotif'))) : ?>
			<div id="alerttype" class="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
				<h3 id="alerttitle"><i id="alerticon" class="mx-1"></i></h3>
				<span id="alertmessage"></span>
			</div>
		<?php endif; ?>
		<?php if (!empty($this->session->userdata('typeNotif'))) : ?>
			<!-- <div class="alert alert-success"><?= $this->session->userdata('typeNotif') ?></div> -->
		<?php endif; ?>
		<!-- <div class="alert alert-success">This is an example top alert. You can edit what u wish. </div> -->
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">
					<select class="select2 form-control custom-select" style="width: 100%; height: 36px;" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);">
						<option value="" selected disabled>Pilih</option>
						<option value=" <?php echo base_url() . 'makanan/data_makanan/1'; ?>">Makanan Pokok</option>
						<option value=" <?php echo base_url() . 'makanan/data_makanan/2'; ?>">Sumber Hewani</option>
						<option value=" <?php echo base_url() . 'makanan/data_makanan/3'; ?>">Sumber Nabati</option>
						<option value=" <?php echo base_url() . 'makanan/data_makanan/4'; ?>">Sayuran</option>
						<option value=" <?php echo base_url() . 'makanan/data_makanan/5'; ?>">Buah</option>
					</select>
				</div>
			</div>
			<div class="col-sm-9 text-right">
				<div class="form-group">
					<a href="<?= base_url('makanan/input_makanan') ?>" class="btn waves-effect waves-light btn-success" style="width: 15%; height: 36px;">Tambah Makanan</a>
				</div>
			</div>
		</div>

		<div class="table-responsive">
			<table id="zero_config" class="table table-striped table-bordered">
				<thead>
					<tr class="text-center">
						<th>Kode</th>
						<th>Nama</th>
						<th>Karbohidrat</th>
						<th>Protein</th>
						<th>Lemak</th>
						<th>Natrium</th>
						<th>Kalori</th>
						<th>Kalium</th>
						<th>Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($lists as $list) : ?>
						<tr class="text-center">
							<td><?= $list->kode_makanan; ?></td>
							<td><?= $list->nama; ?></td>
							<td><?= $list->karbohidrat; ?></td>
							<td><?= $list->protein; ?></td>
							<td><?= $list->lemak; ?></td>
							<td><?= $list->natrium; ?></td>
							<td><?= $list->kalori; ?></td>
							<td><?= $list->kalium; ?></td>
							<td>
								<a href="<?= base_url('makanan/edit_makanan/' . $kategori . '/' . $list->id_makanan) ?>" type="button" class="btn waves-effect waves-light btn-warning" data-toggle="tooltip" title="Ubah"><i class="fas fa-pencil-alt"></i></a>
								<a href="<?= base_url('makanan/hapus_makanan/' . $kategori . '/' . $list->id_makanan . '/' . $list->kode_makanan) ?>" onclick='return confirm("Apakah anda yakin ingin menghapus?")' class="btn waves-effect waves-light btn-danger text-inverse" title="Hapus" data-toggle="tooltip">
									<i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>
					<?php endforeach; ?>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>