<x-app-layout>
    <x-slot name="header">
        <h2 class="px-2 font-semibold text-xl text-gray-800 leading-tight">
            {{ $element->title }}
        </h2>
        <span class="px-2">Year 2021</span>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-col">
                <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow overflow-hidden bg-white sm:rounded-lg">
                            <form method="POST" action="{{ route('audits.store') }}">
                                @foreach ($requirements as $requirement)
                                <div class="form-group">
                                    <div class="px-4 py-4 flex">
                                        <input type="hidden" name="id_req{{$requirement->id}}" value="{{$requirement->id}}">
                                        <input type="hidden" name="id_el" value="{{$requirement->element_id}}">
                                        <p class="flex-initial">{{ $requirement->number }}</p>
                                        <p class="px-2 flex-auto">{{ $requirement->title }}</p>
                                    </div>

                                    <div class="px-4 py-2 form-radio">
                                        <input type="radio" class="form-check-input" id="quest1">
                                        <label class="form-check-label" for="quest1">True</label>
                                    </div>

                                    <div class="px-4 py-2 form-radio">
                                        <input type="radio" class="form-check-input" id="quest2">
                                        <label class="form-check-label" for="quest2">False</label>
                                    </div>

                                </div>
                                @endforeach

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</x-app-layout>