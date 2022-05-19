<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Feedback list') }}
        </h2>
    </x-slot>
    <div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">

                        <table class="table">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Title</th>
                                <th scope="col">Massage</th>
                                <th scope="col">Client</th>
                                <th scope="col">Email</th>
                                <th scope="col">Attachment</th>
                                <th scope="col">Created At</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($feedbacks as $feedback)
                            <tr>
                                <th scope="row">{{ $feedback->id }}</th>
                                <td>{{ $feedback->title }}</td>
                                <td>{{ $feedback->massage }}</td>
                                <td>{{ optional($feedback->user)->name }}</td>
                                <td>{{ optional($feedback->user)->email }}</td>
                                <td><a href="{{ \Illuminate\Support\Facades\Storage::url($feedback->file) }}" target="_blank">File</td>
                                <td>{{ $feedback->created_at }}</td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        {{ $feedbacks->links() }}

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
