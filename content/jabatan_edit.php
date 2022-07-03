<?php
    if (!defined('INDEX')) die("");

    $query = mysqli_query($conn, "SELECT * FROM jabatan WHERE id_jabatan = '$_GET[id]'");
    $data = mysqli_fetch_array($query);
?>


<link href="css/sb-admin-2.min.css" rel="stylesheet">
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
<div id="content-wrapper" class="d-flex flex-column">
<div id="content">
<div class="container-fluid">    
<div class="card shadow mb-4">
    <div class="card-header py-3">
      <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h3 class="m-0 font-weight-bold text-primary">Edit Jabatan</h3>
      </div>
    </div>
    <div class="card-body">

        <form action="?hal=jabatan_update" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?= $data['id_jabatan']?>">
            <div class="form-group">
                <label for="nama">Nama Jabatan</label>
                <div class="row">
                    <div class="input col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <input type="text" id="nama" class="form-control" name="nama" value="<?=$data['nama_jabatan']?>">
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <input type="submit" value="Simpan" class="btn btn-primary">
                        <input type="reset" value="Batal" class="btn btn-primary">
                    </div>
                </div>

            </div>    
        </form> 

    </div>
</div>
</div>
</div>
</div>
