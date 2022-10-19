Nombre: {{ $name }}
Email: {{ $email }}
@if ($phone)
Teléfono: {{ $phone }}
@endif
@if ($comments)
Teléfono: {{ $comments }}
@endif
@if ($product)
    Producto: {{ $product->name }} ({{ $product->code }})
@endif