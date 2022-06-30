<div>
    <button class="btn btn-danger" wire:click="$emit('triggerDelete',{{ $confirmId }})">
        Delete
    </button>
</div>

@push('scripts')

<script src="{{ asset('stisla/assets/js/page/modules-sweetalert.js') }}"></script>
<script >
  $(document).ready(function(){
        swal('Hello')
  })
</script>
@endpush
