<x-app-layout>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Usuário
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('users.index') }}" class="btn btn-primary shadow-md mr-2">Voltar</a>
        </div>
        <div class="intro-y col-span-12">
            @if (empty($user->id))
                {!! Form::open([
                    'route' => 'users.store',
                    'method' => 'post',
                    'class' => 'needs-validation',
                ]) !!}
            @else
                {!! Form::model($user, [
                    'route' => ['users.update', $user->id],
                    'method' => 'put',
                    'class' => 'needs-validation',
                ]) !!}
            @endif
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <div class="sm:grid grid-cols-2 gap-2">
                    <div>
                        <label for="name" class="form-label">Nome</label>
                        {!! Form::text('name', null, ['class' => 'form-control w-full', 'required' => 'required', 'id' => 'name']) !!}
                    </div>
                    <div>
                        <label for="email" class="form-label">E-mail</label>
                        {!! Form::email('email', null, ['class' => 'form-control w-full', 'required' => 'required', 'id' => 'email']) !!}
                    </div>
                </div>
                @if (empty($user->id))
                    <div class="sm:grid grid-cols-2 gap-2 mt-3">
                        <div>
                            <label for="password" class="form-label">Senha</label>
                            {!! Form::password('password', ['class' => 'form-control w-full', 'required' => 'required', 'id' => 'password']) !!}
                        </div>
                        <div>
                            <label for="password_confirmation" class="form-label">Confirmar senha</label>
                            {!! Form::password('password_confirmation', [
                                'class' => 'form-control w-full',
                                'required' => 'required',
                                'id' => 'password_confirmation',
                            ]) !!}
                        </div>
                    </div>
                @endif
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
