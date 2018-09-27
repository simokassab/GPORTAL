@extends('layouts.app')

@section('content')
    <center><h1>G PORTAL Reports </h1></center>

    <hr>
    
  
        <table class="table table-striped" id="users-table">
            <thead>
                <tr>
                    <th>Service Name</th>
                    <th>Service Provider</th>
                    <th>name</th>
                    <th>description</th>
                    <th>created_date</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($logs as $log)
                    <tr>
                    <td>{!! $log->SV_NAME !!}</td>
                    <td>{!! $log->SP_NAME !!}</td>
                    <td>{!! $log->name !!}</td>
                    <td>{!! $log->description !!}</td>
                    <td>{!! $log->created_date !!}</td>
                    </tr>
                @endforeach

                
            </tbody>
            <tfoot> <tr> <th>Service Name</th> <th>name</th> <th>description</th> <th>created_date</th> </tfoot>
        </table>
        
@endsection
<script type="text/javascript" src="{{ URL::asset('/js/jquery.min.js') }}"></script>
                <script>
                        $(document).ready( function () {
                            $('#users-table tfoot th').each( function () {
                                var title = $(this).text();
                                $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
                            } );
                            var table = $('#users-table').DataTable({
                                dom: 'Bfrtip',
                                buttons: [
                                    'copyHtml5',
                                    {
                                        extend: 'excelHtml5',
                                        title: 'GPORTAL'
                                    },
                                    {
                                        extend: 'csvHtml5',
                                        title: 'GPORTAL'
                                    },
                                    {
                                        extend: 'pdfHtml5',
                                        title: 'GPORTAL'
                                    }
                                  
                                ]
                            });
                            
                            table.columns().every( function () {
                                var that = this;
                        
                                $( 'input', this.footer() ).on( 'keyup change', function () {
                                    if ( that.search() !== this.value ) {
                                        that
                                            .search( this.value )
                                            .draw();
                                    }
                                } );
                            } );
                        } );
                        </script>




 