<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Vue</title>
</head>
<body>
<h1>Page test</h1>
<div id="app">
    <Welcome></Welcome>
    <form  method="post" action="{{route("test-upload",["parution"=>3])}}" enctype="multipart/form-data">
        <input type="file" multiple name="images[]"/>
        <button>Submit</button>
    </form>
</div>
<script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
