@include('layouts.welcome')


@section('content')
{{-- resources/views/your-view.blade.php --}}
<style>
  /* make the icon big and white */
  .links .login-icon {
    position: relative;
    font-size: 1.5rem !important;
    color: #ffffff;
    margin-right: 1rem;
    line-height: 1;
    display: inline-block;
    top: 0.2rem;
  }
  /* subtle hover feedback */
  .links .login-icon:hover {
    opacity: 0.8;
  }
</style>

<div class="flex-center position-ref full-height" style="height: 10vh;">
  @if (Route::has('login'))
    <div class="top-right links">
      @auth
        <a href="{{ url('/admin') }}">Admin</a>
      @else
        <a href="{{ route('login') }}" aria-label="Login">
          <i class="bi bi-box-arrow-in-right login-icon"></i>
          <h6 style="display:inline ; color:white" >Login</h6>
        </a>
        @if (Route::has('register'))
          <a href="{{ route('register') }}">Register</a>
        @endif
      @endauth
    </div>
  @endif
</div>


  <div class="container py-5">
    <div class="text-center mb-5">
      <h2 class="display-5 mb-3", style="color: white;">Login To Your Account?</h2>
      <br>
      <a href="{{ route('login') }}" class="btn btn-success btn-lg">Go To My Account</a>
    </div>
<br>
<br>
    <div id="features" class="row">  
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <i class="bi bi-people-fill" style="font-size: 2rem;"></i>
            <h5 class="card-title mt-3">Employee Management</h5>
            <p class="card-text">Add, edit or import your staff with roles and departments.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <i class="bi bi-calendar3" style="font-size: 2rem;"></i>
            <h5 class="card-title mt-3">Smart Scheduling</h5>
            <p class="card-text">Define shifts, automate holidays and avoid overlaps.</p>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="card h-100 shadow-sm">
          <div class="card-body text-center">
            <i class="bi bi-bar-chart-line-fill" style="font-size: 2rem;"></i>
            <h5 class="card-title mt-3">Insightful Reports</h5>
            <p class="card-text">Generate attendance, overtime and leave summaries in one click.</p>
          </div>
        </div>
      </div>
    </div>
  </div>

<footer class="text-white text-center py-3 mt-5" style="position: fixed; bottom: 0; width: 100%;background-color:rgb(23, 33, 43);">

  <small>&copy; {{ date('Y') }} Attendance Manager. All rights reserved.</small>
</footer>
