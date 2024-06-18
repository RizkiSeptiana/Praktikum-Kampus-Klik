<?php
include_once('connect.php');

if (isset($_POST['submit'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $program_studi = $_POST['program_studi'];

    $query = mysqli_query($connect, "INSERT INTO data VALUES(
        '$npm', '$nama', '$program_studi')") or die(mysqli_error($connect));


    if ($query) {
        echo
        "<script>
            alert('Data mahasiswa berhasil ditambahkan')
            window.location.href = 'index.php'
        </script>";
    } else {
        echo
        "<script>
            alert('Data mahasiswa gagal ditambahkan')
            window.location.href = 'index.php'
        </script>";
    }
}
