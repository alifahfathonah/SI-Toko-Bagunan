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

    #signature{
        width: 100%;
        border-collapse: collapse;
        margin-top: 30px;
    }
    
    #signature, #signature>tr, #signature tr td{
        border:1px solid;
        text-align: center;
    }

    
    
</style>
<body>
    <div id="printku">
        
        <table style="width: 100%;">
            <thead>
                <tr>
                    <th colspan="2" style="text-align: center">
                        TOKO BANGUNAN SUMBER REJEKI
                    </th>
                </tr>
                <tr>
                    <th colspan="2" style="text-align: center; font-size: 13px; border-bottom: 2px double ; ">
                        Jl. Raya Sugio-Lamongan Ds.Sumberagung
                    </th>
                </tr>
            </thead>
            <tbody style="border-top: 20px solid white;">
                <tr>
                    <td style="text-align: right"> 
                        Nama : 
                    </td>
                    <td>
                        {{$shipping->nama_pembeli}}
                    </td>
                </tr>

                <tr>
                    <td style="text-align: right">
                        Alamat : 
                    </td>
                    <td>
                        {{$shipping->alamat_pembeli}}
                    </td>
                </tr>

                <tr>
                    <td style="text-align: right; width:75px">
                        Tanggal : 
                    </td>
                    <td>
                        {{$shipping->tanggal_pengiriman}}
                    </td>
                </tr>
                <tr>
                    <td style="text-align: right">
                        Supir : 
                    </td>
                    <td>
                        {{$shipping->driver->name??"-"}}
                    </td>
                </tr>

            </tbody>
        </table>
        
        <table style="width: 100%">
            <tbody style="border-bottom: 2px solid #999; border-top: 2px solid #999;">
                @foreach ($shipping->items as $item)
                <tr>
                    <td> 
                        {{$loop->iteration}}. 
                    </td>
                    <td style="text-align: right;" > 
                        {{$item->product->nama_produk}}
                    </td>
                    <td style="text-align: right">
                        {{$item->quantity}}
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2" style="text-align: center;" > Total Barang </td>
                    <td style="text-align: right;" > {{$shipping->items->sum('quantity')}} </td>
                </tr>
            </tfoot>
        </table>

        <table id="signature">
            <tbody>
                <tr >
                    <td style="height: 80px">
                    </td>
                    <td>
                        
                    </td>
                </tr>
                <tr>
                    <td>Tanda Terima Pembeli</td>
                    <td>Checker Gudang</td>
                </tr>
            </tbody>
        </table>
        
    </div>

</body>
</html>