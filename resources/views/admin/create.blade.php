<h1>Create Category</h1>
<form action="{{ route('admin.categories.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Category Name" required>
    <button type="submit">Create</button>
</form>
