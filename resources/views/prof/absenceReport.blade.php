<!DOCTYPE tml>
<html lang="en">
  <head>
  <title>Absence</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @include('particals.head')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.19/jspdf.plugin.autotable.min.js"></script>

  </head>
  <body> 
    <div class="container-scroller">
    @include('particals.nav')
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Absences</h4>
                <p class="card-description" > entrer l'ID ou le nom et prenom</p>
                <form class="form-sample" metod="POST">
                  @csrf
                  <div class="row">
                  <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">ID</label>
                        <div class="col-sm-9">
                          <input type="number" class="form-control" id="id"/>
                        </div>
                      </div>
                    </div>
                  <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nom</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="searchNom" name="nom" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Prenom</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" id="searchPrenom" name="prenom"/>
                        </div>
                      </div>
                    </div>
                    </div>
                    <button type="button" class="btn btn-primary" id="searchButton">Rechercher</button>
              </form>
              </div>
                 </div>
              </div>

    <div class="col-md-12 grid-margin stretc-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Table etudiants</h4>
            <table class="table table-striped display"  id="example" >
              <thead>
                <tr>
                  <th> #</th>
                  <th> Nom </th>
                  <th> Prenom </th>
                  <th> Class</th>
                  <th> Abssences </th>
                </tr>
              </thead>
              <tbody id="studentTableBody">
              </tbody>
            </table>
            <button id="exportPdfButton" class="btn btn-inverse-primary">Exporter en PDF <i class="icon-printer btn-icon-append"></i></button>
          </div>
        </div>
      </div>
      </div>


</div></div></div>
@include('particals.script')

  </body>

<script>

    document.addEventListener('DOMContentLoaded', function() {

document.getElementById('exportPdfButton').addEventListener('click', function() {
  var nom = "Nom"; // Nom par défaut
    var prenom = "Prenom"; // Prenom par défaut

    const doc = new jsPDF(); // Créer une nouvelle instance de jsPDF

    // Obtenir le nom et le prénom à partir du tableau
    const rows = document.querySelectorAll('#studentTableBody tr');
    if (rows.length > 0) {
      const firstRow = rows[0]; // Première ligne du tableau
      const cells = firstRow.querySelectorAll('td');
      if (cells.length >= 2) {
        // Les cellules 1 et 2 contiennent le nom et le prénom
        nom = cells[1].innerText.trim();
        prenom = cells[2].innerText.trim();
      }
    }


  // Ajouter le contenu du tableau au PDF
  doc.autoTable({
    html: '#example', // Sélectionner l'élément HTML du tableau à exporter
    styles: { cellPadding: 1.5, fontSize: 10 }, // Styles du tableau dans le PDF
    margin: { top: 10, right: 10, bottom: 10, left: 10 }, // Marges du PDF
    fileName: `${nom}_${prenom}_abssences.pdf`
  });

  doc.save(`${nom}_${prenom}_abssences.pdf`);
});
});

</script>
  
<script>
  document.addEventListener('DOMContentLoaded', function() {
    function disableOtherInputs(disable) {
        $('#searchNom').prop('disabled', disable);
        $('#searchPrenom').prop('disabled', disable);
    }

    // Event handler for ID input focus
    $('#id').on('focus', function() {
        disableOtherInputs(true); // Disable other inputs when focused
    });

    // Event handler for ID input value change
    $('#id').on('input', function() {
        if ($(this).val()) {
            disableOtherInputs(true); // Disable other inputs when ID has a value
        } else {
            disableOtherInputs(false); // Enable other inputs if ID is empty
        }
    });
          });
</script>
<script>
   $(document).ready(function() {
    $('#searchButton').on('click', function() {
        var searchNom = $('#searchNom').val();
        var searchPrenom = $('#searchPrenom').val();
        var id = $('#id').val();

        if (!id && (!searchNom || !searchPrenom)) {
            alert('entrer lID ou le nom et prenom.');
            return ;
        }

        $.ajax({
            url: '/search-student',
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                id: id,
                matier: "{{ $prof->ID_Matiere }}",
                nom: searchNom,
                prenom: searchPrenom
            },
            success: function(response) {
                $('#studentTableBody').empty();

                if (response.error) {
                    var errorMessage = '<tr><td colspan="5">Etudiant non trouvé</td></tr>';
                    $('#studentTableBody').append(errorMessage);
                } else {
                  var student = response.student;
                  var absences = response.absences;
                    if (!student || Object.keys(student).length === 0) {
                        var notFoundMessage = '<tr><td colspan="5" align="center">Etudiant non trouvé</td></tr>';
                        $('#studentTableBody').append(notFoundMessage);
                    } else if (!absences || Object.keys(absences).length === 0) {
                        var noAbsenceMessage = '<tr><td colspan="5" align="center">Pas d\'absence pour ' + student.nom + ' '+ student.prenom +'</td></tr>';
                        $('#studentTableBody').append(noAbsenceMessage);
                    } else {
                      absences.forEach(function(absences) {
                    var row = '<tr>' +
                            '<td>' + absences.id + '</td>' +
                            '<td>' + student.nom + '</td>' +
                            '<td>' + student.prenom + '</td>' +
                            '<td>' + student.classe + '</td>' +
                            '<td>' + (absences.date) + '</td>' +
                            '</tr>';
                        $('#studentTableBody').append(row);
                  });
                    }
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
});

</script>

</html>