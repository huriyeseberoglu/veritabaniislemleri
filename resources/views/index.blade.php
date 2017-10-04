<title> Proje1</title>
<link rel="stylesheet" href="/css/app.css">

<br><br>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading"> <h2>Kitap Listesi</h2> </div>
        <div class="panel-body">
            <h3>Kayıtlı Kitaplar</h3>
            <br>
            <table class="table table-bordered">
                <tr>
                    <th>Kitap Adı</th>
                    <th>Kitap Türü</th>
                    <th>Kitap Sayfa Sayısı</th>
                    <th>İşlemler</th>
                </tr>
                @foreach($kitapliste as $kitap)
                <tr>
                    <td>{{$kitap->kitap_adi}}</td>
                    <td>{{$kitap->kitap_turu}}</td>
                    <td>{{$kitap->kitap_sayfa}}</td>
                    <td><a href="{{url('/sil'.$kitap->id)}}">Sil</a> - <a href="{{url('/guncelle'.$kitap->id)}}">Güncelle</a></td>
                </tr>
                @endforeach
            </table>
            @if(isset($kitapguncelle))
                <form class="form-horizontal" action="{{url('/guncelle')}}" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="kitapid" value="{{$kitapguncelle->id}}" >
                    <h3> Kitap Kaydetmek için Formu Doldurun</h3>
                    <br>
                    <div class="form-group">
                        <label class="col-md-4"> Kitap Adı</label>
                        <div class="col-md-4">
                            <input type="text" name="kitapadi" class="form-control" value="{{$kitapguncelle->kitap_adi}}">
                        </div>
                        @if($errors->has('kitapadi'))
                            {{$errors->first('kitapadi')}}
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="col-md-4"> Kitap Türü</label>
                        <div class="col-md-4">
                            <input type="text" name="kitapturu" class="form-control" value="{{$kitapguncelle->kitap_turu}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4"> Kitap Sayfası</label>
                        <div class="col-md-4">
                            <input type="text" name="kitapsayfa" class="form-control" value="{{$kitapguncelle->kitap_sayfa}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-md-4 col-md-offset-4">
                            <input type="submit" name="guncelle" class="btn btn-primary" value="Güncelle">
                        </div>
                    </div>

                </form>
            @else
            <form class="form-horizontal" action="{{url('/kaydet')}}" method="post">
              {{ csrf_field() }}
                <h3> Kitap Kaydetmek için Formu Doldurun</h3>
                <br>
                <div class="form-group">
                    <label class="col-md-4"> Kitap Adı</label>
                    <div class="col-md-4">
                        <input type="text" name="kitapadi" class="form-control">
                    </div>
                    @if($errors->has('kitapadi'))
                        {{$errors->first('kitapadi')}}
                    @endif
                </div>

                <div class="form-group">
                    <label class="col-md-4"> Kitap Türü</label>
                    <div class="col-md-4">
                        <input type="text" name="kitapturu" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-4"> Kitap Sayfası</label>
                    <div class="col-md-4">
                        <input type="text" name="kitapsayfa" class="form-control">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-4 col-md-offset-4">
                        <input type="submit" name="kaydet" class="btn btn-primary" value="Kaydet">
                    </div>
                </div>

            </form>
                @endif
        </div>
    </div>
</div>