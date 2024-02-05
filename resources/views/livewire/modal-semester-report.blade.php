<x-partial.modal :show="$show" formTitle="{{ $formTitle }}" modalSize="modal-lg">
  {{-- @php
      dump($report_data->month)
  @endphp --}}
<x-partial.form action="{{ url('insert_semester_report') }}">
  @php
    $semesterSelect=collect([
      [
        'id'=>'I',
        'name'=>'I'
      ],
      [
        'id'=>'II',
        'name'=>'II'
      ],
      
    ])
  @endphp
    <x-partial.select selectLabel="Semester" selectName="semester" :selectValue="$semesterSelect" optValue="id" optText="name" :optUpdateValue="$semester"/>
    <x-partial.select selectLabel="Year" selectName="year" :selectValue="$monthYearSelect['year']" optValue="id" optText="name" :optUpdateValue="$year"/>
   

    <x-partial.input label="Link" name="link" :value="$link"/>
   
   
    @if ($edit)
    <x-partial.input type="hidden" name="report_id" :value="$semesterReportId"/>
    @else
    <x-partial.input type="hidden" name="report_type_id" :value="$report_id"/>
    
    @endif
    <x-partial.input type="hidden" name="edit" :value="$edit"/>
   
</x-partial.form>   
</x-partial.modal >
