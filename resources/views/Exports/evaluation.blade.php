<!-- filepath: /c:/Users/USER/Desktop/docTherory/resources/views/exports/evaluation.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Evaluacion</title>
</head>
<body>
    <h1>Evaluación</h1>
    <table>
        <thead>
            <tr>
                <td>Nombre: </td>
                <td>{{ $evaluation->professional->user->name }}</td>
            </tr>
            <tr>
                <td>Email: </td>
                <td>{{ $evaluation->professional->user->email }}</td>
            </tr>
            <tr>
                <th>Dimensión 1</th>
                <th>Dimensión 2</th>
                <th>Dimensión 3</th>
                <th>Dimensión 4</th>
                <th>General</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $evaluation->interpretation->get(1)['sum'] }}</td>
                <td>{{ $evaluation->interpretation->get(2)['sum'] }}</td>
                <td>{{ $evaluation->interpretation->get(3)['sum'] }}</td>
                <td>{{ $evaluation->interpretation->get(4)['sum'] }}</td>
                <td>{{ $evaluation->total['sum'] }}</td>
            </tr>
            <tr>
                <td>{{ $evaluation->interpretation->get(1)['interpretation'] }}</td>
                <td>{{ $evaluation->interpretation->get(2)['interpretation'] }}</td>
                <td>{{ $evaluation->interpretation->get(3)['interpretation'] }}</td>
                <td>{{ $evaluation->interpretation->get(4)['interpretation'] }}</td>
                <td>{{ $evaluation->total['interpretation'] }}</td>
            </tr>
            <tr>
                <td>{{ $evaluation->interpretation->get(1)['percentil'] }}</td>
                <td>{{ $evaluation->interpretation->get(2)['percentil'] }}</td>
                <td>{{ $evaluation->interpretation->get(3)['percentil'] }}</td>
                <td>{{ $evaluation->interpretation->get(4)['percentil'] }}</td>
                <td>{{ $evaluation->total['percentil'] }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>