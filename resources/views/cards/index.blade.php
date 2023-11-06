<x-app-layout header="true" :title="__('Digidex cards')">

    <div x-data="{ open: false }" class="sm:hidden p-2 bg-white shadow-md rounded-lg mb-12">
        <div class="flex justify-between items-center">
            <span class="uppercase tracking-wide text-indigo-500 font-semibold">{{__('Filter')}}</span>
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-indigo-400 hover:text-indigo-500 hover:bg-indigo-100 focus:outline-none focus:bg-indigo-100 focus:text-indigo-500 transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div :class="{'block': open, 'hidden': ! open}">
            <x-cards-filters />
        </div>
    </div>

    <div class="ddx-card-index flex gap-x-12 w-full">
        <aside class="hidden sm:block p-4 bg-white rounded-lg shadow-md w-1/3 h-fit">
            <x-cards-filters/>
        </aside>
        <div class="w-full sm:w-2/3">
            @forelse ($cards as $card)
                <x-card :card="$card" fields="Email,Phone" class="{{($loop->odd) ? 'odd' : 'even'}}"/>
            @empty
                <div class="flex flex-col items-center justify-center">
                    <div class="text-2xl text-indigo-400 font-semibold">{{__('No cards found')}}</div>
                    <div>{{__('Try to change the filters')}}</div>
                </div>

            @endforelse

            <div class="mt-6">
                {{ $cards->links() }}
            </div>
        </div>
    </div>

</x-app-layout>
