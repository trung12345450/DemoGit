<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Issue;
use App\Models\Computer;
use Illuminate\Support\Facades\Log;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issues = Issue::with('computer')->paginate(10);
        return view('issues.index', compact('issues'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'reported_by' => 'required|max:100',
            'reported_date' => 'required|date',
            'urgency' => 'required|in:low,medium,high',
            'status' => 'required|in:open,in progress,resolved',
            'computer_id' => 'required',
        ]);

        Issue::create($request->all());

        return redirect()->route('issues.index')->with('success', 'Issue được tạo thành công!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $computers = Computer::all();
        return view('issues.create', compact('computers'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $issue = Issue::findOrFail($id);
        $computers = Computer::all();
        return view('issues.edit', compact('issue', 'computers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'reported_by' => 'required|max:100',
                'reported_date' => 'required|date',
                'urgency' => 'required|in:low,medium,high',
                'status' => 'required|in:open,in progress,resolved',
                'computer_id' => 'required',
            ]);

            $issue = Issue::findOrFail($id);
            $issue->update($request->all());

            return redirect()->route('issues.index')->with('success', 'Issue được cập nhật thành công!');
        } catch (\Exception $e) {
            Log::error('Error updating issue: ' . $e->getMessage());

            return redirect()->back()
                ->withErrors(['error' => 'Có lỗi xảy ra: ' . $e->getMessage()])
                ->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $issues = Issue::findOrFail($id);
        $issues->delete();

        return redirect()->route('issues.index')->with('success', 'Issue đã được xóa thành công!');
    }
}