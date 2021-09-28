<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-3xl text-black leading-tight">
            Kriteria Audit SMKP Minerba
        </h2>
        <small class="text-xs">
            <span class="text-base">Permen ESDM No. 38 Tahun 2014 </span>
            <a href="https://jdih.esdm.go.id/storage/document/Permen%20ESDM%20No.%2038%20Tahun%202014.pdf" target="_blank">
                <i class="fas fa-external-link-alt text-blue-500"></i>
            </a>
        </small>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="divide-y divide-red-200 min-w-full" style="border-spacing: 0px; table-layout: auto;">
                                <thead>
                                    <tr>
                                        <th colspan="3" scope="col" class="px-6 py-3 bg-gray-500 text-base font-medium text-white uppercase tracking-wider text-center">
                                            Kriteria
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-red-200">

                                    <?php
                                    $prev_el = '';
                                    foreach ($data as $row) {
                                        if ($row->e_title == $prev_el) {
                                    ?>
                                            <tr>
                                                <td></td>
                                                <td class="px-2 py-2 text-sm text-blue-900" style="word-wrap: break-word">{{ $row->r_number }}</td>
                                                <td class="px-2 py-2 text-sm text-blue-900" style="word-wrap: break-word">{{ $row->r_title }}</td>
                                            </tr>
                                            <?php
                                            $row->e_title = '';
                                        } else {
                                            if ($row->e_title != '') {
                                            ?>
                                                <tr>
                                                    <td class="pl-4 py-2 text-sm text-blue-1000 bg-blue-100" style="word-wrap: break-word">{{ $row->e_number }}</td>
                                                    <td colspan="2" class="px-2 py-2 text-sm text-gray-900 bg-blue-100" style="word-wrap: break-word">{{ $row->e_title }}</td>
                                                </tr>
                                            <?php
                                            }
                                            if ($row->r_title != NULL) {
                                            ?>
                                                <tr>
                                                    <td></td>
                                                    <td class="px-2 py-2 text-sm text-blue-900" style="word-wrap: break-word">{{ $row->r_number }}</td>
                                                    <td class="px-2 py-2 text-sm text-blue-900" style="word-wrap: break-word">{{ $row->r_title }}</td>
                                                </tr>
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