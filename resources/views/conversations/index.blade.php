
@extends('layouts.app')
@section('content')
<div class="container mt-4">
<div id="messagerie" >
    <Messagerie :user="{{ Auth::user()->id }}"></Messagerie>
</div>
</div>
@endsection
