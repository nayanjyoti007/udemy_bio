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

                        <h4 class="card-title mb-3">Edite Home Slide</h4>

                        <form action="{{route('update.slider')}}" method="post" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" id="id" name="id" value="{{$homeslide->id}}">
                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="" value="{{$homeslide->title}}" id="title" name="title">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Title</label>
                                <div class="col-sm-10">
                                    <textarea name="short_title" id="short_title" cols="30" rows="5" class="form-control">{{$homeslide->short_title}}</textarea>
                                </div>
                            </div>



                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Home Slide</label>
                                <div class="col-sm-6">
                                    <input class="form-control" type="file" placeholder="" value="" id="home_slide" name="home_slide">
                                </div>
                                <div class="col-sm-4">
                                    <img class="rounded avatar-lg" src="{{ !empty($homeslide->home_slide) ? asset($homeslide->home_slide) : asset('uploads/no_image.jpg') }}" alt="Card image cap" id="hvimg">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Video url</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" id="video_url" name="video_url" placeholder="" value="{{$homeslide->video_url}}">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
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
        $("#home_slide").change(function(e){
            let reader = new FileReader();
            reader.onload = function(e){
                $("#hvimg").attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection
