<span data-id="{{$employee->id}}" class="list-group-item subord">
    <img width="50px" height="50px" src="{{'/avatars/'.$employee->avatar}}"> {{ $employee->first_name }} {{ $employee->last_name }}
    <a class="btn btn-primary pull-right" href="/employees/{{$employee->id}}">View</a>
    <br>
    <span class="label label-success">{{ $employee->position }}</span>
</span>
<div id="{{$employee->id}}" class="list-group"></div>