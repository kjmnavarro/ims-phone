@extends('layouts.app')

@section('content')

@if (\Session::has('success'))
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{!! \Session::get('success') !!}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
@endif

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="p-5 mb-4 bg-dark text-light rounded-3">
              <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Welcome <span class="text-info">{{$user ? $user->name : 'Guest'}}</span> to IMS Home Phone Subscriber Service</h1>
                <p class="col-md-8 fs-4 mb-5">This is a API Coding Solution for IMS Home Phone Subscriber Service of Kieffer John M. Navarro.</p>

                <p class="col-md-8 fs-4">Create Subscriber info below:</p>
                <form class="mb-5" method="POST" action="{{ route('createSubs') }}">
                    @csrf

                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ old('phone_number') }}" required autocomplete="phone_number" autofocus min="10000000000" max="19999999999">

                                @error('phone_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="number" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus min="10000000000" max="19999999999">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus>

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 mt-3">
                            <div class="form-group">
                                <label>Select Domain</label>
                                <select class="form-control" name="domain_id">
                                    <option selected>Select Domain</option>
                                    @foreach($domains as $domain)
                                        <option value="{{ $domain->id }}">{{ $domain->domain }}</option>
                                    @endforeach
                                </select>

                                @error('domain_id')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-4 mt-3">
                            <div class="form-group">
                                <label>Select Status</label>
                                <select class="form-control" name="status_id">
                                    <option selected>Select Status</option>
                                    @foreach($statuses as $status)
                                        <option value="{{ $status->id }}">{{ $status->name }}</option>
                                    @endforeach
                                </select>

                                @error('status_id')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                         <div class="col-lg-4 col-md-4 mt-3">
                            <div class="form-group">
                                <label>Select Features</label>
                                <select class="form-control" name="features_id">
                                    <option selected>Select Features</option>
                                    @foreach($features as $feature)
                                        <option value="{{ $feature->id }}">{{ $feature->feature }}</option>
                                    @endforeach
                                </select>

                                @error('features_id')
                                    <span class="invalid-feedback d-block" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                    </div>

                    <div class="btn-box text-right mt-3 mt-3">
                        <button type="submit" class="btn btn-success"><i class="bi bi-plus-circle"></i> Create Subscriber</button>
                    </div>
                </form>

                <div class="row mt-5">
                    <div class="col-md-8">
                        <h3 class="mb-3">Subscribers</h3>
                        <table class="table table-dark table-hover">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Phone Number</th>
                              <th scope="col">Username</th>
                              <th scope="col">Action</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach($subs as $sub)
                                <tr>
                                  <th scope="row">{{$sub->id}}</th>
                                  <td>{{$sub->phone_number}}</td>
                                  <td>{{$sub->username}}</td>
                                  <td>
                                    <a href="{{ route('editSubs', $sub->id) }}" type="button" class="btn btn-info btn-sm" data-toggle="tooltip" title="Edit Employee"><i class="bi bi-pencil"></i> Edit</a>

                                    <form method="POST" action="{{ route('deleteSubs', $sub->id) }}" style="display: inline;" onsubmit="return confirm('You want to delete this subscriber?');">

                                        {{-- @method('DELETE') --}}
                                        @csrf

                                        <button type="submit" class="btn btn-danger btn-sm" data-toggle="tooltip" title="Delete Employee"><i class="bi bi-trash"></i>Delete</button>
                                    </form>
                                  </td>
                                </tr>
                            @endforeach
                          </tbody>
                        </table>
                    </div>
                </div>

              </div> {{-- container --}}
            </div> {{-- bgdark --}}

        </div>
    </div>
</div>
@endsection
