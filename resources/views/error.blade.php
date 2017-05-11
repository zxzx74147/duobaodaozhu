@extends('layouts.app')

@section('content')
    <div class="feed">
        <p>Error Code: {{$error->error}}</p>
        <p>Error Message : {{$error->errorStr}}</p>
    </div>
@endsection



