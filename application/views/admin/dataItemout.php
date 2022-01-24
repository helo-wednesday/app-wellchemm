<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
  </div>

  <?= $this->session->flashdata('pesan') ?>

  <a class="mb-2 mt-2 btn btn-sm btn-success" href="<?= base_url('admin/dataItemout/tambahData') ?>"><i class="fas fa-plus"></i> Tambah Item OUT</a>

    <table class="table table-bordered table-striped mt-2">
    <tr>
      <th class="text-center">No</th>
      <th class="text-center">No Doc</th>
      <th class="text-center">Customer</th>
      <th class="text-center">Item</th>
      <th class="text-center">Harga Jual Item</th>
      <th class="text-center">Kategori</th>
      <th class="text-center">Jumlah Item OUT</th>>
      <th class="text-center">Date </th>
      <th class="text-center">Total Harga</th>
      <th class="text-center">Action</th>
    </tr>

    <?php $no=1; foreach ($itemout as $iout) : ?>
      <tr>
        <td class="text-center"><?= $no++ ?></td>
        <td><?= $iout->no_doc ?></td>
        <td><?= $iout->customer ?></td>
        <td><?= $iout->item ?></td>
        <td>Rp. <?= number_format($iout->harga_jual,0,',','.') ?></td>
        <td><?= $iout->kategori ?></td>
        <td><?= $iout->jumlah_out ?></td>
        <td><?= $iout->date_out ?></td>
        <td>Rp. <?= number_format($iout->harga_jual * $iout->jumlah_out,0,',','.') ?></td>
        <td>
          <center>
            <a class="btn btn-sm btn-primary" href="<?= base_url('admin/dataItemout/updateData/'.$iout->id_itemout) ?>"><i class="fas fa-edit"></i></a>
            <a onclick="return confirm('Yakin Anda ingin menghapus data ini')" class="btn btn-sm btn-danger" href="<?= base_url('admin/dataItemout/deleteData/'.$iout->id_itemout) ?>"><i class="fas fa-trash"></i></a>
          </center>
        </td>
      </tr>
    <?php endforeach; ?>
    </table>

</div>
</div>




