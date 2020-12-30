<?php error_reporting(0); ?>
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
$query_artbar = "SELECT *
                FROM  `tb_konten` 
                JOIN `jeniskonten` ON  `tb_konten`.`jeniskonten_id` = `jeniskonten`.`id`
                JOIN `tb_user` ON  `tb_konten`.`user_id` = `tb_user`.`id`
                JOIN `subjeniskonten` ON `jeniskonten`.`id` = `subjeniskonten`.`jeniskonten_id`
                WHERE`tb_konten`.`status` = '2' AND `subjeniskonten`.`nama` = 'artikel'
                ORDER BY `tb_konten`.`id_konten` DESC LIMIT 6
                ";
$artikel_terbaru = $this->db->query($query_artbar)->result();

?>
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Artikel</h2>
                <ol>
                    <li><a href="<?= base_url('beranda/artikel') ?>">Artikel</a></li>
                    <li>Baca Artikel</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->
    <section id="blog" class="blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 entries">
                    <div align="center">
                        <h3><?php echo $artikel['judul'] ?></h3>
                        <br>
                        <img src="<?php echo base_url('upload/artikel/') . $artikel['foto_artikel']; ?>" class="img-fluid" style="height: 300px; width:400px" alt="">
                    </div>
                    <br>
                    <?php echo $artikel['isi_konten'] . "..."; ?>
                    <br><br>
                    <div>
                        <form method="post" id="form_komen">
                            <fieldset>
                                <legend><a href="#" class="twitter"><i class="icofont-like"></i>Like</a>
                                    <span class="twitter" style="margin-right: 25px;">25</span>
                                </legend>
                                <legend><a href="#" class="twitter"><i class="icofont-comment"></i>Comment</a></legend>
                                <?php if($this->session->userdata['user_id'] == '') { ?>
                                <p>
                                    <label for="email" style="margin-right: 33px;">Email : </label>
                                    <input placeholder="Email" id="email" name="email" type="email" />
                                </p>
                                <?php } ?>
                                <p>
                                    <label for="full-name" style="margin-right: 1px;">komentar : </label>
                                    <textarea name="komentar" id="komentar" cols="70" rows="5"></textarea>
                                </p>
                                <p>
                                    <input type="hidden" name="komentar_id" id="komentar_id" value="0" />
                                    <input type="submit" name="submit" id="submit" class="btn btn-info" value="Submit" />
                                </p>
                                <legend><a href="#" class="twitter"><i class="icofont-share"></i>Share</a></legend>
                            </fieldset>
                        </form>
                        <hr>
                        <h4 class="mb-3">Komentar :</h4>
                        
                        <span id="message"></span>
                    
                        <!-- <div id="display_comment"></div> -->
                        <div class="media border p-3 mb-2">
                        <img src="http://localhost/pmii_bondowoso/upload/komen/avatar1.png" alt="foto-user" class="mr-3 mt-3 rounded-circle" style="width:60px;">
                        <div class="media-body">
                        <div class="row">
                            <div class="col-sm-10">
                            <h4><b>Yudistiono</b> <small> Posted on <i>2020-12-30 02:31:32</i></small></h4>
                            <p>siap mantap</p>
                            </div>
                            <div class="col-sm-2" align="right">
                            <button type="button" class="btn btn-primary btn-sm text-center reply" id="id">Reply</button>
                            </div>
                        </div>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="sidebar" data-aos="fade-left">
                        <h3 class="sidebar-title">Artikel Terbaru</h3>
                        <div class="sidebar-item recent-posts">
                            <?php foreach ($artikel_terbaru as $artbar) { ?>
                                <div class="post-item clearfix">
                                    <img src="" alt="" class="img-fluid">
                                    <img src="<?php echo base_url('upload/artikel/') . $artbar->foto_artikel; ?>" alt="">
                                    <h4>
                                        <a href="<?php echo base_url('Detail_konten/artikel/' . $artbar->id_konten) ?>" class="btn-buy"> <?php echo $artbar->judul; ?></a>
                                    </h4>
                                    <time datetime="2020-01-01"><?php echo $artbar->tgl_buat; ?></time>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
