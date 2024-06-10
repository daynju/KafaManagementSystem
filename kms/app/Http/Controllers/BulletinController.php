<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bulletin;
use Illuminate\Support\Facades\Storage;

class BulletinController extends Controller
{
    public function index()
    {
        $bulletins = Bulletin::all();
        return view('bulletins.index', compact('bulletins'));
    }

    public function create()
    {
        return view('bulletins.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
        ]);

        $bulletin = new Bulletin();
        $bulletin->title = $request->title;
        $bulletin->description = $request->description;

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public');
            $bulletin->image = $path;
        }

        $bulletin->save();

        return redirect()->route('bulletins.index');
    }

    public function edit(Bulletin $bulletin)
    {
        return view('bulletins.edit', compact('bulletin'));
    }

    public function update(Request $request, Bulletin $bulletin)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
        ]);

        $bulletin->title = $request->title;
        $bulletin->description = $request->description;

        if ($request->hasFile('image')) {
            if ($bulletin->image) {
                Storage::disk('public')->delete($bulletin->image);
            }
            $path = $request->file('image')->store('images', 'public');
            $bulletin->image = $path;
        }

        $bulletin->save();

        return redirect()->route('bulletins.index');
    }

    public function destroy(Bulletin $bulletin)
    {
        if ($bulletin->image) {
            Storage::disk('public')->delete($bulletin->image);
        }

        $bulletin->delete();

        return redirect()->route('bulletins.index');
    }

    public function show($id)
    {
    $bulletin = Bulletin::findOrFail($id);
    return view('bulletins.show', compact('bulletin'));
    }

    public function teacherindex()
    {
        $bulletins = Bulletin::all();
        return view('bulletins.teacher_bulletin', compact('bulletins'));
    }
}


