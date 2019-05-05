<div class="container-fluid">
	<div class="row justify-content-center">
        <div class="col-xl-12">
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
            <div class="widget has-shadow">
                <div class="widget-header bordered no-actions d-flex align-items-center">
                    <h4>Update Profile</h4>
                </div>
                <div class="widget-body">
                    <div class="col-10 ml-auto">
                        <div class="section-title mt-3 mb-3">
                            <h4>01. Data Akun Pengguna</h4>
                        </div>
                    </div>
                    <form class="form-horizontal" action="<?php echo site_url('post_password_pusditjen')?>" method="post">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Nama Pengguna</label>
                            <div class="col-lg-6">
                                <input name="nama_pengguna" id="nama_pengguna" type="text" class="form-control" placeholder="Nama Pengguna" value="<?php echo $profil->nama_pengguna?>" readonly>
                                <input name="id_pengguna" id="id_pengguna" type="hidden" class="form-control" placeholder="ID Pengguna" value="<?php echo $profil->id_pengguna?>" required>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Email Pengguna</label>
                            <div class="col-lg-6">
                                <input name="email_pengguna" id="email_pengguna" type="text" class="form-control" placeholder="Email Pengguna" value="<?php echo $profil->email_pengguna?>" readonly required>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">No. HP</label>
                            <div class="col-lg-6">
                                <input name="no_hp" id="no_hp" type="number" class="form-control" placeholder="No HP" value="<?php echo $profil->no_hp?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Password Lama</label>
                            <div class="col-lg-6">
                                <input name="password_lama" id="password_lama" type="password" class="form-control" placeholder="Password Lama" required>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Password Baru</label>
                            <div class="col-lg-6">
                                <input name="password_baru" id="password_baru" type="password" class="form-control" placeholder="Password Baru" required>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Konfirmasi Password Baru</label>
                            <div class="col-lg-6">
                                <input name="konfirmasi_password_baru" id="konfirmasi_password_baru" type="password" class="form-control" placeholder="Konfirmasi Password Baru" required>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5" id="pilih_alamat2">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end "></label>
                            <div class="text-right">
                                <input class="btn btn-gradient-01" type="submit" value="Perbarui" name="submit">
                                <!-- <button class="btn btn-shadow" type="reset">Cancel</button> -->
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>