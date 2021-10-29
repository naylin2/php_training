@extends('phones.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('phones.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <table class="table table-bordered mt-5">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Details</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th>Deleted at</th>
        </tr>
        @foreach ($phones as $phone)
        <tr>
            <td>{{ $phone->id }}</td>
            <td>{{ $phone->name }}</td>
            <td>{{ $phone->detail }}</td>
            <td>{{ $phone->created_at }}</td>
            <td>{{ $phone->updated_at }}</td>
            <td>{{ $phone->deleted_at }}</td>
        </tr>
        @endforeach
    </table>
      
@endsection