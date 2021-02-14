@php
    $colsCount = count($columns);
@endphp

<div class="grid grid-flow-row auto-rows-max">
    <div class="grid grid-flow-col auto-cols-max">
        @foreach ($columns as $column)
            <div class="font-bold">{{$column}}</div>
        @endforeach
    </div>
    @foreach ($data as $item)
        <div class="grid grid-flow-col auto-cols-max">
            @foreach ($item as $value)
                <div>{{$value}}</div>
            @endforeach
        </div>
    @endforeach
</div>