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

                                <li class="breadcrumb-item active" aria-current="page">Tambah monitor</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">


                <div class="card">
                    <h5 class="card-header">Tambah Data monitor</h5>
                    <?= $this->session->flashdata('message'); ?>
                    <div class="card-body">
                        <form action="<?= base_url('alternatif/tambah') ?>" method="post" class="form-horizontal">
                            <div class="row form-group">
                                <label class="col-sm-3 control-label" for="">Nama monitor</label>
                                <div class="col-md-9">
                                    <select name="id_monitor" class="form-control">
                                        <?php
                                        if (!empty($monitor)) {
                                            foreach ($monitor as $s) {
                                        ?>

                                                <option value='<?php echo $s->id_monitor ?>'><?php echo $s->nama_monitor ?></option>
                                            <?php }
                                        } else { ?>
                                            <option class="form-control"> Semua Data Monitor sudah terdaftar</option>
                                        <?php } ?>

                                    </select>
                                </div>
                            </div>
                            <div class="row form-group">

                                <table class="table table-bordered">
                                    <thead>
                                        <th>Kriteria</th>
                                        <th>Nilai</th>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (!empty($kriteria)) {
                                            foreach ($kriteria as $rk) {
                                                $kriteriaid = $rk->id_kriteria;
                                                echo '<tr>';
                                                echo '<td>' . $rk->nama_kriteria . '</td>';
                                                echo '<td>';
                                                $dSub = $this->m_db->get_data('subkriteria', array('id_kriteria' => $kriteriaid));
                                                if (!empty($dSub)) {

                                                    echo '<select name="kriteria[' . $kriteriaid . ']"  class="form-control" data-placeholder="Pilih Nilai"  style="width: 100%">';
                                                    echo '<option></option>';
                                                    echo '<option value="" selected disabled>Silahkan Pilih Nilai Kriterianya</option>';
                                                    foreach ($dSub as $rSub) {

                                                        echo '<option value="' . $rSub->id_subkriteria . '">' . $rSub->nama . ' (' . $rSub->nilai . ')' . '</option>';
                                                    }

                                                    echo '</select>';
                                                    echo form_error('kriteria[' . $kriteriaid . ']');

                                                    echo '</td>';
                                                    echo '</tr>';
                                                } else {
                                                    echo 'Belum Ada  Data';
                                                }
                                            }
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>


                            <button type="submit" class="btn btn-primary">Tambah</button>
                            <a href="<?= base_url('alternatif') ?>" class="btn btn-danger ">Kembali</a>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>