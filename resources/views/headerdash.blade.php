{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg px-4 py-3 sticky-top fixed-top shadow" style="background-color: #244459">
    <div class="container-fluid">
        <a class="navbar-brand fs-5 mx-2 d-flex align-items-center justify-content-center text-light fw-bold" href="/">
            <img src="https://cdn3d.iconscout.com/3d/premium/thumb/admin-access-6851932-5624860.png?f=webp" alt=""
                width="40" style="border-radius:55%;" class="px-2">ADMIN APPS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 px-2">
                    <li class="nav-item">
                        <a class="nav-link text-light fw-bold" href="/dashboard">Dashboard</a>
                    </li>
                </ul>
                <span class="navbar-text px-4">
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button type="submit" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt text-light fw-bold"></i>
                        </button>
                    </form>
                </span>
            </div>
        </div>
    </div>
</nav>
{{-- NAVBAR --}}
