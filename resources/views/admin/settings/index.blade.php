@extends('layouts.admin')

@section('style')


<style>
     
        .holder{
          border: 1px solid #eee;
          max-height : 500px;
          width: 100%;
          overflow-y : scroll;
          position: relative;
        }
        .container{
            max-width: 976px;
        }

        .border-top { border-top: 1px solid #e5e5e5; }
        .border-bottom { border-bottom: 1px solid #e5e5e5; }
        .border-top-gray { border-top-color: #adb5bd; }

        .box-shadow { box-shadow: 0 .25rem .75rem rgba(0, 0, 0, .05); }

        .lh-condensed { line-height: 1.25; }
        /* .form-control, .custom-select {
            font-size: small;
            line-height: 1;
         } */

    </style>
@endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12" >
            <div class="col-md-12 order-md-1 m-4">
                <h4 class="mb-3">Settings</h4>

                <form method="post" action="/settings" id="set_form" class="needs-validation" novalidate>
                 @csrf    
                    <div class="row">
                        <div class="col-sm-7 mb-3">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email Address" value="{{$setting->email ?? '' }}" required>
                            <div class="invalid-feedback">
                            Valid Email is required.
                            </div>
                        </div>
                        <div class="col-sm-5 mb-3">
                            <label for="phone_num">Phone Number</label>
                            <input type="text" class="form-control" name="phone_num" id="phone_num" placeholder="Phone Number" value="{{$setting->phone_num  ?? '' }}" required>
                            <div class="invalid-feedback">
                            Valid Phone Number is required.
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="facebook">Facebook</label>
                        <div class="input-group">
                            <input type="url" name="facebook" class="form-control" id="facebook" placeholder="Facebook Link" value="{{$setting->facebook ?? '' }}" required>
                            <div class="invalid-feedback" style="width: 100%;">
                            Facebook link is required.
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="twitter">Twitter</label>
                        <div class="input-group">
                            <input type="url" name="twitter" class="form-control" id="twitter" placeholder="Twitter Link" value="{{$setting->twitter ?? '' }}" required>
                            <div class="invalid-feedback" style="width: 100%;">
                            Twitter link is required.
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="linkedin">LinkedIn</label>
                        <div class="input-group">
                            <input type="url" name="linkedin" class="form-control" id="linkedin" placeholder="LinkedIn Link" value="{{$setting->linkedin ?? '' }}" required>
                            <div class="invalid-feedback" style="width: 100%;">
                            LinkedIn link is required.
                            </div>
                        </div>
                    </div>
                
                    <div class="mb-3">
                        <label for="instagram">Instagram</label>
                        <div class="input-group">
                            <input type="url" name="instagram" class="form-control" id="instagram" placeholder="Instagram Link" value="{{$setting->instagram ?? '' }}" required>
                            <div class="invalid-feedback" style="width: 100%;">
                            Instagram link is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <div class="input-group">
                            <input type="url" name="address" class="form-control" id="address" placeholder="YOUTAF Address" value="{{$setting->address ?? '' }}" required>
                            <div class="invalid-feedback" style="width: 100%;">
                            Address is required.
                            </div>
                        </div>
                    </div>
                    <!-- <hr class="mb-4">
            
                    <hr class="mb-4"> -->
                    <button class="btn btn-success font-weight-bold btn-md p-2 btn-block" type="submit">Update Settings</button>
                </form>
           

                </div>
            </div>
        </div>
    </div>
</div>


<script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
                console.log("i got in");
                form.classList.add('was-validated');

              }
              else{
                    event.preventDefault();
                    event.stopPropagation();
                    form.classList.add('was-validated');
                    console.log("and i got out");
                    console.log($("#set_form").serialize());
                    $("#set_form").submit();         
                  }
                 
            }, false);
          });
        }, false);
      })();
    </script>
@endsection