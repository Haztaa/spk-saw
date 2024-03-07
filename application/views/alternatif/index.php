<div class="dashboard-wrapper">
    <div class="container-fluid dashboard-content">

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="page-header">
                    <h2 class="pageheader-title">Halaman alternatif (Data Yang Siap Untuk Dihitung)</h2>
                    <p class="pageheader-text">Proin placerat ante duiullam scelerisque a velit ac porta, fusce sit amet vestibulum mi. Morbi lobortis pulvinar quam.</p>
                    <div class="page-breadcrumb">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">alternatif</a></li>
                                <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Daftar alternatif</a></li>

                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <a href="<?= base_url('alternatif/tambah') ?>" class="btn btn-primary mb-2">Tambah alternatif</a>
                <div class="card">
                    <h5 class="card-header">Daftar alternatif (Yang Sudah Terdaftar) <?= $this->session->flashdata('message'); ?></h5>
                    <div class="card-body" style="overflow-x:auto;">
                        <table class="table table-bordered" id="dataTable">
                            <thead>
                                <tr>
                                    <th style="color: black;">No</th>
                                    <th style="color: black;">Nama monitor</th>
                                    <th style="color: black;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($data)) {
                                    $no = 1;
                                    foreach ($data as $alternatif) {
                                ?>
                                        <tr>
                                            <td width="80px" style="color: black;"><?php echo $no++ ?></td>
                                            <td style="color: black;"><?php echo $alternatif->nama_monitor ?></td>


                                            <td style="text-align:center; color:black;" width="200px">
                                                <a href="<?= base_url('alternatif/ubah/') . $alternatif->id_alternatif ?>" class="btn btn-primary mb-2"><i class="fas fa-edit"></i></a>
                                                <a href="" onclick="hapus('<?php echo $alternatif->id_alternatif; ?>')" class="btn btn-danger mb-2" data-toggle="modal" data-target="#hapus"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    <?php }
                                } else { ?>
                                    <tr>
                                        <td colspan="5" align="center">Tidak Ada Data</td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- ss -->

            </div>
        </div>
    </div>
    <script>
        function hapus(id) {
            //Ajax Load data from ajax
            $.ajax({
                url: "<?php echo site_url('/alternatif/get') ?>/" + id,
                type: "GET",
                dataType: "JSON",
                success: function(data) {
                    $('[name="hapus"]').val(data.id_alternatif);
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
                        <p>Data Yang Dipilih Akan Dihapus!
                        </p>
                        <form action="<?= base_url('alternatif/hapus') ?>" method="POST">
                            <input type="hidden" name="hapus">
                    </div>
                    <div class="modal-footer">
                        <a href="#" class="btn btn-secondary" data-dismiss="modal">Batal</a>
                        <button class="btn btn-primary" type="submit">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- MAIN CONTENT-->