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
                        <form action="<?= base_url('kriteria/ubah/') . $val['id_kriteria'] ?>" method="post" class="form-horizontal">

                            <div class="form-group">
                                <div class="col col-md-3">
                                    <label for="" class=" form-control-label">Nama Kriteria</label>
                                </div>
                                <div class="col-12 col-md-12">
                                    <input type="text" id="" name="nama_kriteria" placeholder="Masukan Nama kriteria" class="form-control" value="<?= $val['nama_kriteria'] ?>">
                                    <?= form_error('nama_kriteria', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>

                            <div class=" form-group">
                                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Jenis Kriteria</label></div>
                                <div class="col-12 col-md-12">
                                    <select name="jenis_kriteria" id="select" class="form-control">
                                        <?php if ($val['jenis_kriteria'] == 'Cost') : ?>
                                            <option disabled>Pilih Jenis Kriteria</option>
                                            <option value="Benefit">Benefit (Lebih Tinggi Lebih Baik)</option>
                                            <option value="Cost" selected>Cost (Lebih Rendah Leih Baik)</option>
                                        <?php else : ?>
                                            <option disabled>Pilih Jenis Kriteria</option>
                                            <option value="Benefit" selected>Benefit (Lebih Tinggi Lebih Baik)</option>
                                            <option value="Cost">Cost (Lebih Rendah Leih Baik)</option>
                                        <?php endif; ?>
                                    </select>
                                    <?= form_error('jenis_kriteria', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                            </div>


                            <button type="submit" class="btn btn-primary">Ubah</button>
                            <a href="<?= base_url('kriteria') ?>" class="btn btn-danger ">Kembali</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>