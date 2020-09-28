<div class="d-flex justify-content-center align-items-center border">
    <span class="border border-secondary rounded">
    <form method="post" action="{{route('uploadFile.store')}}" enctype="multipart/form-data">
        @csrf
        <div action="" class="form-group">
            <label for="exampleFormControlFile1"><span class="uploadFont">Upload your file</span></label>
            <input type="file" class="form-control-file" name="uploadfile" id="exampleFormControlFile1">
        </div>
        <div class="form-group"><button class="btn btn-success">Export data</button></div>
    </form>
    </span>
</div>
