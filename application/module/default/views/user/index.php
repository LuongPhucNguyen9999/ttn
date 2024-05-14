<?php

$lblUserName    = Helper::cmsLinkSort('Username', 'username', $columnPost, $orderPost);
$lblMSSV    = Helper::cmsLinkSort('MSSV', 'mssv', $columnPost, $orderPost);
$lblBirthDay    = Helper::cmsLinkSort('Birthday', 'fullname', $columnPost, $orderPost);
$lblKhoa    = Helper::cmsLinkSort('Khoa', 'khoa_id', $columnPost, $orderPost);
$lblLop    = Helper::cmsLinkSort('Lop', 'lop_id', $columnPost, $orderPost);
$lblHocKy    = Helper::cmsLinkSort('Hoc Ky', 'hocky_id', $columnPost, $orderPost);
$lblModified    = Helper::cmsLinkSort('Modified', 'modified', $columnPost, $orderPost);
$lblModifiedBy    = Helper::cmsLinkSort('Modified By', 'modified_by', $columnPost, $orderPost);
$lblID    = Helper::cmsLinkSort('ID', 'id', $columnPost, $orderPost);


$selectboxHK = Helper::cmsSelectbox('filter_hocky_id', 'inputbox', $this->slbHocKy, $this->arrParam['filter_hocky_id']);

// $infoObj = Session::get('user');
// echo '<pre>';
// print_r($infoObj);
// echo '</pre>';

// echo '<pre>';
// print_r($this);
// echo '</pre>';

?>

<div class="slide-show" style="margin-bottom :20px;">
    <div class="list-images">
        <img src="<?php echo $imageURL ?>/slider1.jpg" alt="" class="slide-show-img" />
        <img src="<?php echo $imageURL ?>/slider2.jpg" alt="" class="slide-show-img" />
        <img src="<?php echo $imageURL ?>/slider3.jpg" alt="" class="slide-show-img" />
        <img src="<?php echo $imageURL ?>/slider4.jpg" alt="" class="slide-show-img" />
    </div>
    <div class="btns">
        <div class="btn-left btn"><i class="bx bx-chevron-left"></i></div>
        <div class="btn-right btn">
            <i class="bx bx-chevron-right"></i>
        </div>
    </div>
    <div class="index-images">
        <div class="index-item index-item-0 active"></div>
        <div class="index-item index-item-1"></div>
        <div class="index-item index-item-2"></div>
        <div class="index-item index-item-3"></div>
    </div>
</div>
<h1 id="info">Danh Sach Diem Ren Luyen Cua Sinh Vien</h1>
<div id="element-box" style="margin-bottom: 66px;
    margin-top: 45px;">
    <div class="m">
        <form action="#" method="post" name="adminForm" id="adminForm">
            <!-- FILTER -->
            <fieldset id="filter-bar">
                <div class="filter-search fltlft">
                    <label class="filter-search-lbl" for="filter_search">Filter:</label>
                    <input type="text" name="filter_search" id="filter_search" value="<?php echo $this->arrParam['filter_search'] ?>">
                    <button type="submit" name="submit-keyword">Search</button>
                    <button type="button" name="clear-keyword">Clear</button>
                </div>

            </fieldset>
            <div class="clr"> </div>

            <table class="adminlist" id="modules-mgr">
                <!-- HEADER TABLE -->
                <thead>
                    <tr>
                        <!-- <th width="1%">
                            <input type="checkbox" name="checkall-toggle">
                        </th> -->
                        <th class="title"><?php echo $lblUserName ?></th>
                        <th width="10%"><?php echo $lblMSSV ?></th>
                        <th width="10%"><?php echo $lblBirthDay ?></th>
                        <th width="10%"><?php echo $lblKhoa ?></th>
                        <th width="15%"><?php echo $lblLop ?></th>
                        <th width="15%"><?php echo $lblHocKy ?></th>
                        <th width="8%"><?php echo $lblModified ?></th>
                        <th width="15%"><?php echo $lblModifiedBy ?></th>
                        <th width="1%" class="nowrap"><?php echo $lblID ?></th>
                    </tr>
                </thead>
                <!-- FOOTER TABLE -->
                <tfoot>
                    <tr>
                        <td colspan="12">
                            <!-- PAGINATION -->
                            <div class="container">

                            </div>
                        </td>
                    </tr>
                </tfoot>
                <!-- BODY TABLE -->
                <tbody>
                    <?php
                    if (!empty($this->Items)) {
                        $i = 0;
                        foreach ($this->Items as $key => $value) {
                            $id          = $value['id'];
                            // $ckb         = '<input type="checkbox" name="cid[]" value="' . $id . '">';
                            $username        = $value['username'];
                            $mssv        = $value['mssv'];
                            $birthday       = $value['birthday'];
                            $khoaName        = $value['khoa_name'];
                            $lopName        = $value['lop_name'];
                            $hockyName        = $value['hocky_name'];
                            $row         = ($i % 2 == 0) ? 'row0' : 'row1';
                            $modified    = Helper::formatDate('d-m-Y', $value['modified']);
                            $modified_by = $value['modified_by'];
                            $linkEdit = URL::createLink('default', 'user', 'form', array('id' => $id));

                            echo '<tr class="' . $row . '">
									
									<td><a href="' . $linkEdit . '">' . $username . '</a></td>
									<td class="center">' . $mssv . '</td>
									<td class="center">' . $birthday . '</td>
									<td class="center">' . $khoaName . '</td>
									<td class="center">' . $lopName . '</td>
									<td class="center">' . $hockyName  . '</td>
									<td class="center">' . $modified . '</td>
									<td class="center">' . $modified_by . '</td>
									<td class="center">' . $id . '</td>
								</tr>';

                            $i++;
                        }
                    }
                    ?>
                </tbody>
            </table>

            <div>
                <input type="hidden" name="filter_column" value="username">
                <input type="hidden" name="filter_page" value="1">
                <input type="hidden" name="filter_column_dir" value="desc">
            </div>
        </form>

        <div class="clr"></div>
    </div>
</div>