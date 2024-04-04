<html lang="en">
  <head>
    <title>Emploi</title>
    @include('etudiant.particals.head') 
  </head>
  <body>
    @include('etudiant.particals.nav')


    <div class="content-wrapperr">
      @foreach ($getRecord as $value)
        <div class="row">
            
    <div class="col-md-12 grid-margin stretc-card">
     
      <div class="card">
        <div class="card-body">
         <h4 class="card-title">{{$value['nom']}}</h4>
          <table class="table table-striped display"  id="example" >
          <thead>
            <tr >
              <th>Semaine</th>
              <th>Debut</th>
              <th>Fin</th>
              <th>chambre</th>
            </tr>
          </thead>
            <tbody>
             @foreach ($value['week'] as $valuew)  
                 <tr>
                  <td>{{$valuew['week_name']}}</td>
                  <td>{{!empty($valuew['debut'])? date('h:i A',strtotime($valuew['debut'])) :'' }}</td>
                  <td>{{!empty($valuew['fin']) ? date('h:i A',strtotime($valuew['fin'])) :'' }}</td>
                  <td>{{$valuew['room_num']}}</td>
                 </tr> 
             @endforeach
            </tbody>
          </table>

          </div></div></div></div>
       @endforeach 
        </div></div></div>
@include('etudiant.particals.script')

  </body>
</html>

