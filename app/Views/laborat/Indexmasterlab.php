<!-- Memanggil Header dan Footer -->
<?= $this->extend('layout/_template'); ?>

<!-- Memanggil Section Content -->
<?= $this->section('content'); ?>

<!-- DataTales Example -->
<div class="card shadow mb-auto col-sm-12">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Master Laboratorium</h6>
    </div>
    <div class="card-body">
        <div class="card-title">
            <a href="createmasterlab" class=" text-decoration-none fas fa-plus-circle btn-sm btn-primary"> Tambah Data</a>
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
                        <th scope="col">Tipe Periksa Laboratorium</th>
                        <th scope="col">Aksi</th>
                        <!-- <th scope="col">Aksi</th> -->
                    </tr>
                </thead>
                <tbody>
                    <!-- Menampilkan Database -->
                    <?php $i = 1; ?>
                    <?php foreach ($masterlab as $ml) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $ml['TIPE_PERIKSA_LAB']; ?></td>
                            <!-- Form Edit -->
                            <td>
                                <a href="/laborat/editmasterlab/<?= $ml['ID_MASTERLAB']; ?>" class=" text-decoration-none fas fa-edit btn-sm btn-warning"></a>
                                <form action="/laborat/deletemasterlab/<?= $ml['ID_MASTERLAB']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <button type="submit" class="btn-sm fas fa-trash btn-danger" onclick="return confirm('Apakah Anda Yakin?');"></i></button>
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