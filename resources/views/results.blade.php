@extends('main')

@section('content')
    <button type="button" class="btn btn-primary button_1sec">1 sec</button>
    <button type="button" class="btn btn-primary button_3sec">3 sec</button>
    <button type="button" class="btn btn-primary button_5sec">5 sec</button>


{{--<h3>{{$cnd_res}}    </h3>--}}
{{--@foreach($cnd_res as $cr)--}}
    {{--<p>{{$cr}}</p><br>--}}
{{--@endforeach--}}
<div id="tbl">
<table class="table table-striped" id="records_table">
    <thead>
    <tr>
        <th scope="col">id</th>
        <th scope="col">Name</th>
        <th scope="col">Votes</th>
    </tr>
    </thead>
    <tbody>
    @foreach($cnd_res as $cr)

        <tr>
        <th scope="row">{{$cr->id}}</th>
        <td>{{$cr->name}}</td>
        <td>{{$cr->voters_info_count}}</td>
    </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection


