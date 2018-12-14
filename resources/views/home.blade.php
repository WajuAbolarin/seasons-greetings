@extends('layouts.app')

@section('title', 'Dashboard')
@section('title', 'Season\'s Greetings | Home')
@section('page-title', 'Dashboard')

@section('content')
    <div class="container">
        @if (session()->has('status'))
            <div class="col-xs-12 col-md-8 mx-auto mt-3">
                <div class="col-xs-12 mb-5">
                    <div class="alert alert-dismissible alert-light py-3">
                        <button type="button" class="close">&times;</button>
                        <h6 class="mt-3">
                           {{ session('status') }}
                        </h6>
                        {{-- conditionally show this --}}
                        <button class="btn btn-dark d-block mr-auto mt-4">Get More Credits</button>
                    </div>
                </div>
            </div>
        @endif
        @include('partials.jumbotron')
    </div>
@endsection
`
