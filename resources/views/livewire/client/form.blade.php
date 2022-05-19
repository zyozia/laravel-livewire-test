<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Feedback form') }}
        </h2>
    </x-slot>
    <div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        @if($is_can)
                        <form wire:submit.prevent="save">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input
                                    wire:model="title"
                                    type="text"
                                    class="form-control"
                                    id="title"
                                    name="title"
                                    placeholder="Title"
                                >
                                @error('title') <span  class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="massage" class="form-label">Massage</label>
                                <textarea
                                    wire:model="massage"
                                    class="form-control"
                                    id="massage"
                                    name="massage"
                                    rows="3"
                                ></textarea>
                                @error('massage') <span class="text-danger">{{ $message }}</span> @enderror

                            </div>
                            <div class="mb-3">
                                <label for="file" class="form-label">File</label>
                                <input
                                    wire:model="file"
                                    class="form-control"
                                    type="file"
                                    id="file"
                                    name="file"
                                >
                                <div wire:loading wire:target="photo">Uploading...</div>
                                @error('file') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <button
                                    {{$disabled ? 'disabled' : ''}}
                                    type="submit"
                                    class="btn btn-info"
                                >
                                    Send
                                </button>
                            </div>
                        </form>
                    @else
                        {{__('Feedback has been sent')}}
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
