<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Service\UserService;
use Illuminate\Http\Request;
use Mail;
use DB;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @param  UserRepository
     * @return void
     */
    public function __construct(UserService $service)
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

        //$users = User::all();
        $data = $this->service->all();
        return response()->json($data);

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
        $User=new User();
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

         $user=new User();
        $user = User::create($request->all());
        $user->save();

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
        User::destroy($id);
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
    public function sendEmail()
    {
        $email = 'babsco95@gmail.com';
        // $contactName = 'Babacar NDIAYE';
        // $data = array( 'email'=>$email, 'name'=>$contactName);
        Mail::raw('Hi, welcome user!', function ($message)  use ($email)  {
            $message->to($email)->subject('Tuts Make Mail');
            $message->attach('G:\bulletin.pdf');
          });

        if (Mail::failures()) {
           return response()->Fail('Sorry! Please try again latter');
         }else{
           return response()->success('Great! Successfully send in your mail');
         }
    }

    public function GetLogin($login, $password) {
        $qry = "SELECT id,login,password,nom,prenom,email
        FROM users WHERE login = '".$login."'  AND password = '".$password."' ";
        $data = DB::select($qry);
        //if ($data)
        $response["users"] = $data;
        $response["success"] = 1;
        return response()->json($response);
        //return response()->json($data, '200');
    }


    public function UpdatePassword($idUser, $newpassword)
    {
        $qry = 'UPDATE users SET etat = 1, password = "' . $newpassword . '"
                    WHERE id = "' . $idUser . '" ';
        DB::update($qry);
        return response()->json('Update succesfully');
    }
    public function GetUserProfil() {
        $qry = 'SELECT u.id,u.login,u.cni,p.libelle as profil
        FROM users u, profils p WHERE u.profil_id = p.id ';
        $data = DB::select($qry);
        return response()->json($data, '200');
    }

    public function GetUser() {
        //$qry = 'SELECT * FROM users ';
        //$data = DB::select($qry);

        $qry = "SELECT u.id,u.login,u.password,e.nom,e.prenom,p.libelle as profil,f.libelle as fonction
        FROM users u,profils p,employes e,fonctions f WHERE u.id = e.user_id AND  f.id = e.fonction_id AND p.id = u.profil_id
        AND u.login = 'babs95'  AND u.password = 'passer' ";
        $data = DB::select($qry);

        // $data = DB::table('users')->first();
        return response()->json($data, '200');
    }

    public function GetOneUserProfil($id)
    {
        $qry = 'SELECT u.id,u.login,u.cni,u.email,u.tel,u.nom,u.prenom,u.cni,u.datenaissance,u.sexe,p.libelle as profil
        FROM users u, profils p WHERE u.profil_id = p.id AND u.id = "' . $id . '" ';
        $data = DB::select($qry);
        return response()->json($data, '200');
    }
}
