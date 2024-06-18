<?php

$npm = '';
$nilai = '';
$ulangi = 0;
$huruf_mutu = '';


 if(isset($_POST["submit"])){
    $npm = $_POST["npm"];
    $nilai = $_POST["nilai"];
    $ulangi = $_POST["bilangan"];

    if($nilai >= 85){
        $huruf_mutu = "A";
    }else if($nilai >=75){
        $huruf_mutu = "B";
    }else if($nilai >= 65){
        $huruf_mutu = "C";
    }else{
        $huruf_mutu = "E";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan Pertemuan 7</title>
    <link href="./library/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="assets/styles.css" rel="stylesheet" media="screen">
</head>
<body>

              <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left mt-4" >Input Nilai</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
                                     <form action="" method="POST" class="form-horizontal">
                                      <fieldset>

                                        <legend>Form Nilai Mahasiswa</legend>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Masukann NPM</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" id="focusedInput" type="number" name="npm">
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Masukan Nilai</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" id="focusedInput" type="number" name="nilai">
                                          </div>
                                        </div>
                                        <div class="control-group">
                                          <label class="control-label" for="focusedInput">Ulangi</label>
                                          <div class="controls">
                                            <input class="input-xlarge focused" id="focusedInput" type="number" name="bilangan">
                                          </div>
                                        </div>
                                        <div class="form-actions">
                                          <button type="submit" name="submit" class="btn btn-primary">Proses</button>
                                          <button type="reset" class="btn">Cancel</button>
                                        </div>
                                      </fieldset>
                                    </form>

                                </div>
                            </div>
                        </div>


                        <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Data Nilai</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<table class="table">
                          <thead>
                                <tr>
                                    <th>Data Nilai Mahasiswa</th>
                                </tr>
                          </thead>
						              <tbody>
                            <?php
                             for ($i=1;$i<=$ulangi;$i++){
                             ?>
              		                <tr>
                                  <td>
                                      <?php echo $npm." Nilai akhir yang didapatkan oleh Anda adalah ".$huruf_mutu ; ?>
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
</body>
</html>