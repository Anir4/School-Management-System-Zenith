<!DOCTYPE tml>
<html lang="en">
  <head>
  <title>Enseignant</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  @include('particals.head')
  <link href="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone.css" rel="stylesheet" type="text/css" />
  <script src="https://unpkg.com/dropzone@6.0.0-beta.1/dist/dropzone-min.js"></script>
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
                <h4 class="card-title">Cours et Devoirs</h4>
                <p class="card-description" >Sélectionner la classe voulue</p>
                <div class="row">
                <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" >Class</label>
                          <div class="col-sm-9">
                          <select id="classe" class="form-control">
                    </select>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" >Type</label>
                          <div class="col-sm-9">
                        <select id="type" class="form-control">
                            <option value="cour">Cour</option>
                            <option value="devoir">Devoir</option>
                        </select>
                          </div>
                        </div>
                      </div>
                </div>
                <form id="pdfupload" class="dropzone" method="post" action="{{ route('upload.files') }}" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <div class="dz-message" data-dz-message>
                        Déposez les PDF ici ou cliquez pour choisir
                    </div>
                    </div>
                </form>
                <button class="btn btn-primary" id="sendButton" style="margin-top: 5%;">Envoyer</button>
              </div>
                 </div>
              </div>

<div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
              <h4 class="card-title">Devoirs</h4>
      <div class="row row-gap-3" style="margin-top: 1rem;">
      @foreach ($devoirs as $resource)
      <div class="col-md-6 shadow-sm rounded" style="padding: 1%;">
        <div class="row" style="align-items: center;justify-content: space-around;">
        <a class="col-sm-10 fw-bold" href="{{ url($resource->URL) }}" target="_blank" style="color: black;cursor: pointer;" onmouseover="this.style.textDecoration='none'"><i class="icon-notebook"></i>  {{ $resource->titre }}</a>
        <button type="button" style="border: none;" class="col-sm-1 btn btn-outline-danger btn-rounded btn-icon delete-resource" data-resource-id="{{ $resource->ID_Ressources }}" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="icon-trash"></i>
        </button>
            <p class="col-sm-8">{{ \Carbon\Carbon::parse($resource->created_at)->format('Y-m-d') }}</p>
            <a  style="color: black;cursor: pointer;" class="col-sm-3 open-response-modal" data-bs-toggle="modal" data-bs-target="#reponse" data-resource-id="{{ $resource->ID_Ressources }}" data-classe-name="{{ $resource->classe->nom }}"><p align="right">{{ $resource->classe->nom }}</p></a> 
        </div>
        </div>
        @endforeach
      </div>
     </div>
    </div>
   </div>


<div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
              <h4 class="card-title">Cours</h4>
      <div class="row row-gap-3" style="margin-top: 1rem;">
      @foreach ($cours as $resource)
      <div class="col-md-6 shadow-sm rounded" style="padding: 1%;">
        <div class="row" style="align-items: center;justify-content: space-around;">
        <a class="col-sm-10 fw-bold" href="{{ url($resource->URL) }}" target="_blank" style="color: black;cursor: pointer;" onmouseover="this.style.textDecoration='none'"><i class="icon-notebook"></i>  {{ $resource->titre }}</a>
        <button type="button" style="border: none;" class="col-sm-1 btn btn-outline-danger btn-rounded btn-icon delete-resource" data-resource-id="{{ $resource->ID_Ressources }}" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <i class="icon-trash"></i>
        </button>
            <p class="col-sm-8">{{ \Carbon\Carbon::parse($resource->created_at)->format('Y-m-d') }}</p>
            <a  style="color: black;" onmouseover="this.style.textDecoration='none'" class="col-sm-3" ><p align="right">{{ $resource->classe->nom }}</p></a> 
        </div>
        </div>
        @endforeach
      </div>
     </div>
    </div>
   </div>


   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirm Supprission</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            Êtes-vous sûr de vouloir supprimer cette ressource ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Supprimer</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="reponse" tabindex="-1" aria-labelledby="exampleModalCenteredScrollableTitle" aria-hidden="true">
<div class="modal-dialog modal-lg" >
    <div class="modal-content" >
      <div class="modal-header" >
        <h1 class="modal-title" id="reponseTitle">Reponses du Classe</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row row-gap-3" id="responses" style="margin-top: 1rem;">
    
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
      </div>
    </div>
  </div>
</div>


      </div>


