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
                <p class="col-md-8 fs-4">Edit Subscriber info below:</p>
                <form class="mb-5" method="POST" action="{{ route('updateSubs', $subs->phone_number) }}">
                    @method('PUT')
                    @csrf

                    <input type="hidden" name="id" value="{{$subs->id}}">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-4">
                            <div class="form-group">
                                <label>Phone Number</label>
                                <input type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ $subs->phone_number }}" required autocomplete="phone_number" autofocus>

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
                                <input type="number" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $subs->username }}" required autocomplete="username" autofocus min="10000000000" max="19999999999">

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
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ $subs->password }}" required autocomplete="password" autofocus>

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
                                        <option value="{{ $domain->id }}" {{ $subs->domain_id == $domain->id ? 'selected' : '' }}>{{ $domain->domain }}</option>
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
                                        <option value="{{ $status->id }}" {{ $subs->status_id == $status->id ? 'selected' : '' }}>{{ $status->name }}</option>
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
                                        <option value="{{ $feature->id }}" {{ $subs->features_id == $feature->id ? 'selected' : '' }}>{{ $feature->feature }}</option>
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
                        <button type="submit" class="btn btn-info"><i class="bi bi-plus-circle"></i> Update Subscriber</button>
                    </div>
                </form>

              </div> {{-- container --}}
            </div> {{-- bgdark --}}

        </div>
    </div>
</div>
@endsection
