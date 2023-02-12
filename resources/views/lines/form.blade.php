<x-app-layout>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Linha
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('lines.index') }}" class="btn btn-primary shadow-md mr-2">Voltar</a>
        </div>
        <div class="intro-y col-span-12">
            @if (empty($line->id))
                {!! Form::open([
                    'route' => 'lines.store',
                    'method' => 'post',
                    'class' => 'needs-validation',
                ]) !!}
            @else
                {!! Form::model($line, [
                    'route' => ['categories.update', $line->id],
                    'method' => 'put',
                    'class' => 'needs-validation',
                ]) !!}
            @endif
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <div class="sm:grid grid-cols-1 gap-2">
                    <div>
                        <label for="name" class="form-label">Name</label>
                        {!! Form::text('name', null, ['class' => 'form-control w-full', 'required' => 'required', 'id' => 'name']) !!}
                    </div>
                    <div>
                        <label for="iss" class="form-label">ISS</label>
                        {!! Form::select('iss', ['' => 'Selecione', '0' => 'Não', '1' => 'Sim'], null, [
                            'class' => 'form-select',
                            'required' => 'required',
                            'id' => 'iss',
                        ]) !!}
                    </div>
                    <div>
                        <label for="irpj" class="form-label">IRPJ</label>
                        {!! Form::select('irpj', ['' => 'Selecione', '0' => 'Não', '1' => 'Sim'], null, [
                                    'class' => 'form-select',
                                    'required' => 'required',
                                    'id' => 'irpj',
                                ]) !!}
                    </div>
                    <div>
                        <label for="csll" class="form-label">CSLL</label>
                        {!! Form::select('csll', ['' => 'Selecione', '0' => 'Não', '1' => 'Sim'], null, [
                                    'class' => 'form-select',
                                    'required' => 'required',
                                    'id' => 'csll',
                                ]) !!}
                    </div>
                    <div>
                        <label for="icms" class="form-label">ICMS</label>
                        {!! Form::select('icms', ['' => 'Selecione', '0' => 'Não', '1' => 'Sim'], null, [
                            'class' => 'form-select',
                            'required' => 'required',
                            'id' => 'icms',
                        ]) !!}
                    </div>
                    <div>
                        <label for="ipi" class="form-label">IPI</label>
                        {!! Form::select('ipi', ['' => 'Selecione', '0' => 'Não', '1' => 'Sim'], null, [
                                    'class' => 'form-select',
                                    'required' => 'required',
                                    'id' => 'ipi',
                                ]) !!}
                    </div>
                    <div>
                        <label for="pis" class="form-label">PIS</label>
                        {!! Form::select('pis', ['' => 'Selecione', '0' => 'Não', '1' => 'Sim'], null, [
                            'class' => 'form-select',
                            'required' => 'required',
                            'id' => 'pis',
                        ]) !!}
                    </div>
                    <div>
                        <label for="cofins" class="form-label">COFINS</label>
                        {!! Form::select('cofins', ['' => 'Selecione', '0' => 'Não', '1' => 'Sim'], null, [
                                    'class' => 'form-select',
                                    'required' => 'required',
                                    'id' => 'cofins',
                                ]) !!}
                    </div>
                    <div>
                        <label for="active" class="form-label">Ativo</label>
                        {!! Form::select('active', ['' => 'Selecione', '0' => 'Não', '1' => 'Sim'], null, [
                            'class' => 'form-select',
                            'required' => 'required',
                            'id' => 'active',
                        ]) !!}
                    </div>
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
