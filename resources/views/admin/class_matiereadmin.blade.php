<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Classe</title>
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
      
        <h4 class="card-title">Ajouter une nouvelle liaison</h4>
        <form class="form-sample" method="POST" action="" >
            {{csrf_field()}}
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Classe</label>
                <div class="col-sm-9">
                    <select class="form-control" name="ID_Class">
                        <option value="">Select</option>
                        @foreach ($getClasse as $class)
                        <option value="{{$class->ID_Class}}">{{$class->nom}}</option>
                        @endforeach
                      </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label">Matiere</label>
                    <div class="col-sm-9">
                         @foreach ($getMatieres as $matiere)
                        <div class="form-check form-check-success">
                            <label class="form-check-label">
                              <input type="checkbox" class="form-check-input" name="ID_Matiere[]" value="{{$matiere->ID_Matiere}}" > {{$matiere->nom}} </label>
                          </div>
                           @endforeach


                            
                       
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label">cree par </label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="created_by"  />
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
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Table Classes</h4>
            <table class="table table-striped display"  id="example">
              <thead>
                <tr>
                  <th> #</th>
                  <th> Class </th>
                  <th> Matiere </th>
                  <th>option</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($getreco as $value)
                <tr>
                    <td>{{$value->ID_Class_matiere}}</td>
                    <td><a href="#" class="editable" data-pk="{{$value->ID_Class}}" data-column="ID_Class" type="text">{{$value->class_nom}}</a></td>
                    <td><a href="#" class="editable" data-pk="{{$value->ID_Matiere}}" data-column="ID_Matiere"type="text">{{$value->matiere_nom}}</a></td>
                   <td>
                       <a href="{{url('deleteclasssub/'.$value->ID_Class_matiere)}}" class="text-danger">Delete</a> 
                    </td>
                </tr>  
                @endforeach
              </tbody>
            </table>
        
        </div></div></div>
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
      url: 'update',
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