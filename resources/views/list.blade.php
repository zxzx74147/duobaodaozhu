@extends('layouts.app')

@section('content')
    @component('layouts.list_action', ['items' => $items,'analyze'=>$analyze])
    @endcomponent
@endsection
