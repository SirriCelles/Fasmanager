 @if (Auth::user()->roles()->first() !== null)
    <ul class="nav navbar-nav">
        @foreach (Auth::user()->roles()->first()->privileges()->get() as $privilege )
            <li class="hover">
                <a href="{{url($privilege->path)}}"><span class="{{$privilege->icon}}"></span>
                {{$privilege->name}}</a>
            </li>
        @endforeach
    </ul>
@endif 

