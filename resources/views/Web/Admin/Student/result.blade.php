@extends('Web.Layouts.dashbord')
@section('title','Result')

@section('search')
    <form action="/admin/client" method="get">
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
            <h5 class="card-title fw-semibold mb-4">Results</h5>
            <div class="table-responsive">
              <table class="table text-nowrap mb-0 align-middle">
                <thead class="text-dark fs-4">
                  <tr>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">ID</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">result</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Test</h6>
                    </th>
                    <th class="border-bottom-0">
                      <h6 class="fw-semibold mb-0">Student</h6>
                    </th>
                    <th class="border-bottom-0">
                        <h6 class="fw-semibold mb-0">Action</h6>
                    </th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($results as $result)
                        <tr>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-0">{{$result->id}}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <h6 class="fw-semibold mb-1">{{$result->result}}</h6>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{$result->test->name}}</p>
                            </td>
                            <td class="border-bottom-0">
                                <p class="mb-0 fw-normal">{{$result->user->name}}</p>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
                </table>
                <div class="d-flex">
                    {!! $results->links() !!}
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

@endsection
