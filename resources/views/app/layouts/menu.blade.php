<li class="list-header">MENU</li>
{!!Html::menuItem('Agendar Horario',route('app.reserves.index'),'usuarios*','fa fa-calendar')!!}
<li>
  <a href="#">
    <i class="fa fa-wrench"></i>
    <span class="menu-title">Meus Horarios</span>
    <i class="arrow"></i>
  </a>
  <ul class="collapse" aria-expanded="false">
    {!!Html::menuItem('Finalizados','#','usuarios*','fa fa-backward')!!}
    {!!Html::menuItem('Proximos','#','usuarios*','fa fa-forward')!!}
  </ul>
</li>
