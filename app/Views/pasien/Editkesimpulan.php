<!-- Memanggil Header dan Footer -->
<?= $this->extend('layout/_template'); ?>

<!-- Memanggil Section Content -->
<?= $this->section('content'); ?>
<div class="card shadow mb-4 col-sm-12">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="/pasien/indexkesimpulan" class=" mb-auto text-decoration-none fas fa-arrow-circle-left btn-light btn-primary btn-sm mt-xl-3"> back</a>
    </div>
    <div class="card-body">
        <p class="card-text">
        <h2 class="my-3">Form Ubah Data Kesimpulan</h2>
        <form action="/pasien/updatekesimpulan/<?= $Kesimpulan['ID_KESIMPULAN']; ?>" method="POST">
            <?= csrf_field(); ?>
            <div class="row mb-3">
                <label for="NO_RM" class="col-sm-2 col-form-label">No Rekamedis</label>
                <div class="col-sm-10">
                    <select class="form-control <?= ($validation->hasError('NO_RM')) ? 'is-invalid' : ''; ?>" id="NO_RM" name="NO_RM" autofocus value="<?= old('NO_RM'); ?>">
                        <?php foreach ($pasien as $pasiens) {
                            // If Else Selected Items 

                            if ($Kesimpulan['ID_PASIEN'] == $pasiens['ID_PASIEN']) {
                        ?>
                                <option value="<?php echo $pasiens['ID_PASIEN']; ?>" selected><?php echo $pasiens['NO_RM']; ?></option>
                            <?php  } else {
                            ?>
                                <option value="<?php echo $pasiens['ID_PASIEN']; ?>"><?php echo $pasiens['NO_RM']; ?></option>
                            <?php   }
                            ?>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="PEMERIKSAAN_FISIK" class="col-sm-2 col-form-label">Pemeriksaan Fisik</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('PEMERIKSAAN_FISIK')) ? 'is-invalid' : ''; ?>" id="PEMERIKSAAN_FISIK" name="PEMERIKSAAN_FISIK" value="<?= (old('PEMERIKSAAN_FISIK')) ? old('PEMERIKSAAN_FISIK') : $Kesimpulan['PEMERIKSAAN_FISIK']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('PEMERIKSAAN_FISIK'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="FOTO_THORAX" class="col-sm-2 col-form-label">Foto Thorax</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('FOTO_THORAX')) ? 'is-invalid' : ''; ?>" id="FOTO_THORAX" name="FOTO_THORAX" value="<?= (old('FOTO_THORAX')) ? old('FOTO_THORAX') : $Kesimpulan['FOTO_THORAX']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('FOTO_THORAX'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="LABORATORIUM" class="col-sm-2 col-form-label">Laboratorium</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('LABORATORIUM')) ? 'is-invalid' : ''; ?>" id="LABORATORIUM" name="LABORATORIUM" value="<?= (old('LABORATORIUM')) ? old('LABORATORIUM') : $Kesimpulan['LABORATORIUM']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('LABORATORIUM'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="SARAN" class="col-sm-2 col-form-label">Saran</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('SARAN')) ? 'is-invalid' : ''; ?>" id="SARAN" name="SARAN" value="<?= (old('SARAN')) ? old('SARAN') : $Kesimpulan['SARAN']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('SARAN'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="IMT" class="col-sm-2 col-form-label">IMT</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('IMT')) ? 'is-invalid' : ''; ?>" id="IMT" name="IMT" value="<?= (old('IMT')) ? old('IMT') : $Kesimpulan['IMT']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('IMT'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="TATALAKSANA" class="col-sm-2 col-form-label">Tatalaksana</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('TATALAKSANA')) ? 'is-invalid' : ''; ?>" id="TATALAKSANA" name="TATALAKSANA" value="<?= (old('TATALAKSANA')) ? old('TATALAKSANA') : $Kesimpulan['TATALAKSANA']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('TATALAKSANA'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <!-- <label for="ID_PASIEN" class="col-sm-2 col-form-label">Id Penyakit</label> -->
                <div class="col-sm-10">
                    <input type="hidden" class="form-control <?= ($validation->hasError('ID_KESIMPULAN')) ? 'is-invalid' : ''; ?>" id="ID_KESIMPULAN" name="ID_KESIMPULAN" value="<?= $Kesimpulan['ID_KESIMPULAN']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('ID_KESIMPULAN'); ?>
                    </div>
                </div>
            </div>
            <button type="submit" class="fas fa-save btn btn-success col-sm-12"> simpan</button>
        </form>
        </p>
    </div>
</div>
<?= $this->endSection(); ?>