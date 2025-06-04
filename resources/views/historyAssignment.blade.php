<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial de Mantenimiento</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; color: #333; margin: 20px; }
        h2 { text-align: center; color: #464646; margin-bottom: 24px; }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background: #fff;
        }
        th, td {
            border: 1px solid #bbb;
            padding: 8px 6px;
            text-align: center;
        }
        th {
            background: #f2f2f2;
            color: #333;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background: #f9f9f9;
        }
        tr:nth-child(odd) {
            background: #fff;
        }
    </style>

</head>
<body>
    <main>
        <h2>Resumen de Asignaciones - {{ $month }}</h2>
        <table>
            <thead>
                <tr>
                    <th>Máquina</th>
                    <th>Tipo de maquina</th>
                    <th>Obra Vial</th>
                    <th>Provincia</th>
                    <th>Kilómetros</th>
                    <th>Fecha de Inicio</th>
                    <th>Fecha de Fin</th>
                </tr>
            </thead>
            <tbody>
                @foreach($assignments as $assignment)
                    <tr>
                        <td>{{ $assignment->machine->serial_number }}</td>
                        <td>{{ $assignment->machine->type_machine->name }} {{ $assignment->machine->brand }} {{ $assignment->machine->model }}</td>
                        <td>{{ $assignment->roadWork->name }}</td>
                        <td>{{ $assignment->roadWork->province->name }}</td>
                        <td>{{ $assignment->kilometers_traveled }}</td>
                        <td>{{ $assignment->start_date }}</td>
                        <td>{{ $assignment->end_date }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </main>
</body>
</html>

