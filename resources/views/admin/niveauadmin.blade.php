<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Niveau</title>
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
        <h4 class="card-title">Niveau</h4>
        <form class="form-sample" method="POST" action="{{ route('niveaux.store') }}" >
          {{csrf_field()}}
          <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Nom</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="nom">
                      <option>tronc commun scientique</option>
                      <option>1bac</option>
                      <option>2bac</option>
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
    <h4 class="card-title">Table Niveaux</h4>
    <table class="table table-striped display"  id="example">
      <thead>
        <tr>
          <th> #</th>
          <th> Nom </th>
          <th>option</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($niveaux as $niveau)
        <tr>
            <td>{{$niveau->ID_Niveau}}</td>
            <td><a href="#" class="editable" data-pk="{{$niveau->ID_Niveau}}" data-column="nom"type="text">{{$niveau->nom}}</a></td>
           <td>
               <a href="{{url('deleteniveau/'.$niveau->ID_Niveau)}}" class="text-danger">Delete</a> 
            </td>
        </tr>  
        @endforeach
      </tbody>
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
      url: '/admin/niveau/update',
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