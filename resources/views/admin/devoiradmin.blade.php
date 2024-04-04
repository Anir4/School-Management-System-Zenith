<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Devoir</title>
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
        <h4 class="card-title">Devoir</h4>
        <form class="form-sample">
          <div class="row">
            <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">classe</label>
                  <div class="col-sm-9">
                    <select class="form-control">
                      <option>TC1</option>
                      <option>TC2</option>
                      <option>scmath</option>
                      <option>eco</option>
                      <option>scmathA</option>
                      <option>scex1</option>
                      <option>scex2</option>
                      <option>scphysique</option>
                    </select>
                  </div>
                </div>
              </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">de </label>
                <div class="col-sm-9">
                  <input class="form-control" placeholder="jj/mm/aaaa" />
                </div>
              </div>
            </div>
       
      
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">cree par</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" />
              </div>
            </div>
          </div>
            <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">À </label>
              <div class="col-sm-9">
                <input class="form-control" placeholder="jj/mm/aaaa" />
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">document</label>
              <div class="col-sm-9">
                <input type="file" class="form-control" />
              </div>
            </div>
          </div></div>
              <div class="btfloat">
            <button type="button" class="btn btn-inverse-success btn-fw">Ajouter</button>
          </div>
         </div>
        </form>
      </div>
    </div>
    
       <!-- table -->
<div class="col-md-12 grid-margin stretch-card">
<div class="card">
  <div class="card-body">
    <h4 class="card-title">Table Devoirs</h4>
    <table class="table table-striped display"  id="example">
      <thead>
        <tr>
          <th> #</th>
          <th> classe </th>
          <th> de </th>
          <th>À </th>
          <th> cree par</th>
          <th> document </th>
          <th>option</th>
        </tr>
      </thead>
      <tbody>
        
      </tbody>
    </table>
  </div>
</div>
</div></div></div></div>
@include('particals.script')
  </body>
</html>