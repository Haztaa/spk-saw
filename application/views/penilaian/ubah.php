<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Kriteria</h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Data kriteria</a></li>

                                <li class="breadcrumb-item active" aria-current="page">Ubah kriteria</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">


                <div class="card">
                    <h5 class="card-header">Ubah Data kriteria</h5>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card-body">


                        <div class="row">
                            <div class="col-md-12">
                                <form action="<?= base_url('penilaian/ubah/' . $kriteria . '/' . $krit) ?>" method="POST">
                                    <input type="hidden" name="id_kriteria" value="<?= $kriteria; ?>" />
                                    <?= form_error('ket'); ?>
                                    <?= form_error('nilai'); ?>

                                    <div id="div_teks" class="opsi">
                                        <div class="form-group required">
                                            <label for="field-1" class="col-sm-3 control-label">Keterangan</label>
                                            <div class="col-md-7">
                                                <input type="text" name="ket" class="form-control " autocomplete="" required value="<?= $var['nama'] ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div id=" nilaikategori">
                                        <div class="form-group required">
                                            <label class="col-sm-12 control-label">Nilai</label>
                                            <div class="col-md-6">
                                                <div class="row">
                                                    <?php for ($i = 1; $i <= 5; $i++) : ?>
                                                        <div class="col-sm">
                                                            <?php $ch = '';
                                                            if ($var['nilai'] == $i) : ?>
                                                                <?php $ch = 'checked="checked"'; ?>
                                                            <?php endif; ?>
                                                            <div class="radio radio-replace">
                                                                <label class="custom-control custom-radio">
                                                                    <input type="radio" <?= $ch ?> class="custom-control-input" name="nilai" value="<?= $i ?>"><span class="custom-control-label"><?= $i ?></span>
                                                                    <?= form_error('nilai ', '<small class="text-danger pl-3">', '</small>'); ?>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    <?php endfor; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <?php $tes = $this->uri->segment(4);
                        ?>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                        <a href="<?= base_url('penilaian/parameter/' . $tes) ?>" class="btn btn-danger ">Kembali</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>