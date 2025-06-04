<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Historial de Mantenimiento</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; color: #333; }
        h2 { text-align: center; color: #464646; margin-bottom: 20px; }
        .maintenance-block { background-color: #ffffff; padding: 15px; margin-bottom: 20px; border-radius: 8px; }
        .title { font-size: 14px; color: #494949; }
        .detail { font-size: 14px; color: #333; margin-top: 5px; }
        .conteiner {margin-top: 20px; margin-bottom: 20px; border-top: 2px solid #ddd; }
    </style>

</head>
<body>
    <main>
        <h2>Historial de Mantenimiento</h2>

        <div class="maintenance-block">

            <h3>Detalles de la Máquina</h3>
            <div class="title"><strong>Número de Serie:</strong> {{ $machines->serial_number }}</div>
            <div class="title"><strong>Tipo de Máquina:</strong> {{ $machines->type_machine->name }} {{ $machines->brand }} {{ $machines->model }}</div>
            
            @foreach ($machines->maintenance as $maintenance)
                <div class="conteiner">
                    <div class="detail"><h4><strong>{{ $maintenance->typesMaintenance->name }}</strong> </h4></div>
                    <div class="detail"><strong>Descripción:</strong> {{ $maintenance->typesMaintenance->description }}</div>
                    <div class="detail"><strong>Kilómetros:</strong> {{ $maintenance->maintenance_kilometers }}</div>
                    <div class="detail"><strong>Fecha:</strong> {{ $maintenance->maintenance_date }}</div>
                </div>
            @endforeach
            
        </div>
    </main>
</body>
</html>

