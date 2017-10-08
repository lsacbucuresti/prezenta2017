@extends('partials.layout')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="hpanel">
            <div class="panel-body">

                @if(count($persons))

                @foreach($persons as $person)

                    <p>{{ $person->name }} {{ $person->surname }}</p>

                @endforeach

                @else
                    <p>Nu a fost nimeni prezent la aceasta sedinta.</p>
                @endif

            </div>
        </div>
    </div>
</div>
@endsection