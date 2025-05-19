<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/">
            <img src="/assets/images/aastu-logo.png" alt="avatar" class="rounded-circle me-2" width="30" height="30">

            AASTUINFO
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarScroll">
            <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
                <li class="nav-item">
                    <a class="nav-link <?= $_SERVER['REQUEST_URI'] === "/users" ? "active custom-bottom-border" : "" ?>"
                        href="/users">Users</a>
                </li>
                <?php if (isset($_SESSION['user'])): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $_SERVER['REQUEST_URI'] === "/posts" ? "active custom-bottom-border" : "" ?>"
                            href="/posts">Posts</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Student Life
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="/clubs">Clubs</a></li>
                        <li><a class="dropdown-item" href="#">Blocks</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Religious Association</a></li>
                        <li><a class="dropdown-item" href="/admission">Admission</a></li>
                        <li><a class="dropdown-item" href="/academics">Academics</a></li>
                        <li><a class="dropdown-item" href="/student-union">Student-Union</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active <?= $_SERVER['REQUEST_URI'] === "/about" ? "active custom-bottom-border" : "" ?>"
                        aria-current="page" href="#">About us</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-outline-success" aria-disabled="true">Contct Us</a>
                </li>
            </ul>

            <!-- Search Form -->
            <form class="d-flex me-3" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>

            <!-- Profile Dropdown -->
            <ul class="navbar-nav ms-auto">
                <?php if (!isset($_SESSION['user'])): ?>
                    <li class="nav-item">
                        <a class="nav-link <?= $_SERVER['REQUEST_URI'] === "/login" ? "active custom-bottom-border" : "" ?>"
                            href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?= $_SERVER['REQUEST_URI'] === "/users/create" ? "active custom-bottom-border" : "" ?>"
                            href="/users/create">Register</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" id="profileDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="<?= $_SESSION['user']['profile_url'] ?>" alt="avatar" class="rounded-circle me-2"
                                width="30" height="30">
                            <span><?= $_SESSION['user']['full_name'] ?></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li><a href="/users/<?= $_SESSION['user']['id'] ?>" class="dropdown-item">Profile</a></li>
                            <!-- <li><a href="#" class="dropdown-item">Settings</a></li> -->
                            <li>
                                <hr class="dropdown-divider" />
                            </li>
                            <li>
                                <form action="/logout" method="POST">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button type="submit" class="dropdown-item text-danger">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>