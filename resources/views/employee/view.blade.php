@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="col-md-3" style="overflow: hidden">
                <img width="150px"  src="{{'/avatars/'.$employee->avatar}}" />
            </div>
            <div class="col-md-9">
                <div class="list-group">
                    <h3>Name:</h3>
                    <p>{{ $employee->first_name }} {{ $employee->last_name }}</p>
                </div>
                <div class="list-group">
                    <h3>Position:</h3>
                    <p>{{$employee->position}}</p>
                </div>
                <div class="list-group">
                    <h3>Salary:</h3>
                    <p>{{$employee->salary}}$</p>
                </div>
                <div class="list-group">
                    <h3>Employment date:</h3>
                    <p>{{$employee->created_at}}</p>
                </div>


                <div class="list-group">
                    <a data-url="{{ route('employees.delete', ['employees' => $employee]) }}" class="btn btn-danger delete">Delete</a>
                    <a href="/employees/{{$employee->id}}/edit" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </div>
    </div>
@stop
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        $('.delete').click(function(){
            var url = $(this).data('url');
            console.log(url);
            $.ajax({
                url: url,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(data){
                    if(data = true){
                        window.location.href = "{{ url('/employees') }}"
                    }

                }
            })

        });
    })
</script>