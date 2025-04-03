<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class portfoliocontroller extends Controller
{
    // Show Add Portfolio Form
    public function addPortfolio(Request $request)
    {
        return view('back.page.add_portfolio', ['pageTitle' => 'Add Portfolio']);
    }

    // Create a New Portfolio
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

        if ($request->hasFile('featured_image')) {
            $path = "images/portfolios/";
            $file = $request->file('featured_image');
            $new_filename = time() . '_' . $file->getClientOriginalName();

            // Upload featured image
            if ($file->move(public_path($path), $new_filename)) {
                $resized_path = $path . 'resized/';

                if (!File::isDirectory(public_path($resized_path))) {
                    File::makeDirectory(public_path($resized_path), 0777, true, true);
                }

                Image::make(public_path($path . $new_filename))->fit(250, 250)
                    ->save(public_path($resized_path . 'thumb_' . $new_filename));
                Image::make(public_path($path . $new_filename))->fit(512, 320)
                    ->save(public_path($resized_path . 'resized_' . $new_filename));

                $portfolio = new Portfolio([
                    'author_id' => Auth::id(),
                    'title' => $request->title,
                    'featured_image' => $new_filename,
                    'overview' => $request->overview,
                    'strategy' => $request->strategy,
                    'project_type' => $request->project_type,
                    'client' => $request->client,
                    'content' => $request->content,
                    'project_challenge' => $request->project_challenge,
                    'design_research' => $request->design_research,
                    'design_approach' => $request->design_approach,
                    'the_solution' => $request->the_solution,
                ]);

                return response()->json(['status' => $portfolio->save() ? 1 : 0, 'message' => $portfolio->save() ? 'Portfolio created successfully!' : 'Failed to save portfolio.']);
            }
            return response()->json(['status' => 0, 'message' => 'Failed to upload featured image.']);
        }
    }

    // Show Edit Portfolio Form
    public function editPortfolio(Request $request, $id)
    {
        return view('back.page.edit_portfolio', [
            'pageTitle' => 'Edit Portfolio',
            'portfolio' => Portfolio::findOrFail($id),
        ]);
    }

    // Update Portfolio
    public function updatePortfolio(Request $request)
    {
        $portfolio = Portfolio::findOrFail($request->portfolio_id);
        $featured_image_name = $portfolio->featured_image;

        $request->validate([
            'title' => 'required|unique:portfolios,title,' . $portfolio->id,
            'featured_image' => 'nullable|mimes:png,jpg,jpeg|max:1024',
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

        if ($request->hasFile('featured_image')) {
            $old_featured_image = $portfolio->featured_image;
            $path = "images/portfolios/";
            $file = $request->file('featured_image');
            $new_filename = time() . '_' . $file->getClientOriginalName();

            if ($file->move(public_path($path), $new_filename)) {
                $resized_path = $path . 'resized/';
                if (!File::isDirectory($resized_path)) {
                    File::makeDirectory($resized_path, 0777, true, true);
                }
                Image::make($path . $new_filename)->fit(250, 250)
                    ->save($resized_path . 'thumb_' . $new_filename);
                Image::make($path . $new_filename)->fit(512, 320)
                    ->save($resized_path . 'resized_' . $new_filename);

                if ($old_featured_image && File::exists(public_path($path . $old_featured_image))) {
                    File::delete(public_path($path . $old_featured_image));
                    File::delete(public_path($path . 'resized_' . $old_featured_image));
                    File::delete(public_path($path . 'thumb_' . $old_featured_image));
                }
                $featured_image_name = $new_filename;
            } else {
                return response()->json(['status' => 0, 'message' => 'Failed to upload new featured image.']);
            }
        }

        $portfolio->update([
            'title' => $request->title,
            'featured_image' => $featured_image_name,
            'overview' => $request->overview,
            'strategy' => $request->strategy,
            'project_type' => $request->project_type,
            'client' => $request->client,
            'content' => $request->content,
            'project_challenge' => $request->project_challenge,
            'design_research' => $request->design_research,
            'design_approach' => $request->design_approach,
            'the_solution' => $request->the_solution,
        ]);

        return response()->json(['status' => 1, 'message' => 'Portfolio updated successfully!']);
    }

    // Show All Portfolios
    public function allPortfolios(Request $request)
    {
        return view('back.page.all_portfolio', ['pageTitle' => 'All Portfolios']);
    }
}
