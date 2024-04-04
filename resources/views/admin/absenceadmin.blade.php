<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Absence</title>
    @include('particals.head')
  </head>
  <body>
    @include('particals.nav')
    <div class="main-panel">
      <div class="content-wrapper">
          <div class="row">
  <div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Absences </h4>
      <table class="table table-striped display"  id="example">
        <thead>
          <tr>
            <th> Nom </th>
            <th> prenom </th>
            <th> date </th>
            <th>matiere</th>
            <th>option</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($absence as $absences)
          <tr>
            <td>{{$absences-> etudiant->nom}}</td>
            <td>{{$absences-> etudiant->prenom}}</td>
            <td>{{$absences->matiere->nom }}</td>
            <td>{{$absences-> date}}</td>
            <td>
              <a href="{{url('deleteabsence/'.$absences->id)}}" class="text-danger">Delete</a> 
           </td>
          </tr> 
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  </div></div></div></div>
  @include('particals.script')

</body>
</html>