<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\Player;
use App\Models\Game;
use App\Models\Post;
use App\Models\Coach;
use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class ClubController extends Controller
{
    public function show($id)
    {
        $club = Club::find($id);
        $player = Player::find($id);
        $game = Game::find($id);

        $games = Game::orderBy('id')
            ->inRandomOrder()
            ->take(5)
            ->get()
            ->sortBy('date');

        $coach = Coach::find($id);
        $team = Team::find($id);
        $post = Post::find($id);

        return view('club.show')
            ->with([
                'club' => $club,
                'player' => $player,
                'team' => $team,
                'coach' => $coach,
                'game' => $game,
                'games' => $games,
                'post' => $post,
            ]);
    }
}