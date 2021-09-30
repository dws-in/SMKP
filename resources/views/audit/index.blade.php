<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-black leading-tight">
            Formulir Audit SMKP Minerba
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-red-200 sm:rounded-lg flex">
                            <table class="flex-initial divide-y divide-gray-200 w-1/4" style="border-spacing: 0px; table-layout: auto;">
                                <thead>
                                    <tr>
                                        <th colspan="2" scope="col" class="px-6 py-3 bg-gray-500 text-base font-medium text-white uppercase tracking-wider text-center">
                                            Kriteria
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-red-200">
                                    @foreach ($elements as $element)
                                    <tr>
                                        <td class="pl-4 py-2 text-sm text-grey-900 bg-blue-100" style="word-wrap: break-word">{{ $element->number }}</td>
                                        <td class="px-2 py-2 text-sm text-grey-900 bg-blue-100" style="word-wrap: break-word">
                                            @if($element->id % 10000 !=0)
                                            <a href="{{ route('audits.show', $element->id) }}">{{ $element->title }}</a>
                                            @else
                                            <a >{{ $element->title }}</a>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
