<?= $this->extend('layout/_template'); ?>

<?= $this->section('content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <center>
                <h1 class="text-uppercase">Selamat Datang <?= user()->username; ?>!</h1>
            </center>
            <p class="text-uppercase">Selamat Datang <?= user()->username; ?>! Aplikasi Medical Check Up Rumah Sakit Al Islam H.M Mawardi Krian, Sidoarjo. Semoga Aplikasi Inii Bermanfaat Bagi Semua Orang.</p>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>