<?php
    if (!defined('INDEX')) die("");

    $query = mysqli_query($conn, "DELETE FROM jabatan WHERE id_jabatan = '$_GET[id]'");
    if ($query) {
        echo "Data berhasil dihapus!";
        echo "<meta http-equiv='refresh' content='1;url=?hal=jabatan'>";
    } else {
        echo "Tidak dapat mentimpan data!<br>";
        echo mysqli_error();
    }
?>