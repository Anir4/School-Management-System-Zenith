<!DOCTYPE tml>
<tml lang="en">
  <title>Admin</title>
  
  @include('particals.head')
  <body> 
    <div class="container-scroller">
    @include('particals.nav')
    <!-- form -->
        <div class="main-panel">
            <div class="content-wrapper">
                <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Admin</h4>
                <form class="form-sample" method="POST" action="{{ route('users.store') }}">
                  {{csrf_field()}}
                  <p class="card-description"> Informations personnels </p>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Nom</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="nom" />
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Prenom</label>
                        <div class="col-sm-9">
                          <input type="text" class="form-control" name="prenom"/>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label" >Email</label>
                          <div class="col-sm-9">
                            <input type="text" class="form-control" placeholder="exemple@zenit.com" name="email"/>
                          </div>
                        </div>
                      </div>
                  
                    <div class="col-md-6">
                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Mots de passe</label>
                        <div class="col-sm-9">
                          <input type="password" class="form-control" name="password" />
                        </div>
                      </div>
                    </div></div>
                    <div class="btfloat">
                <button type="submit" class="btn btn-inverse-success btn-fw">Ajouter</button>

                  </div></div>
                 </div>
                </form>
                
              </div>
            </div>
               <!-- table -->
    <div class="col-md-12 grid-margin stretc-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Table Admin</h4>
            <table class="table table-striped display"  id="example" >
              <thead>
                <tr>
                  <th> #</th>
                  <th> Nom </th>
                  <th> Prenom </th>
                  <th> Email</th>
                  <th>options</th>
                </tr>
              </thead>
              <tbody>
             
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td><a href="#" class="editable" data-pk="{{$user->id}}" data-column="nom">{{$user->nom}}</a></td>
                    <td><a href="#" class="editable" data-pk="{{$user->id}}" data-column="prenom">{{$user->prenom}}</a></td>
                    <td><a href="#" class="editable" data-pk="{{$user->id}}" data-column="email">{{$user->email}}</a></td>
                    <td >
                       <a href="{{url('delete/'.$user->id)}}" class="text-danger">Delete</a> 
                    </td>
                </tr>  
                @endforeach
                
              
              </tbody>
            </table>
          </div>
        </div>
      </div>
          </div></div></div></div></div> </div>
            </div></div></div></div>
            
            
@include('particals.script')
<script>
$.fn.editable.defaults.mode="inline";
$.ajaxSetup({
  headers:{
    'X-CSRF-TOKEN':'{{csrf_token()}}'
  }
})
$('.editable').editable({
    type: 'text',
    url: '/admin/dashboard/update',
    ajaxOptions: {
        type: 'post', // Specify the HTTP method as PUT
    },
    params: function(params) {
        // Retrieve necessary data from the parent element
        var data = {};
        data['pk'] = $(this).data('pk');
        data['column'] = $(this).data('column'); // Pass the selected column
        data['value'] = params.value; // Pass the edited value
        return data;
    },
});

  
  </script>
  
  </body>
</tml>