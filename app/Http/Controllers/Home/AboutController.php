<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\MultiImage;
use Carbon\Carbon;
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

    public function homeabout()
    {
        $aboutpage = About::find(1);
        return view('front.about', compact('aboutpage'));
    }

    public function multiimage()
    {
        return view('admin.admin_page_multiimage');
    }

    public function storemultimage(Request $request)
    {
        $image = $request->file('multi_img');
        foreach ($image as $multi_image) {
            $image_name = hexdec(uniqid()) . '.' . $multi_image->getClientOriginalExtension();
            $resize = Image::make($multi_image)->resize(220, 220);
            $resize->save('uploads/admin/multimage/' . $image_name);
            $save_url = 'uploads/admin/multimage/' . $image_name;

            MultiImage::insert([
                'multi_image' => $save_url,
                'created_at' => Carbon::now()
            ]);
        }

        $notification = array(
            'message' => 'Multi Images Upload Successfully',
            'alert-type' => 'success'
        );

        return back()->with($notification);
    }

    public function allmultiimage(){
        $allMultiimage = MultiImage::all();
        return view('admin.about_page.all_multipale',compact('allMultiimage'));
    }
}
