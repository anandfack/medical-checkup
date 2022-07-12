<!-- Memanggil Header dan Footer -->
<?= $this->extend('layout/_template'); ?>

<!-- Memanggil Section Content -->
<?= $this->section('content'); ?>
<div class="card shadow mb-4 col-sm-12">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="/laborat/indexmasterlab" class=" mb-auto text-decoration-none fas fa-arrow-circle-left btn-light btn-primary btn-sm mt-xl-3"> back</a>
    </div>
    <div class="card-body">
        <p class="card-text">
        <h2 class="my-3">Form Ubah Data Master Laboratorium</h2>
        <form action="/laborat/updatemasterlab/<?= $masterlab['ID_MASTERLAB']; ?>" method="POST">
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
            <button type="submit" class="fas fa-save btn btn-success col-sm-12"> simpan</button>
        </form>
        </p>
    </div>
</div>
<?= $this->endSection(); ?>