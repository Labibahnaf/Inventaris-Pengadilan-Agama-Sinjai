<?php $this->load->view('template_admin/template_start')?>
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Data Barang</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
            <!-- <li class="breadcrumb-item">Data Master</li> -->
            <li class="breadcrumb-item active">Data Barang</li>
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
            <h5> Barang</h5>
            <div class="pull-right">
                <a href="<?= site_url('admin/Barang/create')?>" class="btn btn-primary btn-flat">
                    <i data-feather="plus"> Create</i> 
                </a>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="display" id="basic-1">
                <thead>
                  <tr>
                    <th>NO. </th>
                    <th>Nama Item</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;
                  foreach ($datItm as $item) {?>
                  <tr>
                    <td ><?= $i++?></td>
                    <td ><?= $item['nama'] ?></td>
                    <td class="text-center"><?= $item['status'] == 1 ? "Aktif" : null ?><?= $item['status'] == 2 ? "Tidak Aktif" : null ?></td>
                    <td ><?= $item['create_time'] ?></td>
                    <td>
                      <a href="<?= site_url('admin/barang/edit/'.$item['id'])?>" class="btn btn-primary">Edit</a>
                      <!-- <a href="<?= site_url('admin/Barang/delitm/'.$item['id'])?>" class="btn btn-danger">Delete</a> -->
                    </td>
                  </tr> 
                  <?php }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php $this->load->view('template_admin/template_end')?>