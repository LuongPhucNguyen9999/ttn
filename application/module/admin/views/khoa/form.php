<?php
include_once(MODULE_PATH . 'admin/views/toolbar.php');
include_once 'submenu/index.php';

//input
$inputName = Helper::cmsInput('text', 'form[name]', 'name', $this->arrParam['form']['name'], 'inputbox required', 40);
$inputToken = Helper::cmsInput('hidden', 'form[token]', 'token', time());


$inputID = '';
$rowID = '';
if (isset($this->arrParam['id'])) {
    $inputID = Helper::cmsInput('text', 'form[id]', 'id', $this->arrParam['form']['id'], 'inputbox readonly');
    $rowID = Helper::cmsRowForm('ID', $inputID);
}


//ordering
$rowName = Helper::cmsRowForm('Hoc Ky', $inputName, true);

$message = Session::get('message');
Session::delete('message');
$strMessage = Helper::cmsMessage($message);

?>
<div id="system-message-container"><?php echo $strMessage . $this->errors ?></div>

<div id="element-box">
    <div class="m">
        <form action="#" method="post" name="adminForm" id="adminForm" class="form-validate">
            <!-- FORM LEFT -->
            <div class="width-100 fltlft">
                <fieldset class="adminform">
                    <legend>Details</legend>
                    <ul class="adminformlist">
                        <?php echo $rowName . $rowID; ?>
                    </ul>
                    <div class="clr"></div>
                    <div>
                        <?php echo $inputToken ?>
                    </div>
                </fieldset>
            </div>
            <div class="clr"></div>
            <div>
            </div>
        </form>
        <div class="clr"></div>
    </div>
</div>