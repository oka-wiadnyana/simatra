@props([
    'breadcrumbs'
])
   <ol class="breadcrumb">
                                
    @foreach ($breadcrumbs as $breadcrumb)
    
<li class="breadcrumb-item">{{ $breadcrumb}}</li>
@endforeach
</ol>
