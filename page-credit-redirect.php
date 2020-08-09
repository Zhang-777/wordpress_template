<?php
/**
Template Name: SMBC GMO PAYMENT リダイレクト
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

global $param;

// ページタイトル
$param['title'] = CC_PG_TITLE;

// セッションデータ取得
$settle_params = isset($_SESSION["settle_params"]) ? $_SESSION["settle_params"] : array();
// セッションデータの有無をチェック
if (count($settle_params) == 0) {
	header("Location: error.php"); // データ取得できない場合はエラー画面へ遷移
	exit;
}

get_header('logo'); ?>
<form name="paymentform" role="form" method="post" action="<?php echo $smbc_infos[SMBC_ENV]['smbc_url']; ?>">
  <p class="payment_cc_redirect"><?php echo CC_MSG_WAITING; ?></p>
<?php foreach ($settle_params as $key => $value) { ?>
	<input type="hidden" name="<?php echo $key; ?>" value="<?php echo $value; ?>">
<?php } ?>
</form>
<script>
document.paymentform.submit();
</script>
<?php get_footer('copyright');