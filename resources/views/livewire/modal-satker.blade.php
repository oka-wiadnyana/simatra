<x-partial.modal :show="$show" formTitle="{{ $formTitle }}" modalSize="modal-lg">
  {{-- @php
      dump($report_data->month)
  @endphp --}}
<x-partial.form action="{{ url('setting/insert_satker') }}">
   
   

    <x-partial.input label="Nama Satker" name="name" :value="$data_satker?->name"/>
    <x-partial.input label="Nama Pendek" name="nick_name" :value="$data_satker?->nick_name"/>
    <x-partial.input label="No WA Admin" name="whatsapp_number" :value="$data_satker?->whatsapp_number"/>
    <x-partial.input label="Alamat" name="address" :value="$data_satker?->address"/>
    <x-partial.input label="Kode 01" name="satker_code" :value="$data_satker?->satker_code"/>
   
   
   
    <x-partial.input type="hidden" name="id" :value="$data_satker?->id"/>
   
    
   
</x-partial.form>   
</x-partial.modal >
