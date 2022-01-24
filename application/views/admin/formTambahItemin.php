<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
  </div>

  <div class="card" style="width: 50%; margin-bottom: 50px">
  	<div class="card-body">

  		<form method="POST" action="<?= base_url('admin/dataItemin/tambahDataAksi') ?>">
  			
  			<div class="from-group">
  				<label>No BPB</label>
  				<input type="text" name="no_bpb" class="form-control">
  				<?= form_error('no_bpb', '<small class="text-danger pl-3">', '</small>') ?>
  			</div>

        <br>

  			<div class="from-group">
  				<label>No Surat Jalan</label>
  				<input type="text" name="no_sj" class="form-control">
  				<?= form_error('no_sj', '<small class="text-danger pl-3">', '</small>') ?>
  			</div>

        <br>

        <div class="from-group">
          <label>Item</label>
          <select name="item" class="form-control">
            <option value="">--Pilih Item--</option>
            <?php foreach($item as $i) : ?>
            <option value="<?= $i->nama_item ?>"><?= $i->nama_item ?></option>
            <?php endforeach; ?>
          </select>
          <?= form_error('item', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

        <br>

        <div class="from-group">
          <label>Harga Item IN</label>
          <input type="number" name="harga_in" class="form-control">
          <?= form_error('harga_in', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

        <br>

        <div class="from-group">
          <label>Kategori</label>
          <select name="kategori" class="form-control">
            <option value="">--Pilih Kategori--</option>
            <?php foreach($kategori as $k) : ?>
            <option value="<?= $k->nama_kategori ?>"><?= $k->nama_kategori ?></option>
            <?php endforeach; ?>
          </select>
          <?= form_error('kategori', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

        <br>

        <div class="from-group">
          <label>Jumlah Item IN</label>
          <input type="number" name="jumlah_in" class="form-control">
          <?= form_error('jumlah_in', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

        <br>

        <div class="from-group">
          <label>Date In</label>
          <input type="date" name="date_in" class="form-control">
          <?= form_error('date_in', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

  			<br>

  			<button type="submit" class="btn btn-primary">Simpan</button>

  		</form>
  		
  	</div>
  </div>
</div>
</div>



