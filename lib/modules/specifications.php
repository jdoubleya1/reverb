<?php

/**
 * Module: Specifications
 *
 * @since   1.0.0
 * @package reverb
 */

// Exit if accessed directly.
if (!defined('ABSPATH')) {
    exit();
}

function rvb_module_specifications($module, $fields, $layout)
{
    if (empty($module)) {
        return;
    }

    if (empty($layout)) {
        return;
    }

    switch ($layout) {
        case rvb_module_disable($module):
            break;
        case 'specifications_1':
            rvb_module_specifications_1($module, $fields);
            break;
        case 'specifications_2':
            rvb_module_specifications_2($module, $fields);
            break;
        case 'specifications_3':
            rvb_module_specifications_3($module, $fields);
            break;
        case 'specifications_4':
            rvb_module_specifications_4($module, $fields);
            break;
        case 'specifications_5':
            rvb_module_specifications_5($module, $fields);
            break;
        case 'specifications_6':
            rvb_module_specifications_6($module, $fields);
            break;
        case 'specifications_7':
            rvb_module_specifications_7($module, $fields);
            break;
        case 'specifications_8':
            rvb_module_specifications_8($module, $fields);
            break;
        case 'specifications_9':
            rvb_module_specifications_9($module, $fields);
            break;
    }
}

/**
 * Module: Specifications 1
 */
function rvb_module_specifications_1($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    console_log($fields);

    // left specifications
    $left = $fields['specifications_left'];
    $specs_left = $left['specifications'];

    // right specifications
    $right = $fields['specifications_right'];
    $specs_right = $right['specifications'];

    rvb_module_container_open($module, '');
    rvb_module_row_open('align-items-lg-center');
    rvb_module_column_open('col-12 col-lg-2 offset-lg-1text-end');
    rvb_component_heading($module, $left, 'h4', 'my-4 gs_reveal', '', 0);

    echo '<ul class="list-unstyled">';
    foreach ($specs_left as $spec):
        $title = $spec['title'];
        $excerpt = $spec['excerpt'];

        echo '<li class="mt-4">';
        echo $title
            ? '<p class="fs-lg font-weight-bolder mb-0">' . $title . '</p>'
            : '';
        echo $excerpt ? $excerpt : '';
        echo '</li>';
    endforeach;
    echo '</ul>';
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-4 offset-lg-1');
    rvb_component_image($fields, $fields['block_image'], 'large', '', '', 0);
    rvb_module_column_close();
    rvb_module_column_open('col-12 col-lg-2 offset-lg-1');
    rvb_component_heading($module, $right, 'h4', 'my-4 gs_reveal', '', 0);
    // <ul class="list-unstyled">
    // 	foreach ($specs_right as $spec) :
    // 		$title = $spec['title'];
    // 		$excerpt = $spec['excerpt'];

    // 		echo '<li class="mt-4">';
    // 		echo $title ? '<p class="fs-lg font-weight-bolder mb-0">' . $title . '</p>' : '';
    // 		echo $excerpt ? $excerpt : '';
    // 		echo '</li>';
    // 	endforeach;
    // </ul>
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}

/**
 * Module: Specifications 2
 */
function rvb_module_specifications_2($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open('');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}
/*
$specs = get_sub_field('specifications');
?>


<div class="row align-items-lg-center">
	<div class="col-12 col-lg-3 offset-lg-1">
		<?php heading('h4', ''); ?>

		<ul class="list-unstyled">
			<?php
			foreach ($specs as $spec) :
				$title = $spec['title'];
				$excerpt = $spec['excerpt'];

				echo '<li class="mt-5">';
				echo $title ? '<p class="fs-lg font-weight-bolder mb-0">' . $title . '</p>' : '';
				echo $excerpt ? $excerpt : '';
				echo '</li>';
			endforeach;
			?>
		</ul>
	</div>
	<div class="col-12 col-lg-7 text-center">
		<?php image(''); ?>
	</div>
</div>
 */

/**
 * Module: Specifications 3
 */
