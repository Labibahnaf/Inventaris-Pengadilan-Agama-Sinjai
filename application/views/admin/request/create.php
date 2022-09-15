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
                                <li class="breadcrumb-item"><a href="<?= site_url('admin/Dashboard')?>"><i data-feather="home"></i></a></li>
                                <!-- <li class="breadcrumb-item">Data Master</li> -->
                                <li class="breadcrumb-item">Data Request</li>
                                <li class="breadcrumb-item active">Request Barang</li>
                            </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h5>Permintaan Barang</h5>
                        <div class="pull-right">
                            <a href="<?= site_url('admin/Dashboard/request')?>" class="btn btn-warning btn-flat">
                                <i data-feather="chevron-left"> Back</i> 
                            </a>
                        </div>
                  </div>
                  <form class="form theme-form" action="<?= site_url('admin/request/store')?>" method="post">
                    <div class="card-body">
                      <div class="row">
                        <div class="col">
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Nama Barang</label>
                            <div class="col-sm-9">
                                <select name="idBarang">
                                    <option value="">Pilih barang</option>
                                    <?php foreach($barang as $b): ?>
                                        <option value="<?= $b['id'] ?>"><?= $b['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                          </div>
                          <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label">Jumlah Permintaan</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="number" name="jml">
                            </div>
                          </div>
                          <div class="mb-3 row">
                                <label class="col-sm-3 col-form-label">Beri Pesan Ke Admin</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" name="pesan" cols="30" rows="10"></textarea>
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

<div class="card-body btn-showcase">
    <!-- Large modal-->
    <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">Large modal</button>
    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h4 class="modal-title" id="myLargeModalLabel">Pilih Barang</h4>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped" id="basic-1">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Name</th>
                            <th>Stock</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <td>1</td>
                            <td>kursi</td>
                            <td >100</td>
                            <td class="text-center">
                                <button class="btn btn-xs btn-info" id="select">

                                    <i ></i>Select
                                </button>
                            </td>
                        </tr>
                    </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
</div>