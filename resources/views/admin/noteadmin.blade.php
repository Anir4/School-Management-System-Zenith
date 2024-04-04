<html lang="en">
  <head>
    <title>Note</title>
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
        <h4 class="card-title">Note</h4>
        <form class="form-sample" method="POST" action="{{ route('notesc.store') }}" >
          {{csrf_field()}}
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">  ID_Etudiant</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="ID_Etudiant" />
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">ID_Cours</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="ID_Cours" />
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Note</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control"name="notes" />
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">mention</label>
                  <div class="col-sm-9">
                    <select class="form-control" name="mention">
                      <option>assez bien</option>
                      <option>bien</option>
                      <option>très bien</option>
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
    <h4 class="card-title">Table Notes</h4>
    <table class="table table-striped display"  id="example">
      <thead>
        <tr>
          <th> #</th>
          <th> ID_Etudiant</th>
          <th> ID_Cours </th>
          <th> Note </th>
          <th> mention</th>
          <th> option</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($notesc as $note)
        <tr>
            <td>{{$note->ID_Notes}}</td>
            <td><a href="#" class="editable" data-pk="{{$note->ID_Notes}}" data-column="ID_Cours" type="text">{{$note->ID_Etudiant}}</a></td>
            <td><a href="#" class="editable" data-pk="{{$note->ID_Notes}}" data-column="ID_Cours"type="text">{{$note->ID_Cours}}</a></td>
            <td><a href="#" class="editable" data-pk="{{$note->ID_Notes}}" data-column="notes"type="text">{{$note->notes}}</a></td>
            <td><a href="#" class="editable" data-pk="{{$note->ID_Notes}}" data-column="mention"type="text">{{$note-> mention}}</a></td>
           <td>
               <a href="{{url('deletenote/'.$note->ID_Notes)}}" class="text-danger">Delete</a> 
            </td>
        </tr>  
        @endforeach
      </tbody>
    </table>
  </div>
</div></div></div>
</div></div>
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
      url: '/admin/note/update',
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