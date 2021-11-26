<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}" />
  </head>
  <body>
    <div class="container-scroller">
      @include('header')
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
                    <form class="forms-sample" action="{{ route('formation.edit',$formation->id) }}" method="POST">
                        @csrf
                      <div class="form-group">
                        <label class="form-label"	for="partenaire_id">Partenaire</label>
                        <select class="form-control" name="partenaire_id" id="partenaire_id">
                            @foreach(App\Models\Partenaire::all() as $paternaire)
                            <option value="">VEILLEZ REMPLIR</option>
                            <option value="{{$paternaire->id}}" {{$paternaire->id == $formation->partenaire_id ? 'selected' : ''}}>{{$paternaire->name}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label class="form-label"	for="referentiel_id">referentiel</label>
                        <select class="form-control" name="referentiel_id" id="referentiel_id">
                            @foreach(App\Models\Referentiel::all() as $referentiel)
                            <option value="">VEILLEZ REMPLIR</option>
                            <option value="{{$referentiel->id }}" {{$referentiel->id == $formation->referentiel_id ? 'selected' : ''}}>{{$referentiel->label}}</option>
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="type_formation">Formation</label>
                        <input type="text" class="form-control" id="type_formation" name="type_formation" value="{{$formation->type_formation}}" >
                      </div>
                      <div class="form-group">
                        <label for="beginDate">Date du debut</label>
                        <input type="date" class="form-control" id="beginDate" name="beginDate" value="{{$formation->beginDate}}">
                      </div>
                      <div class="form-group">
                        <label for="endDate">Date de fin</label>
                        <input type="date" class="form-control" id="endDate" name="endDate" value="{{$formation->endDate}}">
                      </div>
                      <button type="submit" class="btn btn-gradient-primary mr-2">Modifier</button>
                      <a href="{{ route('formation.index') }}" class="btn btn-light">Retour</a>
                    </form>
                  </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('assets/js/misc.js')}}"></script>
    <script src="{{asset('assets/js/file-upload.js')}}"></script>
    </body>
  </html>