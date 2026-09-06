@extends('mastering')

@section('content')

<section class="main-course py-12 w-full">

    <div class="w-full bg-white shadow-[0_4px_20px_rgba(0,0,0,0.06)] rounded-2xl p-10 border border-gray-200">

        {{-- Header --}}
        <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-10 gap-4">
            <h2 class="text-4xl font-extrabold text-gray-900 tracking-tight">
                Agent List
            </h2>

            <div class="relative w-full md:w-96">
                <input 
                    type="text"
                    placeholder="Search agents..."
                    class="w-full rounded-2xl bg-gray-50 border border-gray-300 py-4 pl-14 pr-4 
                           text-xl font-medium text-gray-900
                           focus:bg-white focus:ring-2 focus:ring-blue-600 focus:border-transparent transition"
                >
                <i class="fas fa-search absolute left-5 top-4 text-gray-500 text-2xl"></i>
            </div>
        </div>

        {{-- Full-Width Modern Table --}}
        <div class="overflow-hidden rounded-2xl border border-gray-300 w-full">
            <table class="w-full text-xl">

                {{-- Header --}}
                <thead class="bg-gray-100 text-gray-700 border-b">
                    <tr class="text-xl font-bold uppercase tracking-wide">
                        <th class="py-5 px-6 text-left">#</th>
                        <th class="py-5 px-6 text-left">Agent Name</th>
                        <th class="py-5 px-6 text-left">Email</th>
                        <th class="py-5 px-6 text-left">Phone</th>
                        <th class="py-5 px-6 text-left">Balance</th>
                        <th class="py-5 px-6 text-left">Add Balance</th>
                    </tr>
                </thead>

                {{-- Body --}}
                <tbody class="divide-y divide-gray-200 text-gray-900">
                    @foreach($agents as $key => $agent)
                    <tr class="hover:bg-blue-50/60 transition-all cursor-pointer">

                        <td class="py-5 px-6 font-bold text-2xl">
                            {{ $key + 1 }}
                        </td>

                        <td class="py-5 px-6">
                            <div class="flex items-center gap-5">
                                <div class="h-14 w-14 flex items-center justify-center rounded-full 
                                            bg-blue-200 text-blue-800 font-bold text-3xl">
                                    {{ strtoupper(substr($agent->name, 0, 1)) }}
                                </div>
                                <span class="font-bold text-2xl">{{ $agent->name }}</span>
                            </div>
                        </td>

                        <td class="py-5 px-6 text-xl font-medium">
                            {{ $agent->email }}
                        </td>

                        <td class="py-5 px-6 text-xl font-medium">
                            {{ $agent->phone }}
                        </td>

                        <td class="py-5 px-6">
                            <span class="px-5 py-2 rounded-full bg-emerald-100 text-emerald-900 
                                          font-extrabold text-lg border border-emerald-300" id="old_bal_{{ $agent->id }}">
                                {{ number_format($agent->balance, 2) }}
                            </span> SAR
                        </td>
                        <td class="py-5 px-6">
    <div class="flex items-center gap-3">

        <input  
            type="number" 
            id="amount_{{ $agent->id }}" 
            value="0"
            class="w-24 text-center rounded-lg border border-gray-300 py-2 text-lg font-bold"
        >

        <button 
            onclick="addCreadit({{ $agent->id }})"
            class="bg-blue-600 text-white px-4 py-2 rounded-lg text-lg font-semibold hover:bg-blue-700"
        >
            Submit
        </button>

    </div>
</td>


                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>

</section>
<script>
function addCreadit(agentId) {

    let amount = document.getElementById(`amount_${agentId}`).value;

    if(amount === "" || amount <= 0){
        alert("Please enter a valid amount");
        return;
    }

    fetch("{{ url('/add-balance') }}", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": "{{ csrf_token() }}"
        },
        body: JSON.stringify({
            agent_id: agentId,
            amount: amount
        })
    })
    .then(response => response.ok ? response : Promise.reject(response))
    .then(() => {
        // SUCCESS → page reload
        location.reload();
    })
    .catch(error => {
        console.error(error);
        alert("Something went wrong!");
    });
}
</script>




@endsection
