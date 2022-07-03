<?php
    if (!defined('INDEX')) die("");

    $query = mysqli_query($conn, "SELECT * FROM pegawai WHERE id_pegawai='$_GET[id]'");
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
        <h3 class="m-0 font-weight-bold text-primary">Edit Pegawai</h3>
      </div>
    </div>
    <div class="card-body">

        <form action="?hal=pegawai_update" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?=$data['id_pegawai']?>">
            <div class="form-group">
                <div class="row">
                    <div class="input col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label for="foto">Foto</label>
                    </div>
                    <div class="input col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <img src="images/<?=$data ['foto']?>" width="150">
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
                        <input type="text" id="nama" name="nama" class="form-control" value="<?=$data['nama_pegawai']?>">
                    </div>
                </div>
            </div> 
            <div class="form-group">
                <div class="row">
                    <div class="input col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label for="jk">Jenis Kelamin</label>
                    </div>
                    <?php
                        if ($data['jenis_kelamin'] == "L") {
                            $l = "checked";
                            $p = "";
                        } else {
                            $l = "";
                            $p = "checked";
                        }
                    ?>
                    <div class="input col-lg-6 col-md-6 col-sm-12 col-xs-12">
                        <input type="radio" id="jk" name="jk" value="L" <?=$l ?>> Laki-laki
                        <input type="radio" name="jk" id="jk" class="ml-4" value="P" <?=$p ?>> Perempuan
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="row">
                    <div class="input col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <label for="tanggal">Tanggal Lahir</label>
                    </div>
                    <div class="input col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <input type="date" id="tanggal" name="tanggal" class="form-control" value="<?= $data['tgl_lahir']?>">
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
                                while ($j = mysqli_fetch_array($queryjabatan)) {
                                    echo "<option value='$j[id_jabatan]'";
                                    if ($j['id_jabatan'] == $data['id_jabatan']) echo "selected";
                                    echo ">$j[nama_jabatan]</option>";
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
                        <textarea class="form-control" name="keterangan" id="keterangan" style="width: 100%" rows="5"><?= $data['keterangan'] ?></textarea>
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









<!-- <h2 class="judul">Tambah Pegawai</h2>
<form method="post" action="?hal=pegawai_update" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?=$data['id_pegawai']?>">
    <div class="form-group">
        <label for="foto">Foto</label>
        <div class="input">
            <input type="file" id="foto" name="foto">
            <img src="images/<?=$data ['foto']?>" width="150">
        </div>
    </div>
    <div class="form-group">
        <label for="nama">Nama</label>
        <div class="input">
            <input type="text" id="nama" name="nama" value="<?=$data['nama_pegawai']?>">
        </div>
    </div>
    <div class="form-group">
        <label for="jk">Jenis Kelamin</label>
        <?php
            if ($data['jenis_kelamin'] == "L") {
                $l = "checked";
                $p = "";
            } else {
                $l = "";
                $p = "checked";
            }
        ?>
        <input type="radio" id="jk" name="jk" value="L" <?=$l ?>>Laki-laki
        <input type="radio" name="jk" id="jk" value="P" <?=$p ?>>Perempuan
    </div>
    <div class="form-group">
            <label for="tanggal">tanggal</label>
            <div class="input">
                <input type="date" id="tanggal" name="tanggal" value="<?= $data['tgl_lahir']?>">
            </div>
    </div>
    <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <div class="input">
                <select name="jabatan" id="jabatan">
                    <option value=""> -Pilih Jabatan- </option>
                    <?php
                        $queryjabatan = mysqli_query($conn, "SELECT * FROM jabatan");
                        while ($j = mysqli_fetch_array($queryjabatan)) {
                            echo "<option value='$j[id_jabatan]'";
                            if ($j['id_jabatan'] == $data['id_jabatan']) echo "selected";
                            echo ">$j[nama_jabatan]</option>";
                        }
                    ?>
                </select>
            </div>
    </div>
    <div class="form-group">
        <label for="keterangan">Keterangan</label>
        <div class="input">
            <textarea name="keterangan" id="keterangan" style="width: 100%" rows="5"><?= $data['keterangan'] ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <input type="submit" value="Simpan" class="tombol simpan">
        <input type="reset" value="Batal" class="tombol reset">
    </div>
</form> -->