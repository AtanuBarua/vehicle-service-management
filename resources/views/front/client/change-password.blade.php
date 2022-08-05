@extends('front.master')

@section('body')
<div class="breadcrumb-area">
    <div class="container">
        <div class="breadcrumb-content">
            <h2>Other</h2>
            <ul>
                <li><a href="{{route('/')}}">Home</a></li>
                <li class="active">My Account</li>
            </ul>
        </div>
    </div>
</div>
<!-- Uren's Breadcrumb Area End Here -->
<!-- Begin Uren's Page Content Area -->
<main class="page-content">
    <!-- Begin Uren's Account Page Area -->
    <div class="account-page-area">
        <div class="container-fluid">
            <div class="row">


                <div class="col-lg-9" style="margin: auto;">
                    @if (Session::has('message'))

                    <div class="alert alert-primary" role="alert">
                      {{Session::get('message')}}
                  </div>
                  @endif
                  
                  @if ($errors->any())
                  @foreach ($errors->all() as $error)
                  <div class="alert alert-danger" role="alert">{{$error}}</div>
                  @endforeach
                  @endif


                  <div class="myaccount-details">
                    <form method="POST" action="{{route('client.update-password')}}" class="uren-form">
                        @csrf
                        <div class="uren-form-inner">

                            <div class="single-input">
                                <label for="account-details-oldpass">Current Password</label>
                                <input type="text" name="old_password" id="account-details-oldpass">
                            </div>
                            <div class="single-input">
                                <label for="account-details-newpass">New Password</label>
                                <input name="new_password" type="text" id="account-details-newpass">
                            </div>
                            <div class="single-input">
                                <label for="account-details-confpass">Confirm New Password</label>
                                <input name="new_password_confirmation" type="text" id="account-details-confpass">
                            </div>
                            <div class="single-input">
                                <button class="uren-btn uren-btn_dark" type="submit"><span>SAVE
                                CHANGES</span></button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- Uren's Account Page Area End Here -->
</main>
@endsection