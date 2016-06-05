<div class="gallery">
    <?php foreach (($para_petugas?:array()) as $petugas): ?>
        <div class="col-md">
            <a href="<?php echo $BASE_URL .'petugas/'. $petugas['id']; ?>">
            <div class="gallery-img">
                <img class="img-responsive " src="<?php echo $BASE_URL .'gambar/petugas/'. $petugas['foto']; ?>" alt="<?php echo $petugas['nama']; ?>"/>
            </div>
            <div class="text-gallery">
                <h6><?php echo $petugas['nama']; ?></h6>
            </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>