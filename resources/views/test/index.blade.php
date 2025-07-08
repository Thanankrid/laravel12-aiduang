<!DOCTYPE html>
<html>
<head>
    <title>Gallery</title>
    <style>
        img { width: 200px; height: auto; margin: 10px; }
        .gallery-item { text-align: center; display: inline-block; }
    </style>
</head>
<body>
    <h1>All Hero Gallery OF Thanankrid</h1>

    <div class="gallery-item">
        <a href="{{ url('/gallery/ant') }}">
            <img src="{{ $ant }}" alt="Ant-Man">
            <p>Ant</p>
        </a>
    </div>

    <div class="gallery-item">
        <a href="{{ url('/gallery/bird') }}">
            <img src="{{ $bird }}" alt="Falcon">
            <p>Bird</p>
        </a>
    </div>

    <div class="gallery-item">
        <a href="{{ url('/gallery/cat') }}">
            <img src="{{ $cat }}" alt="Black Panther">
            <p>Cat</p>
        </a>
    </div>

    <div class="gallery-item">
        <a href="{{ url('/gallery/god') }}">
            <img src="{{ $god }}" alt="Thor">
            <p>God</p>
        </a>
    </div>

    <div class="gallery-item">
        <a href="{{ url('/gallery/spider') }}">
            <img src="{{ $spider }}" alt="Spider-Man">
            <p>Spider</p>
        </a>
    </div>

</body>
</html>
