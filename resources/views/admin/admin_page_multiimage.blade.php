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

                        <h4 class="card-title mb-3">About Multi Images</h4>

                        <form action="{{route('store.multimage')}}" method="post" enctype="multipart/form-data">
                            @csrf


                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Images</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="file" placeholder="" value="" id="multi_img" name="multi_img[]" multiple="">
                                </div>
                                <div class="col-sm-4">
                                    <img class="rounded avatar-lg" src="{{asset('uploads/no_image.jpg') }}" alt="Card image cap" id="vimg">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary waves-effect waves-light">Upload Images</button>
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
        $("#multi_img").change(function(e){
            let reader = new FileReader();
            reader.onload = function(e){
                $("#vimg").attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
