@props([
    'label'=>'',
    'rows'=>"5",
    'value'=>"",
    'name'=>"",
])

<div class="form-group">
    <label>{{ $label }}</label>
    <div>
        <textarea class="form-control" rows="{{ $rows }}" name="{{ $name }}">{{ $value }}</textarea>
    </div>
</div>