<?php

require "session.php";
require "../koneksi.php";

$queryKategori = mysqli_query($con, "SELECT * FROM kategori");
$jumlah_kategori = mysqli_num_rows($queryKategori);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../fontawesome/css/fontawesome.min.css">
</head>

<style>
    .no-decoration {
        text-decoration: none;
    }
</style>

<body>
    <?php require "navbar.php"; ?>
    <div class="container mt-5">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active" aria-current="page">
                    <a href="../adminpanel" class="no-decoration text-muted">
                        <i class="fas fa-home"></i>Home</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    <i class="fa-solid fa-list"></i>kategori
                </li>
            </ol>
        </nav>

        <div class="my-5 col-12 col-md-6">
            <h3>Tambah Kategori</h3>

            <form method="post">
                <div>
                    <label for="kategori">kategori</label>
                    <input type="text" id="kategori" name="kategori" placeholder="tambahkan Kategori" class="form-control">
                </div>
                <div class="mt-3">
                    <button class="btn btn-primary" type="submit" name="simpanKategori">Simpan</button>
                </div>
            </form>

           <?php
           if(isset($_POST['simpanKategori'])){
            $kategori = htmlspecialchars($_POST['kategori']);

            $queryExist = mysqli_query($con, "SELECT nama FROM kategori WHERE kategori='$kategori'");

            $jumlahDataKategoriBaru = mysqli_num_rows($queryExist);
            echo $jumlahDataKategoriBaru;
           }
           ?>

        </div>


        <div class="mt-3">
            <h2>List kategori</h2>
            <div class="table-responsive mt-5 shadow">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($jumlah_kategori == 0) {
                        ?>

                            <tr>
                                <td colspan="3" class="text-center">Data Kategori tidak ada</td>
                            </tr>
                            <?php
                        } else {
                            $number = 1;
                            while ($data = mysqli_fetch_array($queryKategori)) {
                            ?>
                                <tr>
                                    <td><?php echo $number; ?></td>
                                    <td><?php echo $data['nama']; ?></td>
                                    <td></td>
                                </tr>
                        <?php
                            } 
                            $number++;
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>




    <script src="../bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../fontawesome/js/all.min.js"></script>
</body>

</html>