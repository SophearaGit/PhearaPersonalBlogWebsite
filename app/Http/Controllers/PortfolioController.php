<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class PortfolioController extends Controller
{
    public function addPortfolio(Request $request)
    {
        $data = [
            'pageTitle' => 'Add Portfolio Form',
        ];
        return view('back.page.add_portfolio', $data);
    }

    public function createPortfolio(Request $request)
    {


        $request->validate([
            'title' => 'required|unique:portfolios,title|max:255',
            'featured_image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'overview' => 'required|string',
            'strategy' => 'nullable|string|max:255',
            'project_type' => 'nullable|string|max:255',
            'client' => 'nullable|string|max:255',
            'content' => 'required|string',
            'project_challenge' => 'nullable|string',
            'design_research' => 'nullable|string',
            'design_approach' => 'nullable|string',
            'the_solution' => 'nullable|string',
        ]);

        // dd($request);



        if ($request->hasFile('featured_image')) {
            $path = "images/portfolios/";
            $file = $request->file('featured_image');
            $filename = $file->getClientOriginalName();
            $new_filename = time() . '_' . $filename;

            // Upload featured image
            $upload = $file->move(public_path($path), $new_filename);

            if ($upload) {
                $resized_path = $path . 'resized/';

                if (!File::isDirectory(public_path($resized_path))) {
                    File::makeDirectory(public_path($resized_path), 0777, true, true);
                }

                // Thumbnail (1:1 aspect ratio)
                Image::make(public_path($path . $new_filename))
                    ->fit(250, 250)
                    ->save(public_path($resized_path . 'thumb_' . $new_filename));

                // Resized Image (1.6 aspect ratio)
                Image::make(public_path($path . $new_filename))
                    ->fit(512, 320)
                    ->save(public_path($resized_path . 'resized_' . $new_filename));

                $portfolio = new Portfolio();

                $portfolio->author_id = Auth::id();
                $portfolio->title = $request->title;
                $portfolio->featured_image = $new_filename;
                $portfolio->overview = $request->overview;
                $portfolio->strategy = $request->strategy;
                $portfolio->project_type = $request->project_type;
                $portfolio->client = $request->client;
                $portfolio->content = $request->content;
                $portfolio->project_challenge = $request->project_challenge;
                $portfolio->design_research = $request->design_research;
                $portfolio->design_approach = $request->design_approach;
                $portfolio->the_solution = $request->the_solution;

                $saved = $portfolio->save();

                if ($saved) {
                    return response()->json(['status' => 1, 'message' => 'Portfolio created successfully.']);
                } else {
                    return response()->json(['status' => 0, 'message' => 'Something went wrong while saving the portfolio.']);
                }
            } else {
                return response()->json(['status' => 0, 'message' => 'Something went wrong while uploading the featured image.']);
            }
        }

    }




}
