<x-admin-base-layout>
    @foreach ($containers as $container)
        <div id="{{$container['id']}}"
             class="row {{util()->getHtmlClass($container['class'], false)}}" {{util()->getHtmlAttributes($container['attr'])}}>
            @foreach ($container["blocks"] as $block)
                    {{ block($block) }}
            @endforeach
        </div>
    @endforeach
</x-admin-base-layout>
