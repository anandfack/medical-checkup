<!-- Memanggil Header dan Footer -->
<?= $this->extend('layout/_template'); ?>

<!-- Memanggil Section Content -->
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="my-3">Form Tambah Data Kesimpulan</h2>
            <form action="savekesimpulan" method="POST">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="NO_RM" class="col-sm-2 col-form-label">No Rekamedis</label>
                    <div class="col-sm-10">
                        <select class="form-control <?= ($validation->hasError('NO_RM')) ? 'is-invalid' : ''; ?>" id="NO_RM" name="NO_RM" autofocus value="<?= old('NO_RM'); ?>">
                            <?php foreach ($pasien as $pasiens) {
                            ?>
                                <!-- Perintah Membuat Dropdown Menggunakan Option Value -->
                                <option value="<?php echo $pasiens['ID_PASIEN']; ?>"><?php echo $pasiens['NO_RM']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="PEMERIKSAAN_FISIK" class="col-sm-2 col-form-label">Pemeriksaan Fisik</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('PEMERIKSAAN_FISIK')) ? 'is-invalid' : ''; ?>" id="PEMERIKSAAN_FISIK" name="PEMERIKSAAN_FISIK" value="<?= old('PEMERIKSAAN_FISIK'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('PEMERIKSAAN_FISIK'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="FOTO_THORAX" class="col-sm-2 col-form-label">Foto Thorax</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('FOTO_THORAX')) ? 'is-invalid' : ''; ?>" id="FOTO_THORAX" name="FOTO_THORAX" value="<?= old('FOTO_THORAX'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('FOTO_THORAX'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="LABORATORIUM" class="col-sm-2 col-form-label">Laboratorium</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('LABORATORIUM')) ? 'is-invalid' : ''; ?>" id="LABORATORIUM" name="LABORATORIUM" autofocus value="<?= old('LABORATORIUM'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('LABORATORIUM'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="SARAN" class="col-sm-2 col-form-label">Saran</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('SARAN')) ? 'is-invalid' : ''; ?>" id="SARAN" name="SARAN" autofocus value="<?= old('SARAN'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('SARAN'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="IMT" class="col-sm-2 col-form-label">IMT</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('IMT')) ? 'is-invalid' : ''; ?>" id="IMT" name="IMT" autofocus value="<?= old('IMT'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('IMT'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="TATALAKSANA" class="col-sm-2 col-form-label">Tatalaksana</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('TATALAKSANA')) ? 'is-invalid' : ''; ?>" id="TATALAKSANA" name="TATALAKSANA" autofocus value="<?= old('TATALAKSANA'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('TATALAKSANA'); ?>
                        </div>
                    </div>
                </div>
                <a href="/pasien/indexkesimpulan" class="btn btn-primary mt-5">Kembali</a>
                <button type="submit" class="btn btn-success mt-5">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>