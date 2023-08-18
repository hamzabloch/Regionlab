@extends('home')

@section('content')
@if(auth()->user()->role === 'admin')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-white text-center" style="font-size: 22px; background-color:  #242849;">{{ __('Create User') }}</div>

                <div class="card-body p-0 pt-3">
                <form method="POST" action="{{route('user.store')}}">
                        @csrf

                        <div class="w-75 mx-auto m-3">
                            <label for="name" class="text-md-end">{{ __('Name') }}</label>
                            <div class="">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                     


                        <div class="w-75 mx-auto m-3">
                            <label for="email" class="text-md-end">{{ __('Email Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="w-75 mx-auto m-3">
                            <label for="password" class="text-md-end">{{ __('Password') }}</label>

                            <div class="">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="w-75 mx-auto m-3">
                            <label for="password-confirm" class="text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="">
                                <input id="password-confirm" type="password" class="form-control @error('confirm') is-invalid @enderror"  name="password_confirmation" required autocomplete="new-password">
                                @error('confirm')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                         
                        </div>
                        <div class="w-75 mx-auto m-3">
                            <label for="Role" class="text-md-end">{{ __('Role') }}</label>
                             <div class="">
                                <select class="form-control" name="role">
                                    <option value="admin">Admin</option>
                                    <option value="user">User</option>
                                </select>
                             
                            </div>
                        </div>
                            <div class="text-center m-3">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create') }}
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
