<!-- Memanggil Header dan Footer -->
<?= $this->extend('layout/_template'); ?>

<!-- Memanggil Section Content -->
<?= $this->section('content'); ?>

<div class="card shadow mb-4 col-sm-12">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="/pasien/indexperiksa" class=" mb-auto text-decoration-none fas fa-arrow-circle-left btn-light btn-primary btn-sm mt-xl-3"> back</a>
    </div>
    <div class="card-body">
        <p class="card-text">
        <h2 class="my-3">Form Tambah Data Periksa Fisik</h2>
        <form action="saveperiksa" method="POST">
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
                <label for="BATUK_DARAH" class="col-sm-2 col-form-label">Batuk Darah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('BATUK_DARAH')) ? 'is-invalid' : ''; ?>" id="BATUK_DARAH" name="BATUK_DARAH" value="<?= old('BATUK_DARAH'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('BATUK_DARAH'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="KENCING_BATU" class="col-sm-2 col-form-label">Kencing Batu</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('KENCING_BATU')) ? 'is-invalid' : ''; ?>" id="KENCING_BATU" name="KENCING_BATU" value="<?= old('KENCING_BATU'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('KENCING_BATU'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="HEPATITIS" class="col-sm-2 col-form-label">Hepatitis</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('HEPATITIS')) ? 'is-invalid' : ''; ?>" id="HEPATITIS" name="HEPATITIS" autofocus value="<?= old('HEPATITIS'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('HEPATITIS'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="HERNIA" class="col-sm-2 col-form-label">Hernia</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('HERNIA')) ? 'is-invalid' : ''; ?>" id="HERNIA" name="HERNIA" autofocus value="<?= old('HERNIA'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('HERNIA'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="HIPERTENSI" class="col-sm-2 col-form-label">Hipertensi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('HIPERTENSI')) ? 'is-invalid' : ''; ?>" id="HIPERTENSI" name="HIPERTENSI" autofocus value="<?= old('HIPERTENSI'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('HIPERTENSI'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="HEMORROID" class="col-sm-2 col-form-label">Hemorroid</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('HEMORROID')) ? 'is-invalid' : ''; ?>" id="HEMORROID" name="HEMORROID" autofocus value="<?= old('HEMORROID'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('HEMORROID'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="DIABETES" class="col-sm-2 col-form-label">Diabetes</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('DIABETES')) ? 'is-invalid' : ''; ?>" id="DIABETES" name="DIABETES" autofocus value="<?= old('DIABETES'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('DIABETES'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="TINGGI_BADAN" class="col-sm-2 col-form-label">Tinggi Badan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('TINGGI_BADAN')) ? 'is-invalid' : ''; ?>" id="TINGGI_BADAN" name="TINGGI_BADAN" autofocus value="<?= old('TINGGI_BADAN'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('TINGGI_BADAN'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="BERAT_BADAN" class="col-sm-2 col-form-label">Berat Badan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('BERAT_BADAN')) ? 'is-invalid' : ''; ?>" id="BERAT_BADAN" name="BERAT_BADAN" autofocus value="<?= old('BERAT_BADAN'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('BERAT_BADAN'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="NADI" class="col-sm-2 col-form-label">Nadi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('NADI')) ? 'is-invalid' : ''; ?>" id="NADI" name="NADI" autofocus value="<?= old('NADI'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('NADI'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="TEKANAN_DARAH" class="col-sm-2 col-form-label">Tekanan Darah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('TEKANAN_DARAH')) ? 'is-invalid' : ''; ?>" id="TEKANAN_DARAH" name="TEKANAN_DARAH" autofocus value="<?= old('TEKANAN_DARAH'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('TEKANAN_DARAH'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="VISUS" class="col-sm-2 col-form-label">Visus</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('VISUS')) ? 'is-invalid' : ''; ?>" id="VISUS" name="VISUS" autofocus value="<?= old('VISUS'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('VISUS'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="BUTA_WARNA" class="col-sm-2 col-form-label">Buta Warna</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('BUTA_WARNA')) ? 'is-invalid' : ''; ?>" id="BUTA_WARNA" name="BUTA_WARNA" autofocus value="<?= old('BUTA_WARNA'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('BUTA_WARNA'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="JULING" class="col-sm-2 col-form-label">Juling</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('JULING')) ? 'is-invalid' : ''; ?>" id="JULING" name="JULING" autofocus value="<?= old('JULING'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('JULING'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="KELAINAN_MATA_LAIN" class="col-sm-2 col-form-label">Kelainan Mata Lain</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('KELAINAN_MATA_LAIN')) ? 'is-invalid' : ''; ?>" id="KELAINAN_MATA_LAIN" name="KELAINAN_MATA_LAIN" autofocus value="<?= old('KELAINAN_MATA_LAIN'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('KELAINAN_MATA_LAIN'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="TELINGA_LUAR" class="col-sm-2 col-form-label">Telinga Luar</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('TELINGA_LUAR')) ? 'is-invalid' : ''; ?>" id="TELINGA_LUAR" name="TELINGA_LUAR" autofocus value="<?= old('TELINGA_LUAR'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('TELINGA_LUAR'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="TELINGA_TENGAH" class="col-sm-2 col-form-label">Telinga Tengah</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('TELINGA_TENGAH')) ? 'is-invalid' : ''; ?>" id="TELINGA_TENGAH" name="TELINGA_TENGAH" autofocus value="<?= old('TELINGA_TENGAH'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('TELINGA_TENGAH'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="GIGI" class="col-sm-2 col-form-label">Gigi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('GIGI')) ? 'is-invalid' : ''; ?>" id="GIGI" name="GIGI" autofocus value="<?= old('GIGI'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('GIGI'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="PARU" class="col-sm-2 col-form-label">Paru - Paru</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('PARU')) ? 'is-invalid' : ''; ?>" id="PARU" name="PARU" autofocus value="<?= old('PARU'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('PARU'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="JANTUNG" class="col-sm-2 col-form-label">Jantung</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('JANTUNG')) ? 'is-invalid' : ''; ?>" id="JANTUNG" name="JANTUNG" autofocus value="<?= old('JANTUNG'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('JANTUNG'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="HATI" class="col-sm-2 col-form-label">Hati</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('HATI')) ? 'is-invalid' : ''; ?>" id="HATI" name="HATI" autofocus value="<?= old('HATI'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('HATI'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="LIMPA" class="col-sm-2 col-form-label">Limpa</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('LIMPA')) ? 'is-invalid' : ''; ?>" id="LIMPA" name="LIMPA" autofocus value="<?= old('LIMPA'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('LIMPA'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="EKSTRIMITAS" class="col-sm-2 col-form-label">Ekstrimitas</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('EKSTRIMITAS')) ? 'is-invalid' : ''; ?>" id="EKSTRIMITAS" name="EKSTRIMITAS" autofocus value="<?= old('EKSTRIMITAS'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('EKSTRIMITAS'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="KESEIMBANGAN" class="col-sm-2 col-form-label">Keseimbangan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('KESEIMBANGAN')) ? 'is-invalid' : ''; ?>" id="KESEIMBANGAN" name="KESEIMBANGAN" autofocus value="<?= old('KESEIMBANGAN'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('KESEIMBANGAN'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="EXIM" class="col-sm-2 col-form-label">Exim</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('EXIM')) ? 'is-invalid' : ''; ?>" id="EXIM" name="EXIM" autofocus value="<?= old('EXIM'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('EXIM'); ?>
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <label for="DERMATITIS" class="col-sm-2 col-form-label">Dermatitis</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control <?= ($validation->hasError('DERMATITIS')) ? 'is-invalid' : ''; ?>" id="DERMATITIS" name="DERMATITIS" autofocus value="<?= old('DERMATITIS'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('DERMATITIS'); ?>
                    </div>
                </div>
            </div>
            <button type="submit" class="fas fa-save btn btn-success col-sm-12"> simpan</button>
        </form>
        </p>
    </div>
</div>
<?= $this->endSection(); ?>