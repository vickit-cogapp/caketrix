<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Vote;
use App\Cake;

/**
 * Class VoteController
 * @package App\Http\Controllers
 */
class VoteController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request) {
      $this->validate($request, [
          'vote' => 'required|numeric|max:10|min:0',
      ]);

      $vote = Vote::where('cake_id', '=', $request['cake_id'])
                    ->where('user_id', '=', Auth::id())
                    ->first();

      if ($vote === null) {
        Vote::create([
          'cake_id' => $request['cake_id'],
          'user_id' => Auth::id(),
          'vote' => $request['vote']
        ]);
      } else {
        $vote->vote = $request['vote'];
        $vote->save();
      }

      Cake::find($request['cake_id'])->updateVotes();

      return redirect('/cakes')->with('success', 'New cake added.');
    }
}
