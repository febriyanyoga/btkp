<div class="container-fluid">
    <!-- Begin Page Header-->
    <div class="row">
        <div class="page-header">
            <div class="d-flex align-items-center">
                <h2 class="page-header-title">Laporan Perusahaan</h2>
            </div>
        </div>
    </div>
    <!-- End Page Header -->
    <div class="row">
        <div class="col-xl-12">
            <!-- Sorting -->
            <div class="widget has-shadow">
                <div class="widget-body">
                    <div class="text-right mt-3">
                        <a class="btn btn-md btn-info text-right" href="<?php echo base_url('print_laporan_perusahaan')?>" target="_blank"><i class="la la-print"></i> Cetak</a>
                        <br>
                        <br>
                    </div>
                    <div class="table-responsive">
                        <table id="export-table" class="table mb-0">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>No. Registrasi</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Kota</th>
                                    <th>No. akte pendirian</th>
                                    <th>Penanggungjawab</th>
                                    <th>NPWP</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no=0;
                                foreach ($perusahaan as $peru) {
                                    $no++;
                                    $th = date('Y', strtotime($peru->created_at));
                                    $alamat_pt_detail = $this->WorkshopM->detail_alamat($peru->id_kel_perusahaan)->row();

                                    ?>
                                    <tr>
                                        <td class="text-center"><?php echo $no;?></td>
                                        <td><?php echo $th.'-'.sprintf('%03d', $peru->id_perusahaan);?></td>
                                        <td><?php echo $peru->nama_perusahaan?></td>
                                        <td><?php echo $alamat_pt_detail->nama_kabupaten_kota?></td>
                                        <td><?php echo $peru->akta_perusahaan?></td>
                                        <td><?php echo $peru->nama_pimpinan?></td>
                                        <td><?php echo $peru->npwp?></td>
                                    </tr>
                                    <?php
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