<!-- Memanggil Header dan Footer -->
<?= $this->extend('layout/_template'); ?>

<!-- Memanggil Section Content -->
<?= $this->section('content'); ?>
<div class="card shadow mb-4 col-sm-12">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="/admin/indexradiologi" class=" mb-auto text-decoration-none fas fa-arrow-circle-left btn-light btn-primary btn-sm mt-xl-3"> back</a>
    </div>
    <div class="card-body">
        <p class="card-text">
        <h2 class="my-3">Form Tambah Data Radiologi</h2>
        <form action="saveradiologi" method="POST">
            <?= csrf_field(); ?>
            <div class="row mb-3">
                <label for="NO_RM" class="col-sm-2 col-form-label">No Rekamedis</label>
                <div class="col-sm-10">
                    <select class="form-control <?= ($validation->hasError('NO_RM')) ? 'is-invalid' : ''; ?>" id="NO_RM" name="NO_RM" autofocus value="<?= old('NO_RM'); ?>">
                        <?php foreach ($pasien as $pasiens) {
                        ?>
                            <option value="<?php echo $pasiens['ID_PASIEN']; ?>"><?php echo $pasiens['NO_RM']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="TIPE_PERIKSA_RAD" class="col-sm-2 col-form-label">Tipe Periksa Radiologi</label>
                <div class="col-sm-10">
                    <select class="form-control <?= ($validation->hasError('TIPE_PERIKSA_RAD')) ? 'is-invalid' : ''; ?>" id="TIPE_PERIKSA_RAD" name="TIPE_PERIKSA_RAD" autofocus value="<?= old('TIPE_PERIKSA_RAD'); ?>">
                        <?php foreach ($masterrad as $masterrads) {
                        ?>
                            <!-- Perintah Membuat Dropdown Menggunakan Option Value -->
                            <option value="<?php echo $masterrads['ID_MASTERRAD']; ?>"><?php echo $masterrads['TIPE_PERIKSA_RAD']; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="HASIL_RAD" class="col-sm-2 col-form-label">Hasil</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('HASIL_RAD')) ? 'is-invalid' : ''; ?>" id="HASIL_RAD" name="HASIL_RAD" value="<?= old('HASIL_RAD'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('HASIL_RAD'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="KESIMPULAN_RAD" class="col-sm-2 col-form-label">Kesimpulan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('KESIMPULAN_RAD')) ? 'is-invalid' : ''; ?>" id="KESIMPULAN_RAD" name="KESIMPULAN_RAD" value="<?= old('KESIMPULAN_RAD'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('KESIMPULAN_RAD'); ?>
                    </div>
                </div>
            </div>
            <button type="submit" class="fas fa-save btn btn-success col-sm-12"> simpan</button>
        </form>
        </p>
    </div>
</div>
<?= $this->endSection(); ?>