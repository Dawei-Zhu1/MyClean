<?php
include_once 'head.php';
$hideNavBarPages = array(
    "login.php"
)
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