<div class="container-fluid">
    <!-- Begin Page Header-->
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <?php
                if($this->session->userdata('id_jabatan') == '5'){
                    ?>
                    <h2 class="page-header-title">Data Perizinan</h2>
                    <?php
                }else{
                    ?>
                    <h2 class="page-header-title">Data Pengujian dan Sertifikasi</h2>
                    <?php
                }
                ?>
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
                        <?php
                        if($this->session->userdata('id_jabatan') == '5'){
                            ?>
                            <ul class="nav nav-tabs" id="example-one" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="base-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Perizinan Aktif</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="base-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Perizinan Tidak Aktif</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="base-tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Perizinan Ditolak</a>
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
                                                                    <a data-toggle="modal" data-target="#modal<?php echo $per->id_perizinan;?>" title="perpanjang perizinan"><i class="ion-share"></i></a>
                                                                    <!-- <a href="<?php echo site_url('izin_perpanjang/'.$per->id_perizinan.'/'.$per->id_jenis_alat); ?>" title="perpanjang perizinan"><i class="ion-share"></i></a> -->
                                                                    <a href="<?php echo site_url('print_surat/'.$per->id_perizinan); ?>" target="_BLANK" title="cetak surat"><i class="la la-sticky-note"></i></a>
                                                                    <a href="<?php echo site_url('cetak_invoice/').$per->id_perizinan;?>" target="_BLANK" title="Cetak bukti Bayar">
                                                                        <i class="la la-print"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                            <div class="modal" id="modal<?php echo $per->id_perizinan;?>">
                                                                <div class="modal-dialog modal-md">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Apakah Anda ingin memperbarui Lampiran Dokumen Pendukung?</h4>
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <a class="btn btn-md btn-success" href="<?php echo site_url('izin_perpanjang/'.$per->id_perizinan.'/'.$per->id_jenis_alat); ?>" title="perpanjang perizinan">Ya</a>
                                                                            <a class="btn btn-md btn-danger" href="<?php echo site_url('izin_perpanjang_tidak/'.$per->id_perizinan.'/'.$per->id_jenis_alat); ?>" title="perpanjang perizinan">Tidak</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                                                                    <a data-toggle="modal" data-target="#modal2<?php echo $per->id_perizinan;?>" title="perpanjang perizinan"><i class="ion-share"></i></a>
                                                                    <!-- <a href="<?php echo site_url('izin_perpanjang/'.$per->id_perizinan.'/'.$per->id_jenis_alat); ?>" title="perpanjang perizinan"><i class="ion-share"></i></a> -->
                                                                    <a href="<?php echo site_url('print_surat/'.$per->id_perizinan); ?>" target="_BLANK" title="cetak surat"><i class="la la-sticky-note"></i></a>
                                                                    <a href="<?php echo site_url('cetak_invoice/').$per->id_perizinan;?>" target="_BLANK" title="Cetak bukti Bayar">
                                                                        <i class="la la-print"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                            <div class="modal" id="modal2<?php echo $per->id_perizinan;?>">
                                                                <div class="modal-dialog modal-md">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Apakah Anda ingin memperbarui Lampiran Dokumen Pendukung?</h4>
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <a class="btn btn-md btn-success" href="<?php echo site_url('izin_perpanjang/'.$per->id_perizinan.'/'.$per->id_jenis_alat); ?>" title="perpanjang perizinan">Ya</a>
                                                                            <a class="btn btn-md btn-danger" href="<?php echo site_url('izin_perpanjang_tidak/'.$per->id_perizinan.'/'.$per->id_jenis_alat); ?>" title="perpanjang perizinan">Tidak</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <?php
                                                        }
                                                    }
                                                }
                                                ?> 
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="tab-3" role="tabpanel" aria-labelledby="base-tab-3">
                                    <div class="table-responsive">
                                        <table id="myTable4" class="table mb-0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>No</th>
                                                    <th>Nama Alat</th>
                                                    <th>Tanggal Pengajuan</th>
                                                    <th><span style="width:100px;">Status</span></th>
                                                    <th><span style="width:100px;">Keterangan</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i=1;
                                                foreach ($izin_tolak as $tolak) {
                                                    $izin = date('Y-m-d', strtotime($tolak->created_at_izin));
                                                    $nama_alat = $this->WorkshopM->get_perizinan_by_id_perizinan($tolak->id_perizinan)->row()->nama_alat;
                                                    ?>
                                                    <tr>
                                                        <td class="text-center"><?php echo $i?></td>
                                                        <td class="text-center"><?php echo $nama_alat?></td>
                                                        <td class="text-center"><?php echo date_indo($izin)?></td>
                                                        <td class="text-center"><span style="width:100px;"><span class="badge-text badge-text-small danger"><?php echo $tolak->status?></span></span></td>
                                                        <td style="text-align: justify-all;"><?php echo $tolak->keterangan?></td>
                                                    </tr>
                                                    <?php
                                                    $i++;
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }else{
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
                                                                    <a data-toggle="modal" data-target="#modal<?php echo $per->id_perizinan;?>" title="perpanjang perizinan"><i class="ion-share"></i></a>
                                                                    <!-- <a href="<?php echo site_url('izin_perpanjang/'.$per->id_perizinan.'/'.$per->id_jenis_alat); ?>" title="perpanjang perizinan"><i class="ion-share"></i></a> -->
                                                                    <a href="<?php echo site_url('print_surat/'.$per->id_perizinan); ?>" target="_BLANK" title="cetak surat"><i class="la la-sticky-note"></i></a>
                                                                    <a href="<?php echo site_url('cetak_invoice/').$per->id_perizinan;?>" target="_BLANK" title="Cetak bukti Bayar">
                                                                        <i class="la la-print"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                            <div class="modal" id="modal<?php echo $per->id_perizinan;?>">
                                                                <div class="modal-dialog modal-md">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Apakah Anda ingin memperbarui Lampiran Dokumen Pendukung?</h4>
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <a class="btn btn-md btn-success" href="<?php echo site_url('izin_perpanjang/'.$per->id_perizinan.'/'.$per->id_jenis_alat); ?>" title="perpanjang perizinan">Ya</a>
                                                                            <a class="btn btn-md btn-danger" href="<?php echo site_url('izin_perpanjang_tidak/'.$per->id_perizinan.'/'.$per->id_jenis_alat); ?>" title="perpanjang perizinan">Tidak</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                                                                    <a data-toggle="modal" data-target="#modal2<?php echo $per->id_perizinan;?>" title="perpanjang perizinan"><i class="ion-share"></i></a>
                                                                    <!-- <a href="<?php echo site_url('izin_perpanjang/'.$per->id_perizinan.'/'.$per->id_jenis_alat); ?>" title="perpanjang perizinan"><i class="ion-share"></i></a> -->
                                                                    <a href="<?php echo site_url('print_surat/'.$per->id_perizinan); ?>" target="_BLANK" title="cetak surat"><i class="la la-sticky-note"></i></a>
                                                                    <a href="<?php echo site_url('cetak_invoice/').$per->id_perizinan;?>" target="_BLANK" title="Cetak bukti Bayar">
                                                                        <i class="la la-print"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>

                                                            <div class="modal" id="modal2<?php echo $per->id_perizinan;?>">
                                                                <div class="modal-dialog modal-md">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h4 class="modal-title">Apakah Anda ingin memperbarui Lampiran Dokumen Pendukung?</h4>
                                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <a class="btn btn-md btn-success" href="<?php echo site_url('izin_perpanjang/'.$per->id_perizinan.'/'.$per->id_jenis_alat); ?>" title="perpanjang perizinan">Ya</a>
                                                                            <a class="btn btn-md btn-danger" href="<?php echo site_url('izin_perpanjang_tidak/'.$per->id_perizinan.'/'.$per->id_jenis_alat); ?>" title="perpanjang perizinan">Tidak</a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
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
                            <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
            <!-- End Sorting -->
        </div>
    </div>
    <!-- End Row -->
</div>




