<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-edit"></i> Edit Alternatif</h1>
	<a href="<?= base_url('Alternatif'); ?>" class="btn btn-secondary btn-icon-split mr-3"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-edit"></i> Formulir Edit Alternatif</h6>
	</div>

	<div class="card-body">
		<form action="<?= base_url('Alternatif/update/' . $alternatif->id_alternatif); ?>" method="post">
			<div class="form-group col-md-6">
				<label class="font-weight-bold">Nama Alternatif</label>
				<input autocomplete="off" type="text" name="nama" value="<?php echo $alternatif->nama ?>" required class="form-control" />
				<?php echo form_error('nama', '<small class="text-danger">', '</small>'); ?>
			</div>

			<div class="form-group col-md-6">
				<label class="font-weight-bold">Alamat</label>
				<input autocomplete="off" type="text" name="alamat" value="<?php echo $alternatif->alamat ?>" required class="form-control" />
			</div>

			<div class="form-group col-md-6">
				<label class="font-weight-bold">Waktu Operasional</label>
				<input autocomplete="off" type="text" name="waktu" value="<?php echo $alternatif->waktu ?>" required class="form-control" />
			</div>

			<div class="form-group col-md-6">
				<label class="font-weight-bold">Nomor Telepon</label>
				<input autocomplete="off" type="text" name="no_telp" value="<?php echo $alternatif->no_telp ?>" required class="form-control" />
			</div>

			<hr>

			<h5>Data Tenda</h5>
			<div id="tenda-wrapper">
				<?php foreach ($this->Alternatif_model->getTendaById($alternatif->id_alternatif) as $tenda) { ?>
					<div class="form-row mb-2">
						<div class="col">
							<input type="text" name="kapasitas[]" class="form-control" value="<?= $tenda->kapasitas ?>" required>
						</div>
						<div class="col">
							<input type="text" name="jumlah[]" class="form-control" value="<?= $tenda->jumlah ?>" required>
						</div>
						<div class="col">
							<input type="text" name="merek[]" class="form-control" value="<?= $tenda->merek ?>" required>
						</div>
						<div class="col">
							<input type="text" name="harga[]" class="form-control" value="<?= $tenda->harga ?>" required>
						</div>
						<div class="col">
							<button type="button" class="btn btn-danger remove-tenda">Hapus</button>
						</div>
					</div>
				<?php } ?>
			</div>
			<div class="d-flex justify-content-between">
				<button type="button" id="add-tenda" class="btn btn-primary mb-3"> <i class="fa fa-plus"></i>Tambah Tenda</button>
				<button type="submit" class="btn btn-success mb-3"> <i class="fa fa-save"></i>Simpan Perubahan</button>
			</div>
		</form>
	</div>
</div>

<?php $this->load->view('layouts/footer_admin'); ?>

<script>
	document.getElementById("add-tenda").addEventListener("click", function() {
		const tendaWrapper = document.getElementById("tenda-wrapper");
		const newRow = document.createElement("div");
		newRow.classList.add("form-row", "mb-2");

		newRow.innerHTML = `
			<div class="col">
				<input type="text" name="kapasitas[]" class="form-control" placeholder="Kapasitas Tenda" required>
			</div>
			<div class="col">
				<input type="text" name="jumlah[]" class="form-control" placeholder="Jumlah Tenda" required>
			</div>
			<div class="col">
				<input type="text" name="merek[]" class="form-control" placeholder="Merek Tenda" required>
			</div>
			<div class="col">
				<input type="text" name="harga[]" class="form-control" placeholder="Harga Tenda" required>
			</div>
			<div class="col">
				<button type="button" class="btn btn-danger remove-tenda">Hapus</button>
			</div>
		`;
		tendaWrapper.appendChild(newRow);
	});

	document.addEventListener("click", function(event) {
		if (event.target.classList.contains("remove-tenda")) {
			event.target.closest(".form-row").remove();
		}
	});
</script>