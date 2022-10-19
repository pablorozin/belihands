<div>
    Nombre: {{ $name }}
</div>

<div>
    Email: 
    <a href="mailto: {{ $email }}">
        {{ $email }}
    </a>
</div>

@if ($phone)
    <div>
        Teléfono: {{ $phone }}
    </div>
@endif

@if ($comments)
    <div>
        Comentarios: {{ $comments }}
    </div>
@endif

@if ($product)
    <div>
        Producto: 
        <a href="{{ $product->url }}">
            {{ $product->name }} ({{ $product->code }})
        </a>
    </div>
@endif