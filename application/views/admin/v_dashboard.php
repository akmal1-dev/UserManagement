<?php
    $this->load->view('admin/v_header');
?>
<div class="container">
  <div class="jumbotron text-center">
    <div class="col-sm-8 mx-auto">
      <h1>Selamat datang!</h1>
      <?php
              $id_admin=$this->session->userdata('idadmin');
              $q=$this->db->query("SELECT * FROM tbl_pengguna WHERE pengguna_id='$id_admin'");
              $c=$q->row_array();
          ?>
      <p>
         Anda telah login sebagai <b><?php echo $c['pengguna_nama'];?> <?php if($c['pengguna_level']=='1'):?>
         <small>[Administrator]</small>
            <?php else:?>
              <small>user</small>
            <?php endif;?></b>  
         <!-- Anda telah login sebagai <b></b> [admin] -->
      </p>
    </div>
  </div>

  <div class="row">
    

  </div>
  
  
</div>

<?php
    $this->load->view('admin/v_footer');
?>