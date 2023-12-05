@include('header')
<div class="container">

</div>
<style type="text/css">
    .form-inline .form-control{
        width: 100% !important;
        display: block !important;
    }
</style>

<div class="container">
    <div class="row">

        <div class="col-12">
            <h3 class="my-5"><a class="link" href="{{route('analytics')}}">Analytics</a>  >> Add Analytics </h3>
            @include('dashboard.help-text.help-text',[
                'helpText' => config('constants.help-text.add-ananlytics')
            ])
            
            <form method="post" class="form-inline" enctype="multipart/form-data">
                <div class="form-group col-6 mb-4">
                    <label for="title" class="col-form-label" > Title:<span class="label-require">*</span></label>
                    <input type="text" class="form-control" name="title" required>
                </div>
                <div class="form-group col-6 mb-4"></div>
              
                <div class="form-group col-6 mb-4">
                  
                    <label for="analytics-youtube">Add links to Youtube <small>(click on youtube share button and copy link)</small></label>
                    <input type="text" class="form-control" id="analytics-youtube" name="youtube_link" >
                    <p>OR UPLOAD IMAGE:</p>
                </div>
                <div class="form-group col-6 mb-4"></div>
                <div class="form-group col-6 mb-4">
                   
                    <label class="custom-file-label main-label" for="analytics">Analytics Image:</label>
                    <input type="file" class="custom-file-input main-input" id="analytics" name=data value="">
                </div>
               
                <div class="form-group col-6 mb-4"></div>
                <div class="form-group col-6 mb-2">
                    <label for="notes">Analytics text:</label>
                    <textarea class="form-control" id="notes" name="notes" style="resize: none;" required></textarea>
                </div>
                <div class="form-group col-6 mb-4"></div>
                <div class="form-group col-6 mb-2">
                    <label for="notes">Author:<span class="label-require">*</span></label>
                    <input class="form-control" type="text" name="author" id="author" value="Angel.M" required>
                </div>
                <div class="form-group col-6 mb-4"></div>
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



