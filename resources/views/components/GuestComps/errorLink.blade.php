@if($errors->any())

<div class="mb-1">
    @foreach ($errors->all() as $error)
    <ul class="list-group">
        <li class="list-group-item list-group-item-warning ">{{ $error }}</li>
    </ul>
    @endforeach
</div>

@endif
