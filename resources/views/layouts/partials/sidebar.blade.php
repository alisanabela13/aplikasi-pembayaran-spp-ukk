<div class="main-sidebar pb-5">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand mt-4 mb-0 mt-2">
            <h2><a href="{{route('home')}}">SPP-Ku</a></h2>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <small><a href="{{route('home')}}">SPP-Ku</a></small>
          </div>
      <br/>
      <ul class="sidebar-menu">
        @php $role = auth()->user()->role; @endphp
        
        <li class="menu-header">MENU UTAMA</li>
  
        <li class="nav-item {{Request::segment(1)=='home' ?'active':''}}">
          <a class="nav-link" href="{{route('home')}}" aria-expanded="false">
            <i class="fas fa-home"></i> <span>Dasbor</span>
          </a>
        </li>

       

        @if ( $role === 'Admin')
        <li class="nav-item {{Request::segment(1)=='petugas' ?'active':''}}">
            <a class="nav-link" href="{{route('petugas')}}">
                <i class="far fa-address-card"></i><span>Petugas</span>
            </a>
          </li>
        <li class="nav-item {{Request::segment(1)=='laporan' ?'active':''}}">
          <a class="nav-link" href="{{route('laporan')}}">
            <i class="fas fa-file"></i><span>Laporan</span>
          </a>
        </li>

        
        <li class="nav-item {{Request::segment(1)=='petunjuk' ?'active':''}}">
            <a class="nav-link" href="{{route('petunjuk')}}">
                <i class="fas fa-search-dollar"></i><span>Petunjuk Pembayaran</span>
            </a>
          </li>
        
        @endif

      @if ( $role === 'Admin' || $role === 'Petugas')
      <li class="menu-header"> MENU SPP</li>
          @if ($role === 'Admin')
          <li class="nav-item {{Request::segment(1)=='spp' ?'active':''}}">
            <a class="nav-link" href="{{route('spp')}}">
              <i class="fas fa-dollar-sign"></i><span>SPP</span>
            </a>
          </li>
          @endif

      <li class="dropdown{{ (Request::segment(1) === 'bayarlunas' || Request::segment(1) === 'belumverif' || Request::segment(1) === 'bayartolak' ) ? ' active' : '' }}">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-money-bill-wave"></i><span>Data Pembayaran</span></a>
        <ul class="dropdown-menu{{ (Request::segment(1) === 'bayarlunas' || Request::segment(1) === 'belumverif' || Request::segment(1) === 'bayartolak' ) ? ' show' : '' }}">
          <li class="nav-item  {{Request::segment(1)=='bayarlunas' ?'active':''}}">
            <a class="nav-link" href="{{route('lunas')}}" aria-expanded="false">
              <span>Lunas</span>
            </a>
          </li>
          <li class="nav-item  {{Request::segment(1)=='belumverif' ?'active':''}}">
            <a class="nav-link" href="{{route('belumverif')}}" aria-expanded="false">
              <span>Belum Terverifikasi</span>
            </a>
          </li>
          <li class="nav-item  {{Request::segment(1)=='bayartolak' ?'active':''}}">
            <a class="nav-link" href="{{route('tolak')}}" aria-expanded="false">
              <span>DiTolak</span>
            </a>
          </li>
          
        </ul>
      </li>
      @endif

      @if ( $role === 'Admin')
      <li class="menu-header">DATA SISWA</li>
      
      <li class="nav-item {{Request::segment(1)=='siswa' ?'active':''}}">
        <a class="nav-link" href="{{route('siswa')}}">
            <i class="fas fa-users"></i><span>Siswa</span>
        </a>
      </li>

      <li class="dropdown{{ (Request::segment(1) === 'tapel' || Request::segment(1) === 'jenjang' || Request::segment(1) === 'prodi'|| Request::segment(1) === 'kelas') ? ' active' : '' }}">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-database"></i> <span>Data Lainnya</span></a>
        <ul class="dropdown-menu{{ (Request::segment(1) === 'tapel' || Request::segment(1) === 'jenjang' || Request::segment(1) === 'prodi'| Request::segment(1) === 'kelas' ) ? ' show' : '' }}">
          <li class="nav-item  {{Request::segment(1)=='tapel' ?'active':''}}">
            <a class="nav-link" href="{{route('tapel')}}" aria-expanded="false">
              <span>Tahun Ajaran</span>
            </a>
          </li>
          <li class="nav-item  {{Request::segment(1)=='jenjang' ?'active':''}}">
            <a class="nav-link" href="{{route('jenjang')}}" aria-expanded="false">
              <span>Jenjang</span>
            </a>
          </li>
          <li class="nav-item  {{Request::segment(1)=='prodi' ?'active':''}}">
            <a class="nav-link" href="{{route('prodi')}}" aria-expanded="false">
              <span>Prodi</span>
            </a>
          </li>
          <li class="nav-item  {{Request::segment(1)=='kelas' ?'active':''}}">
            <a class="nav-link" href="{{route('kelas')}}" aria-expanded="false">
              <span>Kelas</span>
            </a>
          </li>
          
        </ul>
      </li>
      @endif

      @if ($role === 'Siswa')
      <li class="menu-header">PEMBAYARAN SPP</li>

      <li class="nav-item {{Request::segment(1)=='bayar' ?'active':''}}">
        <a class="nav-link" href="{{route('bayar.create')}}">
            <i class="fas fa-hand-holding-usd"></i><span>Bayar SPP</span>
        </a>
      </li>

      <li class="nav-item {{Request::segment(1)=='historypembayaran' ?'active':''}}">
        <a class="nav-link" href="{{route('history.siswa')}}">
            <i class="fas fa-history"></i><span>History Pembayaran</span>
        </a>
      </li>
      @endif
    </aside>
  </div>
  