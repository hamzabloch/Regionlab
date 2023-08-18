<!doctype html>
<html lang="en">

<head>

<style type="text/css">
    
      .dataTables_wrapper .dataTables_filter input{
    
    background-color: white !important;
  }
   label{
    color: black !important;
  }
</style>


    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
 

   
    <link rel="stylesheet" href="{{url('/public/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{url('/public/assets/vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/public/assets/libs/css/style.css')}}">
    <link rel="stylesheet" href="{{url('/public/assets/vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{url('/public/assets/vendor/vector-map/jqvmap.css')}}">
    <link href="{{url('/public/assets/vendor/jvectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{url('/public/assets/vendor/charts/chartist-bundle/chartist.css')}}">
    <link rel="stylesheet" href="{{url('/public/assets/vendor/charts/c3charts/c3.css')}}">
    <link rel="stylesheet" href="{{url('/public/assets/vendor/charts/morris-bundle/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('/public/assets/vendor/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{url('https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css')}}">

    <title>Project</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
   

        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top ">
                <a class="navbar-brand text-dark" href="#">Region Lab</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        
                        
                       

                              <li class="nav-item dropdown nav-user" >
                            <a class="nav-link nav-user-img p-2" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{url('/public/assets/images/pic.png')}}" alt="" class="user-avatar-md rounded-circle" style="border: 1px solid black; "></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">{{  Auth::user()->name }} </h5>
                                    <span class="status"></span>
                                </div>
                                <a class="dropdown-item" href="{{route('logout')}}"><i class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
               
                   
                    </ul>
                </div>
            </nav>
        </div>

 
        <div class="nav-left-sidebar sidebar-dark">

            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
            
                    <div class="collapse navbar-collapse" id="navbarNav">

                        <ul class="navbar-nav flex-column mt-4">

                               @if(auth()->user()->role === 'admin')
<!-- 
                                    <li class="nav-item m-2">
                                <a class="nav-link" style="background-color: #242849    ; color: white;" href="{{route('user')}}"><i class="fa fa-user" aria-hidden="true" style="font-size: 18px; color: white;"></i>User</a>
                            </li> -->

                              <li class="nav-item">
                                <a class="nav-link" href="{{route('user')}}" ><i class="fa fa-user"></i>User</a></li>

                            @endif



                         <!--             <li class="nav-item m-2">
                                <a class="nav-link " style="background-color: #242849   ; color: white; " href="{{route('client')}}"  aria-controls="submenu-2"><i class="fa fa-users" aria-hidden="true" style="font-size: 18px; color: white;"></i></i>Clients</a>
                            </li>
 -->
    <li class="nav-item">
                                <a class="nav-link" href="{{route('client')}}" ><i class="fa fa-users"></i>Clients</a></li>

                                @if(auth()->user()->role !== 'client')

                    
                                   <!--  <li class="nav-item m-2">
                                <a class="nav-link  " style="background-color: #242849 ; color: white;" href="{{route('message')}}" ><i class="fa fa-comments" aria-hidden="true" style="font-size: 18px; color: white;"></i>Messages</a>
                            </li> -->
                             <li class="nav-item">
                                <a class="nav-link" href="{{route('message')}}" ><i class="fa fa-comments"></i>Messages</a></li>

                            @endif
                             


                        </ul>
                    </div>
                </nav>
            </div>
        </div>
       

   

    </div>
     


    <div class="dashboard-wrapper " style="background-color: #f1f3f7;">
    <div class="dashboard-finance " style="background-color: #f1f3f7;">
     <div class="container-fluid dashboard-content"  style="background-color: #f1f3f7;    padding: 30px 15px 60px 15px;">
       @yield('content')
   </div>
</div>
</div>
  
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- jquery 3.3.1  -->
    
   
 
    
    <script src="{{url('/public/assets/vendor/jquery/jquery-3.3.1.min.js')}}"></script>

    <!-- bootstap bundle js -->
    <script src="{{url('/public/assets/vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
    <!-- slimscroll js -->
    <script src="{{url('/public/assets/vendor/slimscroll/jquery.slimscroll.js')}}"></script>
    <!-- chart chartist js -->
    <script src="{{url('/public/assets/vendor/charts/chartist-bundle/chartist.min.js')}}"></script>
    <script src="{{url('/public/assets/vendor/charts/chartist-bundle/Chartistjs.js')}}"></script>
    <script src="{{url('/public/assets/vendor/charts/chartist-bundle/chartist-plugin-threshold.js')}}"></script>
    <!-- chart C3 js -->
    <script src="{{url('/public/assets/vendor/charts/c3charts/c3.min.js')}}"></script>
    <script src="{{url('/public/assets/vendor/charts/c3charts/d3-5.4.0.min.js')}}"></script>
    <!-- chartjs js -->
    <script src="{{url('/public/assets/vendor/charts/charts-bundle/Chart.bundle.js')}}"></script>
    <script src="{{url('/public/assets/vendor/charts/charts-bundle/chartjs.js')}}"></script>
    <!-- sparkline js -->
    <script src="{{url('/public/assets/vendor/charts/sparkline/jquery.sparkline.js')}}"></script>
    <!-- dashboard finance js -->
    <script src="{{url('/public/assets/libs/js/dashboard-finance.js')}}"></script>
    <!-- main js -->
    <script src="{{url('/public/assets/libs/js/main-js.js')}}"></script>
    <!-- gauge js -->
    <script src="{{url('/public/assets/vendor/gauge/gauge.min.js')}}"></script>
    <!-- morris js -->
    <script src="{{url('/public/assets/vendor/charts/morris-bundle/raphael.min.js')}}"></script>
    <script src="{{url('/public/assets/vendor/charts/morris-bundle/morris.js')}}"></script>
    <script src="{{url('/public/assets/vendor/charts/morris-bundle/morrisjs.html')}}"></script>
    <!-- daterangepicker js -->
    <script src="../../../../{{url('/public/cdn.jsdelivr.net/momentjs/latest/moment.min.js')}}"></script>
    <script src="../../../../{{url('/public/cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js')}}"></script>
    <script>
    $(function() {
        $('input[name="daterange"]').daterangepicker({
            opens: 'left'
        }, function(start, end, label) {
            console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));
        });
    });
    </script>

</body>
</html>