</div></div></div>
@include('particals.script')
  </body>
  

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const responsesDiv = document.getElementById('responses');
        const openResponseButtons = document.querySelectorAll('.open-response-modal');
        openResponseButtons.forEach(button => {
            button.addEventListener('click', function() {
                const resourceId = this.getAttribute('data-resource-id');
                const className = this.getAttribute('data-classe-name');

                 fetch(`/fetch-responses/${resourceId}`)
                 .then(response => response.json())
        .then(resources => {
            // Clear existing content
            responsesDiv.innerHTML = '';
            if (resources.length === 0) {
        responsesDiv.innerHTML = '<p class="col-sm-12">Pas de réponses</p>';
    } else {
            // Populate resources in the responsesDiv
            resources.forEach(resource => {
                const buttonClass = resource.status === 'confirmed' ? 'btn-success' : 'btn-outline-success';
                const updatestat= resource.status === 'confirmed' ? '' : 'update-status-btn';
                const resourceHtml = `
                    <div class="col-md-6 shadow-sm rounded" style="padding: 1%;">
                        <div class="row" style="align-items: center;justify-content: space-around;">
                            <a class="col-sm-10 fw-bold" href="${resource.pdf_url}" target="_blank" style="color: black;cursor: pointer;" onmouseover="this.style.textDecoration='none'">
                                <i class="icon-notebook"></i>  ${resource.titre}
                            </a>
                            <button type="button" style="border: none;" class="col-sm-1 btn ${buttonClass} btn-rounded btn-icon ${updatestat}" id="updatestatus" data-resource-id="${resource.id}" data-status="${resource.status}">
                                <i class="icon-like"></i>
                            </button>
                            <p style="margin-bottom: 2%;" class="col-sm-12">${resource.formatted_created_at}</p>
                            <p class="col-sm-12">${resource.etudiant.nom} ${resource.etudiant.prenom}</p>
                        </div>
                    </div>
                `;
                responsesDiv.innerHTML += resourceHtml;
            });
            const updateStatusBtns = document.querySelectorAll('.update-status-btn');
                        updateStatusBtns.forEach(updateStatusBtn => {
                            updateStatusBtn.addEventListener('click', function() {
                                if (!this.classList.contains('disabl')) { // Check if button is not disabled
                                    console.log('clicked');
                                    this.classList.add('disabl'); // Mark button as disabled
                                    const resourceId = this.getAttribute('data-resource-id');
                                    const newStatus = this.getAttribute('data-status') === 'confirmed' ? 'not_confirmed' : 'confirmed'; // Toggle status
                                    this.classList.add('btn-success');
                                    fetch(`/update-status/${resourceId}`, {
                                        method: 'POST',
                                        headers: {
                                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                            'Content-Type': 'application/json',
                                        },
                                        body: JSON.stringify({ status: newStatus }),
                                    })
                                    .then(response => {
                                        if (response.ok) {
                                            this.setAttribute('data-status', newStatus);
                                        } else {
                                            throw new Error('Failed to update status');
                                            this.classList.remove('disabled');
                                        }
                                    })
                                    .catch(error => console.error('Error updating status:', error))
                                    
                                }
                            });
                        });
        }


        })
        .catch(error => console.error('Error fetching resources:', error));



 

            });
            
        });
        
    });


</script>



  <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle delete button click
        const deleteButtons = document.querySelectorAll('.delete-resource');
        deleteButtons.forEach(button => {
            button.addEventListener('click', function() {
                const resourceId = this.getAttribute('data-resource-id');
                document.getElementById('confirmDeleteBtn').setAttribute('data-resource-id', resourceId);
            });
        });

        document.getElementById('confirmDeleteBtn').addEventListener('click', function() {
            const resourceId = this.getAttribute('data-resource-id');

            fetch('{{ route("resources.delete") }}', {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    resource_id: resourceId
                })
            }).then(response => {
                     console.log('Resource deleted successfully.');
                     $('#exampleModal').modal('hide');
                     window.location.reload();
                 })
                 .catch(error => {
                     console.error('Error deleting resource:', error);
                 });

        });
    });
</script>

<script>
    $(document).ready(function() {
            // Initialize Dropzone
            var myDropzone = new Dropzone('#pdfupload', {
                url: '{{ route("upload.files") }}',
                acceptedFiles: '.pdf',
                autoProcessQueue: false,
                maxFilesize: 10,
                addRemoveLinks: true,
                clickable:true,
                dictDefaultMessage: 'Drag and drop PDFs here to upload or click to browse',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

                init: function() {
                    this.on("addedfile", function(file) {
                        if (!file.type.match(/pdf.*/)) {
                            this.removeFile(file);
                            alert("Please upload PDF files only.");
                        }
                    });
                },

                success: function(file, response) {
                    console.log(response);
                    window.location.reload();

                },
                error: function(file, error) {
                    console.error(error);
                },
                sending: function(file, xhr, formData) {
        // Include additional form data
        formData.append('matiere_id', "{{ $prof->ID_Matiere }}");
        formData.append('class_id', $('#classe').val());
        formData.append('type', $('#type').val());

    }
            });

            // Handle Send button click
            $('#sendButton').on('click', function(e) {
                e.preventDefault(); // Prevent default form submit behavior
                myDropzone.processQueue(); // Process the uploaded files queue using the Dropzone instance
            });
        });

</script>


<script>

fetch('/get-matiere/'+'{{ $prof->ID_Prof}}')
        .then(response => response.json())
        .then(data => {
          const classesSelect = document.getElementById('classe');
            const uniqueNiveaux = new Set();
        function populateClasses() {
            classesSelect.innerHTML = '';
            const optione = document.createElement('option');
                optione.text = 'none';
                classesSelect.appendChild(optione);
                
                data.classes.forEach(classe => {
                const option = document.createElement('option');
                option.value = classe.id;
                option.text = classe.name;
                classesSelect.appendChild(option);
            });
        }
        populateClasses();
        })

</script>

</html>