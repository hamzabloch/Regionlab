@extends('home')
    
        
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center" style="font-size: 22px; font-weight: bold; background-color: #242849; color: white;">{{ __('Update Clients') }}</div>

                <div class="card-body">
                <form method="POST" action="{{ route('client.update', $client->id) }}">

                        @csrf
                       

                       <div class="d-flex">
                            <div class="w-50  p-2">
                            <label for="name" class="text-md-end">{{ __('Lead_ID') }}</label>

                            <div class="">
                                <input id="leadid" type="text" class="form-control @error('leadid') is-invalid @enderror" name="leadid" required autocomplete="leadid" autofocus value="{{$client->leadid}}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                         <div class=" pl-2">
                            <label for="name" class="text-md-end">{{ __('Status') }}</label>
                                <select  class="form-control" style=" height: 47%; margin-top: 8px;" name="status" value="" >
                                    <option>{{$client->status}}</option>
                                    <option>Open/Fresh Lead</option>
                                    <option>Open-Attempted Contact</option>
                                    <option>Open-Booked Appointment</option>
                                    <option>Open-Client Contact</option>
                                    <option>Closed – 6th or 7th attempt htr</option>
                                    <option>Open – Fronted</option>
                                    <option>Open – Half-Pitched Keep</option>
                                    <option>Open – Pitched Keep</option>
                                    <option>Open – Deal Written</option>
                                    <option>Open – Deal Complied</option>
                                    <option>Closed – No pitches/Blow offs</option>
                                    <option>Closed – allocated to email marketing</option>
                                    <option>Closed – Bad number</option>
                                    <option>Closed – Half-pitch no keep</option>
                                    <option>Closed – payment cleared – deal complete</option>
                                    <option>Closed – dnc heat</option>
                                    <option>Open – Institutional pitch</option>
                                    <option>Open – dci fresh</option>
                                    <option>Open – htr</option>
                                    <option>Resting / Mature</option>
                                    <option>C – L</option>
                                    <option>Good Lead</option>
                                    <option>Junk Lead</option>
                                </select>
                    </div>
                       </div> 

<div class="d-flex">
     <div class="w-50  p-2">
                            <label for="name" class="text-md-end">{{ __('Name') }}</label>

                            <div class="">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus value="{{$client->name}}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <div class="w-50  p-2">
                            <label for="email" class="text-md-end">{{ __('Email Address') }}</label>

                            <div class="">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"  required autocomplete="email" readonly="" value="{{$client->email}}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

</div>
               <div class="d-flex">
                   <div class="w-50  p-2">
                            <label for="name" class="text-md-end">{{ __('Phone Number') }}</label>

                            <div class="">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" autocomplete="phone" autofocus  value="{{$client->phone}}">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                             <div class="w-50  p-2">
                            <label for="name" class="text-md-end">{{ __('Address') }}</label>

                            <div class="">
                                <input id="adress" type="text" class="form-control @error('adress') is-invalid @enderror" name="adress" autocomplete="adress" autofocus value="{{$client->adress}}">

                                @error('adress')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
               </div>        
                          
                        <div class="d-flex">
                             <div class="w-50  p-2">
                            <label for="name" class="text-md-end">{{ __('Company') }}</label>

                            <div class="">
                                <input id="company" type="text" class="form-control @error('company') is-invalid @enderror" name="company" autocomplete="company" autofocus value="{{$client->company}}">

                                @error('company')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                           <div class="w-50  p-2">
                            <label for="postion" class="text-md-end">{{ __('Position') }}</label>

                            <div class="">
                                <input id="position" type="text" class="form-control @error('position') is-invalid @enderror" name="position" autocomplete="position" autofocus value="{{$client->position}}">

                                @error('position')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </div>

                          <div class="d-flex">
                               <div class="w-50  p-2">
                            <label for="otheremail" class="text-md-end">{{ __('Other Email') }}</label>

                            <div class="">
                                <input id="otheremail" type="text" class="form-control @error('otheremail') is-invalid @enderror" name="otheremail"  autocomplete="otheremail" autofocus value="{{$client->otheremail}}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                           <div class="w-50  p-2">
                            <label for="otherphone" class="text-md-end">{{ __('Other Phone') }}</label>

                            <div class="">
                                <input id="otherphone" type="text" class="form-control @error('otherphone') is-invalid @enderror" name="otherphone"  autocomplete="otherphone" autofocus value="{{$client->otherphone}}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                          </div>

                        <div class="d-flex">
                              <div class="w-50  p-2">
                            <label for="country" class="text-md-end">{{ __('Country Of Residence') }}</label>

                            <div class="">
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" autocomplete="country" autofocus value="{{$client->country}}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                           <div class="w-50  p-2">
                            <label for="nationality" class="text-md-end">{{ __('Nationality') }}</label>

                            <div class="">
                                <input id="nationality" type="text" class="form-control @error('nationality') is-invalid @enderror" name="nationality"  autocomplete="nationality" autofocus value="{{$client->nationality}}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            <div class="w-50 p-2">
                            <label for="Call Time" class=" text-md-end">{{ __('Time of Call') }}</label>

                            <div class="">
                                <input id="call" type="time" class="form-control @error('Call') is-invalid @enderror" name="call"  autocomplete="Time of Call" autofocus value="{{$client->time_call}}">

                                @error('call')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </div>  

                         

                        
                            <div class="text-center mt-3">
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

@endsection
