<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PARTENAIRES</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="../../{{asset('assets/css/style.css')}}assets/vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="../../{{asset('assets/css/style.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../{{asset('assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../{{asset('assets/images/favicon.ico')}}" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      @include('header')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:../../partials/_sidebar.html -->
        @include('heade')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> PARTENAIRES </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('apprenant.index') }}">Accueil</a></li>
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
                    <h4 class="card-title">Créer un apprenant</h4>
                    <p class="card-description"></p>
                    <form class="forms-sample" action="{{ route('apprenant.create') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="type_formation">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" >
                          </div>
                          <div class="form-group">
                            <label for="type_formation">Prenom</label>
                            <input type="text" class="form-control" id="prenom" name="prenom" >
                          </div>
                          <div class="form-group">
                            <label for="type_formation">Date de naissance</label>
                            <input type="date" class="form-control" id="date_naissance" name="date_naissance" >
                          </div>
                          <div class="form-group">
                            <label for="type_formation">Niveau</label>
                            <input type="text" class="form-control" id="niveau" name="niveau" >
                          </div>
                      <div class="form-group">
                        <label class="form-label"	for="type_formation">Formation</label>
                        <select class="form-control" name="type_formation" id="type_formation">
                            @foreach(App\Models\Formation::all() as $formation)
                            <option value="">VEILLEZ REMPLIR</option>
                            <option value="{{$formation->id }}">{{$formation->type_formation}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="type_formation">Adresse email</label>
                        <input type="text" class="form-control" id="email" name="email" >
                      </div>
                      <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control" id="password" name="password" >
                      </div>
                      <div class="form-group">
                        <label for="password_confirmation">Confirmer mot de passe</label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                      </div>
                      <button type="submit" class="btn btn-gradient-primary mr-2">Enregistrer</button>
                      <a href="{{ route('formation.index') }}" class="btn btn-light">Retour</a>
                    </form>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="container-fluid clearfix">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © bootstrapdash.com 2020</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin templates </a> from Bootstrapdash.com</span>
            </div>
          </footer>
          <!-- partial -->
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