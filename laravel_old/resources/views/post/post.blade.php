<form id="formpost" method="post" action="{{url('addPost')}}" >
    @csrf
    <div class="form-group">
        <label for="title">Title :</label>
        <input type="text" class="form-control" value="" id="title" aria-describedby="emailHelp" name="title" placeholder="Title">
    </div>
    <div class="form-group">
        <label for="body">Body :</label>
        <textarea class="form-control" name="body" id="body" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>