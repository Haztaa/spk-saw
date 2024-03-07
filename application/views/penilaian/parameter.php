<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Halaman penilaian kriteria</h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Kriteria</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Daftar Penilaian Kriteria</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <a href="<?= base_url('penilaian/tambah/' . $kriteria) ?>" class="btn btn-primary mb-2">Tambah Penilaian</a>
                <a href="<?= base_url('kriteria') ?>" class="btn btn-danger mb-2">Kembali</a>
                <div class="card">
                    <h5 class="card-header">Data Penilaian Kriteria<?= $this->session->flashdata('message'); ?></h5>
                    <div class="card-body" style="overflow-x:auto;">
                        <table class="table table-borderless table-data2" id="dataTable">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Penilaian Kriteria</th>
                                    <th>Nilai</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($sub as $s) : ?>
                                    <tr>
                                        <td><?= $i ?></td>
                                        <td><?= $s['nama'] ?></td>
                                        <td><?= $s['nilai'] ?></td>

                                        <td>

                                            <a href="<?= base_url('penilaian/ubah/') . $s['id_subkriteria'] . '/' . $kriteria ?>" class="btn btn-primary mb-2"><i class="fas fa-edit"></i></a>
                                            <a href="" onclick="hapus('<?php echo $s['id_subkriteria']; ?>')" class="btn btn-danger mb-2" data-toggle="modal" data-target="#hapus"><i class="fas fa-trash"></i></a>
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
                url: "<?php echo site_url('/penilaian/get') ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name="hapus"]').val(data.id_subkriteria);
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
                        <p>Data yang dipilih akan dihapus!</p>

                        <form action="<?= base_url('penilaian/hapus') ?>" method="POST">
                            <input type="hidden" name="hapus">
                            <input type="hidden" name="idd" value="<?= $kriteria ?>">
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