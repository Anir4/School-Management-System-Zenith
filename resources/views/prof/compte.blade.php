<!DOCTYPE tml>
<html lang="en">
  <head>
  <title>Enseignant</title>
  @include('particals.head')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
  <body> 
    <div class="container-scroller">
    @include('particals.nav')
    <!-- form -->
        <div class="main-panel">
            <div class="content-wrapper">
            @include('layout.toasts')
                <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
              <div class="card-body">
               <center><h4 class="card-title">Information personnels</h4></center> 
               <p class="card-description"></p>
               <?php
  $profileImageSrc = !empty($prof->profil) ? $prof->profil : '/res/22_Profile.jpg';
  ?>
               <div class="mx-auto text-center" style="margin-bottom:3%;">
               <img id="profileImage" class="img-lg rounded-circle border border-2 border-light" src="<?php echo $profileImageSrc; ?>" alt="Profile image">
                </div>
                <form class="form-sample" method="POST" action="{{ url('updateCompte') }}">
                  @csrf
                  <div class="row">
                      <div class="col-md-6">
                          <div class="form-group row">
                              <label class="col-sm-3 col-form-label">ID</label>
                              <div class="col-sm-9">
                                  <input type="text" value="{{ $prof->ID_Prof }}" class="form-control" disabled/>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Nom</label>
                              <div class="col-sm-9">
                                  <input type="text" value="{{ $prof->nom }}" class="form-control" name="nom" />
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Prenom</label>
                              <div class="col-sm-9">
                                  <input type="text" value="{{ $prof->prenom }}" class="form-control" name="prenom"/>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Matiere</label>
                              <div class="col-sm-9">
                                  <input type="text" value="{{ $matiere->nom ?? '' }}" class="form-control" disabled/>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Email</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" value="{{ $prof->email }}" placeholder="exemple@zenit.com" name="email"/>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Telephone</label>
                              <div class="col-sm-9">
                                  <input type="text" class="form-control" value="{{ $prof->tele }}" placeholder="+212***" name="telephone"/>
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Salaire</label>
                              <div class="col-sm-9">
                                  <input type="text" value="{{ $prof->salaire }}" class="form-control" disabled />
                              </div>
                          </div>
                      </div>
                      <div class="col-md-6">
                          <div class="form-group row">
                              <label class="col-sm-3 col-form-label">Date d'inscription</label>
                              <div class="col-sm-9">
                                  <input type="text" value="{{ $prof->date_inscription }}" class="form-control" disabled />
                              </div>
                          </div>
                      </div>
                  </div>
                  <button type="submit" class="btn btn-inverse-success btn-fw">Mettre à jour</button>
              </form>
                </div>
                 </div>
              </div>
            </div>
               <!-- table -->
          </div></div></div>
            
            
@include('particals.script')

  </body>
  <script>
document.addEventListener("DOMContentLoaded", function() {
  const profileImage = document.getElementById('profileImage');

  profileImage.addEventListener('click', function() {
    const input = document.createElement('input');
    input.type = 'file';
    input.accept = 'image/*';
    input.onchange = function(event) {
      const file = event.target.files[0];
      const reader = new FileReader();
      reader.onload = function(e) {
        profileImage.src = e.target.result;

        const formData = new FormData();
        formData.append('image', file);
        formData.append('id', '{{ $prof->ID_Prof }}');

        fetch('/update-profile-image', {
          method: 'POST',
          body: formData,
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        })
        .then(response => {
          if (!response.ok) {
            throw new Error('Network response was not ok.');
          }
          return response.json();
        })
        .then(data => {
          console.log(data); // Optionally handle response from server
        })
        .catch(error => {
          console.error('There was a problem with your fetch operation:', error);
        });
      };
      reader.readAsDataURL(file);
    };
    input.click();
  });
});
</script>
</html>