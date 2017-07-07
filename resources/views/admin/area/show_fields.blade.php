<p>
    <span class="text-bold">Id:</span>
    {!! $area->id !!}
</p>

<p>
    <span class="text-bold">Nome:</span>
    {!! $area->name !!}
</p>

<p>
    <span class="text-bold">Descrição:</span>
    {!! $area->description !!}
</p>

<p>
    <span class="text-bold">Numero:</span>
    {!! $area->number !!}
</p>

<p>
    <span class="text-bold">Criado em:</span>
    {!! $area->present()->created_at !!}
</p>

<p>
    <span class="text-bold">Ultima atualização:</span>
    {!! $area->present()->updated_at !!}
</p>