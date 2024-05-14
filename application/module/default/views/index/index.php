<div class="slide-show">
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
<h1 id="info">PHIẾU ĐÁNH GIÁ KẾT QUẢ RÈN LUYỆN CỦA SINH VIÊN</h1>
<div class="input-info" id="register-form">
    <div class="input-info-1">
        <div class="form-group">
            <label style="font-weight: bold">Họ và tên sinh viên: </label>
            <input id="name" name="fullname" rules="required" class="border form-control" type="text" placeholder=".................................................." />
            <span class="form-message"></span>
        </div>
        <div class="form-group">
            <label>MSSV: </label>
            <input id="name" name="fullname" rules="required|min:8" class="border form-control" type="text" placeholder=".................................................." />
            <span class="form-message"></span>
        </div>
        <div class="form-group">
            <label>Ngày sinh: </label>
            <input id="name" name="fullname" rules="required" class="border form-control" type="date" placeholder=".................................................." />
            <span class="form-message"></span>
        </div>
    </div>
    <div class="input-info-2">
        <div class="form-group">
            <label>Khoa:</label>
            <input id="name" name="fullname" rules="required" class="border form-control" type="type" placeholder=".................................................." />
            <span class="form-message"></span>
        </div>
        <div class="form-group">
            <label>Lớp: </label>
            <input id="name" name="fullname" rules="required" class="border form-control" type="type" placeholder=".................................................." />
            <span class="form-message"></span>
        </div>
        <div class="form-group">
            <label>Học kỳ - Năm học:</label>
            <input id="name" name="fullname" rules="required" class="border form-control" type="type" placeholder=".................................................." />
            <span class="form-message"></span>
        </div>
    </div>
</div>

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
                    <th style="width: 190px; height: 100px">Khung điểm</th>
                    <th style="width: 80px; height: 100px">SV tự đánh giá</th>
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
                        <td><input type="number" min="0" max="6" /></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">2</td>
                        <td>
                            Tích cực tham gia các câu lạc bộ học thuật,các hoạt động
                            học thuật,hoạt động ngoại khóa
                        </td>
                        <td style="text-align: center">2</td>
                        <td><input type="number" min="0" max="2" /></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">3</td>
                        <td>Ý thức và thái độ tham gia các kỳ thi, cuộc thi</td>
                        <td style="text-align: center">2</td>
                        <td><input type="number" min="0" max="2" /></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">4</td>
                        <td>
                            Tinh thần vượt khó, phấn đấu vươn lên trong học tập
                        </td>
                        <td style="text-align: center">2</td>
                        <td><input type="number" min="0" max="2" /></td>
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
                            <input type="number" min="0" max="8" />
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
                        <td><input type="number" min="0" max="20" /></td>
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
                        <td><input type="number" min="0" max="5" /></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">2</td>
                        <td>
                            Tham gia đầy đủ, tích cực các buổi học tập nội quy, quy
                            chế do nhà Trường tổ chức
                        </td>
                        <td style="text-align: center">5</td>
                        <td><input type="number" min="0" max="5" /></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">3</td>
                        <td>
                            Chấp hành nghiêm túc các quy định về bảo vệ tài sản,
                            cảnh quan môi trường
                        </td>
                        <td style="text-align: center">5</td>
                        <td><input type="number" min="0" max="5" /></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">4</td>
                        <td>Chấp hành nghiêm túc nội quy nơi cư trú</td>
                        <td style="text-align: center">5</td>
                        <td><input type="number" min="0" max="5" /></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">5</td>
                        <td>
                            Đóng học phí, tham gia bảo hiểm y tế đầy đủ và đúng hạn
                        </td>
                        <td style="text-align: center">5</td>
                        <td><input type="number" min="0" max="5" /></td>
                    </tr>
                    <tr>
                        <td style="text-align: right; font-weight: bold" colspan="2">
                            Tổng điểm mục II
                        </td>
                        <td style="text-align: center; font-weight: bold">
                            25 điểm
                        </td>
                        <td><input type="number" min="0" max="25" /></td>
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
                        <td><input type="number" min="0" max="8" /></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">2</td>
                        <td>
                            Tham gia tích cực các hoạt động công ích,tình nguyện,
                            các hoạt động xã hội(hiến máu nhân đạo, tiếp sức mùa
                            thi, mùa hè xanh,.....)
                        </td>
                        <td style="text-align: center">7</td>
                        <td><input type="number" min="0" max="7" /></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">3</td>
                        <td>
                            Tham gia tuyên truyền, phòng chống tội phạm và các tệ
                            nạn xã hội
                        </td>
                        <td style="text-align: center">5</td>
                        <td><input type="number" min="0" max="5" /></td>
                    </tr>
                    <tr>
                        <td style="text-align: right; font-weight: bold" colspan="2">
                            Tổng điểm mục III
                        </td>
                        <td style="text-align: center; font-weight: bold">
                            20 điểm
                        </td>
                        <td><input type="number" min="0" max="20" /></td>
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
                        <td><input type="number" min="0" max="10" /></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">2</td>
                        <td>
                            Tích cực tham gia các hoạt động xã hội và đạt thành tích
                            được ghi nhận, biểu dương, khen thưởng
                        </td>
                        <td style="text-align: center">8</td>
                        <td><input type="number" min="0" max="8" /></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">3</td>
                        <td>
                            Có tinh thần chia sẻ, giúp đỡ người thân, người khó
                            khăn, hoạn nạn
                        </td>
                        <td style="text-align: center">7</td>
                        <td><input type="number" min="0" max="7" /></td>
                    </tr>
                    <tr>
                        <td style="text-align: right; font-weight: bold" colspan="2">
                            Tổng điểm mục IV
                        </td>
                        <td style="text-align: center; font-weight: bold">
                            25 điểm
                        </td>
                        <td><input type="number" min="0" max="25" /></td>
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
                        <td><input type="number" min="0" max="3" /></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">2</td>
                        <td>
                            Kỹ năng tổ chức, quản lý lớp, quản lý các tổ chức Đảng,
                            Đoàn Thanh Niên, Hội sinh viên và các tổ chức khác trong
                            Trường
                        </td>
                        <td style="text-align: center">3</td>
                        <td><input type="number" min="0" max="3" /></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">3</td>
                        <td>
                            Sinh viên hỗ trợ và tham gia tích cực các hoạt động
                            chung của lớp, tập thể Khoa và Trường
                        </td>
                        <td style="text-align: center">2</td>
                        <td><input type="number" min="0" max="2" /></td>
                    </tr>
                    <tr>
                        <td style="text-align: center">4</td>
                        <td>
                            Sinh viên đạt được các thành tích đặc biệt trong học
                            tập, rèn luyện
                        </td>
                        <td style="text-align: center">2</td>
                        <td><input type="number" min="0" max="2" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align: right; font-weight: bold">
                            Tổng điểm mục V
                        </td>
                        <td style="text-align: center; font-weight: bold">
                            10 điểm
                        </td>
                        <td><input type="number" min="0" max="10" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="text-align: right; font-weight: bold">
                            Tổng cộng
                        </td>
                        <td></td>
                        <td><input type="number" min="0" max="100" /></td>
                    </tr>
                </tbody>
            </table>
            <div class="wrapper">
                <button class="save-btn">Lưu Kết Quả</button>
            </div>
        </div>
    </div>
</div>