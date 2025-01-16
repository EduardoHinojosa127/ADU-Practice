<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Evaluaciones</title>
</head>
<body>
    <h1>Evaluaciones</h1>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>Evaluación ID</th>
                <th>Dimensión 1</th>
                <th>Dimensión 2</th>
                <th>Dimensión 3</th>
                <th>Dimensión 4</th>
                <th>General</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($evaluations as $evaluation)
                <tr>
                    <td rowspan="3">{{ $evaluation->professional->user->name }}</td>
                    <!-- Sumas -->
                    @foreach (range(1, 4) as $dimension)
                        <td>{{ $evaluation->interpretation->get($dimension)['sum'] ?? 'N/A' }}</td>
                    @endforeach
                    <td>{{ $evaluation->total['sum'] ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <!-- Interpretaciones -->
                    @foreach (range(1, 4) as $dimension)
                        <td>{{ $evaluation->interpretation->get($dimension)['interpretation'] ?? 'N/A' }}</td>
                    @endforeach
                    <td>{{ $evaluation->total['interpretation'] ?? 'N/A' }}</td>
                </tr>
                <tr>
                    <!-- Percentiles -->
                    @foreach (range(1, 4) as $dimension)
                        <td>{{ $evaluation->interpretation->get($dimension)['percentil'] ?? 'N/A' }}</td>
                    @endforeach
                    <td>{{ $evaluation->total['percentil'] ?? 'N/A' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
