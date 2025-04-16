<?php
include_once 'head.php';
$hideNavBarPages = array(
    "login.php"
);
$icons = array(
    'calendar' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16">
  <path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
  <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
</svg>',
);
?>
<nav class="navbar navbar-expand-lg sticky-top navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="./assets/img/myclean-logo.svg" alt="MyClean Logo" width="120" height="50">
        </a>

        <div class="collapse navbar-collapse d-flex" id="navbarItemsRight">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Feature</a>
                </li>


            </ul>
            <?php
            if (!in_array(basename($_SERVER['PHP_SELF']), $hideNavBarPages)) {
                ?>
                <!--Check whether it is logged in, then decide showing or not-->
                <?php if (
                    !isset($_SESSION['role'])
                ) { ?>
                    <ul class="navbar-nav" id="navGroupRight">
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Signup</a>
                        </li>
                    </ul>
                <?php } else { ?>
                    <ul class="navbar-nav" id="navGroupRight">
                        <li class="nav-item dropdown navbar-text">
                        <span class="dropdown-toggle" id="UsernameDropdown" role="button" data-bs-toggle="dropdown"
                              aria-expanded="false">Hello, <?= $_SESSION['name'] ?></span>
                            <ul class="dropdown-menu" aria-labelledby="UsernameDropdown">
                                <li><a class="dropdown-item" href="#">Dashboard</a></li>
                                <li><a class="dropdown-item" href="#">Order</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                    <?php
                }
            }
            ?>
        </div>

    </div>
</nav>