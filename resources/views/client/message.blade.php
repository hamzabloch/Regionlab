
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



  <div class="container" style="background-color: #f1f3f7;">

    <div class="row"  style="background-color: #f1f3f7;">
      <div class="col-md-12">

        <div class="card" id="chat3" style="border-radius: 15px; background-color:white;">
          <div class="card-body">

            <div class="row">
              <div class="col-md-6 col-lg-5 col-xl-4 ">

                <div class="p-3" style="background-color: #242849; border-radius: 10px; height: 100%;">

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
           <div class="contact-profile d-flex justify-content-center p-2 mb-4" style="background-color: #242849; border-radius: 10px; font-size: 18px; color: white; font-weight: bold;">
      
       <i class="fa fa-user p-2 " aria-hidden="true"></i>
       
      <p style=" margin-top: 4px;">{{$userid->name}}</p>
   
    </div>

                <div class="pt-3 pe-3" data-mdb-perfect-scrollbar="true"
                  style="position: relative; height: 400px; overflow: auto;">


                      @foreach($select as $selects)
                        @if(auth()->user()->role == 'admin')

                      @if($selects->sender_id == auth()->user()->id)

                  <div class="d-flex flex-row justify-content-start" style=" word-break:break-all;" >
                    <div >
                      <p class=" p-2 ms-3 mb-1 rounded" style="background-color: #3b406f; color: white;">{{$selects->message}}</p>
                      <p class="small ms-3 mb-3 rounded-3 text-muted float-start">
                  {{ $selects->created_at->format('d-m / H:i') }}
                      </p>
                    </div>
                  </div>
                  @endif

                   @if($selects->sender_id !== auth()->user()->id)
                       <div class="d-flex flex-row justify-content-end" style=" word-break:break-all;">
                    <div>
                      <p class=" p-2 ms-3  mb-1 rounded" style="background-color: #6a75e4; color: white; ">{{$selects->message}}</p>
                      <p class="small ms-3 mb-3 rounded-3 text-muted float-end">
                  {{ $selects->created_at->format('d-m / H:i') }}
                      </p>
                    </div>
                  </div>
                   @endif
                   @endif


                      @if(auth()->user()->role == 'user')
                   @if($selects->sender_id == auth()->user()->id)

                  <div class="d-flex flex-row justify-content-start"style=" word-break:break-all;">
                    <div >
                      <p class=" p-2 ms-3 mb-1 rounded" style="background-color: #3b406f; color: white; ">{{$selects->message}}</p>
                      <p class="small ms-3 mb-3 rounded-3 text-muted float-start">
                  {{ $selects->created_at->format('d-m / H:i') }}
                      </p>
                    </div>
                  </div>
                  @endif

                   @if($selects->sender_id !== auth()->user()->id)
                       <div class="d-flex flex-row justify-content-end" style=" word-break:break-all;">
                    <div>
                      <p class=" p-2 ms-3  mb-1 rounded" style="background-color: #6a75e4; color: white;">{{$selects->message}}</p>
                      <p class="small ms-3 mb-3 rounded-3 text-muted float-end">
                  {{ $selects->created_at->format('d-m / H:i') }}
                      </p>
                    </div>
                  </div>
                   @endif
                   @endif

                   @endforeach
                 

                </div>
              
                 @if(auth()->user()->role == 'admin')

                <form class="text-muted d-flex justify-content-start align-items-center pe-3 pt-3 mt-2" method="post" action="{{route('message.save',$userid->id)}}">
                 @endif

                 @if(auth()->user()->role == 'user')
             
                  <form class="text-muted d-flex justify-content-start align-items-center pe-3 pt-3 mt-2" method="post" action="{{route('message.save',$userid->id)}}">
                  
                 @endif

               
             
                      @csrf

         
        
                  <input type="text" class="form-control form-control-lg text-white " id="exampleFormControlInput2"
                    placeholder="Type message" name="message" style="background-color: #242849; border-radius: 7px;" required  maxlength="250">


                  <input class="ms-3 m-2 btn text-white " style="background-color: #242849;"  type="submit" value="Send">
                      
              </form>
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

