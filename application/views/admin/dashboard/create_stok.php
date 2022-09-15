<?php $this->load->view('template_admin/template_start')?>
            <div class="page-body">
                <div class="container-fluid">
                    <div class="page-title">
                    <div class="row">
                        <div class="col-6">
                        <h3><? echo $halaman; ?></h3>
                        </div>
                        <div class="col-6">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i data-feather="home"></i></a></li>
                            <li class="breadcrumb-item"><? echo $halaman; ?></li>
                            <li class="breadcrumb-item active"><? echo $address; ?></li>
                        </ol>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h5>Tambah Barang</h5>
                        <div class="pull-right">
                            <a href="<?= site_url('admin/Dashboard')?>" class="btn btn-warning btn-flat">
                                <i data-feather="chevron-left"> Back</i> 
                            </a>
                        </div>
                  </div>
                  <form class="form theme-form" action="<?= site_url('admin/Dashboard/store_stok')?>" method="post">
                    <div class="card-body">
                      <div class="row">
                        <div class="col">
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nama Barang</label>
                            <div class="col-sm-9">
                                <input type="hidden" name="idBarang" value="<?= $barang['id']; ?>">
                                <input class="form-control" type="text" disabled name="nama" value="<?= $barang['nama']; ?>">
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Stok Datang</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="text" name="jmlStok">
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