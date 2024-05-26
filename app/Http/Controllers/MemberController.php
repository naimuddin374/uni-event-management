<?php

namespace App\Http\Controllers;

use App\Enums\MemberType;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Enum;
use Illuminate\Support\Facades\File;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::orderBy('id', 'DESC')->get();
        return view('admin.members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.members.create');
    }

    /**
     * Show the form for editing the specified member.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $member = Member::findOrFail($id);  // Find the member or fail with a 404 error
        return view('admin.members.edit', compact('member'));  // Return the edit view with the member data
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'student_id' => 'required|string|max:255|unique:members',
            'session' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:members',
            'phone' => 'required|string|size:11|unique:members',
            'image' => 'image|mimes:png,jpg,jpeg,webp|max:5000',
            'social_link' => 'nullable|string|max:255',
            'member_type' => ['required', new Enum(MemberType::class)],
        ]);
        
        if ($request->hasFile('image')) {
            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('img/members'), $imageName);
            $data['image'] = 'img/members/'.$imageName;
        }

        Member::create($data);

        return redirect()->route('admin.members.index')
            ->with('success', 'Record created successfully');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'student_id' => 'required|string|max:255|unique:members,student_id,' . $id,
            'session' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:members,email,' . $id,
            'phone' => 'required|string|size:11|unique:members,phone,' . $id,
            'image' => 'image|mimes:png,jpg,jpeg,webp|max:5000',
            'social_link' => 'nullable|string|max:255',
            'member_type' => ['required', new Enum(MemberType::class)],
        ]);

        $member = Member::findOrFail($id); // Find the member or fail with a 404 error

        if ($request->hasFile('image')) {
            if ($member->image) {
                File::delete(public_path($member->image));
            }

            $imageName = time().'.'.$request->image->extension();
            $request->image->move(public_path('img/members'), $imageName);
            $data['image'] = 'img/members/'.$imageName;
        }

        // Ensure member_type is properly cast to the enum
        $data['member_type'] = MemberType::from($data['member_type']);

        $member->update($data);

        return redirect()->route('admin.members.index')
            ->with('success', 'Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $member = Member::findOrFail($id);  
        
        if ($member->image) {
            File::delete(public_path($member->image));
        }
        
        $member->delete();

        return redirect()->route('admin.members.index')
            ->with('success', 'Record deleted successfully');
    }
}