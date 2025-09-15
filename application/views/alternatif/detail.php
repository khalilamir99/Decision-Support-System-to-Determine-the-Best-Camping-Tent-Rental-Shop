<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-info-circle"></i> Detail Alternatif</h1>
	<a href="<?= base_url('alternatif'); ?>" class="btn btn-secondary btn-icon-split mr-3"><span class="icon text-white-50"><i class="fas fa-arrow-left"></i></span>
		<span class="text">Kembali</span>
	</a>
</div>

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-info-circle"></i> Detail Data Alternatif</h6>
	</div>
	<div class="card-body">
		<h5>Informasi Toko</h5>
		<table class="table">
			<tr>
				<th>Nama Alternatif</th>
				<td><?= $alternatif->nama ?></td>
			</tr>
			<tr>
				<th>Alamat</th>
				<td><?= $alternatif->alamat ?></td>
			</tr>
			<tr>
				<th>Waktu Operasional</th>
				<td><?= $alternatif->waktu ?></td>
			</tr>
			<tr>
				<th>Nomor Telepon</th>
				<td><?= $alternatif->no_telp ?></td>
			</tr>
		</table>

		<h5>Data Tenda</h5>
		<table class="table">
			<tr>
				<th>Kapasitas</th>
				<th>Jumlah</th>
				<th>Merek</th>
				<th>Harga</th>
			</tr>
			<?php foreach ($this->Alternatif_model->getTendaById($alternatif->id_alternatif) as $tenda) { ?>
				<tr>
					<td><?= $tenda->kapasitas ?></td>
					<td><?= $tenda->jumlah ?></td>
					<td><?= $tenda->merek ?></td>
					<td><?= $tenda->harga ?></td>
				</tr>
			<?php } ?>
		</table>
	</div>
</div>

<?php $this->load->view('layouts/footer_admin'); ?>