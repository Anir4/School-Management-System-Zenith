<header class="main_menu home_menu">
      <div class="row align-items-center">
          <div class="col-lg-12">
              <nav class="navbar navbar-expand-lg navbar-light sticky-top bg-body-tertiary">
                <div class="row justify-content-center align-items-center">
                  <div class="col-xl-11 d-flex align-items-center justify-content-between">
                     <h1 class="logo"><a href="index.html">Zenith</a></h1> </div></div>
                  <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                  </button>
                  <div class="collapse navbar-collapse main-menu-item justify-content-end"
                      id="navbarSupportedContent">
                      <ul class="navbar-nav align-items-center">
                          <li class="nav-item active">
                              <a class="nav-link" href="dashboard">Accueil</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="calendrie">Mon calendrier</a>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="Emploi">Mon Emploi</a>
                          </li>
                          <li class="nav-item dropdown">
                              <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 Ressources
                              </a>
                              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="cours">Mes Cours</a>
                                  <a class="dropdown-item" href="devoir">Mes Devoirs</a>
                              </div>
                          </li>
                          <li class="nav-item">
                              <a class="nav-link" href="examresultat">Mes notes</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="absence">Absence</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="notification" style="color: #18d26e;font-weight: 700;">Notification</a>
                      </li>
                        <li class="nav-item">
                          <a class="nav-link" style="color: red;font-weight: 700;" href="{{url('/logout')}}">Deconnecter</a>
                      </li>
                      </ul>
                  </div>
              </nav>
          </div>
      </div></div>
  </div>
</header>
{{-- <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="navbar-brand-wrapper d-flex align-items-center">
      <a class="navbar-brand brand-logo" href="#">
      @php
        $getheaderSetting =  App\Models\parametre::getSingle(); 
      @endphp
       @if (!empty($getheaderSetting->getlogo()))
            <img src="{{$getheaderSetting->getlogo() }}" alt="logo" class="logo-dark">
            @else <span>shool</span>
        @endif 

        
      </a>
      <a class="navbar-brand brand-logo-mini" href="#"><img src="/res/logo (2).png" alt="logo" /></a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
      <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Bienvenue</h5>
      <ul class="navbar-nav navbar-nav-right ml-auto">
        <form class="search-form d-md-block" action="#">
          <i class="icon-magnifier"></i>
          <input type="search" class="form-control" placeholder="Search Here" title="Search here">
        </form>
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
        <li class="nav-item nav-profile">
          <a href="#" class="nav-link">
            <div class="profile-image">
              <img class="img-xs rounded-circle" src="/res/profil.png" alt="profile image">
              <div class="dot-indicator bg-success"></div>
            </div>
            <div class="text-wrapper">
              <p class="designation"><br>Etudiant</p>

            </div>
          
          </a>
        </li>
        
        <li class="nav-item">
            <a class="nav-link" href="dashboard">
              <span class="menu-title">Etudiant</span>
              <i class="icon-screen-desktop menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="calendrie" >
              <span class="menu-title">Mon calendrier</span>
              <i class=" icon-calendar menu-icon"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="cours">
              <span class="menu-title">Mes cours</span>
              <i class=" icon-book-open menu-icon"></i>
            </a>
        </li>
          <li class="nav-item">
            <a class="nav-link" href="Emploi">
              <span class="menu-title">Mon Emploi</span>
              <i class=" icon-notebook menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="exam">
              <span class="menu-title">Mes Exams</span>
              <i class=" icon-pencil menu-icon"></i>
            </a>
        </li>
         <li class="nav-item">
            <a class="nav-link" href="examresultat">
              <span class="menu-title">Exams Resultat</span>
              <i class="icon-doc menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="absence">
              <span class="menu-title">Mon Absence</span>
              <i class="icon-user-unfollow menu-icon"></i>
            </a>
       
       
        <li class="nav-item">
            <a class="nav-link" href="devoir">
              <span class="menu-title">Mes devoirs</span>
              <i class=" icon-pencil menu-icon"></i>
            </a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{url('/logout')}}">
            <span class="menu-title">Deconnecter</span>
            <i class=" icon-logout menu-icon"></i>
          </a>
        </li>
      </ul>
    </nav>


     --}}