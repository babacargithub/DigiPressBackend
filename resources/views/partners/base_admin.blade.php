@extends('partners.top_left')
@section('content')
{{$partner->telephone}}
<table class="table table-bordered ">
@foreach($partner->journal->achatsDuJour() as $achat)
<tr>
    <td>{{$achat->abonne->prenom}}</td>
    <td>{{$achat->prix}}</td>
<td>{{$achat->methode_paiement}}</td>
<td>{{$achat->created_at}}</td>
</tr>


@endforeach
</table>
@endsection
