<!-- Memanggil Header dan Footer -->
<?= $this->extend('layout/_template'); ?>

<!-- Memanggil Section Content -->
<?= $this->section('content'); ?>

<!-- DataTales Example -->
<div class="card shadow mb-auto col-sm-12">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Laborat</h6>
    </div>
    <div class="card-body">
        <div class="card-title">
            <a href="createlaborat" class=" text-decoration-none fas fa-plus-circle btn-sm btn-primary"> Tambah Data</a>
        </div>
        <?php if (session()->getFlashdata('pesan')) : ?>

            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>

        <?php endif; ?>

        <p class="card-text">
        <div class="table-responsive">
            <table id="dt" class="display nowrap table-bordered table-striped" style="width:100%">
                <thead class="table">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Nama pasien</th>
                        <th scope="col">No Rekamedis</th>
                        <th scope="col">Tipe Periksa</th>
                        <th scope="col">Hasil</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Menampilkan Database -->
                    <?php $i = 1; ?>
                    <?php foreach ($laborat as $l) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $l['NAMA_PASIEN']; ?></td>
                            <td><?= $l['NO_RM']; ?></td>
                            <td><?= $l['TIPE_PERIKSA_LAB']; ?></td>
                            <td><?= $l['HASIL_LAB']; ?></td>
                            <!-- <td><?= $l['BIAYA_LAB']; ?></td> -->
                            <td>
                                <!-- <a href="/laborat/pdf/<?= $l['ID_LABORAT']; ?>" class="btn btn-success">Cetak</a> -->
                                <a href="/laborat/editlaborat/<?= $l['ID_LABORAT']; ?>" class=" text-decoration-none fas fa-edit btn-sm btn-warning"></a>
                                <!-- Form Hapus -->
                                <form action="/laborat/deletelaborat/<?= $l['ID_LABORAT']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <button type="submit" class="btn-sm fas fa-trash btn-danger" onclick="return confirm('Apakah Anda Yakin?');"></button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        </p>
    </div>
</div>




<!-- Akhir Section Content -->
<?= $this->endSection(); ?>