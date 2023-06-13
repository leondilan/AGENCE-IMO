<?php

namespace App\Http\Controllers;

use App\Models\BiensImmo;
use App\Models\ImageImmo;
use App\Models\optionsBiens;
use App\Models\OptionsImmo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class imoController extends Controller
{
    public function __construct()
    {
        $this->middleware('lang');
    }

    public function index(){
        $immos=ImageImmo::groupBy('idBiens')->orderBy('created_at','DESC')->limit(4)->get();
        return view('pages.index',compact('immos'));
    }

    public function setLocale($locale){
        if (! in_array($locale, ['en', 'fr'])) {
            abort(400);
        }

        session(['locale' => $locale]);
     
        // App::setLocale($locale);

        return redirect()->back();

        // $redirectUrl = url()->previous();
        // $redirectUrl = str_replace(url('/'),'', $redirectUrl);
        // if ($redirectUrl !== '/') {
        //     $redirectUrl = '/' . $locale . '/';

        //     return Redirect::to($redirectUrl);
        // } else {
        //     $redirectUrl = '/' . $locale . $redirectUrl;

        //     return Redirect::to($redirectUrl);
        // }
    }

    public function manageoptions(){
        $options=OptionsImmo::paginate(5);
        return view('pages.options',compact('options'));
    }

    public function storeoptions(Request $req){
        OptionsImmo::create([
            'nomOption'=>$req->input('nom')
        ]);

        return redirect('/manage-option');
    }

    public function delete(string $id){
        $option=OptionsImmo::findOrFail($id);
        $option->delete();
        return redirect('/manage-option');
    }

    public function update(Request $req,string $id){
        $option=OptionsImmo::findOrFail($id);
        $option->update([
            'nomOption'=>$req->input('nom')
        ]);
        return redirect('/manage-option');
    }

    public function addBiens(){
        $options=OptionsImmo::all();
        return view('pages.addbien',compact('options'));
    }

    public function storebiens(Request $req){
        $validator = Validator::make($req->all(), [
            'titre' => 'required|min:3',
            'surface' => 'required',
            'prix' => 'required',
            'comment' => 'required|min:20',
            'chambre' => 'required',
            'addres' => 'required',
            'ville' => 'required',
            'piece' => 'required',
            'options' => 'required',
            'file' => 'required',
        ]);
 
        if ($validator->fails()) {
            return redirect('/addBiens')
            ->withErrors($validator)
            ->withInput();
        }else {
            BiensImmo::create([
                'titre' => $req->input('titre'),
                'surface' => $req->input('surface'),
                'prix' => $req->input('prix'),
                'description' => $req->input('comment'),
                'chambre' =>  $req->input('chambre'),
                'addresses' => $req->input('addres'),
                'ville' => $req->input('ville'),
                'piece' => $req->input('piece'),
                'idUser' => Auth::user()->id
            ]);

            $id=BiensImmo::orderBy('id', 'desc')->first();

            foreach ($req->input('options') as $key) {
                optionsBiens::create([
                    'idBiens'=>$id->id,
                    'idOpt'=>$key
                ]);
            }

            foreach ($req->file('file') as $key) {
                $file = $key;
 
                $name = time().$file->getClientOriginalName();

                ImageImmo::create([
                    'nomImage'=>$name,
                    'idBiens'=>$id->id,
                ]);

                $destination='imagesBiens';

                $file->move($destination,$name);
            }

            return redirect('/home');
        }
    }

    public function deletebien(string $id){
        $bien=BiensImmo::findOrFail($id);
        $bien->delete();
        return redirect('/home');
    }

    public function updatebien(string $id){
        $bien=BiensImmo::findOrFail($id);
        $options=OptionsImmo::all();
        $images=ImageImmo::where('idBiens',$id)->limit(2)->get();
        return view('pages.updateBien',compact('bien','options','images'));
    }

    public function delImg(string $id){
        $image=ImageImmo::findOrfail($id);
        session()->put('id',$image->idBiens);
        $image->delete();
        return redirect("/updatebien/".session()->get('id'));
    }

    public function storeupdatebien(Request $req,string $id){
        $validator = Validator::make($req->all(), [
            'titre' => 'required|min:3',
            'surface' => 'required',
            'prix' => 'required',
            'comment' => 'required|min:20',
            'chambre' => 'required',
            'addres' => 'required',
            'ville' => 'required',
            'piece' => 'required',
            'options' => 'required',
        ]);
 
        if ($validator->fails()) {
            return redirect("/updatebien/$id")
            ->withErrors($validator)
            ->withInput();
        }else {
            $bien=BiensImmo::findOrFail($id);
            $bien->update([
                'titre' => $req->input('titre'),
                'surface' => $req->input('surface'),
                'prix' => $req->input('prix'),
                'description' => $req->input('comment'),
                'chambre' =>  $req->input('chambre'),
                'addresses' => $req->input('addres'),
                'ville' => $req->input('ville'),
                'piece' => $req->input('piece')
            ]);

            $options=optionsBiens::where('idBiens',$id)->get();

            foreach ($options as $option) {
                $option->delete();
            }

            foreach ($req->input('options') as $key) {
                optionsBiens::create([
                    'idBiens'=>$id,
                    'idOpt'=>$key
                ]);
            }

            if ($req->file('file')!==null) {
                foreach ($req->file('file') as $key) {
                    $file = $key;
     
                    $name = time().$file->getClientOriginalName();
    
                    ImageImmo::create([
                        'nomImage'=>$name,
                        'idBiens'=>$id,
                    ]);
    
                    $destination='imagesBiens';
    
                    $file->move($destination,$name);
                }
            }

            return redirect('/home');
        }
    }

    public function ourpropertie(){
        $images=ImageImmo::groupBy('idBiens')->paginate(10);
        return view('pages.ourpropertie',compact('images'));
    }

    public function getBien($id){
        App::setLocale(session()->get('locale'));
        $images=ImageImmo::where('idBiens',$id)->get();
        $options=optionsBiens::join('options_immos', 'options_immos.id', '=', 'options_biens.idOpt')
        ->where("options_biens.idBiens",$id)
        ->get();
        $biens=BiensImmo::where('id',$id)->first();

        return view('pages.getbien',compact('images', 'options',"biens"));
    }

    public function sendSms(Request $req,string $id){
        //App::setLocale(session()->get('locale'));
        $validator = Validator::make($req->all(), [
            'prenom' => 'required',
            'nom' => 'required',
            'tel' => 'required',
            'email' => 'required|email',
            'comment' => 'required|min:20',
        ]);
 
        if ($validator->fails()) {
            return redirect("/getBien/$id")
                        ->withErrors($validator)
                        ->withInput();
        }
    }
}
