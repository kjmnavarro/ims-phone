@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="p-5 mb-4 bg-dark text-light rounded-3">
              <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Welcome to IMS Home Phone Subscriber Service</h1>
                <p class="col-md-8 fs-4">This is a API Coding Solution for IMS Home Phone Subscriber Service of Kieffer John M. Navarro.</p>

                <input class="form-control" type="text" id="inputPhoneNumber" placeholder="Input Phone number to lookup ex. 18675181010">
                <button class="btn btn-primary btn-lg mt-2" onclick="goToLink()">Phone Number Lookup</button>
              </div>
            </div>

        </div>
    </div>
</div>
@endsection

@section('javascript')

<script type="text/javascript">
    
    function goToLink(){

        let phone_number = $('#inputPhoneNumber').val();
        location.href='/ims/subscriber/'+phone_number;
    }

</script>

@endsection
