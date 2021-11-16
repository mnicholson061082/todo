<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Bootstrap CSS 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
        -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <title>Laravel ToDo</title>
    </head>
    <body>
    <div class="container">
        <h1>Mark's ToDo List</h1>
        <hr>
        
        <h2>Add new task</h2>
        <hr>
        @if ($errors->any())
            <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
        @endif
        <form action="{{ url('/todos') }}" method="POST">
            @csrf
            <input type="text" class="form-control" name="task" placeholder="Add new task">
            <button class="btn btn-primary" type="submit">Store</button>
        </form>



        <h2>Pending tasks</h2>
        @if (session('status'))
            <div class="alert alert-success">
            {{ session('status') }}
            </div>
        @endif
        <hr>
        @foreach($todos as $todo)
    <li class="list-group-item">
        {{ $todo->task }}
        <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $loop->index }}" aria-expanded="false">
            Edit
        </button>
        <form action="{{ url('todos/'.$todo->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit">Delete</button>
        </form>

        <div class="collapse mt-2" id="collapse-{{ $loop->index }}">
            <div class="card card-body">
                <form action="{{ url('todos/'.$todo->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="text" name="task" value="{{ $todo->task }}">
                    <button class="btn btn-secondary" type="submit">Update</button>
                </form>
            </div>
        </div>
    </li>
@endforeach






        <h2>Completed Tasks</h2>
    </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    </body>
</html>