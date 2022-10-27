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
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle active" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">Home</a>
                        <ul class="dropdown-menu dropdown-menu-dark">
                            <li><a class="dropdown-item" href="./home.php">Home</a></li>
                            <li><a class="dropdown-item" href="./about.php">About</a></li>
                            <li><a class="dropdown-item" href="./business_fields.php">Business Fields</a></li>
                            <li><a class="dropdown-item" href="./why_us.php">Why Us</a></li>
                            <li><a class="dropdown-item" href="./statistic.php">Statistics</a></li>
                            <li><a class="dropdown-item" href="./team.php">Team</a></li>
                            <li><a class="dropdown-item" href="./testimonials.php">Testimonials</a></li>
                            <li><a class="dropdown-item" href="./faq.php">FAQ</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="product.php">Product</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="update.php">Update</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="addAdmin.php">add Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="api/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>