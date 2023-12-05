@include('header')


<style>
    .head {

        background-color: "#cecece";
    }
    .btn-outline-success{
        color:#00bd9c;


    }
    .btn-outline-success:hover{
        background-color:#00bd9c;
        border-color: #00bd9c;

    }
    .btn-outline-success:not(:disabled):not(.disabled).active, .btn-outline-success:not(:disabled):not(.disabled):active, .show>.btn-outline-success.dropdown-toggle {
        color: #fff;
        background-color: #00bd9c;
        border-color: #00bd9c;
    }

    .h-25{
        display:none;
    }

    .cls{
        padding-top:50px;

    }

    .upgrade {
        background-color: #37368c;
        border: none;
        color: white;
        padding: 10px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        /*font-family:'Arial';*/
        font-size: 12px;
        font-weight:normal;
        margin-top:10px;

    }

    .up {border-radius: 20px;}
 
     .fit-text {
         position: relative;
         /*top: 50%;*/
         /*left: 1%;*/
         /*right: 1%;*/
     }
</style>
<div class="container">

    @include('dashboard.header-tabs')
    <div class="cls cls-5 over-auto">
        <table id="signals" class="tabel-main wow fadeInUp">
            <thead>
            <tr class="head">
                <th>Coin image</th>
                <th>Coin name</th>
                <th>Coin short name</th>
                <th>Status</th>
                @if ($user->isAdmin())
                    <th colspan="2">Actions</th>
                @endif
            </tr>
            </thead>
            <tbody>

            @foreach ($assets as $asset)
                <tr height="50">
                    <td scope="row"><img src="{{$asset->coin_img}}"></td>
                    <td scope="row">{{ $asset->asset_name }}</td>
                    <td>{{ $asset->asset_code }}</td>
                    <td>{{ $asset->status }}</td>
                    @if ($user->isAdmin()) 
                        <td>
                            <a href="{{route('show-form-edit',['id'=> $asset->id])}}">
                                <i class="fas fa-edit" data-toggle="modal" data-target="#exampleModal" title="Edit Coin"></i>
                            </a>
                        </td>  
                        <td>
                            <a href="{{route('delete-asset',['id'=> $asset->id])}}" >
                                <i class="fas fa-trash" data-toggle="modal" data-target="#exampleModal" title="Delete Coin"></i>
                            </a>
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
@include('footer') 
</html>