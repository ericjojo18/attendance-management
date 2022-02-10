<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Formation </title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}" />
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
              <h3 class="page-title"> Formation </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('formation.index') }}">Accueil</a></li>
                  <li class="breadcrumb-item active" aria-current="page">formations</li>
                </ol>
              </nav>
            </div>
            <div class="row">
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Liste des formations</h4>
                    <a href="{{ route('formation.create') }}" class="btn btn-primary">Créer</a>
                    </p>
                    @if(session()->has('success'))
                    <div class="alert alert-success alert-dismissible border-1 border-left-3 border-left-success"
                                role="alert">
                                <button type="button"
                                        class="close"
                                        data-dismiss="alert"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="text-black-70">{{ session('success')}}</div>
                            </div>
                    @endif
                    @if(session()->has('danger'))
                    <div class="alert alert-danger alert-dismissible border-1 border-left-3 border-left-success"
                                role="alert">
                                <button type="button"
                                        class="close"
                                        data-dismiss="alert"
                                        aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <div class="text-black-70">{{ session('danger')}}</div>
                            </div>
                    @endif
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th> id</th>
                          <th> nom du partenaire</th>
                          <th> nom du referentiel</th>
                           <th> Formation</th>
                            <th>Date du debut</th>
                            <th>Date du fin</th>
                          <th> Action </th>
                        </tr>
                      </thead>
                      <tbody>

                          @foreach ($formations as $formation)
                          <tr>
                            <td> {{$formation->id}}</td>
                            <td> {{$formation->partenaire->name}}</td>
                             <td> {{$formation->referentiel->label}}</td>
                              <td> {{$formation->training}}</td>
                            <td> {{$formation->beginDate}}</td>
                            <td> {{$formation->endDate}}</td>
                            <td>
                                <a href="{{ route('formation.edit',$formation->id) }}" class="btn btn-primary">edit</a>
                                <a href="{{ route('formation.delete',$formation->id) }}" class="btn btn-secondary">Supprimer</a>
                          </td>
                          </tr>
                          @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>>
        </div>
      </div>
    </div>
    <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('assets/js/misc.js')}}"></script>
  </body>
</html>
