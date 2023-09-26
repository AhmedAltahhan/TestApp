@extends('Web.Layouts.dashbord')
@section('title','Test')

@section('search')
    <form action="/admin/test" method="get">
        <input type="search" class="form-control" placeholder="Search.." name="search">
        <button type="submit" class="form-control badge bg-info rounded-5">Search</button>
    </form>
@endsection

@section('content')
<div class="container-fluid">

    <div class="row">
      <div class="col-lg-12 d-flex align-items-stretch">
        <div class="card w-100">
          <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Tasts</h5>
            <div class="table-responsive">
              <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                  <tr>
                    <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">ID</h6>
                    </th>
                    <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Name</h6>
                    </th>
                    <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Questions</h6>
                    </th>
                    <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Action</h6>
                    </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($tests as $test)
                        <tr>
                            <input type="hidden" name="test" value="{{ $test->id }}">
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">{{$test->id}}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-1">{{$test->name}}</h6>
                            </td>
                            <td>
                                @foreach ($test->questions as $question)
                                    <h6 class="fw-semibold mb-1">{{$question->title}}</h6>
                                @endforeach
                            </td>
                            <td class="border-bottom-0">
                                <form action="{{ route('tests.edit', [$test->id]) }}" method="GET">
                                    @csrf
                                    <button class="badge bg-success rounded-5" type="submit">Update</button>
                                </form>
                                <form action="{{ route('tests.destroy', [$test->id]) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button class="badge bg-danger rounded-5" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
                <div class="d-flex">
                    {!! $tests->links() !!}
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection
