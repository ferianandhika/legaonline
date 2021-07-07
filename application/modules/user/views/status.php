<div class="page-header header-filter" data-parallax="true"
  style="background-image: url('<?php echo base_url() ?>assets/user/img/city-profile.jpg'); height: 6cm;"></div>
<div class="main main-raised">
  <div class="profile-content">
    <div class="container">


      <div class="card text-center">
        <div class="card-header">
          <ul class="nav nav-pills card-header-pills">
            <li class="nav-item">
              <a class="nav-link active" href="javascript:;">Active</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="javascript:;">Link</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" href="javascript:;">Disabled</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <h4 class="card-title">Special title treatment</h4>
          <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>

          <table id="key-table" class="table table-bordered">
            <thead>
              <tr>

                <th>Nama Lengkap</th>
                <th>NIM</th>
                <th>Prodi</th>
                <th>Tahun Lulus</th>
                <th>no Ijazah</th>
                <th>Status</th>
              </tr>
            </thead>


            <tbody>
              <tr>


                <td><?= $status['nama']; ?></td>
                <td><?= $status['nim']; ?></td>
                <td><?= $status['prodi']; ?></td>
                <td><?= $status['tahun_lulus']; ?></td>
                <td><?= $status['no_ijazah']; ?></td>

                <td>
                  <a href="#" class="btn btn-success">Detail</a>
                  <a href="#" class="btn btn-danger"><i class="mdi mdi-delete"></i></a>
                  <a href="#" class="btn btn-primary"><i class="mdi mdi-table-detail"></i></a>
                </td>
              </tr>
            </tbody>
          </table>



          <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
        </div>
      </div>

    </div>
  </div>
</div>