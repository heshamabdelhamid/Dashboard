<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::all();

        $news = News::when($request->search, function ($q) use ($request) {

            return $q->where('title', 'like', '%' . $request->search . '%')
                ->orWhere('body', 'like', '%' . $request->search . '%');
        })->when($request->category_id, function ($q) use ($request) {

            return $q->where('category_id', $request->category_id);
        })->paginate(5);

        return view('dashboard.news.index', compact('categories', 'news'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashboard.news.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'min:3|max:255',
            'body' => 'min:3|max:255',
            'image' => 'mimes:jpg,jpeg,png,gif,mp4,mov,ogg ,mp4 ,m3u8 ,ts ,mov,avi ,wmv,3gp|max:3072',
        ]);

        $data = $request->all();

        if ($request->title) {
            $data['title'] = $request->title;
        }

        if ($request->body) {
            $data['body'] = $request->body;
        }

        if ($request->image) {

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/news_images/' . $request->image->hashName()));

            $data['image'] = $request->image->hashName();
        } //end of if
        // dd($data);
        News::create($data);
        return redirect()->route('news.index');
    }

    public function edit($id)
    {
        $news = News::Findorfail($id);
        $categories = Category::all();
        return view('dashboard.news.edit', compact('categories', 'news'));
    }

    public function update(Request $request, $id)
    {
        $news = News::Findorfail($id);

        $request->validate([
            'category_id' => 'required'
        ]);

        $data = $request->all();

        if ($request->image) {

            if ($news->image != '') {

                Storage::disk('public_uploads')->delete('/news_images/' . $news->image);
            } //end of if

            Image::make($request->image)
                ->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })
                ->save(public_path('uploads/news_images/' . $request->image->hashName()));

            $data['image'] = $request->image->hashName();
        } //end of if

        $news->update($data);
        return redirect()->route('news.index');
    } //end of update

    public function destroy($id)
    {
        $news = News::Findorfail($id);

        if ($news->image != '') {

            Storage::disk('public_uploads')->delete('/news_images/' . $news->image);
        } //end of if

        $news->delete();
        return redirect()->route('news.index');
    }
}
