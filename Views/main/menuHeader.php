<ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <li>
                <a class="dropdown-item" href="<?= BASE_URL ?>/Views/botonExtra/index.php">
                    <i class="fa-solid fa-hand fa-shake" style="color: rgb(250, 241, 254); padding-left: 2%; padding-right:2%;">
                    </i>
                    Botón extra
                </a>

            </li>
            <li>
                <a class="dropdown-item" href="<?= BASE_URL ?>../sugerencias.php">
                    <i class="fa-solid fa-user-pen fa-fade" style="color: rgb(246, 255, 0); padding-left: 2%; padding-right:2%;"></i>

                    Sugerencias
                </a>
            </li>

            <li>
                <hr class="dropdown-divider" />
            </li>

            <li>
                <a class="dropdown-item" href="<?= BASE_URL ?>../index.php">
                    <i class="fa-solid fa-hand fa-shake" style="color: rgb(250, 241, 254); padding-left: 2%; padding-right:2%;">
                    </i>
                    Cerrar Sesión
                </a>

            </li>
        </ul>

    </li>
</ul>