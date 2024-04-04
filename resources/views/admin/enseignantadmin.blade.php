<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Enseignant</title>
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
        <h4 class="card-title">Enseignant</h4>
        <form class="form-sample"  method="POST" action="{{ route('profs.store') }}" >
          {{csrf_field()}}
          <p class="card-description"> Informations personnels </p>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nom</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="nom"/>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Prenom</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="prenom"/>
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Email</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control"placeholder="exemple@zenith.com"name="email" />
                  </div>
                </div>
              </div>
            <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">tele</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control"placeholder="+212*********" name="tele" />
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">niveau</label>
              <div class="col-sm-9">
                <select class="form-control" name="niveau">
                    <option value="">Select</option>
                    @foreach ($getniveau as $niveau)
                    <option value="{{$niveau->nom}}">{{$niveau->nom}}</option>
                    @endforeach
                  </select>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">matiere</label>
              <div class="col-sm-9">
                <select class="form-control" name="ID_Matiere">
                    <option value="">Select</option>
                    @foreach ($getMatieres as $matiere)
                    <option value="{{$matiere->ID_Matiere}}">{{$matiere->nom}}</option>
                    @endforeach
                  </select>
            </div>
          </div>
        </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">salaire</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control"name="salaire" />
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">date d'inscription</label>
                  <div class="col-sm-9">
                    <input type="date" class="form-control"name="date_inscription" />
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
              </div></div>
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
    <h4 class="card-title">Table Enseignants</h4>
    <table class="table table-striped display"  id="example">
      <thead>
        <tr>
          <th> #</th>
          <th> Nom </th>
          <th> Prenom </th>
          <th> Email</th>
          <th> tele</th>
          <th> niveau</th>
          <th> matiere</th>
          <th> salaire</th>
          <th> date inscription</th>
          <th>option</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($getreco as $prof)
        <tr>
            <td>{{$prof->ID_Prof}}</td>
            <td><a href="#" class="editable" data-pk="{{$prof->ID_Prof}}" data-column="nom" type="text">{{$prof->nom}}</a></td>
            <td><a href="#" class="editable" data-pk="{{$prof->ID_Prof}}" data-column="prenom"type="text">{{$prof->prenom}}</a></td>
            <td><a href="#" class="editable" data-pk="{{$prof->ID_Prof}}" data-column="email"type="text">{{$prof->email}}</a></td>
            <td><a href="#" class="editable" data-pk="{{$prof->ID_Prof}}" data-column="tele"type="text">{{$prof-> tele}}</a></td>
            <td><a href="#" class="editable" data-pk="{{$prof->ID_Prof}}" data-column="niveau"type="text">{{$prof-> niveau}}</a></td>
            <td><a href="#" class="editable" data-pk="{{$prof->ID_Prof}}" data-column="ID_Matiere"type="text">{{$prof-> matiere_nom}}</a></td>
            <td><a href="#" class="editable" data-pk="{{$prof->ID_Prof}}" data-column="salaire"type="text">{{$prof-> salaire}}</a></td>
            <td><a href="#" class="editable" data-pk="{{$prof->ID_Prof}}" data-column="date_inscription"type="text">{{$prof-> date_inscription}}</a></td>
            <td >
               <a href="{{url('deleteprof/'.$prof->ID_Prof)}}" class="text-danger">Delete</a> 
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
      url: '/admin/enseignants/update',
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