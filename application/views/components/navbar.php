<?php
$ordernum = 0;
foreach ($this->cart->contents() as $items) {
  $ordernum++;
}
?>

<nav class="navbar navbar-light bg-light fixed-top navbar-expand-lg shadow">
  <div class="container-fluid">
    <span class="navbar-brand mb-0 h1" style="margin-left: 18px;">{ &nbsp;}&nbsp; MYSHOP</span>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0" style="margin-right: 110px;">
        <li class="nav-item me-3 li-hover p-2 border rounded">
          <a href="<?php echo site_url('Pdf') ?>" class="text-dark"><i class="bi bi-house"></i></a>
        </li>
        <li class="nav-item me-3 li-hover p-2 border rounded">
          <a class="text-dark d-flex align-items-center text-decoration-none" href="<?php echo site_url('Order') ?>">
            <i class="bi bi-bag me-2"></i>
            <p class="text-light mb-0 bg-danger ps-1 pe-1 rounded">
              <?php echo $ordernum ?>
            </p>
          </a>
        </li>
        <li class="nav-item me-3 li-hover p-2 border rounded">
          <div class="dropdown">
            <a class="text-dark d-flex text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false" href=""><i class="bi bi-person me-2"></i>
              <p class="mb-0"><?php echo $this->session->userdata('fullname'); ?></p>
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item lifont" href="<?php echo site_url('Login/signout'); ?>">ออกจากระบบ</a></li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </div>
</nav>