function rvb_module_specifications_3($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open('');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}
/*
// left specifications
$left = get_sub_field('specifications_left');
$heading_l = $left['heading'];
$specs_left = $left['specifications'];

// right specifications
$right = get_sub_field('specifications_right');
$heading_r = $right['heading'];
$specs_right = $right['specifications'];
?>


<div class="row">
	<div class="col-12 col-lg-8 offset-lg-2 text-center">
		<?php heading('h3', 'mb-4'); ?>
	</div>
</div>
<div class="row align-items-lg-center">
	<div class="col-12 col-lg-6text-end">
		<?php echo $heading_l ? '<h4 class="mb-2">' . $heading_l . '</h4>' : ''; ?>

		<ul class="list-unstyled">
			<?php
			foreach ($specs_left as $spec) :
				$title = $spec['title'];
				$sub_heading = $spec['sub_heading'];
				$excerpt = $spec['excerpt'];
				$image = $spec['image'];
				$button = $spec['button_single'];

				if ($button) {
					$btn_style = '';
					$btn_title = '';
					$btn_icon = '';
					$btn_url = '';
					$btn_target = '';
					$btn_link = '';

					if ($button['button_style']) {
						$btn_style .= $button['button_style'];
					}

					if ($button['button_link']) {
						$btn_link = $button['button_link'];
						$btn_title = $btn_link['title'];
						$btn_alt = $btn_link['title'];
						$btn_url = $btn_link['url'];
						$btn_target = $btn_link['target'];
					}

					if ($button['button_size']) {
						$btn_style .= ' ' . $button['button_size'];
					}

					if ($button['button_style'] == 'btn-link') {
						$btn_title .= ' <i class="fal fa-angle-right"></i>';
					}
				}

				echo '<li class="mt-4 d-flex align-items-lg-center">';
				echo '<div class="pe-5">';
				echo $title ? '<p class="fs-lg font-weight-bolder mb-0">' . $title . '</p>' : '';
				echo $sub_heading ? '<p class="mb-3">' . $sub_heading . '</p>' : '';
				echo $btn_url && $btn_title ? '<a href="' . $btn_url . '" class="' . $btn_style . ' mb-4" title="' . $btn_alt . '">' . $btn_title . '</a>' : '';
				echo $excerpt ? '<p class="small">' . $excerpt . '</p>' : '';
				echo '</div>';
				echo $image ? '<img src="' . $image['block_image']['url'] . '" alt="' . $image['block_image']['alt'] . '" class="img-fluid mx-3" />' : '';
				echo '</li>';
			endforeach;
			?>
		</ul>
	</div>
	<div class="col-12 col-lg-6">
		<?php echo $heading_r ? '<h4 class="mb-2">' . $heading_r . '</h4>' : ''; ?>

		<ul class="list-unstyled">
			<?php
			foreach ($specs_right as $spec) :
				$title = $spec['title'];
				$sub_heading = $spec['sub_heading'];
				$excerpt = $spec['excerpt'];
				$image = $spec['image'];
				$button = $spec['button_single'];

				if ($button) {
					$btn_style = '';
					$btn_title = '';
					$btn_icon = '';
					$btn_url = '';
					$btn_target = '';
					$btn_link = '';

					if ($button['button_style']) {
						$btn_style .= $button['button_style'];
					}

					if ($button['button_link']) {
						$btn_link = $button['button_link'];
						$btn_title = $btn_link['title'];
						$btn_alt = $btn_link['title'];
						$btn_url = $btn_link['url'];
						$btn_target = $btn_link['target'];
					}

					if ($button['button_size']) {
						$btn_style .= ' ' . $button['button_size'];
					}

					if ($button['button_style'] == 'btn-link') {
						$btn_title .= ' <i class="fal fa-angle-right"></i>';
					}
				}

				echo '<li class="mt-4 d-flex align-items-lg-center">';
				echo $image ? '<img src="' . $image['block_image']['url'] . '" alt="' . $image['block_image']['alt'] . '" class="img-fluid mx-3" />' : '';
				echo '<div class="ps-5">';
				echo $title ? '<p class="fs-lg font-weight-bolder mb-0">' . $title . '</p>' : '';
				echo $sub_heading ? '<p class="mb-3">' . $sub_heading . '</p>' : '';
				echo $btn_url && $btn_title ? '<a href="' . $btn_url . '" class="' . $btn_style . ' mb-4" title="' . $btn_alt . '">' . $btn_title . '</a>' : '';
				echo $excerpt ? '<p class="small">' . $excerpt . '</p>' : '';
				echo '</div>';
				echo '</li>';
			endforeach;
			?>
		</ul>
	</div>
</div>
 */

