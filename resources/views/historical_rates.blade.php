@extends('layouts.app')
@section('content')
<main class="sm:container sm:mx-auto sm:mt-10">
   <div class="w-full sm:px-6">
      @if (session('status'))
      <div class="text-sm border border-t-8 rounded text-green-700 border-green-600 bg-green-100 px-3 py-4 mb-4" role="alert">
         {{ session('status') }}
      </div>
      @endif
      <section class="flex flex-col break-words bg-white sm:border-1 sm:rounded-md sm:shadow-sm sm:shadow-lg">
         <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 mb-6 sm:py-6 sm:px-8 sm:rounded-t-md">
            Conversion History
         </header>
         @if ($rates->count() > 0)
         <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
               <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                     <th scope="col" class="px-6 py-3">
                        Amount
                     </th>
                     <th scope="col" class="px-6 py-3">
                        From
                     </th>
                     <th scope="col" class="px-6 py-3">
                        To
                     </th>
                     <th scope="col" class="px-6 py-3">
                        Conversion rate	
                     </th>
                     <th scope="col" class="px-6 py-3">
                        Converted date	
                     </th>
                  </tr>
               </thead>
               @foreach ($rates as $rate)
               <tbody>
                  <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                     <th scope="row" class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                        {{ $rate->amount }}
                     </th>
                     <td class="px-6 py-4">
                        {{ $rate->from }}
                     </td>
                     <td class="px-6 py-4">
                        {{ $rate->to }}
                     </td>
                     <td class="px-6 py-4">
                        {{ $rate->conversion_rate }}
                     </td>
                     <td class="px-6 py-4">
                        {{ $rate->created_at }}
                     </td>
                  </tr>
               </tbody>
               @endforeach
            </table>
         </div>
         @else
         <h1 class="px-6 py-4 text-2xl font-semibold"> No historical queires for {{ Auth::user()->name }}</h1>
         @endif
      </section>
   </div>
</main>
@endsection