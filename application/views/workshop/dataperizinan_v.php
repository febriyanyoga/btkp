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
                                    <a class="nav-link active" id="base-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Perizinan Aktif <span id="izin_aktif"></span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="base-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Perizinan Tidak Aktif <span id="izin_tidak_aktif"></span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="base-tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Perizinan Ditolak <span id="izin_tolak"></span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="base-tab-4" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-4" aria-selected="false">Data Maker <span id="data_maker"></span></a>
                                </li>
                            </ul>
                            <div class="tab-content pt-3">
                                <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="base-tab-1">
                                    <div class="table-responsive">
                                        <table id="myTable3" class="table mb-0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>No. Permohonan</th>
                                                    <th>No. Sertifikat</th>
                                                    <th>SPK</th>
                                                    <th>Masa Berlaku</th>
                                                    <th><span style="width:100px;">Status</span></th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i=0;
                                                $aktif = 0;
                                                foreach ($perizinan as $per) {
                                                    if($per->status_pembayaran == 'paid'){
                                                        $tgl_terbit = date('Y-m-d', strtotime($per->tgl_terbit));
                                                        $tgl_expired = date('Y-m-d', strtotime($per->tgl_expired));
                                                        $sekarang = date('Y-m-d');
                                                        if($sekarang <= $tgl_expired){
                                                            $i++;
                                                            ?>
                                                            <tr class="text-center">
                                                                <td class="text-center"><span class="text-primary">
                                                                    <?php echo 'SPK'.$per->id_perizinan.$per->kode_alat; ?></span>
                                                                </td>
                                                                <td class="text-center"><span class="text-primary"><?php echo $per->kode_alat.'/'.$per->no_spk.'/'.date('y', strtotime($per->tgl_terbit)) ?></span></td>
                                                                <td class="text-center"><?php echo $per->nama_alat?></td>
                                                                <td class="text-center"><?php echo date_indo($tgl_terbit).' <br><b>Sampai</b><br> '.date_indo($tgl_expired)?></td>
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
                                                            $aktif+=1;
                                                        }
                                                    }
                                                }
                                                ?> 
                                                <input type="hidden" name="aktif_bawah" id="aktif_bawah" value="<?php echo $aktif;?>">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="tab-2" role="tabpanel" aria-labelledby="base-tab-2">
                                    <div class="table-responsive">
                                        <table id="myTable2" class="table mb-0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>No. Permohonan</th>
                                                    <th>No. Sertifikat</th>
                                                    <th>SPK</th>
                                                    <th>Masa Berlaku</th>
                                                    <th><span style="width:100px;">Status</span></th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i=0;
                                                $tidak_aktif=0;
                                                foreach ($perizinan as $per) {
                                                    if($per->status_pembayaran == 'paid'){
                                                        $tgl_terbit = date('Y-m-d', strtotime($per->tgl_terbit));
                                                        $tgl_expired = date('Y-m-d', strtotime($per->tgl_expired));
                                                        $sekarang = date('Y-m-d');
                                                        if($sekarang > $tgl_expired){
                                                            $i++;
                                                            ?>
                                                            <tr class="text-center">
                                                                <td class="text-center"><span class="text-primary">
                                                                    <?php echo 'SPK'.$per->id_perizinan.$per->kode_alat; ?></span>
                                                                </td>
                                                                <td class="text-center"><span class="text-primary"><?php echo $per->kode_alat.'/'.$per->no_spk.'/'.date('y', strtotime($per->tgl_terbit)) ?></span></td>
                                                                <td class="text-center"><?php echo $per->nama_alat?></td>
                                                                <td class="text-center"><?php echo date_indo($tgl_terbit).' <br><b>Sampai</b><br> '.date_indo($tgl_expired)?></td>
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
                                                            $tidak_aktif+=1;
                                                        }
                                                    }
                                                }
                                                ?> 
                                                <input type="hidden" name="tidak_aktif_bawah" id="tidak_aktif_bawah" value="<?php echo $tidak_aktif;?>">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="tab-3" role="tabpanel" aria-labelledby="base-tab-3">
                                    <div class="table-responsive">
                                        <table id="myTable4" class="table mb-0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>No. Permohonan</th>
                                                    <th>Nama Alat</th>
                                                    <th>Tanggal Pengajuan</th>
                                                    <th><span style="width:100px;">Status</span></th>
                                                    <th><span style="width:100px;">Keterangan</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $i=1;
                                                $g = 0;
                                                foreach ($izin_tolak as $tolak) {
                                                    $izin = date('Y-m-d', strtotime($tolak->created_at_izin));
                                                    $nama_alat = $this->WorkshopM->get_perizinan_by_id_perizinan($tolak->id_perizinan)->row()->nama_alat;
                                                    ?>
                                                    <tr>
                                                        <td class="text-center"><span class="text-primary">
                                                            <?php echo 'SPK'.$tolak->id_perizinan.$tolak->kode_alat; ?></span>
                                                        </td>
                                                        <td class="text-center"><?php echo $nama_alat?></td>
                                                        <td class="text-center"><?php echo date_indo($izin)?></td>
                                                        <td class="text-center"><span style="width:100px;"><span class="badge-text badge-text-small danger"><?php echo $tolak->status?></span></span></td>
                                                        <td style="text-align: justify-all;"><?php echo $tolak->keterangan?></td>
                                                    </tr>
                                                    <?php
                                                    $i++;
                                                    $g+=1;
                                                }
                                                ?>
                                                <input type="hidden" name="izin_tolak_bawah" id="izin_tolak_bawah" value="<?php echo $g;?>">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="tab-4" role="tabpanel" aria-labelledby="base-tab-4">
                                    <div class="text-right mb-3">
                                        <?php
                                        $id_pengguna   = $this->session->userdata('id_pengguna');
                                        if($this->GeneralM->get_perusahaan($id_pengguna)->num_rows() > 0){
                                            ?>
                                            <a href="#" class="btn btn-success btn-md" data-toggle="modal" data-target="#tambah_maker"><i class="la la-plus"></i>Tambah Maker</i></a>
                                            <?php
                                        }else{
                                            ?>
                                            <a href="#" class="btn btn-success btn-md" disabled><i class="la la-plus"></i>Tambah Maker</i></a> 
                                            <?php
                                        }
                                        ?>
                                        <br>
                                    </div>
                                    <div class="table-responsive">
                                        <table id="myTable5" class="table mb-0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>No.</th>
                                                    <th>Nomor Sertifikat Training</th>
                                                    <th>Nama Maker</th>
                                                    <th>Dokumen Sertifikat</th>
                                                    <th>Status</th>
                                                    <th>Masa Berlaku</th>
                                                    <th><span style="width:30px;">Aksi</span></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $id_pengguna   = $this->session->userdata('id_pengguna');
                                                if($this->GeneralM->get_perusahaan($id_pengguna)->num_rows() > 0){
                                                    $id_perusahaan = $this->GeneralM->get_perusahaan($id_pengguna)->row()->id_perusahaan;
                                                    $maker         = $this->GeneralM->get_maker_by_id_perusahaan($id_perusahaan)->result();
                                                    $no=0;
                                                    foreach ($maker as $mak) {
                                                        $tgl_mulai = date('Y-m-d', strtotime($mak->tgl_mulai));
                                                        $tgl_akhir = date('Y-m-d', strtotime($mak->tgl_akhir));
                                                        $no++;
                                                        ?>
                                                        <tr>
                                                            <td class="text-center"><?php echo $no;?></td>
                                                            <td class="text-center"><?php echo $mak->no_maker;?></td>
                                                            <td class="text-center"><?php echo $mak->nama;?></td>
                                                            <td class="text-center"><a target="_BLANK" href="<?php echo base_url().'assets/upload/'.$mak->dokumen_sertifikat?>" title="Lihat dokumen" class="btn btn-success btn-sm"><i class="la la-sticky-note"></i>Dokumen</a></td>
                                                            <td class="text-center">
                                                                <?php
                                                                if($mak->status == 'tampil'){
                                                                    ?>
                                                                    <span style="width:100px;"><span class="badge-text badge-text-small info">Aktif</span></span>
                                                                    <?php
                                                                }else{
                                                                    ?>
                                                                    <span style="width:100px;"><span class="badge-text badge-text-small danger">Tidak aktif</span></span>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </td>
                                                            <td class="text-center">
                                                                <?php
                                                                $tgl_expired = date('Y-m-d', strtotime($mak->tgl_akhir));
                                                                $sekarang = date('Y-m-d');
                                                                if($sekarang > $tgl_expired){
                                                                    ?>
                                                                    <span style="width:100px;"><span class="badge-text badge-text-small danger">Tidak aktif</span></span>
                                                                    <?php
                                                                }else{
                                                                    ?>
                                                                    <span style="width:100px;"><span class="badge-text badge-text-small info">Aktif</span></span>
                                                                    <?php
                                                                }
                                                                ?>
                                                                <hr>
                                                                <?php echo date_indo($tgl_mulai).'<br>sampai<br>'.date_indo($tgl_akhir);?>
                                                            </td>
                                                            <td class="text-center">
                                                                <a data-toggle="modal" data-target="#edit_maker-<?php echo $mak->id_maker;?>" title="Edit" class="btn btn-success btn-sm"><i class="la la-pencil"></i></a>
                                                                <?php
                                                                if($mak->status == 'tampil'){
                                                                    ?>
                                                                    <a href="<?php echo base_url('tidak/'.$mak->id_maker)?>" title="Non-aktif" class="btn btn-danger btn-sm"><i class="la la-close"></i></a>
                                                                    <?php
                                                                }else{
                                                                    ?>
                                                                    <a href="<?php echo base_url('tampil/'.$mak->id_maker)?>" title="Aktif" class="btn btn-info btn-sm"><i class="la la-check"></i></a>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </td>
                                                        </tr>

                                                        <div id="edit_maker-<?php echo $mak->id_maker;?>" class="modal fade">
                                                            <div class="modal-dialog modal-md">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Edit Maker</h4>
                                                                        <button type="button" class="close" data-dismiss="modal">
                                                                            <span aria-hidden="true">×</span>
                                                                            <span class="sr-only">close</span>
                                                                        </button>
                                                                    </div>
                                                                    <form action="<?php echo site_url('post_edit_maker')?>" method="POST" enctype="multipart/form-data">
                                                                        <div class="modal-body">
                                                                            <div class="form-group row mb-3">
                                                                                <div class="col-xl-12 mb-3">
                                                                                    <label class="form-control-label">Nomor Sertifikat Training<span class="text-danger ml-2">*</span></label>
                                                                                    <input type="number" value="<?php echo $mak->no_maker?>" class="form-control" id="no_maker" name="no_maker" required readonly>
                                                                                    <input type="hidden" value="<?php echo $mak->id_perusahaan;?>" class="form-control" id="id_perusahaan" name="id_perusahaan" required>
                                                                                    <input type="hidden" value="<?php echo $mak->id_maker;?>" class="form-control" id="id_maker" name="id_maker" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row mb-3">
                                                                                <div class="col-xl-12 mb-3">
                                                                                    <label class="form-control-label">Nama Maker<span class="text-danger ml-2">*</span></label>
                                                                                    <input type="text" value="<?php echo $mak->nama?>" class="form-control" id="nama" name="nama" required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row mb-3">
                                                                                <div class="col-xl-12 mb-3">
                                                                                    <label class="form-control-label">Masa Berlaku<span class="text-danger ml-2">*</span></label>
                                                                                    <input type="text" value="<?php echo date_indo($tgl_mulai).' sampai '.date_indo($tgl_akhir);?>" class="form-control" id="masa_berlaku" name="masa_berlaku" readonly required>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group row mb-3">
                                                                                <div class="col-xl-12 mb-3">
                                                                                    <label for="upload"> Dokumen Sertifikat</label><br>
                                                                                    <a target="_BLANK" href="<?php echo base_url().'assets/upload/'.$mak->dokumen_sertifikat?>" title="Lihat dokumen" class="btn btn-success btn-sm"><i class="la la-sticky-note"></i>Dokumen</a>
                                                                                    <!-- <input type="file" name="dokumen_sertifikat" class="form-control" required=""> -->
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-shadow" data-dismiss="modal">Batal</button>
                                                                            <input type="submit" name="submit" class="btn btn-primary" value="Simpan" onClick="return confirm('Anda yakin data yang anda isikan sudah benar?')">
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                    }
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
                                    <a class="nav-link active" id="base-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Pengujian Diterima <span id="jumlah_diterima"></span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="base-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Pengujian Ditolak <span id="jumlah_ditolak"></span></a>
                                </li>
                            </ul>
                            <div class="tab-content pt-3">
                                <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="base-tab-1">
                                    <div class="table-responsive">
                                        <table id="myTable3" class="table mb-0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>No. Permohonan</th>
                                                    <th>No. Pengujian</th>
                                                    <th>Tgl Pengajuan</th>
                                                    <th>Nama Alat</th>
                                                    <th>Merk</th>
                                                    <th>Tipe</th>
                                                    <th>Nama Instansi</th>
                                                    <th><span style="width:100px;">Status</span></th>
                                                    <th style="width: 100px;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $i=1;
                                                $b=0;
                                                foreach ($pengujian as $ujian) {
                                                    $tgl_pengajuan_p = date('Y-m-d', strtotime($ujian->created_at_ujian));
                                                    $ada_status = $this->WorkshopM->cek_status($ujian->id_pengujian)->num_rows();
                                                    if($ada_status > 0){
                                                        $status = $this->WorkshopM->cek_status($ujian->id_pengujian)->row()->status;
                                                        if($status != 'ditolak'){
                                                            ?>
                                                            <tr class="text-center">
                                                                <td class="text-center"><span class="text-primary">
                                                                    <?php echo $ujian->id_pengujian.'/'.date('Ymd', strtotime($ujian->created_at_ujian)); ?></span>
                                                                </td>
                                                                <td class="text-center"><span class="text-primary">
                                                                    <?php echo $ujian->kode_alat.'/BTKP/'.$ujian->no_spk; ?></span>
                                                                </td>
                                                                <td class="text-center"><?php echo date_indo($tgl_pengajuan_p)?></td>
                                                                <td class="text-center"><?php echo $ujian->nama_alat?></td>
                                                                <td class="text-center"><?php echo $ujian->merk?></td>
                                                                <td class="text-center"><?php echo $ujian->tipe?></td>
                                                                <td class="text-center"><?php echo $ujian->nama_perusahaan?></td>
                                                                <td class="text-center">
                                                                    <?php
                                                                    $tgl_expired = date('Y-m-d', strtotime($ujian->tgl_expired));
                                                                    $sekarang = date('Y-m-d');
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
                                                                    <a href="<?php echo site_url('print_sertifikat_pengujian/'.$ujian->id_pengujian); ?>" target="_BLANK" title="cetak sertifikat"><i class="la la-sticky-note"></i></a>
                                                                    <a href="<?php echo site_url('print_label/'.$ujian->id_pengujian); ?>" target="_BLANK" title="Cetak Label"><i class="la la-sticky-note"></i></a>
                                                                    <hr>
                                                                    <a href="<?php echo site_url('cetak_invoice_ujian/').$ujian->id_pengujian;?>" target="_BLANK" title="Cetak bukti Bayar tagihan pengujian lab"><i class="la la-print"></i></a>
                                                                    <a href="<?php echo site_url('cetak_invoice_ujian2/').$ujian->id_pengujian;?>" target="_BLANK" title="Cetak bukti Bayar tagihan pencetakan label"><i class="la la-print"></i></a>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            $i++;
                                                            $b+=1;
                                                        }
                                                    }
                                                }
                                                ?>
                                                <input type="hidden" name="jumlah_1" id="jumlah_1" value="<?php echo $b;?>">
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade show" id="tab-2" role="tabpanel" aria-labelledby="base-tab-2">
                                    <div class="table-responsive">
                                        <table id="myTable4" class="table mb-0">
                                            <thead>
                                                <tr class="text-center">
                                                    <th>No. Permohonan</th>
                                                    <th>Tgl Pengajuan</th>
                                                    <th>Nama Alat</th>
                                                    <th>Merk</th>
                                                    <th>Tipe</th>
                                                    <th>Nama Instansi</th>
                                                    <th><span style="width:100px;">Keterangan</span></th>
                                                    <!-- <th>Aksi</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $i=1;
                                                $a=0;
                                                foreach ($pengujian_tolak as $ujian) {
                                                    $ada_status = $this->WorkshopM->cek_status($ujian->id_pengujian)->num_rows();
                                                    if($ada_status > 0){
                                                        $status = $this->WorkshopM->cek_status($ujian->id_pengujian)->row()->status;
                                                        $tgl_pengajuan_p = date('Y-m-d', strtotime($ujian->created_at_ujian));
                                                        if($status == "ditolak"){
                                                            ?>
                                                            <tr class="text-center">
                                                                <td class="text-center"><span class="text-primary">
                                                                    <?php echo $ujian->id_pengujian.'/'.date('Ymd', strtotime($ujian->created_at_ujian)); ?></span>
                                                                </td>
                                                                <td class="text-center"><?php echo date_indo($tgl_pengajuan_p)?></td>
                                                                <td class="text-center"><?php echo $ujian->nama_alat?></td>
                                                                <td class="text-center"><?php echo $ujian->merk?></td>
                                                                <td class="text-center"><?php echo $ujian->tipe?></td>
                                                                <td class="text-center"><?php echo $ujian->nama_perusahaan?></td>
                                                                <td class="text-center" style="color: red;">
                                                                    <!-- <span style="width:100px;"><span class="badge-text badge-text-small danger">Ditolak</span></span> -->
                                                                    <?php echo $ujian->keterangan?>
                                                                </td>
                                                                <!-- <td class="td-actions text-center"></td> -->
                                                            </tr>
                                                            <?php
                                                            $i++;
                                                            $a+=1;
                                                        }
                                                    }
                                                }
                                                ?>
                                                <input type="hidden" name="jumlah" id="jumlah" value="<?php echo $a;?>">
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


<div id="tambah_maker" class="modal fade">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Maker</h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">close</span>
                </button>
            </div>
            <form action="<?php echo site_url('post_maker')?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group row mb-3">
                        <div class="col-xl-12 mb-3">
                            <label class="form-control-label">Nomor Sertifikat Training<span class="text-danger ml-2">*</span></label>
                            <input type="number" value="" class="form-control" id="no_maker" name="no_maker" required>
                            <?php
                            $id_pengguna   = $this->session->userdata('id_pengguna');
                            $id_perusahaan = $this->GeneralM->get_perusahaan($id_pengguna)->row()->id_perusahaan;
                            ?>
                            <input type="hidden" value="<?php echo $id_perusahaan;?>" class="form-control" id="id_perusahaan" name="id_perusahaan" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-xl-12 mb-3">
                            <label class="form-control-label">Nama Maker<span class="text-danger ml-2">*</span></label>
                            <input type="text" value="" class="form-control" id="nama" name="nama" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-xl-12 mb-3">
                            <label class="form-control-label">Tanggal Mulai<span class="text-danger ml-2">*</span></label>
                            <input type="date" value="" class="form-control" id="tgl_mulai" name="tgl_mulai" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-xl-12 mb-3">
                            <label class="form-control-label">Tanggal Akhir<span class="text-danger ml-2">*</span></label>
                            <input type="date" value="" class="form-control" id="tgl_akhir" name="tgl_akhir" required>
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-xl-12 mb-3">
                            <label for="upload"> Dokumen Sertifikat</label>
                            <input type="file" name="dokumen_sertifikat" class="form-control" required="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-shadow" data-dismiss="modal">Batal</button>
                    <input type="submit" name="submit" class="btn btn-primary" value="Simpan" onClick="return confirm('Anda yakin data yang anda isikan sudah benar?')">
                </div>
            </form>
        </div>
    </div>
</div>