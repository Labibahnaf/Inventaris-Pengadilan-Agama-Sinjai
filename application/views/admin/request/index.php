<?php $this->load->view('template_admin/template_start')?>
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Data Request</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
            <!-- <li class="breadcrumb-item">Data Master</li> -->
            <li class="breadcrumb-item active">Data Request</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- Container-fluid starts-->
  <div class="container-fluid">
    <div class="row">
      <!-- Zero Configuration  Starts-->
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header">
            <h5> Request</h5>
            <!-- <div class="pull-right">
                <a href="<?= site_url('admin/request/create')?>" class="btn btn-primary btn-flat">
                    <i data-feather="plus"> Req</i> 
                </a>
            </div> -->
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="display" id="basic-1">
                <thead>
                  <tr>
                    <th>User</th>
                    <th>Barang</th>
                    <th>Jumlah</th>
                    <th>Pesan</th>
                    <th>Komentar</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    <?php foreach($requestg as $r): ?>
                        <tr>
                            <td><?= $r['nama'] ?></td>
                            <td><?= $r['namaBarang'] ?></td>
                            <td><?= $r['jml'] ?></td>
                            <td><?= $r['pesan'] ?></td>
                            <td><?= $r['komentar'] ?></td>
                            <td><?= $r['tanggal'] ?></td>
                            <td><?= $r['namaStatus'] ?></td>
                            <td>
                                <?php if($r['status'] == 1): ?>
                                <a href="<?= site_url('admin/request/edit/'.$r['id'])?>" class="btn btn-primary">Ubah Status</a>
                                <!-- <a href="<?= site_url('admin/Barang/delitm/'.$item['id'])?>" class="btn btn-danger">Delete</a> -->
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view('template_admin/template_end')?>