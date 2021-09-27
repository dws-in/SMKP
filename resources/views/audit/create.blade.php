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
                        <form method="POST" action="{{ route('audits.store') }}" enctype="multipart/form-data">
                            @csrf
                                @foreach ($requirements as $requirement)
                                <div class="form-group">
                                    <div class="px-4 py-4 flex">
                                        <input type="hidden" name="id_req{{$requirement->id}}" value="{{$requirement->id}}">
                                        <input type="hidden" name="id_title{{$requirement->title}}" value="{{$requirement->title}}">
                                        <input type="hidden" name="id_el" value="{{$requirement->element_id}}">
                                        <p class="flex-initial">{{ $requirement->number }}</p>
                                        <p class="px-2 flex-auto">{{ $requirement->title }}</p>
                                    </div>
                                    <div class="radio">
                                        <div class="px-4 py-2 form-check">
                                            <label><input value=v type="radio" name="radio{{$requirement->id}}">  True</label>
                                        </div>
                                        <div class="px-4 py-2 form-check">
                                            <label><input value=x type="radio" name="radio{{$requirement->id}}">  False</label>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                <div class="col-xs-12 col-sm-12 col-md-12 px-4">
                                    <div class="form-group">
                                    <strong>Attachment:</strong>
                                        <input type="file" name="image" class="form-control" style="border: thin solid black; border-radius: 5px;" placeholder="Post Title">
                                    </div>
                                </div>
                                <div class="row px-4 mt-3 mb-2">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary mr-1 mb-1">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-app-layout>