<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Practice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UpdatePractice extends Controller
{
    public $nav;
    public function __construct()
    {
        $this->nav = [
            [
                'title' => 'Update Practice',
                'link' => url('/admin/inkubasi/practice')
            ]
        ];
    }
    public function index(Practice $practice)
    {
        if ($practice == null) {
            abort(404);
        }

        return view('admin.update-practice', [
            'title' => 'Update Practice',
            'nav' => $this->nav,
            'practice' => $practice
        ]);
    }
    public function update(Request $request, Practice $practice)
    {
        if (!$practice)
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
                if ($practice->file) {
                    Storage::delete("$practice->file");
                }
                $name = time() . Str::random(10) . $request->file('file')->getClientOriginalName();
                $course = config('app.allCourse.' . $request->get('id_course'));
                $sesi = config('app.allSesi')[$request->get('sesi') - 1];
                $path = $request->file('file')->storeAs("$course/$sesi", $name, 'public');
                $data['file'] = $path;
            }
            foreach($data as $key => $value){
                $practice->$key = $value;
            }
            if($practice->save()){
                return redirect('/admin/inkubasi/practice');
            }
        } else if ($request->get('submit') == 'delete') {
            if($practice->file){
                Storage::delete($practice->file);
            }
            $practice->delete();
            return redirect(url('/admin/inkubasi/practice'));
        }
        abort(500);
    }
}
