@extends('Web.Layouts.dashbord')
@section('title','Test')
@section('content')
<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row mt-5">
        <div class="col-lg-8 d-flex align-items-strech">
        <div class="card w-100">
            <div class="card-body">
            <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                <div class="mb-3 mb-sm-0">
                <h5 class="card-title fw-semibold">Test</h5>
                </div>

            </div>
            <div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                @endif
                <form action="{{ route('tests.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="test" value="{{ $test?->id }}">

                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name:</label>
                        <input type="text" class="form-control" name="name" id="exampleFormControlInput1" value="{{ $test?->name }}" placeholder="Name">
                    </div>
                    <div class="text-center m-3">
                        <button type="submit" class="btn btn-outline-primary">Submit</button>
                    </div>

                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection




