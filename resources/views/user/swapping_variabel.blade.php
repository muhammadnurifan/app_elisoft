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
                  <h3 class="card-title">Swapping Variabel</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <p>A = 5</p>
                  <p>B = 3</p>
                  <a href="#" class="btn btn-warning btn-sm" onclick="myFunction()">klik button untuk swapping variable</a>
                  <br>
                  <br>
                  Hasil:
                  <div id="out" style="font-style: italic;"></div>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Swapping Variabel dengan input form</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Variabel A</label>
                                <input name="name" type="number" id="variabel1" class="form-control" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Variabel B</label>
                                <input name="name" type="number" id="variabel2" class="form-control" autocomplete="off">
                            </div>
                        </div>
                        <a href="#" class="btn btn-warning btn-sm" onclick="FunctionForm()">klik button untuk swapping variable</a>
                    </div>
                    <br>
                    Hasil:
                    <div id="result" style="font-style: italic;"></div>
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
    function myFunction() {
        let A = 5, B = 3;

        [A, B] = [B, A];

        document.getElementById("out").innerHTML = "Swapping variable: A = " + A + ", B = " + B;
    }

    function FunctionForm() {
        let A = document.getElementById("variabel1").value;
        let B = document.getElementById("variabel2").value;

        [A, B] = [B, A];

        document.getElementById("result").innerHTML = "Swapping variable: A = " + A + ", B = " + B;
    }
</script>
@stop