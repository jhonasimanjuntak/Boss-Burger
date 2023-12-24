<div class="col-lg-3">
    <nav class="navbar navbar-expand-lg bg-body-tertiary rounded border mt-2">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">BossBurger</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close" style="width: 50px;"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1">
                        <li class="nav-item">
                            <a class="nav-link ps-3 <?php echo ((isset($_GET['x']) && $_GET['x'] == 'home') || !isset($_GET['x'])) ? 'active link-light bg-success' : 'link-dark'; ?>" aria-current="page" href="home"><i class="bi bi-house-door"></i> Dashboard</a>
                        </li>


                        <?php if($hasil['level']==1 || $hasil['level']==3) { ?>

                        <li class="nav-item">
                            <a class="nav-link ps-3 <?php echo (isset($_GET['x']) && $_GET['x'] == 'menu') ? 'active link-light bg-success' : 'link-dark'; ?>" href="menu"><i class="bi bi-journal-text"></i> Menu</a>
                        </li>
                        <?php }?>

                        <?php if($hasil['level']==1) { ?>
                        <li class="nav-item">
                            <a class="nav-link ps-3 <?php echo (isset($_GET['x']) && $_GET['x'] == 'katmenu') ? 'active link-light bg-success' : 'link-dark'; ?>" href="katmenu"><i class="bi bi-tags"></i> Kategori</a>
                        </li>
                        <?php }?>



                        <?php if($hasil['level']==1 || $hasil['level']==2 || $hasil['level']==3) { ?>

                        <li class="nav-item">
                            <a class="nav-link ps-3 <?php echo (isset($_GET['x']) && $_GET['x'] == 'order') ? 'active link-light bg-success' : 'link-dark'; ?>" href="order"><i class="bi bi-cart3"></i> Pesan</a>
                        </li>
                        <?php }?>


                        <?php if($hasil['level']==1 || $hasil['level']==4) { ?>
                        <li class="nav-item">
                            <a class="nav-link ps-3 <?php echo (isset($_GET['x']) && $_GET['x'] == 'dapur') ? 'active link-light bg-success' : 'link-dark'; ?>" href="dapur"><i class="bi bi-hourglass"></i>  Dapur</a>
                        </li>
                        <?php } ?>



                        <?php if($hasil['level']==1) { ?>

                        <li class="nav-item">
                            <a class="nav-link ps-3 <?php echo (isset($_GET['x']) && $_GET['x'] == 'user') ? 'active link-light bg-success' : 'link-dark'; ?>" href="user"><i class="bi bi-person-badge-fill"></i> User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link ps-3 <?php echo (isset($_GET['x']) && $_GET['x'] == 'report') ? 'active link-light bg-success' : 'link-dark'; ?>" href="report"><i class="bi bi-clipboard-data"></i> Report</a>
                        </li>

                        <?php } ?>


                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>