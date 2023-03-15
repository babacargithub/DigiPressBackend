@extends('admin/base_admin')
@section('content')
<div id="app">
    <form  method="post" action="{{route("create_multiple_pages",["parution"=>$parution->id])}}" enctype="multipart/form-data">
        <input type="file" multiple name="images[]"/>
        <button>Submit</button>
    </form>
</div>
<script src="{{ asset('js/app.js') }}"></script>
@endsection


