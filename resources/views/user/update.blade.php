


  @extends('home')
    
        
@section('content')
@if(auth()->user()->role === 'admin')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                 <div class="card-header text-center text-white" style="font-size: 22px; background-color:  #242849;">{{ __('Update User') }}</div>

                <div class="card-body p-0 pt-3">
                <form method="POST" action="{{ route('user.update', $user->id) }}">

                        @csrf

                        <div class="w-75 mx-auto my-2">
                            <label for="name" class=" text-md-end"> {{ __('Name') }} </label>

                            <div class="">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                    


                        <div class="w-75 mx-auto my-2">
                            <label for="email" class="text-md-end">{{ __('Email Address') }}</label>

                            <div class="">
                                <input id="email" readonly="" type="email" class="form-control @error('emailedit') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email">

                                @error('emailedit')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="w-75 mx-auto my-2">
                            <label for="password" class=" text-md-end">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" value="{{$user->password}}">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                        </div>
   <div class="w-75 mx-auto m-3">
                            <label for="Role" class="text-md-end">{{ __('Role') }}</label>
                             <div class="">
                                @if($user->role=='admin')
                                <select class="form-control" name="role" value="{{$user->role}}">
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                                @endif
                                     @if($user->role=='user')
                                <select class="form-control" name="role" value="{{$user->role}}">
                                    <option value="user">User</option>
                                    <option value="admin">Admin</option>   
                                </select>
                                @endif
                             
                            </div>
                        </div>
                     
                            <div class="text-center m-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                   
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@else

 <script>
      window.location.href = 'client';
    </script>   
@endif
@endsection