/**
 * Module: Specifications 4
 */
function rvb_module_specifications_4($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open('');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}
/*
<?php
$specs = get_sub_field('specifications');
?>


<div class="row align-items-lg-center">
	<div class="col-12 col-lg-5 offset-lg-1">
		<?php tagline(''); ?>
		<?php heading('h3', 'mt-3 mb-4'); ?>
		<?php excerpt(''); ?>
	</div>
	<div class="col-12 col-lg-4 offset-lg-1">
		<p class="small">Important</p>

		<ul class="list-unstyled row">
			<?php
			foreach ($specs as $spec) :
				$sup_title = $spec['sup_title'];
				$title = $spec['title'];
				$sub_title = $spec['sub_heading'];

				echo '<li class="mt-5 col-6">';
				echo $sup_title ? '<p class="small mb-0">' . $sup_title . '</p>' : '';
				echo $title ? '<h4 class="font-weight-bolder mb-0">' . $title . '</h4>' : '';
				echo $sub_title ? '<p class="small mb-0">' . $sub_title . '</p>' : '';
				echo '</li>';
			endforeach;
			?>
		</ul>
	</div>
</div> */

/**
 * Module: Specifications 5
 */
function rvb_module_specifications_5($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open('');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}
/*
<?php
// left specifications
$left = get_sub_field('specifications_left');
$heading_l = $left['heading'];
$specs_left = $left['specifications'];

// right specifications
$right = get_sub_field('specifications_right');
$heading_r = $right['heading'];
$specs_right = $right['specifications'];
?>

<div class="row align-items-lg-center">
	<div class="col-12 col-lg-5 offset-lg-1">
		<?php tagline(''); ?>
		<?php heading('h2', 'my-4'); ?>
		<?php excerpt(''); ?>
	</div>
	<div class="col-lg-4 offset-lg-1">
		<div class="row">
			<div class="col-lg-6">
				<?php echo $heading_l ? '<p class="small mb-2">' . $heading_l . '</p>' : ''; ?>

				<ul class="list-unstyled">
					<?php
					foreach ($specs_left as $spec) :
						$sup_title = $spec['sup_title'];
						$title = $spec['title'];
						$sub_heading = $spec['sub_heading'];

						echo '<li class="mt-4 d-flex align-items-lg-center">';
						echo '<div class="pe-5">';
						echo $sup_title ? '<p class="small mb-0">' . $sup_title . '</p>' : '';
						echo $title ? '<h4 class="font-weight-bolder mb-0">' . $title . '</h4>' : '';
						echo $sub_heading ? '<p class="small mb-0">' . $sub_heading . '</p>' : '';
						echo '</div>';
						echo '</li>';
					endforeach;
					?>
				</ul>
			</div>
			<div class="col-lg-6">
				<?php echo $heading_r ? '<p class="small mb-2">' . $heading_r . '</p>' : ''; ?>

				<ul class="list-unstyled">
					<?php
					foreach ($specs_right as $spec) :
						$sup_title = $spec['sup_title'];
						$title = $spec['title'];
						$sub_heading = $spec['sub_heading'];

						echo '<li class="mt-4 d-flex align-items-lg-center">';
						echo '<div class="ps-5">';
						echo $sup_title ? '<p class="small mb-0">' . $sup_title . '</p>' : '';
						echo $title ? '<h4 class="font-weight-bolder mb-0">' . $title . '</h4>' : '';
						echo $sub_heading ? '<p class="small mb-0">' . $sub_heading . '</p>' : '';
						echo '</div>';
						echo '</li>';
					endforeach;
					?>
				</ul>
			</div>
		</div>
	</div>
</div>
 */

/**
 * Module: Specifications 6
 */
