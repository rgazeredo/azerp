{{-- <x-app-layout>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Chamada
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('costumer-contacts.index') }}" class="btn btn-primary shadow-md mr-2">Voltar</a>
        </div>
        <div class="intro-y col-span-12">
            @if (empty($costumerCall->id))
                {!! Form::open([
                    'route' => 'costumer.contacts.store',
                    'method' => 'post',
                    'class' => 'needs-validation',
                ]) !!}
            @else
                {!! Form::model($costumerCall, [
                    'route' => ['costumer-contacts.update', $costumerCall->id],
                    'method' => 'put',
                    'class' => 'needs-validation',
                ]) !!}
            @endif
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <div class="sm:grid grid-cols-1 gap-2">
                    <div>
                        <label for="description" class="form-label">Discrição</label>
                        {!! Form::text('description', null, ['class' => 'form-control', 'required' => 'required', 'id' => 'description']) !!}
                    </div>
                <div class="text-right mt-5">
                    <button type="reset" class="btn btn-outline-secondary w-24 mr-1">Cancelar</button>
                    <button type="submit" class="btn btn-primary w-24">Salvar</button>
                </div>
            </div>
            {!! Form::close() !!}
            <!-- END: Form Layout -->
        </div>
    </div>
</x-app-layout> --}}
