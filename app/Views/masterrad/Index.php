<!-- Memanggil Header dan Footer -->
<?= $this->extend('layout/_template'); ?>

<!-- Memanggil Section Content -->
<?= $this->section('content'); ?>

<!-- DataTales Example -->
<div class="card shadow mb-4 col-sm-12">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Laborat</h6>
    </div>
    <div class="card-body">
        <div class="card-title">
            <a href="masterrad/create" class="btn btn-primary mt-3">Tambah Data</a>
        </div><br>
        <?php if (session()->getFlashdata('pesan')) : ?>

            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('pesan'); ?>
            </div>

        <?php endif; ?>

        <p class="card-text">
        <div class="table-responsive">
            <table class="table table-striped table-hover" id="dt">
                <thead class="table">
                    <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Tipe Periksa Radiologi</th>
                        <th scope="col">Aksi</th>
                        <!-- <th scope="col">Aksi</th> -->
                    </tr>
                </thead>
                <tbody>
                    <!-- Menampilkan Database -->
                    <?php $i = 1; ?>
                    <?php foreach ($masterrad as $mr) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $mr['TIPE_PERIKSA_RAD']; ?></td>
                            <!-- Form Edit -->
                            <td>
                                <a href="/masterrad/edit/<?= $mr['ID_MASTERRAD']; ?>" class="btn btn-warning">Ubah</a>
                                <form action="/masterrad/delete/<?= $mr['ID_MASTERRAD']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda Yakin?');">Hapus</i></button>
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