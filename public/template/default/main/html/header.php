<?php
$imageURL = $this->_dirImg;
$jsURL = TEMPLATE_PATH . 'default/main/' . $this->_dirJs;
$linkLogin = URL::createLink('default', 'index', 'login');
$linkACP = URL::createLink('admin', 'index', 'index');
$linkLogout     = URL::createLink('default', 'index', 'logout');
$linkSee = URL::createLink('default', 'user', 'index');
$linkInput = URL::createLink('default', 'user', 'input');

$userObj = Session::get('user');
// echo '<pre>';
// print_r($userObj);
// echo '</pre>';

?>
<div class="main">
    <header class="header">
        <div class="nav">
            <div class="sidebar hide-on-tablet hide-on-mobile">
                <a href="#">
                    <img class="slidebar-img" src="<?php echo $imageURL ?>/ttn1.jpg" alt="TTN" />
                </a>

                <?php
                if ($userObj['login'] == false) {
                ?>

                    <a href="#info" style="text-align: center; font-weight: bold; color: #6796bf" class="category-item__link">Nhập Thông Tin</a>

                    <nav class="category">
                        <ul class="category-list">
                            <li class="category-item">
                                <a href="#aware-1" style="
                        text-align: center;
                        font-weight: bold;
                        color: #6796bf;
                      " class="category-item__link">Nội Dung Đánh Giá</a>
                            </li>
                            <li class="category-item">
                                <a href="#aware" class="category-item__link">I. Đánh giá về ý thức học tập</a>
                            </li>
                            <li class="category-item">
                                <a href="#aware1" class="category-item__link">II. Đánh giá về ý thức chấp hành nội quy</a>
                            </li>
                            <li class="category-item">
                                <a href="#aware2" class="category-item__link">III. Đánh giá về ý thức tham gia hoạt động</a>
                            </li>
                            <li class="category-item">
                                <a href="#aware3" class="category-item__link">IV. Đánh giá về ý thức công dân</a>
                            </li>
                            <li class="category-item">
                                <a href="#aware4" class="category-item__link">V. Đánh giá về ý thức và kết quả</a>
                            </li>
                        </ul>
                    </nav>

                    <div style="margin: 90px;display: flex;justify-content: center;">
                        <button class="Login-btn"><a href="<?php echo $linkLogin ?>">Đăng nhập</a></button>
                    </div>

                <?php
                } else {
                ?>
                    <a href="<?php echo $linkInput ?>" style="text-align: center;margin: 30px; font-weight: bold; color: #6796bf" class="category-item__link">Nhap Diem</a>
                    <a href="<?php echo $linkSee ?>" style="text-align: center;margin: 30px; font-weight: bold; color: #6796bf" class="category-item__link">Xem Diem</a>
                    <a href="<?php echo $linkLogout ?>" style="text-align: center;margin: 30px; font-weight: bold; color: #6796bf" class="category-item__link">Dang Xuat</a>
                <?php
                }
                ?>

                <?php
                if ($userObj['group_acp'] == true) {
                ?>
                    <a href="<?php echo $linkACP ?>" style="text-align: center; margin: 30px;font-weight: bold; color: #6796bf" class="category-item__link">Administrator</a>
                <?php
                }
                ?>

                <div class="nav-bars-btn">
                    <i class="fa-solid fa-bars"></i>
                </div>
            </div>
        </div>
    </header>
</div>