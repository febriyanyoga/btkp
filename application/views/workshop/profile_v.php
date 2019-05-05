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
                    <form class="form-horizontal" action="<?php echo site_url('update_password')?>" method="POST">
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
                    <div class="col-10 ml-auto">
                        <div class="section-title mt-3 mb-3">
                            <h4>02. Identitas Perusahaan</h4>
                        </div>
                    </div>
                    <form action="<?php echo base_url('update_perusahaan')?>" method="POST">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">No. Akta Perusahaan</label>
                            <div class="col-lg-6">
                                <?php 
                                if($profil->akta_perusahaan != ''){
                                    ?>
                                    <input name="akta_perusahaan" id="akta_perusahaan" type="text" class="form-control" placeholder="No. Akta Perusahaan" value="<?php echo $profil->akta_perusahaan?>" readonly>
                                    <?php
                                }else{
                                    ?>
                                    <input name="akta_perusahaan" id="akta_perusahaan" type="text" class="form-control" placeholder="No. Akta Perusahaan" value="<?php echo $profil->akta_perusahaan?>">
                                    <?php
                                }
                                ?>
                                <input name="id_perusahaan" id="id_perusahaan" type="hidden" class="form-control" placeholder="No. Akta Perusahaan" value="<?php echo $profil->id_perusahaan?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Nama Perusahaan</label>
                            <div class="col-lg-6">
                                <?php 
                                if($profil->akta_perusahaan != ''){
                                    ?>
                                    <input name="nama_perusahaan" id="nama_perusahaan" type="text" class="form-control" placeholder="Nama Perusahaan" value="<?php echo $profil->nama_perusahaan?>" readonly>
                                    <?php
                                }else{
                                    ?>
                                    <input name="nama_perusahaan" id="nama_perusahaan" type="text" class="form-control" placeholder="Nama Perusahaan" value="<?php echo $profil->nama_perusahaan?>">
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Email Perusahaan</label>
                            <div class="col-lg-6">
                                <input type="text" name="email_perusahaan" id="email_perusahaan" class="form-control" placeholder="Email Perusahaan" value="<?php echo $profil->email_perusahaan?>">
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">No. Telepon Perusahaan</label>
                            <div class="col-lg-6">
                                <input name="no_tlp" id="no_tlp" type="text" class="form-control" placeholder="No. Telepon Perusahaan" value="<?php echo $profil->no_tlp?>">
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Alamat Perusahaan</label>
                            <div class="col-lg-6">
                                <textarea name="alamat_perusahaan_p" id="alamat_perusahaan_p" type="text" class="form-control" placeholder="Alamat Perusahaan" value=""><?php echo $profil->alamat_perusahaan?></textarea>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5" id="pilih_alamat">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end"></label>
                            <div class="col-lg-2" id="pilih_propinsi2" style="display: none;">
                                <select class="form-control" id="propinsi_pt" name="propinsi_pt" required="">
                                    <option>-----Pilih Provinsi-----</option>
                                    <?php
                                    foreach ($provinsi as $prov) {
                                        ?>
                                        <option value="<?php echo $prov['id_propinsi']?>"><?php echo $prov['nama_propinsi'];?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-2" id="pilih_kab2" style="display: none;">
                                <select class="form-control" id="kab_pt" name="kab_pt" required="">
                                    <option>-----Pilih Kabupaten/Kota-----</option>
                                </select>
                            </div>
                            <div class="col-lg-2" id="pilih_kec2" style="display: none;">
                                <select class="form-control" id="kecamatan_pt" name="kecamatan_pt" required="">
                                    <option>-----Pilih Kecamatan-----</option>
                                </select>
                            </div>
                            <div class="col-lg-2" id="pilih_kel2" style="display: none;">
                                <select class="form-control" id="kelurahan_pt" name="kelurahan_pt" required="">
                                    <option value="0">-----Pilih Kelurahan-----</option>
                                </select>
                            </div>
                            <input type="hidden" name="id_kel_perusahaan" value="<?php echo $profil->id_kel_perusahaan?>" required>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Alamat Workshop</label>
                            <div class="col-lg-6">
                                <textarea name="alamat_workshop_p" id="alamat_workshop_p" type="text" class="form-control" placeholder="Alamat Workshop" value=""><?php echo $profil->alamat_workshop?></textarea>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5" id="pilih_alamat2">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end"></label>
                            <div class="col-lg-2" id="pilih_propinsi" style="display: none;">
                                <select class="form-control" id="propinsi_ws" name="propinsi_ws" >
                                    <option>-----Pilih Provinsi-----</option>
                                    <?php
                                    foreach ($provinsi as $prov) {
                                        ?>
                                        <option value="<?php echo $prov['id_propinsi']?>"><?php echo $prov['nama_propinsi'];?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-lg-2" id="pilih_kab" style="display: none;">
                                <select class="form-control" id="kab_ws" name="kab_ws" >
                                    <option>-----Pilih Kabupaten/Kota-----</option>
                                </select>
                            </div>
                            <div class="col-lg-2" id="pilih_kec" style="display: none;">
                                <select class="form-control" id="kecamatan_ws" name="kecamatan_ws" >
                                    <option>-----Pilih Kecamatan-----</option>
                                </select>
                            </div>
                            <div class="col-lg-2" id="pilih_kel" style="display: none;">
                                <select class="form-control" id="kelurahan_ws" name="kelurahan_ws" >
                                    <option value="0">-----Pilih Kelurahan-----</option>
                                </select>
                            </div>
                            <input type="hidden" name="id_kel_workshop" value="<?php echo $profil->id_kel_workshop?>" required>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5" id="pilih_alamat2">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end"></label>
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