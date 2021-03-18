<?php
    $this->load->view('admin/v_header');
?>
<div class="container">
  <div class="card">
    <div class="card-header text-center">
      <h4>Data Pengguna</h4>
    </div>
    <div class="card-body">

      <a class="btn btn-success btn-flat text-white" data-toggle="modal" data-target="#myModal"><span class="fa fa-user-plus"></span> Add Pengguna</a>
      <br/>
      <br/>
      

      <table class="table table-bordered table-striped table-hover">
        <tr>
          <th width="1%">No</th>
          <th>Foto</th>
          <th>Nama</th>
          <th>Jenis Kelamin</th>
          <th>Username</th>
          <th>Password</th>
          <th>Level</th>
          <th width="16%">Opsi</th>
        </tr>
        <?php 
            $no = 1;
            foreach ($data->result_array() as $i) :
            $pengguna_id=$i['pengguna_id'];
            $pengguna_nama=$i['pengguna_nama'];
            $pengguna_jenkel=$i['pengguna_jenkel'];
            $pengguna_username=$i['pengguna_username'];
            $pengguna_password=$i['pengguna_password'];
            $pengguna_level=$i['pengguna_level'];
            $pengguna_photo=$i['pengguna_photo'];
                    ?>
          <tr>
            <td><?php echo $no++; ?></td>
            <td><img width="40" height="40" class="img-circle" src="<?php echo base_url().'assets/images/'.$pengguna_photo;?>"></td>
            <td><?php echo $pengguna_nama;?></td>
            <?php if($pengguna_jenkel=='L'):?>
                        <td>Laki-Laki</td>
                  <?php else:?>
                        <td>Perempuan</td>
              <?php endif;?>
              <td><?php echo $pengguna_username;?></td>
              <td><?php echo $pengguna_password;?></td>
              <?php if($pengguna_level=='1'):?>
                        <td>Administrator</td>
                  <?php else:?>
                        <td>Author</td>
              <?php endif;?>
            <td> 
            <a class="btn" data-toggle="modal" data-target="#ModalEdit<?php echo $pengguna_id;?>"><span class="fa fa-pencil"></span></a>
              <a class="btn" data-toggle="modal" data-target="#ModalHapus<?php echo $pengguna_id;?>"><span class="fa fa-trash"></span></a>
            </td>
          </tr>
       <?php endforeach;?>
      </table>


      <!--Modal Add Pengguna-->
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="myModalLabel">Add Pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="text-align: left;"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'pengguna/simpan_pengguna'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">

                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xnama" class="form-control" id="inputUserName" placeholder="Nama Lengkap" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Jenis Kelamin</label>
                                        <div class="col-sm-7">
                                           <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="L" name="xjenkel" checked>
                                                <label for="inlineRadio1"> Laki-Laki </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="P" name="xjenkel">
                                                <label for="inlineRadio2"> Perempuan </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Username</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xusername" class="form-control" id="inputUserName" placeholder="Username" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                                        <div class="col-sm-7">
                                            <input type="password" name="xpassword" class="form-control" id="inputPassword3" placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword4" class="col-sm-4 control-label">Ulangi Password</label>
                                        <div class="col-sm-7">
                                            <input type="password" name="xpassword2" class="form-control" id="inputPassword4" placeholder="Ulangi Password" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Level</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="xlevel" required>
                                                <option value="1">Administrator</option>
                                                <option value="2">Author</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
                                        <div class="col-sm-7">
                                            <input type="file" name="filefoto" required/>
                                        </div>
                                    </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
      <!-- End modal add pengguna -->

      <?php foreach ($data->result_array() as $i) :
              $pengguna_id=$i['pengguna_id'];
              $pengguna_nama=$i['pengguna_nama'];
              $pengguna_jenkel=$i['pengguna_jenkel'];
              $pengguna_username=$i['pengguna_username'];
              $pengguna_password=$i['pengguna_password'];
              $pengguna_level=$i['pengguna_level'];
              $pengguna_photo=$i['pengguna_photo'];
            ?>
  <!--Modal Edit Pengguna-->
        <div class="modal fade" id="ModalEdit<?php echo $pengguna_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Edit Pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="text-align: left;"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'pengguna/update_pengguna'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Nama</label>
                                        <div class="col-sm-7">
                      <input type="hidden" name="kode" value="<?php echo $pengguna_id;?>"/>
                                            <input type="text" name="xnama" class="form-control" id="inputUserName" value="<?php echo $pengguna_nama;?>" placeholder="Nama Lengkap" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Jenis Kelamin</label>
                                        <div class="col-sm-7">
                    <?php if($pengguna_jenkel=='L'):?>
                                           <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="L" name="xjenkel" checked>
                                                <label for="inlineRadio1"> Laki-Laki </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="P" name="xjenkel">
                                                <label for="inlineRadio2"> Perempuan </label>
                                            </div>
                    <?php else:?>
                      <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="L" name="xjenkel">
                                                <label for="inlineRadio1"> Laki-Laki </label>
                                            </div>
                                            <div class="radio radio-info radio-inline">
                                                <input type="radio" id="inlineRadio1" value="P" name="xjenkel" checked>
                                                <label for="inlineRadio2"> Perempuan </label>
                                            </div>
                    <?php endif;?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Username</label>
                                        <div class="col-sm-7">
                                            <input type="text" name="xusername" class="form-control" value="<?php echo $pengguna_username;?>" id="inputUserName" placeholder="Username" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword3" class="col-sm-4 control-label">Password</label>
                                        <div class="col-sm-7">
                                            <input type="password" name="xpassword" class="form-control" id="inputPassword3" placeholder="Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputPassword4" class="col-sm-4 control-label">Ulangi Password</label>
                                        <div class="col-sm-7">
                                            <input type="password" name="xpassword2" class="form-control" id="inputPassword4" placeholder="Ulangi Password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Level</label>
                                        <div class="col-sm-7">
                                            <select class="form-control" name="xlevel" required>
                      <?php if($pengguna_level=='1'):?>
                                                <option value="1" selected>Administrator</option>
                                                <option value="2">Author</option>
                      <?php else:?>
                        <option value="1">Administrator</option>
                                                <option value="2" selected>Author</option>
                      <?php endif;?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputUserName" class="col-sm-4 control-label">Photo</label>
                                        <div class="col-sm-7">
                                            <input type="file" name="filefoto"/>
                                        </div>
                                    </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Update</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
  <?php endforeach;?>



      <?php foreach ($data->result_array() as $i) :
              $pengguna_id=$i['pengguna_id'];
              $pengguna_nama=$i['pengguna_nama'];
              $pengguna_jenkel=$i['pengguna_jenkel'];
              $pengguna_username=$i['pengguna_username'];
              $pengguna_password=$i['pengguna_password'];
              $pengguna_level=$i['pengguna_level'];
              $pengguna_photo=$i['pengguna_photo'];
            ?>
  <!--Modal Hapus Pengguna-->
        <div class="modal fade" id="ModalHapus<?php echo $pengguna_id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="myModalLabel">Hapus Pengguna</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="text-align: left;"><span aria-hidden="true"><span class="fa fa-close"></span></span></button>
                    </div>
                    <form class="form-horizontal" action="<?php echo base_url().'pengguna/hapus_pengguna'?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
              <input type="hidden" name="pengguna_photo" value="<?php echo $pengguna_photo;?>"/>
                            <!-- <p>Apakah Anda yakin mau menghapus Pengguna <b><?php echo $pengguna_nama;?></b> ?</p> -->
              <input type="hidden" name="kode" value="<?php echo $pengguna_id;?>"/>
                            <p>Apakah Anda yakin mau menghapus Pengguna <b><?php echo $pengguna_nama;?></b> ?</p>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary btn-flat" id="simpan">Hapus</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
  <?php endforeach;?>


    </div>
  </div>
</div>

<?php
    $this->load->view('admin/v_footer');
?>