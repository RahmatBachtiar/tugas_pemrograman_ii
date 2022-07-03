<?php
    if (!defined('INDEX')) die("");
?>

<link href="css/sb-admin-2.min.css" rel="stylesheet">
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<div id="content-wrapper" class="d-flex flex-column">
<div id="content">
<div class="container-fluid">    
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="m-0 font-weight-bold text-primary">Data Pegawai</h3>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
      </div>
    </div>
    <div class="card-body">
        <a href="?hal=pegawai_tambah" class="btn btn-primary btn-icon-split btn-sm">
            <span class="icon text-white-50">
              <i class="fas fa-plus"></i>
            </span>
            <span class="text">Tambah</span>
        </a> 
        <div class="table-responsive mt-2">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>Jabatan</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>


                <tbody>
                    <?php
                        $query = mysqli_query($conn, "SELECT * FROM pegawai LEFT JOIN jabatan ON pegawai.id_jabatan = jabatan.id_jabatan ORDER BY pegawai.id_pegawai DESC");
                        $no = 0;
                        while ($data = mysqli_fetch_assoc($query)) {
                            $no++;
                    ?> 
                            <tr>
                                <td><?= $no ?></td>
                                <td><img src="images/<?= $data['foto'] ?>"width="100"></td>
                                <td><?= $data['nama_pegawai']?></td>
                                <td><?= $data['jenis_kelamin']?></td>
                                <td><?= $data['tgl_lahir']?></td>
                                <td><?= $data['nama_jabatan']?></td>
                                <td><?= $data['keterangan']?></td>
                                <td>
                                    <a class="btn btn-primary btn-icon-split btn-sm" href="?hal=pegawai_edit&id=<?= $data['id_pegawai']?>">
                                        <span class="icon text-white-50">
                                          <i class="fas fa-pencil"></i>
                                        </span>
                                        <span class="text">Edit</span>
                                    </a>
                                    <a class="btn btn-primary btn-icon-split btn-sm" href="?hal=pegawai_hapus&id=<?= $data['id_pegawai']?>&foto=<?=$data['foto']?>">
                                        <span class="icon text-white-50">
                                          <i class="fas fa-pencil"></i>
                                        </span>
                                        <span class="text">Hapus</span>
                                    </a>
                                </td>

                                    <!-- <a href="?hal=jabatan_edit&id=<?= $data['id_jabatan']?>" class="btn btn-primary btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                          <i class="fas fa-pencil"></i>
                                        </span>
                                        <span class="text">Edit</span>
                                    </a> 

                                    <a href="?hal=jabatan_hapus&id=<?= $data['id_jabatan']?>" class="btn btn-primary btn-icon-split btn-sm">
                                        <span class="icon text-white-50">
                                          <i class="fas fa-x"></i>
                                        </span>
                                        <span class="text">Hapus</span>
                                    </a> -->
                               <!--  </td> -->
                            </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
</div>