<?php

namespace App\Http\Controllers;

use App\Models\LearningCenter;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $centers = LearningCenter::with(['user'])->latest()->paginate(6);
        return view('pages.blog-grid', compact('centers'));
    }

    public function create()
    {
        return view('learning_center.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'logo'         => 'nullable|image|max:2048',
            'name'         => 'required|string|max:255',
            'type'         => 'nullable|string|max:255',
            'about'        => 'nullable|string',
            'province'     => 'nullable|string|max:255',
            'region'       => 'nullable|string|max:255',
            'address'      => 'nullable|string|max:255',
            'location'     => 'nullable|string|max:255',
            'usersId'      => 'required|exists:users,id',
            'studentCount' => 'nullable|integer',
        ]);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            $validated['logo'] = $path;
        }

        $center = LearningCenter::create($validated);

        return redirect()->route('blog-single', $center->id)
                         ->with('success', 'O‘quv markaz muvaffaqiyatli qo‘shildi.');
    }

    public function show($id)
    {
        $center = LearningCenter::with([
            'user',
            'images',
            'subjects',
            'comments',
            'calendar',
            'teachers',
            'favorites',
            'connections',
            'needTeachers'
        ])->findOrFail($id);

        return view('pages.blog-single', compact('center'));
    }

   
    public function edit($id)
    {
        $center = LearningCenter::findOrFail($id);
        return view('course.edit', compact('center'));
    }

   
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'logo'         => 'nullable|image|max:2048',
            'name'         => 'required|string|max:255',
            'type'         => 'nullable|string|max:255',
            'about'        => 'nullable|string',
            'province'     => 'nullable|string|max:255',
            'region'       => 'nullable|string|max:255',
            'address'      => 'nullable|string|max:255',
            'location'     => 'nullable|string|max:255',
            'usersId'      => 'required|exists:users,id',
            'studentCount' => 'nullable|integer',
        ]);

        $center = LearningCenter::findOrFail($id);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('logos', 'public');
            $validated['logo'] = $path;
        }

        $center->update($validated);

        return redirect()->route('blog-single', $center->id)
                         ->with('success', 'O‘quv markaz muvaffaqiyatli yangilandi.');
    }

    public function destroy($id)
    {
        $center = LearningCenter::findOrFail($id);
        $center->delete();

        return redirect()->route('pages.index')
                         ->with('success', 'O‘quv markaz o‘chirildi.');
    }
}
