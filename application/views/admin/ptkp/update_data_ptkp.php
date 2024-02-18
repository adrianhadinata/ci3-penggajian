<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
	</div>

	<div class="card" style="width: 60% ; margin-bottom: 100px">
		<div class="card-body">

			<?php foreach ($ptkp as $p) : ?>
				<form method="POST" action="<?php echo base_url('admin/Data_PTKP/update_data_aksi') ?>" enctype="multipart/form-data">

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
						<label>PTKP Setahun</label>
						<input type="text" name="nominal" class="form-control" value="<?= $p->nominal ?>">
						<?php echo form_error('nominal', '<div class="text-small text-danger"> </div>') ?>
					</div>

					<input type="hidden" value="<?= $p->id ?>" name="id">

					<button type="submit" class="btn btn-success">Simpan</button>
					<a href="<?php echo base_url('admin/Data_PTKP') ?>" class="btn btn-warning">Kembali</a>

				</form>
			<?php endforeach; ?>
		</div>
	</div>

</div>
<!-- /.container-fluid -->