<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kasir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <style>
    </style>
    
    <h1 class='text-center dancing-script mt-5'>Masukkan Data Barang</h1>
    <div class="container mt-4" style="width: 60%; height: 100%">
    <form action="" method="post">
        <div class="box mb-3">            
   <label for="barang">Nama Barang</label>
            <input type="text" name="barang" id="barang" class="form-control" placeholder="Input Nama Barang">
            <label for="jumlah">Jumlah Barang</label>
            <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Input Nama Jumlah">
            <label for="harga">Harga Barang</label>
            <input type="number" name="harga" id="harga" class="form-control" placeholder="Input Harga Barang">
        </div>
        <button type="submit" class='btn btn-primary' name="total">Tambah</button>
        <button type="submit" class='btn btn-danger' name="reset">Reset</button>
    </form>

    <?php
    session_start();
    if(!isset($_SESSION['dataBarang'])){
        $_SESSION['dataBarang'] = array();
    }
    if(isset($_POST['reset'])){
        session_unset();
        header('Location: '. $_SERVER['PHP_SELF']);
        exit;
    }
    if(isset($_GET['hapus'])){
        $index = $_GET['hapus'];
        unset($_SESSION['dataBarang'][$index]);
    }
    if(isset($_POST['total'])){
        if(@$_POST['barang'] && @$_POST['harga'] && @$_POST['jumlah']){
            $data = [
                'barang' => $_POST['barang'],
                'harga' => $_POST['harga'],
                'jumlah' => $_POST['jumlah'],
            ];
            array_push($_SESSION['dataBarang'], $data);
            header('Location: '. $_SERVER['PHP_SELF']);
        exit;
        }
    }
    if(!empty($_SESSION['dataBarang'])){
        echo "<table class='table table-bordered mt-5'>";
        echo "<tr>";
        echo "<th>" . "No" . "</th>";
        echo "<th>" . "Harga" . "</th>";
        echo "<th>" . "Jumlah" . "</th>";
        echo "<th>" . "Total" . "</th>";
        echo "<th>" . "Cancel Barang" . "</th>";
        echo "<tr>";
        $i = 0;
        $totalHarga = 0;
        foreach($_SESSION['dataBarang'] as $index=>$value){
            $i++;
            echo "<tr>";
            echo "<td>" . $i . "</td>";
            echo "<td>" .  $value['barang'] . "</td>";
            echo "<td class='text-end'>" .  $value['harga'] . "</td>";
            echo "<td class='text-end'>" .  $value['jumlah'] . "</td>";
            echo "<td class='text-end'>" .  ($value['harga'] * $value['jumlah']) . "</td>";
            $totalHarga += $value['harga'] * $value['jumlah'];
            echo '<td><a class="link-offset-2 link-underline link-underline-opacity-0 btn btn-danger" href="?hapus=' . $index . '" class="hapus">CANCEL</a>' . "<br>" . "</td>";
            echo "</tr>";
            }   
            echo "<tr>";
            echo "<th colspan='4'>Total Harga</th>";
            echo "<th>" . $totalHarga . "</th>";
            echo "<th></th>";
            echo "<tr>";
            echo "<table>";
            echo "<a href='pembayaran.php'><button class='btn btn-primary' type='submit' name='bayar'>Bayar</button></a>";
            echo "</table>";
            $_SESSION['totalHarga'] = $totalHarga;
        }
        echo "</table>";
    ?>
</div>

<!-- BOOTSTRAP SCRIPT -->
</body>
</html>