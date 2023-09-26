@extends('Web.Layouts.dashbord')
@section('title' , 'Update')
@section('content')

<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
      <div class="col-lg-8 d-flex align-items-strech">
        <div class="card w-100">
          <div class="card-body">
            <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
              <div class="mb-3 mb-sm-0">
                <h5 class="card-title fw-semibold">Update</h5>
              </div>

            </div>
            <div>
                @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
                @endif
                <form action="{{ route('profile.update' , ['profile' => $id ]) }}" method="Post" >
                    @csrf
                    @method('Put')
                    @foreach ($admin as $v)
                    <input type="hidden" name="user" value="{{ $v?->id }}">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name:</label>
                        <input type="text" class="form-control" name="name" value="{{$v->name}}"  id="exampleFormControlInput1" placeholder="Name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">UserName:</label>
                        <input type="text" class="form-control" name="username" value="{{$v->username}}" id="exampleFormControlInput1">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email:</label>
                        <input type="email" class="form-control" name="email" value="{{$v->email}}"  id="exampleFormControlInput1" placeholder="Email">
                    </div>
                    @endforeach
                    <div class="text-center m-3">
                        <button type="submit" class="btn btn-outline-success">Update</button>
                    </div>

                </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection
