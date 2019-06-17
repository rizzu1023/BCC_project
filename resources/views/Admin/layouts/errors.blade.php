@if($errors->any())
    <div class="bg-danger">
        <ul>
            @foreach($errors as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif