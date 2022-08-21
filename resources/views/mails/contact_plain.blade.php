Nombre: {{ $name }}
Email: {{ $email }}
@if ($product)
    Producto: {{ $product->name }} ({{ $product->code }})
@endif