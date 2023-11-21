<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<style>
    table, tr, td{
        border: 1px solid black !important;
        border-collapse: collapse;
        margin-left: 2em;
        margin-top: 2em;
        text-align: center;
    }
    td{
        padding: 1em;
    }
    h5{
        font-weight: bold;
    }
    
</style>

<body>

    @auth
        @include('layouts.navigation')
    @endauth
    <table>
        <tr>
            <td>
                <h5>Valoración</h5>
            </td>
            <td>
                <h5>Descripción</h5>
            </td>
        </tr>

        @foreach($opiniones as $opinion)
        <tr>
            <td>
                {{ $opinion->valoracion }}
            </td>
            <td>
               {{ $opinion->descripcion }} 
            </td>
            <td>
                <a href="/eliminarOpinion/{{ $opinion->id }}">Eliminar</a>
            </td>
            <td>
                <a href="/modificarOpinion/{{ $opinion->id }}">Modificar</a>
            </td>
        </tr>
        @endforeach
    </table>

    <table>
    <tr>
            <td>
                <h5>Valoración</h5>
            </td>
            <td>
                <h5>Descripción</h5>
            </td>
        </tr>
    <?php foreach ($opiniones as $opinion): ?>
        <tr>
            <td>
                <?php echo $opinion->valoracion; ?>
            </td>
            <td>
                <?php echo $opinion->descripcion; ?>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>

</body>

</html>