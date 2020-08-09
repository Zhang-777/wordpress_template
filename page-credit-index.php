<?php
/**
Template Name: クレジットカードでのお支払い　入力
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
require_once( __DIR__ . '/pcf_lib/validate.php');
require_once( __DIR__ . '/pcf_lib/define.php');
/*
if ($donation_confirm) {

    if (!(($l_name) && ($f_name))) {
        $ERROR .= '▼ 氏名（漢字）を入力してください<br>';
    }
    if (!(($zip1) && ($zip2))) {
        $ERROR .= '▼ ご自宅郵便番号を入力してください<br>';
    }
    if (!(($address1) && ($address2) && ($address3))) {
        $ERROR .= '▼ ご自宅ご住所を入力してください<br>';
    }
    if (!($mail_address)) {
        $ERROR .= '▼ メールアドレスを入力してください<br>';
    }
    if (!($mail_address2)) {
        $ERROR .= '▼ メールアドレス(確認)を入力してください<br>';
    }
    if (!($mail_address == $mail_address2)) {
        $ERROR .= '▼ メールアドレスとメールアドレス(確認)の内容が違います<br>';
    }
    if (!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $mail_address)) {
        $ERROR .= '▼ メールアドレスの形式が違います<br>';
    }
    if (!(($tel1) && ($tel2) && ($tel3))) {
        $ERROR .= '▼ 連絡先電話番号を入力してください<br>';
    }
    if (!($flag)) {
        $ERROR .= '▼ ご寄付金額を選択してください<br>';
    }
    if ($flag == "kin") {
        if (!($gaku2 > 999)) {
            $ERROR .= '▼ 金額は1,000円以上でご入力ください<br>';
        }
    }

    if (!($ERROR)) {
        $name = $l_name . " " . $f_name;
        $zip = $zip1 . "-" . $zip2;
        $address = $address2 . $address3 . $address4;
        $tel = $tel1 . "-" . $tel2 . "-" . $tel3;
        if ($flag == "kuti") {
            $amount = $gaku * 50000;
        } else {
            $amount = $gaku2;
        }

        header("Location:credit_confirm.php");
    }
 */
