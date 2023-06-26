<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maple Calculator</title>
    <link rel="icon" href="./index-assets/maple.png" type="image/x-icon">
    <link rel="stylesheet" href="./calcu-assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="./calcu-assets/css/aos.css">
    <link rel="stylesheet" href="./calcu-assets/css/line-awesome.min.css">
    <link rel="stylesheet" href="./calcu-assets/css/style.css">
</head>

<body data-bs-spy="scroll" data-bs-target=".navbar">

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container flex-lg-column">
            <a class="navbar-brand mx-lg-auto mb-lg-4" href="#">
                <img src="https://images.unsplash.com/photo-1623039925595-bb30257f6717?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=687&q=80" class="d-none d-lg-block rounded-circle" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto flex-lg-column text-lg-center">

                    <li class="nav-item">
                        <a class="nav-link" href="index.php"><-      m Back</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#calcu">Calculator Tools</a>
                    </li>
                    <?php if( isset($_POST["submit"]) ) : ?>
                        <li class="result nav-item">
                        <a class="nav-link" href="#result">Result</a>
                    </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>
    <div id="content-wrapper">

    <section id="ld-page" class="full-height px-lg-5">

            <div class="container">
                <div class="row">
                    <div class="col-lg-10">
                        <h1 class="display-4 fw-bold" data-aos="fade-up">Welcome To <span class="text-brand">M-Calc</span> For Calculate Protein, Calori, And Bodyfat</h1>
                        <p class="lead mt-2 mb-4" data-aos="fade-up" data-aos-delay="300">This Website Created By Maple Team, For Helping People Diet/Bulking</p>
                        <div data-aos="fade-up" data-aos-delay="600">
                            <a href="index.php#team" class="btn btn-brand me-3">Our Team</a>
                            <a href="index.php#contact" class="link-custom">Have A Problem?</a>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    <section id="calcu" class="full-height px-lg-5">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-8 pb-4" data-aos="fade-up">
                        <h6 class="text-brand">Calculator</h6>
                        <h1>About Tools Calculator
                        </h1>
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        <form action="" method="post" class="row g-lg-3 gy-3">
                            
                        <div class="form-group col-md-12" >
                        <select class="form-select" name="gender">
		                        <option value="none" selected>Jenis Kelamin</option>
		                        <option value="Laki" class="text-white">Laki</option>
		                        <option value="Perempuan" class="text-white">Perempuan</option>
	                        </select>
                        </div>
                           
                            <div class="form-group col-md-6">
                                <input type="number" class="form-control" name="berat" placeholder="Masukkan Berat Badan">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="number" class="form-control"  name="tinggi" placeholder="Masukkan Tinggi Badan">
                            </div>
                            <div class="form-group col-12">
                                <input type="number" class="form-control" name="usia" placeholder="Masukkan Usia">
                            </div>
                            <div class="input-group mb-3">
                                <label class="input-group-text" for="inputGroupSelect01">Aktivitas</label>
                                        <select class="form-select" id="inputGroupSelect01" name ="Aktivitas">
                                            <option value="none"selected>Pilih Sesuai Aktivitas</option>
                                            <option value="Normal">Hanya Ingin Mengetahui</option>
                                            <option value="Diet">Menurunkan Berat Badan (Diet)</option>
                                            <option value="Bulking">Menaikkan Berat Badan Normal (Bulking)</option>
                                            <option value="DBulking">Menaikkan Berat Badan Secara Agresif (Dirty Bulking)</option>
                                        </select>
                            </div>
                            <div class="form-group col-12 d-grid">
                                <button onclick="window.location.href = '#result';" name="submit" type="submit" href="#result" class="btn btn-brand">Calculate</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    </section>

        <?php if( isset($_POST["submit"]) && $_POST["berat"] != null && $_POST["tinggi"] != null && $_POST["usia"] != null && $_POST["berat"] > 0 && $_POST["tinggi"] > 0 && $_POST["usia"] > 0 && $_POST['gender'] != "none" && $_POST['Aktivitas'] != "none") : ?>
        <?php
        $beratNum = $_POST["berat"];
        $tinggiNum = $_POST['tinggi'];
        $usiaNum = $_POST['usia'];
        $gender = $_POST['gender'];
        $Aktivitas = $_POST['Aktivitas'];
       if($gender == "Laki"){
        $hasilKalori = (88 + 13 * $beratNum) + (5 * $tinggiNum) - (6 * $usiaNum);
        $hasilProtein = $beratNum * 2;
        $tinggiMod = $tinggiNum / 100;
        $hasilFat = (1 * ($beratNum/$tinggiMod)) - (11 * 1) - 6;
        $intHasilFat = intval($hasilFat);
        
        $percent = ($hasilKalori / 100) * 15;
        $Bpercent = ($hasilKalori / 100) * 25;
        if($Aktivitas == "Diet"){
            $hasilKalori = $hasilKalori - 400;
        }elseif ($Aktivitas == "Bulking"){
$hasilKalori = $hasilKalori + $percent;
        }elseif($Aktivitas == "DBulking"){
            $hasilKalori = $hasilKalori + $Bpercent;
        }
        $intHasilKal = intval($hasilKalori);
        $strHasilFat = strval($intHasilFat);
        $strHasilPro = strval($hasilProtein);
        $strHasil = strval($intHasilKal);
       }else if($gender == "Perempuan"){
        $hasilKalori = (448 + 9 * $beratNum) + (3 * $tinggiNum) - (4 * $usiaNum);
        $hasilProtein = $beratNum * 2;
        $tinggiMod = $tinggiNum / 100;
        $hasilFat = (1 * ($beratNum/$tinggiMod)) - (11 * 0) - 6;
        $intHasilFat = intval($hasilFat);
        $percent = ($hasilKalori / 100) * 15;
        $Bpercent = ($hasilKalori / 100) * 25;
        if($Aktivitas == "Diet"){
            $hasilKalori = $hasilKalori - 400;
        }elseif ($Aktivitas == "Bulking"){
$hasilKalori = $hasilKalori + $percent;
        }elseif($Aktivitas == "DBulking"){
            $hasilKalori = $hasilKalori + $Bpercent;
        }
        $intHasilKal = intval($hasilKalori);
        $strHasilFat = strval($intHasilFat);
        $strHasilPro = strval($hasilProtein);
        $strHasil = strval($intHasilKal);
       }
        ?>

