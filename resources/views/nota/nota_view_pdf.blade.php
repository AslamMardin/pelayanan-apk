<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nota PDF</title>
    <style>
      * {
 margin: 0;
 padding: 0;  
 font-family: "Fixture Condensed Black", Arial, Helvetica, sans-serif; 
}
.pages {
    width: 600px;
    min-height: 300px;
    margin: 100px auto;
    padding: 2em;
    border:2px dashed rgb(185, 185, 182)
}
.card-header {
    display: flex;
    justify-content: center;
    align-items: center;
}
.img-logo {
    width: 150px;
    height: 150px;
}

.row {
    width: 100%;
    margin: 15px 0;
    padding: 0 0 5px 0;
}

.bb-1 {
    border-bottom: 3px dashed rgb(185, 185, 182);
}
.row .col-3 {
    width: 20%;
    display: inline-block;
    text-align: right;
}

.row .col-9 {
    width: 80%;
    display: inline;
}

.card-table
{
    margin-top: 30px;
    border-top: 5px solid #21130d
}

table {
    font-family: Arial, Helvetica, sans-serif;
    color: #000;
    text-shadow: 1px 1px 0px #fff;
    background: #eaebec;
   
    width: 100%;
  }
   
  table th {
    padding: 15px 35px;
    
    background: #eab676;
  }
   
  table th:first-child{  
    border-left:none;  
  }
   
  table tr {
    text-align: center;
    padding-left: 20px;
  }
   
  table td:first-child {
    text-align: left;
    padding-left: 20px;
    border-left: 0;
  }
   
  table td {
    padding: 15px 35px;
    border-top: 1px solid #ffffff;
    border-bottom: 1px solid #e0e0e0;
    border-left: 1px solid #e0e0e0;
    background: #fafafa;
    background: -webkit-gradient(linear, left top, left bottom, from(#fbfbfb), to(#fafafa));
    background: -moz-linear-gradient(top, #fbfbfb, #fafafa);
  }
   
  table tr:last-child td {
    border-bottom: 0;
  }
   
  table tr:last-child td:first-child {
    -moz-border-radius-bottomleft: 3px;
    -webkit-border-bottom-left-radius: 3px;
    border-bottom-left-radius: 3px;
  }
   
  table tr:last-child td:last-child {
    -moz-border-radius-bottomright: 3px;
    -webkit-border-bottom-right-radius: 3px;
    border-bottom-right-radius: 3px;
  }


.card-keterangan {
    border-left: 4px solid #f04242;
    padding: 1em 20px;
    background-color: #fcfcfc;
    opacity: .7;
}
.card-footer h5 {
    text-align: right;
}
    </style>
  </head>
  <body>
    <div class="pages">
        <div class="col-sm-12 col-md-6 offset-3">
            <div class="card my-2">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <h1 align="center">WORKIT</h1>
                    <div class="row bb-1">
                        <div class="col-3 text-right"><b>Nama :</b></div>
                        <div class="col-9">{{$nota->pelanggan->nama}}</div>
                    </div>
                    <div class="row  bb-1">
                        <div class="col-3 text-right"><b>Nomor :</b></div>
                        <div class="col-9">{{$nota->pelanggan->nomor}}</div>
                    </div>
                    <div class="row  bb-1">
                        <div class="col-3 text-right"><b>Alamat :</b></div>
                        <div class="col-9">{{$nota->pelanggan->alamat}}</div>
                    </div>
                    <div class="row  bb-1">
                        <div class="col-3 text-right"><b>Jenis Kelamin :</b></div>
                        <div class="col-9">{{$nota->pelanggan->jenis_kelamin}}</div>
                    </div>
    
                    <div class="card-table">
                        <table class="table table-sm" cellspacing='0'>
                            <thead>
                              <tr>
                                <th>Barang</th>
                                <th>Garansi</th>
                                <th style="width: 40px">Status</th>
                              </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$nota->nama_barang}}</td>
                                    <td>{{$nota->notaDetail->label_garansi . " Bulan" ?? "Belum Dibuat"}}</td>
                                    <td>{{$nota->status}}</td>
                                </tr>
                            </tbody>
                        </table>
    
    
                        <p class="row"><b>Keterangan :</b></p>
                       
                        <div class="card-keterangan">{{$nota->keterangan}}</div>
                          
                          <p class="row" style="color:red"><b>Total Bayar</b> : @if(!empty($nota->notaDetail->pemasukan)) @currency ($nota->notaDetail->pemasukan) @else 0 @endif</p>
                    </div>
    
    
                </div>
    
                <div class="card-footer">
                    <h5><b>Tanggal : </b>{{$nota->created_at->format("d/m/Y")}}</h5>
                </div>
            </div>
        </div>
      </div>
   
  </body>
</html>