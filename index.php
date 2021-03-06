<?php 
include 'includes/header.php';
include 'function/config.php';
$tanya = pg_query("SELECT * FROM pertanyaan ORDER BY id_pertanyaan DESC");

if (isset($_GET['search'])) {
    $search = $_GET["search"];
    $tanya = pg_query("SELECT * FROM pertanyaan 
    WHERE pertanyaan LIKE '%$search%' 
    OR username LIKE '%$search%'
    ");
}

if (isset($_GET['status']) == 'berhasil') {
    echo    "<script>
                window.location.href='index.php';
                alert('data anda berhasil dimasukkan');
            </script>";
}
?>  
<!--Kolom Pertanyaan-->
<section id="Question" class="section-bg">
    <div class="row gx-5" style="margin: auto;">
        <div class="col">
            <h1 style="font-family: 'Lobster';">Forum Pertanyaan</h1>            
            <?php while($result = pg_fetch_array($tanya)) : ?>
            <a href="uploadans.php?pertanyaan=<?= $result['id_pertanyaan']; ?>">
            <div class="p-5">
                <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
                    <div class="member-info">
                    <h4><?= $result['pertanyaan']; ?></h4>
                    <span><?= $result['username']; ?></span>
                    <?php
                        $id = $result['id_pertanyaan'];
                        $q = pg_query("SELECT * FROM j_k WHERE id_pertanyaan = $id");
                        $i = 0;
                        while ($komentar = pg_fetch_array($q)) {                            
                            echo "<p>".$komentar["komentar"]."</p>";
                            if ($i > 2) {
                                break;
                            }
                            $i++;
                        }
                    ?>
                    </div>
                </div>
            </div>
            </a>
        <?php endwhile; ?>
        </div>
    </div>
</section>
<?php
include 'includes/footer.php'
?>