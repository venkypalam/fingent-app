@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Student</div>
                <div class="card-body">
                <div class="row">
                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                     @endif
                    </div>
                    <div class="col-xl-6 col-md-6 col-sm-6 col-6">
                        <button type="button" class="btn btn-primary mt-2 mb-2 mr-2 float-right" data-toggle="modal" data-target="#addstudent">Add Student</button>
                    </div>
                </div>                    
                <table id="style-3" class="table style-3">
                    <thead>
                        <tr>
                            <th class="checkbox-column text-center">ID</th>
                            <th>Name</th>
                            <th>Age</th>
                            <th>Gender</th>
                            <th>Reporting Teacher</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr>
                            <td class="checkbox-column text-center">{{ $student->id }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $student->age }}</td>
                            <td>{{ $student->gender }}</td>
                            <td>{{ $student->reporting_teacher }}</td>
                            <td>          
                            <div class="table-controls">                                                       
                                <a href="#" class="edit bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" data-type="edit" data-id="{{ $student->id }}">Edit</a>                                                                                  
                                <a class="bs-tooltip" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" data-type="delete"  href="{{ url('student/delete/'.$student->id) }}">Delete</a>
                            </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@include('student.addStudent') 
<!--  END CUSTOM SCRIPTS FILE  -->
<!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>    
<script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>    
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>

<script>
    $('#style-3').DataTable( {
        dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
        buttons: {
            buttons: [
                { extend: 'copy', className: 'btn', exportOptions: { columns: ':visible:not(:last-child)' } },
                { extend: 'csv', className: 'btn' , exportOptions: { columns: ':visible:not(:last-child)' } },
                { extend: 'excel', className: 'btn', exportOptions: { columns: ':visible:not(:last-child)' } },
                { extend: 'print', className: 'btn', exportOptions: { columns: ':visible:not(:last-child)' } }
            ]
        },
        "oLanguage": {
            "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            "sInfo": "Showing page _PAGE_ of _PAGES_",
            "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            "sSearchPlaceholder": "Search...",
           "sLengthMenu": "Results :  _MENU_",
        },          
        "stripeClasses": [], 
        "pageLength": 10,
        "info": true,
        "initComplete": function() {
              $('#count').text( this.api().data().length )
           }            
    } );
</script>
<script>
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $(document).on('click','.edit',function(){
            type = $(this).data('type');
            id = $(this).data('id');

            if(type == 'edit' ) {
                $.ajax({
                    url:'{{url("student/edit")}}' + "/" +id,
                    type: 'post',
                    dataType: "json",
                    data: {
                    _token: CSRF_TOKEN,
                    },
                    success: function( data ) {
                        $('#id').val(data.student.id);
                        $('#editName').val(data.student.name);
                        $('#editAge').val(data.student.age); 
                        $('#editGender').val(data.student.gender); 
                        $('#editReportingTeacher').val(data.student.reporting_teacher);                        
                        $('#editstudent').modal('show');
                    }
                });
            }
        });
    </script>
<!-- END PAGE LEVEL SCRIPTS -->
 @endsection    