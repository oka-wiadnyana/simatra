<x-partial.modal :show="$show" formTitle="{{ $formTitle }}" modalSize="modal-lg">
  {{-- @php
      dump($report_data->month)
  @endphp --}}
<x-partial.form action="{{ url('setting/insert_account') }}">
   
   

    <x-partial.input label="Nama" name="name" :value="$account?->name"/>
    <x-partial.input label="Username" name="username" :value="$account?->username"/>
    <x-partial.select selectLabel="Role" selectName="role" :selectValue="$roles" optValue="level_name" optText="level_name" :optUpdateValue="$account?->role"/>
    <x-partial.select selectLabel="Satker" selectName="satker_id" :selectValue="$satkers" optValue="id" optText="name" :optUpdateValue="$account?->satker_id"/>
      <x-partial.input label="Password" name="password" type="password"/>
      <x-partial.input label="Konfirmasi Password" name="password_confirmation" type="password"/>
    
   
   
    <x-partial.input type="hidden" name="id" :value="$account?->id"/>
   
    
   
</x-partial.form>   
</x-partial.modal >
