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
                            <table class="divide-y divide-gray-200 min-w-full" style="border-spacing: 0px; table-layout: fixed;">
                                <thead>
                                <tr>
                                    <th colspan="3" scope="col" width="50" class="px-6 py-3 bg-black text-left text-xs font-medium text-white uppercase tracking-wider">
                                        Element
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                
                                <?php
                                    $prev_el = '';
                                    foreach ($data as $row) {
                                        if ($row->e_title == $prev_el) {
                                            ?>
                                            <tr>
                                                <td class="px-4 py-2 text-sm text-grey-900" style="word-wrap: break-word">{{ $row->r_number }}</td>
                                                <td class="px-4 py-2 text-sm text-grey-900" style="word-wrap: break-word">{{ $row->r_title }}</td>
                                            </tr>
                                            <?php
                                            $row->e_title = '';
                                        }
                                        else {
                                            if ($row->e_title != '') {
                                                ?>
                                                <tr><td class="px-4 py-2 text-sm text-white bg-gray-500" style="word-wrap: break-word">{{ $row->e_number }}</td>
                                                    <td class="px-4 py-2 text-sm text-white bg-gray-500" style="word-wrap: break-word">{{ $row->e_title }}</td></tr>
                                                <?php
                                            }
                                            if ($row->r_title != NULL) {
                                                ?>
                                                <tr><td class="px-4 py-2 text-sm text-grey-900" style="word-wrap: break-word">{{ $row->r_number }}</td>
                                                    <td class="px-4 py-2 text-sm text-grey-900" style="word-wrap: break-word">{{ $row->r_title }}</td></tr>
                                                <?php
                                            }
                                            $prev_el = $row->e_title;
                                        }
                                    }
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
