<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.booking.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $book = new Book();
        $book->package_id = $request->package_id;
        $book->user_id = Auth::user()->id;
        $book->fromdate = $request->fromdate;
        $book->todate = $request->todate;
        $book->comment = $request->comment;
        $book->save();
        return redirect()->route('user.dashboard')->with(['successmsg' => 'You are Order Successfully!']);

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function ssd(){
        $book=Book::with('package','user');
        return DataTables::of($book)
        ->filterColumn('package_id',function($query,$keyword){
            $query->whereHas('package',function($q1) use ($keyword){
                $q1->where('name','like','%'.$keyword.'%');
            });
        })
        ->addColumn('package_id', function($each) {
            return $each->package->name;
        })
        ->addColumn('email', function($each) {
            return $each->user->email;
        })
        ->addColumn('status', function($each) {
            switch ($each->status) {
                case '0':
                    return 'Reject';
                case '1':
                    return 'Pending';
                case '2':
                    return 'Success';
                default:
                    return 'Unknown';
            }
        })
        ->addColumn('actions', function ($book) {
            $pending = '<button data-id="' . $book->id . '" class="btn btn-warning btn-sm pending">Pending</button>';
            $confirm =  '<button data-id="' . $book->id . '" class="btn btn-success btn-sm confirm">Confirm</button>';
            $cancel = '<button data-id="' . $book->id . '" class="btn btn-danger btn-sm cancel">Cancel</button>';


            $confirmed =  '<button data-id="' . $book->id . '" class="btn btn-dark btn-sm confirm" disabled>Confirmed</button>';
            $canceled = '<button data-id="' . $book->id . '" class="btn btn-dark btn-sm cancel" disabled>Canceled</button>';
            switch ($book->status) {
                case '0':
                    return $canceled;
                case '2':
                    return $confirmed;
                default:
                    return $pending . ' ' . $confirm . ' ' . $cancel;
            }
        })
        ->rawColumns(['actions'])
        ->make(true);
    }




    public function pending($id) {
        $booking = Book::findOrFail($id);
        $booking->status = '1'; // Assuming '1' is for pending
        $booking->save();

        return response()->json(['success' => 'Booking status updated to pending.']);
    }

    public function confirm($id) {
        $booking = Book::findOrFail($id);
        $booking->status = '2'; // Assuming '0' is for confirmed
        $booking->save();

        return response()->json(['success' => 'Booking status updated to confirmed.']);
    }

    public function cancel($id) {
        $booking = Book::findOrFail($id);
        $booking->status = '0'; // Assuming '2' is for cancelled
        $booking->save();

        return response()->json(['success' => 'Booking status updated to cancelled.']);
    }
}
