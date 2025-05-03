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
                    <a class="nav-link" href="/academics">Academics</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/admission">Admission</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/student-union">Student Union</a>
                </li>
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
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">About us</a>
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
                <li class="nav-item">
                    <a class="nav-link" href="#">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Register</a>
                </li>

                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle d-flex align-items-center" id="profileDropdown"
                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="/assets/images/bonsa.jpeg" alt="avatar" class="rounded-circle me-2" width="30"
                            height="30">
                        <span>Doe John</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                        <li><a href="#" class="dropdown-item">Profile</a></li>
                        <li><a href="#" class="dropdown-item">Settings</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li><a href="#" class="dropdown-item text-danger">Logout</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>