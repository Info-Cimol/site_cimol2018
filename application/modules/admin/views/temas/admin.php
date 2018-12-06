<?php
require_once($this->config->item("base_dir").'public/temas/admin/header.php');
//require_once($this->config->item("base_dir").'public/temas/admin/nav.php');
?>
<div class="span3">
    <div class="sidebar">
        <ul class="widget widget-menu unstyled">
            
            <li><a href="<?php echo base_url();  ?>admin/noticia/"><i class="menu-icon icon-bullhorn"></i>Notícias </a>
            </li>
            <li><a href="<?php echo base_url();  ?>admin/mensagem/"><i class="menu-icon icon-inbox"></i>Mensagens <b class="label green pull-right">
                11</b> </a></li>
            <li><a href="<?php echo base_url();  ?>admin/aviso/"><i class="menu-icon icon-pushpin"></i>Avisos <b class="label orange pull-right">
                19</b> </a></li>
        </ul>
        <!--/.widget-nav-->
        
        
        <ul class="widget widget-menu unstyled">
            <li><a href="<?php echo base_url();  ?>admin/curso/"><i class="menu-icon icon-th-list"></i> Cursos </a></li>
            <li><a href="<?php echo base_url();  ?>admin/disciplina/"><i class="menu-icon icon-list"></i>Disciplinas </a></li>
            <li><a href="<?php echo base_url();  ?>admin/turma/"><i class="menu-icon icon-list"></i>Turmas </a></li>
            <li><a href="<?php echo base_url();  ?>admin/professor/"><i class="menu-icon icon-list"></i>Professores </a></li>
            <li><a href="<?php echo base_url();  ?>admin/aluno/"><i class="menu-icon icon-list"></i>Alunos </a></li>
            <li><a href="<?php echo base_url();  ?>admin/matriculas/"><i class="menu-icon icon-pencil"></i>Matriculas </a></li>
        </ul>
        <!--/.widget-nav-->
        <ul class="widget widget-menu unstyled">
            <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
            </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
            </i>Outras páginas </a>
                <ul id="togglePages" class="collapse unstyled">
                    <li><a href="<?php echo base_url();  ?>login/"><i class="icon-inbox"></i>Login </a></li>
                    <li><a href="<?php echo base_url();  ?>perfil/"><i class="icon-inbox"></i>Perfil </a></li>
                    <li><a href="<?php echo base_url();  ?>admin/usuario/"><i class="icon-inbox"></i>Usuários</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="<?php echo base_url();  ?>logout/"></i>Logout </a></li>
        </ul>
    </div>
    <!--/.sidebar-->
</div>
<!--/.span3-->
<?php
require_once($this->config->item("base_dir").'public/temas/admin/content.php');
require_once(APPPATH."modules/admin/views/".$template.".php");
require_once($this->config->item("base_dir").'public/temas/admin/footer.php');
