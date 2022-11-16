<?php
/**
 * Displays After header menu
 *
 * @package RSPL_theme
 */



if ( !is_user_logged_in() ) { 
  ?>

  <nav class="container alignwide after-header-menu__wrap after-header-menu_not-authorized">
    <ul class="after-header-menu__list justify-center">
      <li class="after-header-menu__item">
        <a href="<?php echo home_url( '/my-courses' ) ?>" class="after-header-menu__link">
          <svg class="svg-icon after-header-menu__icon" width="26" height="26" aria-hidden="true" role="img" focusable="false" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M15.364 16.718l1.688-7.955c0.149-0.7-0.253-0.976-0.712-0.804l-9.918 3.823c-0.677 0.264-0.666 0.643-0.115 0.815l2.537 0.792 5.889-3.708c0.275-0.184 0.528-0.080 0.321 0.103l-4.764 4.305-0.184 2.617c0.264 0 0.379-0.115 0.517-0.253l1.24-1.194 2.571 1.894c0.471 0.264 0.804 0.126 0.93-0.436zM22.286 12c0 5.682-4.603 10.286-10.286 10.286s-10.286-4.603-10.286-10.286 4.603-10.286 10.286-10.286 10.286 4.603 10.286 10.286z"></path></svg>
          Вход в личный кабинет
        </a>
      </li>
      <li class="after-header-menu__item">
        <a href="<?php echo home_url( '/katalog-produktov' ) ?>" class="after-header-menu__link">
          <svg class="svg-icon after-header-menu__icon" width="26" height="26" aria-hidden="true" role="img" focusable="false" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M15.364 16.718l1.688-7.955c0.149-0.7-0.253-0.976-0.712-0.804l-9.918 3.823c-0.677 0.264-0.666 0.643-0.115 0.815l2.537 0.792 5.889-3.708c0.275-0.184 0.528-0.080 0.321 0.103l-4.764 4.305-0.184 2.617c0.264 0 0.379-0.115 0.517-0.253l1.24-1.194 2.571 1.894c0.471 0.264 0.804 0.126 0.93-0.436zM22.286 12c0 5.682-4.603 10.286-10.286 10.286s-10.286-4.603-10.286-10.286 4.603-10.286 10.286-10.286 10.286 4.603 10.286 10.286z"></path></svg>
          Каталог продуктов
        </a>
      </li>   
    </ul>
  </nav>

<?php }
else {
  $current_user = wp_get_current_user();
  ?>

  <nav class="container alignwide after-header-menu__wrap after-header-menu_authorized">
    <ul class="after-header-menu__list">
      <li class="after-header-menu__item">
        <a href="<?php echo home_url( 'my-courses' ) ?>" class="after-header-menu__link">
          <span class="after-header-menu__icon after-header-menu__icon-user"></span>
          Кабинет
        </a>
      </li>
      <li class="after-header-menu__item">
        <a href="<?php echo home_url( '/katalog-produktov' ) ?>" class="after-header-menu__link">
          <span class="after-header-menu__icon after-header-menu__icon-tree"></span>
          Каталог продуктов
        </a>
      </li>
      <li class="after-header-menu__item">
        <a href="<?php echo home_url( '/izbrannoe' ) ?>" class="after-header-menu__link">
        <span class="after-header-menu__icon after-header-menu__icon-fav "></span>
          Избранное
        </a>
      </li>
      <li class="after-header-menu__item">
        <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="after-header-menu__link">
        <span class="after-header-menu__icon after-header-menu__icon-cart"></span>
          Корзина
        </a>
      </li>
      <li class="after-header-menu__item">
        <a href="<?php echo home_url( '/profil' ) ?>" class="after-header-menu__link">
          <span class="after-header-menu__icon after-header-menu__icon-gear"></span>
          Профиль
        </a>
      </li>
    </ul>
  </nav>

<?php }
