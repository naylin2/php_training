@extends('phones.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('phones.create') }}"> Create New Phone</a>
                <a class="btn btn-dark" href="{{ url('/trash/phones') }}"> Trash Bin</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-3">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered mt-5">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th>Created at</th>
            <th>Updated at</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($phones as $phone)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $phone->name }}</td>
            <td>{{ $phone->detail }}</td>
            <td>{{ $phone->created_at }}</td>
            <td>{{ $phone->updated_at }}</td>
            <td>
                <form action="{{ route('phones.destroy',$phone->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('phones.show',$phone->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('phones.edit',$phone->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $phones->links() !!}
      
@endsection