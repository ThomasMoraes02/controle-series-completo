<x-layout title="Nova Série">
    <x-series.form :action="route('series.store')" :name="old('name')" :buttonName="'Salvar'"/>
</x-layout>