<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Kalkulator BMI</title>
  </head>
  <body>
    <div class="container d-flex justify-content-center mt-4">
        <div class="card shadow" style="width:18rem">
            <div class="card-body">
                <form action="">
                    <div class="for-group">
                        <label for="">Tinggi Badan(cm)</label>
                        <input type="text" class="form-control" name="tinggibadan" required>
                    </div>
                    <div class="for-group">
                        <label for="">Berat Badan(kg)</label>
                        <input type="text" class="form-control" name="beratbadan" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-sm" name="hitung">Hitung</button>
                </form>
            </div>
    <?php
        if (isset($_GET['hitung'])) {
            $tinggibadan = $_GET['tinggibadan'];
            $beratbadan = $_GET['beratbadan'];

            $tbhasil = $_GET['tinggibadan']/100;
            $bobot = $beratbadan / ($tbhasil * $tbhasil);

            if($bobot <= 18.5) {
                echo'
                    <div class="card-footer">
                        <div class="alert alert-primary alert-dismissible fade show" role="alert">
                            Tinggi Badan(cm) : <b>'.$tinggibadan.' cm</b><br>
                            Berat Badan(kg)  : <b>'.$beratbadan.' kg</b><br>
                            Bobot            : <b>'.number_format($bobot,1).'</b><br>
                             Keterangan       : <b> Berat Badan Kurang</b>
                             <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                         </div>
                    </div>
                '; 
            }elseif($bobot <= 25) {
                    echo'
                        <div class="card-footer">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                 Tinggi Badan(cm) : <b>'.$tinggibadan.' cm</b><br>
                                 Berat Badan(kg)  : <b>'.$beratbadan.' kg</b><br>
                                 Bobot            : <b>'.number_format($bobot,1).'</b><br>
                                 Keterangan       : <b> Berat Badan Normal</b>
                                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                             </div>
                        </div>
                        
                    ';
                }elseif($bobot <= 30) {
                    echo'
                        <div class="card-footer">
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                Tinggi Badan(cm) : <b>'.$tinggibadan.' cm</b><br>
                                Berat Badan(kg)  : <b>'.$beratbadan.' kg</b><br>
                                Bobot            : <b>'.number_format($bobot,1).'</b><br>
                                 Keterangan       : <b> Berat Badan Berlebih</b>
                                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                             </div>
                        </div>
                        
                    ';  
                }elseif($bobot > 30) {
                    echo'
                        <div class="card-footer">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                Tinggi Badan(cm) : <b>'.$tinggibadan.' cm</b><br>
                                Berat Badan(kg)  : <b>'.$beratbadan.' kg</b><br>
                                Bobot            : <b>'.number_format($bobot,1).'</b><br>
                                 Keterangan       : <b> Obesitas</b>
                                 <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                             </div>
                        </div>
                        
                    ';        
            }
        }
    ?>
</div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>