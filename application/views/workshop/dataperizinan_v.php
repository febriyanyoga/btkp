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
                <!-- <div class="widget-header bordered no-actions d-flex align-items-center"> -->
                    <!-- <input type="button" name="tambah" value="Tambah" class="btn btn-md btn-info"> -->
                    <!-- <h4>Sorting</h4> -->
                <!-- </div> -->
                <div class="widget-body">
                    <div class="table-responsive">
                        <table id="myTable" class="table mb-0">
                            <thead>
                                <tr>
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

                                <tr>
                                <td>1</td>
                                    <td><span class="text-primary">189-01-RU</span></td>
                                    <td>Life Boat</td>
                                    <td>08/12/2017</td>
                                    <td>08/12/2018</td>
                                    <td><span style="width:100px;"><span class="badge-text badge-text-small danger">Tidak aktif</span></span></td>

                                    <td class="td-actions">
                                        <a href="<?php echo site_url('pemohon/perizinanbaru'); ?>"><i class="ion-share"></i></a>
                                        <a href="<?php echo site_url('pemohon/detailperizinan'); ?>"><i class="ion-eye"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                <td>2</td>
                                    <td><span class="text-primary">092-06-FR</span></td>
                                    <td>Life jacket</td>
                                    <td>08/12/2018</td>
                                    <td>08/12/2019</td>
                                    <td><span style="width:100px;"><span class="badge-text badge-text-small info">Aktif</span></span></td>

                                    <td class="td-actions">
                                        <a href="<?php echo site_url('pemohon/perizinanbaru'); ?>"><i class="ion-share"></i></a>
                                        <a href="<?php echo site_url('pemohon/detailperizinan'); ?>"><i class="ion-eye"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- End Sorting -->
        </div>
    </div>
    <!-- End Row -->
</div>
