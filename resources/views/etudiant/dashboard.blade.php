
<!DOCTYPE tml>
<html lang="en">
  <head>
  <title>Etudiant</title>
  @include('etudiant.particals.head')
  </head>
  <body>     @include('etudiant.particals.nav')

            <div class="content-wrapperr">
                <div class="row">
        <div class="col-md-4 grid-margin  stretch-card" style="height: 650px">
            <div class="card">
              <div class="card-body text-center">
                <h4>Informations personelles</h4>
              <img class="img-lg rounded-circle border border-2 border-light" src="/res/profil.png" alt="Profile image">
                <h6>{{ $etudiant->nom }} {{ $etudiant->prenom }}</h6>
               <p class="card-description" style="margin-bottom: 0;"> Etudiant a zinith </p>
               <p class="card-description" style="margin-bottom: 0;">  Nivau: {{ $class->niveau }} </p>
               <p class="card-description" style="margin-bottom: 0;">  Classe: {{ $class->nom }} </p>
                <p class="card-description" style="margin-bottom: 0;">  Filiere: {{ $etudiant->filiere }} </p>
              </div>
                <div class="card-body">
              <center><h6>Details</h6></center>
              <br>
              <p><strong> Email :</strong>  {{ $etudiant->email }} </p>
              <p> <strong>Telephone : </strong> {{ $etudiant->tele }} </p>
              <p><strong>Date de naissace : </strong>{{ $etudiant->date_naissance }} </p>
              <p> <strong>Date d'inscription :</strong> {{ $etudiant->date_inscription }} </p>
              </div> </div>
        </div>

        <div class="col-md-8 grid-margin ">
          <div class="col-md-12 grid-margin">
            <div class="card">
              <div class="card-body">
              <div class="row report-inner-cards-wrapper">
                
                @php $count = 0 @endphp
                @foreach (array_slice($data, 0, 3) as $value)
                    @foreach ($value['week'] as $week)
                        <div class="col-md-12 form-group">
                            <div class="inner-card-text">
                                <div class="report-title"> <i class=" icon-clock"></i> {{$week['week_name']}}</div>
                                <center><p class="card-description">{{$value['nom']}} du {{$week['debut']}} a {{$week['fin']}}</p></center>
                            </div>
                            @if ($count < 2)
                                <div class="line"></div>
                            @endif
                        </div>
                        @php $count++ @endphp
                    @endforeach
                @endforeach
                </div>
<div style="display: flex; justify-content: flex-end;">
            <a href="calendrie">Voir plus</a>
</div>         
              
             
            </div></div>
            
        </div>
        <div class="col-md-12 grid-margin">
          <div class="card">
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
             
                    @foreach ($notesc as $key => $note)
                    @if ($key < 2) 
                       <tr>
                       <td>{{ $note->matiere->nom }}</td>
                       <td>{{ $note->note1 }}</td>
                       <td>{{ $note->note2 }}</td>
                       <td>{{ $note->devoir }}</td>
                       <td>{{ $note->mention }}</td>
                       </tr>  
                     @endif
                    @endforeach
                 </tbody>
               </table>
               <div style="display: flex; justify-content: flex-end;">
                <a href="examresultat">Voir plus</a>
    </div>   
              </div>
            </div>
      </div>
      </div>
    </div>
</div>

          </div>
    </div>
@include('etudiant.particals.script')
  </body>
</html>