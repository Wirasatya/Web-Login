<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-10">
            <i class="fas fa-dove"></i>
        </div>
        <div class="sidebar-brand-text mx-3"><?= $title; ?></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- query menu dan submenu -->
    <?php
    $id_rule = $this->session->userdata('id_rule');
    $queryMenu = "SELECT `tb_menu`.`ID_MENU`, `NAMA_MENU` FROM `tb_menu` JOIN `tb_acces_menu` ON `tb_menu`.`ID_MENU`=`tb_acces_menu`.`MENU_ID`WHERE `tb_acces_menu`.`RULE_ID`=$id_rule ORDER BY `tb_acces_menu`.`RULE_ID` ASC";
    $menu = $this->db->query($queryMenu)->result_array();
    ?>

    <!-- LOOPING MENU -->
    <?php foreach ($menu as $m) : ?>
        <div class="sidebar-heading">
            <?= $m['NAMA_MENU']; ?>
            <?php
            $menu_id = $m['ID_MENU'];
            $querySubmenu = "SELECT * FROM `tb_submenu` JOIN `tb_menu` ON `tb_submenu`.`MENU_ID`=`tb_menu`.`ID_MENU`WHERE `tb_submenu`.`MENU_ID`=$menu_id AND `tb_submenu`.`IS_ACTIVE`=1";
            $submenu = $this->db->query($querySubmenu)->result_array();
            ?>
            <?php foreach ($submenu as $sm) : ?>
                <?php if ($nama_menu == $sm['NAMA_SUBMENU']) : ?>
                    <li class="nav-item active ">
                    <?php else : ?>
                    <li class="nav-item ">
                    <?php endif; ?>
                    <a class="nav-link pb-0" href="<?= $sm['URL']; ?>">
                        <i class="<?= $sm['ICON']; ?>"></i>
                        <span><?= $sm['NAMA_SUBMENU']; ?></span></a>
                    </li>
                <?php endforeach; ?>
        </div>
        <!-- Divider -->
        <hr class="sidebar-divider mt-3">
    <?php endforeach; ?>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="fas fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->