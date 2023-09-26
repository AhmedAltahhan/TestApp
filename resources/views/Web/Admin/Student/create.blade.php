@extends('Web.Layouts.dashbord')
@section('title','Create Student')

@section('content')

<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row mt-5">
        <div class="col-lg-8 d-flex align-items-strech">
        <div class="card w-100">
            <div class="card-body">
            <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                <div class="mb-3 mb-sm-0">
                <h5 class="card-title fw-semibold">Create Student</h5>
                </div>

            </div>
            <div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                @endif
                <form action="{{ route('students.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name:</label>
                        <input type="text" class="form-control" name="name" id="exampleFormControlInput1" placeholder="Name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email" id="exampleFormControlInput1" placeholder="Email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Password:</label>
                        <input type="password" class="form-control" name="password" id="exampleFormControlInput1" placeholder="******">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">UserName:</label>
                        <input type="text" class="form-control" name="username" id="exampleFormControlInput1" placeholder="UserName">
                    </div>
                    <div class="text-center m-3">
                        <button type="submit" class="btn btn-outline-primary">Create</button>
                    </div>

                </form>
            </div>
            </div>
        </div>
        </div>
    </div>
</div>

@endsection

