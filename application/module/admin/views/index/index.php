<?php

$user = Session::get('user');
// echo '<pre>';
// print_r($user);
// echo '</pre>';

$imageURL = $this->_dirImg;
$arrMenu = array(
	array('link' => URL::createLink('admin', 'khoa', 'index'), 'name' => 'Add Department', 'image' => 'icon-48-article-add'),
	array('link' => URL::createLink('admin', 'student', 'index'), 'name' => 'Student manager', 'image' => 'icon-48-article'),
	array('link' => URL::createLink('admin', 'group', 'index'), 'name' => 'Group manager', 'image' => 'icon-48-groups'),
	array('link' => URL::createLink('admin', 'user', 'index'), 'name' => 'User manager', 'image' => 'icon-48-user'),
);

foreach ($arrMenu as $key => $value) {
	$image = $imageURL . '/header/' . $value['image'] . '.png';
	$xhtml .= '<div class="icon-wrapper">
					<div class="icon">
						<a href="' . $value['link'] . '">
							<img src="' . $image . '" alt="' . $value['name'] . '">
							<span>' . $value['name'] . '</span>
						</a>
					</div>
				</div>';
}

?>

<div id="element-box">
	<div id="system-message-container"></div>
	<div class="m">
		<div class="adminform">
			<div class="cpanel-left">
				<div class="cpanel">
					<?php echo $xhtml; ?>
				</div>
			</div>

		</div>
		<div class="clr"></div>
	</div>
</div>