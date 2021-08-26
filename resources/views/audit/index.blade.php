<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Audit
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg flex">
                            <table class="flex-1 divide-y divide-gray-200 w-full" style="border-spacing: 0px; table-layout: fixed;">
                                <thead>
                                    <tr>
                                        <th width=100 scope="col" class="px-6 py-3 bg-black text-left text-xs font-medium text-white uppercase tracking-wider">Number</th>
                                        <th scope="col" class="px-6 py-3 bg-black text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Element
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                    @foreach ($elements as $element)
                                    <tr>
                                        <td class="px-4 py-2 text-sm text-grey-900 bg-blue-100" style="word-wrap: break-word">{{ $element->number }}</td>
                                        <td class="px-4 py-2 text-sm text-grey-900" style="word-wrap: break-word">
                                        <a href="{{ route('audits.show', $element->id) }}">{{ $element->title }}</a></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>