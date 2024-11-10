<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $restaurants = Book::where('user_id', $request->user()->id)->get();

        return response()->json([
            'status' => true,
            'data' => $restaurants,
        ], 200);
    }

    public function store(Request $request)
    {
        try {
            Book::create($request->merge(['user_id' => $request->user()->id])->all());

            return response()->json([
                'status' => true,
                'message' => "Successful book restaurant",
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Failed book restaurant'
                // 'message' => $th->getMessage()
            ], 500);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $book = Book::find($request->input('id'));
            $book->delete();

            return response()->json([
                'status' => true,
                'message' => "Successful cancel booking",
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => 'Error something happened '
            ], 500);
        }
    }
}
