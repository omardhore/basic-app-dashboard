<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\review;
use Carbon\Carbon;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class reviewController extends Controller
{
    public function AllReview()
    {
        $reviews = review::latest()->get();
        return view('admin.backend.review.all-review', compact('reviews'));
    }

    public function AddReview()
    {
        return view('admin.backend.review.add-review');
    }

    public function StoreReview(Request $request)
    {
        $image = $request->file('image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        if (extension_loaded('gd')) {
            $manager = new ImageManager(new Driver());
            $img = $manager->read($image);
            $img->resize(170, 170)->save(public_path('upload/review/' . $name_gen));
        } else {
            $image->move(public_path('upload/review'), $name_gen);
        }

        $save_url = 'upload/review/' . $name_gen;

        review::insert([
            'name' => $request->name,
            'position' => $request->position,
            'message' => $request->message,
            'image' => $save_url,
            'created_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Review Inserted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.review')->with($notification);
    }

    public function EditReview($id)
    {
        $review = review::findOrFail($id);
        return view('admin.backend.review.edit-review', compact('review'));
    }

    public function UpdateReview(Request $request)
    {
        $review_id = $request->id;
        $old_img = $request->old_image;

        if ($request->file('image')) {
            $image = $request->file('image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            if (extension_loaded('gd')) {
                $manager = new ImageManager(new Driver());
                $img = $manager->read($image);
                $img->resize(170, 170)->save(public_path('upload/review/' . $name_gen));
            } else {
                $image->move(public_path('upload/review'), $name_gen);
            }

            $save_url = 'upload/review/' . $name_gen;

            if (file_exists(public_path($old_img))) {
                unlink(public_path($old_img));
            }

            review::findOrFail($review_id)->update([
                'name' => $request->name,
                'position' => $request->position,
                'message' => $request->message,
                'image' => $save_url,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Review Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.review')->with($notification);
        } else {
            review::findOrFail($review_id)->update([
                'name' => $request->name,
                'position' => $request->position,
                'message' => $request->message,
                'updated_at' => Carbon::now(),
            ]);

            $notification = array(
                'message' => 'Review Updated without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.review')->with($notification);
        }
    }

    public function DeleteReview($id)
    {
        $review = review::findOrFail($id);
        $img = $review->image;
        if (file_exists(public_path($img))) {
            unlink(public_path($img));
        }

        review::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Review Deleted Successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }
}
