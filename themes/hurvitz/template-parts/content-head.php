<?php
/**
 * Template part for content head
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package hurvitz
 */

$hurvitz_acf_pro = class_exists('acf_pro');
?>

<div class="site-content__head">
	<div class="left-menu">
		<div class="left-menu__sidebar-btn">
            <i class="icon-menu"></i>
        </div>
		<div class="left-menu__menu-list">
			<?php if($hurvitz_acf_pro):
				$hurvitz_main_menu = hurvitz_main_menu();
				if ( !empty($hurvitz_main_menu)):
					echo esc_html($hurvitz_main_menu);
				endif;
			endif; ?>
        </div>
		<div class="left-menu__download">
            <?php
            if ($hurvitz_acf_pro) :
	            $upload_you_cv = get_field('upload_you_cv', 'option');
	            if ( !empty($upload_you_cv) ) :
		            $upload_you_cv_url = $upload_you_cv['url'];
	            else :
		            $upload_you_cv_url = '#';
	            endif; ?>
                <a class="left-menu__download-btn" href="<?php echo esc_attr($upload_you_cv_url) ?>" download>
                    <i class="icon-cloud-download"></i>
                </a>
            <?php endif; ?>
        </div>
	</div>

    <?php
    if ($hurvitz_acf_pro): ?>
        <div class="person">
           <?php  $avatar = get_field('avatar', 'option');
            $name = get_field('name', 'option');
            $position_group = get_field('position_group', 'option');
            $socials_group = get_field('socials_group', 'option');

            if ( !empty($avatar)): ?>
                <div class="person__avatar">
                    <img class="s-img-switch" src="<?php echo esc_attr($avatar['url']);?>" alt="<?php echo esc_attr($avatar['title']);?>">
                </div>
            <?php endif; ?>

            <div class="person__info">
                <?php if ( !empty($name)): ?>
                    <h2 class="person__name"><?php echo esc_html($name);?></h2>
                <?php endif;

                if ( !empty($position_group)): ?>
                    <div class="person__position">
                        <?php foreach( $position_group as $position ) : ?>
                            <span><?php echo esc_html($position['position']);?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif;

                if ( !empty($socials_group)): ?>
                    <div class="person__socials">
                        <ul class="person__socials-list">
                            <?php foreach( $socials_group as $social ): ?>
                                <li>
                                    <a href="<?php echo esc_attr($social['social_url']);?>">
                                        <i class="<?php echo esc_attr($social['social']->class);?>"></i>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>

        </div>

    <?php endif; ?>

</div>
