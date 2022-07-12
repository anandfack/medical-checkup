<!-- Memanggil Header dan Footer -->
<?= $this->extend('layout/_template'); ?>

<!-- Memanggil Section Content -->
<?= $this->section('content'); ?>

<div class="card shadow mb-4 col-sm-12">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabel Laborat</h6>
    </div>
    <div class="card-body">
        <p class="card-text">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <h2 class="my-3">Detail Kesimpulan <?= $Kesimpulan['NAMA_PASIEN']; ?></h2>
                    <tr>
                        <th>Nama Pasien</th>
                        <td><?= $Kesimpulan['NAMA_PASIEN']; ?></td>
                    </tr>
                    <tr>
                        <th>Nomor Rekamedis</th>
                        <td><?= $Kesimpulan['NO_RM']; ?></td>
                    </tr>
                    <tr>
                        <th><b>Kesimpulan</b></th>
                    </tr>
                    <tr>
                        <th>Pemeriksaan Fisik</th>
                        <td><?= $Kesimpulan['PEMERIKSAAN_FISIK']; ?></td>
                    </tr>
                    <tr>
                        <th>Foto Thorax</th>
                        <td><?= $Kesimpulan['FOTO_THORAX']; ?></td>
                    </tr>
                    <tr>
                        <th>Laboratorium</th>
                        <td><?= $Kesimpulan['LABORATORIUM']; ?></td>
                    </tr>
                    <tr>
                        <th><b>Saran</b></th>
                        <td><?= $Kesimpulan['SARAN']; ?></td>
                    </tr>
                    <tr>
                        <th><b>Konsultasi Gizi</b></th>
                    </tr>
                    <tr>
                        <th>IMT</th>
                        <td><?= $Kesimpulan['IMT']; ?></td>
                    </tr>
                    <tr>
                        <th>Tatalaksana</th>
                        <td><?= $Kesimpulan['TATALAKSANA']; ?></td>
                    </tr>
                </tbody>
            </table>
            <a href="/kesimpulan" class="btn btn-primary mt-3">Kembali</a>
        </div>
        </p>
        <a href="#" class=" mb-auto text-decoration-none fas fa-print btn-info btn-sm col-sm-12 text-center"> cetak</a>
    </div>
</div>

<?= $this->endSection(); ?>