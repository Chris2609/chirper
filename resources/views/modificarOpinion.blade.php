<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="POST" action="{{ route('modificarOpinion') }}">
        @csrf
    
        <input type="hidden" id="id" name="id" value = "{{ $idOpinion }}"><br>

        <label for="valoracion">Valoracion (1-5):</label>
        <input type="number" min="0" max="5" id="valoracion" name="valoracion"><br>

        <label for="descripcion">Descripcion:</label>
        <input type="text" id="descripcion" name="descripcion"><br>

        <button type="submit">Añadir valoración</button>
    </form>
</body>
</html>