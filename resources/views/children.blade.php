@if($children)

    <ul>
        @foreach ($children as $child)
            <li>
                <a href="#">{{ $child->name }}</a>
                <ul>
                @if (count($child->childrenRecursive))
                    @include('children', ['children' => $child->childrenRecursive])
                @endif
                </ul>
            </li>
        @endforeach
    </ul>

@endif
