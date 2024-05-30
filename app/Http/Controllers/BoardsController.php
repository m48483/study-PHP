<?php

namespace App\Http\Controllers;

use App\Models\Board;
use Illuminate\Http\Request;

class BoardsController extends Controller
{
    public function index()
    {
        $boards = Board::all();
        return response()->json($boards);
    }

    public function show($id)
    {
        $board = Board::findOrFail($id);
        return response()->json($board);
    }

    public function store(Request $request)
    {
        $board = new Board();
        $board->board_title = $request->input('board_title');
        $board->board_content = $request->input('board_content');
        $board->board_author = $request->input('board_author');
        $board->save();
        return response()->json($board, 201);
    }

    public function update(Request $request, $id)
    {
        $board = Board::findOrFail($id);
        $board->board_title = $request->input('board_title');
        $board->board_content = $request->input('board_content');
        $board->update([
            'board_title' => $board->board_title,
            'board_content' => $board->board_content,
        ]);
        return response()->json($board);
    }

    public function destroy($id)
    {
        Board::destroy($id);
        return response()->json(null, 204);
    }
}
