@include('header')
<div class="container">
    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div class="text-center"><div class="alert alert-success" role="alert">
                        <button type="button" class="close" data-dismiss="alert"> x</button>
                        <strong>Success! </strong>The Record has been successfully updated!
                    </div></div><br>
            @endif
            @if(session('error'))
                <div class="alert alert-danger text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert"> x</button>
                    <strong>Error! </strong>Something went wrong!
                </div><br>
            @endif
        </div>
    </div>
</div>
<style type="text/css">
    .form-inline .form-control {
        width: 100% !important;
        display: block !important;
    }
</style>

<div class="container">
    <div class="row">

        <div class="col-12">
            <h3 class="my-5"><a href="{{route('show-coins')}}" >Coins</a> >> Edit Coin </h3>
            <form method="post" action="{{route('edit-asset')}}" class="form-inline" enctype="multipart/form-data">
                <input type="hidden" name="id" value="{{$record->id }}">
                <div class="form-group col-3 mb-2">
                    <label for="asset_name" class="col-form-label" data-toggle="tooltip" data-placement="top" title="Max characters 100" >Coin Name:<span class="label-require">*</span></label>
                    <input type="text" class="form-control" name="asset_name" value="{{$record->asset_name }}" required>
                </div>
                <div class="form-group col-3 mb-2">
                    <label for="asset_code" class="col-form-label" data-toggle="tooltip" data-placement="top" title="Max characters 100" >Coin short name:<span class="label-require">*</span></label>
                    <input type="text" class="form-control" name="asset_code" value="{{$record->asset_code }}" required>
                </div>

                <div class="form-group col-3 mb-2">
                    <label for="status" class="col-form-label">Status:</label>
                    <select class="form-control" name="status" required>
                        <option value="Active" <?= $record->status === 'Active' ? 'selected':''; ?>>Active</option>
                        <option value="Inactive" <?= $record->status === 'Inactive' ? 'selected':''; ?>>Inactive</option>
                    </select>
                </div>
                <div class="form-row col-4">
                    <label for="message-text" class="col-form-label" data-toggle="tooltip" data-placement="top" title="Upload image of coin (jpg, png, jpeg, webp) recomended size 120x120px">Coin Image:<span class="label-require">*</span></label>
                    <div class="custom-file ">
                        <input type="file" class="custom-file-input main-input"
                               id="coin_img"
                               name="coin_img"
                               value=""
                               >
                        <label class="custom-file-label main-label" for="coin_img">Coin Image</label>
                    </div>
                </div>
                <div class="form-group col-3 mb-2">
                    <label for="message-text" class="col-form-label">&nbsp;</label>
                    @csrf
                    <button name="submit" type="submit" value="submit" class="float-right btn btn-danger btn-block">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@include('footer')
<script type="text/javascript">
    $(".alert").fadeOut(5000);
</script>  