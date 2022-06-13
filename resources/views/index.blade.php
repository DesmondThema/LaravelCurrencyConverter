@extends('layouts.app')
@section('content')
<div class="min-h-screen flex flex-col items-center justify-center">
   <div class="text-center font-bold text-gray-500">
      <h1 class="text-2xl font-bold">
         Always get the real exchange rate
      </h1>
      <p class="text-sm">Banks markup the exchange rate when you transfer money abroad, we dont</p>
   </div>
   <div>
      <div class="text-white py-4 px-6">
         <form action="/convert" method="POST">
            @csrf
            <div class="px-4 py-12 text-white">
               <div class="flex items-center justify-between mb-5">
                  <div class="flex flex-col font-bold w-2/6 px-2">
                     <label for="amount" class="mb-3 text-gray-500">
                     Amount
                     </label>
                     <input
                        type="text"
                        name="amount"
                        placeholder="1.00"
                        class="py-3 px-5 rounded focus:outline-none text-gray-600 focus:text-gray-600 border border-4"
                        >
                  </div>
                  <div class="flex flex-col font-bold w-4/6 px-2">
                     <label for="from" class="mb-3 text-gray-500">
                     From
                     </label>
                     <select 
                        class="py-3 px-5 rounded focus:outline-none text-gray-600 focus:text-gray-600 border border-4"
                        name="from">
                     @foreach ($currencies as $currency => $rate )
                     <option class="py-1" {{ $currency == 'ZAR' ? 'selected' : '' }}>
                     {{ $currency }}
                     </option>
                     @endforeach
                     </select>
                  </div>
                  <div class="flex flex-col font-bold w-4/6 px-2 text-gray-500">
                     <label for="to" class="mb-3 ">
                     To
                     </label>
                     <select 
                        name="to" 
                        class="py-3 px-5 rounded focus:outline-none text-gray-600 focus:text-gray-600 border border-4"
                        name="to">
                     @foreach ($currencies as $currency => $rate )
                     <option class="py-1" {{ $currency == 'USD' ? 'selected' : '' }}>
                     {{ $currency }}
                     </option>
                     @endforeach
                     </select>
                  </div>
               </div>
               <div class="float-righr text-right">
                  <button type="submit" class="bg-blue-600 border font-bold mt-6 py-4 px-6 rounded-xl transition-all hover:bg-blue-500">Convert</button>
               </div>
               @if (session('converted_rate'))
               <div class="text-gray-500 pt-12 font-5xl w-4/5 text-xl">
                  {{ session('converted_rate') }}
               </div>
               <div class="text-gray-500 font-xl text-sm">
                  {{ session('from') }} to {{ session('to') }} conversion - Last updated {{ \Carbon\Carbon::now()->format('M d, Y h:i:s') }}
               </div>
               @elseif ($errors->any())
               @foreach ( $errors->all() as $error)
               <div class="text-red-500 text-center pt-12 font-bold text-xl w-5/5 mx-auto">
                  {{ $error }}
               </div>
               @endforeach
               @endif
            </div>
         </form>
      </div>
   </div>
   
</div>
@endsection