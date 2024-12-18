<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
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
            <div class="card">
                <div class="card-header">Create a New Post</div>
                <div class="card-body">
                    <form action="{{ route('author.posts.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" name="title" class="form-control" placeholder="Post Title" required>
                        </div>
                        <div class="mb-3">
                            <textarea name="content" class="form-control" placeholder="Content" required></textarea>
                        </div>
                        <div class="mb-3">
                            <select name="category_id" class="form-select">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Create Post</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
