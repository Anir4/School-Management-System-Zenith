<html lang="en">
  <head>
    <title>Parametre</title>
    @include('particals.head') 
  </head>
  <body>
    @include('particals.nav')
<!-- form -->
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
<div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Parametre</h4>
        <form class="form-sample" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="row">
            <div class="col-md-12">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Email paypal</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" placeholder="exemple@zenith.com" name="paypal"/>
                </div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">logo</label>
                <div class="col-sm-9">
                  <input type="file" class="form-control" name="logo" />
                  @if (!@empty($getRecord->getlogo()))
                  <img src="{{$getRecord->getlogo()}}" alt="">  
                  @endif  
                </div>
              </div>
            </div>
            <div class="col-md-12">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Fevicon </label>
                  <div class="col-sm-9">
                    <input type="file" class="form-control" name="Fevicon" />
                    @if (!@empty($getRecord->getfavicon()))
                  <img src="{{$getRecord->getfavicon()}}" alt="">  
                  @endif 
                  </div>
                </div>
              </div>
              
              </div>
              <div class="btfloat">
                <button type="submit" class="btn btn-inverse-primary btn-fw">Enregistrer</button>
          </div>
         </div>
        </form>
      </div>
    </div>
    
      </div>
</div></div>
@include('particals.script')
  </body>
</html>