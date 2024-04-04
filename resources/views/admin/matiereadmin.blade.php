<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Matiere</title>
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
        <h4 class="card-title">Matiere</h4>
        <form class="form-sample"method="POST" action="{{ route('matieres.store') }}" >
          {{csrf_field()}}
          <div class="row">
                <div class="col-md-6">
                  <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Nom</label>
                    <div class="col-sm-9">
                      <select class="form-control" name="nom">
                        <option>math</option>
                        <option>physique</option>
                        <option>svt</option>
                        <option>francais</option>
                        <option>arabe</option>
                        <option>Education islamique</option>
                        <option>anglais</option>
                        <option>informatique</option>
                        <option>histoire geo</option>
                        <option>EPS</option>
                        <option>philo</option>
                        <option>eco</option>
                        <option>droit</option>
                        <option>conta</option>
                        <option>orga</option>
                      </select>
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
    <h4 class="card-title">Table Matieres</h4>
    <table class="table table-striped display"  id="example">
      <thead>
        <tr>
          <th> #</th>
          <th> Nom </th>
          <th>option</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($matieres as $matiere)
        <tr>
            <td>{{$matiere->ID_Matiere}}</td>
            <td><a href="#" class="editable" data-pk="{{$matiere->ID_Matiere}}" data-column="nom"type="text">{{$matiere->nom}}</a></td>
           <td>
               <a href="{{url('deletematiere/'.$matiere->ID_Matiere)}}" class="text-danger">Delete</a> 
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
      url: '/admin/matiere/update',
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