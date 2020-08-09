<?php
/**
 * KobeBeauty PHP Contact Form
 * http://www.kobe-beauty.co.jp/
 *
 * Copyright (c) 2014 Kobe Beauty Co., Ltd.
 * Released under the MIT license
 */

// セッションスタート
session_start();

// 自動返信メールの管理者メールアドレス
//define('ADMIN_MAIL', 'shiraishi@abk.or.jp,onuma@abk.or.jp,asca60com@abk.or.jp');
//define('ADMIN_MAIL', 'takayama@bloomstreet.jp');
define('ADMIN_MAIL', 'kodama@level-99.jp,kodama.masayo@gmail.com');

// HTMlエスケープ
function h($str) {
	return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// 共通ファイル読み込み
require_once( __DIR__ . '/utility.php');