<!DOCTYPE tml>
<html lang="en">
  <head>
  <title>Absence</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @include('particals.head')
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
                <form class="form-sample" metod="POST">
                  @csrf
                  <div class="row">
                  <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" >Séance</label>
                          <div class="col-sm-9">
                        <input type="datetime-local" id="date" class="form-control" >
                          </div>
                        </div>
                      </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">niveau</label>
                        <div class="col-sm-9">
                        <select id="niveau" disabled class="form-control">
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
            <table class="table table-striped display"  id="example" >
              <thead>
                <tr>
                  <th> #</th>
                  <th> Nom </th>
                  <th> Prenom </th>
                  <th> Class</th>
                  <th> Abssence </th>
                </tr>
              </thead>
              <tbody id="studentTableBody">
              </tbody>
            </table>
            <button class="btn btn-inverse-success"  id="updateButton">Mettre à jour</button>
          </div>
        </div>
      </div>
      </div>


</div></div></div>
@include('particals.script')

  </body>

<script>
    fetch('/get-matiere/'+'{{ $prof->ID_Prof}}')
        .then(response => response.json())
        .then(data => {
          const classesSelect = document.getElementById('classe');
          const matiereSelect = document.getElementById('matiere');
          const niveauSelect = document.getElementById('niveau');
          const dateInput = document.getElementById('date'); 


            // Add options dynamically based on the fetched data
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
        dateInput.addEventListener('change', function () {
            niveauSelect.disabled = false;
        });

        })
        .catch(error => console.error('Error fetching matiere:', error));
</script>


<script>
  $(document).ready(function() {
    const classesSelect = document.getElementById('classe');
    const dateInput = document.getElementById('date');

function fetchStudents() {
    var selectedClass = $(classesSelect).val();
    var date = $(dateInput).val();
    var selectedSubject = "{{ $prof->ID_Matiere }}";

    $.ajax({
        url: '/fetch-abssance',
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            classe: selectedClass,
            matiere: selectedSubject,
            date: date
        },
        success: function(response) {
            $('#studentTableBody').empty();

            response.forEach(function(student) {
                var presentChecked = student.absences.length > 0 && student.absences[0].present == 1 ? 'checked' : '';
                var absentChecked = student.absences.length > 0 && student.absences[0].present == 0 ? 'checked' : '';
                var row = '<tr>' +
                    '<td>' + student.ID_Etudiant + '</td>' +
                    '<td>' + student.nom + '</td>' +
                    '<td>' + student.prenom + '</td>' +
                    '<td>' + student.classe + '</td>' +
                    '<td>' +
                    '<div class="row">' +
                    '<div class="col-md-6">' +
                    '<div class="form-check form-check-success">' +
                    '<label class="form-check-label">' +
                    '<input type="radio" class="form-check-input" name="absence_' + student.ID_Etudiant + '" value="1"' + presentChecked + '> Present <i class="input-helper"></i></label>' +
                    '</div>' +
                    '</div>' +
                    '<div class="col-md-6">' +
                    '<div class="form-check form-check-danger">' +
                    '<label class="form-check-label">' +
                    '<input type="radio" class="form-check-input" name="absence_' + student.ID_Etudiant + '" value="0"' + absentChecked + '> Absent <i class="input-helper"></i></label>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '</td>' +
                    '</tr>';
                $('#studentTableBody').append(row);
            });
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

classesSelect.addEventListener('change', function() {
    fetchStudents();
});

dateInput.addEventListener('change', function() {
    if (classesSelect.value!='selectioner un niveau') {
        fetchStudents();
    }
});

  });
</script>

<script>

$('#updateButton').on('click', function() {
    var updateData = [];
    var Subject = "{{ $prof->ID_Matiere }}";
    var dateInput = document.getElementById('date').value;


    // Iterate through each row in the table
    $('#studentTableBody tr').each(function() {
        var studentID = $(this).find('td:eq(0)').text();
        var absenceStatus = $(this).find('input[type="radio"]:checked').val();

        // Push data for each student to the updateData array
        updateData.push({
            student_id: studentID,
            absence_status: absenceStatus
        });
    });

    // Send AJAX request to update all absences
    $.ajax({
        url: '/update-all-absences',
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            updates: updateData,
            Subject :Subject,
            dateInput:dateInput
        },
        success: function(response) {
            $('#message').text(response.message);
                  $('#successMessage').show();
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
});

</script>

<script>

document.addEventListener('DOMContentLoaded', function() {
    // Get the datetime-local input element
    const dateInput = document.getElementById('date');

    // Add change event listener to the input element
    dateInput.addEventListener('change', function() {
        // Get the selected date and time from the input
        const dateTimeValue = this.value;

        // Extract the date and time parts
        const datePart = dateTimeValue.split('T')[0];
        let timePart = dateTimeValue.split('T')[1];

        // Extract hours and minutes
        const hours = timePart.split(':')[0];
        const minutes = timePart.split(':')[1];

        // Set the time part to display hours only (without minutes)
        timePart = hours + ':00'; // Set minutes to '00'

        // Update the input value with date and hours only
        this.value = datePart + 'T' + timePart;
    });
});

</script>

</html>