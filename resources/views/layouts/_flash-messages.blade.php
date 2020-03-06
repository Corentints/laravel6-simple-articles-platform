@if(session($type))
    <div class="alert alert-success $type" id="$type">
        {{ session($type) }}
    </div>
@endif
