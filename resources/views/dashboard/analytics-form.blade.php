<form method="post" action="{{route('save-analytic')}}" class="editor width-xs" enctype="multipart/form-data">
    <div class="form-group h6">
        <label for="notes">Analytics</label>
        <textarea class="form-control" id="notes" name="notes" style="resize: none;" required></textarea>
    </div>

    <div class="form-row">
        <div class="custom-file col-md-6 ">
            <label class="custom-file-label main-label" for="analytics">Analytics Image</label>
            <input type="file" class="custom-file-input main-input" id="analytics" name=data value="" multiple="">
        </div>
    </div>
    <div class="form-row">
        <div class="custom-file col-md-6 ">
            <p>Or</p>
            <label for="analytics-youtube">Add links to Youtube <small>(click on youtube share button and copy link)</small></label>
            <input type="text" class="form-control" id="analytics-youtube" name="youtube_link" >

        </div>
    </div>

    <div class="text-right pt-md-2 mb-2">
        @csrf
        <button class="btn btn-outline-info rounded-pill col-4 justify-content-center" name="save" type="submit" id="save">Update</button>
    </div>

</form>