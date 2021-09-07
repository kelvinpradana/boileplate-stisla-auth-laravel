<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">Kompetensi</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Badiklat</a>
        </div>
        <ul class="sidebar-menu">
       
            <li class="{{ (request()->is('home*')) ? 'active' : '' }}"><a class="nav-link" href="{{route('home')}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
        @if(auth::user()->level == '1')    
            <li class="nav-item dropdown  {{ (request()->is('user*','kanwil*','upt*','dilat*','pelatihan*','diklat*')) ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Master</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ (request()->is('user*')) ? 'active' : '' }}"><a class="nav-link" href="{{route('user')}}">User</a></li>
                    <li class="{{ (request()->is('kanwil*')) ? 'active' : '' }}"><a class="nav-link" href="{{route('kanwil')}}">Kanwil</a></li>
                    <li class="{{ (request()->is('upt*')) ? 'active' : '' }}"><a class="nav-link" href="{{route('upt')}}">UPT</a></li>
                    <li class="{{ (request()->is('diklat*')) ? 'active' : '' }}"><a class="nav-link" href="{{route('diklat')}}">Diklat</a></li>
                    <li class="{{ (request()->is('pelatihan*')) ? 'active' : '' }}"><a class="nav-link" href="{{route('pelatihan')}}">Pelatihan</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ (request()->is('carousel*','prolat*','setting*')) ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Setting</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ (request()->is('carousel*')) ? 'active' : '' }}"><a class="nav-link" href="{{route('carousel')}}">carousel</a></li>
                    <li class="{{ (request()->is('prolat*')) ? 'active' : '' }}"><a class="nav-link" href="{{route('prolat')}}">Prolat/Tahun</a></li>
                    <li class="{{ (request()->is('setting*')) ? 'active' : '' }}"><a class="nav-link" href="{{route('setting.index')}}">Pengumuman</a></li>
                </ul>
            </li>
            <li class="nav-item dropdown {{ (request()->is('laporan*')) ? 'active' : '' }}"">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>laporan</span></a>
                <ul class="dropdown-menu">
                       <li class="{{ (request()->is('laporan*')) ? 'active' : '' }}" ><a class="nav-link" href="{{route('laporan.index')}}">Ranking</a></li>
                </ul>
            </li>
        @endif
        @if(auth::user()->level == '1' || auth::user()->level == '0' )  
            <li class="{{ (request()->is('transaksi')) ? 'active' : '' }}"><a class="nav-link" href="{{route('transaksi')}}"><i class="fa fa-graduation-cap"></i> <span>Pelatihan</span></a></li>
            <li class="{{ (request()->is('transaksi/history')) ? 'active' : '' }}"><a class="nav-link" href="{{route('transaksi.history')}}"><i class="fa fa-history"></i> <span>History</span></a></li>
        @endif 
        <li class="{{ (request()->is('berita')) ? 'active' : '' }}"><a class="nav-link" href="{{route('beritas.index')}}"><i class="fa fa-graduation-cap"></i> <span>Berita</span></a></li>          
    </aside>
</div>