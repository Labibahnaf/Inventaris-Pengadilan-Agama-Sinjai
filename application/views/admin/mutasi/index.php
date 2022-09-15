<?php $this->load->view('template_admin/template_start')?>
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Data Mutasi</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
            <!-- <li class="breadcrumb-item">Data Master</li> -->
            <li class="breadcrumb-item active">Data Mutasi</li>
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
            <h5> Mutasi</h5>
            <div class="pull-right">
                <a href="<?= site_url('admin/Dashboard')?>" class="btn btn-warning btn-flat">
                    <i data-feather="chevron-left"> back</i> 
                </a>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="display" id="basic-1">
                <thead>
                  <tr>
                    <th>Tanggal</th>
                    <th>Nama User</th>
                    <th style="width:15%">Nama Barang</th>
                    <th>Transaksi</th>
                    <th>Jumlah</th>
                    <!-- <th>Aksi</th> -->
                  </tr>
                </thead>
                <tbody>
                    <? foreach($mutasi as $m): ?>
                        <tr>
                            <td><? echo $m['tanggal']; ?></td>
                            <td><? echo $m['namaUser']; ?></td>
                            <td><? echo $m['nama']; ?></td>
                            <td><? echo $m['transaksi']; ?></td>
                            <td><? echo $m['jml']; ?></td>
                            <!-- <td>
                                <a href="<?= site_url('admin/Dashboard/delMut/'.$m['id'])?>" class="btn btn-danger">Delete</a>
                            </td> -->
                        </tr>
                    <? endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
        <?php $this->load->view('template_admin/template_end')?>