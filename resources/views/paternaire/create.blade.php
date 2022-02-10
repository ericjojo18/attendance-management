<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PARTENAIRES</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}" />
  </head>
  <body>
    <div class="container-scroller">
      @include('header')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        @include('heade')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> PARTENAIRES </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('paternaire.create') }}">Accueil</a></li>
                  <li class="breadcrumb-item active" aria-current="page">partenaire</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-md-6 grid-margin stretch-card">
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible border-1 border-left-3 border-left-danger"role="alert"">
                <button type="button"
                        class="close"
                        data-dismiss="alert"
                        aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <ul>
                        @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Créer un partenaire</h4>
                    <p class="card-description"></p>
                    <form class="forms-sample" action="{{ route('paternaire.create') }}" method="POST">
                        @csrf
                      <div class="form-group">
                        <label for="name">Nom du partenaire</label>
                        <input type="text" class="form-control" id="name" name="name" >
                      </div>
                      <div class="form-group">
                        <label for="activity_domain">Activite du domaine</label>
                        <input type="text" class="form-control" id="activity_domain" name="activity_domain" >
                      </div>
                      <div class="form-group">
                        <label for="address">Adresse du partenaire</label>
                        <input type="text" class="form-control" id="address" name="address" >
                      </div>
                      <div class="form-group">
                        <label for="contact">Contact du partenaire</label>
                        <input type="text" class="form-control" id="contact" name="contact" >
                      </div>
                      <button type="submit" class="btn btn-gradient-primary mr-2">Enregistrer</button>
                      <a href="{{ route('paternaire.create') }}" class="btn btn-light">Retour</a>
                    </form>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('assets/js/misc.js')}}"></script>
    <script src="{{asset('assets/js/file-upload.js')}}"></script>
  </body>
</html>
