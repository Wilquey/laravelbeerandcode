<x-app-layout>
    <x-slot name="header">
        <h3>HEADER - TITLE</h3>
    </x-slot>
    @php
        $suco = 'Laranja';
    @endphp
    <h2>Hey HO {{ $comida }} e {{ $suco }}</h2>
    <hr>
    <ol>
        <li>Nome: {{ auth()->user()->name }}</li>
        <li>Documento: {{ auth()->user()->client->document }}</li>
        <li>Status da Assinatura: {{ dd(auth()->user()->client->signatures->first()->status->name) }}</li>
    </ol>
</x-app-layout>
