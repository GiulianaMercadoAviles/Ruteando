<x-mail::message>
    #  Mantenimiento requerido

    Es necesario realizar el mantenimiento de la maquinaria vial **{{ $serialNumber }}**.


    - Kilómetros actuales: {{ $kilometers }}  
    - Límite permitido: {{ $kilometersLimit }}

    Muchas gracias,
    {{ config('app.name')}}

</x-mail::message>