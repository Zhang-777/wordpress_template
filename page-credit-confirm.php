<?php
/**
Template Name: クレジットカードでのお支払い　確認
**/
?>
<?php
/**
 * The template for displaying all pages.
 *
 *
 * @package wp-dentist
 */

// ファイル読み込み
require_once( __DIR__ . '/pcf_lib/init.php');
require_once( __DIR__ . '/pcf_lib/define.php');

// セッションデータ取得
$input_data = isset($_SESSION["input_data"]) ? $_SESSION["input_data"] : array();
// セッションデータの有無をチェック
if (count($input_data) == 0) {
	header("Location: error.php"); // データ取得できない場合はエラー画面へ遷移
	exit;
}

// 各項目データをセット
$l_name = isset($input_data["l_name"]) ? $input_data["l_name"] : "";
$f_name = isset($input_data["f_name"]) ? $input_data["f_name"] : "";
$name = $l_name . " " . $f_name;

$zip1 = isset($input_data["zip1"]) ? $input_data["zip1"] : "";
$zip2 = isset($input_data["zip2"]) ? $input_data["zip2"] : "";
$zip = $zip1 . "-" . $zip2;

$address1 = isset($input_data["address1"]) ? $input_data["address1"] : "";
$address2 = isset($input_data["address2"]) ? $input_data["address2"] : "";
$address3 = isset($input_data["address3"]) ? $input_data["address3"] : "";
$address4 = isset($input_data["address4"]) ? $input_data["address4"] : "";
$address = $address2 . $address3 . $address4;

$mail_address = isset($input_data["email"]) ? $input_data["email"] : "";
$tel1 = isset($input_data["tel1"]) ? $input_data["tel1"] : "";
$tel2 = isset($input_data["tel2"]) ? $input_data["tel2"] : "";
$tel3 = isset($input_data["tel3"]) ? $input_data["tel3"] : "";
$tel = $tel1 . "-" . $tel2 . "-" . $tel3;

$kind = isset($input_data["kind"]) ? $input_data["kind"] : array();
$member_kind = isset($input_data["member_kind"]) ? $input_data["member_kind"] : array();
$member_gaku1 = isset($input_data["member_gaku_1"]) ? $input_data["member_gaku_1"] : "";
$member_gaku2 = isset($input_data["member_gaku_2"]) ? $input_data["member_gaku_2"] : "";
$member_gaku3 = isset($input_data["member_gaku_3"]) ? $input_data["member_gaku_3"] : "";
$kifu_gaku = isset($input_data["kifu_gaku"]) ? $input_data["kifu_gaku"] : "";
$kifu_use = isset($input_data["kifu_use"]) ? $input_data["kifu_use"] : "";
$sub_kind = isset($input_data["sub_kind"]) ? $input_data["sub_kind"] : "";

$member_gaku = 0;
// 会員
if ($kind == "1") {
    switch ($member_kind) {
        case "1":
            $member_gaku = $member_gaku1 * 10000;
            break;
        case "2":
            $member_gaku = $member_gaku3 * 100000;
            break;
        case "3":
            $member_gaku = $member_gaku3 * 100000;
            break;
    }
}
// 購読費
$sub_gaku = 0;
if ($kind == "3") {
    switch ($sub_kind) {
        case "5":
            $sub_gaku = 2000;
            break;
        case "6":
            $sub_gaku = 4000;
            break;
        case "7":
            $sub_gaku = 6000;
            break;
    }
}

//操作アクションを取得
$act = isset($_POST["act"]) ? intval($_POST["act"]) : 1;

