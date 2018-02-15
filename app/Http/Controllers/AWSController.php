<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AWSController extends Controller
{
    private $disk;

    function __construct()
    {
        $this->disk = Storage::disk('s3');
    }

    public function getArquivos()
    {
        $arquivos = [];
        foreach ($this->disk->files() as $value) {
            $arquivos[] = [
                'nome' => $value,
                'url' => $this->disk->url($value)
            ];
        }

        return $arquivos;
    }

    public function upload($alert = null)
    {
        $dados['arquivos'] = $this->getArquivos();

        return view('aws')->with('dados', $dados);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file->isValid()) {
            $this->disk->put(
                $request->file->getClientOriginalName(),
                file_get_contents($request->file->path()),
                'public'
            );
            $dados['alert'] = true;
            $dados['arquivos'] = $this->getArquivos();
            return view('aws')->with('dados', $dados);
        } else {
            $dados['alert'] = false;
            $dados['arquivos'] = $this->getArquivos();
            return view('upload')->with('dados', $dados);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
