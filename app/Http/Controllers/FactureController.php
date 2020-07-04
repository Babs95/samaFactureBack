<?php

namespace App\Http\Controllers;

use App\Models\Facture;
use App\Service\FactureService;
use Illuminate\Http\Request;
use Mail;
use DB;

class FactureController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  FactureRepository
     * @return void
     */
    public function __construct(FactureService $service)
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


        $users = Facture::all();

       return response()->json($users);



    }
    public function index()
    {
        $data = $this->service->all();
        // foreach($data as &$value){
        //     $value->users;
        // }
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    function create ()
    {
        $Categorie=new Facture();
        $data = $Categorie->all();
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

        $fact=new Facture();
        $fact->libelle = $request->post("libelle");
        $Date = Carbon::now();
        $DateNow = $Date->toDateTime()->format('d/m/yy');
        $fact->datePaiement = $DateNow;
        $fact->montant = $request->post("montant");
        $fact->user_id = $request->post("user_id");
        $fact->fournisseur_id = $request->post("fournisseur_id");
        $fact->typepaiement_id = $request->post("typepaiement_id");
        $fact->annee_id = $request->post("annee_id");
        $fact->mois_id = $request->post("mois_id");
        $fact->save();
       // $Categorie = Categorie::create($request->all());
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
        Facture::destroy($id);
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
    /*public function destroy(User $user)
    {
        $user->delete();

        return response()->json("Suppression effectue avec succes",'204');
    }*/

    function update (Request $request,$id)
    {

        try
            {

                $data['libelle']=$request->post("libelle");

                $res = $this->service->update($data, $id);
                if ($res) {
                    return response()->json($res, '201');
                }
            } catch (\Exception $e) {
                 Log::error($e->getMessage());
                        return response()->json("Une erreur est survenue lors de la modification, Veuiller contacter l'administrateur",'201');
            }

    }

}
