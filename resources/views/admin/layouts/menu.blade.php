<li class="list-header">MENU</li>
<li>
  <a href="#">
    <i class="fa fa-share-square-o"></i>
    <span class="menu-title">Cadastro</span>
    <i class="arrow"></i>
  </a>
  <ul class="collapse" aria-expanded="false">
    {!!Html::menuItem('Usuarios',route('admin.User.create'),'usuarios*','fa fa-user-plus')!!}
    {!!Html::menuItem('Areas',route('admin.Area.create'),'usuarios*','fa fa-plus')!!}
  </ul>
</li>
<li>
  <a href="#">
    <i class="fa fa-wrench"></i>
    <span class="menu-title">Manutenção</span>
    <i class="arrow"></i>
  </a>
  <ul class="collapse" aria-expanded="false">
    {!!Html::menuItem('Usuarios',route('admin.User.index'),'usuarios*','fa fa-user')!!}
    {!!Html::menuItem('Areas',route('admin.Area.index'),'usuarios*','fa fa-pencil-square-o')!!}
  </ul>
</li>
{!!Html::menuItem('Agendamentos','#','usuarios*','fa fa-calendar')!!}
