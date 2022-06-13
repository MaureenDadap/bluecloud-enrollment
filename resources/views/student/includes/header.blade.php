<header class="navbar-light sticky-top bg-white">
    <!-- Logo Nav START -->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Logo START -->
            <a class="navbar-brand d-flex align-items-center" href="/student/dashboard">
                <img class="navbar-brand-logo" src="../img/logo-title.png" alt="logo">
            </a>
            <!-- Logo END -->

            <!-- Responsive navbar toggler -->
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="bi bi-list"></span>
            </button>

            <!-- Main navbar START -->
            <div class="navbar-collapse collapse mx-auto" id="navbarCollapse">
                <!-- Nav Main menu START -->
                <ul class="navbar-nav navbar-nav-scroll mx-auto">
                    <!-- Nav item links-->
                    <a class="nav-link mx-2" href="/student/dashboard">Dashboard</a>
                    <a class="nav-link mx-2" href="/student/online-enrollment">Online Enrollment</a>
                    <a class="nav-link mx-2" href="/student/cor">Certificate of Enrollment</a>
                    <a class="nav-link mx-2" href="/student/clearance">Clearance</a>
                    <a class="nav-link mx-2" href="/student/payment-ledger">Payment Ledger</a>
                </ul>
                <!-- Nav Main menu END -->
            </div>
            <!-- Main navbar END -->

            <!-- Profile START -->
            <div class="dropdown ms-1 ms-lg-0">
                <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button" data-bs-auto-close="outside"
                    data-bs-display="static" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="avatar-img rounded-circle" src="../img/user.png" alt="avatar">
                </a>
                <ul class="dropdown-menu dropdown-animation dropdown-menu-end shadow pt-3"
                    aria-labelledby="profileDropdown">
                    <!-- Profile info -->
                    <li class="px-3">
                        <div class="d-flex align-items-center">
                            <!-- Avatar -->
                            <div class="avatar me-3">
                                <img class="avatar-img rounded-circle shadow" src="uploads/users/worker-blue.webp"
                                    alt="avatar">
                            </div>
                            <div>
                                <p class="h6">Lori Ferguson</p>
                                <p class="small m-0">example@gmail.com</p>
                            </div>
                        </div>
                        <hr>
                    </li>
                    <!-- Links -->
                    <li><a class="dropdown-item bg-primary-soft-hover" href="profile.php"><i
                                class="bi bi-person fa-fw me-2"></i>My Profile</a></li>
                    <li><a class="dropdown-item bg-danger-soft-hover" href="#" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop"><i class="bi bi-power fa-fw me-2"></i>Sign Out</a></li>
                </ul>
            </div>
            <!-- Profile START -->
        </div>
    </nav>
    <!-- Logo Nav END -->
</header>
