@extends('admin/base_admin')
@section('content')

    <form method="post" enctype="multipart/form-data">
        <input type="file" name="images[]" multiple />
        <button type="submit">Soumettre les images</button>
    </form>
@endsection
