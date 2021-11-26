<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Emargement</title>
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
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="page-header">
              <h3 class="page-title"> Presence </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="{{ route('presence.index') }}">Accueil</a></li>
                  <li class="breadcrumb-item active" aria-current="page">presence</li>
                </ol>
              </nav>
            </div>
            <div class="row">  
              <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Liste des presence</h4>
                    </p>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                          <th>jour</th>
                          <th> date </th>
                          <th> nom et prenom</th>
                           <th>date du jour</th>
                            <th>Heure d'arrivée</th>
                            <th>Heure de depat</th>
                          <th> Etat </th>
                        </tr>
                      </thead>
                      <tbody>
                        @if(count($emerges) == 0)
                        <tr><td colspan='7' style='text-align:center;font-weight:bold;'>Aucun Arrivé pour le moment</td></tr>
                      @else
                      @foreach ($emerges as $emerge)
                            @php
                              $goodTime = new DateTime('08:30');
                              $gt = $goodTime->format('H:i');
                              $arrivedTime = new DateTime($emerge->date_coming);
                              $at = $arrivedTime->format('H:i');
                              if($emerge->departure_date !== null)
                              {
                                $start_date = new DateTime($emerge->date_coming);
                                $end_date = new DateTime($emerge->departure_date);
                                $diff = $start_date->diff($end_date);
                                $pass = $diff->format("%H:%I:%S");
                              }else 
                              {
                                 $pass = 'Indéterminé';
                              }
                            @endphp
                            <tr>
                               <td>{{__('day.'.date('l',strtotime($emerge->date_day)))}}</td>
                               <td>{{date('d-m-Y',strtotime($emerge->date_coming))}}</td>
                               <td> {{$emerge->prenom}} {{$emerge->nom }}</td>
                               <td>{{date('H:i',strtotime($emerge->date_coming))}}</td>
                               @if($emerge->departure_date == null)
                                   <td>Encore en salle</td>
                                   <td>{{$pass}}</td>
                                    <td>
                                        {{-- <i class="bi bi-toggle-off"></i> --}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="fillCurrentColor" class="bi bi-toggle-off" viewBox="0 0 16 16">
                                            <path d="M11 4a4 4 0 0 1 0 8H8a4.992 4.992 0 0 0 2-4 4.992 4.992 0 0 0-2-4h3zm-6 8a4 4 0 1 1 0-8 4 4 0 0 1 0 8zM0 8a5 5 0 0 0 5 5h6a5 5 0 0 0 0-10H5a5 5 0 0 0-5 5z"/>
                                        </svg>
                                    </td>
                               @else
                                <td>{{date('H:i',strtotime($emerge->departure_date))}}</td>
                                   <td>{{$pass}}</td>
                                    <td>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="#6610f2" class="bi bi-toggle-on" viewBox="0 0 16 16">
                                        <path d="M5 3a5 5 0 0 0 0 10h6a5 5 0 0 0 0-10H5zm6 9a4 4 0 1 1 0-8 4 4 0 0 1 0 8z"/>
                                    </svg>
                                </td>
                               @endif
                            </tr>
                        @endforeach
                      @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>  
            </div>
          </div>
        </div>
      </div>
    </div>
   <script>
      const getSearchData =  async(date)=>
    {
      const resp = await fetch("{{env('BASE_URL')}}search_data_by_date/"+date);
      const data = resp.json();
      return data;
    }
 //  Train select
 $('#formation').on('change', e=>
 {
     let train = e.target.value;
     // En cour de développement 
     alert('En cour de développement');
 })
    var temp = ''
    $('#selected_date').on('change', e => 
    {
        let date = e.target.value;
     //    alert(date);
        getSearchData(date)
        .then((data) => {
          if(data.length > 0)
          {
            $('#table').children('tbody').empty();
            data.map( d =>{
             //    <tr><td>d.</td></tr>
             //    temp += ``; 
             console.locale(d);
            })
          }else
          {
             $('#table').children('tbody').empty();
             temp = "<tr><td colspan='7' style='text-align:center;font-weight:bold;color:red;'>Aucune donnée Trouvée</td></tr>";
             $('#table').children('tbody').append(temp);
          }
        })
        .catch( (err) => {
         console.log(err);
        })
    })
   </script>
    <script src="{{asset('assets/vendors/js/vendor.bundle.base.js')}}"></script>
    <script src="{{asset('assets/js/off-canvas.js')}}"></script>
    <script src="{{asset('assets/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('assets/js/misc.js')}}"></script>
  </body>
</html>