<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
  </div>

  <div class="card" style="width: 50%; margin-bottom: 50px">
  	<div class="card-body">

      <?php  foreach($itemout as $iout) : ?>
  		<form method="POST" action="<?= base_url('admin/dataItemout/updateDataAksi') ?>">
  			
  			<div class="from-group">
  				<label>No Doc</label>
          <input type="hidden" name="id_itemout" class="form-control" value="<?= $iout->id_itemout ?>">
  				<input type="text" name="no_doc" class="form-control" value="<?= $iout->no_doc ?>">
  				<?= form_error('no_doc', '<small class="text-danger pl-3">', '</small>') ?>
  			</div>

        <br>

  			<div class="from-group">
          <label>Customer</label>
          <select name="customer" class="form-control">
            <option value="<?= $iout->customer ?>"><?= $iout->customer ?></option>
            <?php foreach($customer as $c) : ?>
            <option value="<?= $c->nama_customer ?>"><?= $c->nama_customer ?></option>
            <?php endforeach; ?>
          </select>
          <?= form_error('customer', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

        <br>

        <div class="from-group">
          <label>Item</label>
          <select name="item" class="form-control">
            <option value="<?= $iout->item ?>"><?= $iout->item ?></option>
            <?php foreach($item as $i) : ?>
            <option value="<?= $i->nama_item ?>"><?= $i->nama_item ?></option>
            <?php endforeach; ?>
          </select>
          <?= form_error('item', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

        <br>

        <div class="from-group">
          <label>Harga Jual Item</label>
          <input type="number" name="harga_jual" class="form-control" value="<?= $iout->harga_jual ?>">
          <?= form_error('harga_jual', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

        <br>

        <div class="from-group">
          <label>Kategori</label>
          <select name="kategori" class="form-control">
            <option value="<?= $iout->kategori ?>"><?= $iout->kategori ?></option>
            <?php foreach($kategori as $k) : ?>
            <option value="<?= $k->nama_kategori ?>"><?= $k->nama_kategori ?></option>
            <?php endforeach; ?>
          </select>
          <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

        <br>

        <div class="from-group">
          <label>Jumlah Item OUT</label>
          <input type="number" name="jumlah_out" class="form-control" value="<?= $iout->jumlah_out ?>">
          <?= form_error('jumlah_out', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

        <br>

        <div class="from-group">
          <label>Date OUT</label>
          <input type="date" name="date_out" class="form-control" value="<?= $iout->date_out ?>">
          <?= form_error('date_out', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

  			<br>

  			<button type="submit" class="btn btn-primary">Update</button>

  		</form>
  		<?php endforeach; ?>
  	</div>
  </div>
</div>
</div>



