<nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo (base_url()); ?>admin/home">Escritorio</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
                <!--
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-dashboard"></i>
                    </a>
                </li>
                -->
                
                <li id="li-form-search">
                    <i class="fa fa-search"></i>
                    <form id="search_form" method="POST" action="<?php echo (base_url()); ?>admin/busqueda">
                        <fieldset id="search_form_input">
                            <input type="text" name="term" id="term" pattern=".{0}|.{4,}" placeholder="Busqueda ..." />
                        </fieldset>         
                    </form>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <!--
                <li>
                   <a href="">
                       Account
                    </a>
                </li>
                <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            Dropdown
                            <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                      </ul>
                </li>
                -->
                <li>
                	<a href="<?php echo base_url('admin/auth/logout'); ?>">
                		Salir
                	</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
