<div
    x-data="{ show: true }"
    x-show="show"
    x-transition
    x-init="setTimeout(() => show = false, 4000)"
    {{$attributes->merge(["class" => "ddx-alert {$type}"])}}>
    {{ $slot }}
</div>