<section id="result" class="full-height px-lg-5">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-8 pb-4" data-aos="fade-up">
                    <h6 class="text-brand">Berikut ini adalah hasil</h6>
                    <h1>Maple Calculator</h1>
                    
                    

                    <div class="row">
  <div class="col-sm-4 text-center mt-5">
    <div class="card" style="background-color: #161E2F;">
      <div class="card-body">
      <div class="card-header" style="background-color: #161E2F;">
      Jumlah Kalori
  </div>
        <h2 class="card-title" ><?= $strHasil; ?> Kalori</h2>
        <p class="card-text">Di atas adalah jumlah kalori yang anda perlukan dalam sehari.</p>
        <a href="#" class="btn btn-primary">Go Back</a>
      </div>
    </div>
  </div>
  <div class="col-sm-4 text-center mt-5">
    <div class="card" style="background-color: #161E2F;">
    <div class="card-header">
    Jumlah Protein
  </div>
      <div class="card-body">
        <h2 class="card-title"><?= $strHasilPro; ?> Gram</h2>
        <p class="card-text">Di atas adalah jumlah protein yang anda perlukan dalam sehari.</p>
        <a href="#" class="btn btn-primary">Go Back</a>
      </div>
    </div>
  </div>

  <div class="col-sm-4 text-center mt-5">
    <div class="card" style="background-color: #161E2F;">
    <div class="card-header">
    Body Fat
  </div>
      <div class="card-body">
        <h2 class="card-title"><?= $strHasilFat; ?>%</h2>
        <p class="card-text">Di atas adalah jumlah persentase lemak yang ada di tubuh anda.</p>
        <a href="#" class="btn btn-primary">Go Back</a>
      </div>
    </div>
  </div>
</div>

                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        </div>
                        </div>
                        </div>
                        </section>
                       
        <?php endif; ?>
        <?php if( isset($_POST["submit"]) && (($_POST["berat"] == null || $_POST["tinggi"] == null || $_POST["usia"] == null || $_POST["berat"] < 1 || $_POST["tinggi"] < 1 || $_POST["usia"] < 1) || ($_POST["gender"] == "none" || $_POST["Aktivitas"] == "none"))) : ?>
            <section id="result" class="full-height px-lg-5">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-8 pb-4" data-aos="fade-up">
                    <h6 class="text-brand">Errow Count!</h6>
                    <h1>Tolong Masukan Data Yang Benar!</h1>
                        
                    </div>
                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                        </div>
                        </div>
                        </div>
                        </section>
            <?php endif; ?>
        
        <footer class="py-5 px-lg-5">
            <div class="container">
                <div class="row gy-4 justify-content-between">
                    <div class="col-auto">
                        <p class="mb-0">Created By <a href="#" class="fw-bold">MAPLE TEAM</a></p>
                    </div>
                </div>
            </div>
        </footer>

    </div>



    <script src="./calcu-assets/js/bootstrap.bundle.min.js"></script>
    <script src="./calcu-assets/js/aos.js"></script>
    <script src="./calcu-assets/js/main.js"></script>
</body>

</html>