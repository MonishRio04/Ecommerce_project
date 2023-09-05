@extends('Front.layout.navbarandfooter')
@section('main')
    @include('Front.layout.usersidebar')
    <form class="w-75 p-3" method="POST" action="{{ route('update') }}" files='true' enctype='multipart/form-data'>
        @csrf
        <div class="text-center">

    <img src="{{ $profile->image!=null?'storage/customerImages/'.$profile->image:url("images/profile.jpg") }}" class="img-circle text-center img-responsive" id="logo" alt="User image "/></div>
        <div class="form-group">
          <label for="exampleInputPassword1">Name</label>
          <input type="name" class="form-control in" name='name' value="{{ $profile->name }}" placeholder="Enter Name">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control in" name="email" value="{{ $profile->email }}"aria-describedby="emailHelp" placeholder="Enter email">
          </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control in" name="password" placeholder="Password">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">User image</label>
            <input type="file" class="form-control in" name="image" id="image" placeholder="Select image">
          </div><br>
          <div class="form-group">
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </div>
      </form>
   </div>
</div>
<style>
    .in{
        border-color:lightgrey;
    }
    #logo{
        height: 200px;
        width:200px;
        border-radius: 50%;
    }
</style>
@endsection

