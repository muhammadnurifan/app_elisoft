@extends('layouts.master')
@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0"></h1>
                
            </div>
        </div>
    </div>
</div>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Terbilang</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="#" method="POST">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Input Angka</label>
                                        <input name="angka" type="text" id="angka" class="form-control" value="" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div id="out"></div>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
    </div>
</<section>
@endsection

@section('footer')
<script>
    $(document).ready(function() {
        $('#angka').keyup(function() {
            var angkas = $("#angka").val();
            $("#out").html(terbilang(angkas));
        });
    });
    function terbilang(angka) {
        var bil = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh"];
        if(angka < 12) {
            return bil[angka];
        } else if(angka < 20) {
            return terbilang(angka-10)+" belas";
        } else if(angka < 100) {
            return terbilang(Math.floor(parseInt(angka)/10))+" puluh "+terbilang(parseInt(angka)%10);
        } else if(angka < 200) {
            return "seratus "+terbilang(parseInt(angka)-100);
        } else if(angka < 1000) {
            return terbilang(Math.floor(parseInt(angka)/100))+" ratus "+terbilang(parseInt(angka)%100);
        } else if(angka < 2000) {
            return "seribu "+terbilang(parseInt(angka)-1000);
        } else if(angka < 1000000) {
            return terbilang(Math.floor(parseInt(angka)/1000))+" ribu "+terbilang(parseInt(angka)%1000);
        } else if(angka < 1000000000) {
            return terbilang(Math.floor(parseInt(angka)/1000000))+" juta "+terbilang(parseInt(angka)%1000000);
        } else if(angka < 1000000000000) {
            return terbilang(Math.floor(parseInt(angka)/1000000000))+" milyar "+terbilang(parseInt(angka)%1000000000);
        } 
    }
</script>
@stop