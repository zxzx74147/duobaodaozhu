@extends('layouts.app')

@section('content')
    @component('layouts.list_item', ['items' => $items])
    @endcomponent
@endsection
