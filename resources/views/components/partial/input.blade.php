@props(
    [
        'label'=>'',
        'type'=>'text',
        'inputClass'=>'form-control',
        'placeholder'=>'',
        'name'=>'',
        'id'=>'',
        'value'=>"",
        
    ]
)

<div class="form-group ">
    @if($type!='hidden') 
    <label>{{ $label }}</label>
    @endif
    <input type="{{ $type }}" class="{{ $inputClass }}" placeholder="{{ $placeholder }}" name="{{ $name }}" id="{{ $id }}" value="{{ $value }}">
</div>