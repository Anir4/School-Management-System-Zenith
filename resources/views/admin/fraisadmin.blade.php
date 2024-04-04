<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Frais</title>
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
        <h4 class="card-title">Frais</h4>
        <form class="form-sample"method="POST" action="{{ route('frai.store') }}" >
          {{csrf_field()}}
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
                  <label class="col-sm-3 col-form-label">montant a payee</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="montant"/>
                  </div>
                </div>
              </div>
              
             
             <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">payement</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="payement"/>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">reste</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control"name="reste" />
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
    <h4 class="card-title">Table Frais</h4>
    <table class="table table-striped display"  id="example">
      <thead>
        <tr>
          <th> #</th>
          <th> nom </th>
          <th> prenom </th>
          <th> montant a payee </th> 
          <th> payement</th>
          <th> reste</th>
          <th>option</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($frai as $frais)
        <tr>
            <td>{{$frais->ID_Frais}}</td>
            <td><a href="#" class="editable" data-pk="{{$frais->ID_Frais}}" data-column="nom" type="text">{{$frais-> etudiant->nom}}</a></td>
            <td><a href="#" class="editable" data-pk="{{$frais->ID_Frais}}" data-column="prenom" type="text">{{$frais-> etudiant->prenom}}</a></td>
            <td><a href="#" class="editable" data-pk="{{$frais->ID_Frais}}" data-column="montant"type="text">{{$frais->montant}}</a></td>
            <td><a href="#" class="editable" data-pk="{{$frais->ID_Frais}}" data-column="payement"type="text">{{$frais->payement}}</a></td>
            <td><a href="#" class="editable" data-pk="{{$frais->ID_Frais}}" data-column="reste"type="text">{{$frais->reste}}</a></td>
           <td>
               <a href="{{url('deletefrais/'.$frais->ID_Frais)}}" class="text-danger">Delete</a> 
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
      url: '/admin/frais/update',
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