<!DOCTYPE tml>
<html lang="en">
  <head>
  <title>Enseignant</title>
  @include('particals.head')
  </head>
  <body> 
    <div class="container-scroller">
    @include('particals.nav')
    <!-- form -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
        <div class="col-md-9 grid-margin stretch-card">
            <div class="card">
              <div class="card-body mx-auto text-center">
              <?php
  $profileImageSrc = !empty($prof->profil) ? $prof->profil : '/res/22_Profile.jpg';
  ?>
              <img class="img-lg rounded-circle border border-2 border-light" src="<?php echo $profileImageSrc; ?>" alt="Profile image">
                <h4 class="card-title">{{ $prof->nom }} {{ $prof->prenom }}</h4>
                <p class="card-description" style="margin-bottom: 0;"> proffesseur a zinith </p>
                <p class="card-description" id="matier" style="margin-bottom: 0;">{{$matiere->nom}}</p>
                <p class="card-description" > {{ $prof->email }} </p>
                <a class="link-secondary fw-lighter link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="compte" > Mon profile </a>
              </div>
            </div>
        </div>

        <div class="col-md-3 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
              <div class="row report-inner-cards-wrapper">
                      <div class="col-md-12 form-group">
                        <div class="inner-card-text">
                        <div class="report-title"> <i class="icon-people"></i> N° étudiants :</div>
                          <h4 id="etudiantC"> {{$countetudiant}} </h4>
                        </div>
                      </div>
                      <div class="col-md-12 form-group">
                        <div class="inner-card-text">
                        <div class="report-title"> <i class="icon-globe"></i> Classes :</div>
                          <h4 id="classC"> {{$nbrclasses}} </h4>
                        </div>
                      </div>
                      <div class="col-md-12 form-group">
                        <div class="inner-card-text">
                        <div class="report-title" > <i class="icon-drawer"></i> N° ressources :</div>
                          <h4  id="resourceCount"> {{$resourcesCount}} </h4>
                        </div>
                      </div>
                    </div>
              </div>
            </div>
        </div>


              <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
              <h4 class="card-title">Ressources</h4>
              <a class="link-secondary fw-lighter link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover" href="devoires" > Voir plus </a>
      <div class="row" style="margin-top: 1rem;">
      @foreach ($cours as $resource)
      <div class="col-md-6 shadow-sm rounded" style="padding: 1%;">
        <div class="row" style="align-items: center;justify-content: space-around;">
        <a class="col-sm-11 fw-bold" href="{{ url($resource->URL) }}" target="_blank" style="color: black;cursor: pointer;" onmouseover="this.style.textDecoration='none'"><i class="icon-notebook"></i>  {{ $resource->titre }}</a>
            <p class="col-sm-8">{{ \Carbon\Carbon::parse($resource->created_at)->format('Y-m-d') }}</p>
            <a  style="color: black;" onmouseover="this.style.textDecoration='none'" class="col-sm-3" ><p align="right">{{ $resource->classe->nom }}</p></a> 
        </div>
        </div>
        @endforeach
      </div>
     </div>
    </div>
   </div>
                </div>
            </div>
        </div>
    </div>
@include('particals.script')
  </body>
</html>