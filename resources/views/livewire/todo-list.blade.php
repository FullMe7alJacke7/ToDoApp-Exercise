<div class="bg-gray-200 fixed top-0 left-0 w-full h-full flex items-center shadow-lg overflow-y-auto">
    <div class="container mx-auto lg:px-32 rounded-lg overflow-y-auto">
        <div class="bg-white rounded-xl">
            <span class="absolute pl-6 pt-3 text-3xl font-bold font-sans text-black">My Tasks</span>

            <button
                wire:click="clearTasks"
                class="float-right border-2 border-gray-400 bg-gray-100 text-gray-900 font-bold p-2 mt-2 mr-2 rounded-md inline-flex items-center
                        hover:bg-blue-200 focus:outline-none focus:ring focus:border-blue-300"
            >
                <svg class="fill-current text-gray-500 w-8 h-8" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                </svg>
            </button>

            <div class="bg-white rounded p-6 m-4 w-3/4 mx-auto">
                <div class="w-3/5 mx-auto items-center">
                    <h1 class="text-gray-400 font-medium mt-16 pb-3 tracking-widest">TO-DO</h1>
                    <ul class="border-2 border-gray-300 rounded-xl flex flex-col content-between space-y-2">

                        @forelse($tasksToDo as $task)
                            <li>
                                <div class="flex p-2 @if(!$loop->last) border-b-2 @endif">
                                    <p class="w-full pl-2 font-sans font-normal text-black"> {{ $task['name'] }}</p>
                                    <input type="checkbox"
                                           class="flex-no-shrink p-2 ml-4 mr-2 border-2 rounded hover:border-blue-300 border-gray-300"
                                           wire:click="taskCompleted('{{$task['name']}}', {{ $loop->index }})"
                                    />
                                </div>
                            </li>
                        @empty
                            <div>
                                <p class="text-center">No Tasks In Your To-Do List.</p>
                            </div>
                        @endforelse
                    </ul>
                </div>

                <div class="w-3/5 mx-auto items-center">
                    <h1 class="text-gray-400 font-medium mt-16 pb-3 tracking-widest">COMPLETED</h1>
                    <ul class="border-2 border-gray-300 rounded-xl flex flex-col content-between space-y-2">
                        @forelse($tasksComplete as $task)
                            <li>
                                <div class="flex p-2 @if(!$loop->last) border-b-2 @endif">
                                    <p class="w-full pl-2 font-sans text-gray-400 font-medium italic line-through">{{ $task['name'] }}</p>
                                </div>
                            </li>
                        @empty
                            <div>
                                <p class="text-center">No Tasks In Your Completed List.</p>
                            </div>
                        @endforelse
                    </ul>
                </div>
            </div>
            <div class="w-full p-5 rounded-b-xl p-6 pt-8" style="background-color: #edf2f7">
                <p class="text-black font-medium pb-2 pl-2 tracking-normal">New Task</p>
                <div class="flex flex-row p-2">
                    <input
                        class="border-2 border-gray-400 rounded-l-md w-full hover:border-blue-500 focus:outline-none focus:ring focus:border-blue-300"
                        wire:model.debounce.500ms="input"
                        wire:keydown.enter="taskAdded"
                    />
                    <button
                        wire:click="taskAdded"
                        class="border-t-2 border-r-2 border-b-2 border-gray-400 bg-gray-100 text-gray-900 font-bold py-2 pr-4 rounded-r-md inline-flex items-center
                        hover:bg-blue-200 focus:outline-none focus:ring focus:border-blue-300"
                    >
                        <svg class="fill-current text-gray-500 w-8 h-8 p-0 ml-4 mr-2" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                  d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                  clip-rule="evenodd"/>
                        </svg>
                        <span
                            class="inline-flex pt-1 pl-2 pr-5 font-sans text-gray-500 border-gray-500 font-medium text-lg">Add
                        </span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
