<html lang="en">
  <head>
    <title>Notification</title>
    @include('etudiant.particals.head') 
  </head>
    @include('etudiant.particals.nav')
    <body style="height: 100vh; background-color: #ecf0f4;">
        <div class="content-wrapper">
<div class="col-12 grid-margin stretch-card">
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
</div></div></div>
@include('etudiant.particals.script')

  </body>
</html>