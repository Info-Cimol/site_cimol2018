<?php

require_once($this->config->item("base_dir").'public/temas/admin/header.php');
?>

                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><a href="<?php echo base_url();  ?>admin/noticia/"><i class="menu-icon icon-pushpin"></i>Notícia
                                </a></li>
                                <li><a href="<?php echo base_url();  ?>admin/imagem/"><i class="menu-icon icon-picture"></i>Imagens </a>
                                </li>
                                <li><a href="<?php echo base_url();  ?>admin/evento/"><i class="menu-icon icon-flag"></i>Eventos<b class="label green pull-right">
                                    11</b> </a></li>
                                <li><a href="<?php echo base_url();  ?>admin/usuario/"><i class="menu-icon icon-user"></i>Usuarios <b class="label orange pull-right">
                                    19</b> </a></li>
                            </ul>
                            <!--/.widget-nav-->
                            
                            
                            <ul class="widget widget-menu unstyled">
                            	 <li><a href="ui-button-icon.html"><i class="menu-icon icon-blackboard"></i> Cursos </a></li>
                                <li><a href="ui-button-icon.html"><i class="menu-icon icon-bold"></i> Turmas </a></li>
                                <li><a href="ui-typography.html"><i class="menu-icon icon-book"></i>Disciplinas </a></li>
                                <li><a href="form.html"><i class="menu-icon icon-education"></i>Professores </a></li>
                                <li><a href="table.html"><i class="menu-icon icon-table"></i>Alunos </a></li>
                                <li><a href="charts.html"><i class="menu-icon icon-bar-chart"></i>Matriculas </a></li>
                            </ul>
                            <!--/.widget-nav-->
                            <ul class="widget widget-menu unstyled">
                                <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Mais </a>
                                    <ul id="togglePages" class="collapse unstyled">
                                        <li><a href="other-login.html"><i class="icon-signin"></i>Login </a></li>
                                        <li><a href="other-user-profile.html"><i class="icon-user"></i>Perfil </a></li>
                                        
                                    </ul>
                                </li>
                                <li><a href="#"><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        </div>
                        <!--/.sidebar-->
                    </div>
<?php
require_once($this->config->item("base_dir").'public/temas/admin/content.php');
require_once(APPPATH."modules/admin/views/".$content.".php");

require_once($this->config->item("base_dir").'public/temas/admin/footer.php');
