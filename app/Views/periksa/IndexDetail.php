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
        <p class="card-text">
        <div class="table-responsive">
            <table class="table">
                <tbody>
                    <h2 class="my-3">Detail Periksa <?= $Periksa['NAMA_PASIEN']; ?></h2>
                    <tr>
                        <th>Nama Pasien</th>
                        <td><?= $Periksa['NAMA_PASIEN']; ?></td>
                    </tr>
                    <tr>
                        <th>Nomor Rekamedis</th>
                        <td><?= $Periksa['NO_RM']; ?></td>
                    </tr>
                    <tr>
                        <th><b>Riwayat Penyakit</b></th>
                    </tr>
                    <tr>
                        <th>Batuk Darah</th>
                        <td><?= $Periksa['BATUK_DARAH']; ?></td>
                    </tr>
                    <tr>
                        <th>Kencing Batu</th>
                        <td><?= $Periksa['KENCING_BATU']; ?></td>
                    </tr>
                    <tr>
                        <th>Hepatitis</th>
                        <td><?= $Periksa['HEPATITIS']; ?></td>
                    </tr>
                    <tr>
                        <th>Hernia</th>
                        <td><?= $Periksa['HERNIA']; ?></td>
                    </tr>
                    <tr>
                        <th>Hipertensi</th>
                        <td><?= $Periksa['HIPERTENSI']; ?></td>
                    </tr>
                    <tr>
                        <th>Hemorroid</th>
                        <td><?= $Periksa['HEMORROID']; ?></td>
                    </tr>
                    <tr>
                        <th>Diabetes</th>
                        <td><?= $Periksa['DIABETES']; ?></td>
                    </tr>
                    <tr>
                        <th><b>Pemeriksaan Fisik</b></th>
                    </tr>
                    <tr>
                        <th>Tinggi Badan</th>
                        <td><?= $Periksa['TINGGI_BADAN']; ?></td>
                    </tr>
                    <tr>
                        <th>Berat Badan</th>
                        <td><?= $Periksa['BERAT_BADAN']; ?></td>
                    </tr>
                    <tr>
                        <th>Nadi</th>
                        <td><?= $Periksa['NADI']; ?></td>
                    </tr>
                    <tr>
                        <th>Tekanan Darah</th>
                        <td><?= $Periksa['TEKANAN_DARAH']; ?></td>
                    </tr>
                    <tr>
                        <th>Visus</th>
                        <td><?= $Periksa['VISUS']; ?></td>
                    </tr>
                    <tr>
                        <th>Buta Warna</th>
                        <td><?= $Periksa['BUTA_WARNA']; ?></td>
                    </tr>
                    <tr>
                        <th>Juling</th>
                        <td><?= $Periksa['JULING']; ?></td>
                    </tr>
                    <tr>
                        <th>Kelainan Mata Lain</th>
                        <td><?= $Periksa['KELAINAN_MATA_LAIN']; ?></td>
                    </tr>
                    <tr>
                        <th>Telinga Luar</th>
                        <td><?= $Periksa['TELINGA_LUAR']; ?></td>
                    </tr>
                    <tr>
                        <th>Telinga Tengah</th>
                        <td><?= $Periksa['TELINGA_TENGAH']; ?></td>
                    </tr>
                    <tr>
                        <th>Gigi</th>
                        <td><?= $Periksa['GIGI']; ?></td>
                    </tr>
                    <tr>
                        <th>Paru - Paru</th>
                        <td><?= $Periksa['PARU']; ?></td>
                    </tr>
                    <tr>
                        <th>jantung</th>
                        <td><?= $Periksa['JANTUNG']; ?></td>
                    </tr>
                    <tr>
                        <th>Hati</th>
                        <td><?= $Periksa['HATI']; ?></td>
                    </tr>
                    <tr>
                        <th>Limpa</th>
                        <td><?= $Periksa['LIMPA']; ?></td>
                    </tr>
                    <tr>
                        <th>Ekstrimitas</th>
                        <td><?= $Periksa['EKSTRIMITAS']; ?></td>
                    </tr>
                    <tr>
                        <th>Keseimbangan</th>
                        <td><?= $Periksa['KESEIMBANGAN']; ?></td>
                    </tr>
                    <tr>
                        <th>Exim</th>
                        <td><?= $Periksa['EXIM']; ?></td>
                    </tr>
                    <tr>
                        <th>Dermatitis</th>
                        <td><?= $Periksa['DERMATITIS']; ?></td>
                    </tr>
                </tbody>
            </table>
            <a href="/periksa" class="btn btn-primary mt-3">Kembali</a>
        </div>
        </p>
    </div>
</div>





<?= $this->endSection(); ?>