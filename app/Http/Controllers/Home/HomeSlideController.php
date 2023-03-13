<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Image;
class HomeSlideController extends Controller
{
    public function homeslider()
    {
        $homeslide = HomeSlide::find(1);
        return view('admin.home_slide.home_slide_all', compact('homeslide'));
    } //End Method

    public function updateslider(Request $request)
    {
        $slider_id = $request->id;
        if ($request->file('home_slide')) {
            $image = $request->file('home_slide');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            $resize = Image::make($image)->resize(636, 852);
            $resize->save('uploads/admin/home-slide/' . $image_name);
            $save_url = 'uploads/admin/home-slide/' . $image_name;

            HomeSlide::findOrFail($slider_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'home_slide' => $save_url,
                'video_url' => $request->video_url,
            ]);

            $notification = array(
                'message' => 'Home Slider Updated With Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('home.slide')->with($notification);
        } else {
            HomeSlide::findOrFail($slider_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
            ]);

            $notification = array(
                'message' => 'Home Slider Updated Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('home.slide')->with($notification);
        }
    } //End Method
}
