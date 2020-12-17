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
<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Artikel</h2>
                <ol>
                    <li><a href="<?= base_url('beranda') ?>">Beranda</a></li>
                    <li>Artikel</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container">
            <div class="row">
                <?php
                foreach ($artikel->result() as $art) { ?>
                    <div class="col-lg-6" data-aos="fade-up">
                        <div class="testimonial-item">
                            <img src="<?php echo base_url('upload/artikel/') . $art->foto_artikel; ?>" class="testimonial-img" alt="">
                            <h3><?php echo $art->judul ?></h3>
                            <h4>Dibuat : <?php echo $art->tgl_buat ?> &amp; Oleh : <?php echo $art->username ?></h4>
                            <p>
                                <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                                <?php echo substr($art->isi_konten, 0, 150) . "..."; ?>
                                <a href="<?php echo  $art->judul; ?>" class="btn-buy" data-toggle="modal" data-target="#myModal<?php echo $art->id_konten; ?>">Lanjut Baca</a>
                                <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                            </p>
                        </div>
                    </div>
                    <!-- Modal -->
                    <div id="myModal<?php echo $art->id_konten; ?>" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                            <!-- konten modal-->
                            <div class="modal-content">
                                <!-- heading modal -->
                                <div class="modal-header">
                                    <h3 class="modal-title"><?php echo $art->judul ?></h3>
                                </div>
                                <img src="<?php echo base_url('uplaod/artikel/') . $art->foto_artikel; ?>" class="testimonial-img" alt="">
                                <!-- body modal -->
                                <div class="modal-body">
                                    <?php echo $art->isi_konten . "..."; ?>
                                    <br><br>
                                    <div align="center">
                                        <form>
                                            <fieldset>
                                                <legend><a href="#" class="twitter"><i class="icofont-like"></i>Like</a>
                                                    <span class="twitter" style="margin-right: 25px;">25</span>
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
                                <!-- footer modal -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="blog-pagination">
            <ul class="justify-content-center">
                <?php echo $pagination; ?>
            </ul>
        </div>
    </section><!-- End Testimonials Section -->
</main><!-- End #main -->