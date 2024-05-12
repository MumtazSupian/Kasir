<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"/>
    </head>
    <body>
        <style>
            body{
                width : 100%;
                height : 680px;
            }
            .card{
                width: 30%;
            }
        </style>
        <div class="container card d-flex flex-column mt-5 pb-3" style="align-items: center;">
        <?php
        session_start();
        $jumlahBayar = 0;
        $totalHarga = $_SESSION['totalHarga'];
        $i = 0;
        if(isset($_SESSION['lembaran'])){
            $jumlahBayar = $_SESSION['lembaran'];
        } else{
            $jumlahBayar = $totalHarga;
        }
        echo "<table class='table table-hover table-responsive{-sm|-md|-lg|-xl|-xxl}'>";
        foreach($_SESSION['dataBarang'] as $index=>$value){
        $i++;
        echo "<tr>";
        echo "<td>" . $i . "</td>";
        echo "<td>" . $value['barang'] . "</td>";
        echo "<td class='text-end'>" . $value['jumlah'] . "</td>";
        echo "<td class='text-end'>" . $value['harga'] . "</td>";
        echo "<td class='text-end'>" .  ($value['harga'] * $value['jumlah']) . "</p>";
        echo "</tr>";
    }
    ?>
    </table>
    <table class='table'>
    <tr>
    <td colspan="5">Total Pembayaran</td>
    <td class='text-end'><?php echo $totalHarga?></td>
    <tr>
    <tr>
    <td colspan="5">Total Uang</td>
    <td class='text-end'><?php echo $jumlahBayar?></td>
    <tr>
    <tr>
    <td colspan="5">Kembalian</td>
    <td class='text-end'><?php echo $jumlahBayar - $totalHarga?></td>
    <tr>
    </table>
    <?php
        if(isset($_POST['destroy'])){
            session_destroy();
            header('location:   '. 'utama.php');
        }
    ?>
    <table class="text-align table-responsive{-sm|-md|-lg|-xl|-xxl}">
        <tr>
        <td>Terimakasih Sudah Belanja di GabutMart! </td>
        <tr>
        </table>
        <form method="post" action="">
        <button class="btn btn-primary mt-3" type="submit" name="destroy">Kembali Ke Halaman</button>
    </form>
    </div>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
        </script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
        </script>
    </body>
</html>