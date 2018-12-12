<div class="container-fluid">
	<div class="row justify-content-center">
        <div class="col-xl-12">
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
                    <form class="form-horizontal" action="<?php echo site_url('post_update_profil')?>" method="POST">
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Nama Pengguna</label>
                            <div class="col-lg-6">
                                <input name="nama_pengguna" id="nama_pengguna" type="text" class="form-control" placeholder="Nama Pengguna" value="<?php echo $profil->nama_pengguna?>">
                                <input name="id_pengguna" id="id_pengguna" type="hidden" class="form-control" placeholder="ID Pengguna" value="<?php echo $profil->id_pengguna?>">
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Email Pengguna</label>
                            <div class="col-lg-6">
                                <input name="email_pengguna" id="email_pengguna" type="text" class="form-control" placeholder="Email Pengguna" value="<?php echo $profil->email_pengguna?>">
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">No. HP</label>
                            <div class="col-lg-6">
                                <input name="no_hp" id="no_hp" type="number" class="form-control" placeholder="No HP" value="<?php echo $profil->no_hp?>">
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Password Lama</label>
                            <div class="col-lg-6">
                                <input name="password_lama" id="password_lama" type="password" class="form-control" placeholder="Password Lama">
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Password Baru</label>
                            <div class="col-lg-6">
                                <input name="password_baru" id="password_baru" type="password" class="form-control" placeholder="Password Baru">
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Konfirmasi Password Baru</label>
                            <div class="col-lg-6">
                                <input name="konfirmasi_password_baru" id="konfirmasi_password_baru" type="password" class="form-control" placeholder="Konfirmasi Password Baru">
                            </div>
                        </div>
                        <div class="col-10 ml-auto">
                            <div class="section-title mt-3 mb-3">
                                <h4>02. Identitas Perusahaan</h4>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">No. Akta Perusahaan</label>
                            <div class="col-lg-6">
                                <input name="akta_perusahaan" id="akta_perusahaan" type="text" class="form-control" placeholder="No. Akta Perusahaan" value="<?php echo $profil->akta_perusahaan?>" readonly disabled>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Nama Perusahaan</label>
                            <div class="col-lg-6">
                                <input name="nama_perusahaan" id="nama_perusahaan" type="text" class="form-control" placeholder="Nama Perusahaan" value="<?php echo $profil->nama_perusahaan?>" readonly disabled>
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
                        <!--  <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Fax</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" placeholder="+00 987 654 32">
                            </div>
                        </div> -->
                        <div class="form-group row d-flex align-items-center mb-5">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end">Alamat Perusahaan</label>
                            <div class="col-lg-6">
                                <textarea name="alamat_perusahaan_p" id="alamat_perusahaan_p" type="text" class="form-control" placeholder="Alamat Perusahaan" value=""><?php echo $profil->alamat_perusahaan?></textarea>
                            </div>
                        </div>
                        <div class="form-group row d-flex align-items-center mb-5" id="pilih_alamat">
                            <label class="col-lg-2 form-control-label d-flex justify-content-lg-end"></label>
                            <div class="col-lg-2" id="pilih_propinsi2" style="display: none;">
                                <select class="form-control" id="propinsi_pt" name="propinsi_pt" required >
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
                                <select class="form-control" id="kab_pt" name="kab_pt" required >
                                    <option>-----Pilih Kabupaten/Kota-----</option>
                                </select>
                            </div>
                            <div class="col-lg-2" id="pilih_kec2" style="display: none;">
                                <select class="form-control" id="kecamatan_pt" name="kecamatan_pt" required >
                                    <option>-----Pilih Kecamatan-----</option>
                                </select>
                            </div>
                            <div class="col-lg-2" id="pilih_kel2" style="display: none;">
                                <select class="form-control" id="kelurahan_pt" name="kelurahan_pt" required >
                                    <option>-----Pilih Kelurahan-----</option>
                                </select>
                            </div>
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
                                <select class="form-control" id="propinsi_ws" name="propinsi_ws" required >
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
                                <select class="form-control" id="kab_ws" name="kab_ws" required >
                                    <option>-----Pilih Kabupaten/Kota-----</option>
                                </select>
                            </div>
                            <div class="col-lg-2" id="pilih_kec" style="display: none;">
                                <select class="form-control" id="kecamatan_ws" name="kecamatan_ws" required >
                                    <option>-----Pilih Kecamatan-----</option>
                                </select>
                            </div>
                            <div class="col-lg-2" id="pilih_kel" style="display: none;">
                                <select class="form-control" id="kelurahan_ws" name="kelurahan_ws" required >
                                    <option>-----Pilih Kelurahan-----</option>
                                </select>
                            </div>
                        </div>
                        <div class="em-separator separator-dashed"></div>
                        <div class="text-right">
                            <button class="btn btn-gradient-01" type="submit">Save Changes</button>
                            <button class="btn btn-shadow" type="reset">Cancel</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>