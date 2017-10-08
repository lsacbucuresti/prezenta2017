@extends('partials.layout')

@section('content')
<div class="login-container">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center m-b-md">
                <h3>ADD CODE</h3>
            </div>
            <div class="hpanel">
                <div class="panel-body">
                    @if($code)
                        {{ $code->code }} setat de {{ $code->getAdmin->username }}
                        Expira la ora {{ $code->expiration }}
                    @else
                    <form action="{{ URL::to('/code') }}" method="post" id="loginForm">
                        <div class="form-group">
                            <label class="control-label" for="username">Username</label>
                            <input type="text" placeholder="username" required name="username" id="username" class="form-control">
                            <p style="color:red">{{ $errors->first('username') }}</p>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Password</label>
                            <input type="password"  placeholder="password" required name="password" id="password" class="form-control">
                            <p style="color:red">{{ $errors->first('password') }}</p>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="title">Titlu sedinta</label>
                            <input type="text" placeholder="Titlu sedinta" required name="title" id="title" class="form-control">
                            <p style="color:red">{{ $errors->first('username') }}</p>
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="password">Cod</label>
                            <input type="text" placeholder="Cod" required name="code" id="code" class="form-control" value="{{ old('code') }}">
                            <p style="color:red">{{ $errors->first('code') }}</p>
                            <a style="color:blue" href="#" onclick="generateCode()">Generate code</a>
                        </div>

                        {{ csrf_field() }}

                        <p style="color:red">{{ $errors->first('account') }}</p>

                        <button class="btn btn-success btn-block">Add Code</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

    function generateCode(){
        var text = "";
        var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

        for (var i = 1; i < 9; i++)
            text += possible.charAt(Math.floor(Math.random() * possible.length));
        document.getElementById('code').value = text;
    }

</script>
@endsection