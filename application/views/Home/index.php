<!DOCTYPE html>
<html lang="id">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home | Puskesmas</title>

    <?php $this->load->view('templates/css'); ?>
  </head>
  <body>
    <?php $this->load->view('templates/section1'); ?>
    
      <section id="main-content">
        <section class="wrapper">
          <div class="row">
            <div class="col-lg-12 main-chart">
              <div class="border-head">
                <h3>SHORTCUT MENU</h3>
              </div>
              <div class="row">
                <div class="col-md-6 col-sm-6 mb">
                  <div class="green-panel pn">
                    <div class="green-header">
                      <h3>Registrasi Pasien</h3>
                    </div>
                    <div class="text-center" style="color: #fff;">
                      <br><i class="fa fa-group fa-4x"></i><br><br>
                      <a class="btn btn-default" href="<?= site_url('') ?>">Tambah Pasien</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 col-sm-6 mb">
                  <div class="green-panel pn">
                    <div class="green-header">
                      <h3>Registrasi Berobat</h3>
                    </div>
                    <div class="text-center" style="color: #fff;">
                      <br><i class="fa fa-plus-square fa-4x"></i><br><br>
                      <a class="btn btn-default" href="<?= site_url('') ?>">Tambah Pasien Berobat</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 main-chart">
              <div class="border-head">
                <h3>MENU</h3>
              </div>
              <div class="row">
                <div class="col-md-3 col-sm-3 mb">
                  <div class="green-panel pn">
                    <div class="green-header">
                      <h5>Pasien</h5>
                    </div>
                    <div class="text-center" style="color: #fff;">
                      <br><i class="fa fa-group fa-4x"></i><br><br>
                      <a class="btn btn-default" href="<?= site_url('') ?>">Kelola</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-3 mb">
                  <div class="green-panel pn">
                    <div class="green-header">
                      <h5>Dokter</h5>
                    </div>
                    <div class="text-center" style="color: #fff;">
                      <br><i class="fa fa-user-md fa-4x"></i><br><br>
                      <a class="btn btn-default" href="<?= site_url('') ?>">Kelola</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-3 mb">
                  <div class="green-panel pn">
                    <div class="green-header">
                      <h5>Petugas</h5>
                    </div>
                    <div class="text-center" style="color: #fff;">
                      <br><i class="fa fa-users fa-4x"></i><br><br>
                      <a class="btn btn-default" href="<?= site_url('') ?>">Kelola</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-3 mb">
                  <div class="green-panel pn">
                    <div class="green-header">
                      <h5>Obat</h5>
                    </div>
                    <div class="text-center" style="color: #fff;">
                      <br><i class="fa fa-tasks fa-4x"></i><br><br>
                      <a class="btn btn-default" href="<?= site_url('') ?>">Kelola</a>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-3 col-sm-3 mb">
                  <div class="green-panel pn">
                    <div class="green-header">
                      <h5>Poli</h5>
                    </div>
                    <div class="text-center" style="color: #fff;">
                      <br><i class="fa fa-th fa-4x"></i><br><br>
                      <a class="btn btn-default" href="<?= site_url('') ?>">Kelola</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-3 mb">
                  <div class="green-panel pn">
                    <div class="green-header">
                      <h5>Jenis Kartu</h5>
                    </div>
                    <div class="text-center" style="color: #fff;">
                      <br><i class="fa fa-credit-card fa-4x"></i><br><br>
                      <a class="btn btn-default" href="<?= site_url('') ?>">Kelola</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-3 mb">
                  <div class="green-panel pn">
                    <div class="green-header">
                      <h5>Rekam Medis</h5>
                    </div>
                    <div class="text-center" style="color: #fff;">
                      <br><i class="fa fa-medkit fa-4x"></i><br><br>
                      <a class="btn btn-default" href="<?= site_url('RekamMedis') ?>">Kelola</a>
                    </div>
                  </div>
                </div>
                <div class="col-md-3 col-sm-3 mb">
                  <div class="green-panel pn">
                    <div class="green-header">
                      <h5>List Register</h5>
                    </div>
                    <div class="text-center" style="color: #fff;">
                      <br><i class="fa fa-desktop fa-4x"></i><br><br>
                      <a class="btn btn-default" href="<?= site_url('') ?>">Kelola</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </section>
    
    <?php $this->load->view('templates/section2'); ?>

    <?php $this->load->view('templates/javascript'); ?>
  </body>
</html>