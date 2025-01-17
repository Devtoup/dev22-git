<section class="site-container">
    <div class="default-header">
        <div class="top-graphic mb-4">
            <figure class="cover">
                <img class="figure-img img-fluid" src="{$template}{$settingModulus.tgp}" alt="{$settingModulus.subject}">
            </figure>
            <div class="container">
                <div class="wrapper">
                <div class="title typo-lg">{$settingModulus.title}</div>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{$ul}/home">{$lang['menu']['home']}</a></li>
                    {if $settingModulus.subject neq ""}
                        <li class="breadcrumb-item"><a href="{$ul}/{$menuActive}">{$settingModulus.subject}</a></li>
                    {/if}
                    <li class="breadcrumb-item active" aria-current="page">{$settingModulus.breadcrumb}</li>
                </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="default-page about">
        {if count($getMenuDetail) > 0}
            <div class="container">
                <div class="default-nav-slider" data-slick='{$initialSlide}'>
                    {foreach $getMenuDetail as $keygetMenuDetail => $valuegetMenuDetail}
                    {$arrName = explode("-", $valuegetMenuDetail.subject)}
                    <div class="item">
                        <a href="{$ul}/{$menuActive}/{$valuegetMenuDetail.id}" {if $MenuID eq $valuegetMenuDetail.masterkey}class="active"{/if}>{$arrName[0]}</a>
                    </div>
                    {/foreach}
                </div>
            </div>
        {/if}
        <div class="border-nav-slider"></div>
        {if count($arrMenu) > 0}
            <div class="container mt-5">
                <h2 class="text-primary mb-4">{$settingModulus.breadcrumb}</h2>
                <div class="default-tab-slider default-slick" data-slick='{$initialSlide2}'>
                  {foreach $arrMenu as $keyarrMenu => $valuearrMenu}
                    <div class="item">
                      <div class="tab-block {if $callGroup->fields.id eq $valuearrMenu.id}active{/if}">
                        <a class="text-limit" href="{str_replace("//","/","{$ul}/{$menuActive}/{$valuearrMenu.menuid}/{$valuearrMenu.id}")}">{$valuearrMenu.subject}</a>
                      </div>
                    </div>
                  {/foreach}
                </div>
            </div>
        {/if}

        <div class="container">
            <div class="row align-items-center">
                <div class="col-auto">
                    <div class="h-title">{$callGroup->fields.subject}</div>
                </div>
                {if count($callYear) > 0}
                    <div class="col text-right">
                        <div class="form-group">
                            <label class="control-label visuallyhidden" for="yearSelect">{$lang['system']['year']} :</label>
                            <div class="select-wrapper">
                                <span>{$lang['system']['year']} :</span>
                                <select class="select-control select-year" name="ordernews" id="yearSelect">
                                    <option value="All">{$lang['system']['all']}</option>
                                    {foreach $callYear as $keycallYear => $valuecallYear}
                                      <option value="{date('Y', strtotime($valuecallYear.credate))}" {if $req_params['year'] eq date('Y', strtotime($valuecallYear.credate))}selected="selected"{/if}>{date('Y', strtotime(DateFormat($valuecallYear.credate)))}</option>
                                    {/foreach}
                                </select>
                            </div>
                        </div>
                    </div>
                {/if}
            </div>

            {if count($arrListData) > 0}
                {foreach $arrListData as $keyarrListData => $valuearrListData}
                    <div class="row py-3">
                        <div class="col">
                            <div class="collapse-block">
                                <div id="accordionInner">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">
                                                <button class="btn btn-lg fluid {if $keyarrListData gte 1}collapsed{/if}" data-toggle="collapse" data-target="#about-{$valuearrListData.subgroup.id}" aria-expanded="{if $keyarrListData eq 0}true{else}false{/if}" aria-controls="collapse">
                                                    <span>
                                                        {$valuearrListData.subgroup.subject}
                                                    </span>
                                                    <span class="feather icon-plus-circle"></span>
                                                </button>
                                            </h3>
                                        </div>
                                        <div id="about-{$valuearrListData.subgroup.id}" class="collapse {if $keyarrListData eq 0}show{/if}" aria-labelledby="headingCollapse" data-parent="#accordion">
                                            {foreach $valuearrListData.list as $keyList => $valueList}
                                                {$Call_File = $callSetWebsite::Call_File($valueList['id'])}
                                                {$fileinfo = $Call_File->fields['filename']|fileinclude:'file':{$valueList.masterkey}|get_Icon}
                                                {if $Call_File->fields.name neq ""}
                                                {$subject = $Call_File->fields.name}
                                                {else}
                                                {$subject = $valueList.subject}
                                                {/if}
                                                <div class="download-block">
                                                    <div class="row align-items-center">
                                                        <div class="col-md">
                                                            <div class="row no-gutters">
                                                                <div class="col-auto">
                                                                    <img class="icon -icon-download" src="{$template}/assets/img/icon/icon-attachment.svg" alt="attachment icon">
                                                                </div>
                                                                <div class="col">
                                                                    <div class="title typo-sm">{$subject}</div>
                                                                    <div class="row">
                                                                        {if $Call_File->_numOfRows gte 1}
                                                                            <div class="col-sm-auto">
                                                                                <div class="row">
                                                                                    <div class="col-sm-auto">
                                                                                        <div class="download-block-type">
                                                                                            <img class="icon" src="{$template}/assets/img/icon/icon-file.svg" alt="icon file">
                                                                                            <div class="desc typo-s">
                                                                                                {$lang['system']['size']} :
                                                                                                <span>{$Call_File->fields['filename']|fileinclude:'file':{$valueList.masterkey}|get_IconSize}</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-sm-auto">
                                                                                        <div class="download-block-type">
                                                                                            <img class="icon" src="{$template}/assets/img/icon/icon-pdf.svg" alt="icon file">
                                                                                            <div class="desc typo-s">
                                                                                                {$lang['system']['type']} :
                                                                                                <span>{$fileinfo.type}</span>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        {/if}
                                                                        <div class="col-sm-auto">
                                                                            <div class="row">
                                                                                <div class="col-sm-auto">
                                                                                    <div class="download-block-type">
                                                                                        <img class="icon" src="{$template}/assets/img/icon/icon-view-.svg" alt="icon file">
                                                                                        <div class="desc view typo-s">
                                                                                            {$lang['system']['view']}
                                                                                            <span>{$valueList.view|number_format}</span>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-sm-auto">
                                                                                    <div class="download-block-type">
                                                                                        <img class="icon" src="{$template}/assets/img/icon/icon-time.svg" alt="icon file">
                                                                                        <div class="desc time typo-s">
                                                                                            {$lang['system']['lastdate']}
                                                                                            <span>{$valueList.credate|DateThai:'23':{$langon}:'shot3'}</span>
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
                                                                    {if $valueList.typec eq 1}
                                                                        <div class="col-auto">
                                                                            <a href="{$ul}/{$menuActive}/{$valueList.menuid}/{$valueList.gid}/{$menuDetail}/{$valueList.id}" class="btn" title="{$lang['system']['viewmore']}">{$lang['system']['viewmore']}</a>
                                                                        </div>
                                                                    {/if}
                                                                    {if $Call_File->_numOfRows gte 1}
                                                                        <div class="col-auto">
                                                                            <a href="{$ul}/download/{$Call_File->fields['filename']|fileinclude:'file':{$valueList.masterkey}:'download'}&n={$Call_File->fields['name']}&t={'md_cmf'|encodeStr}" class="btn" title="{$lang['system']['download']}">{$lang['system']['download']}</a>
                                                                        </div>
                                                                    {/if}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            {/foreach}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                {/foreach}
            {/if}

            <div class="editor-content">
            </div>
            {if $callCMS->_numOfRows gte 1 && $pagination['totalpage'] gte 2}
                {include file="{$incfile.pagination}"}
            {/if}
        </div>
    </div>
</section>