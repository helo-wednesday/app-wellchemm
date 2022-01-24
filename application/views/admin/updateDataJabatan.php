<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
  </div>

  <div class="card" style="width: 60%">
  	<div class="card-body">
  		
      <?php foreach ($jabatan as $j): ?>
  		<form method="POST" action="<?= base_url('admin/dataJabatan/updateDataAksi') ?>">

  			<div  class="form-group">
  				<label>Nama Jabatan</label>
          <input type="hidden" name="id_jabatan" class="form-control" value="<?= $j->id_jabatan ?>">
  				<input type="text" name="nama_jabatan" class="form-control" value="<?= $j->nama_jabatan ?>">
  				<?= form_error('nama_jabatan', '<small class="text-danger pl-3">', '</small>') ?>
  			</div>

  			<button type="submit" class="btn btn-success">Update</button>
  			
  		</form>
    <?php endforeach ?>
  	</div>
  </div>

</div>
</div>



