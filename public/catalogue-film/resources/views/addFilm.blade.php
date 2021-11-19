<html>

<body>
    <form method="POST" action="{{ url('#') }}">
    @csrf
        <input type="text" name="name" placeholder="nom du film">
        <input type="text" name="director" placeholder="directeur du film">
        <select id="category" name="category">
            <option selected value="" disabled selected>Category</option>
            @foreach ($categories as $category){
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                }
            @endforeach
        </select>
        <input type="submit" value="creer film">
    </form>
</body>

</html>
