<!-- Memanggil Header dan Footer -->
<?= $this->extend('layout/_template'); ?>

<!-- Memanggil Section Content -->
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="my-3">Form Ubah Data Master Laboratorium</h2>
            <form action="/masterlab/update/<?= $masterlab['ID_MASTERLAB']; ?>" method="POST">
                <?= csrf_field(); ?>
                <!-- Kalau Nambah Mulai Dari Sini -->
                <div class="row mb-3">
                    <label for="TIPE_PERIKSA_LAB" class="col-sm-2 col-form-label">Tipe Periksa Laboratorium</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('TIPE_PERIKSA_LAB')) ? 'is-invalid' : ''; ?>" id="TIPE_PERIKSA_LAB" name="TIPE_PERIKSA_LAB" autofocus value="<?= (old('TIPE_PERIKSA_LAB')) ? old('TIPE_PERIKSA_LAB') : $masterlab['TIPE_PERIKSA_LAB']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('TIPE_PERIKSA_LAB'); ?>
                        </div>
                    </div>
                </div>
                <!-- Edit Id -->
                <div class="row mb-3">
                    <!-- <label for="ID_PASIEN" class="col-sm-2 col-form-label">Id Penyakit</label> -->
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control <?= ($validation->hasError('ID_MASTERLAB')) ? 'is-invalid' : ''; ?>" id="ID_MASTERLAB" name="ID_MASTERLAB" value="<?= $masterlab['ID_MASTERLAB']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('ID_MASTERLAB'); ?>
                        </div>
                    </div>
                </div>
                <a href="/masterlab" class="btn btn-primary mt-5">Kembali</a>
                <button type="submit" class="btn btn-success mt-5">Ubah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>