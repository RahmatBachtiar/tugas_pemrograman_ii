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
        <h3 class="m-0 font-weight-bold text-primary">Tambah Pegawai</h3>
      </div>
    </div>
    <div class="card-body">

        <form action="?hal=pegawai_insert" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" >
            <div class="form-group">
                <div class="row">
                    <div class="input col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label for="foto">Foto</label>
                    </div>
                    <div class="input col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <input type="file" id="foto" name="foto" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="input col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label for="nama">Nama Pegawai</label>
                    </div>
                    <div class="input col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <input type="text" id="nama" name="nama" class="form-control" ">
                    </div>
                </div>
            </div> 
            <div class="form-group">
                <div class="row">
                    <div class="input col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label for="jk">Jenis Kelamin</label>
                    </div>
                    <div class="input col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <input type="radio" id="Jk" name="jk" value="L"> Laki-laki
                        <input type="radio" id="jk" name="jk" value="P" class="ml-4"> Perempuan
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="input col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label for="tanggal">Tanggal Lahir</label>
                    </div>
                    <div class="input col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <input type="date" id="tanggal" name="tanggal" class="form-control">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="input col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label for="jabatan">Jabatan</label>
                    </div>
                    <div class="input col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <select class="form-control" name="jabatan" id="jabatan">
                            <option value=""> -Pilih Jabatan- </option>
                            <?php
                                $queryjabatan = mysqli_query($conn, "SELECT * FROM jabatan");
                                while ($j = mysqli_fetch_assoc($queryjabatan)) {
                                    echo "<option value='$j[id_jabatan]'>$j[nama_jabatan]</option>";
                                }
                            ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="input col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label for="keterangan">Keterangan</label>
                    </div>
                    <div class="input col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <textarea class="form-control" name="keterangan" id="keterangan" style="width: 100%" rows="5"></textarea>
                    </div>
                </div>
            </div> 
            <div class="form-group text-right mr-4">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
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