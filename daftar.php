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

    $query_tambah = $koneksi->query("INSERT INTO tbl_pendaftar (nama_pendaftar,jenis_kelamin,ttl_pendaftar,agama,kwn_pendaftar,anak_ke,jumlah_saudara,alamat,no_telp,tinggal_dengan,goldar,pendidikan_sebelumnya,keahlian_yang_dipilih,nama_ortu,ttl_ortu,agama_ortu,pendidikan_ortu,pekerjaan_ortu,alamat_rumah,telpon_ortu)values ('" . $nama_pendaftar . "','" . $jenis_kelamin . "','" . $ttl_pendaftar . "','" . $agama . "','" . $kwn_pendaftar . "','" . $anak_ke . "','" . $jumlah_saudara . "','" . $alamat . "','" . $no_telp . "','" . $tinggal_dengan . "','" . $goldar . "','" . $pendidikan_sebelumnya . "','" . $keahlian_yang_dipilih . "','" . $nama_ortu . "','" . $ttl_ortu . "','" . $agama_ortu . "','" . $pendidikan_ortu . "','" . $pekerjaan_ortu . "','" . $alamat_rumah . "','" . $telpon_ortu . "')");
    // print_r($nama_pendaftar);die;
    echo '<div class="alert alert-success">Data Berhasil di Tambah</div>';
    echo "<meta http-equiv=refresh content=1;url='./'>";

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
                        <input type="text" class="form-control" name="nama_pendaftar" placeholder="Masukkan Nama Anda" required>
                    </div>
                   
                    <div class="form-group">
                        <label>Jenis Kelamin</label>
                        <select class="form-control select2" style="width: 100%;" name="jenis_kelamin">
                          <option selected="selected"> -- Jenis Kelamin --</option>
                          <option value="L">Laki-Laki</option>
                          <option value="P">Perempuan</option>
                        </select>
                      </div>
                     <div class="form-group">
                        <label>Tanggal Lahir</label>
                       <div class='input-group date' id='datepicker'>
                            <input type='text' class="form-control" name="ttl_pendaftar"/>
                            <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label>Agama</label>
                        <select class="form-control select2" style="width: 100%;" name="agama">
                          <option selected="selected"> -- Agama --</option>
                          <option value="Islam">Islam</option>
                          <option value="Kristen">Kristen</option>
                          <option value="Katolik">Katolik</option>
                          <option value="Budha">Budha</option>
                          <option value="Hindu">Hindu</option>
                        </select>
                      </div>
                    <div class="form-group">
                        <label>Kewarganegaraan</label>
                        <input type="text" class="form-control" name="kwn_pendaftar" placeholder="Masukkan Kewarganegaraan" required>
                    </div>
                     <div class="form-group">
                        <label>Anak Ke </label>
                        <input type="text" class="form-control" name="anak_ke" placeholder="Masukkan Anak Ke" required>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Saudara </label>
                        <input type="text" class="form-control" name="jumlah_saudara" placeholder="Masukkan Jumlah Saudara" required>
                    </div>
                     <div class="form-group">
                        <label>Alamat</label>
                       <textarea class="form-control" rows="5" name="alamat" placeholder="Masukan Alamat Anda" required></textarea>
                    </div>

              <!-- /.form-group -->
            </div>
            <!-- /.col -->
            <div class="col-md-4">
               <div class="form-group">
                        <label>No Telpon</label>
                      <input type="text" class="form-control" name="no_telp" placeholder="Masukkan No Telpon" required>
                    </div>
                    <div class="form-group">
                        <label>Tinggal Dengan</label>
                        <input type="text" class="form-control" name="tinggal_dengan" placeholder="Masukkan Tinggal Dengan" required>
                    </div>
                     <div class="form-group">
                        <label>Golongan Darah</label>
                        <select class="form-control select2" style="width: 100%;" name="goldar">
                          <option selected="selected"> -- Golongan Darah --</option>
                          <option value="A">A</option>
                          <option value="B">B</option>
                          <option value="AB">AB</option>
                          <option value="O">O</option>
                          
                        </select>
                      </div>
                      <div class="form-group">
                        <label>Pendidikan Sebelumnya</label>
                        <input type="text" class="form-control" name="pendidikan_sebelumnya" placeholder="Masukkan Pendidikan Sebelumnya" required>
                    </div>
                   

                    <div class="form-group">
                        <label>Keahlian Yang Dipilih</label>
                        <select class="form-control select2" style="width: 100%;" name="keahlian_yang_dipilih">
                          <option selected="selected"> -- Keahlian Yang Dipilih --</option>
                          <option value="TKJ">Teknik Komputer & Jaringan</option>
                          <option value="TSM">Teknik Sepeda Motor</option>  
                        </select>
                      </div>
                     
                    <div class="form-group">
                        <label>Nama Orang Tua</label>
                        <input type="text" class="form-control" name="nama_ortu" placeholder="Masukkan Nama Orang Tua" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir Ortu</label>
                        <div class='input-group date' id='datepicker2'>
                            <input type='text' class="form-control" name="ttl_ortu"/>
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
                          <option selected="selected"> -- Agama --</option>
                          <option value="Islam">Islam</option>
                          <option value="Kristen">Kristen</option>
                          <option value="Katolik">Katolik</option>
                          <option value="Budha">Budha</option>
                          <option value="Hindu">Hindu</option>
                        </select>
                      </div>
                    <div class="form-group">
                        <label>Pendidikan Orang Tua</label>
                        <input type="text" class="form-control" name="pendidikan_ortu" placeholder="Masukkan Pendidikan Orang Tua" required>
                    </div>
                    <div class="form-group">
                        <label>Pekerjaan Orang Tua</label>
                        <input type="text" class="form-control" name="pekerjaan_ortu" placeholder="Masukkan Pekerjaan Orang Tua" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat Rumah</label>
                       <textarea class="form-control" rows="5" name="alamat_rumah" placeholder="Masukan Alamat Orang Tua" required></textarea>
                    </div>
                <div class="form-group">
                        <label>Telpon Orang Tua</label>
                        <input type="text" class="form-control" name="telpon_ortu" placeholder="Masukkan No Telpon Ortu" required>
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

