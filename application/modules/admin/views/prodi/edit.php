<div class="content-page">
  <!-- Start content -->
  <div class="content">
    <div class="container-fluid">

      <div class="container-fluid">
        <h3><i class="mdi mdi-account mr-2 mt-4"></i>Ubah Data Prodi</h3>

        <div class="card-body">
          <?php
          if (validation_errors() != false) {
          ?>
            <div class="alert alert-danger" role="alert">
              <?php echo validation_errors(); ?>
            </div>
          <?php
          }
          ?>
          <form method="post" action="<?php echo base_url(); ?>admin/prodi/update">
            <input type="hidden" name="id_prodi" id="id_prodi" value="<?php echo $prodi->id_prodi; ?>" />
            <div class="form-group">
              <label for="nama">Nama Prodi</label>
              <input type="text" value="<?php echo $prodi->nama_prodi; ?>" class="form-control" id="nama" name="nama">
            </div>

            <button type="submit" class="btn btn-primary">Ubah Data</button>
          </form>
        </div>
      </div>

    </div> <!-- container -->

  </div> <!-- content -->




  <footer class="footer text-right">
    2016 - 2019 © Adminto. Coderthemes.com
  </footer>

</div>


<!-- ============================================================== -->
<!-- End Right content here -->
<!-- ============================================================== -->