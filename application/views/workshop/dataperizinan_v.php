<div class="container-fluid">
    <!-- Begin Page Header-->
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title">Data Perizinan</h2>
            </div>
        </div>
    </div>
    <!-- End Page Header -->
    <div class="row">
        <div class="col-xl-12">
            <!-- Sorting -->
            <div class="widget has-shadow">
                <div class="widget-body">
                    <div class="widget-body sliding-tabs">
                        <?php
                        $data=$this->session->flashdata('sukses');
                        if($data!=""){ 
                            ?>
                            <div class="alert alert-success">
                                <button style="position: relative;" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"></span></button>
                                <h3 style="color: white;"><i class="fa fa-check-circle"></i> Sukses!</h3>
                                <?=$data;?>
                            </div>
                            <?php 
                        } 
                        ?>
                        <?php 
                        $data2=$this->session->flashdata('error');
                        if($data2!=""){ 
                            ?>
                            <div class="alert alert-danger">
                                <button style="position: relative;" type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true"></span></button>
                                <h3 style="color: white;"><i class="fa fa-check-circle"></i> Gagal!</h3>
                                <?=$data2;?>
                            </div>
                            <?php 
                        } 
                        ?>
                        <ul class="nav nav-tabs" id="example-one" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="base-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Perizinan Aktif</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="base-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Perizinan Tidak Aktif</a>
                            </li>
                        </ul>
                        <div class="tab-content pt-3">
                            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="base-tab-1">
                                <div class="table-responsive">
                                    <table id="myTable3" class="table mb-0">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>No.Izin</th>
                                                <th>SPK</th>
                                                <th>Tanggal Mulai</th>
                                                <th>Tanggal Berakhir</th>
                                                <th><span style="width:100px;">Status</span></th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=0;
                                            foreach ($perizinan as $per) {
                                                if($per->status_pembayaran == 'paid'){
                                                    $tgl_terbit = date('Y-m-d', strtotime($per->tgl_terbit));
                                                    $tgl_expired = date('Y-m-d', strtotime($per->tgl_expired));
                                                    $sekarang = date('Y-m-d');
                                                    if($sekarang < $tgl_expired){
                                                        $i++;
                                                        ?>
                                                        <tr class="text-center">
                                                            <td class="text-center"><?php echo $i;?></td>
                                                            <td class="text-center"><span class="text-primary"><?php echo $per->no_spk?></span></td>
                                                            <td class="text-center"><?php echo $per->nama_alat?></td>
                                                            <td class="text-center"><?php echo date_indo($tgl_terbit)?></td>
                                                            <td class="text-center"><?php echo date_indo($tgl_expired)?></td>
                                                            <td class="text-center">
                                                                <?php
                                                                if($sekarang > $tgl_expired){
                                                                    ?>
                                                                    <span style="width:100px;"><span class="badge-text badge-text-small danger">Tidak aktif</span></span>
                                                                    <?php
                                                                }else{
                                                                    ?>
                                                                    <span style="width:100px;"><span class="badge-text badge-text-small info">aktif</span></span>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </td>
                                                            <td class="td-actions text-center">
                                                                <a href="<?php echo site_url('izin_baru3/'.$per->id_perizinan); ?>" title="perpanajang perizinan"><i class="ion-share"></i></a>
                                                                <a href="<?php echo site_url('print_surat/'.$per->id_perizinan); ?>" target="_BLANK" title="cetak surat"><i class="la la-sticky-note"></i></a>
                                                                <a href="<?php echo site_url('cetak_invoice/').$per->id_perizinan;?>" target="_BLANK" title="Cetak bukti Bayar">
                                                                    <i class="la la-print"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="tab-2" role="tabpanel" aria-labelledby="base-tab-2">
                                <div class="table-responsive">
                                    <table id="myTable2" class="table mb-0">
                                        <thead>
                                            <tr class="text-center">
                                                <th>No</th>
                                                <th>No.Izin</th>
                                                <th>SPK</th>
                                                <th>Tanggal Mulai</th>
                                                <th>Tanggal Berakhir</th>
                                                <th><span style="width:100px;">Status</span></th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $i=0;
                                            foreach ($perizinan as $per) {
                                                if($per->status_pembayaran == 'paid'){
                                                    $tgl_terbit = date('Y-m-d', strtotime($per->tgl_terbit));
                                                    $tgl_expired = date('Y-m-d', strtotime($per->tgl_expired));
                                                    $sekarang = date('Y-m-d');
                                                    if($sekarang > $tgl_expired){
                                                        $i++;
                                                        ?>
                                                        <tr class="text-center">
                                                            <td class="text-center"><?php echo $i;?></td>
                                                            <td class="text-center"><span class="text-primary"><?php echo $per->no_spk?></span></td>
                                                            <td class="text-center"><?php echo $per->nama_alat?></td>
                                                            <td class="text-center"><?php echo date_indo($tgl_terbit)?></td>
                                                            <td class="text-center"><?php echo date_indo($tgl_expired)?></td>
                                                            <td class="text-center">
                                                                <?php
                                                                if($sekarang > $tgl_expired){
                                                                    ?>
                                                                    <span style="width:100px;"><span class="badge-text badge-text-small danger">Tidak aktif</span></span>
                                                                    <?php
                                                                }else{
                                                                    ?>
                                                                    <span style="width:100px;"><span class="badge-text badge-text-small info">aktif</span></span>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </td>
                                                            <td class="td-actions text-center">
                                                                <a href="<?php echo site_url('izin_baru3/'.$per->id_perizinan); ?>" title="perpanajang perizinan"><i class="ion-share"></i></a>
                                                                <a href="<?php echo site_url('print_surat/'.$per->id_perizinan); ?>" target="_BLANK" title="cetak surat"><i class="la la-sticky-note"></i></a>
                                                                <a href="<?php echo site_url('cetak_invoice/').$per->id_perizinan;?>" target="_BLANK" title="Cetak bukti Bayar">
                                                                    <i class="la la-print"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                }
                                            }
                                            ?> 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Sorting -->
        </div>
    </div>
    <!-- End Row -->
</div>




