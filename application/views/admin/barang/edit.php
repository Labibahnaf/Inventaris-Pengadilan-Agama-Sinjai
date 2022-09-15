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
                                <li class="breadcrumb-item">Data Barang</li>
                                <li class="breadcrumb-item active">Edit Barang</li>
                            </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h5>Edit Barang</h5>
                    <div class="pull-right">
                        <a href="<?= site_url('admin/Barang') ?>" class="btn btn-warning btn-flat">
                            <i data-feather="arrow-left"><span>Back</span></i>
                        </a>
                    </div>
                  </div>
                  <form class="form theme-form" action="<?= site_url('admin/Barang/updateItem/')?>" method="post">
                    <div class="card-body">
                      <div class="row">
                        <div class="col">
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                              <input type="hidden" name="id" value="<?= $barang['id'] ?>">
                              <input class="form-control" type="text" name="nama" value="<?= $barang['nama']?>">
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" >Status</label>
                            <div class="col-sm-9">
                            <select name="status" class="form-select btn-square digits" value="<?= $barang['status']?>" i>
                              <option>-- Pilih --</option>
                              <option value="1" <?= $barang['status'] == 1 ? 'selected' : null ?>>Aktif</option>
                              <option value="2" <?= $barang['status'] == 2 ? 'selected' : null ?>>Tidak Aktif</option>
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
            