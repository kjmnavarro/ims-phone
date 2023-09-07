@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="p-5 mb-4 bg-dark text-light rounded-3">
              <div class="container-fluid py-5">
                <p class="col-md-8 fs-4">Please see your data below:</p>

                <div class="fw-bold mt-5">
                    <p>{</p>
                    <p class="ps-2"><span class="text-info">"phoneNumber":</span> "{{$allData['phone_number']}}",</p>
                    <p class="ps-2"><span class="text-info">"username":</span> "{{$allData['username']}}",</p>
                    <p class="ps-2"><span class="text-info">"password":</span> "{{$allData['password']}}",</p>
                    <p class="ps-2"><span class="text-info">"domain":</span> "{{$allData['domain']}}",</p>
                    <p class="ps-2"><span class="text-info">"status":</span> "{{$allData['status']}}",</p>
                    <p class="ps-2"><span class="text-info">"features":</span> {</p>
                    <p class="ps-4"><span class="text-warning">"{{$allData['feature']}}":</span> {</p>
                    <p class="ps-5"><span class="text-info">"provisioned":</span> {{$allData['provisioned'] ? 'true' : 'false'}},</p>
                    <p class="ps-5"><span class="text-info">"destination":</span> "{{$allData['destination']}}"</p>
                    <p class="ps-5">}</p>
                    <p class="ps-4">}</p>
                    <p class="ps-2">}</p>
                </div>

              </div>
            </div>

        </div>
    </div>
</div>
@endsection
