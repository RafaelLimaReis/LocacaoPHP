<li class="header">MENU</li>
<li class="treeview">
    <a href="#">
        <i class="fa fa-share-square-o"></i>
        <span>Cadastro</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right-container"></i>
        </span>
    </a>
    <ul class="treeview-menu" style="display: none;">
        {!!Html::menuItem('Usuarios',route('admin.registerUser.create'),'usuarios*','fa fa-user-plus')!!}
        {!!Html::menuItem('Areas','#','usuarios*','fa fa-plus')!!}
    </ul>
</li>
<li class="treeview">
    <a href="#">
            <i class="fa fa-wrench"></i>
            <span>Manutenção</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right-container"></i>
        </span>
    </a>
    <ul class="treeview-menu" style="display: none;">
        {!!Html::menuItem('Usuarios','#','usuarios*','fa fa-user')!!}
        {!!Html::menuItem('Areas','#','usuarios*','fa fa-pencil-square-o')!!}
    </ul>
</li>
{!!Html::menuItem('Agendamentos','#','usuarios*','fa fa-calendar')!!}