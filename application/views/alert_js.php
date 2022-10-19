<script src="<?php echo base_url() ?>includes/assets/libs/sweetalert2/dist/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url() ?>includes/assets/libs/sweetalert2/sweet-alert.init.js"></script>

<!-- Custom script -->
<script type="text/javascript">
	$('.hapus').on('click', function(e) {

		e.preventDefault();
		const href = $(this).attr('href');

		Swal({
			title: "Apakah anda yakin ingin menghapus?",
			text: "Data anda akan dihapus !",
			type: "warning",
			showCancelButton: true,
			confirmButtonColor: "#DD6B55",
			confirmButtonText: "Ya, hapus",
			cancelButtonText: 'Tidak, batalkan!',
			closeOnConfirm: false
		}).then((result) => {
			if (result.value) {
				document.location.href = href;
			}
		})
	});
</script>

<script type="text/javascript">
	$(function() {
		var typeNotif = '<?php echo $this->session->userdata('typeNotif'); ?>';
		switch (typeNotif) {
			case 'successAddData':
				var icon = $('#alerttitle').html();
				$('#alerttitle').html(icon + "Sukses");
				$('#alertmessage').text("Berhasil menambahkan data");
				$('#alerttitle').addClass("text-success");
				$('#alerttype').addClass("alert-success");
				$('#alerticon').addClass("fa fa-check-circle");
				break;
			case 'errorAddData':
				var icon = $('#alerttitle').html();
				$('#alerttitle').html(icon + "Gagal!");
				$('#alerttitle').addClass("tx-danger");
				$('#alertmessage').text("Gagal menambahkan data");
				$('#alerttype').addClass("alert-danger");
				$('#alerticon').addClass("fas fa-exclamation-triangle");
				break;
			case 'successEdited':
				var icon = $('#alerttitle').html();
				$('#alerttitle').html(icon + "Sukses");
				$('#alertmessage').text("Berhasil mengedit data");
				$('#alerttitle').addClass("text-success");
				$('#alerttype').addClass("alert-success");
				$('#alerticon').addClass("fa fa-check-circle");
				break;
			case 'errorEdited':
				var icon = $('#alerttitle').html();
				$('#alerttitle').html(icon + "Gagal");
				$('#alertmessage').text("Gagal mengedit data");
				$('#alerttitle').addClass("tx-danger");
				$('#alerttype').addClass("alert-danger");
				$('#alerticon').addClass("fas fa-exclamation-triangle");
				break;
			case 'successDelete':
				var icon = $('#alerttitle').html();
				$('#alerttitle').html(icon + "Sukses");
				$('#alertmessage').text("Berhasil menghapus data");
				$('#alerttitle').addClass("text-success");
				$('#alerttype').addClass("alert-success");
				$('#alerticon').addClass("fa fa-check-circle");
				break;
			case 'errorDelete':
				var icon = $('#alerttitle').html();
				$('#alerttitle').html(icon + "Gagal");
				$('#alertmessage').text("Gagal menghapus data");
				$('#alerttitle').addClass("tx-danger");
				$('#alerttype').addClass("alert-danger");
				$('#alerticon').addClass("fas fa-exclamation-triangle");
				break;
		}
		<?php $this->session->set_userdata('typeNotif', ''); ?>
	});
</script>