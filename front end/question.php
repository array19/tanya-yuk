<?php 
include '../function/config.php';
if(isset($_POST['submit'])) {
        $message = $_POST['message'];
        $user = "user"; // ambil user masih blum, masih dipikirin dulu (session / cookies)
        $uploadfile = $_POST['file'];
        $query = "INSERT INTO pertanyaan(pertanyaan, username, foto_pertanyaan) VALUES('$message', '$user', '$uploadfile')";
        $result = pg_query($db, $query);
        if( $result==TRUE ) {
		header('Location: uploadquest.php?upload=berhasil');
	} else {
                echo "gagal";
		header('Location: uploadquest.php?upload=gagal');
	}
}
?>