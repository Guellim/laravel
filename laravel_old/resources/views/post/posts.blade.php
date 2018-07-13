<table  class="table table-hover " id="tablepost">
    <thead>
    <tr >
        <th>No</th>
        <th>Title</th>
        <th>Body</th>
        <th>Create At</th>
        <th>
            <button type="button" class="btn btn-primary add" data-toggle="modal" data-target="#addPost" value="save">
                Add new post
            </button>
        </th>
    </tr>
    </thead>
    <tbody>
    <?php  $no=1; ?>
    @foreach ($posts as $value)
        <tr class="post{{$value->id}}" data-id="{{ $value->id }}">
            <td>{{ $value->id }}</td>
            <td>{{ $value->title }}</td>
            <td>{{ $value->body }}</td>
            <td>{{ $value->created_at }}</td>
            <td>
                <a href="#" class="show-modal btn btn-info btn-sm" >
                    <i class="fa fa-eye"></i>
                </a>
                <button type="button" class="show-modal btn btn-info btn-sm edit" data-toggle="modal" value="edit">
                    <i class="fa fa-pencil"></i>
                </button>
                <form class="d-inline" action="{{url('deletePost')}}"  method="post">
                    @csrf
                    <input name="_method" type="hidden" value="DELETE">
                    <button class="delete btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i></button>
                </form>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{{$posts->links()}}