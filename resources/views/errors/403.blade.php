@extends('errors.layout')

@php
  $error_number = 403;
@endphp

@section('title')
  Accès refusé.
@endsection

@section('description')
  @php
    $default_error_message = "Veuillez <a href='javascript:history.back()''>retourner</a> ou cliquez ic  <a href='".url('')."'>pour la page d'accueil</a>.";
  @endphp
  {!! isset($exception)? ($exception->getMessage()?e($exception->getMessage()):$default_error_message): $default_error_message !!}
@endsection
