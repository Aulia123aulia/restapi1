<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\Anggota;
use App\Http\Resources\Anggota as AnggotaResource;
   
class AnggotaController extends BaseController
{

    public function index()
    {
        $anggota = Anggota::all();
        return $this->sendResponse(AnggotaResource::collection($anggota), 'Anggota ditampilkan.');
    }

    
    public function create(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'hp' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $anggota = Anggota::create($input);
        return $this->sendResponse(new AnggotaResource($anggota), 'Data Anggota ditambahkan.');
    }

   
    public function show($id)
    {
        $anggota = Anggota::find($id);
        if (is_null($anggota)) {
            return $this->sendError('Data does not exist.');
        }
        return $this->sendResponse(new AnggotaResource($anggota), 'Data ditampilkan.');
    }
    

    public function update(Request $request, $id)
    {
        $anggota = Anggota::find($id);
        $input = $request->all();
        $validator = Validator::make($input, [
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'hp' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $anggota->nama = $input['nama'];
        $anggota->alamat = $input['alamat'];
        $anggota->email = $input['email'];
        $anggota->status = $input['hp'];
        $anggota->save();
        
        return $this->sendResponse(new AnggotaResource($anggota), 'Data updated.');
    }
   
    public function delete($id)
    {
        $anggota = Anggota::find($id);
        $anggota->delete();
        return $this->sendResponse([], 'Data deleted.');
    }
}