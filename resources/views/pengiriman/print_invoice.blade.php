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
    width: 300px;
    }

    
</style>
<body>
    <div class="title"> =======SUMBER REJEKI======== </div>
    <div class="title"> ============================= </div>

    
    <div> Nama:  {{$shipment->nama_pembeli}}</div>
    <div> Alamat: {{$shipment->alamat_pembeli}} </div>

    <div> ============================= </div>
    
    <div> 
        @foreach ($pengiriman->items as $item)
        <div>{{$loop->iteration}}. {{$item->product->nama_produk}}  @{{$item->quantity}} {{$item->unit->name_unit}} Rp.{{$item->total}} </div>
        @endforeach
    </div>
    <div> ============================= </div>
    <div> 
        Total : {{$shipment->grandtotal}}
    </div>

</body>
</html>