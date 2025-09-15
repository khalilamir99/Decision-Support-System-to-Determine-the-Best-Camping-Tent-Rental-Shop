<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-calculator"></i> Data Perhitungan - Step <?= $step ?></h1>
</div>

<?php
function has_incomplete_data($alternatif, $kriteria, $Perhitungan_model)
{
	foreach ($alternatif as $alt) {
		foreach ($kriteria as $krit) {
			$data_pencocokan = $Perhitungan_model->data_nilai($alt->id_alternatif, $krit->id_kriteria);
			if (empty($data_pencocokan['nilai'])) {
				return true;
			}
		}
	}
	return false;
}

if (has_incomplete_data($alternatif, $kriteria, $this->Perhitungan_model)) : ?>
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<strong><i class="fas fa-exclamation-triangle"></i> Perhatian!</strong>
		Terdapat data yang belum lengkap. Data dengan nilai "-" menunjukkan bahwa kriteria penilaian belum diisi lengkap.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php endif; ?>

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-success">
			<?php if ($step == 1): ?>
				Matriks Keputusan (x)
			<?php elseif ($step == 2): ?>
				Normalisasi Matriks (x)
			<?php elseif ($step == 3): ?>
				Perkalian Matriks Normalisasi Dengan Bobot Kriteria
			<?php endif; ?>
		</h6>
	</div>
	<div class="d-flex justify-content-between mt-4 px-3">
		<?php if ($step > 1): ?>
			<a href="<?= base_url('Perhitungan/perhitunganStep/' . ($step - 1)); ?>" class="btn btn-secondary btn-icon-split">
				<span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
				<span class="text">Back</span>
			</a>
		<?php else: ?>
			<div></div>
		<?php endif; ?>

		<?php if ($step < 3): ?>
			<a href="<?= base_url('Perhitungan/perhitunganStep/' . ($step + 1)); ?>" class="btn btn-secondary btn-icon-split">
				<span class="icon text-white-50"><i class="fas fa-arrow-right"></i></span>
				<span class="text">Next</span>
			</a>
		<?php endif; ?>
	</div>

	<div class="card-body">
		<div class="table-responsive">
			<?php if ($step == 1): ?>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" width="100%" cellspacing="0">
							<thead class="bg-success text-white">
								<tr align="center">
									<th width="5%">No</th>
									<th>Alternatif</th>
									<?php foreach ($kriteria as $key): ?>
										<th><?= $key->kode_kriteria ?></th>
									<?php endforeach ?>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($alternatif as $keys): ?>
									<tr align="center">
										<td><?= $no; ?></td>
										<td align="left"><?= $keys->nama ?></td>
										<?php foreach ($kriteria as $key): ?>
											<td>
												<?php
												$data_pencocokan = $this->Perhitungan_model->data_nilai($keys->id_alternatif, $key->id_kriteria);
												echo (empty($data_pencocokan['nilai']) ? "-" : $data_pencocokan['nilai']);
												?>
											</td>
										<?php endforeach ?>
									</tr>
								<?php
									$no++;
								endforeach ?>
								<tr align="center" class="bg-light">
									<th colspan="2">Nilai A+</th>
									<?php foreach ($kriteria as $key): ?>
										<th>
											<?php
											$min_max = $this->Perhitungan_model->get_max_min($key->id_kriteria);
											echo $min_max['max'];
											?>
										</th>
									<?php endforeach ?>
								</tr>
								<tr align="center" class="bg-light">
									<th colspan="2">Nilai A-</th>
									<?php foreach ($kriteria as $key): ?>
										<th>
											<?php
											$min_max = $this->Perhitungan_model->get_max_min($key->id_kriteria);
											echo $min_max['min'];
											?>
										</th>
									<?php endforeach ?>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			<?php elseif ($step == 2): ?>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" width="100%" cellspacing="0">
							<thead class="bg-success text-white">
								<tr align="center">
									<th width="5%">No</th>
									<th>Nama Alternatif</th>
									<?php foreach ($kriteria as $key): ?>
										<th><?= $key->kode_kriteria ?></th>
									<?php endforeach ?>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($alternatif as $keys): ?>
									<tr align="center">
										<td><?= $no; ?></td>
										<td align="left"><?= $keys->nama ?></td>
										<?php foreach ($kriteria as $key): ?>
											<td>
												<?php
												$data_pencocokan = $this->Perhitungan_model->data_nilai($keys->id_alternatif, $key->id_kriteria);
												$min_max = $this->Perhitungan_model->get_max_min($key->id_kriteria);
												echo (empty($data_pencocokan['nilai']) || $min_max['max'] == $min_max['min']) ? "-" : @(round(($data_pencocokan['nilai'] - $min_max['min']) / ($min_max['max'] - $min_max['min']), 4));
												?>
											</td>
										<?php endforeach ?>
									</tr>
								<?php
									$no++;
								endforeach ?>
							</tbody>
						</table>
					</div>
					<div class="table-responsive">
						<table class="table table-bordered" width="100%" cellspacing="0">
							<thead class="bg-success text-white">
								<tr align="center">
									<?php foreach ($kriteria as $key): ?>
										<th><?= $key->kode_kriteria ?></th>
									<?php endforeach ?>
								</tr>
							</thead>
							<tbody>
								<tr align="center">
									<?php foreach ($kriteria as $key): ?>
										<td>
											<?php
											echo $key->bobot;
											?>
										</td>
									<?php endforeach ?>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			<?php elseif ($step == 3): ?>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-bordered" width="100%" cellspacing="0">
							<thead class="bg-success text-white">
								<tr align="center">
									<th width="5%">No</th>
									<th>Nama Alternatif</th>
									<th>Perhitungan</th>
									<th>Total Nilai Preferensi</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$this->Perhitungan_model->hapus_hasil();
								$no = 1;
								foreach ($alternatif as $keys): ?>
									<tr align="center">
										<td><?= $no; ?></td>
										<td align="left"><?= $keys->nama ?></td>
										<td>SUM
											<?php
											$nilai_total = 0;
											$all_filled = true;
											foreach ($kriteria as $key):
												$data_pencocokan = $this->Perhitungan_model->data_nilai($keys->id_alternatif, $key->id_kriteria);
												$min_max = $this->Perhitungan_model->get_max_min($key->id_kriteria);
												if (empty($data_pencocokan['nilai']) || $min_max['max'] == $min_max['min']) {
													$all_filled = false;
													echo "( - ) ";
												} else {
													$hasil_normalisasi = @(round(($data_pencocokan['nilai'] - $min_max['min']) / ($min_max['max'] - $min_max['min']), 4));
													$bobot = $key->bobot;
													$nilai_total += $bobot * $hasil_normalisasi;
													echo "(" . $bobot . "x" . $hasil_normalisasi . ") ";
												}
											endforeach;
											echo $all_filled ? $nilai_total : "-";
											?>
										</td>
										<td>
											<?= $all_filled ? $nilai_total : "-"; ?>
										</td>
									</tr>
								<?php
									$no++;
								endforeach ?>
							</tbody>
						</table>
					</div>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php $this->load->view('layouts/footer_admin'); ?>