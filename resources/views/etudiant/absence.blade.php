<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Absence</title>
  @include('etudiant.particals.head') 
</head>
<body style="height: 100vh; background-color: #ecf0f4;">
  @include('etudiant.particals.nav')
  <div class="content-wrapper"> 
    <center> <h4 class="card-title">Votre Absence</h4></center>
   <center> <div class="col-md-12 grid-margin stretch-card" style="width: 800px">
      <div class="card" >
        <div class="card-body">
        
          <table class="table table-striped "  id="example" >
            <thead>
              <tr>
                <th> Matiere</th>
                <th> date</th>
              </tr>
            </thead>
            <tbody>
             
               @foreach ($data as $absence)
              
              <tr>
                  <td>{{$absence->matiere->nom }}</td>
                  <td>{{$absence-> date}}</td>
                 
              </tr>  
              @endforeach 
            </tbody>
          </table>
        </div>
      </div></div></center></div>
  @include('etudiant.particals.script')
</body>
</html>