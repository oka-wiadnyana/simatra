<x-partial.modal :show="$show" formTitle="{{ $formTitle }}" modalSize="modal-lg">
    {{-- @php
        dump($report_data->month)
    @endphp --}}
  <x-partial.form action="{{ url($periode.'/insert_note') }}">
     
     
  
      <x-partial.textarea label="Catatan" name="notes" :value="$dataReport?->notes" />
      
     
     
      <x-partial.input type="hidden" name="id" :value="$dataReport?->id"/>
     
      
     
  </x-partial.form>   
  </x-partial.modal >
  