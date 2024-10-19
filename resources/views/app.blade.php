<?php include( resource_path( 'config/shared-variables/main.php' ) ) ?>
@extends('layouts.main')
@section('title', __('app.welcome') )
@section('content')
    {{-- Main App --}}
    <main-app
        ref="mainApp"
        v-bind:urls_json="'{{ json_encode($list_urls) }}'"
        v-bind:texts_json="'{{ json_encode($texts) }}'"
        v-bind:locale="'{{ App::currentLocale() }}'"
        />
    {{-- /Main App --}}
@endsection
