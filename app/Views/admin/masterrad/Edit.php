<!-- Memanggil Header dan Footer -->
<?= $this->extend('layout/_template'); ?>

<!-- Memanggil Section Content -->
<?= $this->section('content'); ?>
<div class="card shadow mb-4 col-sm-12">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="/admin/indexmasterrad" class=" mb-auto text-decoration-none fas fa-arrow-circle-left btn-light btn-primary btn-sm mt-xl-3"> back</a>
    </div>
    <div class="card-body">
        <p class="card-text">
        <h2 class="my-3">Form Ubah Data Master Radiologi</h2>
        <form action="/admin/updatemasterrad/<?= $masterrad['ID_MASTERRAD']; ?>" method="POST">
            <?= csrf_field(); ?>
            <!-- Kalau Nambah Mulai Dari Sini -->
            <div class="row mb-3">
                <label for="TIPE_PERIKSA_RAD" class="col-sm-2 col-form-label">Tipe Periksa Radiologi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('TIPE_PERIKSA_RAD')) ? 'is-invalid' : ''; ?>" id="TIPE_PERIKSA_RAD" name="TIPE_PERIKSA_RAD" autofocus value="<?= (old('TIPE_PERIKSA_RAD')) ? old('TIPE_PERIKSA_RAD') : $masterrad['TIPE_PERIKSA_RAD']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('TIPE_PERIKSA_RAD'); ?>
                    </div>
                </div>
            </div>
            <!-- Edit Id -->
            <div class="row mb-3">
                <!-- <label for="ID_PASIEN" class="col-sm-2 col-form-label">Id Penyakit</label> -->
                <div class="col-sm-10">
                    <input type="hidden" class="form-control <?= ($validation->hasError('ID_MASTERRAD')) ? 'is-invalid' : ''; ?>" id="ID_MASTERRAD" name="ID_MASTERRAD" value="<?= $masterrad['ID_MASTERRAD']; ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('ID_MASTERRAD'); ?>
                    </div>
                </div>
            </div>
            <button type="submit" class="fas fa-save btn btn-success col-sm-12"> simpan</button>
        </form>
        </p>
    </div>
</div>
<?= $this->endSection(); ?>