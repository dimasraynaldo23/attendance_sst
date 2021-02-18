@extends('layouts/main')

@section('title', 'Profile')

@section('container')
<style>
.clockStyle {
  font-size: 35px;
  margin: 10px 0px 300px 850px;
  color: black;
  text-align: right;
}
</style>


<div class="header pb-3 d-flex align-items-center" style="min-height: 535px; background-image: url(../../uploads/profile/{{ Auth::user()->avatar }}); background-size: cover; background-position: center top;">
    <!-- Mask -->
    <span class="mask bg-gradient-default opacity-8"></span>
    <!-- Header container -->
    <div class="container-fluid d-flex align-items-center">
      <div class="row">
        
        <div class="content">
          <div class="title m-b-md">
            <div class="clockStyle" id="clock"></div>
          </div>
          </div>
        <div class="col-lg-7 col-md-10">
          <h1 class="display-2 text-white">Hello, <br> {{ Auth::user()->name }}.</h1>
          <p class="text-white mt-0 mb-4">{{ Auth::user()->position }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    setInterval(displayclock, 500);
    function displayclock() {
        var time = new Date();
        var hrs = time.getHours();
        var min = time.getMinutes();
        var sec = time.getSeconds();
        var en = 'AM';
        if (hrs > 12) {
            en = 'PM';
        }
        if (hrs > 12) {
            hrs = hrs - 12;
        }
        if (hrs == 0) {
            hrs = 12;
        }
        if (hrs < 10) {
            hrs = '0' + hrs;
        }
        if (min < 10) {
            min = '0' + min;
        }
        if (sec < 10) {
            sec = '0' + sec;
        }
        document.getElementById("clock").innerHTML = hrs + ':' + min + ':' + sec + ' ' + en;
    }
</script>
@endsection