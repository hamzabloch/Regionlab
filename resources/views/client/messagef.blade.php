
@extends('home')

@section('content')

  @if(auth()->user()->role !== 'client')

  <style type="text/css">
    #chat3 .form-control {
border-color: transparent;
}

#chat3 .form-control:focus {
border-color: transparent;
box-shadow: inset 0px 0px 0px 1px transparent;
}

.badge-dot {
border-radius: 50%;
height: 10px;
width: 10px;
margin-left: 2.9rem;
margin-top: -.75rem;
}
input::placeholder{
  color: white !important;
}
  </style>



  <div class="container"style="background-color: #f1f3f7;">

    <div class="row"style="background-color: #f1f3f7;">
      <div class="col-md-12">

        <div class="card" id="chat3" style="border-radius: 15px; background-color:white;">
          <div class="card-body">

            <div class="row">
              <div class="col-md-6 col-lg-5 col-xl-4 mb-4 mb-md-0">

                <div class="p-3"style="background-color: #242849; border-radius: 10px; height: 100%;">

           <div class=" text-center text-white">
                Select Person
                  </div>

                  <div data-mdb-perfect-scrollbar="true" style="position: relative; height: 400px; ">
                    <ul class="list-unstyled mb-0">
                      @foreach($user as $users)

                    <li class="p-1 m-2" style="background-color: #3b406f; border-radius: 10px;">
                        <a href="{{route('message.id',$users->id)}}" class="d-flex justify-content-between text-white">
                          
                          <div class="">
                            <div>
                            
                              <span class="badge bg-success badge-dot"></span>
                            </div>
                            <div class="pt-1 " >
                                
                              <p class="fw-bold mb-0 "> 
                                <i class="fa fa-user p-2 " aria-hidden="true"></i>
                                {{$users->name}}</p>
                              
                            </div>
                          </div>
                         
                        </a>
                      </li>
                       @endforeach
                    </ul>
                  </div>

                </div>

              </div>

              <div class="col-md-6 col-lg-7 col-xl-8">

                <div class="pt-3 pe-3" data-mdb-perfect-scrollbar="true"
                  style="position: relative; height: 400px">
                  <img src="{{url('public/assets/images/wallpaper.png')}}" width="100%; ">

                </div>
              
            

              </div>
            </div>

          </div>
        </div>

      </div>
    </div>

  </div>

@else

 <script>
      window.location.href = 'user';
    </script>  
@endif
@endsection

