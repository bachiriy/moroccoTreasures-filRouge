@extends('Layouts.app')

@section('content')
    @include('Layouts.navbar')
    <div>
        @if(session('error'))
        <p class="text-red-500">{{ session('error') }} </p>
        @endif
    </div>
    <div>
        <h1>this is home baby !!</h1>
    </div>
@endsection
