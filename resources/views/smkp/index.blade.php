<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            SMKP
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="divide-y divide-gray-200" width="1000">
                                <thead>
                                <tr>
                                    <th colspan="3" scope="col" width="50" class="px-6 py-3 bg-black text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Element
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                
                                @php 
                                    $prev_el = '';
                                    foreach ($data as $row) {
                                        if ($row->element == $prev_el) {
                                            echo "<tr>
                                                <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-900\" style=\"word-wrap: break-word\">".$row->number."</td>
                                                <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-900\" style=\"word-wrap: break-word\">".$row->requirement."</td>
                                            </tr>";
                                            $row->element = '';
                                        }
                                        else {
                                            if ($row->element != '') {
                                                echo "<tr><td class=\"px-6 py-4 whitespace-nowrap text-sm text-white bg-gray-500\" style=\"word-wrap: break-word\">".$row->id."</td>
                                                    <td class=\"px-6 py-4 whitespace-nowrap text-sm text-white bg-gray-500\" style=\"word-wrap: break-word\">".$row->element."</td></tr>";
                                            }
                                            if ($row->requirement != NULL) {
                                                echo "<tr><td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-900\" style=\"word-wrap: break-word\">".$row->number."</td>
                                                    <td class=\"px-6 py-4 whitespace-nowrap text-sm text-gray-900\" style=\"word-wrap: break-word\">".$row->requirement."</td></tr>";
                                            }
                                            $prev_el = $row->element;
                                        }
                                    }
                                @endphp
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
