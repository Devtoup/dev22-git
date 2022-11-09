<?php
/* Smarty version 4.0.0, created on 2022-11-08 17:13:40
  from '/var/www/html/front/template/default/_component/career-detail.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.0.0',
  'unifunc' => 'content_636a2bd49306f8_92976525',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1d7788481d09a1c5b5a5b3bf175019206f0be1a3' => 
    array (
      0 => '/var/www/html/front/template/default/_component/career-detail.tpl',
      1 => 1665468406,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_636a2bd49306f8_92976525 (Smarty_Internal_Template $_smarty_tpl) {
?><section class="site-container">
  <div class="default-header">
    <div class="top-graphic mb-4">
      <figure class="cover">
        <img class="figure-img img-fluid"
          src="<?php echo $_smarty_tpl->tpl_vars['template']->value;
echo $_smarty_tpl->tpl_vars['settingModulus']->value['tgp'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['settingModulus']->value['subject'];?>
">
      </figure>
      <div class="container">
        <div class="wrapper">
          <div class="title typo-lg"><?php echo $_smarty_tpl->tpl_vars['settingModulus']->value['title'];?>
</div>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/home"><?php echo $_smarty_tpl->tpl_vars['lang']->value['menu']['home'];?>
</a></li>
            <?php if ($_smarty_tpl->tpl_vars['settingModulus']->value['subject'] != '') {?>
              <li class="breadcrumb-item"><a href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['menuActive']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['settingModulus']->value['subject'];?>
</a></li>
            <?php }?>
            <li class="breadcrumb-item active" aria-current="page"><?php echo $_smarty_tpl->tpl_vars['settingModulus']->value['breadcrumb'];?>
</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="default-page about">
    <?php if (count($_smarty_tpl->tpl_vars['getMenuDetail']->value) > 0) {?>
      <div class="container">
        <div class="default-nav-slider" data-slick='<?php echo $_smarty_tpl->tpl_vars['initialSlide']->value;?>
'>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['getMenuDetail']->value, 'valuegetMenuDetail', false, 'keygetMenuDetail');
$_smarty_tpl->tpl_vars['valuegetMenuDetail']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['keygetMenuDetail']->value => $_smarty_tpl->tpl_vars['valuegetMenuDetail']->value) {
$_smarty_tpl->tpl_vars['valuegetMenuDetail']->do_else = false;
?>
            <?php $_smarty_tpl->_assignInScope('arrName', explode("-",$_smarty_tpl->tpl_vars['valuegetMenuDetail']->value['subject']));?>
            <div class="item">
              <a href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['menuActive']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['valuegetMenuDetail']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['MenuID']->value == $_smarty_tpl->tpl_vars['valuegetMenuDetail']->value['masterkey']) {?>class="active"<?php }?>><?php echo $_smarty_tpl->tpl_vars['arrName']->value[0];?>
</a>
            </div>
          <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
        </div>
      </div>
    <?php }?>

    <div class="container">
      <div class="row">
        <div class="col">
          <div class="h-title -mc"><?php echo $_smarty_tpl->tpl_vars['lang']->value['career']['source'];?>
</div>
        </div>
      </div>
      <div class="default-bar">
        <div class="row align-items-center">
          <div class="col-md-auto">
            <div class="whead">
              <div class="h-title"><?php echo $_smarty_tpl->tpl_vars['callCMS']->value->fields['subject'];?>
</div>
            </div>
          </div>
          <div class="col-md">
            <div class="social-block">
              <div class="title"><?php echo $_smarty_tpl->tpl_vars['lang']->value['system']['share'];?>
 :</div>
              <ul class="item-list">
                <li>
                  <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $_smarty_tpl->tpl_vars['fullurl']->value;?>
" target="_blank" class="link">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/icon/icon-social-facebook.svg" alt=""
                      style=" width: auto; ">
                  </a>
                </li>
                <li>
                  <a href="https://twitter.com/intent/tweet?url=<?php echo $_smarty_tpl->tpl_vars['fullurl']->value;?>
" target="_blank" class="link">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/icon/icon-social-twitter.svg" alt="">
                  </a>
                </li>
                <li>
                  <a href="mailto:?subject=<?php echo $_smarty_tpl->tpl_vars['callCMS']->value->fields['subject'];?>
&amp;body=Check out this site : <?php echo $_smarty_tpl->tpl_vars['fullurl']->value;?>
"
                  title="<?php echo $_smarty_tpl->tpl_vars['infoSetting']->value->fields['subject'];?>
" class="link">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/icon/icon-social-gmail.svg" alt="">
                  </a>
                </li>
                <li class="-bsc"></li>
                <li>
                  <a href="javascript:window.print()" class="link">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/icon/icon-print.svg" alt="">
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="whead-addon -bsc">
              <div class="detail-info">
                <ul class="item-list">
                  <li><?php ob_start();
echo $_smarty_tpl->tpl_vars['langon']->value;
$_prefixVariable1 = ob_get_clean();
echo DateThai($_smarty_tpl->tpl_vars['callCMS']->value->fields['credate'],'23',$_prefixVariable1,'shot3');?>
</li>
                  <li>
                    <span class="feather icon-eye mr-2"></span>
                    <?php echo $_smarty_tpl->tpl_vars['callCMS']->value->fields['view'];?>
 <?php echo $_smarty_tpl->tpl_vars['lang']->value['system']['view'];?>

                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-12">
            <div class="whead-addon">
              <div class="detail-info">
                <ul class="item-list -c">
                  <li><?php echo $_smarty_tpl->tpl_vars['lang']->value['career']['quantity'];?>
 : <?php echo $_smarty_tpl->tpl_vars['callCMS']->value->fields['quantity'];?>
 <?php echo $_smarty_tpl->tpl_vars['lang']->value['career']['position'];?>
</li>
                  <li class="-bsc"></li>
                  <li><?php echo $_smarty_tpl->tpl_vars['lang']->value['career']['location'];?>
 : <?php echo $_smarty_tpl->tpl_vars['callCMS']->value->fields['address'];?>
</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="editor-content">
        <?php if ($_smarty_tpl->tpl_vars['callCMS']->value->fields['htmlfilename'] != '') {?>
            <!-- CK Editor -->
            <?php echo callHtml(fileinclude($_smarty_tpl->tpl_vars['callCMS']->value->fields['htmlfilename'],"html",$_smarty_tpl->tpl_vars['callCMS']->value->fields['masterkey']));?>

            <!-- CK Editor -->
        <?php }?>
      </div>
      <div class="border-nav-slider pt-5"></div>
      <?php if ($_smarty_tpl->tpl_vars['callCMS']->value->fields['url'] != '' && $_smarty_tpl->tpl_vars['callCMS']->value->fields['url'] != '#') {?>
        <?php $_smarty_tpl->_assignInScope('myUrlArray', explode("v=",$_smarty_tpl->tpl_vars['callCMS']->value->fields['url']));?>
        <?php $_smarty_tpl->_assignInScope('myUrlCut', $_smarty_tpl->tpl_vars['myUrlArray']->value[1]);?>
        <?php $_smarty_tpl->_assignInScope('myUrlCutArray', explode("&",$_smarty_tpl->tpl_vars['myUrlCut']->value));?>
        <?php $_smarty_tpl->_assignInScope('myUrlCutAnd', $_smarty_tpl->tpl_vars['myUrlCutArray']->value[0]);?>
        <div class="youtube-block pt-4">
          <div class="iframe-container">
            <iframe class="responsive-iframe" src="https://www.youtube.com/embed/<?php echo $_smarty_tpl->tpl_vars['myUrlCutAnd']->value;?>
" title="YouTube video player"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
              allowfullscreen></iframe>
          </div>
        </div>
      <?php }?>
      <?php if ($_smarty_tpl->tpl_vars['Call_File']->value->_numOfRows >= 1) {?>
        <div class="row mt-5">
          <div class="col-12">
            <h2 class="text-primary mb-4"><?php echo $_smarty_tpl->tpl_vars['lang']->value['system']['attachment'];?>
</h2>
            <div class="attachment-slider default-slick">
              <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Call_File']->value, 'valueCall_File', false, 'keyCall_File');
$_smarty_tpl->tpl_vars['valueCall_File']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['keyCall_File']->value => $_smarty_tpl->tpl_vars['valueCall_File']->value) {
$_smarty_tpl->tpl_vars['valueCall_File']->do_else = false;
?>
                <?php ob_start();
echo $_smarty_tpl->tpl_vars['callCMS']->value->fields['masterkey'];
$_prefixVariable2 = ob_get_clean();
$_smarty_tpl->_assignInScope('fileinfo', get_Icon(fileinclude($_smarty_tpl->tpl_vars['valueCall_File']->value['filename'],'file',$_prefixVariable2)));?>
                <div class="item">
                  <div class="attachment-block">
                    <a href="<?php echo $_smarty_tpl->tpl_vars['ul']->value;?>
/download/<?php ob_start();
echo $_smarty_tpl->tpl_vars['callCMS']->value->fields['masterkey'];
$_prefixVariable3 = ob_get_clean();
echo fileinclude($_smarty_tpl->tpl_vars['valueCall_File']->value['filename'],'file',$_prefixVariable3,'download');?>
&n=<?php echo $_smarty_tpl->tpl_vars['valueCall_File']->value['name'];?>
&t=<?php echo encodeStr('md_jof');?>
" class="link" title="<?php echo $_smarty_tpl->tpl_vars['lang']->value['system']['attachment'];?>
" class="link" title="เอกสารแนบ">
                      <div class="row no-gutters">
                        <div class="col-auto">
                          <!-- <img class="icon" src="<?php echo $_smarty_tpl->tpl_vars['template']->value;?>
/assets/img/icon/icon-attachment.svg" alt="attachment icon"> -->
                          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="41" viewBox="0 0 32 41">
                            <g data-name="Group 9337" transform="translate(0)">
                              <path data-name="Path 2087"
                                d="M9.75,2h15a1,1,0,0,1,.721.307l11.25,11.7A1,1,0,0,1,37,14.7V38.1A4.832,4.832,0,0,1,32.25,43H9.75A4.832,4.832,0,0,1,5,38.1V6.9A4.832,4.832,0,0,1,9.75,2ZM24.324,4H9.75A2.831,2.831,0,0,0,7,6.9V38.1A2.831,2.831,0,0,0,9.75,41h22.5A2.831,2.831,0,0,0,35,38.1v-23Z"
                                transform="translate(-5 -2)" fill="#013f94" />
                              <path data-name="Path 2088"
                                d="M32.438,15.438H21a1,1,0,0,1-1-1V3a1,1,0,0,1,2,0V13.438H32.438a1,1,0,0,1,0,2Z"
                                transform="translate(-1.438 -2)" fill="#013f94" />
                              <path data-name="Path 2089" d="M26.75,20.5H12a1,1,0,0,1,0-2H26.75a1,1,0,0,1,0,2Z"
                                transform="translate(-3.375 2.949)" fill="#013f94" />
                              <path data-name="Path 2090" d="M26.75,26.5H12a1,1,0,0,1,0-2H26.75a1,1,0,0,1,0,2Z"
                                transform="translate(-3.375 4.75)" fill="#013f94" />
                              <path data-name="Path 2091" d="M15.813,14.5H12a1,1,0,0,1,0-2h3.813a1,1,0,0,1,0,2Z"
                                transform="translate(-3.518 1.15)" fill="#013f94" />
                            </g>
                          </svg>
                        </div>
                        <div class="col">
                          <div class="title typo-sm"><?php echo $_smarty_tpl->tpl_vars['valueCall_File']->value['name'];?>
</div>
                          <div class="subtitle typo-x"><?php echo $_smarty_tpl->tpl_vars['lang']->value['system']['size'];?>
 : <?php ob_start();
echo $_smarty_tpl->tpl_vars['callCMS']->value->fields['masterkey'];
$_prefixVariable4 = ob_get_clean();
echo get_IconSize(fileinclude($_smarty_tpl->tpl_vars['valueCall_File']->value['filename'],'file',$_prefixVariable4));?>
 | <?php echo $_smarty_tpl->tpl_vars['lang']->value['system']['type'];?>
 : <?php echo $_smarty_tpl->tpl_vars['fileinfo']->value['type'];?>
</div>
                        </div>
                      </div>
                    </a>
                  </div>
                </div>
              <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </div>
          </div>
        </div>
      <?php }?>

      <div class="row pt-5 text-right">
        <div class="col-12">
          <a href="javascript:history.back();" class="btn btn-border-primary" title="btn btn-primary"><?php echo $_smarty_tpl->tpl_vars['lang']->value['system']['btn_back'];?>
</a>
        </div>
      </div>
    </div>
  </div>
</section><?php }
}