<?php
namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class GroupController extends Controller
{
    /**
     * Display a listing of groups
     */
    public function index(): View
    {
        $groups = Group::orderBy('created_at', 'desc')->paginate(10);
        return view('groups.index', compact('groups'));
    }

    /**
     * Show the form for creating a new group
     */
    public function create(): View
    {
        return view('groups.create');
    }

    /**
     * Store a newly created group in storage
     */
    public function store(Request $request)
    {
        $request->validate([
            'group_name' => 'required|string|max:255|unique:groups,name',
            'description' => 'nullable|string|max:500'
        ]);

        try {
            Group::create([
                'name' => $request->group_name,
                'description' => $request->description,
                'status' => 'active'
            ]);

            // return redirect()->route('contacts.index')
                // ->with('success', 'Group created successfully!');
                return response()->json([
                'success' => true,
                'message'=> "group create successful",
            ], 200);
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to create group. Please try again.')
                ->withInput();
        }
    }

    /**
     * Display the specified group
     */
    public function show(Group $group): View
    {
        return view('groups.show', compact('group'));
    }

    /**
     * Show the form for editing the specified group
     */
    public function edit(Group $group): View
    {
        return view('groups.edit', compact('group'));
    }

    /**
     * Update the specified group in storage
     */
    public function update(Request $request, Group $group): RedirectResponse
    {
        $request->validate([
            'group_name' => 'required|string|max:255|unique:groups,name,' . $group->id,
            'description' => 'nullable|string|max:500'
        ]);

        try {
            $group->update([
                'name' => $request->group_name,
                'description' => $request->description
            ]);

            return redirect()->route('groups.index')
                ->with('success', 'Group updated successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to update group. Please try again.')
                ->withInput();
        }
    }

    /**
     * Remove the specified group from storage
     */
    public function destroy(Group $group): RedirectResponse
    {
        try {
            $group->delete();
            return redirect()->route('groups.index')
                ->with('success', 'Group deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Failed to delete group. Please try again.');
        }
    }
}
