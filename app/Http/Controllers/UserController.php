<?php

namespace App\Http\Controllers;

use App\Helpers\Media;
use App\Http\Requests\AvatarUploadRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index');
    }

    public function avatar(AvatarUploadRequest $request): \Illuminate\Http\JsonResponse
    {
        /** @var \App\Models\User */
        $user = auth()->user();
        $collection = 'avatar';

        try {
            Media::toCollection($user, $request->crop, $collection);

            return response()->json([
                'sizes' => Media::getThumbs($user->getFirstMedia($collection))
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => true], 500);
        }
    }
}
