<x-layouts.main>
    <section class="bg-gray-50"> </section>
        @if(isset($trackingInfo))
        <section class="bg-gray-100">
            <div class="mx-auto max-w-[1340px] px-4 py-16 sm:px-6 sm:py-4 lg:mr-0 lg:pl-8 lg:pr-0">
                <div class="grid grid-cols-1 gap-y-8 lg:grid-cols-3 lg:items-center lg:gap-x-16">
                    <div class="max-w-xl text-center sm:text-left">
                        <h3 class="text-2xl font-bold tracking-tight sm:text-4xl justify-between">
                            <br class="hidden sm:block lg:hidden p-3" />
                            <input type="text" value="{{ $trackingInfo['tracking_number'] }}" id="tracking" hidden>
                            {{ $trackingInfo['tracking_number'] }}
                            <span>&nbsp;&nbsp;</span>
                            <span class="inline-flex justify-center items-center w-[38px] h-[38px] rounded-full bg-gray-300 text-white tooltiptext" onclick="copyFunction()" id="copy" onmouseout="outFunc()">
                                <svg class="tooltiptext h-4 w-4" stroke="currentColor" fill="none" stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"></path>
                                    <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                </svg>
                            </span>
                        </h3>
                        <p class="mt-4 text-gray-500">
                        <div class="mb-2 flex gap-2">
                            <span class="mb-2 h-[10px] flex-1 rounded-xl bg-green-200"></span>
                            <span class="mb-2 h-[10px] flex-1 rounded-xl bg-green-400"></span>
                            <span class="mb-2 h-[10px] flex-1 rounded-xl bg-green-500"></span>
                            <span class="mb-2 h-[10px] flex-1 rounded-xl bg-green-700"></span>
                            <span class="mb-2 h-[10px] flex-1 rounded-xl bg-green-900"></span>
                        </div>
                        </p>
                        <div class="flex flex-col justify-center items-center">
                            <div
                                class="relative flex flex-col items-center rounded-[10px] mx-auto p-4 bg-white bg-clip-border shadow-3xl shadow-shadow-500 dark:!bg-navy-800 dark:text-white dark:!shadow-none pr-4">
                                <div class="mt-6 flex flex-col items-center">🔔
                                    <h4 class="text-xl font-bold text-navy-700 dark:text-black">
                                        Latest Update
                                    </h4>
                                    <p class="text-base font-normal text-gray-600">
                                        {{ $trackingInfo['tracking_info']->first()->status }} on
                                        {{ $trackingInfo['tracking_info']->first()->created_at->format('F d, Y \a\t h:i a') }}
                                </div>
                                <div class="mt-6 mb-3 flex gap-14 md:!gap-14">
                                    <div class="flex flex-col items-center justify-center">
                                        <p class="text-sm text-navy-700 dark:text-green-500">{{ $trackingInfo['shipper_state'] . ', ' .$trackingInfo['shipper_country'] }}</p>
                                        <p class="text-sm font-normal text-gray-600">{{ $trackingInfo['shipper_name'] }}</p>
                                    </div>
                                    <div class="flex flex-col items-center justify-center">
                                        <p class="text-1xl font-bold text-navy-700 dark:text-black">
                                            ✈
                                        </p>
                                        <span class="text-sm font-normal text-gray-600">&nbsp;</span>
                                    </div>
                                    <div class="flex flex-col items-center justify-center">
                                        <p class="text-sm text-navy-700 dark:text-green-500">{{ $trackingInfo['receiver_state'] . ', ' .$trackingInfo['receiver_country'] }}</p>
                                        <p class="text-sm font-normal text-gray-600">{{ $trackingInfo['receiver_name'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="-mx-6 lg:col-span-2 lg:mx-0 pr-4">
                        <div class="flex-1 bg-white rounded-lg shadow-xl mt-4 p-8">
                            <h4 class="text-xl text-gray-900 font-bold"> 🚡 Activity log</h4>
                            <div class="relative px-4">
                                <div class="absolute h-full border border-dashed border-opacity-20 border-secondary"></div>
                                <!-- start::Timeline item -->
                                @foreach ($trackingInfo['tracking_info'] as $trackingRecord)
                                    @if ($trackingRecord->status === 'Delivered')
                                        <div class="flex items-center w-full my-6 -ml-1.5">
                                            <div class="w-1/12 z-10">
                                                <div class="w-3.5 h-3.5 bg-green-600 rounded-full"></div>
                                            </div>
                                            <div class="w-11/12">
                                                <p class="text-lg font-bold text-green-600">{{ $trackingRecord->status }}</p>
                                                <p class="text-xs text-gray-500">{{ $trackingRecord->details }}</p>
                                                <p class="text-xs text-gray-500">{{ $trackingRecord->date->format('F d, Y, g:i a') }}</p>
                                            </div>
                                        </div>
                                    @elseif ($trackingRecord->status === 'On Hold' || $trackingRecord->status === 'Delayed')
                                        <div class="flex items-center w-full my-6 -ml-1.5">
                                            <div class="w-1/12 z-10">
                                                <div class="w-3.5 h-3.5 bg-red-600 rounded-full"></div>
                                            </div>
                                            <div class="w-11/12">
                                                <p class="text-lg font-bold text-red-600">{{ $trackingRecord->status }}</p>
                                                <p class="text-xs text-gray-500">{{ $trackingRecord->details }}</p>
                                                <p class="text-xs text-gray-500">{{ $trackingRecord->date->format('F d, Y, g:i a') }}</p>
                                            </div>
                                        </div>
                                    @else
                                        <div class="flex items-center w-full my-6 -ml-1.5">
                                            <div class="w-1/12 z-10">
                                                <div class="w-3.5 h-3.5 bg-blue-600 rounded-full"></div>
                                            </div>
                                            <div class="w-11/12">
                                                <p class="text-lg font-bold text-blue-600">{{ $trackingRecord->status }}</p>
                                                <p class="text-xs text-gray-500">{{ $trackingRecord->details }}</p>
                                                <p class="text-xs text-gray-500">{{ $trackingRecord->date->format('F d, Y, g:i a') }}</p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <!-- end::Timeline item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @endif
    </x-layouts.main>