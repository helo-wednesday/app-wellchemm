<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
  </div>

  <div class="card" style="width: 60%">
  	<div class="card-body">
  		
      <?php foreach ($supplier as $s): ?>
  		<form method="POST" action="<?= base_url('admin/dataSupplier/updateDataAksi') ?>">

  			<div  class="form-group">
  				<label>Npwp</label>
          <input type="hidden" name="id_supplier" class="form-control" value="<?= $s->id_supplier ?>">
  				<input type="text" name="npwp" class="form-control" value="<?= $s->npwp ?>">
  				<?= form_error('npwp', '<small class="text-danger pl-3">', '</small>') ?>
  			</div>

        <div  class="form-group">
          <label>Nama Supplier</label>
          <input type="text" name="nama_supplier" class="form-control" value="<?= $s->nama_supplier ?>">
          <?= form_error('nama_supplier', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

        <div  class="form-group">
          <label>No Telpon</label>
          <input type="text" name="no_telpon" class="form-control" value="<?= $s->no_telpon ?>">
          <?= form_error('no_telpon', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

        <div  class="form-group">
          <label>Alamat</label>
          <input type="text" name="alamat_supplier" class="form-control" value="<?= $s->alamat_supplier ?>">
          <?= form_error('alamat_supplier', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

  			<button type="submit" class="btn btn-success">Update</button>
  			
  		</form>
    <?php endforeach ?>
  	</div>
  </div>

</div>
</div>



