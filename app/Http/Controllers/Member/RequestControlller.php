<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\BookRequest;
use Illuminate\Http\Request;

class RequestControlller extends Controller
{
  public function showRequests(Request $request)
  {
    $requests = BookRequest::where('sender_id', auth()->id())
      ->with('book')
      ->with('owner')
      ->when($request->has('type') and $request->input('type'), function ($q) use ($request) {
        $q->where('type', $request->input('type'));
      })
      ->when($request->has('status') and $request->input('status'), function ($q) use ($request) {
        $q->where('status', $request->input('status'));
      })
      ->get();

//    return $requests;
    return view('member.requests.index', compact('requests'));
  }

  public function showRequestsByType(Request $request, $type)
  {
    $requests = BookRequest::where('receiver_id', auth()->id())
      ->where('type', $type)
      ->with('book')
      ->with('sender')
      ->when($request->has('status') and $request->input('status'), function ($q) use ($request) {
        $q->where('status', $request->input('status'));
      })
      ->get();

    return view('member.requests.requests-by-type', compact('requests'));
  }

  public function sentBuyRequest(Request $request, Book $book)
  {
    $data = $request->validate([
      'sender_note' => 'nullable|string|max:1000'
    ]);

    BookRequest::create([
      'book_id' => $book->id,
      'type' => 'Buy',
      'status' => 'Pending',
      'sender_id' => auth()->id(),
      'receiver_id' => $book->owner_id,
      'sender_note' => $data['sender_note']
    ]);

    return back();
  }

  public function sentLendRequest(Request $request, Book $book)
  {
    $data = $request->validate([
      'sender_note' => 'nullable|string|max:1000'
    ]);

    BookRequest::create([
      'book_id' => $book->id,
      'type' => 'Lend',
      'status' => 'Pending',
      'sender_id' => auth()->id(),
      'receiver_id' => $book->owner_id,
      'sender_note' => $data['sender_note']
    ]);

    return back();
  }

  public function cancelRequest(BookRequest $bookRequest)
  {
    $bookRequest->delete();
    return back();
  }

  public function updateRequest(Request $request, BookRequest $bookRequest)
  {
    $data = $request->validate([
      'receiver_note' => 'nullable|string|max:1000',
      'is_free' => 'nullable|boolean',
      'from_date' => 'required|date',
      'to_date' => 'nullable|date|after:from_date',
      'status' => 'nullable|string|in:Accepted,Pending'
    ]);

    $bookRequest->update($data);
    return back();
  }

}
