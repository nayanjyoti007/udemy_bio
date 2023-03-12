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
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title mb-3">Edite Profile Page</h4>

                        <form action="{{route('admin.storeProfile')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="" value="{{$editData->name}}" id="name" name="name">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="" value="{{$editData->username}}" id="username" name="username">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="" value="{{$editData->email}}" id="email" name="email">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="file" placeholder="" value="" id="pimg" name="pimg">
                                </div>
                                <div class="col-sm-4">
                                    <img class="rounded avatar-lg" src="{{ !empty($editData->profile) ? asset('uploads/admin/'.$editData->profile) : asset('uploads/no_image.jpg') }}" alt="Card image cap" id="vimg">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary waves-effect waves-light">Update Profile</button>
                        </form>

                    </div>
                </div>

            </div><!-- end col -->
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $("#pimg").change(function(e){
            let reader = new FileReader();
            reader.onload = function(e){
                $("#vimg").attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
