<?php 
include 'includes/header.php';
include 'function/config.php';
session_start();

if(!isset($_SESSION["username"])) {
    header("Location: login and register/register_page.php");
}

$u_name = $_SESSION["username"];
$pgsql=pg_query("SELECT * FROM pengguna WHERE username = '$u_name'");
$result=pg_fetch_array($pgsql);
if (isset($_GET['status']) == 'berhasil') {
    echo    "<script>
                window.location.href='userpage.php';
                alert('data anda berhasil dimasukkan');
            </script>";
} else if (isset($_GET['status']) == 'gagal') {
    echo    "<script>
                window.location.href='userpage.php';
                alert('data anda gagal dimasukkan');
            </script>";
}
?>
<!--User Profile-->
<section id="profile">
    <div class="card">
        <div class="profile d-flex justify-content-center">
            <img src="frontend/img/profile.png" alt="mdo" class="profilepict">
        </div>
        <div class="isi">
            <p>Nama Akun: <?php echo $result['nama_akun']; ?></p>
            <p>Username: <?php echo $result['username']; ?></p>
        </div>
        <div class="text-center">
            <div class="btn-edit"><a href="edituser.php">Edit </a><i class="bi bi-pencil-square"></i></div>
        </div>
        <div class="text-center">
            <div class="btn-edit"><a href="login and register/logout.php">Logout </a><i class="bi bi-box-arrow-right"></i></div>
        </div>
    </div>
</section>
<?php
include 'includes/footer.php'
?>
