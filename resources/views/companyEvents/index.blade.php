@extends('companyEvents.layout')

@section('content')
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

@foreach ($companyEvents as $companyEvent)
<div class="row mb-4">
    <div class="col-lg-12 margin-tb">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $companyEvent->title }}</h5>
                <div class="row">
                    <div class="col-md-6 col-sm-12 card-subtitle mb-2">
                        <h6>
                            <a class="btn btn-primary" href="{{ route('companyEvents.destroy',$companyEvent->id) }}"> Register for Event</a>
                            <div class="row mt-2 mb-2">
                                <div class="col-6">
                                    <a class="btn btn-secondary" href="{{ route('companyEvents.edit',$companyEvent) }}"> Edit Event</a>
                                </div>
                                <div class="col-6">
                                    <form action="{{ route('companyEvents.destroy',$companyEvent->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-secondary">Delete Event</button>
                                    </form>
                                </div>
                            </div>

                        </h6>
                        <h6 class="text-muted mt-3">Start date: {{ $companyEvent->start_date->format('Y/m/d h:m') }}</h6>
                        <h6 class="text-muted">End date: {{ $companyEvent->end_date->format('Y/m/d h:m') }}</h6>
                        @if($companyEvent->description)
                        <h6 class="mt-3">Description: </h6>
                        {{ $companyEvent->description }}
                        @endif
                    </div>
                    <div class="col-md-6 col-sm-12 mb-2 text-right">
                        <!-- {{ $companyEvent->thumbnail }} -->
                        <img class="img-fluid img-thumbnail" src="/uploads/companyEventsThumbnails/{{ $companyEvent->thumbnail }}" />
                    </div>
                </div>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
    </div>
</div>
@endforeach

{!! $companyEvents->links() !!}

@endsection