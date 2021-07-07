    <!-- ============================================================== -->
    <!-- Start right Content here -->

    <!-- ============================================================== -->
    <div class="content-page">
      <!-- Start content -->
      <div class="content">
        <div class="container-fluid">

          <h1>Menu Legalisir</h1>

          <div class="row">
            <div class="col-12">
              <div class="card-box table-responsive">
                <h4 class="m-t-0 header-title">Data Legalisir</h4>


                <table id="key-table" class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Lengkap</th>
                      <th>NIM</th>
                      <th>Jenis Kelamin</th>
                      <th>Alamat</th>
                      <th>No Hp</th>
                      <th>Prodi</th>
                      <th>Tahun Lulus</th>
                      <th>no Ijazah</th>
                      <th>Opsi</th>
                    </tr>
                  </thead>


                  <tbody>
                    <tr>
                      <?php
                      $no = 1;
                      foreach ($legalisir as $row) {
                      ?>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $row->nama; ?></td>
                        <td><?php echo $row->nim; ?></td>
                        <td><?php echo $row->jenis_kelamin; ?></td>
                        <td><?php echo $row->alamat; ?></td>
                        <td><?php echo $row->no_hp; ?></td>
                        <td><?php echo $row->prodi; ?></td>
                        <td><?php echo $row->tahun_lulus; ?></td>
                        <td><?php echo $row->no_ijazah; ?></td>
                        
                        <td>
                          <a href="#" class="btn btn-success"><i class="mdi mdi-table-edit"></i></a>
                          <a href="#" class="btn btn-danger"><i class="mdi mdi-delete"></i></a>
                          <a href="#" class="btn btn-primary"><i class="mdi mdi-table-detail"></i></a>

                        </td>
                      <?php
                      }
                      ?>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div> <!-- end row -->

        </div> <!-- container -->

      </div> <!-- content -->

      <footer class="footer text-right">
        2016 - 2019 © Adminto. Coderthemes.com
      </footer>

    </div>


    <!-- ============================================================== -->
    <!-- End Right content here -->
    <!-- ============================================================== -->