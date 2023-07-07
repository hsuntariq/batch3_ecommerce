<style>
    .sidebar {
        transform: translateX(-100%);
        transition: all 0.8s
    }

    .show {
        transform: translateX(0)
    }
</style>
<nav class="navbar navbar-expand-lg bg-body-tertiary" style="position: sticky; top:0; z-index:22">
    <div class="container-fluid">
        <a href=""><img width="70px"
                src="https://th.bing.com/th/id/OIP.k4OhTd8IVIGRnxKpkA-6oAHaHa?pid=ImgDet&w=5120&h=5120&rs=1"
                alt=""></a>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="/login">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/register">SignUp</a>
                    </li>
                @endguest
                @auth
                    <li class="nav-item d-flex">
                        <img style="clip-path: circle()" width="40px" src="{{asset('storage/' . auth()->user()->image)}}" alt="">
                        <a class="nav-link text-capitalize fw-bold" href="#">welcome <span style="color: hotpink">
                                {{ auth()->user()->username }}
                            </span>
                        </a>
                    </li>
                    <form class="d-flex justify-content-center" action="/logout" method="POST">
                        @csrf
                        <button style="background: transparent;border:none" class="d-flex justify-content-center"
                            type="submit">
                            <i class="fs-4 text-danger m-auto bi bi-power"></i>
                        </button>
                    </form>
                @endauth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                    </a>

                    <ul class="dropdown-menu">

                        <li><a class="dropdown-item" href="#">
                                Update Details
                            </a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>


                    </ul>

                </li>

            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <a href="/view-cart" class="text-dark"> <i class="bi bi-cart fs-3 ms-5"></i></a>

            <i class="menu bi bi-list fs-3 ms-2" style="cursor: pointer"></i>
        </div>
    </div>
</nav>

<script>
    let menu = document.querySelector('.menu');
    let sidebar = document.querySelector('.sidebar')
    menu.addEventListener('click', () => {
        sidebar.classList.toggle('show')
    })
</script>
