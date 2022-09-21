<base href="{$base}">
<title>{$seo.title|default:$settingWeb.metatitle}</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
{* <meta name="robots" content="noindex, onfollow"> *}
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
<meta name="keywords" content="{$seo.keyword|default:$settingWeb.keywords}">
<meta name="description" content="{$seo.desc|default:$settingWeb.description}">
<meta name="author" content="">
<meta name="HandheldFriendly" content="true">
<meta name="format-detection" content="telephone=no">
<meta name="icon_web" content="{$icon_web}">

<!-- META OPEN GRAPH (FB) -->
{assign  var=valLinkImgSeo value="{$template}/assets/img/static/brand.png"}
<meta property="og:type" content="website">
<meta property="og:url" content="{$fullurl}">
<meta property="og:title" content="{$valSeoTitle|default:$settingWeb.metatitle}">
<meta property="og:description" content="{$seo.desc|default:$settingWeb.description}">
<meta property="og:image" content="{$valSeoImages|default:$valLinkImgSeo}">
<meta property="og:site_name" content="{$valSeoTitle|default:$settingWeb.metatitle}">
<meta property="og:locale" content="">
<meta property="og:locale:alternate" content="">
<link rel="image_src" href="{$valSeoImages|default:$valLinkImgSeo}" />

<!-- TWITTER CARD -->
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="">
<meta name="twitter:description" content="">
<meta name="twitter:url" content="">
<meta name="twitter:image:src" content="">

<!-- ICONS -->
<link rel="shortcut icon" href="{$template}/assets/favicon/favicon.ico" type="image/x-icon"/>
<link rel="apple-touch-icon" sizes="57x57" href="{$template}/assets/favicon/apple-icon-57x57.png">
<link rel="apple-touch-icon" sizes="60x60" href="{$template}/assets/favicon/apple-icon-60x60.png">
<link rel="apple-touch-icon" sizes="72x72" href="{$template}/assets/favicon/apple-icon-72x72.png">
<link rel="apple-touch-icon" sizes="76x76" href="{$template}/assets/favicon/apple-icon-76x76.png">
<link rel="apple-touch-icon" sizes="114x114" href="{$template}/assets/favicon/apple-icon-114x114.png">
<link rel="apple-touch-icon" sizes="120x120" href="{$template}/assets/favicon/apple-icon-120x120.png">
<link rel="apple-touch-icon" sizes="144x144" href="{$template}/assets/favicon/apple-icon-144x144.png">
<link rel="apple-touch-icon" sizes="152x152" href="{$template}/assets/favicon/apple-icon-152x152.png">
<link rel="apple-touch-icon" sizes="180x180" href="{$template}/assets/favicon/apple-icon-180x180.png">
<link rel="icon" type="image/png" href="{$template}/assets/favicon/favicon-16x16.png" sizes="16x16">
<link rel="icon" type="image/png" href="{$template}/assets/favicon/favicon-32x32.png" sizes="32x32">
<link rel="icon" type="image/png" href="{$template}/assets/favicon/favicon-96x96.png" sizes="96x96">
<link rel="icon" type="image/png" href="{$template}/assets/favicon/android-192x192.png" sizes="192x192">

{literal}
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-GWHSHFFKVE"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-GWHSHFFKVE');
</script>

<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MFZMB6F');</script>
<!-- End Google Tag Manager -->
{/literal}