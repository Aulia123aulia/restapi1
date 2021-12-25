<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Validator;
use App\Models\DaftarBuku;
use App\Http\Resources\DaftarBuku as DaftarBukuResource;
   
class DaftarBukuController extends BaseController
{

    public function index()
    {
        $daftarbuku = DaftarBuku::all();
        return $this->sendResponse(DaftarBukuResource::collection($daftarbuku), 'Buku ditampilkan.');
    }

    
    public function create(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'kode' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'tahun' => 'required',
            'deskripsi' => 'required',
            'stock' => 'required'
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }
        $daftarbuku = DaftarBuku::create($input);
        return $this->sendResponse(new DaftarBukuResource($daftarbuku), 'Data buku ditambahkan.');
    }

   
    public function show($id)
    {
        $daftarbuku = DaftarBuku::find($id);
        if (is_null($daftarbuku)) {
            return $this->sendError('Data does not exist.');
        }
        return $this->sendResponse(new DaftarBukuResource($daftarbuku), 'Data ditampilkan.');
    }
    

    public function update(Request $request, $id)
    {
        $daftarbuku = DaftarBuku::find($id);
        $input = $request->all();
        $validator = Validator::make($input, [
            'kode' => 'required',
            'judul' => 'required',
            'pengarang' => 'required',
            'tahun' => 'required',
            'deskripsi' => 'required',
            'stock' => 'required'
        ]);

        if($validator->fails()){
            return $this->sendError($validator->errors());       
        }

        $daftarbuku->kode = $input['kode'];
        $daftarbuku->judul = $input['judul'];
        $daftarbuku->pengarang = $input['pengarang'];
        $daftarbuku->tahun = $input['tahun'];
        $daftarbuku->deskripsi = $input['deskripsi'];
        $daftarbuku->status = $input['stock'];
        $daftarbuku->save();
        
        return $this->sendResponse(new DaftarBukuResource($daftarbuku), 'Data updated.');
    }
   
    public function delete($id)
    {
        $daftarbuku = DaftarBuku::find($id);
        $daftarbuku->delete();
        return $this->sendResponse([], 'Data deleted.');
    }
}