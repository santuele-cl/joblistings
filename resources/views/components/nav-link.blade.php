@props(["active" => false, "type" => "anchor"])


@if ( $type === "button" )

    <button {{ $attributes }} class="py-1 px-4 border border-blue-300 text-blue-300 rounded-lg font-bold" >{{$slot}}</button>  

@else

    <a {{ $attributes }} class="{{ $active ? "bg-gray-900 text-white" : "text-gray-300 hover:bg-gray-700 hover:text-white" }} rounded-md px-3 py-2 text-sm font-medium" aria-current="{{ $active ? "page" : "false" }}">{{$slot}}</a>

@endif

