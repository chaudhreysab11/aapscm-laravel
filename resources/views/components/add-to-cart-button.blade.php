@props(['product', 'label' => 'Add to Cart', 'redirect' => null])

<form method="POST" action="{{ route('cart.add', $product->id) }}" class="inline-block">
    @csrf
    @if ($redirect)
        <input type="hidden" name="redirect_to" value="{{ $redirect }}" />
    @endif
    <input type="hidden" name="quantity" value="1" />
    <button type="submit"
            class="inline-block bg-[#f0b323] text-[#0B2F5E] font-semibold px-6 py-3 rounded-lg hover:opacity-90">
        {{ $label }}
    </button>
</form>
