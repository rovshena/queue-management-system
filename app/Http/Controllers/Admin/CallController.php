<?php

namespace App\Http\Controllers\Admin;

use App\Events\CallNext;
use App\Http\Controllers\Controller;
use App\Models\Queue;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CallController extends Controller
{
    public function callNext(Request $request)
    {
        $queue = Queue::where('created_at', '>=', Carbon::today())
            ->where('status', 0)
            ->orderBy('id')
            ->first();

        if ($queue) {
            event(new CallNext($request->user(), $queue));
            $queue->update(['status' => 1]);
            return redirect()->route('admin.index')->with('success', __('Nobatdaky raýat çagyryldy.'));
        }

        return back()->with('error', __('Nobatda raýat ýok.'));
    }
}
