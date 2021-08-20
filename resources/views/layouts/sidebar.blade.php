<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Kompetensi</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Badiklat</a>
        </div>


        <ul class="sidebar-menu">
            <li><a class="nav-link" href="{{route('home')}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Master</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html">User</a></li>
                    <li><a class="nav-link" href="{{route('kanwil')}}">Kanwil</a></li>
                    <li><a class="nav-link" href="{{route('upt')}}">UPT</a></li>
                    <li><a class="nav-link" href="{{route('diklat')}}">Diklat</a></li>
                    <li><a class="nav-link" href="{{route('pelatihan')}}">Pelatihan</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Setting</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="layout-default.html">carousel</a></li>
                    <li><a class="nav-link" href="{{route('prolat')}}">Prolat/Tahun</a></li>
                    <!-- <li><a class="nav-link" href="layout-top-navigation.html">UPT</a></li> -->
                </ul>
            </li>
            <li><a class="nav-link" href="{{route('transaksi')}}"><i class="far fa-square"></i> <span>Pelatihan</span></a></li>
            <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>laporan</span></a>
                <ul class="dropdown-menu">
                    <li><a class="nav-link" href="bootstrap-alert.html">Pelatihan</a></li>
                </ul>
            </li>
    </aside>
</div>