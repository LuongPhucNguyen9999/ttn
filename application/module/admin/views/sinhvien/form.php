<?php
include_once(MODULE_PATH . 'admin/views/toolbar.php');
include_once 'submenu/index.php';


//input
$inputUserName = Helper::cmsInput('text', 'form[username]', 'username', $this->arrParam['form']['username'], 'inputbox required', 40);
$inputMSSV = Helper::cmsInput('text', 'form[mssv]', 'mssv', $this->arrParam['form']['mssv'], 'inputbox required', 40);
$inputBirthday = Helper::cmsInput('text', 'form[birthday]', 'birthday', $this->arrParam['form']['birthday'], 'inputbox required', 40);

$inputS1 = Helper::cmsInput('text', 'form[s1]', 's1', $this->arrParam['form']['s1'], 'inputbox required');
$inputS2 = Helper::cmsInput('text', 'form[s2]', 's2', $this->arrParam['form']['s2'], 'inputbox required');
$inputS3 = Helper::cmsInput('text', 'form[s3]', 's3', $this->arrParam['form']['s3'], 'inputbox required');
$inputS4 = Helper::cmsInput('text', 'form[s4]', 's4', $this->arrParam['form']['s4'], 'inputbox required');
$inputS5 = Helper::cmsInput('text', 'form[s5]', 's5', $this->arrParam['form']['s5'], 'inputbox required');
$inputS6 = Helper::cmsInput('text', 'form[s6]', 's6', $this->arrParam['form']['s6'], 'inputbox required');
$inputS7 = Helper::cmsInput('text', 'form[s7]', 's7', $this->arrParam['form']['s7'], 'inputbox required');
$inputS8 = Helper::cmsInput('text', 'form[s8]', 's8', $this->arrParam['form']['s8'], 'inputbox required');
$inputS9 = Helper::cmsInput('text', 'form[s9]', 's9', $this->arrParam['form']['s9'], 'inputbox required');
$inputS10 = Helper::cmsInput('text', 'form[s10]', 's10', $this->arrParam['form']['s10'], 'inputbox required');
$inputS11 = Helper::cmsInput('text', 'form[s11]', 's11', $this->arrParam['form']['s11'], 'inputbox required');
$inputS12 = Helper::cmsInput('text', 'form[s12]', 's12', $this->arrParam['form']['s12'], 'inputbox required');
$inputS13 = Helper::cmsInput('text', 'form[s13]', 's13', $this->arrParam['form']['s13'], 'inputbox required');
$inputS14 = Helper::cmsInput('text', 'form[s14]', 's14', $this->arrParam['form']['s14'], 'inputbox required');
$inputS15 = Helper::cmsInput('text', 'form[s15]', 's15', $this->arrParam['form']['s15'], 'inputbox required');
$inputS16 = Helper::cmsInput('text', 'form[s16]', 's16', $this->arrParam['form']['s16'], 'inputbox required');
$inputS17 = Helper::cmsInput('text', 'form[s17]', 's17', $this->arrParam['form']['s17'], 'inputbox required');
$inputS18 = Helper::cmsInput('text', 'form[s18]', 's18', $this->arrParam['form']['s18'], 'inputbox required');
$inputS19 = Helper::cmsInput('text', 'form[s19]', 's19', $this->arrParam['form']['s19'], 'inputbox required');
$inputS20 = Helper::cmsInput('text', 'form[s20]', 's20', $this->arrParam['form']['s20'], 'inputbox required');
$inputS21 = Helper::cmsInput('text', 'form[s21]', 's21', $this->arrParam['form']['s21'], 'inputbox required');
$inputS22 = Helper::cmsInput('text', 'form[s22]', 's22', $this->arrParam['form']['s22'], 'inputbox required');
$inputS23 = Helper::cmsInput('text', 'form[s23]', 's23', $this->arrParam['form']['s23'], 'inputbox required');
$inputS24 = Helper::cmsInput('text', 'form[s24]', 's24', $this->arrParam['form']['s24'], 'inputbox required');
$inputS25 = Helper::cmsInput('text', 'form[s25]', 's25', $this->arrParam['form']['s25'], 'inputbox required');
$inputS26 = Helper::cmsInput('text', 'form[s26]', 's26', $this->arrParam['form']['s26'], 'inputbox required');




