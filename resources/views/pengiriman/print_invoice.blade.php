<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">   
    <title>Document</title>
</head>
<style>
    html, body
    {
    width: 302px;
    }
     
     .title{
         text-align: center;
     }
    
</style>
<body>
    <div id="printku">
        <div class="title">SUMBER REJEKI</div>
        <div  class="title"> ============================= </div>
    
        
        <div> Nama:  {{$shipping->nama_pembeli}}</div>
        <div> Alamat: {{$shipping->alamat_pembeli}} </div>
    
        <div> ============================= </div>
        
        <div> 
            
            @php
            $grandTotal = 0;
            @endphp

            @foreach ($shipping->items as $item)

            @php
            $grandTotal = $grandTotal + ($item->quantity * $item->unit_price);
            @endphp
            <div>{{$loop->iteration}}. {{$item->product->nama_produk}}  @ {{$item->quantity}} {{$item->unit->name_unit}}  => Rp.{{number_format($item->total)}} </div>
            @endforeach
        </div>
        <div> ============================= </div>
        <div> 
            Total : Rp.{{number_format($grandTotal)}}
        </div>
    
    </div>

</body>
</html>