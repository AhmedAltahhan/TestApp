@extends('Web.Layouts.dashbord')
@section('title','Question')
@section('content')
<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row mt-5">
        <div class="col-lg-8 d-flex align-items-strech">
        <div class="card w-100">
            <div class="card-body">
            <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                <div class="mb-3 mb-sm-0">
                    <h5 class="card-title fw-semibold">Question</h5>
                </div>
            </div>
            <div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                @endif
                <form action="{{ route('questions.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Title:</label>
                        <input type="text" class="form-control" name="title" id="exampleFormControlInput1" placeholder="title">
                    </div>
                    <div>
                        <label for="exampleFormControlInput1" class="form-label">Test:</label>
                        <select name="test_id" class="form-select form-select-sm" aria-label=".form-select-sm example"required>
                            @foreach ($tests as $test )
                                <option value="{{$test->id}}">{{$test->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Correct Answer:</label>
                        <input type="text" class="form-control" name="correct_answer" id="exampleFormControlInput1" placeholder="Correct Answer">
                    </div>
                    <div>
                        <label for="exampleFormControlInput1" class="form-label">Other Answer:</label>
                        <input type="text" class="form-control" name="other_answer[]" id="exampleFormControlInput1" placeholder="Other Answer" required>
                    </div>
                    <div>
                        <label for="exampleFormControlInput1" class="form-label">Other Answer:</label>
                        <input type="text" class="form-control" name="other_answer[]" id="exampleFormControlInput1" placeholder="Other Answer" required>
                    </div>
                    <div>
                        <label for="exampleFormControlInput1" class="form-label">Other Answer:</label>
                        <input type="text" class="form-control" name="other_answer[]" id="exampleFormControlInput1" placeholder="Other Answer" required>
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




