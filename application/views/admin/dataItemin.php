<div class="container-fluid">

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?= $title ?></h1>
  </div>

  <?= $this->session->flashdata('pesan') ?>

  <a class="mb-2 mt-2 btn btn-sm btn-success" href="<?= base_url('admin/dataItemin/tambahData') ?>"><i class="fas fa-plus"></i> Tambah Item IN </a>

    <table class="table table-bordered table-striped mt-2">
    <tr>
      <th class="text-center">No</th>
      <th class="text-center">No BPB</th>
      <th class="text-center">No Surat Jalan</th>
      <th class="text-center">Item</th>
      <th class="text-center">Harga Item IN</th>
      <th class="text-center">Kategori</th>
      <th class="text-center">Jumlah Item IN</th>>
      <th class="text-center">Date </th>
      <th class="text-center">Total Harga</th>
      <th class="text-center">Action</th>
    </tr>

    <?php $no=1; foreach ($itemin as $iin) : ?>
      <tr>
        <td class="text-center"><?= $no++ ?></td>
        <td><?= $iin->no_bpb ?></td>
        <td><?= $iin->no_sj ?></td>
        <td><?= $iin->item ?></td>
        <td>Rp. <?= number_format($iin->harga_in,0,',','.') ?></td>
        <td><?= $iin->kategori ?></td>
        <td><?= $iin->jumlah_in ?></td>
        <td><?= $iin->date_in ?></td>
        <td>Rp. <?= number_format($iin->harga_in * $iin->jumlah_in,0,',','.') ?></td>
        <td>
          <center>
            <a class="btn btn-sm btn-primary" href="<?= base_url('admin/dataItemin/updateData/'.$iin->id_itemin) ?>"><i class="fas fa-edit"></i></a>
            <a onclick="return confirm('Yakin Anda ingin menghapus data ini')" class="btn btn-sm btn-danger" href="<?= base_url('admin/dataItemin/deleteData/'.$iin->id_itemin) ?>"><i class="fas fa-trash"></i></a>
          </center>
        </td>
      </tr>
    <?php endforeach; ?>
    </table>

</div>
</div>




