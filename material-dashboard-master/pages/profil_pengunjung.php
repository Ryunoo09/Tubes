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
                        $datapengunjung = $db->tampil_profil($username);
                        if ($datapengunjung == "Isi data diri Anda") {
                            echo '<tr><td colspan="10" >Harap Lengkapi Data Diri Anda</td></tr>';
                        }
                        
                        else {
                        foreach ($db->tampil_profil($username) as $x){
                        ?>

        <div class="container emp-profile">
            <form method="post">
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
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile" formaction="edit_profil.php"/>
                    </div>

                </div>


                <div class="row mb-3">
                   
                </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Username</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $x['username']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $x['nama_pengunjung']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $x['email']; ?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Jenis Kelamin</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $x['jenis_kelamin']; ?></p>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Tanggal Lahir</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $x['tanggal_lahir']; ?></p>
                                            </div>
                                        </div>
                                            

                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Phone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $x['phone']; ?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Alamat</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $x['alamat']; ?></p>
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