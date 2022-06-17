<header class="navbar-light bg-white">
    <!-- Logo Nav START -->
    <nav class="navbar">
        <div class="container">
            <div class="d-flex justify-content-end w-100 px-4">
                <!-- Profile START -->
                <div class="dropdown my-2 ">
                    <a class="avatar avatar-sm p-0" href="#" id="profileDropdown" role="button"
                        data-bs-auto-close="outside" data-bs-display="static" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img class="avatar-img rounded-circle"
                            src="{{ session()->get('userImage') != '' ? '/uploads/' . session()->get('userImage') : '/img/user.png' }}"
                            alt="avatar">
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg-end shadow pt-3">
                        <!-- Profile info -->
                        <li class="px-3">
                            <div class="d-flex align-items-center">
                                <!-- Avatar -->
                                <div class="avatar me-3">
                                    <img class="avatar-img rounded-circle shadow"
                                        src="{{ session()->get('userImage') != '' ? '/uploads/' . session()->get('userImage') : '/img/user.png' }}"
                                        alt="avatar">
                                </div>
                                <div>
                                    <p class="h6">{{ session()->get('username') }}</p>
                                    <p class="small m-0">{{ session()->get('email') }}</p>
                                </div>
                            </div>
                            <hr>
                        </li>
                        <!-- Links -->
                        <li>
                            <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                data-bs-target="#logoutModal"><i class="bi bi-power fa-fw me-2"></i>Sign Out</a>
                        </li>
                    </ul>
                </div>
                <!-- Profile END -->
            </div>
        </div>
    </nav>
    <!-- Logo Nav END -->
</header>
