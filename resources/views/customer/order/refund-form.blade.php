<ul class="bg-white border rounded-sm absolute top-base3x
transition duration-150 ease-in-out min-w-full opacity-0">
    <li class="rounded-sm px-3 py-1 hover:bg-gray-100">
        <form class="block" method="POST" action="{{ route('refund.request', $order->id) }}">
            @csrf
            <input type="hidden" name="refund_method" value="bank">
            <button name="rekening" value="{{ auth()->user()->rekening }}" type="submit" title="Request refund" class="apperance-none w-full">
                Bank
            </button>
        </form>
    </li>
    <li class="px-3 py-1 hover:bg-gray-100">
        <form method="POST" class="block" action="{{ route('refund.request', $order->id) }}">
            @csrf
            <input type="hidden" name="refund_method" value="ovo">
            <button name="rekening" value="{{ auth()->user()->rekening }}" type="submit" title="Request refund"
                class="apperance-none w-full">
                OVO
            </button>
        </form>
    </li>
</ul>
