<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('inc/metatag.php'); ?>
    <?php include('inc/loadstyle.php'); ?>
</head>

<body>
    <div class="global-container">
        <?php include('inc/header.php'); ?>
        <section class="site-container">
            <div class="default-header">
                <div class="top-graphic mb-4 text-dark">
                    <figure class="cover">
                        <img src="<?php echo $core_template; ?>/assets/img/background/top-graphic-research.jpg" alt="">
                    </figure>
                    <div class="container">
                        <div class="wrapper">
                            <div class="title typo-lg">งานวิจัย</div>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">หน้าหลัก</a></li>
                                <li class="breadcrumb-item active" aria-current="page">งานวิจัย</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="default-nav">
                <div class="nav-slider-block">
                    <div class="container">
                        <div class="default-nav-slider">
                            <div class="item">
                                <a href="javascript:void(0)" class="active">คลังงานวิจัยสถาบัน</a>
                            </div>
                            <div class="item">
                                <a href="javascript:void(0)">ราคาค่าวิเคราะห์อัญมณี
                                    ด้วยเครื่องมือวิเคราะห์ขั้นสูง</a>
                            </div>
                        </div>
                    </div>
                    <div class="border-nav-slider"></div>
                </div>
            </div>
            <div class="default-page research-page">
                <div class="container">
                    <h2 class="typo-lg text-primary mb-4">คลังงานวิจัยสถาบัน</h2>
                    <div class="default-tab-slider default-slick">
                        <div class="item">
                            <div class="tab-block active">
                                <a class="text-limit" href="javascript:void(0)">งานวิจัยด้านวัตถุดิบและการตรวจสอบคุณภาพอัญมณี</a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="tab-block">
                                <a class="text-limit" href="javascript:void(0)">งานวิจัยด้านเทคโนโลยีการผลิตและการออกแบบ</a>
                            </div>
                        </div>
                        <div class="item">
                            <div class="tab-block">
                                <a class="text-limit" href="javascript:void(0)">งานวิจัยด้านการตลาด</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-auto">
                            <div class="h-title">งานวิจัยด้านวัตถุดิบและการตรวจสอบคุณภาพอัญมณี</div>
                        </div>
                        <div class="col text-right">
                            <div class="form-group has-feedback">
                                <label class="control-label visuallyhidden" for="yearSelect">ปี :</label>

                                <div class="select-wrapper">
                                    <span>ปี :</span>
                                    <select class="select-control select-year" name="ordernews" id="yearSelect">
                                        <option value="SELECT1">2565</option>
                                        <option value="SELECT2">2564</option>
                                        <option value="SELECT3">2563</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php for ($i = 1; $i <= 6; $i++) { ?>
                        <div class="download-block">
                            <div class="row align-items-center">
                                <div class="col-md">
                                    <div class="row no-gutters">
                                        <div class="col-auto">
                                            <img class="icon -icon-download" src="<?php echo $core_template; ?>/assets/img/icon/icon-attachment.svg" alt="attachment icon">
                                        </div>
                                        <div class="col">
                                            <div class="title typo-sm">เทคนิคการตรวจสอบเพชรสังเคราะห์ CVD เพื่อมาตรฐานรองรับการให้บริการในภาคอุตสาหกรรม</div>
                                            <div class="row">
                                                <div class="col-sm-auto">
                                                    <div class="row">
                                                        <div class="col-sm-auto">
                                                            <div class="download-block-type">
                                                                <img class="icon" src="<?php echo $core_template; ?>/assets/img/icon/icon-file.svg" alt="icon file">
                                                                <div class="desc typo-s">
                                                                    ขนาดไฟล์ :
                                                                    <span>3 MB</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-auto">
                                                            <div class="download-block-type">
                                                                <img class="icon" src="<?php echo $core_template; ?>/assets/img/icon/icon-pdf.svg" alt="icon file">
                                                                <div class="desc typo-s">
                                                                    ชนิดไฟล์ :
                                                                    <span>PDF</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-auto">
                                                    <div class="row">
                                                        <div class="col-sm-auto">
                                                            <div class="download-block-type">
                                                                <img class="icon" src="<?php echo $core_template; ?>/assets/img/icon/icon-view-.svg" alt="icon file">
                                                                <div class="desc view typo-s">
                                                                    เข้าชม
                                                                    <span>202</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-auto">
                                                            <div class="download-block-type">
                                                                <img class="icon" src="<?php echo $core_template; ?>/assets/img/icon/icon-time.svg" alt="icon file">
                                                                <div class="desc time typo-s">
                                                                    ปรับปรุงเมื่อ
                                                                    <span>20.02.2565</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-auto">
                                    <div class="row">
                                        <div class="download-block-btn">
                                            <div class="col-auto">
                                                <a href="javascript:void(0)" class="btn" title="btn">อ่านต่อ</a>
                                            </div>
                                            <div class="col-auto">
                                                <a href="javascript:void(0)" class="btn" title="btn">ดาวน์โหลด</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="editor-content">
                    </div>
                    <div class="pagination-block">
                        <div class="row align-items-center">
                            <div class="col-sm-6">
                                <div class="pagination-label">
                                    ทั้งหมด 93 รายการ
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="pagination">
                                    <ul class="item-list">
                                        <li>
                                            <a href="/th/news?page=2" title="ก่อนหน้า">
                                                <span class="feather icon-chevron-left" aria-hidden="true"></span>
                                            </a>
                                        </li>
                                        <li class="active">
                                            <a href="javascript:void(0)" title="1">1</a>
                                        </li>
                                        <li class="">
                                            <a href="javascript:void(0)" title="2">2</a>
                                        </li>
                                        <li class="">
                                            <a href="javascript:void(0)" title="3">3</a>
                                        </li>
                                        <li class="">
                                            <a href="javascript:void(0)" title="4">4</a>
                                        </li>
                                        <li class="">
                                            <a href="javascript:void(0)" title="5">5</a>
                                        </li>
                                        <li class="">
                                            <a href="javascript:void(0)" title="6">6</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0)" title="ถัดไป">
                                                <span class="feather icon-chevron-right" aria-hidden="true"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <?php include('inc/footer.php'); ?>
    </div>
    <?php include('inc/loadscript.php'); ?>
</body>

</html>