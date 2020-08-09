<?php
/**
 * KobeBeauty PHP Contact Form
 * http://www.kobe-beauty.co.jp/
 *
 * Copyright (c) 2014 Kobe Beauty Co., Ltd.
 * Released under the MIT license
 *
 * Modify LeVeL99
 */
$signature = <<<EOM
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
〒113-8642 東京都文京区本駒込2-12-13
公益財団法人アジア学生文化協会
新星学寮建築募金係り（布施・白石）
電話: 03-3946-4121 FAX: 03-3946-7599
email: asca60com@abk.or.jp
＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝＝
EOM;

/**
* sendMailtoAdmin
* メール送信（管理者宛）
* @param $data     フォーム送信データ
*/
function sendMailtoAdmin ($data) {
	global $signature;
	$result = false;

	// 文字コードをセット
	mb_language("Japanese");
	mb_internal_encoding("UTF-8");

	// 送信先
	$to = ADMIN_MAIL;

	// 件名
	$subject = "クレジット決済でのお支払いのお礼";

	// 本文作成
	$body  = "";
	$body .= "{$data['userInfo']['name']}様\n";
	$body .= "\n";
	$body .= "当協会への下記お支払いを賜り誠に有難うございます。\n";
	$body .= "今後とも引き続きご支援を賜りたくお願い申し上げます。\n";
	$body .= "\n";
	$body .= "---------------------------------------------------------------------\n";
	$body .= "\n";
	$body .= "■受付番号：" . $data['userInfo']['number'] . "\n";
	$body .= "■氏名：" . $data['userInfo']['name'] . " 様\n";
	$body .= "■ご住所：" . $data["address"] . "\n";
	$body .= "■連絡先電話番号：" . $data["tel"] . "\n";
	//$body .= "メールアドレス：　" . $data["email"] . "\n";
	$body .= "■正会員費　　　　　金額：" . $data["tel"] . "円\n";
	$body .= "　賛助会員費　　　　金額：" . $data["tel"] . "円\n";
	$body .= "　特別会員費　　　　金額：" . $data["tel"] . "円\n";
	$body .= "　ご寄付　　　　　　金額：" . $data["tel"] . "円\n";
	$body .= "　アジアの友購読費　金額：" . $data["tel"] . "円\n";
//	foreach ($data['feesInfo'] as $key => $value) {
//		if ($key === 'course') {
//			$body .= "コース：　" . $data['feesInfo']['course'] . "\n";
//			$body .= "----\n";
//		} else {
//			$body .= $key . "：　" . number_format($value) . "円\n";
//		}
//	}
//	$body .= "----\n";
//	$body .= "合計額：" . number_format($data["amount"]) . "円\n";
	$body .= "会費、ご寄付をお支払いいただいた方へ（アジアの友購読費は免税の対象にはなりません。）\n";
	$body .= "〇後日、当方より「領収書」と「税額控除にかかる証明書」をお送り致しますので\n";
	$body .= "ご査収の程お願い申し上げます。\n";
	$body .= "\n";
	$body .= "〇当協会は、内閣総理大臣より「公益財団法人」の認定を受けており、 当協会への寄付金には「特定公益増進法人」としての税制上の優遇措置が適用され、次の控除が認められております。\n";
	$body .= "当協会が発行する領収証とあわせて「税額控除に係る証明書」（写）を添付し、所轄税務署へ確定申告していただくことで、個人の方の場合は「所得控除」又は「税額控除」が受けられます。\n";
	$body .= "\n";
	$body .= "法人の場合は、一般の寄附金とは別枠で損金として扱うことができます。\n";
	$body .= "\n";
	$body .= "詳しくは「ご寄付金に対する免税措置について」\n";
	$body .= "http://www.abk.or.jp/donation/summary.html\n";
	$body .= "をご覧ください。\n";
	$body .= "\n";
	$body .= $signature;

	// 送信処理
	if (mb_send_mail($to, $subject, $body)) {
		$result = true; // 送信成功
	}

	return $result;
}

/**
* sendMailtoCustomer
* メール送信（ユーザー宛）
* @param $data     フォーム送信データ
*/
function sendMailtoCustomer ($data) {
	global $signature;
	$result = false;

	// 文字コードをセット
	mb_language("Japanese");
	mb_internal_encoding("UTF-8");

	// 送信先
	$to = $data["email"];
	$bcc = ADMIN_MAIL;

	// 送信元
	$from = mb_encode_mimeheader('公益財団法人アジア学生文化協会') . '<' . ADMIN_MAIL . '>';

	$header = "From:$from\n";
	$header .= "Bcc:$bcc\n";

	// 件名
	$subject = "クレジット決済でのお支払いのお礼";

	// 本文作成
	$body  = "";
	$body .= "{$data['userInfo']['name']}様\n";
	$body .= "\n";
	$body .= "当協会への下記お支払いを賜り誠に有難うございます。\n";
	$body .= "今後とも引き続きご支援を賜りたくお願い申し上げます。\n";
	$body .= "\n";
	$body .= "---------------------------------------------------------------------\n";
	$body .= "\n";
	$body .= "■受付番号：" . $data['userInfo']['number'] . "\n";
	$body .= "■氏名：" . $data['userInfo']['name'] . " 様\n";
	$body .= "■ご住所：" . $data["address"] . "\n";
	$body .= "■連絡先電話番号：" . $data["tel"] . "\n";
	//$body .= "メールアドレス：　" . $data["email"] . "\n";
	$body .= "■正会員費　　　　　金額：" . $data["tel"] . "円\n";
	$body .= "　賛助会員費　　　　金額：" . $data["tel"] . "円\n";
	$body .= "　特別会員費　　　　金額：" . $data["tel"] . "円\n";
	$body .= "　ご寄付　　　　　　金額：" . $data["tel"] . "円\n";
	$body .= "　アジアの友購読費　金額：" . $data["tel"] . "円\n";
//	foreach ($data['feesInfo'] as $key => $value) {
//		if ($key === 'course') {
//			$body .= "コース：　" . $data['feesInfo']['course'] . "\n";
//			$body .= "----\n";
//		} else {
//			$body .= $key . "：　" . number_format($value) . "円\n";
//		}
//	}
//	$body .= "----\n";
//	$body .= "合計額：" . number_format($data["amount"]) . "円\n";
	$body .= "会費、ご寄付をお支払いいただいた方へ（アジアの友購読費は免税の対象にはなりません。）\n";
	$body .= "〇後日、当方より「領収書」と「税額控除にかかる証明書」をお送り致しますので\n";
	$body .= "ご査収の程お願い申し上げます。\n";
	$body .= "\n";
	$body .= "〇当協会は、内閣総理大臣より「公益財団法人」の認定を受けており、 当協会への寄付金には「特定公益増進法人」としての税制上の優遇措置が適用され、次の控除が認められております。\n";
	$body .= "当協会が発行する領収証とあわせて「税額控除に係る証明書」（写）を添付し、所轄税務署へ確定申告していただくことで、個人の方の場合は「所得控除」又は「税額控除」が受けられます。\n";
	$body .= "\n";
	$body .= "法人の場合は、一般の寄附金とは別枠で損金として扱うことができます。\n";
	$body .= "\n";
	$body .= "詳しくは「ご寄付金に対する免税措置について」\n";
	$body .= "http://www.abk.or.jp/donation/summary.html\n";
	$body .= "をご覧ください。\n";
	$body .= "\n";
	$body .= $signature;

	// 送信処理
	if (mb_send_mail($to, $subject, $body, $header, "-f".$from)) {
		$result = true; // 送信成功
	}

	return $result;
}

