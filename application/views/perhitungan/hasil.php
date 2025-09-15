<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-chart-area"></i> Data Hasil Akhir</h1>
	<a href="<?= base_url('Laporan/cetak_laporan_hasil'); ?>" class="btn btn-primary mr-3" id="btn-cetak-laporan"> <i class="fa fa-print"></i> Cetak Laporan </a>
</div>

<?php
$has_incomplete = false;
foreach ($hasil as $keys) {
	$all_filled = true;
	foreach ($kriteria as $key) {
		$data_pencocokan = $this->Perhitungan_model->data_nilai($keys->id_alternatif, $key->id_kriteria);
		$min_max = $this->Perhitungan_model->get_max_min($key->id_kriteria);
		if (empty($data_pencocokan['nilai']) || $min_max['max'] == $min_max['min']) {
			$all_filled = false;
			$has_incomplete = true;
			break;
		}
	}
}

if ($has_incomplete) : ?>
	<div class="alert alert-warning alert-dismissible fade show" role="alert">
		<strong><i class="fas fa-exclamation-triangle"></i> Perhatian!</strong> Terdapat data yang belum lengkap. Data dengan nilai "-" menunjukkan bahwa kriteria penilaian belum diisi lengkap.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
<?php endif; ?>

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-success"><i class="fa fa-table"></i> Hasil Akhir Perankingan</h6>
	</div>

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-success text-white">
					<tr align="center">
						<th>Alternatif</th>
						<th>Nilai Preferensi</th>
						<th width="15%">Ranking</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($hasil as $keys): ?>
						<tr align="center">
							<td align="left" style="padding-left: 5px;">
								<?php
								$nama_alternatif = $this->Perhitungan_model->get_hasil_alternatif($keys->id_alternatif);
								echo $nama_alternatif['nama'];
								?>
							</td>
							<td>
								<?php
								$all_filled = true;
								foreach ($kriteria as $key) {
									$data_pencocokan = $this->Perhitungan_model->data_nilai($keys->id_alternatif, $key->id_kriteria);
									$min_max = $this->Perhitungan_model->get_max_min($key->id_kriteria);
									if (empty($data_pencocokan['nilai']) || $min_max['max'] == $min_max['min']) {
										$all_filled = false;
										break;
									}
								}
								echo $all_filled ? $keys->nilai : "-";
								?>
							</td>
							<td><?= $no; ?></td>
						</tr>
					<?php
						$no++;
					endforeach ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php $this->load->view('layouts/footer_admin'); ?>

<script>
	document.getElementById('btn-cetak-laporan').addEventListener('click', function(event) {
		var hasIncompleteData = <?= json_encode($has_incomplete); ?>;
		if (hasIncompleteData) {
			event.preventDefault();
			alert('Data tidak lengkap! Pastikan semua kriteria penilaian telah diisi.');
		}
	});
</script>