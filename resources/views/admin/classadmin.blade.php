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
        <h4 class="card-title">Classe</h4>
        <form class="form-sample" method="POST" action="{{ route('classp.store') }}" >
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
                  <label class="col-sm-3 col-form-label">filiere</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="filiere">
                      <option>scmath</option>
                      <option>eco</option>
                      <option>scmathA</option>
                      <option>scex</option>
                      <option>scphysique</option>
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
    <h4 class="card-title">Table Classes</h4>
    <table class="table table-striped display"  id="example">
      <thead>
        <tr>
          <th> #</th>
          <th> Nom </th>
          <th> filiere </th>
          <th> niveau</th>
          <th>option</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($getClass as $classe)
        <tr>
            <td>{{$classe->ID_Class}}</td>
            <td><a href="#" class="editable" data-pk="{{$classe->ID_Class}}" data-column="nom" type="text">{{$classe->nom}}</a></td>
            <td><a href="#" class="editable" data-pk="{{$classe->ID_Class}}" data-column="filiere"type="text">{{$classe->filiere}}</a></td>
            <td><a href="#" class="editable" data-pk="{{$classe->ID_Class}}" data-column="niveau"type="text">{{$classe->niveau}}</a></td>
           <td>
               <a href="{{url('deleteclass/'.$classe->ID_Class)}}" class="text-danger">Delete</a> 
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
      url: '/admin/class/update',
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