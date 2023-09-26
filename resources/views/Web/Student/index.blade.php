@extends('Web.Layouts.dashbord')
@section('title','Test' )

@section('content')
<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
      <div class="col-lg-8 d-flex align-items-strech">
        <div class="card w-100">
          <div class="card-body">
            @foreach ($questions as $question)
            <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
              <div class="mb-3 mb-sm-0">
                    <h5 class="card-title fw-semibold  mt-3">{{$question->title}}:</h5>
              </div>
            </div>
            <div>
                @if ($errors->any())
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                @endif
                <form action="{{ route('my_result') }}" method="POST">
                    <input type="hidden" value="{{$number}}" name="id">
                    <input type="hidden" value="{{$question->test->id}}" name="test_id">

                    @csrf
                    @foreach ($question->answers as $answer )
                    <div class="form-check">
                        <input class="form-check-input" type="radio" value="{{$answer->name}}" name="answers[{{$question->id}}]" id="{{$answer->id}}">
                        <label class="form-check-label" for="{{$answer->id}}">
                            {{$answer->name}}
                        </label>
                    </div>
                    @endforeach
                    @endforeach
                    <div class="text-center m-3">
                        <button type="submit" class="btn btn-outline-primary ">End Test</button>
                    </div>

                </form>
            </div>
          </div>
        </div>
      </div>
      {{-- <div class="d-flex">
        {!! $questions->links() !!}
    </div> --}}
    </div>


  </div>
@endsection
