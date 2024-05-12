<!DOCtYPE html>
<html lang="en">
    <head>
        <title>Title</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    </head>

    <body>
    <?php
    session_start();
        $totalHarga = $_SESSION['totalHarga'];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $lembaran = $_POST['lembaran'];
            $jumlahLembaran = $_POST['jumlahLembaran'];
        }if(isset($_POST['lembaran'])){
            $hasil= 0;
            echo $lembaran;
            if($lembaran == 100000){
                $hasil = 100000 * $jumlahLembaran;
                $_SESSION['lembaran'] = $hasil;
            }else if($lembaran == 50000){
                $hasil = 50000 * $jumlahLembaran;
                $_SESSION['lembaran'] = $hasil;
            }else if($lembaran == 20000){
                $hasil = 20000 * $jumlahLembaran;
                $_SESSION['lembaran'] = $hasil;
            }else {
                $hasil = 10000 * $jumlahLembaran;
                $_SESSION['lembaran'] = $hasil;
            }
            header('location:   '. 'struk.php');
        }

        //memasukan list lembaran uang ke array
        $listLembaran = [10000];
        if($totalHarga >= 100000) {
            array_push($listLembaran,100000);
        }
        if($totalHarga >= 50000) {
            array_push($listLembaran,50000);
        }
        if($totalHarga >= 20000) {
            array_push($listLembaran,20000);
        }
        ?>
        <form method="POST" action="" class="">
            <div class="container d-flex flex-column mt-5">
            <label for="cash">Pembayar Uang Tunai</label>
            <select name="lembaran" class="form-control mt-3" id="lembaran" placeholder="Lembaran Uang">
                <option value="none" disabled selected>Pilih Pecahan Uang</option>
                <?php 
                foreach($listLembaran as $lembaran) {
                echo '<option value="'.$lembaran. '" name='.$lembaran.'> Rp.'.number_format($lembaran,2).'</option>';
                } 
                ?>
            </select>
            <input type="number" class="form-control mt-3" name="jumlahLembaran" placeholder="Input Jumlah Lembaran" required>
            <button type="submit" class="btn btn-primary mt-2" name="bayarCash">Bayar</button>
        </div>
        </form>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous">
        </script>
        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous">
        </script>
    </body>
</html>