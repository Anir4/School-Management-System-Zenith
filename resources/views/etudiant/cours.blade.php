<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Cours</title>
  @include('etudiant.particals.head') 
</head> @include('etudiant.particals.nav')

<body style="height: 100vh; background-color: #ecf0f4;">
  <div class="content-wrapper">
    <center> <h4 class="" style="margin-right: 3%;margin-bottom: 7%;font-size: 2.13rem;font-weight: bolder;">Cours</h4></center>
    
@foreach($classMatieres as  $subject)
    <div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-header">
  <center><h4 class="card-title" style="margin-right: 3%" data-id="{{ $subject->ID_Matiere }}" >{{ $subject->nom }} </h4></center>
    </div> 
  <div class="card-body">
    <div class="row row-gap-3" style="margin-top: 1rem;">
      
      </div>
  </div>
  </div></div>
@endforeach </div></div></div></div>
  @include('etudiant.particals.script')
</body>
<script>
          document.addEventListener('DOMContentLoaded', function() {
            fetch('/get_Studentcours', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    id_class: '{{ $etudiant->ID_Class }}',
                    type: 'cour'
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
              document.querySelectorAll('.card-title').forEach(cardTitle => {
            const idMatiere = cardTitle.getAttribute('data-id');
            const cardBody = cardTitle.closest('.card').querySelector('.row');
            let content = '';
            console.log(data);

            // Filter data based on idMatiere
            const filteredData = data.filter(item => item.ID_Matiere == idMatiere);

            // Generate HTML content for each item in filteredData
            filteredData.forEach(item => {
                content += '<div class="col-md-6 shadow-sm rounded" style="padding: 1%;">'
                content += '<div class="row" style="align-items: center;justify-content: space-around;">';
                content += '<a class="col-sm-12 fw-bold" href="'+item.URL+'" target="_blank" style="color: black;cursor: pointer;margin-bottom: 3%;" onmouseover="this.style.textDecoration=\'none\'"><i  class="icon-notebook" style="margin-right: 3%"></i>' + item.titre + '</a>';
                content += '<p class="col-sm-8 ">' + item.date + '</p>';
                content += '<a style="color: black;" onmouseover="this.style.textDecoration=\'none\'" class="col-sm-3" ><p align="right"></p></a>';
                content += '</div>';
                content += '</div>';
            });

            // Update card body with generated content
            cardBody.innerHTML = content;
        });
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    });
</script>
</html>