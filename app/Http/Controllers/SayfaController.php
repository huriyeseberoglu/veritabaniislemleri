<?php

namespace App\Http\Controllers;
use Validator;
use Illuminate\Http\Request;
use App\Http\Models\Kitaplar;

class SayfaController extends Controller
{
   public function getIndex()
   {
       $kitaplar=Kitaplar::get();
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
                return redirect() ->route('index');
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
}
