@php
    $breadcrumbList=[
        'Admin',
        'Satker'
    ]
@endphp
<x-layout.main :breadcrumbList="$breadcrumbList">
    @push('header')
         <!-- DataTables -->
         <link href="{{ asset('template_assets') }}/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css">
         <link href="{{ asset('template_assets') }}/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css">
         <!-- Responsive datatable examples -->
         <link href="{{ asset('template_assets') }}/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css">
 
         <link href="{{ asset('template_assets') }}/css/bootstrap.min.css" rel="stylesheet" type="text/css">
         <link href="{{ asset('template_assets') }}/css/icons.css" rel="stylesheet" type="text/css">
         <link href="{{ asset('template_assets') }}/css/style.css" rel="stylesheet" type="text/css">
     <style type="text/css">.jqstooltip { position: absolute;left: 0px;top: 0px;visibility: hidden;background: rgb(0, 0, 0) transparent;background-color: rgba(0,0,0,0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)";color: white;font: 10px arial, san serif;text-align: left;white-space: nowrap;padding: 5px;border: 1px solid white;z-index: 10000;}.jqsfield { color: white;font: 10px arial, san serif;text-align: left;}</style>
    @endpush
<x-slot:page_title>
    Daftar Satker 
</x-slot:page_title>
<div class="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card m-b-20">
                    <div class="card-body">
                    <div class="row mb-2">
                        <div class="col ">
                            <h4 class="mt-0 header-title">Daftar Satker</h4>
                        
                        </div>
                        <div class="col  d-flex justify-content-end">
                            <div>

                                <x-partial.button text="Tambah" onClick="showModal('modal-add-satker'); return false"/>
                            </div>
                          
                        </div>
                    </div>
                  
                        

                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Nama Pendek</th>
                                <th>No WA Admin</th>
                                <th>Kode 01</th>
                                <th>Alamat</th>
                                <th>Aksi</th>
                               
                            </tr>
                            </thead>


                            <tbody>
                                @foreach ($satkers as $satker)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $satker->name }}</td>
                                    <td>{{ $satker->nick_name }}</td>
                                    <td>{{ $satker->whatsapp_number }}</td>
                                    <td>{{ $satker->satker_code }}</td>
                                    <td>{{ $satker->address }}</td>
                                    <td><x-partial.button text="Edit" onClick="showModal('modal-edit-satker',{{ $satker->id }}); return false"/> <x-partial.button text="Hapus" color="danger" onClick="deleteData('{{ url('setting/delete_satker') }}',{{ $satker->id }}); return false"/></td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div>
    <!-- end container-fluid -->
</div>
<livewire:modal-satker />
@push('footer')
    <!-- Required datatable js -->
    <script src="{{ asset('template_assets') }}/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('template_assets') }}/plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('template_assets') }}/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="{{ asset('template_assets') }}/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="{{ asset('template_assets') }}/plugins/datatables/jszip.min.js"></script>
    <script src="{{ asset('template_assets') }}/plugins/datatables/pdfmake.min.js"></script>
    <script src="{{ asset('template_assets') }}/plugins/datatables/vfs_fonts.js"></script>
    <script src="{{ asset('template_assets') }}/plugins/datatables/buttons.html5.min.js"></script>
    <script src="{{ asset('template_assets') }}/plugins/datatables/buttons.print.min.js"></script>
    <script src="{{ asset('template_assets') }}/plugins/datatables/buttons.colVis.min.js"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('template_assets') }}/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="{{ asset('template_assets') }}/plugins/datatables/responsive.bootstrap4.min.js"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('template_assets') }}/pages/datatables.init.js"></script>
    <script>
        $('#datatable').DataTable({
          processing: true,
         
          responsive:true
      });

      function showModal(emit_message,prop=null){
            Livewire.dispatch(emit_message,{prop});
    
    }

    function deleteData(route,id,message='Yakin dihapus?'){
    Swal.fire({
        title: message,
        showDenyButton: true,
        showCancelButton: true,
        confirmButtonText: "Yakin",
        denyButtonText: `Tidak`
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            axios.post(route, {
                id,
            })
            .then(function (response) {
               location.reload();
            })
            .catch(function (error) {
                console.log(error);
            });
        } else if (result.isDenied) {
            Swal.fire("Cancel", "", "info");
        }
    });
    
    }
    </script>
@endpush
</x-layout.main >