    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
      <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="<?=media();?>/img/uploads/avatar.jpg" alt="User Image">
        <div>
          <p class="app-sidebar__user-name"><?= $_SESSION['userData']['nombres']; ?></p>
          <p class="app-sidebar__user-designation"><?= $_SESSION['userData']['nombrerol']; ?></p>
        </div>
      </div>
    <ul class="app-menu">
      <?php if(!empty($_SESSION['permisos'][1]['r'])){ ?>
        <li>
            <a class="app-menu__item" href="<?= base_url();?>/dashboard">
            <i class="app-menu__icon fa fa-dashboard"></i>
            <span class="app-menu__label">Dashboard</span></a>
        </li>
        <?php } ?>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview">
                <i class="app-menu__icon fas fa-users" aria-hidden="true"></i>
                <span class="app-menu__label">Usuarios</span>
                <i class="treeview-indicator fa fa-angle-right"></i>
            </a>
          <ul class="treeview-menu">
          <?php if(!empty($_SESSION['permisos'][2]['r'])){ ?>
          <li>
              <a class="treeview-item" href="<?= base_url();?>/usuarios">
              <i class="icon fa fa-circle-o">
              </i> Usuarios
            </a>
        </li>
            <li>
                <a class="treeview-item" href="<?= base_url();?>/roles">
                <i class="icon fa fa-circle-o">
                </i> Roles
                </a>
            </li>
            
          </ul>
          <?php } ?>
        </li>
        <?php if(!empty($_SESSION['permisos'][5]['r'])){ ?>
        <li>
            <a class="app-menu__item" href="<?= base_url();?>/contabilidad">
            <i class="fas fa-pencil-alt" aria-hidden="true"></i> 
            </i><span class="app-menu__label" > Contabilidad
            </span>
            </a>
        </li>
            <?php } ?>

        <li>
            <a class="app-menu__item" href="<?= base_url();?>/logout">
            <i class="app-menu__icon fa fa-sign-out" aria-hidden="true"></i>
            </i><span class="app-menu__label">logout
            </span></a>
        </li>
    </ul>
    </aside>