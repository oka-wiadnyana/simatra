@props([
    'type'=>'button',
    'color'=>'primary',
    'text',
    'id'=>'',
    'onClick'=>'',
    'size'=>'',
    'wireClick'=>''
])

<button type="{{ $type }}" class="btn btn-{{ $color }} {{ $size }} waves-effect waves-light" onclick="{{ $onClick }}" @if($wireClick) wire:click.prevent="{{ $wireClick }}"  @endif>{{ $text }}</button>