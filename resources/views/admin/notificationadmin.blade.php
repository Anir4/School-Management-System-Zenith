<html lang="en">
  <head>
    <title>Notification</title>
    @include('particals.head') 
  </head>
  <body>
<!-- form -->
@include('particals.nav')
<div class="main-panel">
    <div class="content-wrapper">
    @include('layout.toasts')
        <div class="row">
<div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Envoyer une notifications</h4>
        <form class="form-sample" action="{{ route('notifications.create') }}" method="POST">
        @csrf
          <div class="row">
        <div class="col-md-6">
              <div class="form-group row">
              <label class="col-sm-3 col-form-label">Envoyer au </label>
                <div class="col-sm-9">
                <select class="form-control" name="destinateur" id="destinateur" required>
        <option value="profs">Professeures</option>
        <option value="etudiants">Étudiants</option>
        <option value="toutes">Les Deux</option>
                </select>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Titre</label>
                <div class="col-sm-9">
                  <input type="text" name="titre" id="titre" class="form-control" required/>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Message</label>
                <div class="col-sm-9">
                <textarea class="form-control" name="message" id="message" required maxlength="255"></textarea>
                </div>
              </div>
              <button type="submit" class="btn btn-inverse-success btn-fw">Envoyer</button>
            </div>
          </div>
        </form>     
      </div>
  </div>
</div>

<div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Notifications</h4>
          <div class="accordion" id="notificationsAccordion">
 @foreach($notifications as $key => $notification)
        <div class="accordion-item">
            <h2 class="accordion-header">
                <button class="accordion-button {{ $key === 0 ? 'collapsed' : '' }}" type="button" data-bs-toggle="collapse" data-bs-target="#notificationCollapse{{ $key }}" aria-expanded="{{ $key === 0 ? 'true' : 'false' }}" aria-controls="notificationCollapse{{ $key }}">
                    <li class="profile-list">
                        <div class="icon-bubble">
                        <div class="profile-details">
                            <p class="fw-bold">{{ $notification->titre }}</p>
                            <p class="admin-role">{{ $notification->created_at->diffForHumans() }}</p>
                            @if (!empty($userType))
                            <p class="admin-role">Au {{ $notification->destinateur }}</p>
                            @endif
                        </div>
                    </div>
                </li>
                </button>
            </h2>
            <div id="notificationCollapse{{ $key }}" class="accordion-collapse collapse {{ $key === 0 ? 'show' : '' }}" aria-labelledby="notificationCollapse{{ $key }}" data-bs-parent="#notificationsAccordion">
                <div class="accordion-body">
                     {{ $notification->message }}
                </div>
                @if (!empty($userType))
                <form action="{{ route('notifications.delete', $notification->id) }}" method="POST" class="delete-form">
                      @csrf
                      @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                    @endif
                </form>
            </div>
        </div>
    @endforeach
        </div> 
      </div>
    </div>
</div>
  
</div>
</div>
</div>
  </body>
  @include('particals.script')

</html>