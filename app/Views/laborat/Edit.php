<!-- Memanggil Header dan Footer -->
<?= $this->extend('layout/_template'); ?>

<!-- Memanggil Section Content -->
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="my-3">Form Ubah Data Laboratorium</h2>
            <form action="/laborat/update/<?= $laborat['ID_LABORAT']; ?>" method="POST">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="NO_RM" class="col-sm-2 col-form-label">No Rekamedis</label>
                    <div class="col-sm-10">
                        <select class="form-control <?= ($validation->hasError('NO_RM')) ? 'is-invalid' : ''; ?>" id="NO_RM" name="NO_RM" autofocus value="<?= old('NO_RM'); ?>">
                            <?php foreach ($pasien as $pasiens) {
                                // If Else Selected Items 

                                if ($laborat['ID_PASIEN'] == $pasiens['ID_PASIEN']) {
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
                    <label for="TIPE_PERIKSA_LAB" class="col-sm-2 col-form-label">Tipe Periksa Laboratorium</label>
                    <div class="col-sm-10">
                        <select class="form-control <?= ($validation->hasError('TIPE_PERIKSA_LAB')) ? 'is-invalid' : ''; ?>" id="TIPE_PERIKSA_LAB" name="TIPE_PERIKSA_LAB" autofocus value="<?= old('TIPE_PERIKSA_LAB'); ?>">
                            <?php foreach ($masterlab as $masterlabs) {
                                // If Else Selected Items 

                                if ($laborat['ID_MASTERLAB'] == $masterlabs['ID_MASTERLAB']) {
                            ?>
                                    <option value="<?php echo $masterlabs['ID_MASTERLAB']; ?>" selected><?php echo $masterlabs['TIPE_PERIKSA_LAB']; ?></option>
                                <?php  } else {
                                ?>
                                    <option value="<?php echo $masterlabs['ID_MASTERLAB']; ?>"><?php echo $masterlabs['TIPE_PERIKSA_LAB']; ?></option>
                                <?php   }
                                ?>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="HASIL_LAB" class="col-sm-2 col-form-label">Hasil Lab</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('HASIL_LAB')) ? 'is-invalid' : ''; ?>" id="HASIL_LAB" name="HASIL_LAB" value="<?= (old('HASIL_LAB')) ? old('HASIL_LAB') : $laborat['HASIL_LAB']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('HASIL_LAB'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="BIAYA_LAB" class="col-sm-2 col-form-label">Biaya</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('BIAYA_LAB')) ? 'is-invalid' : ''; ?>" id="BIAYA_LAB" name="BIAYA_LAB" value="<?= (old('BIAYA_LAB')) ? old('BIAYA_LAB') : $laborat['BIAYA_LAB']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('BIAYA_LAB'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <!-- <label for="ID_PASIEN" class="col-sm-2 col-form-label">Id Penyakit</label> -->
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control <?= ($validation->hasError('ID_LABORAT')) ? 'is-invalid' : ''; ?>" id="ID_LABORAT" name="ID_LABORAT" value="<?= $laborat['ID_LABORAT']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('ID_LABORAT'); ?>
                        </div>
                    </div>
                </div>
                <a href="/laborat" class="btn btn-primary mt-5">Kembali</a>
                <button type="submit" class="btn btn-success mt-5">Ubah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>