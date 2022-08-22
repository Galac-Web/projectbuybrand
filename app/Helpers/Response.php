<?php

namespace App\Helpers;

class Response
{
    public static function message(string $message, bool $json = false)
    {
        return $json
            ? response()->json(['status' => 'success', 'message' => $message])
            : redirect()->back()->with('success', $message);
    }
}
