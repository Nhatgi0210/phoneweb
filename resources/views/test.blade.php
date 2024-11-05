<?php
use Illuminate\Support\Facades\DB;
$users = DB::table('users')->get();
?>
@extends('layouts.app')

@section('content')
        @foreach ($users as $user)
         
          <h1> {{ $user->name }} </h1>
        @endforeach
@endsection