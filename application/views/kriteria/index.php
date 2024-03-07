<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Halaman kriteria</h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Kriteria</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Daftar Kriteria</a></li>

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <a href="<?= base_url('kriteria/tambah') ?>" class="btn btn-primary mb-2">Tambah Kriteria</a>
                <div class="card">
                    <h5 class="card-header">Daftar kriteria<?= $this->session->flashdata('message'); ?></h5>
                    <div class="card-body" style="overflow-x:auto;">
                        <table class="table " id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama kriteria</th>
                                    <th scope="col">Jenis Kriteria</th>
                                    <th scope="col">Bobot Kriteria</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($kriteria as $p) : ?>
                                    <tr>
                                        <th scope="row"><?= $i ?></th>
                                        <td><?= $p['nama_kriteria'] ?></td>
                                        <td><?= $p['jenis_kriteria'] ?></td>
                                        <td><?= $p['bobot'] ?></td>
                                        <td>
                                            <a href="<?= base_url('penilaian/parameter/') . $p['id_kriteria'] ?>" class="btn btn-success mb-2">Penilaian</a>
                                            <a href="<?= base_url('kriteria/ubah/') . $p['id_kriteria'] ?>" class="btn btn-warning mb-2"><i class="fas fa-edit"></i></a>
                                            <a onclick="hapus('<?php echo $p['id_kriteria']; ?>')" data-toggle="modal" data-target="#hapus" class="btn btn-danger mb-2"><i class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function hapus(id) {
            //Ajax Load data from ajax
            $.ajax({
                url: "<?php echo site_url('/kriteria/get') ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name="hapus"]').val(data.id_kriteria);
                    $('#hapus').modal('show'); // show bootstrap modal when complete loaded
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert('Error get data from ajax');
                }
            });
        }
    </script>
    <div class="">
        <!-- Modal -->
        <div class="modal fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="hapusLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="hapusLabel">Notifikasi</h5>
                        <a href="#" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </a>
                    </div>
                    <div class="modal-body">
                        <span class="badge badge-danger">Perhatian!</span>
                        <p>Data kriteria akan dihapus!</p>

                        <form action="<?= base_url('kriteria/hapus') ?>" method="POST">
                            <input type="hidden" name="hapus">
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                        <button class="btn btn-primary" type="submit">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>