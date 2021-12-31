<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UpdateTest extends Controller
{
    public $nav;
    public function __construct()
    {
        $this->nav = [
            [
                'title' => 'Test',
                'link' => url('/admin/inkubasi/test')
            ]
        ];
    }
    public function index(Test $test)
    {
        if ($test == null) {
            abort(404);
        }

        array_push($this->nav,[
            'title' => 'Update Test',
            'link' => url('/admin/inkubasi/test')
        ]);

        return view('admin.update-test', [
            'title' => 'Update Test',
            'nav' => $this->nav,
            'test' => $test
        ]);
    }

    public function update(Request $request, Test $test)
    {
        if (!$test)
            abort(404);

        if ($request->get('submit') == 'update') {
            $request->validate([
                'id_course' => 'required|numeric|min:1|max:4',
                'sesi' => 'required|numeric|min:0|max:5',
                'soal' => 'required',
                'tipe' => 'required',
                'opsi1' => 'required',
                'jawaban' => 'required',
                'file' => 'mimetypes:audio/mpeg|max:10240'
            ]);

            $data = $request->only(['id_course', 'sesi', 'soal', 'tipe', 'opsi1', 'opsi2', 'opsi3', 'opsi4', 'jawaban', 'teks']);

            if ($request->hasFile('file') and  $request->file('file')->isValid()) {
                if ($test->file) {
                    Storage::delete("$test->file");
                }
                $name = time() . Str::random(10) . $request->file('file')->getClientOriginalName();
                $course = config('app.allCourse.' . $request->get('id_course'));
                $sesi = config('app.allSesi')[$request->get('sesi') - 1];
                $path = $request->file('file')->storeAs("$course/$sesi", $name, 'public');
                $data['file'] = $path;
            }
            foreach($data as $key => $value){
                $test->$key = $value;
            }
            if($test->save()){
                return redirect('/admin/inkubasi/test');
            }
        } else if ($request->get('submit') == 'delete') {
            if($test->file){
                Storage::delete($test->file);
            }
            $test->delete();
            return redirect(url('/admin/inkubasi/practice'));
        }
        abort(500);
    }
}