function rvb_module_specifications_6($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open('');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}
/*
<?php
$specs = get_sub_field('specifications');
?>


<div class="row align-items-lg-center">
	<div class="col-12 col-lg-9 offset-lg-1">
		<?php tagline(''); ?>
		<?php heading('h1', 'mt-3 mb-4'); ?>
		<?php excerpt(''); ?>

		<ul class="list-unstyled row">
			<?php
			foreach ($specs as $spec) :
				$sup_title = $spec['sup_title'];
				$title = $spec['title'];
				$sub_title = $spec['sub_heading'];

				echo '<li class="mt-5 col-3">';
				echo $sup_title ? '<p class="small mb-0">' . $sup_title . '</p>' : '';
				echo $title ? '<h4 class="font-weight-bolder mb-0">' . $title . '</h4>' : '';
				echo $sub_title ? '<p class="small mb-0">' . $sub_title . '</p>' : '';
				echo '</li>';
			endforeach;
			?>
		</ul>
	</div>
</div>
 */

/**
 * Module: Specifications 7
 */
function rvb_module_specifications_7($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open('');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}
/*
<?php
$specs = get_sub_field('specifications');
?>


<div class="row align-items-lg-center">
	<div class="col-12 col-lg-5">
		<?php tagline(''); ?>
		<?php heading('h4', 'mt-3'); ?>
	</div>
	<div class="col-12 col-lg-2"></div>
	<div class="col-12 col-lg-5">
		Slider bars here

		<!-- <ul class="list-unstyled row">
			<?php
			foreach ($specs as $spec) :
				$sup_title = $spec['sup_title'];
				$title = $spec['title'];
				$sub_title = $spec['sub_heading'];

				echo '<li class="mt-5 col-3">';
				echo $sup_title ? '<p class="small mb-0">' . $sup_title . '</p>' : '';
				echo $title ? '<h4 class="font-weight-bolder mb-0">' . $title . '</h4>' : '';
				echo $sub_title ? '<p class="small mb-0">' . $sub_title . '</p>' : '';
				echo '</li>';
			endforeach;
			?>
		</ul> -->
	</div>
</div>
 */

/**
 * Module: Specifications 8
 */
function rvb_module_specifications_8($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open('');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}
/*
<?php
$specs = get_sub_field('specifications');
?>


<div class="row align-items-lg-center">
	<div class="col-12 col-lg-6 offset-lg-3 text-center">
		<?php heading('h3', 'mb-5 px-lg-4'); ?>
	</div>
	<div class="col-12 col-lg-8 offset-lg-2 text-center">
		<?php excerpt('mb-0'); ?>

		<ul class="list-unstyled row mt-5">
			<?php
			foreach ($specs as $spec) :
				$sup_title = $spec['sup_title'];
				$title = $spec['title'];
				$sub_title = $spec['sub_heading'];

				echo '<li class="col-4 text-center">';
				echo $sup_title ? '<p class="small mb-0">' . $sup_title . '</p>' : '';
				echo $title ? '<h4 class="font-weight-bolder mb-0">' . $title . '</h4>' : '';
				echo $sub_title ? '<p class="small mb-0">' . $sub_title . '</p>' : '';
				echo '</li>';
			endforeach;
			?>
		</ul>
	</div>
</div>
 */

/**
 * Module: Specifications 9
 */
function rvb_module_specifications_9($module, $fields)
{
    if (empty($fields)) {
        return;
    }

    rvb_module_container_open($module, '');
    rvb_module_row_open('');
    rvb_module_column_open('');
    rvb_module_column_close();
    rvb_module_row_close();
    rvb_module_container_close($module);
}
/*
<?php
$specs = get_sub_field('specifications');
?>

<ul class="list-unstyled row">
	<?php
	foreach ($specs as $spec) :
		$sup_title = $spec['sup_title'];
		$title = $spec['title'];
		$sub_title = $spec['sub_heading'];

		echo '<li class="col-4 text-center">';
		echo $sup_title ? '<p class="small mb-0">' . $sup_title . '</p>' : '';
		echo $title ? '<h4 class="h1 font-weight-bolder mb-0">' . $title . '</h4>' : '';
		echo $sub_title ? '<p class="small mb-0">' . $sub_title . '</p>' : '';
		echo '</li>';
	endforeach;
	?>
</ul>
 */
