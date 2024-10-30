<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

<style>
    .offcanvas-half {
        width: 50% !important;
    }
</style>

<nav class="navbar navbar-expand-md" style="background-color: #17153B;">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="#" style="width: 150px; font-weight: bold;">
            <h1>BanRos</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-end offcanvas-half" style="background-color: rgb(46, 89, 189);" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title text-white" id="offcanvasNavbarLabel">Navigasi Bar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3 text-white">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li>
                        <a class="nav-link text-white" href="">
                            <i class="fas fa-solid fa-file-invoice"></i> Jadwal
                        </a>
                    </li>
                    <li>
                        <a class="nav-link text-white" href="{{ route('fields.indexWithoutFieldId') }}">
                            <i class="fas fa-solid fa-file-invoice"></i> Pesan
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
