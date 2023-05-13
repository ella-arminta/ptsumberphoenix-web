<!-- Navbar -->
<nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar"
            aria-controls="offcanvasDarkNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar"
            aria-labelledby="offcanvasDarkNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Admin Panel</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="home.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="shop.php">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="update.php">Update</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="messages.php">Messages</a>
                    </li>
                    <?php
                        $stmt=$conn->prepare("SELECT * FROM admin where adm_id=? and master = 1");
                        $stmt->execute([$_SESSION['admin_id']]);
                        if($stmt->rowCount() > 0):
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="adminLog.php">Admin Log</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="addAdmin.php">add Admin</a>
                    </li>
                    <?php endif;?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="api/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>