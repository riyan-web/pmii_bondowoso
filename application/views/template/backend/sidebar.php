 <!-- Left Panel -->

 <aside id="left-panel" class="left-panel">
     <nav class="navbar navbar-expand-sm navbar-default">

         <div class="navbar-header">
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                 <i class="fa fa-bars"></i>
             </button>
             <a class="navbar-brand" href=""><img src="<?= base_url(); ?>assets/backend/images/logo.png" alt="Logo"></a>
             <a class="navbar-brand hidden" href=""><img src="<?= base_url(); ?>assets/backend/images/logo2.png" alt="Logo"></a>
         </div>
         <?php
            $jenis = $this->session->userdata('jenis');
            $queryMenu = "SELECT    `user_menu`.`id_menu`, `nama_menu`
                        FROM      `user_menu` JOIN `user_access_menu`
                        ON        `user_menu`.`id_menu` = `user_access_menu`.`id_menu`
                        WHERE     `user_access_menu`.`id_jenis` = $jenis
                        ORDER BY  `user_access_menu`.`id_menu` ASC
                       ";
            $menu = $this->db->query($queryMenu)->result_array();
            ?>


         <!-- Sidebar Menu -->
         <!-- siapkan sub-menu sesuai menu -->

         <?php
            foreach ($menu as $m) :
                $menuId = $m['id_menu'];
                $querySubMenu = "SELECT *
                           FROM   `user_sub_menu` JOIN `user_menu`
                           On     `user_sub_menu`.`id_menu` = `user_menu`.`id_menu`
                           Where     `user_sub_menu`.`id_menu` = $menuId
                           AND    `user_sub_menu`.`is_active` = 1
                           ";
                $subMenu = $this->db->query($querySubMenu)->result_array();
                foreach ($subMenu as $sm) : ?>
                 <div id="main-menu" class="main-menu collapse navbar-collapse">
                     <ul class="nav navbar-nav">
                         <li class="nav-item">
                             <a href="<?= base_url("admin/" . $sm['url']); ?>">
                                 <i class="<?= $sm['icon']; ?>"></i>
                                 <?= $sm['title']; ?>
                             </a>

                         </li>
                     </ul>
                 </div>
         <?php
                endforeach;
            endforeach ?>
         <div id="main-menu" class="main-menu collapse navbar-collapse">
             <ul class="nav navbar-nav">
                 <li class="nav-item">
                     <a href="<?= base_url('login/logout'); ?>">
                         <i class="menu-icon fa fa-sign-out"></i>
                         Keluar
                     </a>
                 </li>
             </ul>
         </div>
     </nav>
 </aside><!-- /#left-panel -->