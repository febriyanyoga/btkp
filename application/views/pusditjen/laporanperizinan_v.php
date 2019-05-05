<div class="container-fluid">
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title">Laporan Perizinan</h2>
            </div>
        </div>
    </div>
    <div class="widget has-shadow">
        <div class="widget-body sliding-tabs">
            <div class="text-right mt-3">
                <a class="btn btn-md btn-info text-right" href="<?php echo base_url('print_laporan_perizinan')?>" target="_blank"><i class="la la-print"></i> Cetak</a>
                <br>
                <br>
            </div>
            <ul class="nav nav-tabs" id="example-one" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="base-tab-1" data-toggle="tab" href="#tab-1" role="tab" aria-controls="tab-1" aria-selected="true">INFLATABLE LIFERAFT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="base-tab-2" data-toggle="tab" href="#tab-2" role="tab" aria-controls="tab-2" aria-selected="false">FIRE EXTINGUISHER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="base-tab-3" data-toggle="tab" href="#tab-3" role="tab" aria-controls="tab-3" aria-selected="false">LIFEBOAT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="base-tab-3" data-toggle="tab" href="#tab-4" role="tab" aria-controls="tab-3" aria-selected="false">EPIRB</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="base-tab-3" data-toggle="tab" href="#tab-5" role="tab" aria-controls="tab-3" aria-selected="false">MARINE EVACUATION SYSTEM</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="base-tab-3" data-toggle="tab" href="#tab-6" role="tab" aria-controls="tab-3" aria-selected="false">FOOD DRINKING WATER</a>
                </li>
            </ul>
            <div class="tab-content pt-3">
                <div class="tab-pane fade show active" id="tab-1" role="tabpanel" aria-labelledby="base-tab-1">
                    <div class="table-responsive">
                        <table id="export-table" class="table mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th>No. Seri</th>
                                    <th>No. SPK</th>
                                    <th>No. Barcode</th>
                                    <th>Kode Billing</th>
                                    <th>Tgl Penerbitan SPK</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($perizinan as $per) {
                                    if($per->id_jenis_alat == 10){
                                        $tgl_terbit = date('Y-m-d', strtotime($per->tgl_terbit));
                                        ?>
                                        <tr>
                                            <td><span class="text-primary">BTKP<?php echo $per->id_perizinan.'-'.$per->kode_alat?></span></td>
                                            <td><span class="text-primary"><?php echo $per->kode_alat.'/'.$per->no_spk.'/'.date('y', strtotime($per->tgl_terbit)) ?></span></td>
                                            <td><span class="text-primary"><?php echo $per->kode_barcode?></span></td>
                                            <td><span class="text-primary"><?php echo $per->kode_billing?></span></td>
                                            <td><span class="text-primary"><?php echo date_indo($tgl_terbit);?></span></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-2" role="tabpanel" aria-labelledby="base-tab-2">
                    <div class="table-responsive">
                        <table id="myTable" class="table mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th>No. Seri</th>
                                    <th>No. SPK</th>
                                    <th>No. Barcode</th>
                                    <th>Kode Billing</th>
                                    <th>Tgl Penerbitan SPK</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($perizinan as $per) {
                                    if($per->id_jenis_alat == 15){
                                        $tgl_terbit = date('Y-m-d', strtotime($per->tgl_terbit));
                                        ?>
                                        <tr>
                                            <td><span class="text-primary">BTKP<?php echo $per->id_perizinan.'-'.$per->kode_alat?></span></td>
                                            <td><span class="text-primary"><?php echo $per->kode_alat.'/'.$per->no_spk.'/'.date('y', strtotime($per->tgl_terbit)) ?></span></td>
                                            <td><span class="text-primary"><?php echo $per->kode_barcode?></span></td>
                                            <td><span class="text-primary"><?php echo $per->kode_billing?></span></td>
                                            <td><span class="text-primary"><?php echo date_indo($tgl_terbit);?></span></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-3" role="tabpanel" aria-labelledby="base-tab-3">
                    <div class="table-responsive">
                        <table id="myTable3" class="table mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th>No. Seri</th>
                                    <th>No. SPK</th>
                                    <th>No. Barcode</th>
                                    <th>Kode Billing</th>
                                    <th>Tgl Penerbitan SPK</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($perizinan as $per) {
                                    if($per->id_jenis_alat == 7){
                                        $tgl_terbit = date('Y-m-d', strtotime($per->tgl_terbit));
                                        ?>
                                        <tr>
                                            <td><span class="text-primary">BTKP<?php echo $per->id_perizinan.'-'.$per->kode_alat?></span></td>
                                            <td><span class="text-primary"><?php echo $per->kode_alat.'/'.$per->no_spk.'/'.date('y', strtotime($per->tgl_terbit)) ?></span></td>
                                            <td><span class="text-primary"><?php echo $per->kode_barcode?></span></td>
                                            <td><span class="text-primary"><?php echo $per->kode_billing?></span></td>
                                            <td><span class="text-primary"><?php echo date_indo($tgl_terbit);?></span></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-4" role="tabpanel" aria-labelledby="base-tab-4">
                    <div class="table-responsive">
                        <table id="myTable4" class="table mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th>No. Seri</th>
                                    <th>No. SPK</th>
                                    <th>No. Barcode</th>
                                    <th>Kode Billing</th>
                                    <th>Tgl Penerbitan SPK</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($perizinan as $per) {
                                    if($per->id_jenis_alat == 16){
                                        $tgl_terbit = date('Y-m-d', strtotime($per->tgl_terbit));
                                        ?>
                                        <tr>
                                            <td><span class="text-primary">BTKP<?php echo $per->id_perizinan.'-'.$per->kode_alat?></span></td>
                                            <td><span class="text-primary"><?php echo $per->kode_alat.'/'.$per->no_spk.'/'.date('y', strtotime($per->tgl_terbit)) ?></span></td>
                                            <td><span class="text-primary"><?php echo $per->kode_barcode?></span></td>
                                            <td><span class="text-primary"><?php echo $per->kode_billing?></span></td>
                                            <td><span class="text-primary"><?php echo date_indo($tgl_terbit);?></span></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-5" role="tabpanel" aria-labelledby="base-tab-5">
                    <div class="table-responsive">
                        <table id="myTable5" class="table mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th>No. Seri</th>
                                    <th>No. SPK</th>
                                    <th>No. Barcode</th>
                                    <th>Kode Billing</th>
                                    <th>Tgl Penerbitan SPK</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($perizinan as $per) {
                                    if($per->id_jenis_alat == 17){
                                        $tgl_terbit = date('Y-m-d', strtotime($per->tgl_terbit));
                                        ?>
                                        <tr>
                                            <td><span class="text-primary">BTKP<?php echo $per->id_perizinan.'-'.$per->kode_alat?></span></td>
                                            <td><span class="text-primary"><?php echo $per->kode_alat.'/'.$per->no_spk.'/'.date('y', strtotime($per->tgl_terbit)) ?></span></td>
                                            <td><span class="text-primary"><?php echo $per->kode_barcode?></span></td>
                                            <td><span class="text-primary"><?php echo $per->kode_billing?></span></td>
                                            <td><span class="text-primary"><?php echo date_indo($tgl_terbit);?></span></td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="tab-6" role="tabpanel" aria-labelledby="base-tab-6">
                    <div class="table-responsive">
                        <table id="myTable6" class="table mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th>No. Seri</th>
                                    <th>No. SPK</th>
                                    <th>No. Barcode</th>
                                    <th>Kode Billing</th>
                                    <th>Tgl Penerbitan SPK</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($perizinan as $per) {
                                    if($per->id_jenis_alat == 18){
                                        $tgl_terbit = date('Y-m-d', strtotime($per->tgl_terbit));
                                        ?>
                                        <tr>
                                            <td><span class="text-primary">BTKP<?php echo $per->id_perizinan.'-'.$per->kode_alat?></span></td>
                                            <td><span class="text-primary"><?php echo $per->kode_alat.'/'.$per->no_spk.'/'.date('y', strtotime($per->tgl_terbit)) ?></span></td>
                                            <td><span class="text-primary"><?php echo $per->kode_barcode?></span></td>
                                            <td><span class="text-primary"><?php echo $per->kode_billing?></span></td>
                                            <td><span class="text-primary"><?php echo date_indo($tgl_terbit);?></span></td>
                                        </tr>
                                        <?php
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