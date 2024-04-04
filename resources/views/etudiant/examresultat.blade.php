<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Notes</title>
  @include('etudiant.particals.head') 
</head>
<body style="height: 100vh; background-color: #ecf0f4;">
  @include('etudiant.particals.nav')
  <div class="content-wrapper"> 
    <center> <h4 class="card-title">Votre Notes</h4></center>
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card" >
        <div class="card-body">
        
          <table class="table table-striped "  id="example" >
            <thead>
              <tr>
                <th> Matiere</th>
                <th> DS1</th>
                <th> DS2 </th>
                <th> Devoirs</th>
                <th> mention</th>
              </tr>
            </thead>
            <tbody>
             
               @foreach ($notesc as $note)
              
              <tr>
                  <td>{{$note->matiere->nom }}</td>
                  <td>{{$note->note1}}</td>
                  <td>{{$note->note2}}</td>
                  <td>{{$note->devoir}}</td>
                  <td>{{$note-> mention}}</td>
                 
              </tr>  
              @endforeach 
            </tbody>
          </table>
        </div>
      </div></div></div>
  @include('etudiant.particals.script')
</body>
</html>