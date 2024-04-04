<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Devoir</title>
  @include('etudiant.particals.head') 
</head> @include('etudiant.particals.nav')

<body style="height: 100vh; background-color: #ecf0f4;">
  <div class="content-wrapper">
    <div class="alert alert-success" hidden id="alert" role="alert">
      Votre reponse est envoyer
    </div>
    <center> <h4 class="" style="margin-right: 3%;margin-bottom: 7%;font-size: 2.13rem;font-weight: bolder;">Devoirs</h4></center>
    
@foreach($classMatieres as  $subject)
    <div class="col-md-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-header">
  <center><h4 class="card-title" style="margin-right: 3%" data-id="{{ $subject->ID_Matiere }}" >{{ $subject->nom }} </h4></center>
    </div> 
  <div class="card-body">
    <div class="row row-gap-3" style="margin-top: 1rem;">
      {{-- <div class="col-md-6 shadow-sm rounded" style="padding: 1%;">
        <div class="row" style="align-items: center;justify-content: space-around;">
        <a class="col-sm-10 fw-bold" href="/" target="_blank" style="color: black;cursor: pointer;" onmouseover="this.style.textDecoration='none'"><i class="icon-notebook"></i>  titre</a>
        <button type="button" style="border: none;" class="col-sm-1 btn btn-dark btn-rounded btn-icon upload-response" data-resource-id="" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="icon-cloud-upload"></i>
        </button>
            <p class="col-sm-8"> date</p>
            <a  style="color: black;" onmouseover="this.style.textDecoration='none'" class="col-sm-3" ><p align="right">tc 1</p></a> 
        </div>
        </div> --}}
      </div>
  </div>
  </div></div>
@endforeach </div></div></div></div>
  @include('etudiant.particals.script')
</body>
<script>
           document.addEventListener('DOMContentLoaded', function() {

    function handleFileUpload(resourceId) {
        // Create an input element of type file
        var input = document.createElement('input');
        input.type = 'file';
        input.accept = 'application/pdf'; // Optionally, restrict to PDF files
        input.style.display = 'none';
        // Append the input element to the document body
        document.body.appendChild(input);

        // Trigger a click event on the input element
        input.click();

        // Event listener to handle file selection
        input.addEventListener('change', function() {
            // Get the selected file
            var file = input.files[0];

            var formData = new FormData();
            formData.append('file', file);
            formData.append('resourceId', resourceId);
            formData.append('etudiantId','{{ $etudiant->ID_Etudiant }}');

            // Send FormData object to server using AJAX
            $.ajax({
                url: '/reponse_etudiant', // Replace with your server endpoint
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log('File uploaded successfully:', response);
                    document.getElementById('alert').removeAttribute('hidden');
                },
                error: function(xhr, status, error) {
                    console.error('Error uploading file:', error);
                }
            });

            // Remove the input element from the DOM
            document.body.removeChild(input);
        });
    }


            fetch('/get_Studentcours', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    id_class: '{{ $etudiant->ID_Class }}',
                    type: 'devoir'
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

            // Filter data based on idMatiere
            const filteredData = data.filter(item => item.ID_Matiere == idMatiere);

            // Generate HTML content for each item in filteredData
            filteredData.forEach(item => {
                content += '<div class="col-md-6 shadow-sm rounded" style="padding: 1%;">'
                content += '<div class="row" style="align-items: center;justify-content: space-around;">';
                content += '<a class="col-sm-10 fw-bold" href="/'+item.URL+'" target="_blank" style="color: black;cursor: pointer;margin-bottom: 3%;" onmouseover="this.style.textDecoration=\'none\'"><i  class="icon-notebook" style="margin-right: 3%"></i>' + item.titre + '</a>';
                content += '<button type="button" style="border: none;" class="col-sm-1 btn btn-dark btn-rounded btn-icon upload-response" data-resource-id="'+item.ID_Ressources+'"><i class="icon-cloud-upload"></i></button>'
                content += '<p class="col-sm-8 ">' + item.date + '</p>';
                content += '<a style="color: black;" onmouseover="this.style.textDecoration=\'none\'" class="col-sm-3" ><p align="right"></p></a>';
                content += '</div>';
                content += '</div>';
            });

            // Update card body with generated content
            cardBody.innerHTML = content;
        });
        document.querySelectorAll('.upload-response').forEach(uploadButton => {
            uploadButton.addEventListener('click', function() {
                // Get the resource ID from the data attribute
                var resourceId = uploadButton.getAttribute('data-resource-id');
                
                handleFileUpload(resourceId);
            });
        });
            })
            .catch(error => {
                console.error('There was a problem with the fetch operation:', error);
            });
    }); 
</script>
</html>