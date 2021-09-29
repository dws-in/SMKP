<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Report
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                            <table class="min-w-full divide-y divide-gray-200 w-full">
                                <thead>
                                <tr>
                                    <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Company
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Periode
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Kode
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Persyaratan
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Attachment
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nilai Auditee
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Nilai Auditor
                                    </th>
                                    <th scope="col" class="px-6 py-3 bg-gray-50 text-center  text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-200">
                                @php($a = 0)
                                
                                @foreach ($data as $row)
                                    <tr>
                                        <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-900">
                                            company
                                        </td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-900">
                                            
                                            @php ($a++)  
                                        </td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-900">
                                            {{$row->number}}
                                        </td>
                                        <td class="px-6 py-4 text-left whitespace-nowrap text-sm text-gray-900">
                                            {{$row->title}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <img src="{{ asset('storage/'.$row->image)}}" width="100px">
                                        </td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-20">
                                            {{$row->nilai}}
                                        </td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-900">
                                            Nilai Auditor
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                            <a class="btn btn-primary" href="{{ route('report.show', $row->link) }}" role="button">Detail</a>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            Launch demo modal
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            @include('report.edit')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>