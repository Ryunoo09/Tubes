<?php
session_start();
$username = $_SESSION['username'];
include "../../Hotel-Website-Template-master/config.php";
$db = new Database();
foreach ($db->login($username) as $x) {
    $akses_id = $x['akses_id'];
    if ($akses_id == '2') {
        ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <!-- Bootstrap CSS -->
     <link rel="stylesheet" href="../assets/css/bootstrap.min.css" crossorigin="anonymous">
    <script src="../assets/js/core/bootstrap.min.js" crossorigin="anonymous"></script>
    <script src="../assets/js/core/jquery.min.js" crossorigin="anonymous"></script>
    <title>Contoh PHP dengan CSS</title>
    <link rel="stylesheet" href="profil.css">
</head>
<body>
<?php 
            include 'menu_pengunjung.html'; 
            $db = new Database();
            ?>


<?php
                        $no = 1;
                        foreach ($db->tampil_profil($username) as $x){
                        ?>

        <div class="container emp-profile">
            <form method="post" enctype="multipart/form-data">
                <div class="row">
                <div class="col-md-4">
                    <div class="profile-img">
                    <?php
                                if (empty($x['foto_profil'])) {
                                ?>
                                    <font color="red">Belum ada foto_profil</font>
                                <?php
                                } else {
                                    // Mendapatkan path lengkap dari foto_profil dalam direktori
                                    // Gantilah "foto_profil" dengan nama kolom foto_profil sesuai dengan struktur tabel Anda
                                    $foto_profil = '../../Hotel-Website-Template-master/' . $x['foto_profil'];
                                ?>
                                    <img src="<?php echo $foto_profil; ?>" alt="" width="210" height="105">
                                <?php    
                                }
                                ?>

                        <div class="file btn btn-lg btn-primary">
                            Change Photo
                            <input type="file" name="foto_profil" accept="image/jpeg"/>
                        </div>
                    </div>
                </div>

                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                    <?php echo $x['nama_pengunjung']; ?>
                                    </h5>
                                    <h6>
                                    <?php echo $x['username']; ?>
                                    </h6>
                                    
                            
                        </div>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Submit" formaction="../../Hotel-Website-Template-master/simpan_edit_profil.php"/>
                    </div>

                </div>
                <div class="row">
                   
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="row">
                                    <div class="col-md-6">
                                        <label for="username">Username</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $x['username']; ?></p>
                                        <!-- Menyimpan nilai username sebagai input tersembunyi -->
                                        <input type="hidden" name="username" value="<?php echo $x['username']; ?>">
                                    </div>
                                </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="nama_pengunjung">Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $x['nama_pengunjung']; ?></p>
                                                <input type="hidden" name="nama_pengunjung"  value="<?php echo $x['nama_pengunjung']; ?>">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="email">Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="email" name="email" class="form-control" value="<?php echo $x['email']; ?>">
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                            </div>
                                            <div class="col-md-6">
                                                <select name="jenis_kelamin" class="form-control">
                                                    <option value="laki-laki" <?php echo ($x['jenis_kelamin'] == 'laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                                                    <option value="perempuan" <?php echo ($x['jenis_kelamin'] == 'perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="date" name="tanggal_lahir" class="form-control" value="<?php echo $x['tanggal_lahir']; ?>">
                                            </div>
                                        </div>

                                            

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="phone">Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="tel" name="phone" class="form-control" value="<?php echo $x['phone']; ?>">
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label for="alamat">Alamat</label>
                                            </div>
                                            <div class="col-md-6">
                                                <textarea name="alamat" class="form-control"><?php echo $x['alamat']; ?></textarea>
                                            </div>
                                        </div>


                                       
                          
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
        </body>


        <?php
                        }
                        ?>

</html>

<?php
} else {
echo "Anda belum login";
header("Location: login.php");
}
}
?>