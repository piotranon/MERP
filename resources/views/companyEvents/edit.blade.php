@extends('companyEvents.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="text-center">
            <h2>Edit Event {{$companyEvent->id}}</h2>
        </div>
    </div>
</div>


@if ($errors->any())
<div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('companyEvents.update',$companyEvent->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="Title" value="{{$companyEvent->title}}">
            </div>
        </div>
        <div class="col-12">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <strong>Start date:</strong>
                        <input class="form-control" type="datetime-local" value="{{str_replace(' ','T',$companyEvent->start_date->format('Y-m-d h:m:s'))}}" name="start_date">
                    </div>
                </div>
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <strong>End date:</strong>
                        <input class="form-control" type="datetime-local" value="{{str_replace(' ','T',$companyEvent->end_date->format('Y-m-d h:m:s'))}}" name="end_date">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="form-group">
                        <strong>Thumbnail:</strong>
                        <input type="file" class="form-control-file" name="thumbnail">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea class="form-control" style="height:150px" name="description" placeholder="Description">{{$companyEvent->description}}</textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <a class="btn btn-primary" href="{{ route('companyEvents.index') }}"> Back</a>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

    </div>

</form>


@endsection