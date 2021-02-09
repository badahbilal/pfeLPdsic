@extends('frontend.corps')


@section('content')

<ul>

   good
</ul>

    <a href="ddsession">dd session</a>

@if(Session::has('cart'))
   bilal
    <br>
    <h1>

        {{request()->session()->get('count')}}
    </h1>
@endif
    @endsection