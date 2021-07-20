<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">

    <!-- Sidebar user panel (optional) -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?php echo base_url('assets/uploads/images/foto_profil/' . $userdata->photo); ?>" class="img-circle">
      </div>
      <div class="pull-left info">
        <p><?php echo $this->session->userdata('username') ?></p>
      </div>
    </div>


    <!-- Sidebar Menu -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">HEADER</li>
      <!-- Optionally, you can add icons to the links -->
      <li class="active"><a href="<?= base_url() ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
      <li><a href="<?= base_url('/rapor') ?>"><i class="fa fa-users"></i> <span>Rapor</span></a></li>

      <li><a href="<?= base_url('/admin/person') ?>"><i class="fa fa-users"></i> <span>Person</span></a></li>
      <!-- <li><a href="<?= base_url('/member/diagram') ?>"><i class="fa fa-users"></i> <span>Diagram</span></a></li>

-->
    </ul>
    <!-- /.sidebar-menu -->
  </section>
  <!-- /.sidebar -->
</aside>