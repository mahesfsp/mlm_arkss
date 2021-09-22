<div>
    <!-- I begin to speak only when I am certain what I will say is not better left unsaid - Cato the Younger -->
    @if(session()->has('status'))
    <div class="py-4 px-2 bg-green-200">
      {{session()->get('status')}}
    </div>
    @elseif(session()->has('error'))
    <div class="py-4 px-2 bg-red-200">
      {{session()->get('error')}}
    </div>
    @endif

</div>

@if ($errors->any())
    <div class="py-4 px-2 bg-red-200">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif