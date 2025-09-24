@extends('layouts.app')
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register Account</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-8">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="off" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

                            <div class="col-md-8">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="off" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="account" class="col-md-4 col-form-label text-md-end">Account</label>

                            <div class="col-md-8">
                            <select id="account" name="account" class="form-control" type="select" required>
                                <option selected="true" disabled>Select Account</option>
                                <option value="Public">Public</option>
                                <option value="Branch Admin">Branch Admin</option>
                                <option value="Admin">Admin</option>
                                <option value="Super Admin">Super Admin</option>
                            </select>
                            </div>
                        </div>  

                        <div class="row mb-3">
                            <label for="company" class="col-md-4 col-form-label text-md-end">Company</label>
                            
                            <div class="col-md-8">
                            <select id="company" name="company" class="form-control" type="select" required>
                                <option selected="true" disabled>Select Company</option>
                                <option value="GAOC">GAOC</option>
                                <option value="NOVO">NOVO</option>
                            </select>
                            </div>
                        </div>  

                        <div class="row mb-3 branches">
                            <label for="branch" class="col-md-4 col-form-label text-md-end">Branch</label>

                            <div class="col-md-8">
                                <select id="branch" name="branch" class="form-control" type="select">
                                    <option value="" required>Select Branch</option>
                                </select>
                            </div>   
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="off">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="off">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-lg btn-primary" style="width:50%; border:0px">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

$(document).ready(function () {
    $("#company").change(function () {
        var val = $(this).val();
        if (val == "GAOC") {
            $("#branch").html("<option value='' selected disabled>Select Branch</option><option value='ALABANG'>ALABANG</option><option value='CONRAD'>CONRAD</option><option value='CEBU'>CEBU</option><option value='Megamall'>MEGAMALL</option><option value='OBINSONS MAGNOLIA'>ROBINSONS MAGNOLIA</option><option value='TRAG'>TRAG</option><option value='TRINOMA'>TRINOMA</option><option value='SLMC'>SLMC</option><option value='VERTIS'>VERTIS</option><option value='BGC'>BGC</option>");
        } else if (val == "NOVO") {
            $("#branch").html("<option value='' selected disabled>Select Branch</option><option value='ADRIATICO'>ADRIATICO</option><option value='ROBINSONS MANILA'>ROBINSONS MANILA</option><option value='THE 30TH'>THE 30TH</option><option value='U.P. TOWN CENTER'>U.P. TOWN CENTER</option><option value='CIRCUIT'>CIRCUIT</option><option value='UPTOWN BGC'>UPTOWN BGC</option><option value='TRINOMA'>TRINOMA</option><option value='SM NORTH'>SM NORTH</option><option value='AIR RESIDENCES'>AIR RESIDENCES</option><option value='ROBINSONS MANILA EXTENSION'>ROBINSONS MANILA EXTENSION</option><option value='ESTANCIA'>ESTANCIA</option>");
        } else if (val == "SAMURAI") {
            $("#branch").html("<option selected='true'>Select Branch</option><option value='Chunics'>Chunics</option><option value='Bulacan'>Bulacan</option>" +
                            "<option value='Pampanga'>Pampanga</option>");
        }
    });
});

</script>
@endsection
