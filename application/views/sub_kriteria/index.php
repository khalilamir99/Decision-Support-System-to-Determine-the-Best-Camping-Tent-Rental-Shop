<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cubes"></i> Data Sub Kriteria</h1>
</div>

<?= $this->session->flashdata('message'); ?>

<?php if ($kriteria == NULL): ?>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Daftar Data Sub Kriteria</h6>
		</div>

		<div class="card-body">
			<div class="alert alert-info">
				Data masih kosong.
			</div>
		</div>
	</div>
<?php endif ?>

<?php foreach ($kriteria as $key): ?>
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<div class="d-sm-flex align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> <?= $key->keterangan . " (" . $key->kode_kriteria . ")" ?></h6>

				<a href="#tambah<?= $key->id_kriteria ?>" data-toggle="modal" class="btn btn-sm btn-success"> <i class="fa fa-plus"></i> Tambah Data </a>
			</div>
		</div>

		<div class="modal fade" id="tambah<?= $key->id_kriteria ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="myModalLabel"><i class="fa fa-plus"></i> Tambah <?= $key->keterangan ?></h5>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<form action="<?= base_url('SubKriteria/store'); ?>" method="post">
						<div class="modal-body">
							<input type="text" name="id_kriteria" value="<?= $key->id_kriteria ?>" hidden>
							<div class="form-group">
								<label for="deskripsi" class="font-weight-bold">Nama Sub Kriteria</label>
								<input autocomplete="off" type="text" name="deskripsi" value="<?php echo set_value('deskripsi'); ?>" required class="form-control" />
								<?php echo form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
							</div>
							<div class="form-group">
								<label for="nilai" class="font-weight-bold">Nilai</label>
								<input autocomplete="off" type="text" name="nilai" value="<?php echo set_value('nilai'); ?>" required class="form-control" />
								<?php echo form_error('nilai', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
							<button type="submit" class="btn btn-save"><i class="fa fa-save"></i> Simpan</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered">
					<thead class="bg-success text-white">
						<tr align="center">
							<th width="5%">No</th>
							<th>Nama Sub Kriteria</th>
							<th>Nilai</th>
							<th width="15%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$sub_kriteria1 = $this->Sub_Kriteria_model->data_sub_kriteria($key->id_kriteria);
						$no = 1;
						foreach ($sub_kriteria1 as $key):
						?>
							<tr align="center">
								<td><?= $no ?></td>
								<td align="left"><?= $key['deskripsi'] ?></td>
								<td><?= $key['nilai'] ?></td>
								<td>
									<div class="btn-group" role="group">
										<a data-toggle="modal" data-placement="bottom" data-tooltip="tooltip" title="Edit Data" href="#editsk<?= $key['id_sub_kriteria'] ?>" class="btn btn-primary btn-sm mr-2"><i class="fa fa-edit"></i>
										</a>
										<a data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?= base_url('SubKriteria/destroy/' . $key['id_sub_kriteria']) ?>" class="btn btn-danger btn-sm" onclick="return confirm ('Apakah anda yakin untuk meghapus data ini')"><i class="fa fa-trash"></i></a>
									</div>
								</td>
							</tr>

							<div class="modal fade" id="editsk<?= $key['id_sub_kriteria'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="myModalLabel"><i class="fa fa-edit"></i> Edit <?= $key['deskripsi'] ?></h5>
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
										</div>
										<form action="<?= base_url('SubKriteria/update/' . $key['id_sub_kriteria']) ?>" method="post">
											<div class="modal-body">
												<input type="text" name="id_kriteria" value="<?= $key['id_kriteria'] ?>" hidden>
												<div class="form-group">
													<label for="deskripsi" class="font-weight-bold">Nama Sub Kriteria</label>
													<input autocomplete="off" type="text" name="deskripsi" value="<?= $key['deskripsi'] ?>" required class="form-control" />
													<?php echo form_error('deskripsi', '<small class="text-danger">', '</small>'); ?>
												</div>
												<div class="form-group">
													<label for="nilai" class="font-weight-bold">Nilai</label>
													<input autocomplete="off" type="text" name="nilai" value="<?= $key['nilai'] ?>" required class="form-control" />
													<?php echo form_error('nilai', '<small class="text-danger">', '</small>'); ?>
												</div>
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
												<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Update</button>
											</div>
										</form>
									</div>
								</div>
							</div>

						<?php
							$no++;
						endforeach
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

<?php endforeach ?>

<?php $this->load->view('layouts/footer_admin'); ?>

<script>
	$(document).ready(function() {
		$('[data-tooltip="tooltip"]').tooltip();

		var modalOpen = "<?= $this->session->flashdata('modal_open'); ?>";
		if (modalOpen) {
			$('#tambah' + modalOpen).modal('show');
		}

		var modalEditOpen = "<?= $this->session->flashdata('modal_edit_open'); ?>";
		if (modalEditOpen) {
			$('#editsk' + modalEditOpen).modal('show');
		}
	});
</script>