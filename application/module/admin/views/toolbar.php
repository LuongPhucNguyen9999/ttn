<?php
$controller = $this->arrParam['controller'];
foreach ($this->Items as $item) {
    $item['id'];
}



$linkNew = URL::createLink('admin', $controller, 'form');
$btnNew  = Helper::cmsButton('New', 'toolbar-popup-new', $linkNew, 'icon-32-new');

$linkEdit = URL::createLink('admin', $controller, 'form', array('id' => $item['id']));
$btnEdit  = Helper::cmsButton('Edit', 'toolbar-edit', $linkEdit, 'icon-32-edit');

$linkPublish = URL::createLink('admin', $controller, 'status', array('type' => 1));
$btnPublish  = Helper::cmsButton('Publish', 'toolbar-publish', $linkPublish, 'icon-32-publish', 'submit');

$linkUnpublish = URL::createLink('admin', $controller, 'status', array('type' => 0));
$btnUnpublish  = Helper::cmsButton('Unpublish', 'toolbar-unpublish', $linkUnpublish, 'icon-32-unpublish', 'submit');

$linkTrash = URL::createLink('admin', $controller, 'trash');
$btnTrash  = Helper::cmsButton('Trash', 'toolbar-trash', $linkTrash, 'icon-32-trash', 'submit');

$linkSave = URL::createLink('admin', $controller, 'form', array('type' => 'save'));
$btnSave  = Helper::cmsButton('Save', 'toolbar-apply', $linkSave, 'icon-32-apply', 'submit');

$linkSaveClose = URL::createLink('admin', $controller, 'form', array('type' => 'save-close'));
$btnSaveClose  = Helper::cmsButton('Save & Close', 'toolbar-save', $linkSaveClose, 'icon-32-save', 'submit');

$linkSaveNew = URL::createLink('admin', $controller, 'form', array('type' => 'save-new'));
$btnSaveNew  = Helper::cmsButton('Save & New', 'toolbar-save-new', $linkSaveNew, 'icon-32-save-new', 'submit');

$linkCancel = URL::createLink('admin', $controller, 'index');
$btnCancel  = Helper::cmsButton('Cancel', 'toolbar-cancel', $linkCancel, 'icon-32-cancel');



switch ($this->arrParam['action']) {
    case 'index':
        $strButton = $btnNew . $btnEdit . $btnPublish . $btnUnpublish . $btnTrash;
        break;
    case 'form':
        $strButton = $btnSave . $btnSaveClose . $btnSaveNew . $btnCancel;
        break;
}

switch ($this->arrParam['controller']) {
    case 'khoa':
        $strButton = $btnNew . $btnEdit . $btnTrash;
        break;
    case 'lop':
        $strButton = $btnNew . $btnEdit . $btnTrash;
        break;
    case 'hocky':
        $strButton = $btnNew . $btnEdit . $btnTrash;
        break;
    case 'sinhvien':
        $strButton = $btnTrash;
        break;
}

switch ($this->arrParam['controller'] && $this->arrParam['action']) {
    case $this->arrParam['controller'] == 'khoa' && $this->arrParam['action'] == 'form':
        $strButton = $btnSave . $btnSaveClose . $btnSaveNew . $btnCancel;
        break;
    case $this->arrParam['controller'] == 'lop' && $this->arrParam['action'] == 'form':
        $strButton = $btnSave . $btnSaveClose . $btnSaveNew . $btnCancel;
        break;
    case $this->arrParam['controller'] == 'hocky' && $this->arrParam['action'] == 'form':
        $strButton = $btnSave . $btnSaveClose . $btnSaveNew . $btnCancel;
        break;
    case $this->arrParam['controller'] == 'sinhvien' && $this->arrParam['action'] == 'form':
        $strButton = $btnSave . $btnSaveClose . $btnCancel;
        break;
}

?>

<div id="toolbar-box">
    <div class="m">
        <!-- TOOLBAR -->
        <div class="toolbar-list" id="toolbar">
            <ul>
                <?php echo $strButton  ?>

            </ul>
            <div class="clr"></div>
        </div>
        <!-- TITLE -->
        <div class="pagetitle icon-48-groups">
            <h2><?php echo $this->_title; ?></h2>
        </div>
    </div>
</div>