@extends('admin.admin_master')
@section('admin')
<style>
    hr {
        margin: 0.51rem 0;
        color: rgba(0, 0, 0, .1);
        background-color: currentColor;
        border: 0;
        opacity: .7;
    }
</style>
<div class="page-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-xl-5">

                <!-- Simple card -->
                <div class="card">
                    <center class="mt-2">
                        <img class="rounded-circle avatar-lg" src="{{ !empty($adminData->profile) ? asset('uploads/admin/'.$adminData->profile) : asset('uploads/no_image.jpg') }}" alt="Card image cap">
                    </center>
                    <div class="card-body">
                        <h4 class="card-title">Name:- {{$adminData->name}}</h4>
                        <hr>
                        <h4 class="card-title">User Name:- {{$adminData->username}}</h4>
                        <hr>
                        <h4 class="card-title">Email:- {{$adminData->email}}</h4>
                        <hr>

                        <a href="{{route('admin.editProfile')}}" class="btn btn-info btn-rounded  waves-effect waves-light mt-2">Update Profile</a>
                    </div>
                </div>

            </div><!-- end col -->
        </div>
    </div>
</div>
@endsection
