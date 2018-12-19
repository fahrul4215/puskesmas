<section id="container">
    <!--header start-->
    <header class="header black-bg">
      <div class="pesan container-fluid" id="pesan">
        <?php if ($dahLogin = $this->session->flashdata('dahLogin')): ?>
          <p class="alert alert-success"><?= $dahLogin ?></p>
        <?php endif ?>
        <?php if ($berhasil = $this->session->flashdata('berhasil')): ?>
          <p class="alert alert-success"><?= $berhasil ?></p>
        <?php endif ?>
        <?php if ($hasil = $this->session->flashdata('hasil')): ?>
          <p class="alert alert-success"><?= $hasil ?></p>
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
        <?php if ($this->session->userdata('masuk')['level'] == 'dokter'): ?>
          <ul class="sidebar-menu" id="nav-accordion">
            <li class="mt">
              <a <?= ($this->uri->segment(1)=="DokterDiagnosa"||$this->uri->segment(1)=="DokterDiagnosa") ? 'class="active"' : ''; ?> href="<?= site_url('DokterDiagnosa') ?>">
                <i class="fa fa-dashboard"></i>
                <span>Home</span>
              </a>
            </li>
          </ul>
        <?php else: ?>
          <ul class="sidebar-menu" id="nav-accordion">
            <li class="mt">
              <a <?= ($this->uri->segment(1)=="home"||$this->uri->segment(1)=="Home") ? 'class="active"' : ''; ?> href="<?= site_url('home') ?>">
                <i class="fa fa-dashboard"></i>
                <span>Dashboard</span>
              </a>
            </li>
            <li class="sub-menu">
              <a <?= ($this->uri->segment(1)=="pasien"||$this->uri->segment(1)=="Pasien") ? 'class="active"' : ''; ?> href="<?= site_url('pasien') ?>">
                <i class="fa fa-users"></i>
                <span>Pasien</span>
              </a>
            </li>
            <li class="sub-menu">
              <a <?= ($this->uri->segment(1)=="Dokter"||$this->uri->segment(1)=="dokter") ? 'class="active"' : ''; ?> href="<?= site_url('dokter') ?>">
                <i class="fa fa-user-md"></i>
                <span>Dokter</span>
              </a>
            </li>
            <li class="sub-menu">
              <a <?= ($this->uri->segment(1)=="Petugas"||$this->uri->segment(1)=="petugas") ? 'class="active"' : ''; ?> href="<?= site_url('petugas') ?>">
                <i class="fa fa-users"></i>
                <span>Petugas</span>
              </a>
            </li>
            <li class="sub-menu">
              <a <?= ($this->uri->segment(1)=="Obat"||$this->uri->segment(1)=="obat") ? 'class="active"' : ''; ?> href="<?= site_url('obat') ?>">
                <i class="fa fa-tasks"></i>
                <span>Obat</span>
              </a>
            </li>
            <li class="sub-menu">
              <a <?= ($this->uri->segment(1)=="Poli"||$this->uri->segment(1)=="poli") ? 'class="active"' : ''; ?> href="<?= site_url('poli') ?>">
                <i class="fa fa-th"></i>
                <span>Poli</span>
              </a>
            </li>
            <li>
              <a <?= ($this->uri->segment(1)=="kartu"||$this->uri->segment(1)=="kartu") ? 'class="active"' : ''; ?> href="<?= site_url('kartu') ?>">
                <i class="fa fa-credit-card"></i>
                <span>Jenis Kartu</span>
              </a>
            </li>
            <li class="sub-menu">
              <a <?= ($this->uri->segment(1)=="rekammedis"||$this->uri->segment(1)=="RekamMedis") ? 'class="active"' : ''; ?> href="<?= site_url('RekamMedis') ?>">
                <i class=" fa fa-medkit"></i>
                <span>Rekam Medis</span>
              </a>
            </li>
            <li class="sub-menu">
              <a <?= ($this->uri->segment(1)=="Registrasi"||$this->uri->segment(1)=="registrasi") ? 'class="active"' : ''; ?> href="<?= site_url('Registrasi') ?>">
                <i class="fa fa-desktop"></i>
                <span>List Register</span>
              </a>
            </li>
            <li class="sub-menu">
              <a <?= ($this->uri->segment(1)=="Apoteker"||$this->uri->segment(1)=="apoteker") ? 'class="active"' : ''; ?> href="<?= site_url('Apoteker') ?>">
                <i class="fa fa-stethoscope"></i>
                <span>List Apoteker</span>
              </a>
            </li>
          </ul>
        <?php endif ?>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->