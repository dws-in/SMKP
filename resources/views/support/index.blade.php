<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Contact Us
        </h2>
    </x-slot>

    {{-- <div class="py-12">
    <div class="max-w-6xl mx-auto py-10 sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">

        <form method="POST" action="{{ route('support.store') }}">

    <div class="form-group">
        <span class="font-medium">Your Name</span>
        <input name="name"
            class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-10 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"></input>
        @if ($errors->has('name'))
        <span class="text-danger">{{ $errors->first('name') }}</span>
        @endif
    </div>
    <div class="form-group">
        <span class="font-medium">Your email</span>
        <input name="email"
            class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-10 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
            placeholder='Example: "example@email.com"'></input>
        @if ($errors->has('email'))
        <span class="text-danger">{{ $errors->first('email') }}</span>
        @endif
    </div>
    <div class="form-group pt-3">
        <span class="font-medium">Tell us what's happenning</span>
        <textarea name="description"
            class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white"
            placeholder='Example: "Brief description of your issue."'></textarea>
        @if ($errors->has('description'))
        <span class="text-danger">{{ $errors->first('description') }}</span>
        @endif
    </div>

    <div class="form-group pt-3 float-right">
        <button type="submit"
            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
    </div>
    {{ csrf_field() }}
    </form>
    </div>
    </div>
    </div> --}}

    <div class="flex justify-center items-center mx-auto bg-gray-100">
        <form action="{{ route('supports.store') }}" method="POST" class="w-full md:w-3/4 lg:w-3/6 p-4">
            @if (session()->has('message'))
            <div role="alert">
                <div class="bg-green-100 border-l-4 border-orange-500 text-orange-700 p-4">
                    {{ session()->get('message') }}</div>
            </div>
            @endif
            @csrf
            <div class="p-3">
                <input name="name"
                    class="block appearance-none placeholder-gray-500 placeholder-opacity-100 border border-light-blue-400 rounded-md w-full py-3 px-4 text-gray-700 leading-5 focus:outline-none focus:ring-2 focus:ring-light-blue-300"
                    type="text" placeholder="Name" required>
            </div>
            <div class="p-3">
                <input name="email"
                    class="block appearance-none placeholder-gray-500 placeholder-opacity-100 border border-light-blue-400 rounded-md w-full py-3 px-4 text-gray-700 leading-5 focus:outline-none focus:ring-2 focus:ring-light-blue-300"
                    type="email" placeholder="Email Id" required>
            </div>
            <div class="p-3">
                <textarea name="description"
                    class="resize-none border rounded-md block appearance-none placeholder-gray-500 placeholder-opacity-100 border border-light-blue-400 rounded-md w-full py-3 px-4 text-gray-700 leading-5 focus:outline-none focus:ring-2 focus:ring-light-blue-300 h-56"
                    placeholder="Message" required></textarea>
            </div>
            <div class="p-3 pt-4">
                <button class="w-full bg-gray-700 hover:bg-gray-900 text-white font-bold py-3 px-4 rounded text-2xl">
                    Send
                </button>
        </form>
    </div>
</x-app-layout>
