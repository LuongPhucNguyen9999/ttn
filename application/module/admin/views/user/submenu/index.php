<?php
$linkGroup = URL::createLink('admin', 'group', 'index');
$linkKhoa = URL::createLink('admin', 'khoa', 'index');
$linkLop = URL::createLink('admin', 'lop', 'index');
$linkUser = URL::createLink('admin', 'user', 'index');
$linkSV = URL::createLink('admin', 'sinhvien', 'index');
$linkHK = URL::createLink('admin', 'hocky', 'index');
?>
<div id="submenu-box">
    <div class="m">
        <ul id="submenu">
            <li><a href="<?php echo $linkGroup ?>">Group</a></li>
            <li><a class="active" href="<?php echo $linkUser ?>">User</a></li>
            <li><a href="<?php echo $linkKhoa ?>">Khoa</a></li>
            <li><a href="<?php echo $linkLop ?>">Lớp</a></li>
            <li><a href="<?php echo $linkHK ?>">Học Kỳ</a></li>
            <li><a href="<?php echo $linkSV ?>">Sinh Vien</a></li>
        </ul>
        <div class="clr"></div>
    </div>
</div>