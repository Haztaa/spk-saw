<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Monitor</h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Data monitor</a></li>

                                <li class="breadcrumb-item active" aria-current="page">Ubah monitor</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">


                <div class="card">
                    <h5 class="card-header">Ubah Data monitor</h5>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card-body">
                        <form action="<?= base_url('monitor/ubah/') . $val['id_monitor'] ?>" method="post" class="form-horizontal">
                            <div class="form-group">
                                <div class="col col-md-3">
                                    <label for="" class=" form-control-label">Nama monitor</label>
                                </div>
                                <div class="col-12 col-md-12">
                                    <input type="text" id="" name="nama_monitor" placeholder="Masukan Nama monitor" class="form-control" value="<?= $val['nama_monitor'] ?>">
                                    <?= form_error('nama_monitor', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>


                            <button type="submit" class="btn btn-primary">Ubah</button>
                            <a href="<?= base_url('monitor') ?>" class="btn btn-danger ">Kembali</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>