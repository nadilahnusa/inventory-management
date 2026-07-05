<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center justify-center rounded-lg bg-[#E31E24] px-4 py-2 text-sm font-semibold text-white transition hover:bg-[#BA0013] focus:outline-none focus:ring-2 focus:ring-[#FECACA]']) }}>
    {{ $slot }}
</button>
