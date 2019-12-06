@extends('layouts.app')

@section('content')

<div class="alert alert-danger alert-block">
    <button type="button" class="close" data-dismiss="alert">×</button>	
        <strong>{{ $message }}</strong>
</div>

@endsection
