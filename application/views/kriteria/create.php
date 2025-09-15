<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cube"></i> Data Kriteria</h1>
	<a href="<?= base_url('Kriteria'); ?>" class="btn btn-secondary btn-icon-split mr-3"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-plus"></i> Tambah Data Kriteria</h6>
	</div>

	<div class="card-body">
		<form action="<?= base_url('Kriteria/store'); ?>" method="post">
			<div class="form-group col-md-6">
				<label class="font-weight-bold">Kode Kriteria</label>
				<input autocomplete="off" type="text" name="kode_kriteria" value="<?php echo set_value('kode_kriteria'); ?>" required class="form-control" />
				<?php echo form_error('kode_kriteria', '<small class="text-danger">', '</small>'); ?>
			</div>

			<div class="form-group col-md-6">
				<label class="font-weight-bold">Nama Kriteria</label>
				<input autocomplete="off" type="text" name="keterangan" value="<?php echo set_value('keterangan'); ?>" required class="form-control" />
				<?php echo form_error('keterangan', '<small class="text-danger">', '</small>'); ?>
			</div>

			<div class="form-group col-md-6">
				<label class="font-weight-bold">Bobot Kriteria</label>
				<input autocomplete="off" type="number" name="bobot" step="0.0001" value="<?php echo set_value('bobot'); ?>" required class="form-control" />
				<?php echo form_error('bobot', '<small class="text-danger">', '</small>'); ?>
			</div>

			<div class="card-footer text-right">
				<button type="submit" class="btn btn-save"><i class="fa fa-save"></i> Simpan</button>
				<button type="reset" class="btn btn-info"><i class="fa fa-sync-alt"></i> Reset</button>
			</div>
		</form>
	</div>

	<?php $this->load->view('layouts/footer_admin'); ?>