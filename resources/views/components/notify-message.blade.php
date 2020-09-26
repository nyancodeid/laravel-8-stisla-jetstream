@props(['on', 'message', 'type'])

<div x-data="{ message: '{{ $message }}', 'type': '{{ $type }}' }"
    x-init="@this.on('{{ $on }}', () => { console.log('fired 2'); const notyf = new Notyf({ position: { x: 'center', 'y': 'button' } }); notyf[type](message); })">
</div>
