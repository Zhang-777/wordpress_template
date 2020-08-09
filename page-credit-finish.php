<?php
/**
Template Name: SMBC GMO PAYMENT 完了
**/
?>
<?php
/**
 * The template for displaying all pages.
 *
 *
 * @package wp-dentist
 */
/*
// ファイル読み込み
require_once( __DIR__ . '/pcf_lib/init.php');
require_once( __DIR__ . '/pcf_lib/define.php');

global $param;

// ページタイトル
$param['title'] = CC_PG_TITLE;

// 戻り値POST取得
$ret_params = array(
		'shopID' => filter_input(INPUT_POST, 'ShopID'),
		'jobCd' => filter_input(INPUT_POST, 'JobCd'),
		'amount' => filter_input(INPUT_POST, 'Amount'),
//		'Tax' => filter_input(INPUT_POST, 'ShopID'),
		'accessID' => filter_input(INPUT_POST, 'AccessID'),
		'accessPass' => filter_input(INPUT_POST, 'AccessPass'),
		'orderID' => filter_input(INPUT_POST, 'OrderID'),
		'lang' => function(){
					$orderID = filter_input(INPUT_POST, 'OrderID');
					if (isset($orderID)) {
						$temp = explode('-', $orderID);
						if (count($temp) > 1) {
							return $temp[0];
						}
					}
					return 'en';
				},
		'method' => filter_input(INPUT_POST, 'Method'),
		'payTimes' => filter_input(INPUT_POST, 'PayTimes'),
		'approve' => filter_input(INPUT_POST, 'Approve'),
		'tranID' => filter_input(INPUT_POST, 'TranID'),
		'tranDate' => filter_input(INPUT_POST, 'TranDate'),
		'checkString' => filter_input(INPUT_POST, 'CheckString'),
		'errCode' => filter_input(INPUT_POST, 'ErrCode'),
		'errInfo' => filter_input(INPUT_POST, 'ErrInfo'),
		'userInfo' => call_user_func(function(){
						$clientField1 = filter_input(INPUT_POST, 'ClientField1');
						if (isset($clientField1)) {
							$user_infos = explode('_', $clientField1);
							if (count($user_infos) > 2) {
								return array(
									'number' => $user_infos[0],
									'country' => $user_infos[1],
									'name' => $user_infos[2],
								);
							}
						}
						return array(
							'number' => '',
							'country' => '',
							'name' => '',
						);
					}),
		'email' => filter_input(INPUT_POST, 'ClientField2'),
		'feesInfo' => call_user_func(function() use($define_fees, $select_course){
						$clientField3 = filter_input(INPUT_POST, 'ClientField3');
						$clientField3Array =  explode("-", $clientField3);
						$feesInfo = array();
						if (is_array($clientField3Array)) {
							for ($index = 0; $index < count($clientField3Array); $index++) {
								if ($index === 0) {
									//コース名をセット
									$feesInfo['course'] = $select_course[$clientField3Array[$index]];
								} else {
									if ($index === 8 || $index === 9) {
										$temp = explode('_', $clientField3Array[$index]);
										if (count($temp) === 2) {
											//料金情報あり
											if ($temp[0] === '1') {
												$courseIdx = array_search($feesInfo['course'], $select_course);
												$courseFees = $define_fees[$courseIdx];
												//入力費用をセット
												foreach ($courseFees[$index] as $key => $value) {
													$feesInfo[$key] = $temp[1];
												}
											}
										}
									} else {
										//料金情報あり
										if ($clientField3Array[$index] === '1') {
											$courseIdx = array_search($feesInfo['course'], $select_course);
											$courseFees = $define_fees[$courseIdx];
											foreach ($courseFees[$index] as $key => $value) {
												$feesInfo[$key] = $value;
											}
										}
									}
								}
							}
						}
						return $feesInfo;
					})
);

if (empty($ret_params['errCode']) && !empty($ret_params['email'])) {
	// メール送信
	//$result_to_admin = sendMailtoAdmin($ret_params);
	$result_to_customer = sendMailtoCustomer($ret_params);

	// セッションクリア
	$_SESSION = array();

	//if ($result_to_admin && $result_to_customer) { // 送信成功
	if ($result_to_customer) { // 送信成功
	} else { // 送信失敗
		$message = sprintf('send mail error. orderID:%s, ', '');
		$log_message = sprintf("%s:%s\n", date_i18n('Y-m-d H:i:s'), $message);
		$file_name = WP_CONTENT_DIR . '/logs/' . date_i18n('Y-m-d')  . '.log';
		error_log($log_message, 3, $file_name);
	}
} else {
	if (empty($ret_params['email'])) {
		$message = sprintf('no value email, refer:%s, IP:%s', $_SERVER['HTTP_REFERER'], $_SERVER['REMOTE_ADDR']);
	} else {
		$message = sprintf('credit return error. ErrCode:%s, ErrInfo:%s', $ret_params['errCode'], $ret_params['errInfo']);
	}
	$log_message = sprintf("%s:%s\n", date_i18n('Y-m-d H:i:s'), $message);
	$file_name = WP_CONTENT_DIR . '/logs/' . date_i18n('Y-m-d')  . '.log';
	error_log($log_message, 3, $file_name);
}*/
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
        <h3 class="h_type_2">クレジット決済でのお支払いのお礼</h3>
        <article class="baseBox">
            <h4 class="sbTitle">ご寄付送金のお礼</h4>
            <dl>
                <p>クレジット決済にてお支払いを賜り誠に有難うございます。<br>今後とも引き続きご支援を賜りたくお願い申し上げます。</p>
                <br>
                <p>当協会は、内閣総理大臣より「公益財団法人」の認定を受けており、 当協会への寄付金には「特定公益増進法人」としての税制上の優遇措置が適用され、次の控除が認められております。当協会が発行する領収証とあわせて「税額控除に係る証明書」（写）を添付し、所轄税務署へ確定申告していただくことで、個人の方の場合は「所得控除」又は「税額控除」が受けられます。法人の場合は、一般の寄附金とは別枠で損金として扱うことができます。下記、ご参照ください。</p>

                <h5>１．個人の場合 所得税</h5>
                <p>「所得控除」又は「税額控除」のうち、ご本人に有利な方式で控除が受けられます。</p>
                <p>○所得控除 [ 総所得金額－（所得控除対象寄付金(※1)－2,000円）]×税率＝所得税額 （※1）所得控除対象寄付金：総所得の40％が上限。他の「特定公益増進法人」への寄付金が合算できます。</p>
                <p>○税額控除 所得税額- [（税額控除対象寄付金(※2)-2,000円）×40％＝控除対象額（※3）]  （※2）税額控除対象寄付金：総所得の40％が上限。 他の「所得税の税額控除適用法人」への寄付金が合算できます。  （※3）税額控除対象額：所得税額の25％が上限。</p>
                <p>○相続税<br>
                    遺贈又は相続により取得した財産を、相続税の申告期限内に当会にご寄付いただくと、その財産には相続税が課税されません。
                </p>

                <h5>２．法人の場合</h5>
                <p>公益財団法人に対する寄附金は、一定の損金算入限度額に相当する金額まで、一般の寄附金とは別枠で損金として扱うことができます。また法人地方税は法人税の納付額を基礎に計算されますので、法人税の減免に伴い地方税も減額となります。</p>
                <p>【所轄税務署への確定申告の際は、当協会が発行する領収証とあわせて「税額控除に係る証明書」（写）の添付が必要となります。年末調整等では控除されませんのでご注意下さい。】</p>
            </dl>
        </article>
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
    </body>
</html>