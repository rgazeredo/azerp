<x-app-layout>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
             Endereço
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('costumerAddresses.index') }}" class="btn btn-primary shadow-md mr-2">Voltar</a>
        </div>
        <div class="intro-y col-span-12">
            @if (empty($costumerAddress->id))
                {!! Form::open([
                    'route' => 'costumer.contacts.store',
                    'method' => 'post',
                    'class' => 'needs-validation',
                ]) !!}
            @else
                {!! Form::model($costumerAddress, [
                    'route' => ['costumer-contacts.update', $costumerAddress->id],
                    'method' => 'put',
                    'class' => 'needs-validation',
                ]) !!}
            @endif
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <div class="sm:grid grid-cols-1 gap-2">
                    <div>
                        <label for="name" class="form-label">Name</label>
                        {!! Form::text('name', null, ['class' => 'form-control', 'required' => 'required', 'id' => 'name']) !!}
                    </div>
                    <div>
                        <label for="zipcode" class="form-label">CEP</label>
                        {!! Form::text('zipcode', null, ['class' => 'form-control phone', 'required' => 'required', 'id' => 'zipcode']) !!}
                    </div>
                    <div>
                        <label for="street" class="form-label">Endereço</label>
                        {!! Form::text('street', null, ['class' => 'form-control phone', 'id' => 'street']) !!}
                    </div>
                    <div>
                        <label for="number" class="form-label">Número</label>
                        {!! Form::text('number', null, ['class' => 'form-control', 'required' => 'required', 'id' => 'number']) !!}
                    </div>
                    <div>
                        <label for="complement" class="form-label">Complemento</label>
                        {!! Form::text('complement', null, ['class' => 'form-control', 'required' => 'required', 'id' => 'complement']) !!}
                    </div>
                    <div>
                        <label for="district" class="form-label">Bairro</label>
                        {!! Form::text('district', null, ['class' => 'form-control', 'required' => 'required', 'id' => 'district']) !!}
                    </div>
                    <div>
                        <label for="city" class="form-label">Cidade</label>
                        {!! Form::text('city', null, ['class' => 'form-control', 'required' => 'required', 'id' => 'city']) !!}
                    </div>
                    <div>
                        <label for="state" class="form-label">Complemento</label>
                        {!! Form::text('state', null, ['class' => 'form-control', 'required' => 'required', 'id' => 'state']) !!}
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
</x-app-layout>
