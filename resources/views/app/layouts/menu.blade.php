<li class="header">MENU</li>
{!!Html::menuItem('Agendar Horario',route('app.reserves.index'),'usuarios*','fa fa-calendar')!!}
<li class="treeview">
    <a href="#">
            <i class="fa fa-wrench"></i>
            <span>Meus Horarios</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right-container"></i>
        </span>
    </a>
    <ul class="treeview-menu" style="display: none;">
        {!!Html::menuItem('Finalizados','#','usuarios*','fa fa-backward')!!}
        {!!Html::menuItem('Proximos','#','usuarios*','fa fa-forward')!!}
    </ul>
</li>