<!-- Memanggil Header dan Footer -->
<?= $this->extend('layout/_template'); ?>

<!-- Memanggil Section Content -->
<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h2 class="my-3">Form Ubah Data Pasien</h2>
            <form action="/pasien/update/<?= $pasien['ID_PASIEN']; ?>" method="POST">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="NAMA_PASIEN" class="col-sm-2 col-form-label">Nama Pasien</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('NAMA_PASIEN')) ? 'is-invalid' : ''; ?>" id="NAMA_PASIEN" name="NAMA_PASIEN" autofocus value="<?= (old('NAMA_PASIEN')) ? old('NAMA_PASIEN') : $pasien['NAMA_PASIEN']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('NAMA_PASIEN'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="NO_RM" class="col-sm-2 col-form-label">No Rekamedis</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('NO_RM')) ? 'is-invalid' : ''; ?>" id="NO_RM" name="NO_RM" autofocus value="<?= (old('NO_RM')) ? old('NO_RM') : $pasien['NO_RM']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('NO_RM'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="PERUSAHAAN" class="col-sm-2 col-form-label">Perusahaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('PERUSAHAAN')) ? 'is-invalid' : ''; ?>" id="PERUSAHAAN" name="PERUSAHAAN" autofocus value="<?= (old('PERUSAHAAN')) ? old('PERUSAHAAN') : $pasien['PERUSAHAAN']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('PERUSAHAAN'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="NIK" class="col-sm-2 col-form-label">NIK</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('NIK')) ? 'is-invalid' : ''; ?>" id="NIK" name="NIK" autofocus value="<?= (old('NIK')) ? old('NIK') : $pasien['NIK']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('NIK'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="DEPARTEMEN" class="col-sm-2 col-form-label">Departemen</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('DEPARTEMEN')) ? 'is-invalid' : ''; ?>" id="DEPARTEMEN" name="DEPARTEMEN" autofocus value="<?= (old('DEPARTEMEN')) ? old('DEPARTEMEN') : $pasien['DEPARTEMEN']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('DEPARTEMEN'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="BAGIAN" class="col-sm-2 col-form-label">Bagian</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('BAGIAN')) ? 'is-invalid' : ''; ?>" id="BAGIAN" name="BAGIAN" autofocus value="<?= (old('BAGIAN')) ? old('BAGIAN') : $pasien['BAGIAN']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('BAGIAN'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="JENIS_KELAMIN" class="col-sm-2 col-form-label">JK / Usia</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('JENIS_KELAMIN')) ? 'is-invalid' : ''; ?>" id="JENIS_KELAMIN" name="JENIS_KELAMIN" autofocus value="<?= (old('JENIS_KELAMIN')) ? old('JENIS_KELAMIN') : $pasien['JENIS_KELAMIN']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('JENIS_KELAMIN'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="TANGGAL_LAHIR" class="col-sm-2 col-form-label">Tanggal MCU</label>
                    <div class="col-sm-10">
                        <input type="date" class="form-control <?= ($validation->hasError('TANGGAL_LAHIR')) ? 'is-invalid' : ''; ?>" id="TANGGAL_LAHIR" name="TANGGAL_LAHIR" value="<?= (old('TANGGAL_LAHIR')) ? old('TANGGAL_LAHIR') : $pasien['TANGGAL_LAHIR']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('TANGGAL_LAHIR'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <!-- <label for="ID_PASIEN" class="col-sm-2 col-form-label">Id Penyakit</label> -->
                    <div class="col-sm-10">
                        <input type="hidden" class="form-control <?= ($validation->hasError('ID_PASIEN')) ? 'is-invalid' : ''; ?>" id="ID_PASIEN" name="ID_PASIEN" value="<?= $pasien['ID_PASIEN']; ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('ID_PASIEN'); ?>
                        </div>
                    </div>
                </div>
                <a href="/pasien" class="btn btn-primary mt-5">Kembali</a>
                <button type="submit" class="btn btn-success mt-5">Ubah Data</button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>