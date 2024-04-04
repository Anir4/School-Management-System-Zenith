<html lang="en">
  <head>
    <title>Exam</title>
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
        <h4 class="card-title">Exam</h4>
        <form class="form-sample" method="POST" action="{{ route('exams.store') }}">
          {{csrf_field()}}
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Nom</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="nom" />
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
                  <label class="col-sm-3 col-form-label">date</label>
                  <div class="col-sm-9">
                    <input class="form-control datepicker" type="date" name="date"/>
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
    <h4 class="card-title">Table Exams</h4>
    <table class="table table-striped display"  id="example">
      <thead>
        <tr>
          <th> #</th>
          <th>nom</th>
          <th>classe</th>
          <th> matiere</th>
          <th> Date  </th>
          <th> option</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($getreco as $exams)
        <tr>
            <td>{{$exams->ID_Exam}}</td>
            <td><a href="#" class="editable" data-pk="{{$exams->ID_Exam}}" data-column="nom" type="text">{{$exams->nom}}</a></td>
            <td><a href="#" class="editable" data-pk="{{$exams->ID_Exam}}" data-column="ID_Class"type="text">{{$exams->class_nom}}</a></td>
            <td><a href="#" class="editable" data-pk="{{$exams->ID_Exam}}" data-column="ID_Matiere"type="text">{{$exams->matiere_nom}}</a></td>
            <td><a href="#" class="editable" data-pk="{{$exams->ID_Exam}}" data-column="date"type="text">{{$exams-> date}}</a></td>
            <td >
               <a href="{{url('deleteexams/'.$exams->ID_Exam)}}" class="text-danger">Delete</a> 
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
      url: '/admin/exam/update',
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