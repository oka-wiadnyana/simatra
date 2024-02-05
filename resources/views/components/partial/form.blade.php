@props([
    'method'=>'POST',
    'target'=>'',
    'action'=>''
])
<form method="{{ $method }}" action="{{ $action }}" enctype="multipart/form-data" target="{{ $target }}">
    @csrf
    {{ $slot }}
    <div class="row mt-2">
        <div class="col">
            <x-partial.button type="submit" text="Simpan"/>
            <x-partial.button wireClick="closeModal()" text="Tutup" color="secondary"/>
        </div>
        
    </div>
</form>