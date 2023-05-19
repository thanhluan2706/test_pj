@extends('app')

@section('content')
@foreach($manu as $value)
<tr>
    <td>{{ $value->manu_id }}</td>
    <td>{{ $value->manu_name }}</td>
</tr>
@endforeach
@endsection