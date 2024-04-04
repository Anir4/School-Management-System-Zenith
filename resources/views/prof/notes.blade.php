<!DOCTYPE tml>
<html lang="en">
  <head>
  <title>Notes</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @include('particals.head')
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>

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
                <h4 class="card-title">Notes</h4>
                <form class="form-sample" metod="POST">
                  @csrf
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Matiere</label>
                        <div class="col-sm-9">
                        <select id="matiere" class="form-control">
          
                    </select>
                    </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">niveau</label>
                        <div class="col-sm-9">
                        <select id="niveau" class="form-control">
                        <option>none</option>
                    </select>
                      </div>
                      </div>
                    </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" >class</label>
                          <div class="col-sm-9">
                          <select id="classe" class="form-control" disabled>
                      <option>selectioner un niveau</option>
                    </select>
                          </div>
                        </div>
                      </div>
                  
                    </div>
                </div>
                 </div>
                </form>
                
              </div>
<div id="successMessage" style="display: none;">
<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
  <symbol id="check-circle-fill" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
</svg>

<div class="alert alert-success d-flex align-items-center" role="alert">
  <svg style="width: 1em;height: 1em;" class="bi flex-shrink-0 me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
  <div id="message">
  </div>
</div>
</div>

    <div class="col-md-12 grid-margin stretc-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Table etudiants</h4>
            <table class="table table-striped display "  id="notestable" >
              <thead>
                <tr>
                  <th> #</th>
                  <th> Nom </th>
                  <th> Prenom </th>
                  <th> Class</th>
                  <th> Exam 1 </th>
                  <th>Exam 2</th>
                  <th>Devoir</th>
                  <th>Mention</th>
                </tr>
              </thead>
              <tbody id="studentTableBody">
              <tr><td colspan="8" class="text-center">Selectioner une classe</td></tr>
              </tbody>
            </table>
            <div class="template-demo">
            <button class="btn btn-inverse-success"  id="updateButton">Envoyer <i class="icon-printer btn-icon-append"></i></button>
            <button id="exportExcelButton" class="btn btn-inverse-primary">Imprimer Excel <i class="icon-printer btn-icon-append"></i></button>
            </div>
          </div>
        </div>
      </div>
      </div>


