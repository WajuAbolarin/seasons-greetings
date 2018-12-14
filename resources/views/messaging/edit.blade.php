@extends('layouts.app')

@section('title', 'Confirm Message Greetings')
@section('title', 'Season\'s Greetings | Confirm Greetings')
@section('page-title', 'Confirm Greetings')

@section('content')

<div class="container">
<div class="row">
    <div class="col-xs-12 col-md-8 mx-auto mt-3">
        <div class="col-xs-12 mb-5">
            <div class="alert alert-dismissible alert-light py-3">
                <button type="button" class="close">&times;</button>
                <h6 class="mt-3">
                    <strong>We are all set!</strong>
                    your greetings will cost <strong>&#8358;{{ number_format(300, 2)}}</strong>
                </h6>
                {{-- conditionally show this --}}
                <button class="btn btn-dark d-block mr-auto mt-4">Get More Credits</button>
            </div>
        </div>
        <form method="POST"  action="{{ route('message.confirm.store')}}" novalidate>
            @csrf
            <div class="form-group">
                <label for="sender_id">Sender ID</label>
                <input
                    name="sender_id"
                    type="text"
                    class="form-control"
                    id="sender_id"
                    placeholder="Solomon"
                    maxlength="11"
                    value="{{ $message->sender_id }}"
                    autofocus>
                <small id="passwordHelpBlock" class="form-text text-muted">
                    This will be the sender's name on your recipients' phone, you can use a name they recognise, maximum of 11 Chracters.
                </small>
                <small class="valid-feedback">In order &check;</small>
            </div>

            <div class="form-group">
                <label for="recipients">Recipient(s)</label>
                <input
                    name="recipients[]"
                    type="text"
                    class="form-control"
                    id="recipients"
                    placeholder="080987654321"
                    value="{{ $message->recipients}}"
                    required>
                <small id="passwordHelpBlock" class="form-text text-muted">
                    Type the phone numbers of your recipient in the form +234.. or 0X0, separate multiple recipients with a comma.
                </small>
                <small class="invalid-feedback">You must have at least one recipient&Cross;</small>
            </div>
            <div class="form-group">
                <label for="message-body">Message Body</label>
                <textarea name="message_body" class="form-control" id="message-body" rows="3">{{ $message->message_body }}
            </textarea>
            <div class="form-row">
                <div class="col-xs-12 col-sm-6">
                <label for="schedule-time">Schedule Time </label>
                    <input
                    class="form-control"
                    type="datetime-local"
                    id="schedule-time"
                    name="schedule_time"
                    min="{{ now('Africa/Lagos')->format('Y-m-d\TH:i')}}"
                    value="{{ $message->schedule_time->format('Y-m-d\TH:i')}}"
                    >
                    <small class="form-text text-dark">
                        <strong>{{ $message->schedule_time->diffForHumans()}}</strong>
                    </small>
                </div>

            </div>
            <div class="form-row">
                <div class="col-xs-12 col-sm-4 mt-4 ml-auto">
                    <div class="form-group">
                        <input type="submit" class="btn btn-dark btn-block" value="Confirm Send"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
