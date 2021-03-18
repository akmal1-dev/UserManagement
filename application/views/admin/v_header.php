<!DOCTYPE html>
<html>
<head>
  <title>Admin - Sistem Informasi yayasan ILS</title>
  <!-- css bootstrap -->
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.css' ?>">

  <!-- css datatables -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/DataTables/datatables.css' ?>">

  <!-- icon font awesome -->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/awesome/css/font-awesome.css' ?>">

  <!-- jquery dan bootstrap js -->
  <script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.js' ?>"></script>
  <script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js' ?>"></script>
  
  <!-- js datatables -->
  <script type="text/javascript" src="<?php echo base_url().'assets/DataTables/datatables.js' ?>"></script>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <?php if ($this->session->userdata('level')=='1') { ?>
    <div class="container-fluid">
      <a class="navbar-brand" href="">Logo</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url().'dashboard';?>"><i class=""></i> Dashboard</a>
          </li>
        
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url().'pengguna'; ?>"><i class=""></i> Pengguna</a>
          </li>
          
        </ul>
        <?php
              $id_admin=$this->session->userdata('idadmin');
              $q=$this->db->query("SELECT * FROM tbl_pengguna WHERE pengguna_id='$id_admin'");
              $c=$q->row_array();
          ?>
        <span class="navbar-text mr-3 text-center">
        Halo <?php echo $c['pengguna_nama'];?> 
          
        </span>

        <a href="<?php echo base_url().'login/logout' ?>" class="btn btn-outline-light ml-1"><i class="fa fa-power-off"></i> KELUAR</a>

      </div>
    </div>

    <?php }else { ?>
    <div class="container-fluid">
      <a class="navbar-brand" href="">Logo</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url().'dashboard';?>"><i class=""></i> Dashboard</a>
          </li>
          
        </ul>
        <?php
              $id_admin=$this->session->userdata('idadmin');
              $q=$this->db->query("SELECT * FROM tbl_pengguna WHERE pengguna_id='$id_admin'");
              $c=$q->row_array();
          ?>
        <span class="navbar-text mr-3 text-center">
        Halo <?php echo $c['pengguna_nama'];?> 
          
        </span>

        <a href="<?php echo base_url().'login/logout' ?>" class="btn btn-outline-light ml-1"><i class="fa fa-power-off"></i> KELUAR</a>

      </div>
    </div>
    <?php }?>
  </nav>

  <br/>
  <br/> 