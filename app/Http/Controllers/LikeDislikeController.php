<?php

namespace App\Http\Controllers;

use App\Models\likesDislike;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPSTORM_META\type;

class LikeDislikeController extends Controller
{
    public function like($postId)
    {
        $isExist = likesDislike::where('post_id', '=', $postId)->where('user_id', '=', Auth::user()->id)->first();

        if ($isExist) {
            if ($isExist->type == 'like') {
                return back();
            } else {
                likesDislike::where('id', $isExist->id)->update([
                    'type' => 'like',
                ]);
                return back();
            }
            return back();
        } else {
            likesDislike::create([
                'post_id' => $postId,
                'user_id' => Auth::user()->id,
                'type' => 'like',
            ]);

            return back();
        }
    }
    public function dislike($postId)
    {
        $isExist = likesDislike::where('post_id', '=', $postId)->where('user_id', '=', Auth::user()->id)->first();

        if ($isExist) {
            if ($isExist->type == 'dislike') {
                return back();
            } else {
                likesDislike::where('id', $isExist->id)->update([
                    'type' => 'dislike',
                ]);
                return back();
            }
            return back();
        } else {
            likesDislike::create([
                'post_id' => $postId,
                'user_id' => Auth::user()->id,
                'type' => 'dislike',
            ]);

            return back();
        }
    }
}
