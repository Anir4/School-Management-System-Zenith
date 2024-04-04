<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Etudiant</title>
    @include('particals.head')
  </head>
  <body>
    @include('particals.nav')
<!-- form -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
<div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Etudiant</h4>
        <form class="form-sample"   method="POST" action="{{ route('etudiants.store') }}" >
          {{csrf_field()}}
          <p class="card-description"> Informations personnels </p>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nom</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control"name="nom" />
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Prenom</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="prenom" />
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="exemple@zenith.com" name="email"/>
                  </div>
                </div>
              </div>
          
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Date de naissance</label>
                <div class="col-sm-9">
                  <input  class="form-control" type="date"name="date_naissance" />
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">tele</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" placeholder="+212*********" name="tele"/>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">niveau</label>
              <div class="col-sm-9">
                <select class="form-control" name="ID_Niveau">
                    <option value="">Select</option>
                    @foreach ($getniveau as $niveau)
                    <option value="{{$niveau->ID_Niveau}}">{{$niveau->nom}}</option>
                    @endforeach
                  </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">classe</label>
              <div class="col-sm-9">
                <select class="form-control" name="ID_Class">
                    <option value="">Select</option>
                    @foreach ($getclasse as $classe)
                    <option value="{{$classe->ID_Class}}">{{$classe->nom}}</option>
                    @endforeach
                  </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">filiere</label>
                  <div class="col-sm-9">
                    <select class="form-control"name="filiere">
                      <option>TC</option>
                      <option>scmath</option>
                      <option>eco</option>
                      <option>scmathA</option>
                      <option>scex</option>
                      <option>scphysique</option>
                    </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">date inscription</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control" name="date_inscription">
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">password</label>
                  <div class="col-sm-9">
                    <input class="form-control" name="password" type="password" />
                  </div>
                </div>
              </div>
            </div>
              <div class="btfloat">
            <button type="submit" class="btn btn-inverse-success btn-fw">Ajouter</button>
          </div>
         </div>
        </form>
      </div>
    </div>
    
       <!-- table -->
<div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Table Etudiants</h4>
    <table class="table table-striped display"  id="example">
      <thead>
        <tr>
          <th> #</th>
          <th> Nom </th>
          <th> Prenom </th>
          <th> Email</th>
          <th> Date de naissance </th> 
          <th> Téléphone</th>
          <th> niveaux</th>
          <th> classes</th>
          <th> filieres</th>
          <th> date inscription</th>
          <th>option</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($getreco as $etudiant)
        <tr>

            <td>{{$etudiant->ID_Etudiant}}</td>
            <td><a href="#" class="editable" data-pk="{{$etudiant->ID_Etudiant}}" data-column="nom" type="text">{{$etudiant->nom}}</a></td>
            <td><a href="#" class="editable" data-pk="{{$etudiant->ID_Etudiant}}" data-column="prenom"type="text">{{$etudiant->prenom}}</a></td>
            <td><a href="#" class="editable" data-pk="{{$etudiant->ID_Etudiant}}" data-column="email"type="text">{{$etudiant->email}}</a></td>
            <td><a href="#" class="editable" data-pk="{{$etudiant->ID_Etudiant}}" data-column="date_naissance"type="text">{{$etudiant-> date_naissance}}</a></td>
            <td><a href="#" class="editable" data-pk="{{$etudiant->ID_Etudiant}}" data-column="tele"type="text">{{$etudiant-> tele}}</a></td>
            <td><a href="#" class="editable" data-pk="{{$etudiant->ID_Etudiant}}" data-column="ID_Niveau"type="text">{{$etudiant->niveau_nom}}</a></td>
            <td><a href="#" class="editable" data-pk="{{$etudiant->ID_Etudiant}}" data-column="ID_Class"type="text">{{$etudiant->class_nom}}</a></td>
            <td><a href="#" class="editable" data-pk="{{$etudiant->ID_Etudiant}}" data-column="filiere"type="text">{{$etudiant-> filiere}}</a></td>
            <td><a href="#" class="editable" data-pk="{{$etudiant->ID_Etudiant}}" data-column="date_inscription"type="text">{{$etudiant-> date_inscription}}</a></td>
            <td >
               <a href="{{url('deleteetudiant/'.$etudiant->ID_Etudiant)}}" class="text-danger">Delete</a> 
            </td>
        </tr>  
        @endforeach
      </tbody>
    </table>
  </div>
</div>
</div></div></div></div>
@include('particals.script')
<script>
  $.fn.editable.defaults.mode="inline";
  $.ajaxSetup({
    headers:{
      'X-CSRF-TOKEN':'{{csrf_token()}}'
    }
  })
  $('.editable').editable({
      type: 'text',
      url: '/admin/etudiant/update',
      ajaxOptions: {
          type: 'post', // Specify the HTTP method as PUT
      },
      params: function(params) {
          // Retrieve necessary data from the parent element
          var data = {};
          data['pk'] = $(this).data('pk');
          data['column'] = $(this).data('column'); // Pass the selected column
          data['value'] = params.value; // Pass the edited value
          return data;
      },
  });
  
    
    </script>
  </body>
</html>