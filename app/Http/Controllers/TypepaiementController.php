<?php

namespace App\Http\Controllers;

use App\Models\Typepaiement;
use App\Service\TypepaiementService;
use Illuminate\Http\Request;
use Mail;
use DB;

class TypepaiementController  extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  TypepaiementRepository
     * @return void
     */
    public function __construct(TypepaiementService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getall()
    {

        //$users = Typepaiement::all();
        $data = $this->service->all();
        if(empty($data)){
            $response["success"] = 0;
            return  $response;
        } else {
            $response["success"] = 1;
            $response["TypePaiement"] = $data;

            return  $response;
            //return response()->json($response);
        }
        return response()->json($response);

    }
    public function index()
    {
        $data = $this->service->all();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    function create ()
    {
        $User=new Typepaiement();
        $data = $User->all();
         return response()->json($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

         $type=new Typepaiement();
         $type->libelle=$request->post("libelle");
       // $type = Typepaiement::create($request->all());
         $type->save();

        return response()->json('Added succesfully');
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
     $data= $this->service->find($id);
        return response()->json($data, '200');
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
    function destroy ($id)
    {

        //$user=User::findorfail($id);
        Typepaiement::destroy($id);
        return response()->json("delete avec succes",'204');
        try{
           // $user= request()->user();
            $res = $this->service->delete($id);
            //$user->delete();
            return response()->json("Suppression effectue avec succes",'204');
        } catch (\Exception $e) {
             Log::error($e->getMessage());
             return response()->json("Une erreur est survenue lors de la modification, Veuiller contacter l'administrateur",'201');
        }

    }

}
