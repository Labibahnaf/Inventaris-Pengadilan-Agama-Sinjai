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
          <!-- Container-fluid starts-->
          <div class="container-fluid">            
            <div class="row second-chart-list third-news-update">
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
                                <tr class="text-center">
                                    <th>Nama Barang</th>
                                    <th>Di Alokasikan</th>
                                    <th>Belum Terpakai</th>
                                    <th>Total Stok</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <!-- <tbody>
                                    <?php foreach($barang as $br): ?>
                                    <?php if($br['status'] == 1): ?>
                                        <tr class="text-center">
                                            <td><?= $br['nama'];  ?></td>
                                            <td><?php $sum1 = $this->crud->getSum('jml', 'mutasi', ['idBarang' => $br['id'], 'transaksi' => 'Kurang'])->row_array(); echo $sum1['jml']; ?></td>
                                            <td><?= $sum2 = $br['jmlStok'] ?></td>
                                            <td><?php $sum3 = $sum1['jml'] + $sum2; echo $sum3 ?></td>
                                            <td>
                                                <a href="<?= site_url('admin/Dashboard/create_stok/').$br['id']?>" class="btn btn-primary btn-flat">
                                                    <span>Tambah Stock</span> 
                                                </a>
                                                <a href="<?= site_url('admin/Dashboard/bacaMutasi/').$br['id'] ?>" class="btn btn-success btn-flat pull-right">
                                                    <span>Mutasi</span> 
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody> -->
                                <tbody>
                                <?php foreach($barang as $br): ?>
                                    <?php if($br['status'] == 1): ?>
                                        <tr class="text-center">
                                            <td><?= $br['nama'];  ?></td>
                                            <td><?php $sum1 = $this->crud->getSum('jml', 'mutasi', ['idBarang' => $br['id'], 'transaksi' => 'Kurang'])->row_array(); echo $sum1['jml']; ?></td>
                                            <td><?= $sum2 = $br['jmlStok'] ?></td>
                                            <td><?php $sum3 = $sum1['jml'] + $sum2; echo $sum3 ?></td>
                                            <td>
                                                <a href="<?= site_url('admin/Dashboard/create_stok/').$br['id']?>" class="btn btn-primary btn-flat">
                                                    <span>Tambah Stock</span> 
                                                </a>
                                                <a href="<?= site_url('admin/Dashboard/bacaMutasi/').$br['id'] ?>" class="btn btn-success btn-flat pull-right">
                                                    <span>Mutasi</span> 
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endif; ?>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          </div>
          <!-- Container-fluid Ends-->
        
        <!-- footer start-->
        <?php $this->load->view('template_admin/template_end')?>
    