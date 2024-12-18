<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Posts</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

    <div class="sidebar">
        <h2 class="text-center">Author Panel</h2>
        <ul>
            <li><a href="{{ route('author.posts.create') }}">Create New Post</a></li>
            <li><a href="{{ route('author.posts.index') }}">View Your Posts</a></li>
        </ul>
    </div>

    <div class="content">
        <div class="container mt-4">
            <h1>Your Posts</h1>
            <a href="{{ route('author.posts.create') }}" class="btn btn-primary mb-3">Create New Post</a>
            <ul class="list-group">
                @foreach($posts as $post)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        {{ $post->title }} (Status: {{ $post->status }})
                        <div>
                            <a href="{{ route('author.posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('author.posts.destroy', $post->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
