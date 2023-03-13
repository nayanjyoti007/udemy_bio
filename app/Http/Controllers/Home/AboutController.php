<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Image;

class AboutController extends Controller
{
    public function aboutpage()
    {
        $about = About::find(1);
        return view('admin.about_page.about_page_all', compact('about'));
    }

    public function updateabout(Request $request)
    {
        $about_id = $request->id;

        if ($request->file('about_image')) {
            $image = $request->file('about_image');
            $image_name = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $resize = Image::make($image)->resize(523, 605);
            $resize->save('uploads/admin/about-page/' . $image_name);
            $saveurl = 'uploads/admin/about-page/' . $image_name;

            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_desc' => $request->short_desc,
                'long_desc' => $request->long_desc,
                'about_image' => $saveurl,
            ]);

            $notification = array(
                'message' => 'About Page Updated With Image Successfully',
                'alert-type' => 'success'
            );

            return back()->with($notification);
        } else {
            About::findOrFail($about_id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_desc' => $request->short_desc,
                'long_desc' => $request->long_desc,
            ]);

            $notification = array(
                'message' => 'About Page Updated Successfully',
                'alert-type' => 'success'
            );

            return back()->with($notification);
        }
    }

    public function homeabout(){
        $aboutpage = About::find(1);
        return view('front.about', compact('aboutpage'));
    }
}
