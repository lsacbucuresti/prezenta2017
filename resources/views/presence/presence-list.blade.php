@extends('partials.layout')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="hpanel">
                <div class="panel-body">

                    @foreach($codes as $code)

                        <a href="{{ URL::to('list/'.date('Y-m-d',strtotime($code->expiration)).'/'.$code->id) }}">{{ $code->title }} - {{ date('d-m-Y',strtotime($code->expiration)) }}</a>

                    @endforeach

                    {{ $codes->links() }}

                </div>
            </div>
        </div>
    </div>
@endsection