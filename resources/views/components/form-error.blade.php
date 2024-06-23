@props(["name"])

@error($name)
    <p {{  $attributes->merge(["class " => "text-sm text-red-500 italic mt-1"])}} >{{ $message }}</p>
@enderror
