<?php
include_once('./connect.php');

$npm = $_GET['npm'];

$get_mahasiswa = mysqli_query($connect, "SELECT * FROM data WHERE npm=$npm");

$mahasiswa_yang_diedit = mysqli_fetch_assoc($get_mahasiswa);

if (isset($_POST['submit'])) {
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $program_studi = $_POST['program_$program_studi'];

    $query = mysqli_query($connect, "UPDATE data SET npm='$npm', nama='$nama', program_studi='$program_studi' WHERE npm='$npm'");

    if ($query) {
        echo
        "<script>
            alert('Data mahasiswa berhasil diperbarui')
            window.location.href = 'index.php'
        </script>";
    } else {
        echo
        "<script>
            alert('Data mahasiswa gagal diperbarui')
            window.location.href = 'index.php'
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Form Update Staff</title>
</head>

<body>
    <div class="container py-3">
        <h1>Form Update Data Mahasiswa</h1>

        <form method="POST">
        <div class="mb-3">
            <label class="form-label" for="npm">Nama</label>
            <input type="text" name="npm" class="form-control" value="<?php echo $mahasiswa_yang_diedit['npm'] ?>">
        </div>
        
        <div class="mb-3">
            <label class="form-label" for="nama">ISBN</label>
            <input type="text" name="nama" class="form-control" value="<?php echo $mahasiswa_yang_diedit['nama'] ?>">
        </div>
        
        <div class="mb-3">
            <label class="form-label" for="program_studi">Program Studi</label>
            <input type="text" name="program_studi" class="form-control" value="<?php echo $mahasiswa_yang_diedit['program_studi'] ?>">
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary">Edit Data Mahasiswa</button>
        </form>
        
        <br>
        <a href="./index.php"><button type="button" class="btn btn-secondary">Kembali</button>
</a>
    </div>
</body>

</html>