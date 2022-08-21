<div>
    Nombre: {{ $name }}
</div>

<div>
    Email: 
    <a href="mailto: {{ $email }}">
        {{ $email }}
    </a>
</div>

@if ($product)
    <div>
        Producto: 
        <a href="{{ $product->url }}">
            {{ $product->name }} ({{ $product->code }})
        </a>
    </div>
@endif