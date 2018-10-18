<?php
    @$id=$_GET['id_edit'];
    $query_edit = $koneksi->query("SELECT * from tbl_pendaftar where id_pendaftar='".$id."'");
    $tampil_edit = $query_edit->fetch_assoc();
?>
<?php
if (isset($_POST['submit'])) {
    $nama_pendaftar = $_POST['nama_pendaftar'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $ttl_pendaftar = $_POST['ttl_pendaftar'];
    $agama = $_POST['agama'];
    $kwn_pendaftar = $_POST['kwn_pendaftar'];
    $anak_ke = $_POST['anak_ke'];
    $jumlah_saudara = $_POST['jumlah_saudara'];
    $alamat = $_POST['alamat'];
    $no_telp = $_POST['no_telp'];
    $tinggal_dengan = $_POST['tinggal_dengan'];
    $goldar = $_POST['goldar'];
    $pendidikan_sebelumnya = $_POST['pendidikan_sebelumnya'];
    $keahlian_yang_dipilih = $_POST['keahlian_yang_dipilih'];
    $nama_ortu = $_POST['nama_ortu'];
    $ttl_ortu = $_POST['ttl_ortu'];
    $agama_ortu = $_POST['agama_ortu'];
    $pendidikan_ortu = $_POST['pendidikan_ortu'];
    $pekerjaan_ortu = $_POST['pekerjaan_ortu'];
    $alamat_rumah = $_POST['alamat_rumah'];
    $telpon_ortu = $_POST['telpon_ortu'];

    $query_tambah = $koneksi->query("UPDATE tbl_pendaftar SET nama_pendaftar='" . $nama_pendaftar . "',jenis_kelamin='" . $jenis_kelamin . "',ttl_pendaftar='" . $ttl_pendaftar . "',agama='" . $agama . "',kwn_pendaftar='" . $kwn_pendaftar . "',anak_ke='" . $anak_ke . "',jumlah_saudara='" . $jumlah_saudara . "',alamat='" . $alamat . "',no_telp='" . $no_telp . "',tinggal_dengan='" . $tinggal_dengan . "',goldar='" . $goldar . "',pendidikan_sebelumnya='" . $pendidikan_sebelumnya . "',keahlian_yang_dipilih='" . $keahlian_yang_dipilih . "',nama_ortu='" . $nama_ortu . "',ttl_ortu='" . $ttl_ortu . "',agama_ortu='" . $agama_ortu . "',pendidikan_ortu='" . $pendidikan_ortu . "',pekerjaan_ortu='" . $pekerjaan_ortu . "',alamat_rumah='" . $alamat_rumah . "',telpon_ortu='" . $telpon_ortu . "' where id_pendaftar='".$id."' ");
    //print_r($query_tambah);die;
    echo '<div class="alert alert-success">Data Berhasil di Edit</div>';
    echo "<meta http-equiv=refresh content=1;url='?m1=pendaftar&m2=pendaftar'>";

}
?>
<div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Data Diri Pendaftar</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <form role="form" action="" method="post">
            <div class="col-md-4">
              <div class="form-group">
                        <label>Nama</label>
                        <input type="text" class="form-control" value="<?=$tampil_edit['nama_pendaftar']?>" name="nama_pendaftar" placeholder="Masukkan Nama Anda" required>
                    </div>
                   
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control select2" style="width: 100%;" name="jenis_kelamin">
                          <option > -- Jenis Kelamin --</option>
                          <option <?php if( $tampil_edit['jenis_kelamin']=='L'){echo "selected"; } ?> value="L">Laki-Laki</option>
                          <option <?php if( $tampil_edit['jenis_kelamin']=='P'){echo "selected"; } ?> value="P">Perempuan</option>
                        </select>
                      </div>
                     <div class="form-group">
                        <label>Tanggal Lahir</label>
                       <div class='input-group date' id='datepicker'>
                            <input type='text' class="form-control" value="<?=$tampil_edit['ttl_pendaftar']?>" name="ttl_pendaftar"/>
                            <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Agama</label>
                        <select class="form-control select2" style="width: 100%;" name="agama">
                          <option> -- Agama --</option>
                          <option <?php if( $tampil_edit['agama']=='Islam'){echo "selected"; } ?> value="Islam">Islam</option>
                          <option <?php if( $tampil_edit['agama']=='Kristen'){echo "selected"; } ?>value="Kristen">Kristen</option>
                          <option <?php if( $tampil_edit['agama']=='Katolik'){echo "selected"; } ?>value="Katolik">Katolik</option>
                          <option <?php if( $tampil_edit['agama']=='Budha'){echo "selected"; } ?>value="Budha">Budha</option>
                          <option <?php if( $tampil_edit['agama']=='Hindu'){echo "selected"; } ?>value="Hindu">Hindu</option>
                        </select>
                      </div>
                    <div class="form-group">
                        <label>Kewarganegaraan</label>
                        <input type="text" class="form-control" value="<?=$tampil_edit['kwn_pendaftar']?>" name="kwn_pendaftar" placeholder="Masukkan Kewarganegaraan" required>
                    </div>
                     <div class="form-group">
                        <label>Anak Ke </label>
                        <input type="text" class="form-control" value="<?=$tampil_edit['anak_ke']?>" name="anak_ke" placeholder="Masukkan Anak Ke">
                    </div>
                    <div class="form-group">
                        <label>Jumlah Saudara </label>
                        <input type="text" class="form-control" value="<?=$tampil_edit['jumlah_saudara']?>" name="jumlah_saudara" placeholder="Masukkan Jumlah Saudara">
                    </div>
                     <div class="form-group">
                        <label>Alamat</label>
                       <textarea class="form-control" rows="5" name="alamat" placeholder="Masukan Alamat Anda" required><?=$tampil_edit['alamat']?></textarea>
                    </div>

              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
               <div class="form-group">
                        <label>No Telpon</label>
                      <input type="text" class="form-control" value="<?=$tampil_edit['no_telp']?>" name="no_telp" placeholder="Masukkan No Telpon">
                    </div>
                    <div class="form-group">
                        <label>Tinggal Dengan</label>
                        <input type="text" class="form-control" value="<?=$tampil_edit['tinggal_dengan']?>" name="tinggal_dengan" placeholder="Masukkan Tinggal Dengan" required>
                    </div>
                     <div class="form-group">
                        <label>Golongan Darah</label>
                        <select class="form-control select2" style="width: 100%;" name="goldar">
                          <option value="-"> -- Golongan Darah --</option>
                          <option <?php if( $tampil_edit['goldar']=='A'){echo "selected"; } ?> value="A">A</option>
                          <option <?php if( $tampil_edit['goldar']=='B'){echo "selected"; } ?> value="B">B</option>
                          <option <?php if( $tampil_edit['goldar']=='AB'){echo "selected"; } ?> value="AB">AB</option>
                          <option <?php if( $tampil_edit['goldar']=='O'){echo "selected"; } ?> value="O">O</option>
                          
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Pendidikan Sebelumnya</label>
                        <input type="text" class="form-control" value="<?=$tampil_edit['pendidikan_sebelumnya']?>" name="pendidikan_sebelumnya" placeholder="Masukkan Pendidikan Sebelumnya" required>
                    </div>
                   

                    <div class="form-group">
                        <label>Keahlian Yang Dipilih</label>
                        <select class="form-control select2" style="width: 100%;" name="keahlian_yang_dipilih">
                          <option> -- Keahlian Yang Dipilih --</option>
                          <option <?php if( $tampil_edit['keahlian_yang_dipilih']=='TKJ'){echo "selected"; } ?> value="TKJ">Teknik Komputer & Jaringan</option>
                          <option <?php if( $tampil_edit['keahlian_yang_dipilih']=='TSM'){echo "selected"; } ?> value="TSM">Teknik Sepeda Motor</option>  
                        </select>
                      </div>
                     
                    <div class="form-group">
                        <label>Nama Orang Tua</label>
                        <input type="text" class="form-control" value="<?=$tampil_edit['nama_ortu']?>" name="nama_ortu" placeholder="Masukkan Nama Orang Tua" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir Ortu</label>
                        <div class='input-group date' id='datepicker2'>
                            <input type='text' class="form-control" value="<?=$tampil_edit['ttl_ortu']?>" name="ttl_ortu"/>
                            <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    
                    
              <!-- /.form-group -->
            </div>
            <div class="col-md-4">
                    <div class="form-group">
                        <label>Agama Orang Tua</label>
                        <select class="form-control select2" style="width: 100%;" name="agama_ortu">
                          <option> -- Agama --</option>
                          <option <?php if( $tampil_edit['agama_ortu']=='Islam'){echo "selected"; } ?> value="Islam">Islam</option>
                          <option <?php if( $tampil_edit['agama_ortu']=='Kristen'){echo "selected"; } ?>value="Kristen">Kristen</option>
                          <option <?php if( $tampil_edit['agama_ortu']=='Katolik'){echo "selected"; } ?>value="Katolik">Katolik</option>
                          <option <?php if( $tampil_edit['agama_ortu']=='Budha'){echo "selected"; } ?>value="Budha">Budha</option>
                          <option <?php if( $tampil_edit['agama_ortu']=='Hindu'){echo "selected"; } ?>value="Hindu">Hindu</option>
                        </select>
                      </div>
                    <div class="form-group">
                        <label>Pendidikan Orang Tua</label>
                        <input type="text" class="form-control" value="<?=$tampil_edit['pendidikan_ortu']?>" name="pendidikan_ortu" placeholder="Masukkan Pendidikan Orang Tua" required>
                    </div>
                    <div class="form-group">
                        <label>Pekerjaan Orang Tua</label>
                        <input type="text" class="form-control" value="<?=$tampil_edit['pekerjaan_ortu']?>" name="pekerjaan_ortu" placeholder="Masukkan Pekerjaan Orang Tua" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat Rumah</label>
                       <textarea class="form-control" rows="5" name="alamat_rumah" placeholder="Masukan Alamat Orang Tua" required> <?=$tampil_edit['alamat_rumah']?></textarea>
                    </div>
                <div class="form-group">
                        <label>Telpon Orang Tua</label>
                        <input type="text" class="form-control" value="<?=$tampil_edit['telpon_ortu']?>" name="telpon_ortu" placeholder="Masukkan No Telpon Ortu">
                    </div>
                    
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
        <button type="reset" name="reset" class="btn btn-danger">Reset</button>
        </div>
    </form>
    </div>