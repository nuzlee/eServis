<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            {{-- <div class="sb-sidenav-menu-heading">Core</div> --}}
            {{-- <a class="nav-link" href="{{ route('dashboard') }}">
                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                Dashboard
            </a> --}}
            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages"
                aria-expanded="false" aria-controls="collapsePages">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-book-open"></i>
                </div>
                Menu Utama
                <div class="sb-sidenav-collapse-arrow">
                    <i class="fas fa-angle-down"></i>
                </div>
            </a>
            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-bs-parent="#sidenavAccordion">
                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">

                    <a class="nav-link " href="{{ url('/kenderaan/') }}">
                        Senarai Kenderaan
                        <div class="sb-sidenav-collapse-arrow">
                            {{-- <i class="fas fa-angle-down"></i> --}}
                        </div>
                    </a>

                    <a class="nav-link " href="{{ url('/pemandu') }}">
                        Senarai Pemandu
                        <div class="sb-sidenav-collapse-arrow">
                            {{-- <i class="fas fa-angle-down"></i> --}}
                            {{-- <i class="fa-solid fa-house"></i> --}}
                        </div>
                    </a>

                    <a class="nav-link " href="{{ url('/servis') }}">
                        Rekod Servis
                        <div class="sb-sidenav-collapse-arrow"></div>
                    </a>

                    <a class="nav-link " href="{{ url('/minyak') }}">
                        Rekod Minyak
                        <div class="sb-sidenav-collapse-arrow"></div>
                    </a>

                    <a class="nav-link " href="{{ url('/peranan') }}">
                        Peranan Pengguna
                        <div class="sb-sidenav-collapse-arrow"></div>
                    </a>

                </nav>
            </div>

        </div>
    </div>

    <!--Peranan Login-->

    <div class="sb-sidenav-footer">
        <div class="small">Login as : {{ Auth::user()->name }} | {{ Auth::user()->peranan }}</div>

    </div>
</nav>
