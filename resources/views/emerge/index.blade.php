<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('assets/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendors/css/vendor.bundle.base.css')}}">
     <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
     <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"  integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('assets/images/favicon.ico')}}" />
  </head>
  <body >
    <div class="container-scroller">
      @include('header')
      <div class="container-fluid page-body-wrapper">
        @include('heade')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title">Emargement</h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Accueil</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Emargement</li>
                </ol>
              </nav>
            </div>
            <div id='map' style='width: 400px; height: 300px;'></div>
            <div class="row">
              <div class="col-md-10 grid-margin stretch-card" id="map"   >
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">EMARGEMENT</h4>
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
                    <p class="card-description">  </p>
                    <form class="forms-sample" action="{{ route('emerge.index') }}" method="POST">
                      @csrf
                      <div class="form-group">
                        <label for="email">Adresse email</label>
                        <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                      </div>
                      <div class="form-group">
                        <label for="ip_address">Adresse ip</label>
                        <input type="text" class="form-control" id="ip_address" name="ip_address" >
                      </div>
                      <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>
            </div> 
          <div>
        </div>
      </div>
    </div>

<script>
  const mymap = L.map('map').setView([51.505, -0.09], 13)
  // function init() {
  //       const position = {
  //           lat: 5.3510144,
  //           lng: -4.0075264,
  //       }
        
  //       ;const zoomlevel = 14;
    
  //       const map = L.map('map').setView([position.lat, position.lng], zoomlevel); 
    
  //       const mainLayer = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
  //       attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
  //       maxZoom: 18,
  //       id: 'styles/mapbox/streets-v11',
  //       tileSize: 512,
  //       zoomOffset: -1,
  //       accessToken: 'pk.eyJ1Ijoiam9qbzE5OTgiLCJhIjoiY2t3ZGowNDE0MHVucjMxbjJrb2d6cG80MCJ9.8R-Jt_cnrJb_zJLpKlHLSA'});
    
  //       mainLayer.addTo(map);
  //       var circle = L.circle([position.lat, position.lng], {
  //       color: 'red',
  //       fillColor: '#f03',
  //       fillOpacity: 0.5,
  //       radius: 500
  //   }).addTo(map);
  
// const position = [ 5.3510144, -4.0075264]

mapboxgl.accessToken = '{{env("MAPBOX_KEY")}}';
var map = new mapboxgl.Map({
container: 'map',
center: position,
Zoom:11.15,
style: 'mapbox://styles/mapbox/streets-v11'
});

const style = "dark-v10"
map.setStyle('mapbox://styles/mapbox/${style}')
map.addControl( new mapboxgl.NavigationControl())
map.on('click',(e) => {
  cont longtitude = e.lngLat.lng
  cont lattitude = e.lngLat.lat

  console.log({longtitude, lattitude });
})
</script>


    <script src="{{asset('assets/js/map.js')}}"></script>
    <script>
      
    getIP()
    .then( ip => 
    {
        // console.log(11100)
        $("#ip_address").val(ip['ip']);
    })
    .catch( error => 
    {
        console.log(error);
    })
    </script>
    
    <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="{{asset('assets/js/off-canvas.jso')}}"></script>
    <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('assets/js/misc.js')}}"></script>
    <script src="{{asset('assets/js/file-upload.js')}}"></script>
    
  </body>
</html>