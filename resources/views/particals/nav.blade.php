<nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex align-items-center">
      <a class="navbar-brand brand-logo" href="#">
      @php
        $getheaderSetting =  App\Models\parametre::getSingle(); 
      @endphp
       @if (!empty($getheaderSetting->getlogo()))
            <img src="{{$getheaderSetting->getlogo() }}" alt="logo" class="logo-dark">
            @else <span>shool</span>
        @endif 
        {{-- <img src="/res/logo (2).png" alt="logo" class="logo-dark" /> 
         --}}
        
      </a>
      <a class="navbar-brand brand-logo-mini" href="#"><img src="/res/logo (2).png" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
      <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Bienvenue</h5>
      <ul class="navbar-nav navbar-nav-right ml-auto">
        
      </ul>
      <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="icon-menu"></span>
      </button>
    </div>
  </nav>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
      <ul class="nav">
      @if($userType === 'admin')
      <li class="nav-item nav-profile">
        <a href="#" class="nav-link">
          <div class="text-wrapper">
            <p class="profile-name">{{ $admin->nom }} {{ $admin->prenom }}</p>
            <p class="designation">Admin</p>
          </div>
        </a>
      </li>
        
        <li class="nav-item">
            <a class="nav-link" href="/admin/dashboard">
              <span class="menu-title">Admin</span>
              <i class="icon-screen-desktop menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/admin/enseignants" >
              <span class="menu-title">Enseignants</span>
              <i class="icon-briefcase menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="raportEtudiants" >
              <span class="menu-title">Etudiant</span>
              <i class="icon-graduation menu-icon"></i>
            </a>
          </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basi" aria-expanded="false" aria-controls="ui-basi">
              <span class="menu-title">Ecole</span>
              <i class=" icon-home menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basi">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="classes">Classes</a></li>
                <li class="nav-item"> <a class="nav-link" href="matieres">Matieres</a></li>
                <li class="nav-item"> <a class="nav-link" href="niveaux">Niveaux</a></li>
                <li class="nav-item"> <a class="nav-link" href="Emploi">Emploi</a></li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="class_matiereadmin">
              <span class="menu-title">classe et matiere</span>
              <i class=" icon-tag menu-icon"></i>
            </a>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="frais">
              <span class="menu-title">Frais</span>
              <i class=" icon-wallet menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="exams">
              <span class="menu-title">Exams</span>
              <i class=" icon-docs menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="absences">
              <span class="menu-title">Absence</span>
              <i class=" icon-paper-clip menu-icon"></i>
            </a>
        <li class="nav-item">
            <a class="nav-link" href="notifications">
              <span class="menu-title">notifications</span>
              <i class="icon-bubbles menu-icon"></i>
            </a>
        </li>
       
        <li class="nav-item">
            <a class="nav-link" href="parametres">
              <span class="menu-title">Parametre</span>
              <i class="icon-globe menu-icon"></i>
            </a>
        </li>
              @elseif($userType === 'prof')
              <li class="nav-item nav-profile">
                <a href="#" class="nav-link">
                  <div class="text-wrapper">
                    <p class="profile-name">{{ $prof->nom }} {{ $prof->prenom }}</p>
                    <p class="designation">professeur</p>
                  </div>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/prof/dashboard" >
                  <span class="menu-title">Accueil</span>
                  <i class=" icon-home menu-icon"></i>
                </a>
              </li>
              
            <li class="nav-item">
                <a class="nav-link" href="/prof/notes">
                <span class="menu-title">Les notes</span>
                <i class="icon-book-open menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                  <span class="menu-title">Abssences</span>
                  <i class=" icon-paper-clip menu-icon"></i>
                </a>
                <div class="collapse" id="ui-basic">
                  <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="/prof/absence">Marker l'absences</a></li>
                    <li class="nav-item"> <a class="nav-link" href="/prof/report">Etudiant Report</a></li>
                  </ul>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/prof/devoires">
                  <span class="menu-title">Cours et Devoirs</span>
                  <i class="icon-doc menu-icon"></i>
                </a>
            </li>
            
    
            <li class="nav-item">
                <a class="nav-link" href="/prof/compte">
                  <span class="menu-title">Mon compte</span>
                  <i class="icon-globe menu-icon"></i>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="notifications">
                  <span class="menu-title">notifications</span>
                  <i class="icon-bubbles menu-icon"></i>
                </a>
            </li>
            @endif
            <li class="nav-item">
              <a class="nav-link" href="{{url('/logout')}}">
                <span class="menu-title">Deconnecter</span>
                <i class=" icon-logout menu-icon"></i>
              </a>
            </li>
      </ul>
      

    </nav>