// 送信ボタンを押下された場合
if ($act == 3) {
	$shop_id = $smbc_infos[SMBC_ENV]['shop_id'];
	$shop_pwd = $smbc_infos[SMBC_ENV]['shop_pwd'];
	$amount = isset($_POST["total"]) ? intval($_POST["total"]) : 0;
	$submit_time = date('YmdHis');
	$lang = str_replace('/', '', parse_url(home_url())['path']);
	$order_id = (empty($lang) ? 'jp' : $lang) . $number . '-' . $submit_time;
	//ショップ ID + “|” + オーダーID + “|” + 利用金額 + “|” + 税送料 + “|” + ショップパスワード + “|” + 日時情報
	$shop_string = sprintf('%s|%s|%s||%s|%s', $shop_id, $order_id, $amount, $shop_pwd, $submit_time);

    $clientField1 = array();
    foreach ($kind as $value) {
        // 会員
        if ($value === "1") {
            $clientField1[] = sprintf('%s_%s', $member_kind, $member_gaku);
        }
        // 寄付
        if ($value === "2") {
            $clientField1[] = sprintf('4_%s_%s', $kifu_gaku, $kifu_use);
        }
        // 購読費
        if ($value === "3") {
            $clientField1[] = sprintf('%s_%s', $kifu_gaku, $sub_gaku);
        }
    }

	$_SESSION['settle_params'] = array(
		'ShopID' => $shop_id,
		'OrderID' => $order_id,
		'Amount' => $amount,
//		'Tax' => '',
		'DateTime' => $submit_time,
		'ShopPassString' => md5($shop_string),
		'RetURL' => home_url() . '/payment-cc-finish',
		'CancelURL' => home_url(),
		'ClientField1' => implode(' ', $clientField1),
		'ClientField2' => sprintf('%s_%s', $name, $email),
		'ClientField3' => sprintf('%s %s%s', $zip, $address1, $address),
//		'UserInfo' => '',
//		'RetryMax' => '',
//		'SessionTimeout' => '',
		'Enc' => 'utf-8',
		'Lang' => 'Ja',
		'Confirm' => '1',
		'UseCredit' => '1',
		'TemplateNo' => 1,
		'JobCd' => 'CAPTURE',
//		'ItemCode' => '',
	);
	header("Location: " . home_url() . "/credit_redirect");
	exit;
}
?>
<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta name="robots" content="noindex,follow" />
        <meta charset="utf-8">
        <title>国際教育支援｜公益財団法人 アジア学生文化協会</title>
        <meta name="description" content="国際教育支援,日本語学校,日本語,日本語学習,アジア,太極拳,語学,留学,ＡＢＫ,ABK,セミナー,宿舎,研修所">
        <meta name="viewport" content="width=device-width,user-scalable=no,shrink-to-fit=yes">
        <script src="<?php echo get_template_directory_uri(); ?>/js/viewport.js"></script>

        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/normalize.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/credit.css">
        <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/additional.css">
    </head>
    <body class="under donation_page credit_page">
		<?php get_header(); ?>
    <section class="fv flex-wrap_par">
			<h2 class="fc_red">会費・ご寄付</h2>
			<div class="pix">
				<div class="pix-logo">
					<img src="<?php echo get_template_directory_uri(); ?>/img/mv_logo.jpg" alt="" />
				</div>
			</div>
		</section>
    <section class="sec_pad_1_t sec_pad_1_b wrap_800">
      <h2 class="h_type_1">会費・ご寄付・アジアの友購読料<br>新規会員登録</h2>
      <span>Membership fee, Donation, Asian friends payment</span>
      <div class="fom wrap_710">
        <h3 class="h_type_2">インターネットからクレジットカードでのご送金</h3>
        <h4 class="progress_title">＜ 送金内容の確認 ＞</h4>
        <form method="post" name="" action="https://p01.smbc-gp.co.jp/link/8100052000443/Multi/Entry">
          <article class="flex-wrap_par">
            <?php  if($ERROR){echo '<div class="errorMes">'.$ERROR.'</div>';} ?>
            <div class="th vx">氏名 (漢字またはローマ字)<span class="fc_red">※</span></div>
            <div class="td vx">
              <span class="confirm_text"><?php echo $name ?> 様</span>
            </div>
            <div class="th vx">ご自宅ご住所<span class="fc_red">※</span></div>
            <div class="td vx">
              <span class="confirm_text">〒<?php echo $zip." ".$address ?></span>
            </div>
            <div class="th vx">メールアドレス<span class="fc_red">※</span></div>
            <div class="td vx">
              <span class="confirm_text"><?php echo $mail_address ?></span>
            </div>
            <div class="th vx">連絡先電話番号<span class="fc_red">※</span></div>
            <div class="td vx">
              <span class="confirm_text"><?php echo $tel ?></span>
            </div>
            <div class="th vx">会費</div>
            <div class="td vx">
              <span class="confirm_text"><?php echo number_format($amount) ?> 円</span>
            </div>
            <div class="th vx">ご寄付</div>
            <div class="td vx">
              <span class="confirm_text"><?php echo number_format($amount) ?> 円</span>
            </div>
            <div class="th vx">アジアの友購読費</div>
            <div class="td vx">
              <span class="confirm_text"><?php echo number_format($amount) ?> 円</span>
            </div>
            <?php
              $todaytime=date("YmdHis");
              //echo $todaytime;
              //↓テスト
              //$str='tshop00000513|'.$did.'|'.$amount.'||6b7bke1n|'.$todaytime;
              //↓本番
              $str='8100052000443|'.$did.'|'.$amount.'||75b9n7rt|'.$todaytime;
              //echo $str."<br>";
              $ShopPassString=md5($str);
              //echo $ShopPassString;
            ?>
            <input type="hidden" name="Amount" value="<?php echo $amount ?>">
            <input type="hidden" name="ClientField1" value="<?php echo $name ?>">
            <input type="hidden" name="ClientField2" value="〒<?php echo $zip." ".$address ?>">
            <input type="hidden" name="ClientField3" value="<?php echo $mail_address ?>">
            <input type="hidden" name="UseCredit" value="1">
            <input type="hidden" name="TemplateNo" value="<?php echo $TemplateNo ?>">
            <input type="hidden" name="UserInfo" value="<?php echo $UserInfo ?>">
            <input type="hidden" name="ShopID" value="8100052000443">
            <input type="hidden" name="OrderID" value="<?php echo $did ?>">
            <input type="hidden" name="DateTime" value="<?php echo $todaytime ?>">
            <input type="hidden" name="ShopPassString" value="<?php echo $ShopPassString ?>">
            <input type="hidden" name="RetURL" value="https://www.abk.or.jp/donation/thanks.php">
            <input type="hidden" name="JobCd" value="CAPTURE">
            <input type="submit" name="" value="以上の内容でクレジット決済に進む" class="btn_type_send hover">
          </article>
        </form>
        <article>
          <address>
            〒113-8642 東京都文京区本駒込2-12-13<br>
            公益財団法人アジア学生文化協会会員係り<br>
            電話: 03-3946-4121  FAX: 03-3946-7599  email: <a href="mailto:asca60com@abk.or.jp">asca60com@abk.or.jp</a>
          </address>
        </article>
      </div>
		</section>
    <?php get_footer(); ?>
        <script src="<?php echo get_template_directory_uri(); ?>/js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery-3.2.1.min.js"><\/script>')</script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/plugins.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/main.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/jquery.sliderPro.min.js"></script>
	</body>
</html>
