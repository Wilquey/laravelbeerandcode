<x-app-layout>
    <x-slot name="header">
        <h3>HEADER - TITLE</h3>
    </x-slot>
    <ol>
        <li>Nome: {{ $name ?? 'Sem nome' }}</li>
        <li>Documento: {{ $document }}</li>
        <li>Status da Assinatura: {{ $status ?? 'Sem Status' }}</li>
        <li>Bebida: {{ $params }}</li>
    </ol>
</x-app-layout>
