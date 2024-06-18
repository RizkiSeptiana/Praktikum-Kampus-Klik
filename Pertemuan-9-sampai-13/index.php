<?php
include_once ("tampilkan_mahasiswa.php");
include_once ("connect.php");
if(isset($_POST["cari"])){

    $npm = $_POST["npm"];

    if(intval($npm)){
        if(strlen($npm)==13){
            echo "<script>
             alert('inputan anda benar')
             </script>";
         }
        else if(strlen($npm)>13){
            echo "<script>
                 alert('inputan anda benar, namun digit npm lebih dari 13')
                </script>";
        }else{
             echo "<script>
            alert('inputan anda benar, namun digit npm kurang dari 13')
            </script>";
    }
    }else{
       echo "<script>alert('inputan npm harus angka')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="library/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="library/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
    <link href="library/assets/styles.css" rel="stylesheet" media="screen">

    <title>Pertemuan 9</title>
</head>

<body>
    <div class="navbar navbar-inner block-header">
    <div class="muted pull-left"><h1>Data Mahasiswa Informatika</h1></div>
    </div>
    <!--/span-->
    <div class="span9" id="content">
        <!-- morris stacked chart -->
        <div class="row-fluid">
            <!-- block -->
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Data Mahasiswa</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <form class="form-horizontal" action="tambah_mahasiswa.php" method="POST">
                            <fieldset>
                                <legend>Input Data Mahasiswa</legend>
                                <div class="control-group">
                                    <label class="control-label" for="focusedInput">NPM</label>
                                    <div class="controls">
                                        <input class="input-xlarge focused" type="text" id="npm" name="npm">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="focusedInput">Nama</label>
                                    <div class="controls">
                                        <input class="input-xlarge focused" type="text" id="nama" name="nama">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="focusedInput">Program Studi</label>
                                    <div class="controls">
                                        <input class="input-xlarge focused" type="text" id="program_studi" name="program_studi">
                                    </div>
                                </div>

                                <div class="form-actions">
                                    <button name="submit" type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <!-- block -->
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Data Mahasiswa</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>NPM</th>
                                    <th>Nama</th>
                                    <th>Program Studi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                while ($data = mysqli_fetch_assoc($proses)) {
                                ?>
                                    <tr>
                                        <td><?= $data['npm'] ?></td>
                                        <td><?= $data['nama'] ?></td>
                                        <td><?= $data['program_studi'] ?></td>
                                        <td>
                                            <p>
                                                <a href="edit_mahasiswa.php?npm=<?= $data['npm'] ?>">
                                                    <button class="btn btn-info">Edit</button>
                                                </a>
                                                <a href="hapus_mahasiswa.php?npm=<?= $data['npm'] ?>">
                                                    <button class="btn btn-danger">Hapus</button>
                                                </a>
                                            </p>
                                        </td>
                                    </tr>

                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /block -->
        </div>
    </div>

    <div class="span9" id="content">
        <!-- morris stacked chart -->
        <div class="row-fluid">
            <!-- block -->
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Pencarian Data</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <form class="form-horizontal" action="" method="POST">
                            <fieldset>
                                <legend>Input Data Mahasiswa</legend>
                                <div class="control-group">
                                    <label class="control-label" for="focusedInput">NPM</label>
                                    <div class="controls">
                                        <input class="input-xlarge focused" type="text" id="npm" name="npm">
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <button name="cari" type="submit" class="btn btn-primary">Cari</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row-fluid">
            <!-- block -->
            <div class="block">
                <div class="navbar navbar-inner block-header">
                    <div class="muted pull-left">Data Mahasiswa Ditemukan</div>
                </div>
                <div class="block-content collapse in">
                    <div class="span12">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>NPM</th>
                                    <th>Nama</th>
                                    <th>Program Studi</th>
                                </tr>
                            </thead>
                            <body>     
                                 <?php
                                    $query = "";
                                    if(isset($_POST["cari"])){
                                    $cari = $_POST["npm"];
                                    $query = mysqli_query($connect,"SELECT * FROM data WHERE npm like '%".$cari."%'");
                                    }else{
                                        $data = mysqli_query($connect,"SELECT * FROM data");
                                    }
                                    if(isset($_POST["cari"])){
                                        while($dicari = mysqli_fetch_array($query)){
                                        ?>
                                        <tr>
                                            <td><?php echo $dicari["npm"];?></td>
                                            <td><?php echo $dicari["nama"];?></td>
                                            <td><?php echo $dicari["program_studi"];?></td>
                                        </tr>   
                                        <?php }}?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /block -->
        </div>
       
    </div>

</body>

</html>