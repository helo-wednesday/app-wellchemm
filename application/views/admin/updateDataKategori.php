<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
  </div>

  <div class="card" style="width: 60%">
    <div class="card-body">
      
      <?php foreach ($kategori as $k): ?>
      <form method="POST" action="<?= base_url('admin/dataKategori/updateDataAksi') ?>">

        <div  class="form-group">
          <label>Nama Kategori</label>
          <input type="hidden" name="id_kategori" class="form-control" value="<?= $k->id_kategori ?>">
          <input type="text" name="nama_kategori" class="form-control" value="<?= $k->nama_kategori ?>">
          <?= form_error('nama_kategori', '<small class="text-danger pl-3">', '</small>') ?>
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        
      </form>
    <?php endforeach ?>
    </div>
  </div>

</div>
</div>



