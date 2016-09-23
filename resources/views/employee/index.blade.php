@extends('layouts.app')
<style>
    .list-group-item:hover {
        cursor: pointer;
    }

    .list-group.list-group-root {
        padding: 0;
        overflow: hidden;
    }

    .list-group.list-group-root .list-group {
        margin-bottom: 0;
    }

    .list-group.list-group-root .list-group-item {
        border-radius: 0;
        border-width: 1px 0 0 0;
    }

    .list-group.list-group-root > .list-group-item:first-child {
        border-top-width: 0;
    }

    .list-group.list-group-root > .list-group > .list-group-item {
        padding-left: 40px;
    }

    .list-group.list-group-root > .list-group > .list-group > .list-group-item {
        padding-left: 70px;
    }
    .list-group.list-group-root > .list-group > .list-group > .list-group > .list-group-item {
        padding-left: 100px;
    }
    .list-group.list-group-root > .list-group > .list-group > .list-group >  .list-group > .list-group-item {
        padding-left: 130px;
    }
</style>

@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <h1 class="text-center">Employees List</h1>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for..." id="search-input">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" id="search-button">Search!</button>
                </span>
            </div>
            <hr>
            <div class="list-group list-group-root well">
                @foreach($employees as $employee)
                    @include('employee.partial.subordinate')
                    <div class="list-group">
                        @foreach($employee->getSubordinates() as $employee)
                            @include('employee.partial.subordinate')
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@stop
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $(document).on('click', '.subord', function () {
            var elem = $(this);
            var subId = elem.data('id');
            var childrenBlock = $('#'+subId);
            if(!childrenBlock.has('a').length > 0){
                $.ajax({
                    url: "/subordinates/" + subId,
                    success: function(data){
                        childrenBlock.append(data['html']);
                    }
                });
            }else {
                childrenBlock.html(null);
            }
        });
        $('#search-button').click(function(){
            $.ajax({
                url: "/employees/search/" + $('#search-input').val(),
                success: function(data){
                    $('.list-group-root').html(data['html']);
                }
            })
        });
    });
</script>

