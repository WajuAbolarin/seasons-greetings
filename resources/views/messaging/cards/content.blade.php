<div class="card border-secondary mb-2 shadow contain-h">
    <div class="card-body scroll">
        <p class="card-text pl-3 font-italic">
            {{ $message->message_body}}
        </p>
        <div class="d-flex justify-content-between pt-4">
            <h6 class="card-title text-right align-baseline text-bold font-italic">
                <small class="text-muted">From:</small>
                    {{$message->sender_id }}
            </h6>
            <span class="text-success align-baseline" style="font-size: 1.3em; line-height:1.3;">&check;</span>
        </div>
    </div>
</div>
