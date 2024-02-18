<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
  </div>
  <a class="btn btn-sm btn-success mb-3" href="javascript:void(0)" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-plus"></i> Tambah PKP</a>
  <?php echo $this->session->flashdata('pesan') ?>
</div>

<div class="container-fluid">
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead class="thead-dark">
            <tr>
              <th class="text-center">No</th>
              <th class="text-center">Kode PKP</th>
              <th class="text-center">Keterangan</th>
              <th class="text-center">Nominal PKP Bawah</th>
              <th class="text-center">Nominal PKP Atas (Rp.)</th>
              <th class="text-center">Potongan Dengan NPWP (%)</th>
              <th class="text-center">Potongan Tanpa NPWP (%)</th>
              <th class="text-center">Actions</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($pkp as $p) : ?>
              <tr>
                <td class="text-center"><?php echo $no++ ?></td>
                <td class="text-center"><?php echo $p->kode ?></td>
                <td class="text-center"><?php echo $p->keterangan ?></td>
                <td class="text-center"><?php echo $p->nominal ?></td>
                <td class="text-center"><?php echo $p->nominal_akhir ?></td>
                <td class="text-center"><?php echo $p->pot_npwp ?></td>
                <td class="text-center"><?php echo $p->pot_no_npwp ?></td>
                <td>
                  <center>
                    <a class="btn btn-sm btn-info" href="<?php echo base_url('admin/Data_PKP/update_data/' . $p->id) ?>"><i class="fas fa-edit"></i></a>
                    <a onclick="return confirm('Yakin Hapus?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/Data_PKP/delete/' . $p->id) ?>"><i class="fas fa-trash"></i></a>
                  </center>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="<?php echo base_url('admin/Data_PKP/create') ?>">
        <div class="modal-body">

          <div class="form-group">
            <label>Kode</label>
            <input type="text" name="kode" class="form-control">
            <?php echo form_error('kode', '<div class="text-small text-danger"> </div>') ?>
          </div>

          <div class="form-group">
            <label>Keterangan</label>
            <input type="text" name="keterangan" class="form-control">
            <?php echo form_error('keterangan', '<div class="text-small text-danger"> </div>') ?>
          </div>

          <div class="form-group">
            <label>Batas Bawah PKP Setahun (Rp.)</label>
            <input type="text" name="nominal" class="form-control">
            <?php echo form_error('nominal', '<div class="text-small text-danger"> </div>') ?>
          </div>

          <div class="form-group">
            <label>Batas Atas PKP Setahun (Rp.)</label>
            <input type="text" name="nominal_akhir" class="form-control">
            <?php echo form_error('nominal', '<div class="text-small text-danger"> </div>') ?>
          </div>

          <div class="form-group">
            <label>Potongan Memiliki NPWP (%)</label>
            <input type="text" name="pot_npwp" class="form-control">
            <?php echo form_error('pot_npwp', '<div class="text-small text-danger"> </div>') ?>
          </div>

          <div class="form-group">
            <label>Potongan Tidak Memiliki NPWP (%)</label>
            <input type="text" name="pot_no_npwp" class="form-control">
            <?php echo form_error('pot_no_npwp', '<div class="text-small text-danger"> </div>') ?>
          </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success">Simpan</button>
          <button type="reset" class="btn btn-danger">Reset</button>
        </div>

      </form>
    </div>
  </div>
</div>