<div class="container-fluid">
	<!-- Begin Page Header-->
	<div class="row">
		<div class="page-header">
			<div class="d-flex align-items-center">
				<h2 class="page-header-title">Data Pengujian dan Sertifikasi</h2>
			</div>
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
        </div>
    </div>
    <!-- End Page Header -->
    <div class="row">
        <div class="col-xl-12">
            <!-- Sorting -->
            <div class="widget has-shadow">
                <div class="widget-body">
                    <div class="widget-body sliding-tabs">
                        <ul class="nav nav-tabs" id="example-one" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="base-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">Verifikasi akhir<span id="verifikasi_ujian_kasie"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="base-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">Data Pengujian dan Sertifikasi <span id="data_pengujian_kasie"></span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="base-tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">Data Pengujian dan Sertifikasi ditolak <span id="pengujian_ditolak_kasie"></span></a>
                            </li>
                        </ul>
                        <div class="tab-content pt-3">
                            <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="base-tab-1">
                                <div class="table-responsive">
                                    <table id="myTable" class="table mb-0">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No. Permohonan</th>
                                                <th class="text-center">Tanggal Pengajuan</th>
                                                <th class="text-center">Nama Alat</th>
                                                <th class="text-center">Merk</th>
                                                <th class="text-center">Tipe</th>
                                                <th class="text-center">Instansi</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            $i=1;
                                            $verifikasi_ujian_kasie=0;
                                            foreach ($pengujian as $ujian) {
                                                if($ujian->file_hasil_pengujian != ""){
                                                    $progress_kasie = $this->GeneralM->get_array_progress_ujian_kasie($ujian->id_pengujian)->num_rows(); //jumlah perizinan yang di acc kasie
                                                    if($progress_kasie == 0){
                                                    	$tgl_pengajuan = date('Y-m-d', strtotime($ujian->created_at_ujian));
                                                    	?>
                                                    	<tr>
                                                    		<td class="text-center"><span class="text-primary">
                                                               <?php echo 'SDP'.$ujian->id_pengujian.$ujian->kode_alat; ?></span>
                                                           </td>
                                                           <td class="text-center"><?php echo date_indo($tgl_pengajuan)?></td>
                                                           <td class="text-center"><?php echo $ujian->nama_alat?></td>
                                                           <td class="text-center"><?php echo $ujian->merk?></td>
                                                           <td class="text-center"><?php echo $ujian->tipe?></td>
                                                           <td class="text-center"><?php echo $ujian->nama_perusahaan?></td>
                                                           <td class="text-center">
                                                            <a href="<?php echo site_url('verifikasiakhir/'.$ujian->id_pengujian); ?>" class="btn btn-sm btn-primary mr-1 mb-2"><i class="la la-pencil"></i> Verifikasi
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <?php
                                                    $i++;
                                                    $verifikasi_ujian_kasie+=1;
                                                }
                                            }
                                        }
                                        ?>
                                        <input type="hidden" name="verifikasi_ujian_kasie_bawah" id="verifikasi_ujian_kasie_bawah" value="<?php echo $verifikasi_ujian_kasie;?>">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="base-tab-2">
                            <div class="table-responsive">
                                <table id="myTable2" class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No. Permohonan</th>
                                            <th class="text-center">No. Sertifikat</th>
                                            <th class="text-center">Tanggal Pengajuan</th>
                                            <th class="text-center">Nama Alat</th>
                                            <th class="text-center">Merk</th>
                                            <th class="text-center">Tipe</th>
                                            <th class="text-center">Perusahaan</th>
                                            <th class="text-center">Status</th>
                                            <th class="text-center" style="width: 250px;">Masa Berlaku</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $i=1;
                                        $data_pengujian_kasie=0;
                                        foreach ($pengujian as $ujian) {
                                            if($ujian->status_pembayaran_1 == "paid" && $ujian->status_pembayaran_2 == "paid"){
                                                $tgl_pengajuan  = date('Y-m-d', strtotime($ujian->created_at_ujian));
                                                $tgl_terbit     = date('Y-m-d', strtotime($ujian->tgl_terbit));
                                                $tgl_expired    = date('Y-m-d', strtotime($ujian->tgl_expired));
                                                ?>
                                                <tr>
                                                    <td class="text-center"><span class="text-primary">
                                                        <?php echo 'SDP'.$ujian->id_pengujian.$ujian->kode_alat; ?></span>
                                                    </td>
                                                    <td class="text-center"><span class="text-primary">
                                                        <?php echo $ujian->kode_alat.'/BTKP/'.$ujian->no_spk; ?></span>
                                                    </td>
                                                    <td class="text-center"><?php echo date_indo($tgl_pengajuan)?></td>
                                                    <td class="text-center"><?php echo $ujian->nama_alat?></td>
                                                    <td class="text-center"><?php echo $ujian->merk?></td>
                                                    <td class="text-center"><?php echo $ujian->tipe?></td>
                                                    <td class="text-center"><?php echo $ujian->nama_perusahaan?> </td>
                                                    <td class="text-center">
                                                        <?php
                                                        $tgl_expired = date('Y-m-d', strtotime($ujian->tgl_expired));
                                                        $sekarang = date('Y-m-d');
                                                        if($ujian->pengesahan == 'tidak'){
                                                            ?>
                                                            <span style="width:100px;"><span class="badge-text badge-text-small danger">Menunggu pengesahan</span></span>
                                                            <?php
                                                        }else{
                                                            if($ujian->tgl_terbit == '0000-00-00 00:00:00'){
                                                                ?>
                                                                <span style="width:100px;"><span class="badge-text badge-text-small danger">Menunggu penerbitan</span></span>
                                                                <?php
                                                            }else{
                                                                if($sekarang > $tgl_expired){
                                                                    ?>
                                                                    <span style="width:100px;"><span class="badge-text badge-text-small danger">Tidak aktif</span></span>
                                                                    <?php
                                                                }else{
                                                                    ?>
                                                                    <span style="width:100px;"><span class="badge-text badge-text-small info">aktif</span></span>
                                                                    <?php
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <?php echo date_indo($tgl_terbit).' <br><b>sampai</b></br> '.date_indo($tgl_expired);?>
                                                    </td>
                                                </tr>
                                                <?php
                                                $i++;
                                                $data_pengujian_kasie+=1;
                                            }
                                        }
                                        ?>
                                        <input type="hidden" name="data_pengujian_kasie_bawah" id="data_pengujian_kasie_bawah" value="<?php echo $data_pengujian_kasie;?>">
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="base-tab-3">
                            <div class="table-responsive">
                                <table id="myTable3" class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No. Permohonan</th>
                                            <th class="text-center">Tanggal Pengajuan</th>
                                            <th class="text-center">Nama Alat</th>
                                            <th class="text-center">Merk</th>
                                            <th class="text-center">Tipe</th>
                                            <th class="text-center">Perusahaan</th>
                                            <th class="text-center">Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $i=1;
                                        $pengujian_ditolak_kasie=0;
                                        foreach ($pengujian_tolak as $ujian) {
                                            $ada_status = $this->WorkshopM->cek_status($ujian->id_pengujian)->num_rows();
                                            if($ada_status > 0){
                                                $status = $this->WorkshopM->cek_status($ujian->id_pengujian)->row()->status;
                                                $tgl_pengajuan_p = date('Y-m-d', strtotime($ujian->created_at_ujian));
                                                if($status == "ditolak"){
                                                    ?>
                                                    <tr class="text-center">
                                                        <td class="text-center"><span class="text-primary">
                                                           <?php echo 'SDP'.$ujian->id_pengujian.$ujian->kode_alat; ?></span>
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
                                                $pengujian_ditolak_kasie+=1;
                                            }
                                        }
                                    }
                                    ?>
                                    <input type="hidden" name="pengujian_ditolak_kasie_bawah" id="pengujian_ditolak_kasie_bawah" value="<?php echo $pengujian_ditolak_kasie;?>">
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
