@extends('layouts.temadmin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts/_flash')
                <div class="card">
                   

                    <div class="card-body">
                        <div class="card-header">
                            <a href="{{ route('project.create') }}" class="btn btn-primary" >
                                New
                            </a>
                            <a href=""  class="btn btn-danger" id="deleteAllSelectedRecord" > Delete</a>
                       
                      
                        </div>
                        <div class="table-responsive">
                          
                         
                            <table class="table align-middle" id="dataTable">
                                <thead>
                                    <tr>
                                        <th> <input type="checkbox" name="" id="chkCheckAll"> </th>
                                      
                                        <th>Aksi</th>
                                        <th>Project Nama</th>
                                        <th>Client</th>
                                        <th>Project Start</th>
                                        <th>Project End</th>
                                        <th>Status</th>
                                       
                            
                                      
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1; @endphp
                                    @foreach ($Project as $data)
                                        <tr id="sid{{ $data->id}}">
                                            <td> <input type="checkbox" name="ids" class="checkBoxClass" value="{{ $data->id }}"> </td>
                                             
                                            </td>
                                           
                                            <td>  <a href="{{ route('project.edit', $data->id) }}"
                                                class="btn btn-sm btn-outline-success">
                                                Edit
                                            </a> </td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->client->name }}</td>
                                            <td>{{ $data->start }}</td>
                                            <td>{{ $data->end }}</td>
                                            <td>{{ $data->status }}</td>
                                          
                                           
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
    <script src="{{ asset('js/jquery-3.5.1.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>

    <script>
        $(function(e){
            
            $("#chkCheckAll").click(function(){
                $('.checkBoxClass').prop('checked',$(this).prop('checked'));
            });
    
            $('#deleteAllSelectedRecord').click(function(e){
                e.preventDefault();
                var allids = [];
                $('input:checkbox[name=ids]:checked').each(function(){
                    allids.push($(this).val());
                });
    
                $.ajax({
                    url:"{{ route('data.delete') }}",
                    type:"DELETE",
                    data:{
                        _token:$("input[name=_token]").val(),
                        ids:allids
                    },
                    success:function(response){
                        $.each(allids,function(key,val){
                            $("#sid"+val).remove();
                        }
                    }
                });
            });
        });
    </script>
@endsection
