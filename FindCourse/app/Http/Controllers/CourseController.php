<?php

namespace App\Http\Controllers;

use App\Models\LearningCenter;
use App\Models\Calendar;
use App\Models\LearningCentersImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $centers = LearningCenter::with(['user'])->latest()->paginate(6);
        return view('pages.blog-grid', compact('centers'));
    }

    public function create()
    {   
        $days = Calendar::pluck('weekdays')->toArray();
        return view('course.create')->with('days', $days);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'logo'         => 'nullable|image|max:2048',
            'name'         => 'required|string|max:255',
            'type'         => 'string|max:255',
            'about'        => 'string',
            'province'     => 'string|max:255',
            'region'       => 'string|max:255',
            'address'      => 'string|max:255',
            'location'     => 'string|max:255',
            'student_count' => 'integer',
        ]);

        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('uploads/logos', 'public');
            $validated['logo'] = $path;
        }

        $validated['users_id'] = Auth::id();

        $center = LearningCenter::create($validated);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $path = $image->store('uploads/centers', 'public');
                LearningCentersImage::create([
                    'learning_centers_id' =>  $center->id,
                    'image' => $path,
                ]);
            }
        }

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
