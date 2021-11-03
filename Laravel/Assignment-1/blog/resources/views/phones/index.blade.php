@extends('phones.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left col-lg-6 pl-0">
                <form action="{{ url('phone-import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-4 col-lg-6 pull-left pl-0">
                        <div class="custom-file text-left">
                        <input type="file" name="file" class="custom-file-input" id="customFile">
                        <label class="custom-file-label" for="customFile">Choose file to import</label>
                        </div>
                    </div>
                    <button class="btn btn-primary">Import</button>
                    <a class="btn btn-success ml-3" href="{{ url('/export-phones') }}"> Export</a>
                </form>
            </div>
            <div class="pull-right">
                <a class="btn btn-info" href="{{ route('products.index') }}"> Products</a>
                <a class="btn btn-success" href="{{ route('phones.create') }}"> Create New Phone</a>
                <a class="btn btn-dark" href="{{ url('/trash/phones') }}"> Trash Bin</a>
                <a class="btn btn-dark" href="{{ url('/email') }}"> Email</a>
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
            <th width="300px">Action</th>
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
                    <a class="btn btn-success" href="{{ route('phones.mail',$phone->id) }}">Email</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger mt-1" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="row col-lg-6 pull-left">

        <form action="{{  url('/search/phones')  }}" method="get">

            <div class="col-md-12">
                <div class="form-group pull-left">
                <label for="">Start Date</label>
                <input type="date" class="form-control" name="start_date">
                </div>
                
                <div class="form-group pull-right ml-3">
                <label for="">End Date</label>
                <input type="date" class="form-control" name="end_date">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </div>
        </form>
    </div>
    <div class="row col-lg-6 pull-right">

        <form action="{{  url('/search.name/phones')  }}" method="get">

            <div class="col-md-12">
                <div class="form-group pull-left">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </div>
        </form>

        <form action="{{  url('/search.detail/phones')  }}" method="get">

            <div class="col-md-12">
                <div class="form-group pull-left">
                <label for="">Details</label>
                <input type="text" class="form-control" name="detail">
                </div>
            </div>

            <div class="col-md-2">
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
            </div>
        </form>
    </div>
    


@endsection