//select box
$slbKhoa = Helper::cmsSelectbox('form[khoa_id]', 'inputbox', $this->slbKhoa, $this->arrParam['form']['khoa_id'], 'width:163px');
$slbLop = Helper::cmsSelectbox('form[lop_id]', 'inputbox', $this->slbLop, $this->arrParam['form']['lop_id'], 'width:163px');
$slbHK = Helper::cmsSelectbox('form[hocky_id]', 'inputbox', $this->slbHocKy, $this->arrParam['form']['hocky_id'], 'width:163px');

$inputToken = Helper::cmsInput('hidden', 'form[token]', 'token', time());
$inputID = '';
$rowID = '';
if (isset($this->arrParam['id'])) {
    $inputID = Helper::cmsInput('text', 'form[id]', 'id', $this->arrParam['form']['id'], 'inputbox readonly');
    $rowID = Helper::cmsRowForm('ID', $inputID);
}


// echo '<pre>';
// print_r($this->arrParam['form']);
// echo '</pre>';

$rowUserName = Helper::cmsRowForm('Full Name', $inputUserName, true);
$rowMSSV = Helper::cmsRowForm('MSSV', $inputMSSV, true);
$rowBirthday = Helper::cmsRowForm('Birthday', $inputBirthday, true);


$rowKhoa = Helper::cmsRowForm('Khoa', $slbKhoa, true);
$rowLop = Helper::cmsRowForm('Lop', $slbLop, true);
$rowHK = Helper::cmsRowForm('Hoc Ky', $slbHK, true);

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
                        <?php echo $rowUserName . $rowMSSV . $rowBirthday . $rowKhoa . $rowLop . $rowHK . $rowID ?>
                    </ul>
                    <div class="clr"></div>
                    <div class="grid">
                        <div class="row">
                            <div class="table1 col l-12">
                                <table id="register-form2">
                                    <thead>
                                        <th style="text-align: center; width: 83px; height: 100px">
                                            TT
                                        </th>
                                        <th id="aware-1" style="width: 925px; height: 100px">
                                            Các nội dung đánh giá
                                        </th>
                                        <th style="width: 190px; height: 100px;text-align: center">Khung điểm</th>
                                        <th style="width: 80px; height: 100px;text-align: center">SV tự đánh giá</th>
                                    </thead>

                                    <tbody>
                                        <tr>
                                            <td id="aware" style="text-align: center; font-weight: bold">
                                                I
                                            </td>
                                            <td style="font-weight: bold">
                                                Đánh giá về ý thức học tập
                                            </td>
                                            <td style="text-align: center">Từ 0 đến 20</td>
                                            <td></td>
                                        </tr>
                                        <tr class="form-group">
                                            <td style="text-align: center">1</td>
                                            <td>
                                                Đi học đầy đủ, đúng giờ, nghiêm túc trong giờ học<br />
                                                Thực hiện đầy đủ, nghiêm túc các bài tập, bài kiểm
                                                tra<br />
                                                Tích cực xây dựng bài học trên lớp<br />
                                            </td>
                                            <td style="text-align: center">6</td>
                                            <td><?php echo $inputS1 ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">2</td>
                                            <td>
                                                Tích cực tham gia các câu lạc bộ học thuật,các hoạt động
                                                học thuật,hoạt động ngoại khóa
                                            </td>
                                            <td style="text-align: center">2</td>
                                            <td><?php echo $inputS2 ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">3</td>
                                            <td>Ý thức và thái độ tham gia các kỳ thi, cuộc thi</td>
                                            <td style="text-align: center">2</td>
                                            <td><?php echo $inputS3 ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">4</td>
                                            <td>
                                                Tinh thần vượt khó, phấn đấu vươn lên trong học tập
                                            </td>
                                            <td style="text-align: center">2</td>
                                            <td><?php echo $inputS4 ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">5</td>
                                            <td>Kết quả học tập:</td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td rowspan="5"></td>
                                            <td>-Có điểm TBCHT đạt 3.6 đến 4.0</td>
                                            <td style="text-align: center">8</td>
                                            <td rowspan="5">
                                                <?php echo $inputS5 ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>-Có điểm TBCHT đạt 3.2 đến 3.6</td>
                                            <td style="text-align: center">6</td>
                                        </tr>
                                        <tr>
                                            <td>-Có điểm TBCHT đạt 2.5 đến 3.2</td>
                                            <td style="text-align: center">4</td>
                                        </tr>
                                        <tr>
                                            <td>-Có điểm TBCHT đạt 2.0 đến 2.5</td>
                                            <td style="text-align: center">2</td>
                                        </tr>
                                        <tr>
                                            <td>-Có điểm TBCHT đạt dưới 2.0</td>
                                            <td style="text-align: center">0</td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: right; font-weight: bold" colspan="2">
                                                Tổng điểm mục I
                                            </td>
                                            <td style="text-align: center; font-weight: bold">
                                                20 điểm
                                            </td>
                                            <td><?php echo $inputS6 ?></td>
                                        </tr>
                                        <tr>
                                            <td id="aware1" style="text-align: center; font-weight: bold">
                                                II
                                            </td>
                                            <td style="font-weight: bold">
                                                Đánh giá về ý thức chấp hành nội quy, quy chế, quy định
                                                trong Trường
                                            </td>
                                            <td style="text-align: center">Từ 0 đến 25</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">1</td>
                                            <td>
                                                Không vi phạm các văn bản pháp luật và quy chế của
                                                Trường
                                            </td>
                                            <td style="text-align: center">5</td>
                                            <td><?php echo $inputS7 ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">2</td>
                                            <td>
                                                Tham gia đầy đủ, tích cực các buổi học tập nội quy, quy
                                                chế do nhà Trường tổ chức
                                            </td>
                                            <td style="text-align: center">5</td>
                                            <td><?php echo $inputS8 ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">3</td>
                                            <td>
                                                Chấp hành nghiêm túc các quy định về bảo vệ tài sản,
                                                cảnh quan môi trường
                                            </td>
                                            <td style="text-align: center">5</td>
                                            <td><?php echo $inputS9 ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">4</td>
                                            <td>Chấp hành nghiêm túc nội quy nơi cư trú</td>
                                            <td style="text-align: center">5</td>
                                            <td><?php echo $inputS10 ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">5</td>
                                            <td>
                                                Đóng học phí, tham gia bảo hiểm y tế đầy đủ và đúng hạn
                                            </td>
                                            <td style="text-align: center">5</td>
                                            <td><?php echo $inputS11 ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: right; font-weight: bold" colspan="2">
                                                Tổng điểm mục II
                                            </td>
                                            <td style="text-align: center; font-weight: bold">
                                                25 điểm
                                            </td>
                                            <td><?php echo $inputS12 ?></td>
                                        </tr>
                                        <tr>
                                            <td id="aware2" style="text-align: center; font-weight: bold">
                                                III
                                            </td>
                                            <td style="font-weight: bold">
                                                Đánh giá về ý thức tham gia các hoạt động chính trị, xã
                                                hội, văn hóa,<br />
                                                văn nghệ,thể thao, phòng chống tội phạm và các tệ nạn xã
                                                hội
                                            </td>
                                            <td style="text-align: center">Từ 0 đến 20</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">1</td>
                                            <td>
                                                Tham gia nhiệt tình, đầy đủ các hoạt động văn hóa, văn
                                                nghệ, thể thao của Lớp, Khoa, Đoàn trường và Nhà trường
                                                tổ chức
                                            </td>
                                            <td style="text-align: center">8</td>
                                            <td><?php echo $inputS13 ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">2</td>
                                            <td>
                                                Tham gia tích cực các hoạt động công ích,tình nguyện,
                                                các hoạt động xã hội(hiến máu nhân đạo, tiếp sức mùa
                                                thi, mùa hè xanh,.....)
                                            </td>
                                            <td style="text-align: center">7</td>
                                            <td><?php echo $inputS14 ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">3</td>
                                            <td>
                                                Tham gia tuyên truyền, phòng chống tội phạm và các tệ
                                                nạn xã hội
                                            </td>
                                            <td style="text-align: center">5</td>
                                            <td><?php echo $inputS15 ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: right; font-weight: bold" colspan="2">
                                                Tổng điểm mục III
                                            </td>
                                            <td style="text-align: center; font-weight: bold">
                                                20 điểm
                                            </td>
                                            <td><?php echo $inputS16 ?></td>
                                        </tr>
                                        <tr>
                                            <td id="aware3" style="text-align: center; font-weight: bold">
                                                IV
                                            </td>
                                            <td style="font-weight: bold">
                                                Đánh giá ý thức công dân trong quan hệ cộng đồng
                                            </td>
                                            <td style="text-align: center">Từ 0 đến 25</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">1</td>
                                            <td>
                                                Chấp hành và tham gia tuyên truyền các chủ trương của
                                                Đảng, chính sách,pháp luật<br />
                                                của Nhà nước trong cộng đồng
                                            </td>
                                            <td style="text-align: center">10</td>
                                            <td><?php echo $inputS17 ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">2</td>
                                            <td>
                                                Tích cực tham gia các hoạt động xã hội và đạt thành tích
                                                được ghi nhận, biểu dương, khen thưởng
                                            </td>
                                            <td style="text-align: center">8</td>
                                            <td><?php echo $inputS18 ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">3</td>
                                            <td>
                                                Có tinh thần chia sẻ, giúp đỡ người thân, người khó
                                                khăn, hoạn nạn
                                            </td>
                                            <td style="text-align: center">7</td>
                                            <td><?php echo $inputS19 ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: right; font-weight: bold" colspan="2">
                                                Tổng điểm mục IV
                                            </td>
                                            <td style="text-align: center; font-weight: bold">
                                                25 điểm
                                            </td>
                                            <td><?php echo $inputS20 ?></td>
                                        </tr>
                                        <tr>
                                            <td id="aware4" style="text-align: center; font-weight: bold">
                                                V
                                            </td>
                                            <td style="font-weight: bold">
                                                Đánh giá về ý thức và kết quả khi tham gia công tác cán
                                                bộ lớp, các đoàn thể, tổ chức trong Trường hoặc sinh
                                                viên đạt được thành tích đặc biệt trong học tập, rèn
                                                luyện
                                            </td>
                                            <td style="text-align: center">Từ 0 đến 10</td>
                                            <td></td>

                                        </tr>
                                        <tr>
                                            <td style="text-align: center">1</td>
                                            <td>
                                                Ý thức, tinh thần, uy tín và hiệu quả công việc của sinh
                                                viên được phân công nhiệm vụ quản lý lớp, các tổ chức
                                                Đảng, Đoàn TN, Hội SV và các tổ chức khác trong Trường
                                            </td>
                                            <td style="text-align: center">3</td>
                                            <td><?php echo $inputS21 ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">2</td>
                                            <td>
                                                Kỹ năng tổ chức, quản lý lớp, quản lý các tổ chức Đảng,
                                                Đoàn Thanh Niên, Hội sinh viên và các tổ chức khác trong
                                                Trường
                                            </td>
                                            <td style="text-align: center">3</td>
                                            <td><?php echo $inputS22 ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">3</td>
                                            <td>
                                                Sinh viên hỗ trợ và tham gia tích cực các hoạt động
                                                chung của lớp, tập thể Khoa và Trường
                                            </td>
                                            <td style="text-align: center">2</td>
                                            <td><?php echo $inputS23 ?></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: center">4</td>
                                            <td>
                                                Sinh viên đạt được các thành tích đặc biệt trong học
                                                tập, rèn luyện
                                            </td>
                                            <td style="text-align: center">2</td>
                                            <td><?php echo $inputS24 ?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td style="text-align: right; font-weight: bold">
                                                Tổng điểm mục V
                                            </td>
                                            <td style="text-align: center; font-weight: bold">
                                                10 điểm
                                            </td>
                                            <td><?php echo $inputS25 ?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td style="text-align: right; font-weight: bold">
                                                Tổng cộng
                                            </td>
                                            <td></td>
                                            <td><?php echo $inputS26 ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div>
                        <?php echo $inputToken ?>
                    </div>
                </fieldset>
            </div>
            <div class="clr"></div>
            <div>
            </div>
        </form>

    </div>
</div>