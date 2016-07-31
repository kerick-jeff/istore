@extends('layouts.master')

@section('title', '| Settings')

<!-- provide author and page desc -->

@section('css')
<link rel="stylesheet" href="{{ asset('js/countrytel/build/css/intlTelInput.css') }}" media="screen" title="no title" charset="utf-8">
<style media="screen">
  #profile {
    width: 100%;
    height: 200px;
    cursor: pointer;
  }

  @media (max-width: 767px) {
    #profile {
      width: 100%;
      height: 250px;
      cursor: pointer;
    }
  }
</style>
@endsection

@section('breadcrumb')
<ol class="breadcrumb">
    <li><a href="/"><i class="fa fa-dashboard"></i> iPub </a></li>
    <li>Settings</li>
</ol>
@endsection

@section('content')

<div class="row">
  <div class="col-md-12">
    <!-- settings/pin -->
    <div class="box box-primary">
      <div class="box-header with-border">
        <h3 class = "fa fa-cogs">&nbsp;Settings/Configurations</h3>
      </div>
      <!-- /.box-header -->
      <div class="box-body">
        <div class="row">
            <div class="col-md-3">
              <!-- change profile picture form -->
              <form action="/settings/profile-picture" method="POST" enctype = "multipart/form-data">
                {{ csrf_field() }}
                <strong><i class = "fa fa-camera"></i>&nbsp; Profile Picture </strong>
                <div class="form-group has-feedback">
                   <img id = "profile" class="img-responsive img-thumbnail" src="{{ url('/profilePicture') }}" alt="User profile picture" title = "Click to change profile picture">
                   <input type="file" id = "file" name="profile_picture" style = "width: 100%">
                   @if ($errors->has('profile_picture'))
                       <span class="help-block" style = "color: #DD4B39 !important;">
                           <strong>{{ $errors->first('profile_picture') }}</strong>
                       </span>
                   @endif
                </div>
                <div class="form-group has-feedback">
                  <button type="submit" class = "btn btn-primary btn-block" title = "Click to change your profile picture">Change profile picture</button>
                </div>
              </form>
              <hr />

              <!-- set phone contact -->
              <form id = "contactForm" action = "/settings/phone-number" method = "POST">
                {{ csrf_field() }}
                <strong><i class = "fa fa-phone"></i>&nbsp; Phone Contact </strong>
                <div class="form-group has-feedback">
                  <input type="tel" id = "phone" class="form-control" name="phone_number" placeholder = "{{ Auth::user()->phone_number }}">
                  @if ($errors->has('phone_number'))
                      <span class="help-block" style = "color: #DD4B39 !important;">
                          <strong>{{ $errors->first('phone_number') }}</strong>
                      </span>
                  @endif
                  <input type="hidden" name="dial_code" id = "dialCode">
                </div>
                <div class="form-group has-feedback">
                  <button type="submit" class = "btn btn-primary btn-block" title = "Set your phone number">Set phone number</button>
                </div>
              </form>
              <hr />

              <!-- security form -->
              <form action = "settings/security" method = "POST">
                {{ csrf_field() }}
                <strong><i class = "fa fa-lock"></i>&nbsp; Security </strong>
                <div class="form-group has-feedback">
                  <input type="password" class="form-control" name="password" placeholder="Enter new password">
                  <span class="fa fa-lock form-control-feedback"></span>
                  @if ($errors->has('password'))
                      <span class="help-block" style = "color: #DD4B39 !important;">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group has-feedback">
                  <input type="password" class="form-control" name="password_confirmation" placeholder="Re-type new password">
                  <span class="glyphicon glyphicon-repeat form-control-feedback"></span>
                  @if ($errors->has('password_confirmation'))
                      <span class="help-block" style = "color: #DD4B39 !important;">
                          <strong>{{ $errors->first('password_confirmation') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group has-feedback">
                  <button type="submit" class = "btn btn-primary btn-block" title = "Change your password">Change your password</button>
                </div>
              </form>
              <hr />
            </div>

            <div class="col-md-9">
              <!-- location form -->
              <form action="/settings/location" method="POST">
                {{ csrf_field() }}
                <div class="form-group has-feedback">
                  <strong><i class = "fa fa-map-marker"></i> Location </strong>
                  <p> Hint: You can set your location by either choosing the longitude and latitude of your location or by finding your location on the map and clicking on set. </p>
                  <textarea class="form-control" rows="8" placeholder="Map"></textarea>
                </div>
                <div class="form-group has-feedback" style = "display: inline-block; width: 49%;">
                  <strong>Longitude</strong>
                  <input type="number" class = "form-control" name="geo_longitude" value = "{{ empty(Auth::user()->geo_longitude) ? 180 : Auth::user()->geo_longitude }}" min = "1" max = "360">
                </div>
                <div class = "form-group has-feedback" style = "display: inline-block; width: 50%;">
                  <strong>Latitude</strong>
                  <input type="number" class = "form-control" name="geo_latitude" value="{{ empty(Auth::user()->geo_latitude) ? 180 : Auth::user()->geo_latitude  }}" min = "1" max = "360">
                </div>
                <div class="form-group has-feedback">
                  <input type="submit" class = "btn btn-primary" value="Set">
                </div>
              </form>
              <hr />

              <!-- description form -->
              <form action="/settings/description" method="POST">
                {{ csrf_field() }}
                <div class="form-group has-feedback">
                  <strong><i class = "fa fa-file-text"></i> Description </strong>
                  <textarea class="form-control" id = "description" name = "description" rows="8" placeholder="Hint: Provide accurate description about what you (organisation, company, individual, NGO or business) do, how you operate, products you sell or give out and the services you offer." disabled > {{ Auth::user()->description }} </textarea>
                  @if ($errors->has('description'))
                      <span class="help-block" style = "color: #DD4B39 !important;;">
                          <strong>{{ $errors->first('description') }}</strong>
                      </span>
                  @endif
                </div>
                <div class="form-group has-feedback">
                  <input type="button" id = "editBtn" class = "btn btn-warning" name="edit" value="Edit" > &nbsp;
                  <input type="submit" class = "btn btn-primary" name="save" value="Save">
                </div>
              </form>
              <hr />
            </div>
          </div>
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
</div>

@endsection

@section('javascript')

<script src="js/countrytel/build/js/intlTelInput.js"></script>
<script type="text/javascript">
    $("#phone").intlTelInput({
        geoIpLookup: function(callback) {
            $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
                var countryCode = (resp && resp.country) ? resp.country : "";
                callback(countryCode);
            });
        },
        //initialCountry: "auto",
        numberType: "MOBILE",
        nationalMode: true,
        autoPlaceholder: true,
        separateDialCode: true,
        utilsScript: "js/countrytel/build/js/utils.js",
    });

    $("#phone").intlTelInput("setNumber", "+{{ Auth::user()->dial_code }} {{ Auth::user()->phone_number }}");

    $("#contactForm").submit(function(){
        var countryData = $("#phone").intlTelInput("getSelectedCountryData");
        var phoneNumber = $("#phone").intlTelInput("getNumber");
        var dialCode = countryData['dialCode'];
        if(Number(phoneNumber)){
            var begin = dialCode.length + 1;
            phoneNumber = phoneNumber.slice(begin);
            $("#phone").val(phoneNumber);
        }
        $("#dialCode").val(dialCode);
    });

    $("#editBtn").click(function(){
        $("#description").removeAttr("disabled");
    });

    $("#profile").click(function(){
        document.getElementById('file').click();
    });
</script>

@endsection
