@extends('layouts.app')

@section('title', 'Confirm Message Greetings')
@section('title', 'Season\'s Greetings | Confirm Greetings')
@section('page-title', 'Confirm Greetings')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-6 col-lg-4">
            @include('messaging.cards.content')
        </div>

        <div class="col-xs-12 col-md-6 col-lg-4">
            @include('messaging.cards.recipients')
        </div>

        <div class="col-xs-12 col-md-6 col-lg-4">
            @include('messaging.cards.cost')
        </div>
    </div>
    <div class="container">
        <div class="row mt-5 py-5">
            <div class="col-xs-12 col-sm-4 mx-auto">
                <button class="btn btn-dark btn-block" id="send-now">Send Now  &rarr;</button>
            </div>
        </div>
    </div>

</div>
@endsection
@push('page-scripts')
<script>
    document.addEventListener('DOMContentLoaded', (e)=>{
        const submitBtn = document.querySelector('#send-now')
        const id = {{$message->id}}

        submitBtn.addEventListener('click', (e)=>{
            axios.post('/messages/confirm', {message_id : id});
        })
    })
</script>
@endpush
