@extends('Layouts.app')

@section('content')
    <div>
        {{ Auth::user()->role }}
        @if(Auth::check())
            <form action="/logout" method="post" class="hover:text-gray-200">
                @csrf
                <button class="text-gray-200 hover:text-red-500 transition-all">LOGOUT</button>
            </form>
        @endif
        <h1>this is dashboard sir !!!</h1>
    </div>
@endsection
