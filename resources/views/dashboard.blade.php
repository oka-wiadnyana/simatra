@php
    $breadcrumbList=[
        'Admin',
        'Laporan'
    ]
@endphp
<x-layout.main :breadcrumbList="$breadcrumbList">
<x-slot:page_title>
    Laporan
</x-slot:page_title>


<div class="page-content-wrapper">
    
    <div class="container-fluid">
        
        <livewire:dashboard-admin />
                        
    </div>
</div>
@push('footer')
      <!-- Peity JS -->
      <script src="{{ asset('template_assets') }}/plugins/peity/jquery.peity.min.js"></script>

      <script src="{{ asset('template_assets') }}/plugins/morris/morris.min.js"></script>
      <script src="{{ asset('template_assets') }}/plugins/raphael/raphael-min.js"></script>

      <script src="{{ asset('template_assets') }}/pages/dashboard.js"></script>        

@endpush
</x-layout.main>