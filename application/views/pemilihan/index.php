<?php error_reporting(0); ?>
<script>
    function show() {

        $("#hasil").toggle('fade');
    }
</script>
<div class="dashboard-wrapper">
    <div class="dashboard-ecommerce">
        <div class="container-fluid dashboard-content ">

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header">
                        <h2 class="pageheader-title">Pemilihan Monitor Menggunakan Algoritma SAW</h2>
                        <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Beranda</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Beranda Admin</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>



            <div class="card border border-secondary">
                <div class="card-header">

                    <div class="row">
                        <div class="col-lg-6">
                            <strong class="card-title">Data Alternatif Yang Akan Di Hitung</strong>
                        </div>


                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th style="color: black;">Nama monitor</th>
                            <?php
                            $dKriteria = $this->mod_kriteria->kriteria_data();
                            if (!empty($dKriteria)) {
                                foreach ($dKriteria as $rKriteria) {
                                    echo '<th style="color: black;">' . $rKriteria->nama_kriteria . ' </th>';
                                }
                            }
                            ?>

                        </thead>
                        <?php
                        $dAlternatif = $this->m_db->get_data('alternatif');
                        if (!empty($dAlternatif)) {

                            foreach ($dAlternatif as $rAlternatif) {
                                $alternatifID = $rAlternatif->id_alternatif;
                                $monitorId = $rAlternatif->id_monitor;
                                $nama_monitor = field_value('monitor', 'id_monitor', $monitorId, 'nama_monitor');

                        ?>
                                <tr>
                                    <td style="color: black;"><?= $nama_monitor; ?></td>
                                    <?php
                                    $total = 0;
                                    if (!empty($dKriteria)) {
                                        foreach ($dKriteria as $rKriteria) {
                                            $kriteriaid = $rKriteria->id_kriteria;
                                            $subkriteria = alternatif_nilai($alternatifID, $kriteriaid);

                                            $d = $this->db->get_where('subkriteria', ['id_subkriteria' => $subkriteria])->row();
                                            if ($d->nilai == null) {
                                                $d->nilai = 0;
                                                $msgg = 'Nilai Alternatif Belum Diisi';
                                            }
                                            echo '<td style="color: black;">' . $d->nama . ' (' . $d->nilai . ')' . '</td>';
                                        }
                                    }
                                    ?>



                                </tr>

                        <?php

                            }
                        } else {
                            echo '<tr>
                            <td colspan="6" align="center">Tidak Ada Data</td>
                        </tr>';
                        }

                        ?>

                    </table>
                </div>
            </div>

            <div class="card border border-secondary">
                <div class="card-header">

                    <div class="row">
                        <div class="col-lg-4">
                            <strong class="card-title">Data Bobot Dari Setiap Kriteria</strong>
                        </div>

                        <div class="col-lg-8">
                            <?= $this->session->flashdata('message'); ?>
                            </section>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="container">
                        <form action="<?= base_url('pemilihan/bobot') ?>" method="POST" id="myform">


                            <table class="table">
                                <thead>
                                    <?php foreach ($krit as $k) : ?>

                                        <th><?= $k['nama_kriteria'] ?></th>

                                    <?php endforeach; ?>
                                </thead>
                                <tbody>
                                    <?php $no = 1 ?>
                                    <?php $n = 0 ?>
                                    <?php foreach ($krit as $k) :  ?>
                                        <?php $n++ ?>
                                        <th>
                                            <input type="hidden" name="id<?= $no++ ?>" value="<?= $k['id_kriteria'] ?>">
                                            <select name="bobot[]" id="tes<?= $n ?>" class="form-control">
                                                <?php
                                                $options = array('0.1', '0.15', '0.2', '0.25', '0.3', '0.35', '0.4', '0.45', '0.5');
                                                foreach ($options as $option) :
                                                    $selected = ($k['bobot'] == $option) ? 'selected' : '';
                                                ?>
                                                    <option value="<?= $option ?>" <?= $selected ?>><?= number_format($option, 2) * 100 ?>%</option>
                                                <?php endforeach; ?>
                                            </select>


                                        </th>
                                        </th>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                    </div>
                </div>
                <div class="card-footer">
                    <?php if (!empty($krit)) : ?>
                        <button type="input" class="btn btn-info btn-sm"><i class="fa  fa-arrow-left"></i>Ubah Bobot</button>

                    <?php else : ?>
                        <span class="badge nk-red ">Tidak Ada Kriteria</span>
                    <?php endif; ?>
                    <div id="result" style="display: none;"> <span class="badge badge-danger ">Nilai Bobot lebih dari 100%</span></div>
                    <div id="result1" style="display: none;"> <span class="badge badge-danger ">Nilai Bobot kurang dari 100%</span></div>



                </div>
                </form>
            </div>
            <?php $query = $this->db->query("SELECT SUM(bobot) AS total_bobot FROM kriteria");
            $result = $query->row();
            $total_bobot = $result->total_bobot; ?>
            <?php
            if ($total_bobot == 0) {
                echo '<span class="badge nk-red">Nilai Bobot Belum Diisi</span>';
            } else {
                // Gantilah $d->nilai dengan variabel atau nilai yang sesuai di dalam kondisi ini
                if ($d->nilai == null) {
                    echo '<a href="javascript:;" onclick="show();" class="btn btn-danger disabled">Masih Ada Alternatif yang nilainya belum diisi!</a>';
                } else {
                    echo '<a href="javascript:;" onclick="show();" class="btn btn-success">Lihat Hasil</a>';
                }
            }
            ?>
            <br><br>


            <!-- Proses SAW -->


            <div id="hasil" style="display: none;">
                <div class="card">
                    <div class="card-header">
                        <label for="" style="color: red;">Hasil Normalisasi</label>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">

                            <table class="table table-bordered ">
                                <thead>
                                    <th style="color: black;">Nama monitor</th>
                                    <?php
                                    $dKriteria = $this->mod_kriteria->kriteria_data();
                                    if (!empty($dKriteria)) {
                                        foreach ($dKriteria as $rKriteria) {
                                            echo '<th style="color: black;">' . $rKriteria->nama_kriteria . '</th>';
                                        }
                                    }
                                    ?>

                                </thead>
                                <?php


                                $dAlternatif = $this->m_db->get_data('alternatif');
                                if (!empty($dAlternatif)) {

                                    foreach ($dAlternatif as $rAlternatif) {
                                        $alternatifID = $rAlternatif->id_alternatif;
                                        $monitorID = $rAlternatif->id_monitor;
                                        $nama_monitor = field_value('monitor', 'id_monitor', $monitorID, 'nama_monitor');

                                ?>
                                        <tr>
                                            <td style="color: black;"><?= $nama_monitor; ?></td>
                                            <?php
                                            $total = 0;
                                            $hasil_normalisasi = 0;
                                            if (!empty($dKriteria)) {
                                                foreach ($dKriteria as $rKriteria) {
                                                    $kriteriaid = $rKriteria->id_kriteria;
                                                    $subkriteria = alternatif_nilai($alternatifID, $kriteriaid);
                                                    $d = $this->db->get_where('subkriteria', ['id_subkriteria' => $subkriteria])->row();
                                                    if ($rKriteria->jenis_kriteria == 'Benefit') {
                                                        $datamax = $this->db->query("SELECT an.id_kriteria, MAX(nilai) AS max 
																FROM subkriteria LEFT JOIN alternatif_nilai an 
																ON an.id_subkriteria=subkriteria.id_subkriteria 
																WHERE an.id_kriteria='$kriteriaid' 
																GROUP BY an.id_kriteria")->row();
                                                        $max = $datamax->max;
                                                        $bobot = $rKriteria->bobot;
                                                        $nilai = $d->nilai;
                                                        // hasil normalisasi
                                                        $hasil =  number_format($nilai / $max, 4);
                                                        $hasil_akhir = $hasil * $bobot;
                                                        echo '<td style="color: black;">' . $hasil . '</td>';
                                                        $hasil_normalisasi = $hasil_normalisasi + $hasil;
                                                    } else {
                                                        $datamin = $this->db->query("SELECT an.id_kriteria, MIN(nilai) AS min
																FROM subkriteria LEFT JOIN alternatif_nilai an 
																ON an.id_subkriteria=subkriteria.id_subkriteria 
																WHERE an.id_kriteria='$kriteriaid' 
																GROUP BY an.id_kriteria")->row();
                                                        $bobot = $rKriteria->bobot;
                                                        $min = $datamin->min;
                                                        $nilai = $d->nilai;
                                                        $hasil = number_format($min / $nilai, 4);
                                                        $hasil_akhir = $hasil * $bobot;
                                                        echo '<td>' . $hasil . '</td>';
                                                        $hasil_normalisasi = $hasil_normalisasi + $hasil;
                                                    }
                                                }
                                            }
                                            ?>



                                        </tr>
                                <?php

                                    }
                                } else {
                                    return false;
                                }

                                ?>

                            </table>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="card">
                    <div class="card-header">
                        <label for="" style="color: red;">Pembobotan </label>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <?php $hasil_ranks = array(); ?>
                            <table class="table table-bordered ">
                                <thead>
                                    <th style="color: black;">Nama monitor</th>
                                    <?php
                                    $dKriteria = $this->mod_kriteria->kriteria_data();
                                    if (!empty($dKriteria)) {
                                        foreach ($dKriteria as $rKriteria) {
                                            echo '<th style="color: black;">' . $rKriteria->nama_kriteria . '</th>';
                                        }
                                    }
                                    ?>
                                    <th style="color: black;">Hasil</th>
                                </thead>
                                <?php


                                $dAlternatif = $this->m_db->get_data('alternatif');
                                if (!empty($dAlternatif)) {

                                    foreach ($dAlternatif as $rAlternatif) {
                                        $alternatifID = $rAlternatif->id_alternatif;
                                        $monitorID = $rAlternatif->id_monitor;
                                        $nama_monitor = field_value('monitor', 'id_monitor', $monitorID, 'nama_monitor');
                                        $link = field_value('monitor', 'id_monitor', $monitorID, 'link');

                                ?>
                                        <tr>
                                            <td style="color: black;"><?= $nama_monitor; ?></td>
                                            <?php
                                            $total = 0;
                                            $hasil_normalisasi = 0;

                                            if (!empty($dKriteria)) {
                                                foreach ($dKriteria as $rKriteria) {
                                                    $kriteriaid = $rKriteria->id_kriteria;
                                                    $subkriteria = alternatif_nilai($alternatifID, $kriteriaid);
                                                    $d = $this->db->get_where('subkriteria', ['id_subkriteria' => $subkriteria])->row();
                                                    if ($rKriteria->jenis_kriteria == 'Benefit') {
                                                        $datamax = $this->db->query("SELECT an.id_kriteria, MAX(nilai) AS max 
																FROM subkriteria LEFT JOIN alternatif_nilai an 
																ON an.id_subkriteria=subkriteria.id_subkriteria 
																WHERE an.id_kriteria='$kriteriaid' 
																GROUP BY an.id_kriteria")->row();
                                                        $max = $datamax->max;
                                                        $bobot = $rKriteria->bobot;

                                                        $nilai = $d->nilai;
                                                        // hasil normalisasi
                                                        $hasil =  number_format($nilai / $max, 4);
                                                        $hasil_akhir_max = $hasil * $bobot;

                                                        echo '<td style="color: black;">' . $hasil_akhir_max . '</td>';
                                                        $hasil_normalisasi = $hasil_normalisasi + $hasil_akhir_max;
                                                    } else {
                                                        $datamin = $this->db->query("SELECT an.id_kriteria, MIN(nilai) AS min
																FROM subkriteria LEFT JOIN alternatif_nilai an 
																ON an.id_subkriteria=subkriteria.id_subkriteria 
																WHERE an.id_kriteria='$kriteriaid' 
																GROUP BY an.id_kriteria")->row();
                                                        $bobot = $rKriteria->bobot;
                                                        $min = $datamin->min;

                                                        $nilai = $d->nilai;
                                                        $hasil = number_format($min / $nilai, 4);
                                                        $hasil_akhir_min = $hasil * $bobot;

                                                        echo '<td name="tes" style="color: black;">' . $hasil_akhir_min . '</td>';
                                                        // var_dump($hasil_akhir);
                                                        // die;

                                                        $hasil_normalisasi = $hasil_normalisasi + $hasil_akhir_min;
                                                    }
                                                }
                                            }
                                            ?>


                                            <td style="color: black;">
                                                <?php

                                                $hasil_rank['nilai'] = $hasil_normalisasi;
                                                $hasil_rank['monitor'] = $nama_monitor;
                                                $hasil_rank['link'] = $link;
                                                array_push($hasil_ranks, $hasil_rank);
                                                echo $hasil_normalisasi;

                                                ?>
                                            </td>

                                        </tr>
                                <?php

                                    }
                                } else {
                                    return false;
                                }

                                ?>

                            </table>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <label for="" style="color: red;">Hasil Peringkat </label>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <th style="color: black;">Peringkat</th>
                                    <th style="color: black;">Nama monitor</th>
                                    <th style="color: green;">Nilai</th>
                                </thead>
                                <?php
                                $no = 1;
                                rsort($hasil_ranks);
                                foreach ($hasil_ranks as $rank) { ?>
                                    <tr style="color: black;">
                                        <td>
                                            <center><?php echo $no++ ?></center>
                                        </td>
                                        <td>
                                            <center><?php echo $rank['monitor']; ?></center>
                                        </td>
                                        <td>
                                            <center><?php
                                                    $v = $rank['nilai'];
                                                    echo number_format($v, 4); ?></center>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>

                <?php rsort($hasil_ranks); ?>
                <div class="card">
                    <div class="card-body">
                        <label for="" style="color:black;"> REKOMENDASI monitor YANG SESUAI ADALAH : <a href="<?= $hasil_ranks[0]['link'] ?>"><?= $hasil_ranks[0]['monitor'] ?></a></label>
                    </div>
                </div>
            </div>


        </div>
    </div>
    <script>
        $(document).ready(function() {
            // Event listener untuk perubahan nilai dropdown
            for (var i = 1; i <= <?= $jumlah; ?>; i++) {
                $('#tes' + i).change(function() {
                    var selectedValues = [];
                    var total = 0;
                    // Mengambil nilai terpilih dari setiap dropdown
                    for (var j = 1; j <= <?= $jumlah; ?>; j++) {
                        var selectedValue = parseFloat($('#tes' + j).val());
                        selectedValues.push(selectedValue);
                        total += selectedValue;
                    }

                    // Menambahkan nilai terpilih ke elemen lain

                    if (total > 1) {
                        $('#result').show();
                        $(":submit").attr("disabled", true);
                        $('#result1').hide();
                    } else if (total < 1) {
                        $('#result1').show();
                        $(":submit").attr("disabled", true);
                        $('#result').hide();
                    } else {
                        $('#result').hide();
                        $('#result1').hide();
                        $(":submit").attr("disabled", false);
                    }
                });
            }
        });
    </script>