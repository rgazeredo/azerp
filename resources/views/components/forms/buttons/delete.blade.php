@props(['route'])
<form action="{{ $route }}" method="POST">
    @csrf
    @method('delete')
    <button class="flex items-center text-danger deleteElement" type="button">
        <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Remover
    </button>
</form>
