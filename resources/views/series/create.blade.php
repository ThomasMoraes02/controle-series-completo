<x-layout title="Nova Série">
    <x-series.form :action="route('series.store')" :name="old('name')" :update="false" :buttonName="'Salvar'"/>
</x-layout>