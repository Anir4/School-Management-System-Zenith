<html lang="en">
  <head>
    <title>Emploi</title>
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
        <h4 class="card-title">Emploi</h4>
        <form class="form-sample"  >
          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label"> Class</label>
                <div class="col-sm-9">
                 <select class="form-control getClass" name="ID_Class" required>
                     <option value="">Select</option>
                     @foreach ($getClass as $class)
                     <option {{(Request::get('ID_Class')==$class->ID_Class) ? 'selected': ''}} value="{{$class->ID_Class}}">{{$class->nom}}</option>
                     @endforeach
                    </select>
                </div>
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Matiere</label>
                  <div class="col-sm-9">
                    <select class="form-control getMatiere" name="ID_Matiere" required>
                     <option value="">Select</option>
                     
                     @foreach ($getMatiere as $matiere)
                     <option {{(Request::get('ID_Matiere')==$matiere->ID_Matiere) ? 'selected': ''}} value="{{$matiere->ID_Matiere}}">{{$matiere->nom}}</option>
                     @endforeach
                     
                    </select>
                  </div>
                </div>
              </div>
              
              </div>
              <div class="btfloat">
            <button type="submit" class="btn btn-inverse-success btn-fw">Rechercher</button>
          </div>
         </div>
        </form>
      </div>
</div></div>

    @if(!empty(Request::get('ID_Class'))&& !empty(Request::get('ID_Matiere')))
    <form action="{{url('/admin/Emploi/add')}}" method="POST">
      {{csrf_field()}}
      <input type="hidden" name="ID_Matiere"value="{{Request::get('ID_Matiere')}}">
      <input type="hidden" name="ID_Class"value="{{Request::get('ID_Class')}}">
    <div class="col-md-12 grid-margin stretc-card">
      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Table semaine</h4>
          <table class="table table-striped display"  id="example" >
          <thead>
            <tr>
              <th>Semaine</th>
              <th>Debut</th>
              <th>Fin</th>
              <th>chambre</th>
            </tr>
          </thead>
            <tbody>
              @php
              $i=1;
              @endphp
           @foreach($week as $value)
           <tr>
            <th> <input type="hidden" name="emploi[{{$i}}][week_id]"value="{{$value['week_id']}}">
              {{$value['week_name']}}</th>
            <td><input type="time"name="emploi[{{$i}}][debut]"  value="{{$value['debut']}}" class="form-control"></td>
            <td><input type="time"name="emploi[{{$i}}][fin]" value="{{$value['fin']}}" class="form-control"></td>
            <td><input type="text"name="emploi[{{$i}}][room_num]" value="{{$value['room_num']}}" style="width:200px;" class="form-control"></td>
           </tr>
           @php
            $i++;
           @endphp
          @endforeach
            </tbody>
          </table>
          <div style="text-align: right; padding:20px">
          <button class="btn btn-inverse-primary btn-fw" >Enregistrer</button>
          </div></form></div></div>
        @endif
        </div></div></div>
@include('particals.script')
<script>
  $('.getClass').change(function(){
    var ID_Class = $(this).val();
    $.ajax({
      url:"{{url('/admin/class_emploi/get_Matiere')}}",
      type:"post",
      data:{
        "_token":"{{csrf_token()}}",
        ID_Class:ID_Class,
      },
      dataType:"json",
      success: function(response){
        $('.getMatiere').html(response.html);
      }
    })
    
  });
</script>
  </body>
</html>