<!-- Memanggil Header dan Footer -->
<?= $this->extend('layout/_template'); ?>

<!-- Memanggil Section Content -->
<?= $this->section('content'); ?>
<!-- isi Content -->
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="my-3">Form Tambah Data Master Laboratorium</h2>
            <form action="save" method="POST">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="TIPE_PERIKSA_LAB" class="col-sm-2 col-form-label">Tipe Periksa Laboratorium</label>
                    <!-- Mulai Sini Kalo Nambah Field -->
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('TIPE_PERIKSA_LAB')) ? 'is-invalid' : ''; ?>" id="TIPE_PERIKSA_LAB" name="TIPE_PERIKSA_LAB" autofocus value="<?= old('TIPE_PERIKSA_LAB'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('TIPE_PERIKSA_LAB'); ?>
                        </div>
                    </div>
                </div>
                <a href="/masterlab" class="btn btn-primary mt-5">Kembali</a>
                <button type="submit" class="btn btn-success mt-5">Tambah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>