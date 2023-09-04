@extends('Front.layout.navbarandfooter')
@section('main')
<main class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div class="card">
                  <div class="card-header">Reset Password</div>
                  <div class="card-body" style="padding:10px">
                      <form action="{{ route('reset.password.post') }}" method="POST">
                          @csrf
                          <input type="hidden" name="token" value="{{ $token }}">
                          <div class="form-group row mt-4">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus style="border:1px solid lightgrey">
                                  @error('email')
                                      <span class="" style="color:red">* {{ $message }}
                               @enderror
                              </div>
                          </div>
                          <div class="form-group row mt-4">
                              <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password" class="form-control" name="password" required autofocus style="border:1px solid lightgrey">
                                  @error('password'))
                                      <span class="" style="color:red">* {{ $message }}
                                  @enderror
                              </div>
                          </div>
                          <div class="form-group row mt-4">
                              <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Confirm Password</label>
                              <div class="col-md-6">
                                  <input type="password" id="password-confirm" class="form-control" name="password_confirmation" required autofocus style="border:1px solid lightgrey">
                                  @error('password_confirmation'))
                                      <span class="" style="color:red">* {{ $message }}
                                               @enderror
                              </div>
                          </div>
                          <div class="col-md-6 offset-md-4 mt-4">
                              <button type="submit" class="btn btn-primary">
                                  Reset Password
                              </button>
                          </div>
                      </form>
                    </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection