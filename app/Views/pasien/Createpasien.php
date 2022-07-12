<!-- Memanggil Header dan Footer -->
<?= $this->extend('layout/_template'); ?>

<!-- Memanggil Section Content -->
<?= $this->section('content'); ?>
<!-- isi Content -->
<div class="card shadow mb-4 col-sm-12">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="/pasien/indexpasien" class=" mb-auto text-decoration-none fas fa-arrow-circle-left btn-light btn-primary btn-sm mt-xl-3"> back</a>
    </div>
    <div class="card-body">
        <p class="card-text">
        <h2 class="my-3">Form Tambah Data Pasien</h2>
        <form action="savepasien" method="POST">
            <?= csrf_field(); ?>
            <div class="row mb-3">
                <label for="NAMA_PASIEN" class="col-sm-2 col-form-label">Nama Pasien</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('NAMA_PASIEN')) ? 'is-invalid' : ''; ?>" id="NAMA_PASIEN" name="NAMA_PASIEN" autofocus value="<?= old('NAMA_PASIEN'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('NAMA_PASIEN'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="NO_RM" class="col-sm-2 col-form-label">No Rekamedis</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('NO_RM')) ? 'is-invalid' : ''; ?>" id="NO_RM" name="NO_RM" autofocus value="<?= old('NO_RM'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('NO_RM'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="PERUSAHAAN" class="col-sm-2 col-form-label">Perusahaan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('PERUSAHAAN')) ? 'is-invalid' : ''; ?>" id="PERUSAHAAN" name="PERUSAHAAN" autofocus value="<?= old('PERUSAHAAN'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('PERUSAHAAN'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="NIK" class="col-sm-2 col-form-label">NIK</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('NIK')) ? 'is-invalid' : ''; ?>" id="NIK" name="NIK" autofocus value="<?= old('NIK'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('NIK'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="DEPARTEMEN" class="col-sm-2 col-form-label">Departemen</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('DEPARTEMEN')) ? 'is-invalid' : ''; ?>" id="DEPARTEMEN" name="DEPARTEMEN" autofocus value="<?= old('DEPARTEMEN'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('DEPARTEMEN'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="BAGIAN" class="col-sm-2 col-form-label">Bagian</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('BAGIAN')) ? 'is-invalid' : ''; ?>" id="BAGIAN" name="BAGIAN" autofocus value="<?= old('BAGIAN'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('BAGIAN'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="JENIS_KELAMIN" class="col-sm-2 col-form-label">JK / Usia</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('JENIS_KELAMIN')) ? 'is-invalid' : ''; ?>" id="JENIS_KELAMIN" name="JENIS_KELAMIN" autofocus value="<?= old('JENIS_KELAMIN'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('JENIS_KELAMIN'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="TANGGAL_LAHIR" class="col-sm-2 col-form-label">Tanggal MCU</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control <?= ($validation->hasError('TANGGAL_LAHIR')) ? 'is-invalid' : ''; ?>" id="TANGGAL_LAHIR" name="TANGGAL_LAHIR" value="<?= old('TANGGAL_LAHIR'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('TANGGAL_LAHIR'); ?>
                    </div>
                </div>
            </div>
            <button type="submit" class="fas fa-save btn btn-success col-sm-12"> simpan</button>
        </form>
        </p>
    </div>
</div>
<?= $this->endSection(); ?>