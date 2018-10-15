<section id="container">
    <!--header start-->
    <header class="header black-bg">
      <div class="pesan container-fluid" id="pesan">
        <?php if ($dahLogin = $this->session->flashdata('dahLogin')): ?>
          <p class="alert alert-success"><?= $dahLogin ?></p>
        <?php endif ?>
      </div>
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="<?= site_url('home') ?>" class="logo"><b><span>Puskesmas</span></b></a>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="<?= site_url('login/logout') ?>">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <li class="mt">
            <a class="active" href="<?= site_url('home') ?>">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="<?= site_url('pasien') ?>">
              <i class="fa fa-users"></i>
              <span>Pasien</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="<?= site_url('dokter') ?>">
              <i class="fa fa-user-md"></i>
              <span>Dokter</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="<?= site_url('petugas') ?>">
              <i class="fa fa-users"></i>
              <span>Petugas</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="<?= site_url('obat') ?>">
              <i class="fa fa-tasks"></i>
              <span>Obat</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="<?= site_url('poli') ?>">
              <i class="fa fa-th"></i>
              <span>Poli</span>
            </a>
          </li>
          <li>
            <a href="<?= site_url('JenisKartu') ?>">
              <i class="fa fa-credit-card"></i>
              <span>Jenis Kartu</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="<?= site_url('RekamMedis') ?>">
              <i class=" fa fa-medkit"></i>
              <span>Rekam Medis</span>
            </a>
          </li>
          <li class="sub-menu">
            <a href="<?= site_url('register') ?>">
              <i class="fa fa-desktop"></i>
              <span>List Register</span>
            </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->