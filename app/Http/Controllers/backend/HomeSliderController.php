<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeSlide;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class HomeSliderController extends Controller
{
    public function HomeSlider()
    {
        $homeslider = HomeSlide::find(1);

        // Ensure a slider entry exists
        if (!$homeslider) {
            $homeslider = HomeSlide::create([
                'title' => 'Default Title',
                'description' => 'Default Description',
                'image' => 'upload/no_image.jpg',
                'link' => '#',
            ]);
        }

        return view('admin.backend.slider.slider', compact('homeslider'));
    }

    public function UpdateSlider(Request $request)
    {
        $slider_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            if (extension_loaded('gd')) {
                $manager = new ImageManager(new Driver());
                $img = $manager->read($image);
                $img->resize(306, 618)->save(public_path('upload/home_slide/' . $name_gen));
            } else {
                $image->move(public_path('upload/home_slide'), $name_gen);
            }

            $save_url = 'upload/home_slide/' . $name_gen;

            if (file_exists(public_path($old_img)) && $old_img != 'upload/no_image.jpg') {
                unlink(public_path($old_img));
            }

            HomeSlide::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'link' => $request->link,
                'image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Home Slider Updated with Image Successfully',
                'alert-type' => 'success'
            );

        } else {
            HomeSlide::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'link' => $request->link,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Home Slider Updated without Image Successfully',
                'alert-type' => 'success'
            );
        }

        return redirect()->back()->with($notification);
    }
}
