<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Http\Models\Kitaplar;

class SayfaController extends Controller
{
   public function getIndex()
   {
       $kitaplar=Kitaplar::whereRaw('id!=? and kitap_sayfa>?',array(0,10))->get();
       return view('index',array('kitapliste'=>$kitaplar));
   }

    public function postKaydet(Request $request)
    {
        $kontrol= Validator::make($request->all(),array(
            'kitapadi' =>'required|min:4',
            'kitapturu' =>'required',
            'kitapsayfa' =>'numeric'
        ));
        if ($kontrol->fails())
        {
            return redirect()-> to('/')->withErrors($kontrol)->withInput();
        }
        else
        {
            $kitapadi= $request->input('kitapadi');
            $kitapturu= $request->input('kitapturu');
            $kitapsayfa= $request->input('kitapsayfa');

            $kaydet = Kitaplar::create(array(
                'kitap_adi' => $kitapadi,
                'kitap_turu' => $kitapturu,
                'kitap_sayfa' => $kitapsayfa
            ));
            if ($kaydet)
            {
                return  "Kitap Adı: ".$kitapadi."<br>"."<br>"."Kitap Türü: ".$kitapturu."<br>"."<br>"."Kitap Sayfası: ".$kitapsayfa;
            }
        }
    }

    public function getSil($id=0)
    {
      if ($id!=0)
      {
         $kitapsil=Kitaplar::where('id','=',$id)->delete();
          if ($kitapsil)
          {
              return redirect()->route('index');
          }
          else
          {
              return null;
          }
      }
        else
        {
            return null;
        }
    }

    public function getGuncelle($id=0)
    {
        $kitaplar=Kitaplar::whereRaw('id!=? and kitap_sayfa>?',array(0,10))->get();
        $kitap=Kitaplar::whereRaw('id=?', array($id))->first();
        return view('index',array('kitapliste'=>$kitaplar,'kitapguncelle'=>$kitap));
    }

    public function postGuncelle(Request $request)
    {
        $kontrol= Validator::make($request->all(),array(
            'kitapadi' =>'required|min:4',
            'kitapturu' =>'required',
            'kitapsayfa' =>'numeric'
        ));
        if ($kontrol->fails())
        {
            return redirect()-> to('/')->withErrors($kontrol)->withInput();
        }
        else {
            $kitapid = $request->input('kitapid');
            $kitapadi = $request->input('kitapadi');
            $kitapturu = $request->input('kitapturu');
            $kitapsayfa = $request->input('kitapsayfa');
            $kitap=Kitaplar::find($kitapid);

            $kitap->kitap_adi=$kitapadi;
            $kitap->kitap_turu=$kitapturu;
            $kitap->kitap_sayfa=$kitapsayfa;
            $kitap->save();
            return redirect()->route('index');
        }
    }
}
