<?php $this->load->view('template_admin/template_start')?>
<div class="page-body">
  <div class="container-fluid">
    <div class="page-title">
      <div class="row">
        <div class="col-6">
          <h3>Data User</h3>
        </div>
        <div class="col-6">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"><i data-feather="home"></i></a></li>
            <!-- <li class="breadcrumb-item">Data Master</li> -->
            <li class="breadcrumb-item active">Data User</li>
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
            <h5> User</h5>
            <div class="pull-right">
                <a href="<?= site_url('admin/User/adduser')?>" class="btn btn-primary btn-flat">
                    <i data-feather="plus"> Create</i> 
                </a>
            </div>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="display" id="basic-1">
                <thead>
                  <tr>
                    <th style="width:5%">#</th>
                    <th class="text-center" >Nama</th>
                    <th class="text-center" >Username</th>
                    <th class="text-center" >Alamat</th>
                    <th class="text-center" >Level</th>
                    <th class="text-center">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $no = 1;
                  foreach($datUsr as $user){ ?>
                  <tr>
                    <td ><?=$no++?></td>
                    <td class="text-center"><?= $user['nama']?></td>
                    <td class="text-center"><?= $user['username']?></td>
                    <td class="text-center"><?= $user['alamat']?></td>
                    <td class="text-center"><?= $user['level'] == 1 ? "Admin" : null ?><?= $user['level'] == 2 ? "Staff" : null ?></td>
                    <td class="text-center">
                      <!-- <a href="<?= site_url('admin/User/ambil_DataWhereUser/'.$user['id'])?>" class="btn btn-primary">Edit</a> -->
                      <a href="<?= site_url('admin/User/deluser/'.$user['id'])?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin ingin hapus ?')">Hapus</a>
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