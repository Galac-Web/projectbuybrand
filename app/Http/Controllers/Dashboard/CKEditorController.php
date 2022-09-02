<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Validation\Factory as Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Stringable;

class CKEditorController extends Controller
{
    public function upload(Request $request, Validator $validator)
    {
        $v = $validator->make($request->all(), [
            'folder' => 'nullable|string',
            'upload' => 'required|image',
        ]);

        $CKEditorFuncNum = $request->input('CKEditorFuncNum');

        if ($v->fails()) {
            return response("<script>window.parent.CKEDITOR.tools.callFunction({$CKEditorFuncNum}, '', '{$v->errors()->first()}');</script>");
        }

        $path = (string) Str::of('editor')
            ->when($request->has('folder'), fn (Stringable $str) => $str->finish('/' . $request->folder))
            ->start('/');

        $path = $request->file('upload')->store($path, 'public');

        $url = storage_url($path);

        return response("<script>window.parent.CKEDITOR.tools.callFunction({$CKEditorFuncNum}, '{$url}', 'Изображение успешно загружено');</script>");
    }
}