</div></div></div>
@include('particals.script')

  </body>

  <script>
  $(document).ready(function() {
    const classesSelect = document.getElementById('classe');
    classesSelect.addEventListener('change', function () {
    selectedClassName = this.options[this.selectedIndex].text;
  });
  
    $('#exportExcelButton').on('click', function() {
      // Créer un tableau pour stocker les données des étudiants avec leurs notes
      const data = [];

      // Parcourir chaque ligne du tableau des étudiants et extraire les données
      $('#studentTableBody tr').each(function(index, row) {
        const studentId = $(row).find('td:eq(0)').text();
        const nom = $(row).find('td:eq(1)').text();
        const prenom = $(row).find('td:eq(2)').text();
        const classe = $(row).find('td:eq(3)').text();
        const note1 = $(row).find('td:eq(4) input').val();
        const note2 = $(row).find('td:eq(5) input').val();
        const devoir = $(row).find('td:eq(6) input').val();
        const mention = $(row).find('td:eq(7) input').val();

        // Ajouter les données de l'étudiant à notre tableau de données
        data.push({
          'ID Etudiant': studentId,
          'Nom': nom,
          'Prenom': prenom,
          'Class': classe,
          'Note 1': note1,
          'Note 2': note2,
          'Devoir': devoir,
          'Mention': mention
        });
      });

      // Créer un objet de feuille de calcul Excel à partir de notre tableau de données
      const ws = XLSX.utils.json_to_sheet(data);

      // Créer un classeur Excel et ajouter notre feuille de calcul
      const wb = XLSX.utils.book_new();
      XLSX.utils.book_append_sheet(wb, ws, 'Tableau Etudiants');

      // Convertir le classeur en un fichier Excel binaire
      const wbout = XLSX.write(wb, { bookType: 'xlsx', type: 'binary' });

      // Convertir le contenu en un objet blob
      function s2ab(s) {
        const buf = new ArrayBuffer(s.length);
        const view = new Uint8Array(buf);
        for (let i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xff;
        return buf;
      }

      // Créer un blob contenant le fichier Excel
      const blob = new Blob([s2ab(wbout)], { type: 'application/octet-stream' });

      console.log(selectedClassName);

      const filename = selectedClassName.trim() !== '' ? `${selectedClassName}_notes.xlsx` : 'table_etudiants.xlsx';


      // Créer un objet URL pour le blob et simuler le téléchargement
      const url = window.URL.createObjectURL(blob);
      const a = document.createElement('a');
      a.href = url;
      a.download = filename; // Nom du fichier Excel à télécharger
      document.body.appendChild(a);
      a.click();

      // Nettoyer l'URL objet après le téléchargement
      window.URL.revokeObjectURL(url);
    });
  });
</script>



<script>
    // Fetch matiere information using AJAX
    fetch('/get-matiere/'+'{{ $prof->ID_Prof}}')
        .then(response => response.json())
        .then(data => {
          const classesSelect = document.getElementById('classe');
          const matiereSelect = document.getElementById('matiere');
          const niveauSelect = document.getElementById('niveau');

            // Add options dynamically based on the fetched data
            data.matiere.forEach(matier => {
                const option = document.createElement('option');
                option.value = matier.ID_Matiere;
                option.text = matier.nom;
                matiereSelect.appendChild(option);
            });
            const uniqueNiveaux = new Set();

            data.classes.forEach(classe => {
                uniqueNiveaux.add(classe.niveau);
            });

        uniqueNiveaux.forEach(niveau => {
            const option = document.createElement('option');
            option.value = niveau;
            option.text = niveau;
            niveauSelect.appendChild(option);
        });


        function populateClasses(selectedNiveau) {
            // Clear existing options in classes select dropdown
            classesSelect.innerHTML = '';

            const optione = document.createElement('option');
                optione.text = 'none';
                classesSelect.appendChild(optione);

            const filteredClasses = data.classes.filter(classe => classe.niveau === selectedNiveau);

            // Populate classes select dropdown based on selected niveau
            filteredClasses.forEach(classe => {
                const option = document.createElement('option');
                option.value = classe.id;
                option.text = classe.name;
                classesSelect.appendChild(option);
            });
        }

        // Add event listener for niveau select dropdown
        niveauSelect.addEventListener('change', function () {
            const selectedNiveau = niveauSelect.value;
            populateClasses(selectedNiveau); 
            $('#classe').prop('disabled', false);
        });

        })
        .catch(error => console.error('Error fetching matiere:', error));
</script>

 <script>
  $(document).ready(function() {

    const classesSelect = document.getElementById('classe');

    classesSelect.addEventListener('change', function () {
      var selectedClass = $(this).val();
      var selectedSubject = $('#matiere').val(); 
      $.ajax({
        url: '/fetch-students',
        method: 'POST',
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
          classe: selectedClass,
          matiere: selectedSubject
        },
        success: function(response) {
          $('#studentTableBody').empty();

          if (response.length === 0) {
            var noDataRow = '<tr><td colspan="8" class="text-center">Pas de données</td></tr>';
            $('#studentTableBody').append(noDataRow);
          } else {
            console.log(response);
            response.forEach(function(student) {
              var row = '<tr>' +
                '<td>' + student.ID_Etudiant + '</td>' +
                '<td>' + student.nom + '</td>' +
                '<td>' + student.prenom + '</td>' +
                '<td>' + student.classe + '</td>' +
                '<td><input type="text" oninput="validateInput(this)" class="form-control" value="' + (student.notes.length > 0 ? student.notes[0].note1 : '') + '"></td>' +
                '<td><input type="text" oninput="validateInput(this)" class="form-control" value="' + (student.notes.length > 0 ? student.notes[0].note2 : '') + '"></td>' +
                '<td><input type="text" oninput="validateInput(this)" class="form-control" value="' + (student.notes.length > 0 ? student.notes[0].devoir : '') + '"></td>' +
                '<td><input type="text" class="form-control" value="' + (student.notes.length > 0 ? student.notes[0].mention : '') + '"></td>' +
                '</tr>';
              $('#studentTableBody').append(row);
            });
          }
        },

        error: function(xhr, status, error) {
          console.error(error);
        }
      });
    });
  });


  
</script>

<script>
 function validateInput(input) {
    // Remove non-numeric characters except for the decimal point
    input.value = input.value.replace(/[^\d.]/g, '');

    // Convert the input value to a number
    var value = parseFloat(input.value);

    // Check if the value is within the desired range
    if (isNaN(value) || value < 0 || value > 20) {
        // If the value is out of range or not a number, reset the input value
        input.value = '';
        alert('Entre un nombre entre 0 et 20');
    }
}
  </script>

<script>
  $(document).ready(function() {
    // Event listener for the "Update" button click
    $('#updateButton').on('click', function() {
        // Iterate over each row in the table
        $('#studentTableBody tr').each(function(index, row) {
            var studentId = $(row).find('td:eq(0)').text(); // Assuming the student ID is in the first column
            var note1 = $(row).find('td:eq(4) input').val(); // Get the value of the input in the fifth column (note1)
            var note2 = $(row).find('td:eq(5) input').val(); // Get the value of the input in the sixth column (note2)
            var devoir = $(row).find('td:eq(6) input').val(); // Get the value of the input in the seventh column (devoir)
            var mention = $(row).find('td:eq(7) input').val(); // Get the value of the input in the eighth column (mention)
            var matiereId = $('#matiere').val(); 

            // AJAX request to update the notes in the database
            $.ajax({
                url: '/update-student-notes', // Your backend API endpoint for updating notes
                method: 'POST',
                headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {
                    matiereId: matiereId,
                    studentId: studentId,
                    note1: note1,
                    note2: note2,
                    devoir: devoir,
                    mention: mention
                },
                success: function(response) {
                  $('#message').text(response.message);
                  $('#successMessage').show();
                },
                error: function(xhr, status, error) {
                    // Handle error response if needed
                }
            });
        });
    });
});

</script>

</html>