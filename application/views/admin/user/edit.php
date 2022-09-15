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
                                <li class="breadcrumb-item"><a href="<?= site_url('admin/Dashboard')?>"><i data-feather="home"></i></a></li>
                                <li class="breadcrumb-item">Data User</li>
                                <li class="breadcrumb-item active">Edit User</li>
                            </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h5>Edit User</h5>
                    <div class="pull-right">
                        <a href="<?= site_url('admin/User') ?>" class="btn btn-warning btn-flat">
                            <i data-feather="arrow-left"><span>Back</span></i>
                        </a>
                    </div>
                  </div>
                  <form class="form theme-form" action="<?= site_url('admin/User/updateUser/')?>" method="post">
                    <div class="card-body">
                      <div class="row">
                        <div class="col">
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                <input class="form-control" type="text" placeholder="username" name="username" value="<?= $user['username']?>" disabled>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Nama Pengguna</label>
                                <div class="col-sm-9">
                                <input class="form-control" type="text" name="nama" value="<?= $user['nama']?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                <input class="form-control" type="password"  name="password">
                                <!-- <input class="form-control" type="password"  name="password" value="<?= $user['password']?>"> -->
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                <input class="form-control digits" type="text" name="alamat" value="<?= $user['alamat']?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label" >Level</label>
                                <div class="col-sm-9">
                                    <select name="level" class="form-select btn-square digits" value="<?= $user['level']?>" i>
                                        <option>-- Plilih --</option>
                                        <option value="2" <?php echo ($user['level'] == 1) ? 'selected' : '' ?>>Admin</option>
                                        <option value="3" <?php echo ($user['level'] == 2) ? 'selected' : '' ?>>Staff</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer text-end">
                      <div class="col-sm-9 offset-sm-3">
                        <button class="btn btn-primary" type="submit">Submit</button>
                        <input class="btn btn-light" type="reset" value="Cancel">
                      </div>
                    </div>
                  </form>
                </div>
            </div>
            <?php $this->load->view('template_admin/template_end')?>
            