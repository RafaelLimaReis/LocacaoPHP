<p>
  <span class="text-bold">Id:</span>
  {!! $user->id !!}
</p>

<p>
  <span class="text-bold">Nome:</span>
  {!! $user->name !!}
</p>

<p>
  <span class="text-bold">Email:</span>
  {!! $user->email !!}
</p>

<p>
  <span class="text-bold">Nome de Usuario:</span>
  {!! $user->username !!}
</p>

<p>
  <span class="text-bold">Telefone:</span>
  {!! $user->phone !!}
</p>

<p>
  <span class="text-bold">Tipo:</span>
  {!! $user->present()->type !!}
</p>

<p>
  <span class="text-bold">Criado em:</span>
  {!! $user->present()->created_at !!}
</p>
