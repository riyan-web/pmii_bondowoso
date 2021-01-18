<style>
    legend {
        color: white;
        padding: 5px;
        background: #006f6b;
        border-radius: 5px;
    }

    fieldset {
        max-width: 800px;
        border-radius: 10px;
        border-color: #4fffa5;
        background: #007b65;
    }

    label {
        float: left;
    }

    input {
        border: none;
        border-radius: 3px;
        height: 30px;
    }

    input:hover {
        background: #7affce;
    }

    button {
        cursor: pointer;
        color: white;
        background: #ff5f5f;
        width: 100px;
        height: 25px;
        border-radius: 4px;
        border: none;
    }

    button:hover {
        background: #ff2e2e;
    }

    label {
        color: white;
    }
</style>
<?php
$query_berita = "SELECT *
                FROM  `tb_konten` 
                JOIN `jeniskonten` ON  `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id`
                JOIN `tb_user` ON  `tb_konten`.`user_id` = `tb_user`.`id`
                JOIN `subjeniskonten` ON `jeniskonten`.`id` = `subjeniskonten`.`jeniskonten_id`
                WHERE`tb_konten`.`status` = '2' AND `subjeniskonten`.`nama` = 'berita'
                ORDER BY `tb_konten`.`id_konten` DESC LIMIT 6
                ";
$berita_terbaru = $this->db->query($query_berita)->result();

?>
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Berita</h2>
                <ol>
                    <li><a href="<?= base_url('beranda/berita') ?>">Berita</a></li>
                    <li>Baca Berita</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->
    <section id="blog" class="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 entries">
                    <div align="center">
                        <h3><?php echo $berita['judul'] ?></h3>
                        <br>
                        <img src="<?php echo base_url('upload/berita/') . $berita['foto_artikel']; ?>" class="img-fluid" style="height: 300px; width:400px" alt="">
                    </div>
                    <br>
                    <?php echo $berita['isi_konten'] . "..."; ?>
                    <br><br>
                    <div>
                        <form>
                            <fieldset>
                                <legend><a href="#" class="twitter"><i class="icofont-eyes"></i>View</a>
                                    <span class="twitter" style="margin-right: 25px;">33</span>
                                </legend>
                                <legend><a href="#" class="twitter"><i class="icofont-comment"></i>Comment</a></legend>
                                <p>
                                    <label for="email" style="margin-right: 33px;">Email : </label>
                                    <input required placeholder="Email" id="email" name="email" type="email" />
                                </p>
                                <p>
                                    <label for="full-name" style="margin-right: 1px;">komentar : </label>
                                    <input required placeholder="Tuliskan Komentar" id="full-name" name="fullName" type="text" />
                                </p>
                                <p>
                                    <button type="submit">kirim</button>
                                </p>
                                <legend><a href="#" class="twitter"><i class="icofont-share"></i>Share</a></legend>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="sidebar" data-aos="fade-left">
                        <h3 class="sidebar-title">Berita Terbaru</h3>
                        <div class="sidebar-item recent-posts">
                            <?php foreach ($berita_terbaru as $berbar) { ?>
                                <div class="post-item clearfix">
                                    <img src="" alt="" class="img-fluid">
                                    <img src="<?php echo base_url('upload/berita/') . $berbar->foto_artikel; ?>" alt="">
                                    <h4>
                                        <a href="<?php echo base_url('Detail_konten/berita/' . $berbar->id_konten) ?>" class="btn-buy"> <?php echo $berbar->judul; ?></a>
                                    </h4>
                                    <time datetime="2020-01-01"><?php echo $berbar->tgl_buat; ?></time>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>