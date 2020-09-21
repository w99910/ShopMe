@extends('layouts.app')

@section('content')
    @livewire('password-oauth',['user'=>$auth_user])

@endsection
