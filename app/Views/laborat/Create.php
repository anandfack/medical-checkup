<!-- Memanggil Header dan Footer -->
<?= $this->extend('layout/_template'); ?>

<!-- Memanggil Section Content -->
<?= $this->section('content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="my-3">Form Tambah Data Laboratorium</h2>
            <form action="save" method="POST">
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
                    <label for="TIPE_PERIKSA_LAB" class="col-sm-2 col-form-label">Tipe Periksa Laboratorium</label>
                    <div class="col-sm-10">
                        <select class="form-control <?= ($validation->hasError('TIPE_PERIKSA_LAB')) ? 'is-invalid' : ''; ?>" id="TIPE_PERIKSA_LAB" name="TIPE_PERIKSA_LAB" autofocus value="<?= old('TIPE_PERIKSA_LAB'); ?>">
                            <?php foreach ($masterlab as $masterlabs) {
                            ?>
                                <!-- Perintah Membuat Dropdown Menggunakan Option Value -->
                                <option value="<?php echo $masterlabs['ID_MASTERLAB']; ?>"><?php echo $masterlabs['TIPE_PERIKSA_LAB']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="HASIL_LAB" class="col-sm-2 col-form-label">Hasil Lab</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('HASIL_LAB')) ? 'is-invalid' : ''; ?>" id="HASIL_LAB" name="HASIL_LAB" value="<?= old('HASIL_LAB'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('HASIL_LAB'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="BIAYA_LAB" class="col-sm-2 col-form-label">Biaya</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('BIAYA_LAB')) ? 'is-invalid' : ''; ?>" id="BIAYA_LAB" name="BIAYA_LAB" autofocus value="<?= old('BIAYA_LAB'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('BIAYA_LAB'); ?>
                        </div>
                    </div>
                </div>
                <a href="/laborat" class="btn btn-primary mt-5">Kembali</a>
                <button type="submit" class="btn btn-success mt-5">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>