if ($act == 1) {
	// セッションデータクリア
	$input_data = array();
	// 初期値セット
	$ERROR = '';
	$l_name = '';
	$f_name = '';
	$zip1 = '';
	$zip2 = '';
	$address1 = '';
	$address2 = '';
	$address3 = '';
	$address4 = '';
	$mail_address = '';
	$mail_address2 = '';
	$tel1 = '';
	$tel2 = '';
	$tel3 = '';
    $kind = array();
    $member_kind = array();
    $member_gaku1 = '';
    $member_gaku2 = '';
    $member_gaku3 = '';
    $kifu_gaku = '';
    $kfu_use = array();
    $sub_kind = '';
} else {
	if ($act == 2) { // 確認ボタンを押下された場合
		// POSTデータをセッションに格納
		$_SESSION["input_data"] = isset($_POST["input_data"]) ? $_POST["input_data"] : array();
		$input_data = $_SESSION["input_data"];
	} else {
		// セッションデータ取得
		$input_data = isset($_SESSION["input_data"]) ? $_SESSION["input_data"] : array();
	}
	// 各項目データをセット
	$l_name = isset($input_data["l_name"]) ? $input_data["l_name"] : "";
	$f_name = isset($input_data["f_name"]) ? $input_data["f_name"] : "";
	$zip1 = isset($input_data["zip1"]) ? $input_data["zip1"] : "";
	$zip2 = isset($input_data["zip2"]) ? $input_data["zip2"] : "";
    $address1 = isset($input_data["address1"]) ? $input_data["address1"] : "";
    $address2 = isset($input_data["address2"]) ? $input_data["address2"] : "";
    $address3 = isset($input_data["address3"]) ? $input_data["address3"] : "";
    $address4 = isset($input_data["address4"]) ? $input_data["address4"] : "";
	$mail_address = isset($input_data["email"]) ? $input_data["email"] : "";
	$mail_address2 = isset($input_data["email2"]) ? $input_data["email2"] : "";
	$tel1 = isset($input_data["tel1"]) ? $input_data["tel1"] : "";
	$tel2 = isset($input_data["tel2"]) ? $input_data["tel2"] : "";
	$tel3 = isset($input_data["tel3"]) ? $input_data["tel3"] : "";
	$kind = isset($input_data["kind"]) ? $input_data["kind"] : array();
	$member_kind = isset($input_data["member_kind"]) ? $input_data["member_kind"] : array();
	$member_gaku1 = isset($input_data["member_gaku_1"]) ? $input_data["member_gaku_1"] : "";
	$member_gaku2 = isset($input_data["member_gaku_2"]) ? $input_data["member_gaku_2"] : "";
	$member_gaku3 = isset($input_data["member_gaku_3"]) ? $input_data["member_gaku_3"] : "";
    $kifu_gaku = isset($input_data["kifu_gaku"]) ? $input_data["kifu_gaku"] : "";
    $kifu_use = isset($input_data["kifu_use"]) ? $input_data["kifu_use"] : "";
    $sub_kind = isset($input_data["sub_kind"]) ? $input_data["sub_kind"] : "";

	if ($act == 2) { // 確認ボタンを押下された場合
		// 入力チェック
		$ERROR = checkInputData($input_data);
		if(!$ERROR){
			header("Location: " . home_url() . "/credit_confirm");
			exit();
		}
	}
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
        <form method="post" name="Form1" action="">
          <article class="flex-wrap_par mt_40">
            <?php  if($ERROR){echo '<div class="errorMes">'.$ERROR.'</div>';} ?>
            <div class="th vx">氏名 (漢字またはローマ字)<span class="fc_red">※</span></div>
            <div class="td vx name_field">
              <input type="text" name="input_data[l_name]" value="<?php echo $l_name ?>" placeholder="姓">　<input type="text" name="input_data[f_name]" value="<?php echo $f_name ?>" placeholder="名">
            </div>
            <div class="th vx">ご自宅郵便番号<span class="fc_red">※</span></div>
            <div class="td vx zip_field">
              <input type="tel" name="input_data[zip1]" class="inzip" id="postcode1" value="<?php echo $zip1 ?>" maxlength="3" onKeyUp="nextField(this, 'zip2', 3)"><span class="dash">-</span><input type="tel" name="input_data[zip2]" class="inzip" id="postcode2" value="<?php echo $zip2 ?>" maxlength="4">
            </div>
            <div class="th vx">ご自宅ご住所<span class="fc_red">※</span></div>
            <div class="td vx">
              <div class="address_field">
                <select name="input_data[address1]" id="address1" class="inprefecture">
                  <option value="" selected="selected">---- 都道府県 </option>
                  <option value="北海道" <?php if($address1=="北海道"){echo "selected";} ?>>北海道</option>
                  <option value="青森県" <?php if($address1=="青森県"){echo "selected";} ?>>青森県</option>
                  <option value="岩手県" <?php if($address1=="岩手県"){echo "selected";} ?>>岩手県</option>
                  <option value="宮城県" <?php if($address1=="宮城県"){echo "selected";} ?>>宮城県</option>
                  <option value="秋田県" <?php if($address1=="秋田県"){echo "selected";} ?>>秋田県</option>
                  <option value="山形県" <?php if($address1=="山形県"){echo "selected";} ?>>山形県</option>
                  <option value="福島県 <?php if($address1=="福島県"){echo "selected";} ?>">福島県</option>
                  <option value="茨城県" <?php if($address1=="茨城県"){echo "selected";} ?>>茨城県</option>
                  <option value="栃木県" <?php if($address1=="栃木県"){echo "selected";} ?>>栃木県</option>
                  <option value="群馬県" <?php if($address1=="群馬県"){echo "selected";} ?>>群馬県</option>
                  <option value="埼玉県" <?php if($address1=="埼玉県"){echo "selected";} ?>>埼玉県</option>
                  <option value="千葉県" <?php if($address1=="埼玉県"){echo "selected";} ?>>千葉県</option>
                  <option value="東京都" <?php if($address1=="東京都"){echo "selected";} ?>>東京都</option>
                  <option value="神奈川県" <?php if($address1=="神奈川県"){echo "selected";} ?>>神奈川県</option>
                  <option value="新潟県" <?php if($address1=="新潟県"){echo "selected";} ?>>新潟県</option>
                  <option value="富山県" <?php if($address1=="富山県"){echo "selected";} ?>>富山県</option>
                  <option value="石川県" <?php if($address1=="石川県"){echo "selected";} ?>>石川県</option>
                  <option value="福井県" <?php if($address1=="福井県"){echo "selected";} ?>>福井県</option>
                  <option value="山梨県" <?php if($address1=="山梨県"){echo "selected";} ?>>山梨県</option>
                  <option value="長野県" <?php if($address1=="長野県"){echo "selected";} ?>>長野県</option>
                  <option value="岐阜県" <?php if($address1=="岐阜県"){echo "selected";} ?>>岐阜県</option>
                  <option value="静岡県" <?php if($address1=="静岡県"){echo "selected";} ?>>静岡県</option>
                  <option value="愛知県" <?php if($address1=="愛知県"){echo "selected";} ?>>愛知県</option>
                  <option value="三重県" <?php if($address1=="三重県"){echo "selected";} ?>>三重県</option>
                  <option value="滋賀県" <?php if($address1=="滋賀県"){echo "selected";} ?>>滋賀県</option>
                  <option value="京都府" <?php if($address1=="京都府"){echo "selected";} ?>>京都府</option>
                  <option value="大阪府" <?php if($address1=="大阪府"){echo "selected";} ?>>大阪府</option>
                  <option value="兵庫県" <?php if($address1=="兵庫県"){echo "selected";} ?>>兵庫県</option>
                  <option value="奈良県" <?php if($address1=="奈良県"){echo "selected";} ?>>奈良県</option>
                  <option value="和歌山県" <?php if($address1=="和歌山県"){echo "selected";} ?>>和歌山県</option>
                  <option value="鳥取県" <?php if($address1=="鳥取県"){echo "selected";} ?>>鳥取県</option>
                  <option value="島根県" <?php if($address1=="島根県"){echo "selected";} ?>>島根県</option>
                  <option value="岡山県" <?php if($address1=="岡山県"){echo "selected";} ?>>岡山県</option>
                  <option value="広島県" <?php if($address1=="広島県"){echo "selected";} ?>>広島県</option>
                  <option value="山口県" <?php if($address1=="山口県"){echo "selected";} ?>>山口県</option>
                  <option value="徳島県" <?php if($address1=="徳島県"){echo "selected";} ?>>徳島県</option>
                  <option value="香川県" <?php if($address1=="香川県"){echo "selected";} ?>>香川県</option>
                  <option value="愛媛県" <?php if($address1=="愛媛県"){echo "selected";} ?>>愛媛県</option>
                  <option value="高知県" <?php if($address1=="高知県"){echo "selected";} ?>>高知県</option>
                  <option value="福岡県" <?php if($address1=="福岡県"){echo "selected";} ?>>福岡県</option>
                  <option value="佐賀県" <?php if($address1=="佐賀県"){echo "selected";} ?>>佐賀県</option>
                  <option value="長崎県" <?php if($address1=="長崎県"){echo "selected";} ?>>長崎県</option>
                  <option value="熊本県" <?php if($address1=="熊本県"){echo "selected";} ?>>熊本県</option>
                  <option value="大分県 <?php if($address1=="熊本県"){echo "selected";} ?>">大分県</option>
                  <option value="宮崎県" <?php if($address1=="宮崎県"){echo "selected";} ?>>宮崎県</option>
                  <option value="鹿児島県" <?php if($address1=="鹿児島県"){echo "selected";} ?>>鹿児島県</option>
                  <option value="沖縄県" <?php if($address1=="沖縄県"){echo "selected";} ?>>沖縄県</option>
                </select>
                <input type="text" id="address2" class="inaddress" name="input_data[address2]" value="<?php echo $address2 ?>" placeholder="市区町村">
                <input type="text" id="address3" class="inaddress" name="input_data[address3]" value="<?php echo $address3 ?>" placeholder="町名・番地">
                <input type="text" id="address4" class="inaddress" name="input_data[address4]" value="<?php echo $address4 ?>" placeholder="建物名">
              </div>
            </div>
            <div class="th vx">メールアドレス<span class="fc_red">※</span></div>
            <div class="td vx">
              <input type="text" name="input_data[mail_address]" value="<?php echo $mail_address ?>" placeholder="メールアドレス" class="inmail">
            </div>
            <div class="th vx">メールアドレス (確認)<span class="fc_red">※</span></div>
            <div class="td vx">
              <input type="text" name="input_data[mail_address2]" value="<?php echo $mail_address2 ?>" placeholder="メールアドレス(確認)" class="inmail">
            </div>
            <div class="th vx">連絡先電話番号<span class="fc_red">※</span></div>
            <div class="td vx tel_field">
              <input type="tel" name="input_data[tel1]" value="<?php echo $tel1 ?>"class="intel"><span class="dash">-</span><input type="tel" name="input_data[tel2]" value="<?php echo $tel2 ?>"class="intel"><span class="dash">-</span><input type="tel" name="input_data[tel3]" value="<?php echo $tel3 ?>"class="intel">
            </div>
          </article>
          <article class="donation_field donation_field_kaihi">
            <div class="donation_field_checkbox">
              <div class="select_donation_type">
                <div class="checkboxes">
                  <label><input type="checkbox" name="input_data[kind][]" value="1" <?php if($kind=="1"){echo "checked";} ?>><span class="checkbox-field-text">会費</span></label>
                </div>
              </div>
            </div>
            <div class="flex-wrap_par">
              <div class="th vx">会費納付</div>
              <div class="td vx">
                <div class="donation_field_radio">
                  <div class="radio-field">
                    <label><input type="radio" name="input_data[member_kind]" value="1" <?php if($member_kind=="1"){echo "checked";} ?> onClick="changeDisabled()"><span class="radio-field-text">正会員 (口数で指定)</span></label>
                  </div>
                </div>
                <select name="input_data[member_gaku_1]" class="inkuti">
                  <?php
                  for($i=1;$i<11;$i++){
                    echo '<option value="'.$i.'"';
                    if($member_gaku_1==$i){
                      echo "selected";
                    }
                    echo '>'.$i.'口(';
                    $gaku_kuti=10000*$i;
                    echo number_format($gaku_kuti).'円)</option>';
                  }
                  ?>
                </select>
                <div class="donation_field_radio">
                  <div class="radio-field">
                    <label><input type="radio" name="input_data[member_kind][]" value="2" <?php if($member_kind=="2"){echo "checked";} ?> onClick="changeDisabled()"><span class="radio-field-text">賛助会員 (口数で指定)</span></label>
                  </div>
                </div>
                <select name="input_data[member_gaku_2]" class="inkuti">
                  <?php
                  for($i=1;$i<11;$i++){
                    echo '<option value="'.$i.'"';
                    if($member_gaku_2==$i){
                      echo "selected";
                    }
                    echo '>'.$i.'口(';
                    $gaku_kuti=50000*$i;
                    echo number_format($gaku_kuti).'円)</option>';
                  }
                  ?>
                </select>
                <div class="donation_field_radio">
                  <div class="radio-field">
                    <label><input type="radio" name="input_data[member_kind][]" value="3" <?php if($member_kind=="3"){echo "checked";} ?> onClick="changeDisabled()"><span class="radio-field-text">特別会員 (口数で指定)</span></label>
                  </div>
                </div>
                <select name="input_data[member_gaku_3]" class="inkuti">
                  <?php
                  for($i=1;$i<11;$i++){
                    echo '<option value="'.$i.'"';
                    if($member_gaku_3==$i){
                      echo "selected";
                    }
                    echo '>'.$i.'口(';
                    $gaku_kuti=100000*$i;
                    echo number_format($gaku_kuti).'円)</option>';
                  }
                  ?>
                </select>
              </div>
            </div>
          </article>
          <article class="donation_field donation_field_kifu">
            <div class="donation_field_checkbox">
              <div class="select_donation_type">
                <div class="checkboxes">
                  <label><input type="checkbox" name="input_data[kind][]" value="2" <?php if($kind=="2"){echo "checked";} ?>><span class="checkbox-field-text">ご寄付</span></label>
                </div>
              </div>
            </div>
            <div class="flex-wrap_par">
              <div class="th vx">
                金額を記載
              </div>
              <div class="td vx">
                <div class="gaku_field">
                  <input type="tel" name="input_data[kifu_gaku]" value="<?php echo $gaku2 ?>" placeholder="1,000円以上でお願いします" class="ingaku disabled"> 円
                </div>
              </div>
              <div class="th vx">
                使途の指定
              </div>
              <div class="td vx">
                <div class="donation_field_radio">
                  <div class="radio-field">
                    <label><input type="radio" name="input_data[kifu_use]" value="1" <?php if($kifu_use=="1"){echo "checked";} ?>><span class="radio-field-text">使途については貴協会にお任せします。</span></label>
                  </div>
                </div>
                <div class="donation_field_radio">
                  <div class="radio-field">
                    <label><input type="radio" name="input_data[kifu_use]" value="2" <?php if($kifu_use=="2"){echo "checked";} ?>><span class="radio-field-text">使途については別途寄付申込書にて指示します。</span></label>
                  </div>
                </div>
              </div>
            </div>
          </article>
          <article class="donation_field donation_field_kodoku">
            <div class="donation_field_checkbox">
              <div class="select_donation_type">
                <div class="checkboxes">
                  <label><input type="checkbox" name="input_data[kind][]" value="3" <?php if($kind=="2"){echo "checked";} ?>><span class="checkbox-field-text">アジアの友購読費</span></label><small>年4回発行　2,000円（送料込み）</small>
                </div>
              </div>
            </div>
            <div class="flex-wrap_par">
              <div class="th vx"></div>
              <div class="td vx">
                <div class="donation_field_radio">
                  <div class="radio-field">
                    <label><input type="radio" name="input_data[sub_kind]" value="5" <?php if($sub_gaku=="5"){echo "checked";} ?>><span class="radio-field-text">1部×年4回　2000円</span></label>
                  </div>
                </div>
                <div class="donation_field_radio">
                  <div class="radio-field">
                    <label><input type="radio" name="input_data[sub_kind]" value="6" <?php if($sub_gaku=="6"){echo "checked";} ?>><span class="radio-field-text">2部×年4回　4000円</span></label>
                  </div>
                </div>
                <div class="donation_field_radio">
                  <div class="radio-field">
                    <label><input type="radio" name="input_data[sub_kind]" value="7" <?php if($sub_gaku=="7"){echo "checked";} ?>><span class="radio-field-text">3部×年4回　6000円</span></label>
                  </div>
                </div>
              </div>
            </div>
          </article>
          <input type="submit" name="donation_confirm" value="次へ" class="btn_type_send hover">
        <input type="hidden" name="act" value="2">
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
