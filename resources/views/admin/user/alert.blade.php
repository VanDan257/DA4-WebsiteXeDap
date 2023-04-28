@if($errors->any())
    <div class="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(Illuminate\Support\Facades\Session::has('error'))
    <div class="alert">
        <p class="text-danger">{{ Illuminate\Support\Facades\Session::get('error') }}</p>
    </div>
@endif