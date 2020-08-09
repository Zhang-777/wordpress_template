<?php
/**
 * KobeBeauty PHP Contact Form
 * http://www.kobe-beauty.co.jp/
 *
 * Copyright (c) 2014 Kobe Beauty Co., Ltd.
 * Released under the MIT license
 *
 * Modfiy LeVeL99
 */

function checkInputData($inputData) {
	// エラーメッセージを格納する配列
    $err_msg = '';

	// 各入力内容を取得
	$l_name = isset($input_data["l_name"]) ? $input_data["l_name"] : "";
	$f_name = isset($input_data["f_name"]) ? $input_data["f_name"] : "";
	$zip1 = isset($input_data["zip1"]) ? $input_data["zip1"] : "";
	$zip2 = isset($input_data["zip2"]) ? $input_data["zip2"] : "";
    $address1 = isset($input_data["address1"]) ? $input_data["address1"] : "";
    $address2 = isset($input_data["address2"]) ? $input_data["address2"] : "";
    $address3 = isset($input_data["address3"]) ? $input_data["address3"] : "";
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
    if (!($kind)) {
        $ERROR .= '▼ 会員・ご寄付・アジアの友購読費のいずれかを選択してください<br>';
    }
    foreach ($kind as $value) {
        switch ($value) {
            // 会員
            case "1":
                if (!($member_kind)) {
                    $ERROR .= '▼ 会員の種類を選択してください<br>';
                }
                break;
            // ご寄付
            case "2":
                if (!($kifu_gaku > 999)) {
                    $ERROR .= '▼ 金額は1,000円以上でご入力ください<br>';
                }
                if (!($kifu_use)) {
                    $ERROR .= '▼ ご寄付の使途を指定ください<br>';
                }
                break;
            // アジアの友購読費
            case "3":
                if (!($sub_kind)) {
                    $ERROR .= '▼ アジアの友購読費の購読部数を選択してください<br>';
                }
                break;
        }
    }
	return $err_msg;
}