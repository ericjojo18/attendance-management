<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="nav-profile-image">
            <img src="{{asset('assets/images/faces/face1.jpg')}}" alt="profile">
            <span class="login-status online"></span>
            <!--change to offline or busy as needed-->
          </div>
          <div class="nav-profile-text d-flex flex-column">
            <span class="font-weight-bold mb-2">{{Auth::user()->prenom}} {{Auth::user()->nom}}</span>
            @foreach(auth()->user()->roles as $role)
            <div class="badge badge-primary ">{{$role->name}}</div>
            @endforeach
          </div>
          <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
        </a>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="{{ route('presence.index') }}">
          <span class="menu-title">Dashboard</span>
          <i class="mdi mdi-home menu-icon"></i>
        </a>
      </li>
      @can("admin")
      <li class="nav-item">
        <a class="nav-link" href="{{ route('profil.view') }}">
          <span class="menu-title">Profil</span>
          <i class="mdi mdi-account menu-icon"></i>
        </a>
      </li>
      @endcan
     
      {{-- <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
          <span class="menu-title">Basic UI Elements</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-crosshairs-gps menu-icon"></i>
        </a>
        <div class="collapse" id="ui-basic">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
          </ul>
        </div>
      </li> --}}
      @can("formateur")
      <li class="nav-item">
        <a class="nav-link" href="{{ route('reference.index') }}">
          <span class="menu-title">Referentiel</span>
          <i class="mdi mdi-contacts menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('paternaire.index') }}">
          <span class="menu-title">Partenaire</span>
          <i class="mdi mdi-contacts menu-icon"></i>
        </a>
      </li>
      
        
      <li class="nav-item">
        <a class="nav-link" href="{{ route('formation.index') }}">
          <span class="menu-title">Formation</span>
          <i class="mdi mdi-format-list-bulleted menu-icon"></i>
        </a>
      </li>
     
      <li class="nav-item">
        <a class="nav-link" href="{{ route('apprenant.index') }}">
          <span class="menu-title">Apprenant</span>
          <i class="mdi mdi-chart-bar menu-icon"></i>
        </a>
      </li>
      @endcan
     
      @can("apprenant")
      <li class="nav-item">
        <a class="nav-link" href="{{ route('emerge.index') }}">
          <span class="menu-title">EMARGEMENT</span>
          <i class="mdi mdi-chart-bar menu-icon"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('emerge.presenc') }}">
          <span class="menu-title">Voir emargement</span>
          <i class="mdi mdi-chart-bar menu-icon"></i>
        </a>
      </li>
      @endcan
      @can("formateur")
      <li class="nav-item">
        <a class="nav-link" href="{{ route('emerge.presence') }}">
          <span class="menu-title">Presence</span>
          <i class="mdi mdi-chart-bar menu-icon"></i>
        </a>
      </li>
      @endcan
      
      {{-- <li class="nav-item">
        <a class="nav-link" href="pages/tables/basic-table.html">
          <span class="menu-title">Tables</span>
          <i class="mdi mdi-table-large menu-icon"></i>
        </a>
      </li> --}}
      {{-- <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages">
          <span class="menu-title">Sample Pages</span>
          <i class="menu-arrow"></i>
          <i class="mdi mdi-medical-bag menu-icon"></i>
        </a>
        <div class="collapse" id="general-pages">
          <ul class="nav flex-column sub-menu">
            <li class="nav-item"> <a class="nav-link" href="pages/samples/blank-page.html"> Blank Page </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Login </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> Register </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-404.html"> 404 </a></li>
            <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> 500 </a></li>
          </ul>
        </div>
      </li> --}}
    </ul>
  </nav>