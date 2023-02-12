<x-app-layout>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            produtos
        </h2>
    </div>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
            <a href="{{ route('products.index') }}" class="btn btn-primary shadow-md mr-2">Voltar</a>
        </div>
        <div class="intro-y col-span-12">
            @if (empty($product->id))
                {!! Form::open([
                    'route' => 'products.store',
                    'method' => 'post',
                    'class' => 'needs-validation',
                ]) !!}
            @else
                {!! Form::model($product, [
                    'route' => ['products.update', $product->id],
                    'method' => 'put',
                    'class' => 'needs-validation',
                ]) !!}
            @endif
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <div class="sm:grid grid-cols-1 gap-2">
                    <div>
                        <label for="name" class="form-label">Nome</label>
                        {!! Form::text('name', null, ['class' => 'form-control w-full', 'required' => 'required', 'id' => 'name']) !!}
                    </div>
                    <div>
                        <label for="category_id" class="form-label">Categorias</label>
                        {!! Form::select('category_id',$categories, null, ['class' => 'form-select', 'required' => 'required', 'id' => 'categories']) !!}
                    </div>
                    <div>
                        <label for="reinforcement" class="form-label">Reforço</label>
                        {!! Form::select('reinforcement', ['' => 'Selecione', '0' => 'Não', '1' => 'Sim'], null, ['class' => 'form-select', 'required' => 'required']) !!}
                    </div>
                    <div>
                        <label for="print" class="form-label">Impressão</label>
                        {!! Form::select('print', ['' => 'Selecione', '0' => 'Não', '1' => 'Sim'], null, ['class' => 'form-select', 'required' => 'required']) !!}
                    </div>
                    <div>
                        <label for="name" class="form-label">Cor</label>
                        {!! Form::select('colors',['' => 'Selecione', '1' , '2'], null, ['class' => 'form-select', 'required' => 'required']) !!}
                    </div>
                    <div>
                        <label for="color" class="form-label">Cor1</label>
                        {!! Form::text('color1', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div>
                        <label for="color2" class="form-label">Cor2</label>
                        {!! Form::text('color2', null, ['class' => 'form-control']) !!}
                    </div>
                    <div>
                        <label for="roll_quantity" class="form-label">Quantidade de rolos</label>
                        {!! Form::text('roll_quantity', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div>
                        <label for="roll_weight" class="form-label">Peso do rolo</label>
                        {!! Form::text('roll_weight', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div>
                        <label for="roll_length" class="form-label">Comprimento do rolo</label>
                        {!! Form::text('roll_length', null, ['class' => 'form-control', 'required' => 'required']) !!}
                    </div>
                    <div>
                        <label for="Active" class="form-label">Ativo</label>
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
