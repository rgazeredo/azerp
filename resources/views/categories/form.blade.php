<x-app-layout>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Categorias
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('categories.index') }}" class="btn btn-primary shadow-md mr-2">Voltar</a>
        </div>
        <div class="intro-y col-span-12">
            @if (empty($category->id))
                {!! Form::open([
                    'route' => 'categories.store',
                    'method' => 'post',
                    'class' => 'needs-validation',
                ]) !!}
            @else
                {!! Form::model($category, [
                    'route' => ['categories.update', $category->id],
                    'method' => 'put',
                    'class' => 'needs-validation',
                ]) !!}
            @endif
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <div class="sm:grid grid-cols-1 gap-2">
                    <div>
                        <label for="name" class="form-label">Linha de Produto</label>
                        {!! Form::select('line_id',$lines, null, ['class' => 'form-select', 'required' => 'required', 'id' => 'lines']) !!}
                    </div>
                    <div>
                        <label for="name" class="form-label">Name</label>
                        {!! Form::text('name', null, ['class' => 'form-control w-full', 'required' => 'required', 'id' => 'name']) !!}
                    </div>
                    <div>
                        <label for="name" class="form-label">Ecológico</label>
                        {!! Form::select('ecological',  ['' => 'Selecione', '0' => 'Não', '1' => 'Sim'], null, ['class' => 'form-select', 'required' => 'required']) !!}
                    </div>
                    <div>
                        <label for="name" class="form-label">Ativo</label>
                        {!! Form::select('active', ['' => 'Selecione', '0' => 'Não', '1' => 'Sim'], null, ['class' => 'form-select', 'required' => 'required', 'id' => 'active']) !!}
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
