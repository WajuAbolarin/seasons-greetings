@extends('layouts.app')

@section('title', 'Compose Greetings')
@section('title', 'Season\'s Greetings | Compose Greetings')
@section('page-title', 'Compose Greetings')

@section('content')

<div class="container">
<div class="row">
    <div class="col-xs-12 col-md-8 mx-auto mt-3">

        <form method="POST" action="{{ route('messages.store')}}" novalidate>
            @csrf
            <div class="form-group">
                <label for="sender_id">Sender ID</label>
                <input name="sender_id" type="text" class="form-control" id="sender_id" placeholder="David" maxlength="11" autofocus>
                <small id="passwordHelpBlock" class="form-text text-muted">
                    This will be the sender's name on your recipients' phone, you can use a name they recognise, maximum of 11 Chracters.
                </small>
                <small class="valid-feedback">In order &check;</small>
            </div>

            <div class="form-group">
                <label for="recipients">Recipient(s)</label>
                <input name="recipients[]" type="text" class="form-control" id="recipients" placeholder="080987654321" required>
                <small id="passwordHelpBlock" class="form-text text-muted">
                    Type the phone numbers of your recipient in the form +234.. or 0X0, separate multiple recipients with a comma.
                </small>
                <small class="invalid-feedback">You must have at least one recipient&Cross;</small>
            </div>

            <div class="form-group">
                <label for="message-body">Message Body</label>
                <textarea name="message_body" class="form-control" id="message-body" rows="3"></textarea>
            </div>
            <div class="form-row">
                <div class="col-xs-12 col-sm-6">
                    <label for="schedule-time">Schedule Time</label>
                    <input
                    class="form-control"
                    type="datetime-local"
                    id="schedule-time"
                    name="schedule_time"
                    min="{{ now('Africa/Lagos')->format('Y-m-d\TH:i')}}"
                    value="{{ now('Africa/Lagos')->format('Y-m-d\TH:i')}}"
                    >
                </div>
            </div>
            <div class="form-row">
                <div class="col-xs-12 col-sm-4 mt-4 ml-auto">
                    <div class="form-group">
                        <input type="submit" class="btn btn-success btn-block" value="Send Greetings"/>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
