<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
	</div>

	<div class="card" style="width: 60% ; margin-bottom: 100px">
		<div class="card-body">

			<?php foreach ($pkp as $p) : ?>
				<form method="POST" action="<?php echo base_url('admin/Data_PKP/update_data_aksi') ?>" enctype="multipart/form-data">

					<div class="form-group">
						<label>Kode</label>
						<input type="text" name="kode" class="form-control" value="<?= $p->kode ?>">
						<?php echo form_error('kode', '<div class="text-small text-danger"> </div>') ?>
					</div>

					<div class="form-group">
						<label>Keterangan</label>
						<input type="text" name="keterangan" class="form-control" value="<?= $p->keterangan ?>">
						<?php echo form_error('keterangan', '<div class="text-small text-danger"> </div>') ?>
					</div>

					<div class="form-group">
						<label>Batas Bawah PKP Setahun (Rp.)</label>
						<input type="text" name="nominal" class="form-control" value="<?= $p->nominal ?>">
						<?php echo form_error('nominal', '<div class="text-small text-danger"> </div>') ?>
					</div>

					<div class="form-group">
						<label>Batas Atas PKP Setahun (Rp.)</label>
						<input type="text" name="nominal_akhir" class="form-control" value="<?= $p->nominal_akhir ?>">
						<?php echo form_error('nominal', '<div class="text-small text-danger"> </div>') ?>
					</div>

					<div class="form-group">
						<label>Potongan Memiliki NPWP (%)</label>
						<input type="text" name="pot_npwp" class="form-control" value="<?= $p->pot_npwp ?>">
						<?php echo form_error('pot_npwp', '<div class="text-small text-danger"> </div>') ?>
					</div>

					<div class="form-group">
						<label>Potongan Tidak Memiliki NPWP (%)</label>
						<input type="text" name="pot_no_npwp" class="form-control" value="<?= $p->pot_no_npwp ?>">
						<?php echo form_error('pot_no_npwp', '<div class="text-small text-danger"> </div>') ?>
					</div>

					<input type="hidden" value="<?= $p->id ?>" name="id">

					<button type="submit" class="btn btn-success">Simpan</button>
					<a href="<?php echo base_url('admin/Data_PKP') ?>" class="btn btn-warning">Kembali</a>

				</form>
			<?php endforeach; ?>
		</div>
	</div>

</div>
<!-- /.container-fluid -->