<span data-id="{{$employee->id}}" class="list-group-item subord">
    <div class="row">
        <div class="col-md-2">
            <img class="img-responsive img-rounded" src="{{'/avatars/'.$employee->avatar}}">
        </div>
        <div class="col-md-9">
            {{ $employee->first_name }} {{ $employee->last_name }}
            <br>
            <span class="label label-success">{{ $employee->position }}</span>
        </div>
        <div class="col-md-1">
            <a class="btn btn-sm btn-primary pull-right" href="/employees/{{$employee->id}}">View</a>
        </div>
    </div>
</span>
<div id="{{$employee->id}}" class="list-group"></div>