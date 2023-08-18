


  @extends('home')
    
        
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Update') }}</div>

                <div class="card-body">
                <form method="POST" action="{{ route('meeting.update', $meeting->id) }}">

                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end"> {{ __('User Name') }} </label>

                           <div class="form-group">
    <label for="customer">Customer:</label>
    <select class="form-control" id="customer" name="customer" value="{{$appointment->user_id}}" required>
      @foreach($customer as $customers)
      <option value="{{$customers->id}}">{{$customers->name}}</option>
     @endforeach
      
    </select>
  </div>
                        </div>


                    


                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Client Name') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="client" value="{{ $user->email }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
