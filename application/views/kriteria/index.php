<?php $this->load->view('layouts/header_admin'); ?>

<div class="d-sm-flex align-items-center justify-content-between mb-4">
	<h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-cube"></i> Data Kriteria</h1>
	<a href="<?= base_url('Kriteria/create'); ?>" class="btn btn-success mr-5"><span class="icon text-white-100"><i class="fa fa-plus"></i></span>
		<span class="text">Tambah Data Kriteria</span>
	</a>
</div>

<?= $this->session->flashdata('message'); ?>

<div class="card shadow mb-4">
	<div class="card-header py-3">
		<h6 class="m-0 font-weight-bold text-success"><i class="fas fa-fw fa-list"></i> Daftar Data Kriteria</h6>
	</div>

	<div class="card-body">
		<div class="table-responsive">
			<table class="table table-bordered" width="100%" cellspacing="0">
				<thead class="bg-success text-white">
					<tr align="center">
						<th width="5%">No</th>
						<th>Kode Kriteria</th>
						<th>Nama Kriteria</th>
						<th>Bobot</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php
					$no = 1;
					foreach ($list as $data) {
					?>
						<tr align="center">
							<td><?= $no ?></td>
							<td><?= $data->kode_kriteria ?></td>
							<td><?= $data->keterangan ?></td>
							<td><?= $data->bobot ?></td>
							<td>
								<div class="d-flex justify-content-center">
									<a data-toggle="tooltip" data-placement="bottom" title="Edit Data" href="<?= base_url('Kriteria/edit/' . $data->id_kriteria) ?>" class="btn btn-primary btn-sm mr-2"><i class="fa fa-edit"></i></a>
									<a data-toggle="tooltip" data-placement="bottom" title="Hapus Data" href="<?= base_url('Kriteria/destroy/' . $data->id_kriteria) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')"><i class="fa fa-trash"></i></a>
								</div>
							</td>
						</tr>
					<?php
						$no++;
					} ?>
				</tbody>
			</table>
		</div>
	</div>
</div>

<?php $this->load->view('layouts/footer_admin'); ?>