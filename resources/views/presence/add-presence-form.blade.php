@extends('partials.layout')

@section('content')
<div class="login-container">
    <div class="row">
        <div class="col-md-12">
            <div class="hpanel">
                <div class="panel-body">
                        <form action="{{ URL::to('/prezenta') }}" method="post" id="loginForm">
                            <div class="form-group">
                                <label class="control-label" for="name">Nume</label>
                                <input type="text" placeholder="Nume" required name="name" id="name" class="form-control" value="{{ old('name') }}">
                                <p style="color:red">{{ $errors->first('name') }}</p>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="surname">Prenume</label>
                                <input type="text" placeholder="Prenume" required name="surname" id="surname" class="form-control" value="{{ old('surname') }}">
                                <p style="color:red">{{ $errors->first('surname') }}</p>
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="password">Cod</label>
                                <input type="text" placeholder="code" required name="code" id="code" class="form-control" value="{{ old('code') }}">
                                <p style="color:red">{{ $errors->first('code') }}</p>
                            </div>

                            {{ csrf_field() }}

                            <button class="btn btn-success btn-block">Prezent</button>

                            @if(Session::has('success'))
                                <p class="alert alert-success message-success"> {{ Session::get('success') }} </p>
                            @endif

                        </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection