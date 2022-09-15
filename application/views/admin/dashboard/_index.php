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
                    <li class="breadcrumb-item"><? echo $halaman; ?><i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item"><? echo $halaman; ?></li>
                    <li class="breadcrumb-item active"><? echo $address; ?></li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">            
            <div class="row second-chart-list third-news-update">

            <?php foreach($barang as $br): ?>
                <?php if($br['status'] == 1): ?>
              <div class="col-sm-6 col-xl-6 box-col-6">
                <div class="card">
                  <div class="card-header">
                    <h5><? echo $br['nama'];  ?></h5><br>
                    <div class="">
                        <a href="<?= site_url('admin/Dashboard/create_stok/').$br['id']?>" class="btn btn-primary btn-flat">
                            <span>Tambah Stock</span> 
                        </a>
                        <a href="<?= site_url('admin/Dashboard/bacaMutasi/').$br['id'] ?>" class="btn btn-success btn-flat pull-right">
                            <span>Mutasi</span> 
                        </a>
                    </div>
                  </div>
                  <div class="card-body">
                      <table class="table">
                          <thead class="table-light">
                              <tr class="text-center">
                                  <th>Total Stock</th>
                                  <th>Di Alokasikan</th>
                                  <th>Belum Terpakai</th>
                              </tr>
                          </thead>
                          <tbody>
                              <tr class="text-center">
                                  <td><?php $sum = $this->crud->getSum('jml', 'mutasi', ['idBarang' => $br['id']])->row_array(); echo $sum['jml']; ?></td>
                                  <td><?php $sum = $this->crud->getSum('jml', 'mutasi', ['idBarang' => $br['id'], 'transaksi' => 'Kurang'])->row_array(); echo $sum['jml']; ?></td>
                                  <td><?= $br['jmlStok'] ?></td>
                              </tr>
                          </tbody>
                      </table>
                  </div>
                </div>
              </div>
              <?php endif; ?>
              <?php endforeach; ?>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        
        <!-- footer start-->
        <?php $this->load->view('template_admin/template_end')?>
    