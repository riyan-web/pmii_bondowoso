<main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>PMII Business</h2>
                <ol>
                    <li><a href=<?= base_url('beranda') ?>>Beranda</a></li>
                    <li>PMII Business</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->
    <section id="blog breadcrumbs" class="blog breadcrumbs" style="	padding: 15px 0; background: #fff; min-height: 40px;">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h1 style="color: #092c1f">Produk-Produk Kader PMII</h1>
                <ul>
                    <li>Makanan</li>
                    <li>Aksesoris</li>
                    <li>Elektronik</li>
                </ul>
                <ul>
                    <li>fcvascbscb</li>
                    <li>sdfsbs</li>
                    <li>sfwesv</li>
                </ul>
                <ol>
                    <div class="sidebar" data-aos="fade-left" style="padding: 0.5px; margin: 0 0 60px 20px;">
                        <div class="search-form" style="padding: 3px 10px; position: relative; border-radius: 4px; ">
                            <?php echo form_open('beranda/search_berita') ?>
                            <input type="text" name="keyword" placeholder="Search" style="padding: 3px 10px; position: relative; border-radius: 4px; ">
                            <button type="submit" style="position: relatif; top: 0; right: 0; bottom: 0; border: 0; background: none; font-size: 20px; padding: 0 15px; margin: -1px; background: #f03c02; color: #fff; transition: 0.3s; border-radius: 0 4px 4px 0;"><i class="icofont-search"></i></button>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
            </div>

            </ol>
        </div>

        </div>
    </section><!-- End Breadcrumbs -->
    <!-- ======= Portfolio Details Section ======= -->
    <section id="portfolio-details" class="portfolio-details">
        <div class="container">
            <div class="row">
                <?php foreach ($produk->result() as $pro) { ?>
                    <div class="col-lg-3" data-aos="fade-right">
                        <img src="<?php echo base_url('upload/produk/') . $pro->foto_produk; ?>" class="img-fluid" alt="" style="height:70mm;">
                        <br><br>
                    </div>
                    <div class="col-lg-3 portfolio-info" data-aos="fade-left">
                        <h3><strong><?php echo $pro->nama_produk; ?></strong></h3>
                        <ul>
                            <li>
                                <h4><strong><?php echo "Rp. " . $pro->harga; ?></strong></h4>
                            </li>
                            <li><strong>Contact Person</strong> : <a href="<?php echo 'https://wa.me/62' . $pro->no_telp; ?>"><?php echo '+62' . $pro->no_telp; ?></a> </li>
                            <li><strong>Kategori</strong> : <?php echo $pro->kategori; ?></li>
                            <p>
                                <strong>Deskripsi Produk</strong> :
                                <?php echo $pro->deskripsi; ?>
                            </p>
                        </ul>
                    </div>
                <?php } ?>
            </div>
            <?php echo $pagination; ?>
        </div>
    </section><!-- End Portfolio Details Section -->
</main><!-- End #main -->