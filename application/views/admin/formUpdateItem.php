<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
  </div>

  <div class="card" style="width: 60%; margin-bottom: 50px">
  	<div class="card-body">

  		<?php  foreach($item as $i) : ?>
      <form method="POST" action="<?= base_url('admin/dataItem/updateDataAksi') ?>">
  			
  			<div class="from-group">
  				<label>Nama Item</label>
          <input type="hidden" name="id_item" class="form-control" value="<?= $i->id_item ?>">
  				<input type="text" name="nama_item" class="form-control"  value="<?= $i->nama_item ?>">
  				<?= form_error('nama_item', '<small class="text-danger pl-3">', '</small>') ?>
  			</div>

  			<div class="from-group">
  				<label>Harga Item</label>
  				<input type="number" name="harga_item" class="form-control" value="<?= $i->harga_item ?>">
  				<?= form_error('harga_item', '<small class="text-danger pl-3">', '</small>') ?>
  			</div>

  			<div class="from-group">
  				<label>Kategori</label>
  				<select name="kategori" class="form-control">
  					<option value="<?= $i->kategori ?>"><?= $i->kategori ?></option>
  					<?php foreach($kategori as $k) : ?>
  					<option value="<?= $k->nama_kategori ?>"><?= $k->nama_kategori ?></option>
  					<?php endforeach; ?>
  				</select>
  				<?= form_error('kategori', '<small class="text-danger pl-3">', '</small>') ?>
  			</div>

  			<br>

  			<button type="submit" class="btn btn-primary">Simpan</button>

  		</form>
      <?php endforeach; ?>
  		
  	</div>
  </div>
</div>



