<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
  </div>

  <div class="card" style="width: 60%">
  	<div class="card-body">
  		
  		<form method="POST" action="<?= base_url('admin/dataCustomer/tambahDataAksi') ?>">

  			<div  class="form-group">
  				<label>Npwp</label>
  				<input type="text" name="npwp_c" class="form-control">
  				<?= form_error('npwp_c', '<small class="text-danger pl-3">', '</small>') ?>
  			</div>

        <div  class="form-group">
          <label>Nama Customer</label>
          <input type="text" name="nama_customer" class="form-control">
          <?= form_error('nama_customer', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

        <div  class="form-group">
          <label>No Telpon</label>
          <input type="number" name="no_telpon_c" class="form-control">
          <?= form_error('no_telpon_c', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

        <div  class="form-group">
          <label>Alamat</label>
          <input type="text" name="alamat_customer" class="form-control">
          <?= form_error('alamat_customer', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

  			<button type="submit" class="btn btn-success">Submit</button>
  			
  		</form>
  	</div>
  </div>

</div>
</div>



