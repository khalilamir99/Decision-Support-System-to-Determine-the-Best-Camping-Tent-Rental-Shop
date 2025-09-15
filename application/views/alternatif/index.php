<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-users"></i> Data Alternatif</h1>
	<a href="<?= base_url('alternatif/create'); ?>" class="btn btn-success mr-3"><span class="icon text-white-100"><i class="fas fa-plus"></i></span>
		<span class="text">Tambah Data Alternatif</span>
	</a>
</div>

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-list"></i> Daftar Data Alternatif</h6>
	</div>
	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-success text-white">
					<tr align="center">
						<th>Nama Toko</th>
						<th>Aksi</th>
						<th>Nilai</th>
					</tr>
				</thead>
				<?php foreach ($alternatif as $alt) { ?>
					<tr align="center">
						<td><?= $alt->nama ?></td>
						<td>
							<div class="d-flex justify-content-center">
								<a data-toggle="tooltip" data-placement="bottom" title="Detail Data" href="<?= base_url('alternatif/detail/' . $alt->id_alternatif); ?>" class="btn btn-info btn-sm mr-2"><i class="fa fa-eye"></i></a>
								<a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="<?= base_url('alternatif/edit/' . $alt->id_alternatif); ?>" class="btn btn-primary btn-sm mr-2"><i class="fa fa-edit"></i></a>
								<a data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?= base_url('alternatif/destroy/' . $alt->id_alternatif); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus data ini?')"><i class="fa fa-trash"></i></a>
							</div>
						</td>
						<?php $cek_tombol = $this->Alternatif_model->untuk_tombol($alt->id_alternatif); ?>
						<td>
							<?php if ($cek_tombol > 0): ?>
								<a data-toggle="modal" href="#modalPenilaian<?= $alt->id_alternatif ?>" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
							<?php else: ?>
								<a data-toggle="modal" href="#modalPenilaian<?= $alt->id_alternatif ?>" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Input</a>
							<?php endif; ?>
						</td>
					</tr>

					<!-- Modal Input/Edit Penilaian -->
					<div class="modal fade" id="modalPenilaian<?= $alt->id_alternatif ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="myModalLabel">
										<i class="fa fa-<?= $cek_tombol > 0 ? 'edit' : 'plus' ?>"></i>
										<?= $cek_tombol > 0 ? 'Edit Penilaian' : 'Input Penilaian' ?>
									</h5>
									<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
								</div>

								<!-- Form Input/Edit -->
								<?= form_open($cek_tombol > 0 ? 'Alternatif/update_penilaian' : 'Alternatif/tambah_penilaian') ?>

								<div class="modal-body">
									<input type="hidden" name="id_alternatif" value="<?= $alt->id_alternatif ?>">

									<?php foreach ($kriteria as $key): ?>
										<?php
										$sub_kriteria = $this->Alternatif_model->data_sub_kriteria($key->id_kriteria);
										?>
										<?php if ($sub_kriteria != NULL): ?>
											<input type="hidden" name="id_kriteria[]" value="<?= $key->id_kriteria ?>">
											<div class="form-group">
												<label class="font-weight-bold" for="<?= $key->id_kriteria ?>"><?= $key->keterangan ?></label>
												<select name="nilai[]" class="form-control" id="<?= $key->id_kriteria ?>" required>
													<option value="">--Pilih--</option>
													<?php foreach ($sub_kriteria as $subs_kriteria): ?>
														<?php
														$selected = '';
														if ($cek_tombol > 0) {
															$s_option = $this->Alternatif_model->data_penilaian($alt->id_alternatif, $subs_kriteria['id_kriteria']);
															if ($subs_kriteria['id_sub_kriteria'] == $s_option['nilai']) {
																$selected = 'selected';
															}
														}
														?>
														<option value="<?= $subs_kriteria['id_sub_kriteria'] ?>" <?= $selected ?>><?= $subs_kriteria['deskripsi'] ?></option>
													<?php endforeach ?>
												</select>
											</div>
										<?php endif ?>
									<?php endforeach ?>
								</div>

								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times"></i> Batal</button>
									<button type="submit" class="btn btn-<?= $cek_tombol > 0 ? 'success' : 'save' ?>"><i class="fa fa-save"></i> <?= $cek_tombol > 0 ? 'Update' : 'Simpan' ?></button>
								</div>

								</form>
							</div>
						</div>
					</div>
				<?php } ?>
			</table>
		</div>
	</div>
</div>

<?php $this->load->view('layouts/footer_admin'); ?>