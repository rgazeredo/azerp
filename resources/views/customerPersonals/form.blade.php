<x-app-layout>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
             Cliente
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('customer-personals.index') }}" class="btn btn-primary shadow-md mr-2">Voltar</a>
        </div>
        <div class="intro-y col-span-12">
            @if (empty($customer->id))
                {!! Form::open([
                    'route' => 'customer-personals.store',
                    'method' => 'post',
                    'class' => 'needs-validation',
                ]) !!}
            @else
                {!! Form::model($customer, [
                    'route' => ['customer-personals.update', $customer->id],
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
                        <label for="name" class="form-label">CPF</label>
                        {!! Form::text('ein', null, ['class' => 'form-control cpf', 'required' => 'required', 'id' => 'register']) !!}
                    </div>
                    <div>
                        <label for="name" class="form-label">E-mail</label>
                        {!! Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'id' => 'email']) !!}
                    </div>
                    <div>
                        <label for="name" class="form-label">Gênero</label>
                        {!! Form::select('gender', ['' => 'Selecione', '0' => 'Masculino', '1' => 'Feminino', '2' => 'Outros'], null, [
                            'class' => 'form-select',
                            'id' => 'gender',
                        ]) !!}
                    </div>
                    <div>
                        <label for="name" class="form-label">Aniversário</label>
                        {!! Form::date('birthday', null, ['class' => 'form-control', 'id' => 'birthday']) !!}
                    </div>
                    <div>
                        <label for="name" class="form-label">Telefone</label>
                        {!! Form::text('phone', null, [
                                    'class' => 'form-control phone',
                                    'required' => 'required',
                                    'id' => 'phone_number',
                                ]) !!}
                    </div>
                    <div>
                        <label for="name" class="form-label">Ramal</label>
                        {!! Form::text('extention', null, ['class' => 'form-control', 'id' => 'extention']) !!}
                    </div>
                    <div>
                        <label for="name" class="form-label">Whatsapp</label>
                        {!! Form::select('whatsapp', ['' => 'Selecione', '0' => 'Não', '1' => 'Sim'], null, [
                            'class' => 'form-select',
                            'id' => 'whatsapp',
                        ]) !!}
                    </div>
                    <div>
                        <label for="name" class="form-label">Perfil</label>
                        {!! Form::select('customer_profile_id', $customerProfiles, null, [
                                    'class' => 'form-select',
                                    'required' => 'required',
                                    'id' => 'customer_profiles',
                                ]) !!}
                    </div>
                    <div>
                        <label for="name" class="form-label">Status</label>
                        {!! Form::select('customer_status_id', $customerStatuses, null, [
                            'class' => 'form-select',
                            'required' => 'required',
                            'id' => 'customer_statuses',
                        ]) !!}
                    </div>
                    <div>
                        <label for="name" class="form-label">Setor</label>
                        {!! Form::select('sector_id', $sectors, null, ['class' => 'form-select', 'id' => 'sectors']) !!}
                    </div>
                    <div>
                        <label for="name" class="form-label">Carteira</label>
                        {!! Form::select('wallet_id', $wallets, null, ['class' => 'form-select', 'id' => 'wallets']) !!}
                    </div>
                    <div>
                        <label for="name" class="form-label">Desconto</label>
                        {!! Form::select(
                            'profile_off',
                            [
                                '' => 'Selecione',
                                '0' => '0',
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                                '5' => '5',
                                '6' => '6',
                                '7' => '7',
                                '8' => '8',
                                '9' => '9',
                                '10' => '10',
                            ],
                            null,
                            ['class' => 'form-control', 'id' => 'profile_off'],
                        ) !!}
                    </div>
                    <div>
                        <label for="name" class="form-label">Produto Aprovado</label>
                        {!! Form::select('approved_product', ['' => 'Selecione', '0' => 'Não', '1' => 'Sim'], null, [
                            'class' => 'form-select',
                            'id' => 'approved_product',
                        ]) !!}
                    </div>
                    <div>
                        <label for="name" class="form-label">Crédito</label>
                        {!! Form::select('credit', ['' => 'Selecione', '0' => 'Não', '1' => 'Sim'], null, [
                                    'class' => 'form-select',
                                    'id' => 'credit',
                                ]) !!}
                    </div>
                    <div>
                        <label for="name" class="form-label">Comentário</label>
                        {!! Form::text('comment', null, ['class' => 'form-control', 'id' => 'comment']) !!}
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
