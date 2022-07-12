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
            <a href="pasien/create" class="btn btn-primary mt-3">Tambah Data</a>
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
                        <th scope="col">Nama</th>
                        <th scope="col">No RM</th>
                        <th scope="col">Perusahaan</th>
                        <th scope="col">NIK</th>
                        <th scope="col">Departemen</th>
                        <th scope="col">Bagian</th>
                        <th scope="col">JK / Usia</th>
                        <th scope="col">Tanggal MCU</th>
                        <th scope="col">Aksi</th>
                        <!-- <th scope="col">Aksi</th>
                        <th scope="col">Aksi</th> -->

                    </tr>
                </thead>
                <tbody>
                    <!-- Menampilkan Database -->
                    <?php $i = 1; ?>
                    <?php foreach ($pasien as $p) : ?>
                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $p['NAMA_PASIEN']; ?></td>
                            <td><?= $p['NO_RM']; ?></td>
                            <td><?= $p['PERUSAHAAN']; ?></td>
                            <td><?= $p['NIK']; ?></td>
                            <td><?= $p['DEPARTEMEN']; ?></td>
                            <td><?= $p['BAGIAN']; ?></td>
                            <td><?= $p['JENIS_KELAMIN']; ?></td>
                            <td><?= $p['TANGGAL_LAHIR']; ?></td>

                            <!-- Form Edit -->
                            <td>
                                <a href="/pasien/pdf/<?= $p['ID_PASIEN']; ?>" class="btn btn-success col-sm-12">Cetak</a>
                                <a href="/pasien/edit/<?= $p['ID_PASIEN']; ?>" class="btn btn-warning col-sm-12">Ubah</a>
                                <form action="/pasien/delete/<?= $p['ID_PASIEN']; ?>" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <button type="submit" class="btn btn-danger col-sm-12" onclick="return confirm('Apakah Anda Yakin?');">Hapus</i></button>
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