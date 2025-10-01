<?php

namespace App\Http\Controllers;

use App\Models\LearningCenter;
use App\Models\Calendar;
use App\Models\Connection;
use App\Models\LearningCentersCalendar;
use App\Models\LearningCentersConnect;
use App\Models\LearningCentersImage;
use App\Models\Subject;
use App\Models\SubjectsOfLearningCenter;
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
        $subjects = Subject::pluck('name', 'id')->toArray();
        $connections = Connection::pluck('name', 'id')->toArray();
        return view('course.create')->with('days', $days)->with('subjects', $subjects)->with('connections', $connections);
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

        $validated1 = $request->validate([
            'days' => 'nullable|array',
            'days.*.calendar_id' => 'nullable|exists:calendar,id',
            'days.*.open_time'   => 'nullable',
            'days.*.close_time'  => 'nullable',
        ]);


        foreach ($validated1['days'] as $day) {
            LearningCentersCalendar::create([
                'learning_centers_id' => $center->id,
                'calendar_id'        => $day['calendar_id'],
                'open_time'          => $day['open_time'],
                'close_time'         => $day['close_time'],
            ]);
        }

        $validated2 = $request->validate([
            'subjects'             => 'nullable|array',
            'subjects.*.id'        => 'required|exists:subjects,id',
            'subjects.*.price'     => 'nullable|numeric',
        ]);

        if (!empty($validated2['subjects'])) {
            foreach ($validated2['subjects'] as $subject) {
                SubjectsOfLearningCenter::create([
                    'learning_centers_id' => $center->id,
                    'subject_id'          => $subject['id'],
                    'price'               => $subject['price'] ?? null,
                ]);
            }
        }

        
        $validated3 = $request->validate([
            'connections'          => 'nullable|array',
            'connections.*.id'     => 'required|exists:connection,id',
            'connections.*.url'    => 'required|url',
        ]);

        if (!empty($validated3['connections'])) {
            foreach ($validated3['connections'] as $connec) {
                LearningCentersConnect::create([
                    'learning_centers_id' => $center->id,
                    'connection_id'       => $connec['id'],
                    'url'                 => $connec['url'],
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
