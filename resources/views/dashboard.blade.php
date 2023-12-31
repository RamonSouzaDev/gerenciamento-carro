@extends('layouts.app')
<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-12 gap-6">
                <div class="col-span-3 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <ul class="list-none">
                            <li>
                                <a href="{{ route('veiculos.index') }}" class="btn btn-primary">
                                    <i class="fa fa-car"></i> Veículos
                                </a>
                            </li>
                        </ul>
                        <ul class="list-none">
                            <li>
                                <a href="{{ route('manutencoes.index') }}" class="btn btn-primary">
                                    <i class="fa fa-cog"></i> Manutenções
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
